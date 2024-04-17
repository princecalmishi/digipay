<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_Number extends Model
{
    // use HasFactory;
    protected $table = "accounts";

    protected $fillable = [
        'account_number',
        'user_id',
        'balance',
    ];

}
