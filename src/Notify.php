<?php
/**
* Class Email
* @author Norvert John H. Abella <noveth2012@gmail.com>
* @author Luke Bickley <bickmista@gmail.com>
*/

require_once dirname(__FILE__) . '/Notify/Config.php';

if (file_exists(dirname(__FILE__) . '/Config.php')) {
  require_once dirname(__FILE__) . '/Config.php';
} else {
  syslog(LOG_INFO, 'User config not available, using defaults');
}

require_once dirname(__FILE__) . '/Notify/Loader.php';
