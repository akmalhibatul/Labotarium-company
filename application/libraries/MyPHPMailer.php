<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MyPHPMailer
{
    public function MyPHPMailer()
    {
        require_once('classes/class.phpmailer.php');
        require_once('classes/class.smtp.php');
    }
}
