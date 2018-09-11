<?php

/*
*   Tuta Muniz - tuta_muniz@hotmail.com
*   17/12/2003
*/


/***********************************************
*
*                 POPTalk Class  V0.1b
*  Description : Implements client/server POP3 talk.
*
***********************************************/

require_once("socket.inc.php");

class POPTalk {
  var $sock;
  var $host;
  var $port;
  var $serverBanner;
  var $responseStatus;
  var $response;

  function connect($host, $port = 110)
  {
    $this->sock = new Socket();
    $this->sock->connect($host,$port);
    $this->sock->setTimeout(2);
    $this->getBanner();

  }

  function getBanner()
  {
    $this->serverBanner = $this->sock->read();
  }

  function send_cmd($cmd,$param = "")
  {
    $this->sock->writeln("$cmd $param");
  }

  function wait_response()
  {
    $response = $this->sock->read();
    $this->response = $response;
    if(strstr($response,"+OK"))
    {
      $this->responseStatus = true;
    }
    else
    {
      $this->responseStatus = false;
    }
  }

  //
  //  POP3 Commands
  //

  function sendUserCmd($user)
  {
    $this->send_cmd("USER",$user);
  }

  function sendQuitCmd()
  {
    $this->send_cmd("QUIT");
  }

  function sendPassCmd($pass)
  {
    $this->send_cmd("PASS",$pass);
  }

}


?>