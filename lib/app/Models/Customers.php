<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'db_customers';
    protected $primaryKey = 'cus_id';
    protected $guarded = [];
}
