<?php
namespace Notify;

class Config
{
  public static $DIRNAME;
  public static $FROM;
}

Config::$DIRNAME = dirname(__FILE__) . '/..';
Config::$FROM = 'example@example.co.uk';
?>
