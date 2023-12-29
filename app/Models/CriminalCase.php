<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCase extends Model
{
    use HasFactory;


    // DATABASE COLUMNS FOR MASS ASSIGNMENT

    protected $fillable = [
        'hex',
        'user_id',
        'category_id',
        'title',
        'slug',
        'short_name',
        'caption',
        'description',
        'state_id',
        'city_id',
        'views',
        'main_image_id',
        'status'
    ];

    

    public function modelData(){
        
        $name = class_basename(__CLASS__);
        $site = new Site();
        return $site->formatModelData($name, 'md', false);

    }




    // ROUTE KEY


    // SET ROUTE KEY NAME

    public function getRouteKeyName(){

        return 'slug';
        
    }


    // RETRIEVE ROUTE KEY VALUE

    public function routeKeyValue(){

        $routeKeyValue = $this->getRouteKeyName();

        return $this->$routeKeyValue;

    }

    
    // RESOURCE LINK URL
    
    public function link($extended_path = null){

        $path = '/'.self::modelData()->directory.'/'.$this->routeKeyValue();

        if($extended_path)
            return $path.'/'.$extended_path;

        return $path;

    }


    // RESOURCE LINK ARIA LABEL

    public function linkLabel(){

        return 'View '.self::modelData()->label.': '.$this->title;
        
    }

}
