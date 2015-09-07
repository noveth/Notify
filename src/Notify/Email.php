<?php
namespace Notify;

use Notify\Config;

class Email
{
  public static function send($to, $subject, $template, $vars = null)
  {
    $headers = '';
    $type = explode('.', $template);
    $template = self::get_template($template, $vars);

    if ($template === false) {
      return false;
    }

    $headers .= 'From:' . Config::$FROM . "\r\n";

    if ($type[1] === 'html') {
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    }

    if (!mail($to, $subject, $template, $headers)) {
      throw new \Exception("Email could not be sent");
      return false;
    }
    return true;
  }

  private static function set_template($contents, $vars)
  {
    if ($vars) {
      $tags = []; $data = [];
      foreach($vars as $t => $d) {
        $tags[] = $t;
        $data[] = $d;
      }
      $contents = str_replace($tags, $data, $contents);
    }

    $contents = str_replace("\n.", "\n..", $contents);

    return $contents;
  }

  private static function get_template($template, $vars)
  {
    if (!$template) {
      return false;
    }

    $dir = Config::$DIRNAME . '/templates/' . $template;

    if (!file_exists($dir)) {
      throw new \Exception("Specified template could not be found: " . $dir);
      return false;
    }

    $contents = file_get_contents($dir);

    return self::set_template($contents, $vars);
  }
}
