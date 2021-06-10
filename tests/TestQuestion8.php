<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../question8.php';

class TestQuestion8 extends PHPUnit\Framework\TestCase
{
    public function testFizzBuzz()
    {
        $this->assertEquals('12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz1617Fizz19BuzzFizz2223FizzBuzz26Fizz2829FizzBuzz3132Fizz34BuzzFizz3738FizzBuzz41Fizz4344FizzBuzz4647Fizz49BuzzFizz5253FizzBuzz56Fizz5859FizzBuzz6162Fizz64BuzzFizz6768FizzBuzz71Fizz7374FizzBuzz7677Fizz79BuzzFizz8283FizzBuzz86Fizz8889FizzBuzz9192Fizz94BuzzFizz9798FizzBuzz', fizzBuzz());
    }

    public function testFizzBuzzEven()
    {
        $this->assertEquals('2', fizzBuzz(2, 2));
    }

    public function testFizzBuzzOdd()
    {
        $this->assertEquals('1', fizzBuzz(1, 1));
    }

    public function testFizzBuzzZero()
    {
        $this->assertEquals('FizzBuzz', fizzBuzz(0, 0));
    }

    public function testFizzBuzzFive()
    {
        $this->assertEquals('Buzz', fizzBuzz(5, 5));
    }

    public function testFizzBuzzThree()
    {
        $this->assertEquals('Fizz', fizzBuzz(3, 3));
    }

    public function testFizzBuzzFifteen()
    {
        $this->assertEquals('FizzBuzz', fizzBuzz(15, 15));
    }

    public function testFizzBuzzFifteenFull()
    {
        $response = fizzBuzz(1, 15);
        $this->assertStringContainsString('FizzBuzz', $response);
        $this->assertStringContainsString('1', $response);
        $this->assertStringContainsString('2', $response);
    }

    public function testFizzBuzzException()
    {
        $this->expectException(InvalidArgumentException::class);
        fizzBuzz(3, 0);
    }
}