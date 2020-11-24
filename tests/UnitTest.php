<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UnitTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $request = $this->get('/identifikasi',[
            'gejala' => ['1','4','5']
        ]);
        dd($request);
    }
}