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
        Param::create( [
            'id'=>'07f5280f-3989-4373-ae44-6e58529d5803',
            'category'=>'update_type',
            'param'=>'Press Release',
        ]);

        Param::create( [
            'id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54',
            'category'=>'eselon1',
            'param'=>'Sekretariat Kementerian',
        ]);
        
        Param::create( [
            'id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Kewirausahaan',
        ]);

        Param::create( [
            'id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Usaha Kecil dan Menengah',
        ]);
        
        Param::create( [
            'id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Perkoperasian',
        ]);

        Param::create( [
            'id'=>'0cadb613-df3c-4a6d-ac85-b9984bb2a534',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Asdep Perlindungan dan Kemudahan Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'0dd6ed72-8335-41a6-8ec1-8fe9172c721d',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
        ]);
                    
        Param::create( [
            'id'=>'0e035bf5-6859-4c1c-b56a-7440e3a08c75',
            'parent_id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54',
            'category'=>'eselon2',
            'param'=>'Biro Managemen Kinerja, Organisasi, dan SDM Aparatur',
        ]);
                    
        Param::create( [
            'id'=>'16d457d9-a7f7-454f-9b55-2f9df6b0f4c9',
            'category'=>'email_type',
            'param'=>'Email Unit Kerja',
        ]);
                    
        Param::create( [
            'id'=>'2368c775-d8cb-43b1-ba11-eb9c70825dec',
            'category'=>'update_type',
            'param'=>'Warta KUKM',
        ]);
                    
        Param::create( [
            'id'=>'292847ea-0a9c-400a-b88e-2a9c6cde6d82',
            'category'=>'update_type',
            'param'=>'Pengumuman',
        ]);
                    
        Param::create( [
            'id'=>'2f8b52b0-8f9c-49d4-bcc3-38ba8d284c52',
            'category'=>'complaint_type',
            'param'=>'Perangkat Komputer',
        ]);
                    
        Param::create( [
            'id'=>'3248b87f-918b-42bd-bd0f-4ac817fb14f9',
            'parent_id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Kawasan dan Rantai Pasok',
        ]);
                    
        Param::create( [
            'id'=>'33436235-314a-4e58-9acb-e6d6e603b164',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Asdep Konsultasi Bisnis dan Pendampingan',
        ]);
                    
        Param::create( [
            'id'=>'39773481-e283-433e-905a-1737dbd6dbd5',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'3d71c14d-382f-4c0a-acf2-60722b3878f3',
            'category'=>'milestone',
            'param'=>'SP2D (Pencairan)',
        ]);
                    
        Param::create( [
            'id'=>'42680c4b-5bb8-4fa8-9f25-fe1b3580c2fe',
            'category'=>'milestone',
            'param'=>'TOR',
        ]);
                    
        Param::create( [
            'id'=>'471f96be-9d05-4efb-aa4c-d4487bb309db',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'4d639985-efec-4f9e-a208-b5966e1b5873',
            'category'=>'class_type',
            'param'=>'Kelas Mandiri',
        ]);
                    
        Param::create( [
            'id'=>'52833bfe-c0e6-45c9-9b75-ca1deddea902',
            'category'=>'category_client',
            'param'=>'Kontraktual',
            'alias'=>'kontraktual'
        ]);
                    
        Param::create( [
            'id'=>'54a9adf1-0b40-43ad-8370-222317b994b1',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Kapasitas Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'651d82d6-5633-4c99-99a8-ed85c8b305f6',
            'category'=>'milestone',
            'param'=>'SPM',
        ]);
                    
        Param::create( [
            'id'=>'65d0dcd5-3b10-4945-9b02-306e67bb7590',
            'parent_id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon2',
            'param'=>'Asdep Pengawasan Koperasi',
        ]);
                    
        Param::create( [
            'id'=>'6be8e756-f65c-42fc-8c81-506410a6a82e',
            'category'=>'milestone',
            'param'=>'Proses LPSE',
        ]);
                    
        Param::create( [
            'id'=>'739a3ea6-5b23-4271-a7a6-bb7500c198c4',
            'category'=>'update_type',
            'param'=>'Regulasi',
        ]);

        Param::create( [
            'id'=>'e1f9569c-f944-4e15-8c0c-6da732fe74f7',
            'category'=>'update_type',
            'param'=>'Banner',
        ]);
                    
        Param::create( [
            'id'=>'7502fbe5-0a18-4737-bb5a-bda4167c2522',
            'category'=>'milestone',
            'param'=>'Proses Verifikasi',
        ]);
                    
        Param::create( [
            'id'=>'77138a3c-2b29-4a7e-a830-0ca679a2a84f',
            'category'=>'complaint_type',
            'param'=>'Jenis Internet',
        ]);
                    
        Param::create( [
            'id'=>'7e17e767-3322-4ba7-b01d-2ea48e283827',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Kewirausahaan',
        ]);
                    
        Param::create( [
            'id'=>'89ee5fc4-e76d-48bb-a69c-497876780d53',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Rantai Pasok Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'8e93c75c-f4af-44a1-a417-8993064407bf',
            'category'=>'email_type',
            'param'=>'Email Personal',
        ]);
                    
        Param::create( [
            'id'=>'8f919511-fc14-4c62-9b4e-2fb715a2ceff',
            'parent_id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan SDM Usaha Kecil dan Menengah',
        ]);
                    
        Param::create( [
            'id'=>'91d2b86b-70f0-4003-9e00-0321876c867b',
            'category'=>'class_type',
            'param'=>'Webinar',
        ]);
                    
        Param::create( [
            'id'=>'950dd79f-d31c-4d79-9de7-e973e21496d7',
            'parent_id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54',
            'category'=>'eselon2',
            'param'=>'Biro Komunikasi dan Teknologi Informasi',
        ]);
                    
        Param::create( [
            'id'=>'961acdba-f101-4a34-930d-377ed90b7941',
            'parent_id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Perkoperasian',
        ]);
                    
        Param::create( [
            'id'=>'9dd06969-e807-4be9-a2a4-76a604018e59',
            'category'=>'milestone',
            'param'=>'RAB',
        ]);
                    
        Param::create( [
            'id'=>'a024f62f-70de-437a-a6bf-9ef6ec5990a6',
            'parent_id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan dan Penjaminan Perkoperasian',
        ]);
                    
        Param::create( [
            'id'=>'a6489f34-25fd-49f0-b957-1a1ccdddd0e7',
            'category'=>'milestone',
            'param'=>'Penyelesaian Berkas',
        ]);
                    
        Param::create( [
            'id'=>'a820eae3-da9a-403a-8aa8-2313c7ce2c27',
            'parent_id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54',
            'category'=>'eselon2',
            'param'=>'Biro Umum dan Keuangan',
        ]);
                    
        Param::create( [
            'id'=>'a998cfd3-edd7-42b1-a40d-e954612cd0dc',
            'category'=>'email_type',
            'param'=>'Email Personal & Unit Kerja',
        ]);
                    
        Param::create( [
            'id'=>'ad9c38df-1144-42c2-ad4d-8ca0610fe355',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Asdep Pemetaan Data, Analis, dan Pengkajian Usaha',
        ]);
                    
        Param::create( [
            'id'=>'b05ca446-0110-4e87-9b00-b2d5cd7f2652',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Ekosistem Bisnis',
        ]);
                    
        Param::create( [
            'id'=>'b0e0eba8-79dc-4eaa-959e-2bb24991117c',
            'category'=>'complaint_type',
            'param'=>'Lain - Lain',
        ]);
                    
        Param::create( [
            'id'=>'b335c354-0790-4f5c-9c72-4d1972adf943',
            'parent_id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan Wirausaha',
        ]);
                    
        Param::create( [
            'id'=>'bdf6e348-d5af-4923-becf-47938af5ffd1',
            'parent_id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54',
            'category'=>'eselon2',
            'param'=>'Biro Hukum dan Kerja Sama',
        ]);
                    
        Param::create( [
            'id'=>'d1a79cea-306b-466b-86ec-758e75fc4d04',
            'parent_id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon2',
            'param'=>'Asdep Kemitraan dan Peluasan Pasar',
        ]);
                    
        Param::create( [
            'id'=>'d7ea0099-7b78-492a-95e7-5974b4bca663',
            'parent_id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan SDM',
        ]);
                    
        Param::create( [
            'id'=>'dc244221-1b8f-460a-91d8-275737220b96',
            'parent_id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan dan Investasi Usaha Kecil dan Menengah',
        ]);
                    
        Param::create( [
            'id'=>'e07433c3-0bd0-4ab6-bd80-e78b895f6ee3',
            'category'=>'class_type',
            'param'=>'Sosialisasi',
        ]);
                    
        Param::create( [
            'id'=>'e350c0a1-fc81-42c5-a837-8368432ad77b',
            'parent_id'=>'4e28d897-aa56-444c-b863-c2485829b558',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Usaha Kecil dan Menengah',
        ]);
                    
        Param::create( [
            'id'=>'ec684706-7552-449c-be4b-a67e8fd094ac',
            'parent_id'=>'17346c83-ba0b-472b-9627-15b387a60542',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan dan Pembaruan Perkoperasian',
        ]);
                    
        Param::create( [
            'id'=>'f1684ece-a527-43f7-8cfd-e04b411c4ae0',
            'parent_id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114',
            'category'=>'eselon2',
            'param'=>'Asdep Fasilitasi Hukum dan Konsultasi Usaha',
        ]);
                    
        Param::create( [
            'id'=>'f893ff3e-e771-4583-a376-186c492ba4c7',
            'category'=>'milestone',
            'param'=>'Persiapan Berkas',
        ]);
                    
        Param::create( [
            'id'=>'ffeb81d6-b91f-4648-88a0-e329ee068995',
            'category'=>'category_client',
            'param'=>'Swakelola',
            'alias'=>'swakelola'
        ]);

        Param::create( [
            'id'=>'2b9f8c25-9710-460d-a771-4e5b3b956848',
            'category'=>'service_category_group',
            'param'=>'Software',
        ]);

        Param::create( [
            'id'=>'5f47ba70-563c-4a69-b520-9175095249db',
            'category'=>'service_category_group',
            'param'=>'Hardware, Server dan Hosting',
        ]);

        Param::create( [
            'id'=>'61b19685-b303-4b14-9341-a2e6776073df',
            'category'=>'service_category_group',
            'param'=>'Network',
        ]);

        Param::create( [
            'id'=>'6d02896b-9931-4f34-8923-630c27f5f289',
            'category'=>'service_category_group',
            'param'=>'Layanan TIK',
        ]);
    }
}
