<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/4/2018
 * Time: 5:28 PM
 */


class Helper{

    public static function uploadFile($file,$dir){
        $dir = $dir."/";
        $fileName = $dir . basename($file["name"]);
        //echo $fileName;
        move_uploaded_file($file['tmp_name'],"../../".$fileName);


    }

    public static function sendEmail($to, $content, $subject){
        date_default_timezone_set('Etc/UTC');


        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'yazanmoh95@gmail.com'; // SMTP username
        $mail->Password = 'SpanishTwisted9526'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465; // TCP port to connect to
        $mail->setFrom('yazanmoh95@gmail.com', 'craftsmen');
        $mail->addReplyTo($to, 'CodexWorld');
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
        }
        else {

        }
    }

    public static function checkBruteForce($userId,$numOfAttempts,$timeFrame,$dbObjectConnection){
        /* this function return true if the user attempted to login to maany times and false otherise*/
        //get the current time
        $currentTime = time();
        // time frame to check the login attempts within
        $validTimeFrame = $currentTime - (60); // in the last timeFrame hours
        $stmt  = "SELECT login_time as failTime FROM login_attempts WHERE user_id  = ? AND login_time > ?";
        $query = $dbObjectConnection->prepare($stmt);
        $query->execute(array($userId,$validTimeFrame));

        if($query->rowCount() > $numOfAttempts){//  number of login attempts has been made in the last $numOfAttempts hours

            return true;

        }else{

            return false;
        }
    }


    public static function redirect($target, $time,$msg = null)
    {


        header("refresh:$time;url=$target");
        if($msg != null)
           echo $msg;
        exit();
    }


    public static function generateCaptcha()
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


    public static function uniqueCaptcha($db_obj){
        $code = generateCaptcha();
        $query = $db_obj->prepare("SELECT code FROM trust_contacts");
        $query->execute();
        $row = $query->fetch();

        foreach ($row as $value){
            if($value != $code)
                return true;
            else
                unique();


        }

        return $code;
    }




}