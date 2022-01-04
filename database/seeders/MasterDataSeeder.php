<?php

namespace Database\Seeders;

use App\Models\MasterData;
use Illuminate\Database\Seeder;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'value' => 'Deputi Bidang Perkoperasian'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'value' => 'Deputi Bidang Usaha Mikro'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'value' => 'Deputi Bidang Usaha Kecil dan Menengah'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'value' => 'Deputi Bidang Kewirausahaan'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'value' => 'Sekretaris Kementerian'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon2',
            'value' => 'Kepala Biro Management Kinerja, Organisasi, dan SDM Aparatur'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon2',
            'value' => 'Kepala Biro Hukum dan Kerja Sama'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon2',
            'value' => 'Kepala Biro Komunikasi dan Teknologi Infomasi'
        ]);

        MasterData::create([
            'parent_id' => null,
            'category' => 'eselon2',
            'value' => 'Kepala Biro Umum dan Keuangan'
        ]);
    }
}
