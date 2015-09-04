<?php
  define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']);

  require_once dirname(__FILE__) . '/Config.php';
  require_once dirname(__FILE__) . '/Notify/Email.php';
