<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'db_bills';
    protected $primaryKey = 'bill_id';
    protected $guarded = [];
}
