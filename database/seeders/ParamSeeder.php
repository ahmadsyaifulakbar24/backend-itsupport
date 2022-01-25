<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $es11 = Param::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'param' => 'Deputi Bidang Perkoperasian',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es11->id,
            'category' => 'eselon2',
            'param' => 'Sekretaris Deputi Bidang Perkoperasian',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es11->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan dan Pembaruan Perkoperasian',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es11->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pembiayaan dan Penjaminan Perkoperasian',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es11->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengawasan Koperasi',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es11->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan SDM',
            'alias' => null
        ]);

        $es12 = Param::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'param' => 'Deputi Bidang Usaha Mikro',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Sekretaris Deputi Bidang Usaha Mikro',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pembiayaan Usaha Mikro',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Asdep Perlindungan dan Kemudahan Usaha Mikro',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan Rantai Pasok Usaha Mikro',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan Kapasitas Usaha Mikro',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es12->id,
            'category' => 'eselon2',
            'param' => 'Asdep Fasilitasi Hukum dan Konsultasi Usaha',
            'alias' => null
        ]);

        $es13 = Param::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'param' => 'Deputi Bidang Usaha Kecil dan Menengah',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es13->id,
            'category' => 'eselon2',
            'param' => 'Sekretaris Deputi Bidang Usaha Kecil dan Menengah',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es13->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pembiayaan dan Investasi Usaha Kecil dan Menengah',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es13->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan SDM Usaha Kecil dan Menengah',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es13->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan Kawasan dan Rantai Pasok',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es13->id,
            'category' => 'eselon2',
            'param' => 'Asdep Kemitraan dan Peluasan Pasar',
            'alias' => null
        ]);

        $es14 = Param::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'param' => 'Deputi Bidang Kewirausahaan',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Sekretaris Deputi Bidang Kewirausahaan',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Asdep Konsultasi Bisnis dan Pendampingan',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pengembangan Ekosistem Bisnis',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pembiayaan Wirausaha',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es14->id,
            'category' => 'eselon2',
            'param' => 'Asdep Pemetaan Data, Analis, dan Pengkajian Usaha',
            'alias' => null
        ]);

        $es15 = Param::create([
            'parent_id' => null,
            'category' => 'eselon1',
            'param' => 'Sekretaris Kementerian',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Managemen Kinerja, Organisasi, dan SDM Aparatur',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Hukum dan Kerja Sama',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Komunikasi dan Teknologi Informasi',
            'alias' => null
        ]);
        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Umum dan Keuangan',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Hukum dan Kerja Sama',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Komunikasi dan Teknologi Informasi',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => $es15->id,
            'category' => 'eselon2',
            'param' => 'Kepala Biro Umum dan Keuangan',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'email_type',
            'param' => 'Email Personal',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'email_type',
            'param' => 'Email Unit Kerja',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'email_type',
            'param' => 'Email Personal & Unit Kerja',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'class_type',
            'param' => 'Kelas Mandiri',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'class_type',
            'param' => 'Webinar',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'class_type',
            'param' => 'Sosialisasi',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'update_type',
            'param' => 'Profil',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'update_type',
            'param' => 'Regulasi',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'update_type',
            'param' => 'Publikasi',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'update_type',
            'param' => 'Pengumuman',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'complaint_type',
            'param' => 'Jenis Internet',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'complaint_type',
            'param' => 'Perangkat Komputer',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'complaint_type',
            'param' => 'Lain - Lain',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'category_client',
            'param' => 'Swakelola',
            'alias' => 'swakelola'
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'category_client',
            'param' => 'Kontraktual',
            'alias' => 'kontraktual'
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'TOR',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'RAB',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'Persiapan Berkas',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'Proses LPSE',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'Penyelesaian Berkas',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'Proses Verifikasi',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'SPM',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'milestone',
            'param' => 'SP2D (Pencairan)',
            'alias' => null
        ]);

        Param::create([
            'parent_id' => null,
            'category' => 'signature',
            'param' => 'Pejabat Pemberi Tanda Tangan',
            'alias' => null
        ]);
    }
}
