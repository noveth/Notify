<?php
class EmailTest extends PHPUnit_Framework_TestCase
{
  public function testNoParams()
  {
    $this->setExpectedException('Exception');
    Notify\Email::send();
  }
}
?>
