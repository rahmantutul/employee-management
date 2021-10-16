<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeData=[
            ['id'=>1,'company_id'=>1, 'first_name'=>'Adam', 'last_name'=>'Smith', 'email'=>'Adam@Adam.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>3,'company_id'=>3, 'first_name'=>'Nick', 'last_name'=>'Smith', 'email'=>'Nick@Nick.com', 'phone'=>'0177919727', 'city'=>'Bogura', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>4,'company_id'=>6, 'first_name'=>'Jessi', 'last_name'=>'doe', 'email'=>'Jessi@Jessi.com', 'phone'=>'0177919727', 'city'=>'Rajshahi', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>5,'company_id'=>9, 'first_name'=>'Dou', 'last_name'=>'Smith', 'email'=>'Dou@Dou.com', 'phone'=>'0177919727', 'city'=>'Barishal', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>6,'company_id'=>4, 'first_name'=>'Lora', 'last_name'=>'doe', 'email'=>'Lora@Lora.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>7,'company_id'=>1, 'first_name'=>'Neo', 'last_name'=>'Smith', 'email'=>'Neo@Neo.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>8,'company_id'=>7, 'first_name'=>'Karim', 'last_name'=>'doe', 'email'=>'Karim@Karim.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>9,'company_id'=>12, 'first_name'=>'Leos', 'last_name'=>'Smith', 'email'=>'Leos@Leos.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>10,'company_id'=>8, 'first_name'=>'Oshes', 'last_name'=>'doe', 'email'=>'Oshes@Oshes.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>11,'company_id'=>5, 'first_name'=>'Neto', 'last_name'=>'Smith', 'email'=>'Neto@Neto.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>12,'company_id'=>7, 'first_name'=>'Tokyo', 'last_name'=>'doe', 'email'=>'Tokyo@Tokyo.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>13,'company_id'=>6, 'first_name'=>'Nairobi', 'last_name'=>'Smith', 'email'=>'Nairobi@Nairobi.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>14,'company_id'=>11, 'first_name'=>'Arthor', 'last_name'=>'doe', 'email'=>'Arthor@joArthorhn.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>15,'company_id'=>11, 'first_name'=>'Pertra', 'last_name'=>'Smith', 'email'=>'Pertra@Pertra.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>16,'company_id'=>1, 'first_name'=>'Jessika', 'last_name'=>'doe', 'email'=>'Jessika@Jessika.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
             ['id'=>17 ,'company_id'=>4, 'first_name'=>'Pakaw', 'last_name'=>'Smith', 'email'=>'Pakaw@Pakaw.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
            ['id'=>18,'company_id'=>2, 'first_name'=>'Lorin', 'last_name'=>'doe', 'email'=>'Lorin@Lorin.com', 'phone'=>'0177919727', 'city'=>'Dhaka', 'logo'=>'default.png', 'join_date'=>'14-10-2019','status'=>1 ],
        ];
        Employee::insert($employeeData);
    }
}
