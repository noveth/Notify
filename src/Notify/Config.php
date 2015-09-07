<?php
/**
* Class Email
* @author Norvert John H. Abella <noveth2012@gmail.com>
*/
namespace Notify;

class Config
{
  public static $DIRNAME;
  public static $FROM;
}

Config::$DIRNAME = dirname(__FILE__, 1);
Config::$FROM = 'example@example.co.uk';
?>
