<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProcess extends Model
{
    use HasFactory;

    protected $table = 'images';

    public function mainImagePath(mixed $resource = null, string $size = '')
    {

        if($resource->main_image){

            $path = 'images/'.$resource->modelData()->directory.'/'.$resource->hex.'/';
            $size = (empty($size) === false) ? $size.'-' : null;
            $filename = $size.$resource->main_image->filename;

            $image_path = $path.$filename;

            if(file_exists(public_path($image_path)))
                return asset($image_path);

            return self::defaultImagePath($size);

        }

        return self::defaultImagePath($size);

    }


    public function imagePath(mixed $resource = null, string $size = '')
    {
        if(self::latestImageForResourceId($resource)){
            
            $path = 'images/'.$resource->modelData()->directory.'/'.$resource->hex.'/';
            $size = (empty($size) === false) ? $size.'-' : null;
            $filename = $size.self::latestImageForResourceId($resource)->filename;

            $image_path = $path.$filename;

            if(file_exists(public_path($image_path)))
                return asset($image_path);

            return self::defaultImagePath($size);

        }

        return self::defaultImagePath($size);
        
    }





    // PATH TO DEFAULT IMAGE

    // This function supplies the full_file_path to the default
    // image. We are able to select the use of the thumbnail 
    // version.

    public function defaultImagePath(string $size = ''){
        $prepend = null;
        if($size === 'tn')
            $prepend = 'tn-';
        return 'images/'.$prepend.'default-image-true-crime-metrix.webp';
    }


    // GET THE LATEST IMAGE FOR THIS RESOURCE

    // This function returns a single image record of the resource
    // we are using or returns NULL if no record exists.

    public function latestImageForResourceId($resource){
        
        $result = ImageProcess::where('resource_model', $resource->modelData('name'))
            ->where('resource_id', $resource->id)
            ->latest()
            ->first();

        if($result)
            return $result;

        return null;

    }


}
