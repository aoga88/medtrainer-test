<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../question8.php';

class TestQuestion8 extends PHPUnit\Framework\TestCase
{
    public function testFizzBuzz()
    {
        $this->assertEquals('FizzBuzz12Fizz', fizzBuzz(0, 3));
        $this->assertEquals('1', fizzBuzz(1, 1));
        $this->assertEquals('FizzBuzz', fizzBuzz(0, 0));
        $this->assertEquals('Buzz11', fizzBuzz(10, 11));
        $this->assertEquals('FizzBuzz', fizzBuzz(null, null));
    }

    public function testFizzBuzzException()
    {
        $this->expectException(InvalidArgumentException::class);
        fizzBuzz(3, 0);
    }
}