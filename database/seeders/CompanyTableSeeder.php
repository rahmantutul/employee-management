<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $companyData=[
            ['id'=>1 , 'name'=>'ACI', 'email'=>'aci@aci.com', 'website'=>'www.aci.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>2 , 'name'=>'Insepta', 'email'=>'Insepta@Insepta.com', 'website'=>'www.Insepta.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>3 , 'name'=>'Opsonin', 'email'=>'Opsonin@Insepta.com', 'website'=>'www.Opsonin.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>4 , 'name'=>'Health care', 'email'=>'Health@Insepta.com', 'website'=>'www.care.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>5 , 'name'=>'Acquaint', 'email'=>'Acquaint@Acquaint.com', 'website'=>'www.Acquaint.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>6 , 'name'=>'Delta', 'email'=>'Delta@Delta.com', 'website'=>'www.Delta.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>7 , 'name'=>'PHP', 'email'=>'PHP@PHP.com', 'website'=>'www.PHP.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>8 , 'name'=>'Aroma', 'email'=>'Aroma@Aroma.com', 'website'=>'www.Aroma.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>9 , 'name'=>'Compare Quick', 'email'=>'Compare@Compare.com', 'website'=>'www.Compare.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>10, 'name'=>'Discover', 'email'=>'Discover@Discover.com', 'website'=>'www.Discover.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>11, 'name'=>'Samsung', 'email'=>'Samsung@InseSamsungpta.com', 'website'=>'www.Samsung.com', 'logo'=>'default.png','status'=>1 ],
            ['id'=>12, 'name'=>'Walton care', 'email'=>'Walton@Walton.com', 'website'=>'www.care.com', 'logo'=>'default.png','status'=>1 ],
        ];
        Company::insert($companyData);
    }
}
