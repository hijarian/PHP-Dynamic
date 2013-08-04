<?php
require_once('Dynamic.php');
class DynamicTests extends PHPUnit_Framework_TestCase
{
	/** @test */
  public function CanAssignArbitraryProperties()
	{
		$obj = new Dynamic;
		$obj->key = '666';
		$this->assertEquals(666, $obj->key);
  }

	/** @test */
	public function CanAssignArbitraryFunctions()
	{
		$obj = new Dynamic;
		$obj->add = function ($x, $y) {return $x + $y;};
		$this->assertEquals(3, $obj->add(1,2));
	}

	/** @test */
	public function CanAssignArbitraryCallable()
	{
		$obj = new Dynamic;
		$obj->datetime = array('DateTime', 'createFromFormat');
		$datetime = $obj->datetime('Y-m-d', '2013-08-03');
		$this->assertInstanceOf('DateTime', $datetime);
		$this->assertEquals('2013-08-03', $datetime->format('Y-m-d'));
	}

	/** 
   * @test 
   * @expectedException InvalidArgumentException
   */
	public function ThrowsInvalidArgumentExceptionWhenNonexistentMethodCalled()
	{
		$obj = new Dynamic;
		$obj->nonexistent();
	}

	/** 
   * @test 
   * @expectedException PHPUnit_Framework_Error_Notice
	 * @expectedExceptionMessage Undefined property: Dynamic::$nonexistent
   */
	public function ThrowsInvalidArgumentExceptionWhenNonexistentPropertyRequested()
	{
		$obj = new Dynamic;
		$obj->nonexistent;
	}


	
}

