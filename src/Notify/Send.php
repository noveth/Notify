<?php
namespace Notify;

use Notify\Config;

class Send
{
  private static $protocol = null;

  public static function email($to, $subject, $body)
  {
      $body = str_replace("\n.", "\n..", $body);
      if (!mail($to, $subject, $body)) {
          header('HTTP/1.1 500 Internal Server Error');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode(array('message' => 'ERROR', 'code' => 'NS0001', 'description' => 'Email could not be sent', 'data' => $from.' '.$to.' '.$subject.' '.$message)));

          return;
      }
  }

}
