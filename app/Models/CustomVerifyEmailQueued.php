<?php

namespace App\Models;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail;

class CustomVerifyEmailQueued extends VerifyEmail implements ShouldQueue
{
    use Queueable;

}

