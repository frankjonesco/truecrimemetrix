<?php


/*******************************/
/* ASSET BUILDS FOR PRODUCTION */
/*******************************/



// CHECH IF ENVIRONMENT IS PRODUCTION

if(!function_exists('environmentIsProduction')){

    function environmentIsProduction(){
            
        if(config('settings.environment') === 'production')
            return true;

        return false;

    }

}


// RETURN ARRAY OF CSS ASSETS

if(!function_exists('explodeCssAssets')){

    function explodeCssAssets(){

        return explode(',', config('settings.css_assets'));

    }

}


// RETRURN ARRAY OF JS ASSETS

if(!function_exists('explodeJsAssets')){

    function explodeJsAssets(){

        return explode(',', config('settings.js_assets'));

    }

}