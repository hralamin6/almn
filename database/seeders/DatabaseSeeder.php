<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Setup;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorBankDetail;
use App\Models\VendorBusinessDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>'super admin',
            'type'=>'superadmin',
            'mobile'=>'01472583695',
            'status'=>1,
            'email'=>'hralamin2020@gmail.com',
            'password'=>Hash::make('000000')
        ]);
        User::create([
            'name'=>'hr alamin',
            'type'=>'admin',
            'phone'=>'01472583695',
            'email'=>'hralamin2020@gmail.com',
            'email_verified_at' => now(),
            'password'=>Hash::make('000000')
        ]);
        User::create([
            'name'=>'user',
            'type'=>'user',
            'phone'=>'01472583695',
            'email'=>'user@gmail.com',
            'email_verified_at' => now(),
            'password'=>Hash::make('000000')
        ]);
        Setup::factory()->count(1)->create();
        \App\Models\Admin::factory(1)->create([
        ])->each(function ($user){
            Vendor::factory(1)->create([
                'admin_id' => $user->id,
            ])->each(function ($vendor){
                VendorBusinessDetail::factory(1)->create([
                    'vendor_id' => $vendor->id,
                    ]);
                VendorBankDetail::factory(1)->create([
                    'vendor_id' => $vendor->id,
                ]);
            });
        });

//        $this->call(DivisionSeeder::class);
//        $this->call(DistrictSeeder::class);
//        $this->call(UpazilaSeeder::class);
//        $this->call(UnionSeeder::class);
    }
}
