<?php
/**
* Class Email
* @author Norvert John H. Abella <noveth2012@gmail.com>
*/

if (file_exists(dirname(__FILE__) . '/Config.php')) {
  require_once dirname(__FILE__) . '/Config.php';
} else {
  syslog(LOG_INFO, 'User config not available, falling back to default');
  require_once dirname(__FILE__) . '/Notify/Config.php';
}

require_once dirname(__FILE__) . '/Notify/Email.php';
