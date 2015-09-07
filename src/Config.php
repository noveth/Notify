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
    public static $ISHTML;
  }

  Config::$DIRNAME = dirname(__FILE__);
  Config::$FROM = 'luke.bickley@fatjoe.co';
  Config::$ISHTML = 1;
?>
