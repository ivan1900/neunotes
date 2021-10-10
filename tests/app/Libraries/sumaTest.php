<?php namespace App\Libraries;

use CodeIgniter\Test\CIUnitTestCase;

class sumaTest extends CIUnitTestCase
{
    public function testSuma()
    {
        $suma = new suma();
        $this->assertSame(4, $suma->exec(3,2));
    }
}