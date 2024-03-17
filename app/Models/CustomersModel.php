<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    use HasFactory;

    protected $table = 'customers';

    static public function getAllRecords()
    {
        // return self::get();
        return self::orderBy('created_at', 'desc')->get();  
    }

    static public function getSingle($id)
    {
        return self::findorfail($id);
    }
}
