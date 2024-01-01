<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Str;
use App\Models\ImageProcess;
use App\Models\CriminalCase;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    protected $site, $image;


    public function __construct(Site $site, ImageProcess $image){
        $this->site = $site;
        $this->image = $image;
    }
    
    public function cropImage($directory = null, $hex, ImageProcess $image, $set_as_main = null)
    {      
        $model_name = Str::studly(Str::singular($directory));
        $model = $image->resourceModel($model_name);
        
        $this->site->injectMetadata('Crop image', true, null, true);
        

        return view('admin.resources.crop-image', [
            'pageHeadings' => [
                'Crop image',
                'Select the area of the image you want to use.'
            ],
            'resource' => $model->where('hex', $hex)->first(),
            'image' => $image,
            'set_as_main' => ($set_as_main === null ? false : true)
        ]);
    }




    // RENDER IMAGE 

    public function renderImage($directory, $hex, ImageProcess $image, Request $request){

        $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $model_name = Str::studly(Str::singular($directory));
        $model = $image->resourceModel($model_name);

        $resource = $model->where('hex', $hex)->first();
        
        if($request->set_as_main){
            $resource->main_image_id = $image->id;
            $resource->save();
        }

        $image->renderCrop($request, $resource, $directory, $image);

        $image->bg_position = $request->bg_position;
        $image->caption = $request->caption;
        $image->copyright = $request->copyright;
        $image->copyright_link = $request->copyright_link;
        $image->save();

        return redirect($resource->link())->with('toast', 'Image cropped!');

    }
}
