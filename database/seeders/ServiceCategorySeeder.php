<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use App\Models\ServiceCategoryStep;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $C1 = ServiceCategory::create([
            'category' => 'Permohonan Email',
            'alias' => 'C1'
        ]);
        ServiceCategoryStep::create([
            'service_category_id' => $C1->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C1->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C1->id,
            'name' => 'Verifikasi Permohonan',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C1->id,
            'name' => 'Pembuatan Alamat Email',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C1->id,
            'name' => 'Penyampaian',
            'order' => 5
        ]);

        $C2 = ServiceCategory::create([
            'category' => 'Layanan Zoom Meeting',
            'alias' => 'C2'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C2->id,
            'name' => 'Input Usulan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C2->id,
            'name' => 'Schedule Meeting',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C2->id,
            'name' => 'Penyampaian Link',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C2->id,
            'name' => 'Open Meeting',
            'order' => 4
        ]);

        $C3 = ServiceCategory::create([
            'category' => 'Layanan Sertifikat Webinar/Diklat (e-sertifikat)',
            'alias' => 'C3'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C3->id,
            'name' => 'Upload Flayer',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C3->id,
            'name' => 'Pembuatan Kode Kelas',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C3->id,
            'name' => 'Penyampaian Kode Kelas',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C3->id,
            'name' => 'Publish',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C3->id,
            'name' => 'Unduh Sertifikat',
            'order' => 5
        ]);

        $C4 = ServiceCategory::create([
            'category' => 'Fasilitas E-learning',
            'alias' => 'C4'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C4->id,
            'name' => 'Upload Flayer',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C4->id,
            'name' => 'Create Kelas Online',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C4->id,
            'name' => 'Publish',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C4->id,
            'name' => 'Pelaksanaan E-learning',
            'order' => 4
        ]);

        $C5 = ServiceCategory::create([
            'category' => 'Pengelola Website',
            'alias' => 'C5'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C5->id,
            'name' => 'Upload Berita/Data/Informasi/narasi',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C5->id,
            'name' => 'Create Berita/Informasi/Narasi',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C5->id,
            'name' => 'Publish',
            'order' => 3
        ]);

        $C6 = ServiceCategory::create([
            'category' => 'Usulan Cetak Sertifikat NIK',
            'alias' => 'C6'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Agenda Surat',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Scan Formulir',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Verifikasi data',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Disetujui',
            'order' => 5
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C6->id,
            'name' => 'Cetak Sertifikat',
            'order' => 6
        ]);

        $C7 = ServiceCategory::create([
            'category' => 'Layanan Domain Hosting',
            'alias' => 'C7'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C7->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1 
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C7->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C7->id,
            'name' => 'Verifikasi Permohonan',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C7->id,
            'name' => 'Pembuatan Hosting Domain',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C7->id,
            'name' => 'Penyampaian',
            'order' => 5
        ]);

        $C8 = ServiceCategory::create([
            'category' => 'Pengelola Server Kementerian KUMKM',
            'alias' => 'C8'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C8->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C8->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C8->id,
            'name' => 'Verifikasi Permohonan',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C8->id,
            'name' => 'Pengelolaan',
            'order' => 4
        ]);

        $C9 = ServiceCategory::create([
            'category' => 'Cloud File Sharing',
            'alias' => 'C9'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C9->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C9->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C9->id,
            'name' => 'Verifikasi Permohonan',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C9->id,
            'name' => 'Pembuatan Cloud File Sharing',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C9->id,
            'name' => 'Penyampaian',
            'order' => 5
        ]);

        $C10 = ServiceCategory::create([
            'category' => 'Layanan Integrasi Sistem Informasi (Internal-External)',
            'alias' => 'C10'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Agenda Meeting',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Pertukaran Struktur Data',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Analisa Struktur Data',
            'order' => 5
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C10->id,
            'name' => 'Integrasi',
            'order' => 6
        ]);

        $C11 = ServiceCategory::create([
            'category' => 'Layanan Jaringan Komputer dan Komunikasi Data',
            'alias' => 'C11'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C11->id,
            'name' => 'Penyampaian Keluhan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C11->id,
            'name' => 'Penugasan Teknis',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C11->id,
            'name' => 'Proses Eksekusi',
            'order' => 3
        ]);

        $C12 = ServiceCategory::create([
            'category' => 'Layanan Pemeliharaan Sistem Informasi Kementerian',
            'alias' => 'C12'
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C12->id,
            'name' => 'Upload Surat Permohonan',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C12->id,
            'name' => 'Disposisi Kabag',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C12->id,
            'name' => 'Verifikasi Permohonan',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C12->id,
            'name' => 'Proses Integrasi',
            'order' => 4
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => $C12->id,
            'name' => 'Penyampaian',
            'order' => 5
        ]);
    }
}
