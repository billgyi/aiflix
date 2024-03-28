<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookie_Dump extends Model
{
    protected $table = 'cookies_dump'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = ['username', 'pk', 'cookie_data', 'useragent','user_ip','target1','target2','target3'];
}
