<?php
namespace Notify;

class Config
{
  // Modules
  public static $EMAIL = true;
  public static $SLACK = false;

  // General
  public static $TEMPLATES;

  // Email
  public static $FROM;

  // Slack
  public static $SLACKWEBHOOK;
  public static $SLACKUSERNAME;

  Config::$TEMPLATES = dirname(__FILE__) . '/..';
  Config::$FROM = 'example@example.co.uk';

  if (file_exists(dirname(__FILE__) . '/../Config.php')) {
    include dirname(__FILE__) . '/../Config.php';
  } else {
    syslog(LOG_INFO, 'User config not available, using defaults');
  }
