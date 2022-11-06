<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nrp' => '85030238',
            'username' => 'BUDI PRABOWO, S.H.',
            'name' => 'BUDI PRABOWO, S.H.',
            'penyidik' => 1
        ]);
        
        DB::table('users')->insert([
            'nrp' => '84060420',
            'username' => 'YUDIAR EKA FASSA',
            'name' => 'YUDIAR EKA FASSA',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '88120828',
            'username' => 'TAUFIK ADI LUKITO, SE',
            'name' => 'TAUFIK ADI LUKITO, SE',
            'penyidik' => 1
        ]);
        DB::table('users')->insert([
            'nrp' => '87020888',
            'username' => 'ERFAN MAOLABAKS',
            'name' => 'ERFAN MAOLABAKS',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '81020779',
            'username' => 'TONI MURDANI',
            'name' => 'TONI MURDANI',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '79020384',
            'username' => 'ABDUL ROJAK',
            'name' => 'ABDUL ROJAK',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '85111825',
            'username' => 'FIDO SUKARTONO PUTRA, SH',
            'name' => 'FIDO SUKARTONO PUTRA, SH',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '87050076',
            'username' => 'IWAN SETIAWAN',
            'name' => 'IWAN SETIAWAN',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '80090910',
            'username' => 'DADANG MULYANA,S.pd',
            'name' => 'DADANG MULYANA,S.pd',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '92050650',
            'username' => 'YUDHANTO JOKO KRISTANTO, S.H.',
            'name' => 'YUDHANTO JOKO KRISTANTO, S.H.',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '85061976',
            'username' => 'LA IDUL, S.H.',
            'name' => 'LA IDUL, S.H.',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '92060877',
            'username' => 'YOGI SM ISKANDAR,S.Kep.,Ners',
            'name' => 'YOGI SM ISKANDAR,S.Kep.,Ners',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '85090259',
            'username' => 'HELMI MURDIANSYAH SYOFYAN',
            'name' => 'HELMI MURDIANSYAH SYOFYAN',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '87051442',
            'username' => 'I GEDE BANGUN SUBARJA',
            'name' => 'I GEDE BANGUN SUBARJA',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '87110464',
            'username' => 'TOFAN HELIYANA',
            'name' => 'TOFAN HELIYANA',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '82120281',
            'username' => 'HENDRIKYANA',
            'name' => 'HENDRIKYANA',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '79020279',
            'username' => 'NANDANG JUNAEDI, SH',
            'name' => 'NANDANG JUNAEDI, SH',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '83081263',
            'username' => 'ALLEN SIMANJORANG',
            'name' => 'ALLEN SIMANJORANG',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '92120465',
            'username' => 'ASEP DIAN PERMANA',
            'name' => 'ASEP DIAN PERMANA',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'nrp' => '84010653',
            'username' => 'WAHONO',
            'name' => 'WAHONO',
            'penyidik' => 1
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'admin',
            'role' => 1,
            'password' => Hash::make('admin'),
        ]);
    }
}
