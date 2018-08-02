<?php
/**
 * File stmp_mail.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/3
 * Time: 14:48
 */
class stmpMail
{
    private $host;
    private $port = 25;
    private $user;
    private $pass;
    private $debug = false;
    private $sock;
    private $mailFormat = 0;//0-普通文本，1-html

    public function __construct($host, $port, $user, $pass, $format = 1, $debug = 1)
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = base64_encode($user);
        $this->pass = base64_encode($pass);
        $this->mailFormat = $format;
        $this->debug = $debug;

        $this->sock = fsockopen($this->host, $this->port, $errno, $errstr, 10);
        if (!$this->sock) {
            exit ("errno : $errno, errstr: $errstr\n");
        }

        $response = fgets($this->sock);
        if (strstr($response, '220') ===false) {
            exit("server error: $response\n");
        }

    }

    public function sendMail($from, $to, $subject, $body)
    {
        if (!$this->isEmail($from) || !$this->isEmail($to)) {
            $this->showDebug("please enter valid from/to email.");
            return false;
        }

        if (empty($subject) || empty($body)) {
            $this->showDebug("please enter subject/body.");
            return false;
        }

        $detail = "from:".$from."\r\n";
        $detail .= "to:". $to."\r\n";
        $detail .= "subject:". $subject."\r\n";

        if ($this->mailFormat == 1) {
            $detail .= "Content-Type:text/html;\r\n";
        } else {
            $detail .= "Content-Type:text/plain;\r\n";
        }

        $detail .= "charser=gb2312\r\n\r\n";
        $detail.= $body;

        $this->doCommand("HELO stmp.qq.com\r\n", 250);
        $this->doCommand("AUTH LOGIN\r\n", 334);
        $this->doCommand($this->user."\r\n", 334);
        $this->doCommand($this->pass."\r\n", 235);
        $this->doCommand("MAIL FORM :< $from >\r\n", 250);
        $this->doCommand("RCPT TO: < $to>\r\n", 250);
        $this->doCommand("DATA\r\n", 354);
        $this->doCommand("$detail\r\n.\r\n", 250);
        $this->doCommand("QUIT\r\n", 221);

        return true;
    }

    private function showDebug($message)
    {
        if ($this->debug)
        {
           echo "<p>debug message: $message</p>\n";
        }
    }

    private function doCommand($cmd, $returnCode)
    {
        fwrite($this->sock, $cmd);
        $response = fgets($this->sock);
        if (strstr($response, "$returnCode") ===false) {
            $this->showDebug($response);
            return false;
        }
        return true;

    }

    private function isEmail($email)
    {
        $pattern = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
        if (preg_match($pattern, $email, $matches)) {
            return true;
        } else {
            return false;
        }

    }


}
