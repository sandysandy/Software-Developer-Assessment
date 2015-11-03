<?php

require_once 'Claimant.php';

class ClaimantTest extends PHPUnit_Framework_TestCase {

  public $test;

  public function setup() {
    // Age: 16, Gender: male, Benefits: Armed Forces Independence Payment (AFIP), Hours Caring: 20');
    $this->test = new Claimant (16, 'male', ['Armed Forces Independence Payment (AFIP)'], 20);
  }

  public function testEntitlementCheck() {
    $this->assertTrue($this->test->entitlementCheck() == 'yes');
  }
}
?>
