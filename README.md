# Notify [![Build Status][travis-image]][travis-url]
Notification library

## Description
A PHP Library that will be used for sending notifications to multiple providers.

##Implementations

### Current

* Email
* Slack

### Planned

* HipChat

## Requirements

* PHP 5.4+
* CURL

## Installation

### Using Composer

To install Notify with Composer, just add the following to your composer.json file:

```json
{
    "require": {
        "noveth/notify": "0.*"
    }
}
```

or by running the following command:

```shell
composer require noveth/notify
```

## Usage

### Configuration

There is a default configuration included and falls back to if no user configuration is found. To start using a custom configuration rename Config.php.example to Config.php.

### Email

Sending an email with Notify is incredibly simple, you pass 3 parameters and it will return true or false.

```php
bool Notify\Email::send(string $to, string $subject, string $template [, array $replace ] );
```

There are 3 required parameters used in the send method with an optional 4th parameter if you use string replacement in your templates.

Here is an example of the parameters:
```php
// Target email address
$to = 'example@example.com';

// Subject line
$subject = 'An example email';

// Template file name
// You can tell Notify if its a html email or not depending on the file extension
// .html files will automatically be sent as a html email
$template = 'user/registration.html';

// If you use tags in your template this is where you pass what to replace them with
$replace = [
  'test tag' => 'test content'
];
```

### Slack

Notifications can also be sent to slack but requires a bit more setup than using email (dont worry its not too difficult).
To use Slack notifications you need to setup a [webhook](http://slack.com/services/new/incoming-webhook) on your slack team settings first.

Follow the Configuration step above to start using a custom configuration and then add the following lines to your Config.php file.

```php
// Replace {YOUR_ENDPOINT} with the webhook URL provided by slack.
Config::$SLACKWEBHOOK = '{YOUR_ENDPOINT}';
// Replace {NAME_OF_USER} with the user you want the message to be sent as (this can be anything).
Config::$SLACKUSERNAME = '{NAME_OF_USER}';
```

Slack notifications are sent in a similar fashion to Emails but only has 1 required parameter and 1 optional.

```php
bool Notify\Slack::send(string $message [, string $target]);
```

The second parameter can either be a room or a user, this is done by following the syntax below.
If its not sent it will use the default room set in your webhook settings on slack.

```php
$target = '#channel';
$target = '@user';
```

-----

[travis-url]: https://travis-ci.org/noveth/Notify
[travis-image]: https://travis-ci.org/noveth/Notify.svg
