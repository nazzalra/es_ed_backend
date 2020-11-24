<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SkenarioIdentifikasiTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    
    /** @test */
    public function skenario_identifikasi_1()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,1,4,5]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_2()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,4,5]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_3()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,2,14,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_4()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,2,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1,2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_5()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,1,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1,2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_6()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,1,4,5,10,9]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_7()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,4,5,10,9]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_8()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,4,5,10,11,9,13,17]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.9,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(1,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_9()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_10()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,1]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_11()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,2]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1,2]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_12()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,2,14]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_13()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,2,14,13]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_14()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,2,14,13]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2,3]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_15()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,17]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_16()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,4,5,17]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_17()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,1,4,5,12,9]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_18()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [7,1,4,5,10,11,9,13]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_19()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,2]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_20()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [6,2,14,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1,2]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_21()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,2]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2,3]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_22()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,3]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[3]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_23()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,1]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.2,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.4,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_24()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,2,14,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_25()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,2,14,4,5,10,9]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[1]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_26()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,2,14,13]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[3]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_27()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,2,14,4,5,10,11,12,13]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_28()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,3,14,13,15,18]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[3]);
        $this->assertGreaterThanOrEqual(0.7,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.9,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_29()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,3,14,4,5,10]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
    /** @test */
    public function skenario_identifikasi_30()
    {
        $response = $this->call('GET', '/identifikasi', ['gejala' => [8,3,14,4,5,10,11,12]]);
        $this->assertEquals(array_column($response->getData()->gangguan,'id'),[2]);
        $this->assertGreaterThanOrEqual(0.4,$response->getData()->nilai_keyakinan);
        $this->assertLessThan(0.7,$response->getData()->nilai_keyakinan);
    }
}
