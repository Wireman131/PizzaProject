<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Example extends PHPUnit_Extensions_SeleniumTestCase
{
	protected function setUp()
	{
		$this->setBrowser("*chrome");
		$this->setBrowserUrl("http://localhost/");
	}
	public function testMyTestCase()
	{
		$this->open("/anm293/PizzaProject/");
		$this->click("pizzaSize_0");
		$this->click("topping_0");
		$this->type("customerName", "name");
		$this->type("customerAddress", "add");
		$this->type("billAddress", "bill");
		$this->type("customerPhone", "1236547890");
		try {
			$this->assertTrue($this->isTextPresent("Please specify a valid phone number"));
		} catch (PHPUnit_Framework_AssertionFailedError $e) {
			array_push($this->verificationErrors, $e->toString());
		}
		$this->type("customerPhone", "123-654-7890");
		$this->type("customerEmail", "test@test.com");
		$this->click("submit");
																  }
}
?>
