<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hex',
        'criminal_case_id',
        'title',
        'status'
    ];


    // ROUTES
    
    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }
}
