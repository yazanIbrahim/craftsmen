<?php
/**
 * Created by PhpStorm.
 * User: Ryodan
 * Date: 3/4/2018
 * Time: 4:55 PM
 */

class Session{

    private $name;
    private $lifeTime;
    private $httpOnly;
    private $secure;


    public function __construct()
    {
    }

    public function setName($name){
        $this->name = $name;
    }

    public function secureSession(){


        $this->secure = FALSE;
        $this->httpOnly = TRUE;

        //force session to use only cookies to store session id
        $x = ini_set(session.use_only_cookies , 1);
        // echo "prev value is " . var_dump($x);
        // get the the cookie parameter
        $cookieConfig = session_get_cookie_params();
        // set the cookie parameter with the modified values
        session_set_cookie_params($cookieConfig['liftime'],$cookieConfig['path'],$cookieConfig["domain"], $this->secure, $this->httpOnly);

        // set session name defualt is phpsessid
        session_name($this->setName("yazansession"));
        session_start();
        session_regenerate_id();

    }

}