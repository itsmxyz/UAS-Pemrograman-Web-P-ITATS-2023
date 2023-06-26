<?php


use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\SenseiModel;

class SenseiModelTest extends TestCase
{
    protected $senseiModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->senseiModel = app(SenseiModel::class);
    }
    public function testAllSensei()
    {
        $allSensei = $this->senseiModel->getAll();
        $this->assertNotEmpty($allSensei);
        print "Sensei : " . $allSensei;
    }
    public function testJumlahSensei()
    {
        $jumlahSensei = $this->senseiModel->jumlahSensei();
        $this->assertGreaterThan(0, $jumlahSensei);
        print "    //Jumlah Sensei : " . $jumlahSensei;
    }
}
