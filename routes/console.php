<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Schedule::command('model:prune')->daily();

Schedule::command('model:prune', [
    '--model' => [\App\Models\Login::class],
    '--except' => [\App\Models\User::class],
])->daily();
