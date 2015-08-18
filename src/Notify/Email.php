<?php
namespace Notify;

use Notify\Config;

class Email
{

  public static function send($to, $subject, $template, $vars)
  {
      $template = self::get_template($template);
      $new_template = self::set_template($template, $vars);

      if (!self::mail($to, $subject, $new_template)) {
          header('HTTP/1.1 500 Internal Server Error');
          header('Content-Type: '. $vars['content_type'] .'; charset=UTF-8');
          die(json_encode(array('message' => 'ERROR', 'code' => 'NS0001', 'description' => 'Email could not be sent', 'data' => $from.' '.$to.' '.$subject.' '.$message)));
          return;
      }
  }

  public static function set_template($contents, $vars)
  {
      $tags = []; $data = [];
      foreach($vars as $t => $d) {
          array_push($tags, $t);
          array_push($data, $d);
      }

      $contents = str_replace($tags, $data, $contents);
      $contents = str_replace("\n.", "\n..", $contents);

      return $contents;
  }

  public static function get_template($template)
  {
      if (!$template) {
        return false;
      }

      $dir = dirname(FILE) . "/templates/" . $template;
      if (!file_exists($dir)) {
          header('HTTP/1.1 500 Internal Server Error');
          header('Content-Type: '. $vars['content_type'] .'; charset=UTF-8');
          die(json_encode(array('message' => 'ERROR', 'code' => 'NS0001', 'description' => 'Cannot retrieved template')));
          return;
      }

      $contents = file_get_contents($dir);
      return $contents;
  }

}
