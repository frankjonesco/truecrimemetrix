<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;


    // FORCE TABLE NAME

    protected $table = 'config';



    public function getConfig(){
        return Site::where('id', 1)->first();
    }

}
