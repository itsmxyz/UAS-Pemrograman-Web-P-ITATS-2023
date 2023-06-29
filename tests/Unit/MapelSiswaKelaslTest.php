<?php

namespace Tests\Unit;

use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\SiswaModel;
use PHPUnit\Framework\TestCase;

class MapelSiswaKelaslTest extends TestCase
{
    /**
     * A basic unit kelasSiswaMapelTest example.
     */
    protected $kelasModel, $mapelModel, $siswaModel;
    protected function setUp(): void
    {
        parent::setUp();
        $this->kelasModel = app(KelasModel::class);
        $this->mapelModel = app(MataPelajaranModel::class);
        $this->siswaModel = app(SiswaModel::class);


    }
}
