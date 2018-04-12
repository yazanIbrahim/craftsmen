<?php

function generateCaptcha()
{

    //generate numbers from 48 to 90 except from 58-64
    $x = array();
    for ($i = 48; $i <= 90; $i++) {
        $x[$i] = $i;
        if ($i == 58)
            $i = 64;
    }

    $captcha = array();
    $string = "";
    for ($i = 0; $i < 5; $i++) {
        $n = rand(48, 90);
        if (in_array($n, array(58, 59, 60, 61, 62, 63, 64))) {
            $i--;
            continue;
        } else {
            $captcha[$i] = $n;
            $captcha[$i] = chr($captcha[$i]);
            $string = $string . $captcha[$i];
        }
    }
    return $string;
}


function unique($db_obj)
{
    $string = generateCaptcha();
    $query = $db_obj->prepare("SELECT code FROM trust_contacts");
    $query->execute();
    $row = $query->fetch();

    foreach ($row as $value) {
        if ($value != $string)
            return 1;
        else
            unique();


    }
}

// get the title of the page
function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) echo $pageTitle;
    else echo "Default";
}

function lockAccount($userID, $db_obj)
{

    $query = $db_obj->prepare("UPDATE users SET lockStatus = ? WHERE userID = ?");
    $query->execute(array(1, $userID));

}

// check how many times the user has attempted to login
function check_attempts($userID, $db_obj)
{
    $now = time();
    $allowedInterval = $now - (60 * 60);
    $query = $db_obj->prepare("SELECT userID from login_attempts where userID = ? and timing > ?");
    if ($query->execute(array($userID, $allowedInterval))) {
        if ($query->rowCount() > 3) {
            return true;
        } else {
            return false;
        }
    }
}

/*

function loginss($email, $password, $db_obj)
{
	$query = $db_obj->prepare("SELECT userID,password FROM users where email=? LIMIT 1");
	$query->execute(array($email));
	$row = $query->fetch(PDO::FETCH_ASSOC);

	// define variables to store data fetched from data base
	$userID = $row['userID'];
	$db_password = $row['password'];


	// check if the user with given email is exist
	if ($query->rowCount() == 1) {
	echo "email found";

		// check if the user login failed more than 5 times
		if (check_attempts($userID, $db_obj) == true) {
			echo "brute";
			mailer($email, "Your account has been locked during to many login attempts please rest you password", "account locked");
			$loginErrors = "Your account has been locked during to many login attempts";
			return false;
		}
		else {
			echo "no brute yet";

			// check if the password provided by the user matches the password fetched from the database
			
			echo $db_password ."<br>";

			
			$password = password_hash($password,PASSWORD_DEFAULT);
			echo $password;
			if (password_verify($password, $db_password)) {
				echo "yazan";
				// varibale to stroe user browser

				$userBrowser = $_SERVER['HTTP_USER_AGENT'];
				
				$_SESSION['userid'] = $userID;
				
				$_SESSION['loginString'] = hash('sha512', $db_password . $userBrowser);
				return true;
			}
			else {
			
				$now = time();
				$query = $db_obj->prepare("INSERT INTO login_attempts(userID,timing) VALUES(?,?)");
				$query->execute(array($userID,$now));
				
				 //session for errors
				 $_SESSION['login'] = "make sure u enetered a valid password or email";
				 return false;
			}
		}
	}
	else {

		// user not exist
		$_SESSION['login'] = "User is not exist";
		return false;
	}
}// enf of login */


function login($email, $password, $db_obj)
{

    //check if the email exist
    $query = $db_obj->prepare("SELECT userID,password FROM users WHERE email = ? lIMIT 1");
    $query->execute(array($email));
    if ($query->rowCount() == 1) {//then the email is exist
        echo "email found" . "<br>";
        $row = $query->fetch();

        //store fetched data
        $userID = $row['userID'];
        $dbPassword = $row['password'];

        //check for too many login attempts

        if (check_attempts($userID, $db_obj) == TRUE) {//if too many login attempts
            //echo "brute" . "<br>";
            $_SESSION['login'] = "Your Account Has Been Blocked During Too Many Logn In Attempts";
            // send an email to reset password
            ResetPassword($email, $db_obj, "Account Lock");
            return false;
        } else {//if the account is not locked


            if (password_verify($password, $dbPassword)) {//if password matches

                $_SESSION['userid'] = $userID;
                return true;
            } else {//if the password doest match


                if (check_attempts($userID, $db_obj) == false) {
                    // register this attempt as failed attempt
                    $now = time();
                    $query = $db_obj->prepare("INSERT INTO login_attempts(userID,timing) VALUES(?,?)");
                    $query->execute(array($userID, $now));
                } else {
                    //lock account
                    lockAccount($userID, $db_obj);
                }


                //session for errors
                $_SESSION['login'] = "make sure u enetered a valid password or email";
                return false;

            }

        }
    } else {//if the email is not exist
        echo "email not exist" . "<br>";
        $_SESSION['login'] = "User Not Found";
        return false;

    }


}

function ResetPassword($email, $db_obj, $reasonToReset)
{
    $query = $db_obj->prepare("SELECT userID FROM users Where email = ?");
    $query->execute(array($email));
    // check if email exist 
    if ($query->rowCount() > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $userID = $row['userID'];

        // make a token
        $token = md5(rand(1, 1000));

        // time of the generated token 
        $now = time();
        $query = $db_obj->prepare("INSERT INTO pass_reset(userID,token,tokTime) Values(?,?,?)");
        $query->execute(array($userID, $token, $now));

        // send am email address to the email provided
        mailer(
            $email,
            "<a href=\"http://localhost/The-Will-php/TheWill/layout/passwordReset.php?token=$token\">
                reset Your password</a>",
            $reasonToReset
        );
    }

}


function Insert($table, $column, $values)
{
    /*
    parameters :
    table : table name in the database
    $coulmn : an array of column names
    $values : an array of values to insert in the correosponding columns
    return value :
    */
    $col = implode(',', $column);
    $x = '';
    for ($i = 0; $i < count($values); $i++) {
        $x .= '?';
        $x .= ',';
    }

    $x = substr_replace($x, '', strripos($x, ','));
    $query = $GLOBALS['connect']->prepare("INSERT INTO $table($col) VALUE($x)");
    return $query->execute($values);
}

function removeSpecialChars($string)
{
    $string = str_split($string);
    for ($i = 0; $i < count($string); $i++) {
        if ((ord($string[$i]) >= 0 && ord($string[$i]) < 65) || (ord($string[$i]) >= 92 &&
                ord($string[$i]) < 97) || ord($string[$i]) >= 123 && ord($string[$i]) <= 126) {
            $string[$i] = "";
        }
    }

    $res = implode($string);
    return $res;
}

function mailer($to, $content, $subject)
{
    date_default_timezone_set('Etc/UTC');
    require 'vendor/autoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'yazanmoh95@gmail.com'; // SMTP username
    $mail->Password = 'Twisted9526'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to
    $mail->setFrom('yazanmoh95@gmail.com', 'the will');
    $mail->addReplyTo('yazan_9526@hotmail.com', 'CodexWorld');
    $mail->addAddress($to); // Add a recipient
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    $mail->isHTML(true); // Set email format to HTML
    $bodyContent = $content;
    $mail->Subject = $subject;
    $mail->Body = $bodyContent;
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}


function redirect($target, $time, $msg)
{

    echo '<div class="alert alert-info">' . $msg . "</div";
    header("refresh:10;url=$target");
    exit();
}


function checkRecord($table, $col, $condition = "", $condiionValue = "", $db_obj)
{

    $query = $db_obj->prepare("SELECT $col FROM $table WHERE $condition = ?");
    $query->execute(array($condiionValue));
    if ($query->rowCount() > 0)
        return true;
    else
        return false;
}


function updateMessage($letter, $letterID, $userID, $firstName, $lastName, $email, $db_obj)
{

    //update letter
    $query = $db_obj->prepare("UPDATE letter SET letterContent = ? WHERE letterID = ?");
    $query->execute(array($letter, $letterID,));

    // get the recipient of this letter
    $query = $db_obj->prepare("SELECT recID FROM letter WHERE letterID = ?");
    $query->execute(array($letterID));
    $row = $query->fetch();

    $recID = $row['recID'];


    // update the rec information
    $query = $db_obj->prepare("UPDATE recipient SET firstName = ?,lastName = ?, email = ? WHERE recID = ?");
    $query->execute(array($firstName, $lastName, $email, $recID));

    if ($query->rowCount() == 1)
        return true;
    else
        return false;


}


function updatePersonalInfo($userID, $firstName, $lastName, $email, $db_obj)
{


    // check if the email provided wheter belongs to another user or not

    // update user info
    $query = $db_obj->prepare("UPDATE users SET firstName = ? , lastname = ? , email = ? WHERE userID = ?");
    $query->execute(array($firstName, $lastName, $email, $userID));
    if ($query->rowCount() > 0)
        return true;
    else
        return false;


}


?>
