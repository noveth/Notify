<?php

Class NotifyEmailTest extends \PHPUnit_Framework_TestCase
{
  public function testSendText()
  {
    $isSent = Notify\Email::send('test@example.com', 'Test subject', 'example.txt');
    $this->assertEquals($isSent, true);
  }
}
