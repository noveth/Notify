<?php
require_once dirname(__FILE__) . '/src/Notify.php';

   $vars = [
        "{client_name}" => 'Norvert john Abella',
        "{client_first_name}" => 'Norvert john',
        "{client_last_name}" => 'Abella',
        "{client_email}" => 'noveth2012@gmail.com',
        "{service}" => 'Blogger Outreach Program',
        "{link}" => 'https://www.google.com.ph'
    ];

    $template = Notify\Email::send('noveth2012@gmail.com', 'Sample Notification', 'fatjoe.html', $vars);
    if ($template) {
      echo "string";
    }
?>
