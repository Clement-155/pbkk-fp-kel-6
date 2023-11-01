<?php

namespace App\Http\Tasks;

// For getting time and date
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LogBackup {
    public function execute(){
        $curTime = Carbon::now();
        dd(File::copy( storage_path('logs/laravel.log'), storage_path('backup/'. $curTime->toDateString() .'laravel.log')));     

    }
}