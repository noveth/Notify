<?php
namespace Notify;

use Notify\Config;

class Email
{
  public static function send($to, $subject, $template, $vars)
  {
      $template = self::get_template($template, $vars);

      if (!mail($to, $subject, $new_template)) {
          throw new Exception("Email could not be sent", true);
          return false;
      }
      return true;
  }

  private static function set_template($contents, $vars)
  {
      $tags = []; $data = [];
      foreach($vars as $t => $d) {
          $tags[] = $t;
          $data[] = $d;
      }

      $contents = str_replace($tags, $data, $contents);
      $contents = str_replace("\n.", "\n..", $contents);

      return $contents;
  }

  private static function get_template($template, $vars)
  {
      if (!$template) {
        return false;
      }

      $dir = dirname(FILE) . "/templates/" . $template;
      if (!file_exists($dir)) {
        throw new Exception("Specified template could not be found", true);
        return false;
      }

      $contents = file_get_contents($dir);
      return self::set_template($contents, $vars);
  }
}
