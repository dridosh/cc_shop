<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_that_false_is_true()
    {
        $this->assertFalse(false);
    }

    public function test_that_array_has_key_id()
    {
        $this->assertArrayHasKey('id', ['id' => '123']);
    }

    public function test_that_arrays_are_equails()
    {
        $this->assertEquals([1, 1, 1], [1, 1, 1]);
    }
}
