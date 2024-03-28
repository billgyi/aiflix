<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookie_Client extends Model
{
    protected $table = 'cookies_client'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = ['username', 'pk', 'cookie_data', 'useragent','user_id'];
}
