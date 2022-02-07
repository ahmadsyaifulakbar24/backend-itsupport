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
        ServiceCategory::create([
            'id' => '9f1cee53-0a03-4f3a-be7f-7f9764f08305',
            'category' => 'Permohonan Email',
            'alias' => 'C1',
            'group_id' => '6d02896b-9931-4f34-8923-630c27f5f289',
            'order' => 1,
            
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '9f1cee53-0a03-4f3a-be7f-7f9764f08305',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '9f1cee53-0a03-4f3a-be7f-7f9764f08305',
            'name' => 'Pembuatan Alamat Email',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '9f1cee53-0a03-4f3a-be7f-7f9764f08305',
            'name' => 'Penyampaian',
            'order' => 3
        ]);

        ServiceCategory::create([
            'id' => 'dd0b3bda-8a6d-441d-a61d-286d9c395d71',
            'category' => 'Layanan Zoom Meeting',
            'alias' => 'C2',
            'group_id' => '6d02896b-9931-4f34-8923-630c27f5f289',
            'order' => 2,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'dd0b3bda-8a6d-441d-a61d-286d9c395d71',
            'name' => 'Link Zoom & Open Meeting',
            'order' => 1
        ]);

        ServiceCategory::create([
            'id' => '3dced15b-3c7c-4531-9fa3-e41dac03bd73',
            'category' => 'Layanan Sertifikat Webinar/Diklat (e-sertifikat)',
            'alias' => 'C3',
            'group_id' => '6d02896b-9931-4f34-8923-630c27f5f289',
            'order' => 3,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3dced15b-3c7c-4531-9fa3-e41dac03bd73',
            'name' => 'Penyampaian Informasi dan Kode Kelas',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3dced15b-3c7c-4531-9fa3-e41dac03bd73',
            'name' => 'Publish',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3dced15b-3c7c-4531-9fa3-e41dac03bd73',
            'name' => 'Unduh Sertifikat',
            'order' => 3
        ]);

        ServiceCategory::create([
            'id' => 'aba52261-bedc-4bf6-85f5-c72cd0489eab',
            'category' => 'Fasilitas E-learning',
            'alias' => 'C4',
            'group_id' => '6d02896b-9931-4f34-8923-630c27f5f289',
            'order' => 4,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'aba52261-bedc-4bf6-85f5-c72cd0489eab',
            'name' => 'Create Informasi Kelas Online',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'aba52261-bedc-4bf6-85f5-c72cd0489eab',
            'name' => 'Publish',
            'order' => 2
        ]);

        ServiceCategory::create([
            'id' => 'c805de0a-dfa9-4533-ad14-59cfd938a47e',
            'category' => 'Pengelolaan Website',
            'alias' => 'C5',
            'group_id' => '2b9f8c25-9710-460d-a771-4e5b3b956848',
            'order' => 5,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'c805de0a-dfa9-4533-ad14-59cfd938a47e',
            'name' => 'Konten Berita/Informasi/Narasi',
            'order' => 1
        ]);

        ServiceCategory::create([
            'id' => '3604ae76-1932-4ef1-b13d-9a960b96fbf6',
            'category' => 'Usulan Cetak Sertifikat NIK',
            'alias' => 'C6',
            'group_id' => '6d02896b-9931-4f34-8923-630c27f5f289',
            'order' => 6,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3604ae76-1932-4ef1-b13d-9a960b96fbf6',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3604ae76-1932-4ef1-b13d-9a960b96fbf6',
            'name' => 'Informasi Disetujui/Ditolak',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '3604ae76-1932-4ef1-b13d-9a960b96fbf6',
            'name' => 'Cetak Sertifikat',
            'order' => 3
        ]);

        ServiceCategory::create([
            'id' => 'e2d42bfd-3b86-4b7f-8d16-26c5c229c744',
            'category' => 'Layanan Domain dan Hosting',
            'alias' => 'C7',
            'group_id' => '5f47ba70-563c-4a69-b520-9175095249db',
            'order' => 7,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'e2d42bfd-3b86-4b7f-8d16-26c5c229c744',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'e2d42bfd-3b86-4b7f-8d16-26c5c229c744',
            'name' => 'Pembuatan Domain dan Hosting',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'e2d42bfd-3b86-4b7f-8d16-26c5c229c744',
            'name' => 'Penyampaian',
            'order' => 3
        ]);

        ServiceCategory::create([
            'id' => 'bd9d2f76-4407-49fe-ba08-574eb11ca7cf',
            'category' => 'Layanan Virtual Server',
            'alias' => 'C8',
            'group_id' => '5f47ba70-563c-4a69-b520-9175095249db',
            'order' => 8,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'bd9d2f76-4407-49fe-ba08-574eb11ca7cf',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => 'bd9d2f76-4407-49fe-ba08-574eb11ca7cf',
            'name' => 'Informasi Virtual Server dan Pengelolaan',
            'order' => 2
        ]);

        ServiceCategory::create([
            'id' => '7e87f0ad-f88f-4f5c-a263-10ed133e65f1',
            'category' => 'Layanan File Sharing',
            'alias' => 'C9',
            'group_id' => '5f47ba70-563c-4a69-b520-9175095249db',
            'order' => 9,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '7e87f0ad-f88f-4f5c-a263-10ed133e65f1',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '7e87f0ad-f88f-4f5c-a263-10ed133e65f1',
            'name' => 'Pembuatan File Sharing',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '7e87f0ad-f88f-4f5c-a263-10ed133e65f1',
            'name' => 'Penyampaian',
            'order' => 3
        ]);

        ServiceCategory::create([
            'id' => '916fcde8-e831-478d-9a07-d55f5d2b0f48',
            'category' => 'Layanan Integrasi Sistem Informasi (Internal-External)',
            'alias' => 'C10',
            'group_id' => '2b9f8c25-9710-460d-a771-4e5b3b956848',
            'order' => 10,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '916fcde8-e831-478d-9a07-d55f5d2b0f48',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '916fcde8-e831-478d-9a07-d55f5d2b0f48',
            'name' => 'Agenda Meeting',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '916fcde8-e831-478d-9a07-d55f5d2b0f48',
            'name' => 'Analisa Struktur Data',
            'order' => 3
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '916fcde8-e831-478d-9a07-d55f5d2b0f48',
            'name' => 'Integrasi',
            'order' => 4
        ]);

        ServiceCategory::create([
            'id' => '31ca6873-d375-4b35-a2f6-28ee8b98338f',
            'category' => 'Layanan Jaringan, Komputer dan Komunikasi Data',
            'alias' => 'C11',
            'group_id' => '61b19685-b303-4b14-9341-a2e6776073df',
            'order' => 11,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '31ca6873-d375-4b35-a2f6-28ee8b98338f',
            'name' => 'Penugasan Teknis/ PIC',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '31ca6873-d375-4b35-a2f6-28ee8b98338f',
            'name' => 'Proses Eksekusi dan Bukti',
            'order' => 2
        ]);

        ServiceCategory::create([
            'id' => '82bfed20-619a-4b1c-8831-cd587d3b7d26',
            'category' => 'Layanan Pemeliharaan Sistem Informasi Kementerian',
            'alias' => 'C12',
            'group_id' => '2b9f8c25-9710-460d-a771-4e5b3b956848',
            'order' => 12,
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '82bfed20-619a-4b1c-8831-cd587d3b7d26',
            'name' => 'Disposisi Kabag',
            'order' => 1
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '82bfed20-619a-4b1c-8831-cd587d3b7d26',
            'name' => 'Proses Integrasi',
            'order' => 2
        ]);

        ServiceCategoryStep::create([
            'service_category_id' => '82bfed20-619a-4b1c-8831-cd587d3b7d26',
            'name' => 'Penyampaian',
            'order' => 3
        ]);
    }
}
