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

  public function __construct()
  {
    $this->$TEMPLATES = dirname(__FILE__) . '/..';
  }
}
