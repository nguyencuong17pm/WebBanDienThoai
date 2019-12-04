<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_Details extends Model
{
    protected $table = 'db_bill_details';
    protected $primaryKey = 'bd_id';
    protected $guarded = [];
}
