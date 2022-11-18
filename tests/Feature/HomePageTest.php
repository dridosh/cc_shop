<?php

    namespace Tests\Feature;

    use Tests\TestCase;

    class HomePageTest extends TestCase
    {
        /**
         * A basic feature test example.
         *
         * @return void
         */
        public function testHomePageStatus_200()
        {
            $response = $this->get('/');

            $response->assertStatus(200);
        }
    }
