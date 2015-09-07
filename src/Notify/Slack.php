<?php
namespace Notify;
use Notify\Config;

Class Slack
{
  Public static function send($message, $channel = null)
  {
    $payload = [];

    if ($channel !== null) {
      $payload['channel'] = $channel;
    }

    $payload['text'] = $message;
    $payload['username'] = Config\$SLACKUSERNAME;

    // You can get your webhook endpoint from your Slack settings
    $ch = curl_init(Config\$SLACKWEBHOOK);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'payload=' . json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
  }
}
?>
