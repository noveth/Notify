<?php
namespace Notify;
use Notify\Config;

Class Loader
{
  public function __contruct()
  {
    $this->init();
  }

  public function init()
  {
    if (Config\$EMAIL === true) {
      include(dirname(__FILE__) . 'Email.php');
    }

    if (Config\$SLACK === true) {
      include(dirname(__FILE__) . 'Slack.php');
    }
  }
}
?>
