<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;
    protected $fillable= ['id','company_id','first_name', 'last_name', 'email', 'phone', 'city','join_date','logo','status' ];

    /**
         * Get the user that owns the Employee
         *
         * @return \Illuminate\Database\Eloquent\Relations\
         */
        public function company()
        {
            return $this->belongsTo('App\Models\Company', 'company_id');
        }
}
