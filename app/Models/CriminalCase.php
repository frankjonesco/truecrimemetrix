<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCase extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hex',
        'title',
        'status'
    ];


    // ROUTES
    
    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }
}
