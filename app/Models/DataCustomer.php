<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCustomer extends Model
{
    public $table = 'datacustomer';
    public $fillable = [
        'nama',
        'posisi',
        'perusahaan',
        'email',
        'telp',
    ];
}
