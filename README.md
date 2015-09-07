# Notify [![Build Status][travis-image]][travis-url]
Notification library

# Notify
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

### Email

To send an email using Notify

```php
bool Notify\Email::send(string $to, string $subject, string $template [, array $replace ] );
```

There are 4 paramaters used in the send method with the last being optional (depending on how you use the templates).

Here is an example of the parameters
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
