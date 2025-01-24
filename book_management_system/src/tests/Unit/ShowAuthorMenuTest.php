<?php

use PHPUnit\Framework\TestCase;
use Marnix\BookManagementSystem\Main;

class ShowAuthorMenuTest extends TestCase
{
    public function testShowAuthorMenu()
    {
        $main = new Main();
        $main->showAuthorsForm();

        $output = $this->getActualOutputForAssertion();
        $this->assertStringContainsString("Enter the first name of the author you would like to add:", $output);
    }
}