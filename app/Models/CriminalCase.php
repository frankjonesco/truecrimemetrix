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




    // Relationship to category
    public function topics(){
        return $this->hasMany(Topic::class, 'criminal_case_id', 'id');
    }

    // Relationship to category
    public function articles(){
        return $this->hasMany(Article::class, 'criminal_case_id', 'id');
    }




    public function getFullImage(){
        if(!$this->image){
            return asset('images/no-image.webp');
        }
        elseif(file_exists(public_path('images/criminal-cases/'.$this->hex.'/'.$this->image))){
            return asset('images/criminal-cases/'.$this->hex.'/'.$this->image);
        }
        return asset('images/no-image.webp');
    }

    // Save image (update)
    public function saveImage($request){
        $image = new ImageProcess();
        $this->image = $image->upload($request, 'criminal-cases', $this);
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $image = new ImageProcess();
        $this->image = $image->renderCrop($data, 'criminal-cases', $this, 760, 428);
        return $this;  
    }
}
