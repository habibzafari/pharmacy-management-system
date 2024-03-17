<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinesModel extends Model
{
    use HasFactory;

    protected $table = "medicines";

    static public function getSingle($id)
    {
        return self::findorfail($id);
    }

    static public function getAllRecords()
    {
        // return self::get();
        return self::where('is_delete', 0)->orderBy('created_at', 'desc')->get();
    }

    // static public function deleteRecord($id)
    // {
    //     return self::findorfail($id)->delete();
    // }
}
