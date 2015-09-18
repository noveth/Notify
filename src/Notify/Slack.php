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
    $payload['username'] = Config::$SLACKUSERNAME;

    // You can get your webhook endpoint from your Slack settings
    $curl = curl_init(Config::$SLACKWEBHOOK);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'payload=' . json_encode($payload));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    if ($result === 'ok') {
      return true;
    }
    return false;
  }
}
