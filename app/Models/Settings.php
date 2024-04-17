<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'sitename',
        'refbonus',
        'minwid',
        'maxwid',
        'site_email',
        'smtp_host',
        'smtp_username',
        'smtp_password',
        'smtp_port',
        'Smtp_encryption',
    ];
}
