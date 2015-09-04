<?php
namespace Notify;

use Notify\Config;

class Send
{
  public static function email($to, $subject, $template, $vars)
  {
      $body = self::get_template($template);

      if (!self::send_email($to, $subject, $body, $vars)) {
          header('HTTP/1.1 500 Internal Server Error');
          header('Content-Type: '. $this->content_type .'; charset=UTF-8');
          die(json_encode(array('message' => 'ERROR', 'code' => 'NS0001', 'description' => 'Email could not be sent', 'data' => $from.' '.$to.' '.$subject.' '.$message)));
          return;
      }
  }

  public function send_email($to, $subject, $body, $vars)
  {
      if ($vars['content_type'] !== false) {
          header('Content-Type:' . $vars['content_type']);
      }

      if (!mail($to, $subject, $body)) {
          return false;
      }
  }

  public static function get_template($template)
  {
      if (!$template) {
        return false;
      }

      $dir = dirname(FILE) . "/templates/" . $template;
      if (file_exists($dir)) {
        $contents = file_get_contents($dir);
        $contents = str_replace("\n.", "\n..", $contents);
      }
      return $contents;
  }
}