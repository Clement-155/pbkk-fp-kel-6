<?php

namespace App\Http\Tasks;

// For getting time and date
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LogBackup {
    /**
     * Creates a daily backup of laravel's log
     */
    public function execute(){
        $curTime = Carbon::now();
        File::copy( storage_path('logs/laravel.log'), storage_path('backup/'. $curTime->toDateString() .'laravel.log'));     

    }
}