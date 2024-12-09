<?php

use PHPUnit\Framework\TestCase;

require_once 'PasswordGenerator.php';

class PasswordGeneratorTest extends TestCase
{
    public function testGenerateDefaultLengthPassword()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate();
        $this->assertEquals(8, strlen($password));
    }

    public function testGenerateCustomLengthPassword()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate(12);
        $this->assertEquals(12, strlen($password));
    }

    public function testGeneratePasswordWithSpecialCharacters()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate(10, true, false, false);
        $this->assertMatchesRegularExpression('/[!@#$%^&*()\-_=+<>?]/', $password);
    }

    public function testGeneratePasswordWithoutSpecialCharacters()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate(10, false);
        $this->assertDoesNotMatchRegularExpression('/[!@#$%^&*()\-_=+<>?]/', $password);
    }

    public function testGeneratePasswordWithNumbers()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate(10, false, true, false);
        $this->assertMatchesRegularExpression('/[0-9]/', $password);
    }

    public function testGeneratePasswordWithoutUppercase()
    {
        $generator = new PasswordGenerator();
        $password = $generator->generate(10, false, true, false);
        $this->assertDoesNotMatchRegularExpression('/[A-Z]/', $password);
    }

    public function testExceptionForShortPassword()
    {
        $this->expectException(InvalidArgumentException::class);
        $generator = new PasswordGenerator();
        $generator->generate(3);
    }
}
