<?php

namespace Tests\Unit\Repository;

use App\Models\JenisUsaha;
use App\Repositories\Mysql\JenisUsahaRepository;
use Tests\TestCase;

class JenisUsahaRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // ===================== Positive Test =======================
    public function testCanDisplayAllJenisUsaha()
    {
        $firstData = JenisUsaha::count();
        $countAddData = 5;
        $jenisUsahas = JenisUsaha::factory()->count($countAddData)->create();
        $this->assertCount($firstData + $countAddData, JenisUsaha::get());

        $jenisUsahaRepository = new JenisUsahaRepository(new JenisUsaha);
        $jenisUsaha = $jenisUsahaRepository->getAllData();
        $this->assertCount($firstData + $countAddData, JenisUsaha::get());
    }
    public function testCanDiplayJenisUsahaById()
    {
        $newJenisUsaha = JenisUsaha::factory()->create();

        $jenisUsahaRepository = new JenisUsahaRepository(new JenisUsaha);
        $jenisUsaha = $jenisUsahaRepository->findById($newJenisUsaha->jenis_usaha_id);

        $this->assertInstanceOf(JenisUsaha::class, $jenisUsaha);
        $this->assertEquals($newJenisUsaha->nama, $jenisUsaha->nama);
        $this->assertEquals($newJenisUsaha->jenis_usaha_id, $jenisUsaha->jenis_usaha_id);
    }
    public function testCanCreateJenisUsaha()
    {
        $params = [
            "nama"=>$this->faker->words(2, true),
        ];
        $jenisUsahaRepository = new JenisUsahaRepository(new JenisUsaha);
        $jenisUsaha = $jenisUsahaRepository->saveData($params);

        $this->assertInstanceOf(JenisUsaha::class, $jenisUsaha);
        $this->assertEquals($params['nama'], $jenisUsaha->nama);
    }
    public function testCanUpdateJenisUsaha()
    {
        $paramsUpdate = [
            "nama" => $this->faker->words(2, true),
        ];
        $newJenisUsaha = JenisUsaha::factory()->create();

        $jenisUsahaRepository = new JenisUsahaRepository(new JenisUsaha);

        $jenisUsaha = $jenisUsahaRepository->updateData($newJenisUsaha->jenis_usaha_id, $paramsUpdate);
        
        $this->assertInstanceOf(JenisUsaha::class, $jenisUsaha);
        $this->assertEquals($newJenisUsaha->jenis_usaha_id, $jenisUsaha->jenis_usaha_id);
        $this->assertEquals($paramsUpdate['nama'], $jenisUsaha->nama);
    }
    /**
     * @test
     */
    public function it_can_delete_jenis_usaha()
    {
        $countOldData = JenisUsaha::count();
        $newJenisUsaha = JenisUsaha::factory()->create();
        $this->assertCount($countOldData+1, JenisUsaha::get());

        $jenisUsahaRepository = new JenisUsahaRepository(new JenisUsaha);
        $jenisUsahaRepository->deleteData($newJenisUsaha->jenis_usaha_id);
        $this->assertCount($countOldData, JenisUsaha::get());
    }
}
