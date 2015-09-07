<?php
namespace Notify;
use Notify\Config;

if (Config::$EMAIL === true) {
  include(dirname(__FILE__) . '/Email.php');
}
if (Config::$SLACK === true) {
  include(dirname(__FILE__) . '/Slack.php');
}
?>
