<?php

require_once '../src/conditions/wenn.php';

class WennTest extends PHPUnit_Framework_TestCase
{
	public function testWenn()
	{
		$result = '';

		Wenn( 1 === 1, function() use (&$result) {
		    $result = 'Wenn';
		});

		$this->assertEquals('Wenn', $result);
	}

	public function testWennAnsonsten()
	{
		$result = '';

		Wenn( 1 === 2, function() use (&$result){
		    $result = 'Wenn';
		}, Ansonsten( 1 === 1, function() use (&$result) {
		    $result = 'Ansonsten';
		}));

		$this->assertEquals('Ansonsten', $result);

	}

	public function testWennAnsonstenSonst()
	{
		$result = '';

		Wenn( 1 === 2, function() use (&$result) {
		    $result = 'Wenn';
		}, Ansonsten( 1 === 3, function() use (&$result) {
		    $result = 'Ansonsten';
		}), Sonst(function() use (&$result) {
		    $result = 'Sonst';
		}));

		$this->assertEquals('Sonst', $result);
	}
}