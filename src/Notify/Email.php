<?php
namespace Notify;

use Notify\Config;

class Email
{

  public static function send($to, $subject, $template, $vars)
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

      $client_name = self::extract_name($vars['client_name']);
      $replace  = [
          'client_name' => $vars['client_name'],
          'client_first_name' => $client['firstname'],
          'client_last_name'  => $client['lastname'],
          'client_email' => $to,
          'service' => $vars['service'],
          'link' => $vars['link']
      ];

      $contents = self::replace_tags($contents, $replace);
      $contents = str_replace("\n.", "\n..", $contents);

      if (!mail($to, $subject, $body)) {
          return false;
      }
  }

  public function extract_name($name)
  {
      if ($name !== false) {
          return false;
      }

      $newName = explode(' ',$name);
      $name['firstname'] = ucfirst($newName[0]);
      $name['lastname']  = ucfirst($newName[1]);
      return $name;
  }

  public static function replace_tags($contents, $vars)
  {
      $tags = [
            "{client_name}",
            "{client_first_name}",
            "{client_last_name}",
            "{client_email}",
            "{service}",
            "{link}",
        ];

        $contents = str_replace($tags, $replace, $contents);
        return $contents;
  }

  public static function get_template($template)
  {
      if (!$template) {
        return false;
      }

      $dir = dirname(FILE) . "/templates/" . $template;
      if (file_exists($dir)) {
        $contents = file_get_contents($dir);
      }
      return $contents;
  }

}
