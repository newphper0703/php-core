<?php
class emailException extends exception {
}
class pwdException extends exception {

function __toString()
{
    return "<div class=\"error\">Exception{$this->getCode()}:{$this->getMessage()} in FILE : {$this->getFile()} on line :{$this->getLine()}</div>";
}
}
