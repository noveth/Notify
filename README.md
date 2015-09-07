# Notify [![Build Status][travis-image]][travis-url]
Notification library

## Description
A PHP Library that will be used for sending notifications to multiple providers.

##Implementations

### Current

* Email

### Planned

* Slack
* HipChat

## Requirements

- PHP 5.4+

## Usage

### Configuration

There is a default configuration included and falls back to if no user configuration is found. To start using a custom configuration rename the Config.php.example to Config.php.

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

-----

[travis-url]: https://travis-ci.org/noveth/Notify
[travis-image]: https://travis-ci.org/noveth/Notify.svg
