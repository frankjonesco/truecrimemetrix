<?php

use Illuminate\Support\Str;



if (! function_exists('plural_from_model')) {
    function plural_from_model($model)
    {
        $plural = Str::plural(class_basename($model));
 
        return Str::kebab($plural);
    }
}




// RETRIEVAL METHODS


if(!function_exists('environmentIsProduction')){
    function environmentIsProduction(){
            
        if(config('settings.environment') === 'production')
            return true;
        return false;
    }
}

if(!function_exists('explodeCssAssets')){
    function explodeCssAssets(){
        return explode(',', config('settings.css_assets'));
    }
}

if(!function_exists('explodeJsAssets')){
    function explodeJsAssets(){
        return explode(',', config('settings.js_assets'));
    }
}