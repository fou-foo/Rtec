<?php
/*
*   Tuta Muniz - tuta_muniz@hotmail.com
*   17/12/2003
*/

/***********************************************
*
*                 Socket Class V0.1b
*
*   Description : implement the basic operations
*                 over socket's
*
***********************************************/


class Socket {
  var $fd;
  var $error;
  var $timeout = 500;
  var $MAX_BUFFER = 1024;
  var $errorstr;

  function connect($host,$port)
  {
    if(empty($host))
    {

     echo "Error: you don't set the POP3 server.";
     exit(1);
    }

    $t = 1;
    $this->fd = fsockopen($host,$port,$this->error,$this->errorstr,$this->timeout) or die("error connecting to host $host:$port connected");
  }

  function write($cmd)
  {
    if(is_resource($this->fd))
    {
      fwrite($this->fd,"$cmd");
    }
    else
    {
      $this->perror();
    }
  }

  function writeln($cmd)
  {
    if(is_resource($this->fd))
    {
      fwrite($this->fd,"$cmd\r\n");
    }
    else
    {
      $this->perror();
    }
  }

  function setTimeout($timeout)
  {
    if(is_resource($this->fd))
    {
      socket_set_timeout($this->fd,$timeout);
    }
    else
    {
      $this->perror();
    }
  }

  function read()
  {
    if(is_resource($this->fd))
    {
      return fread($this->fd, $this->MAX_BUFFER);
    }
    else
    {
      $this->perror();
    }
  }

  function eof()
  {
    if(is_resource($this->fd))
    {
      return feof($this->fd);
    }
    else
    {
      $this->perror();
    }
  }

  function close()
  {
    if(is_resource($this->fd))
    {
      fclose($this->fd);
    }
    else
    {
      $this->perror();
    }
  }

  function perror()
  {
    echo "error not connected: use connect()";
    exit(-1);
  }
}
?>