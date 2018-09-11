<?php

/*
*   Tuta Muniz - tuta_muniz@hotmail.com
*   17/12/2003
*/

/***********************************************
*
*                 POPAuth Class V0.1b
* Description: Implements POP3 authentication
*
***********************************************/

require_once("poptalk.inc.php");

class POPAuth {
  var $host;
  var $port;
  var $username;
  var $password;
  var $pop;

  function POPAuth($username,$password,$host,$port = 110)
  {
    $this->username = $username;
    $this->password = $password;
    $this->port = $port;
    $this->host = $host;
  }

  function validate()
  {
    $this->pop = new POPTalk();
    $this->pop->connect($this->host);
    $this->pop->sendUserCmd($this->username);
    $this->pop->wait_response();
    if($this->pop->responseStatus)
    {
      $this->pop->sendPassCmd($this->password);
      $this->pop->wait_response();
      if($this->pop->responseStatus)
      {
        $this->pop->sendQuitCmd();
        $this->pop->wait_response();
        return true;
      }
    }

    return false;
  }
}
?>