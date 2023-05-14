<?php

use Illuminate\Support\Facades\Config;

    // FORMATTERS

    // Show date
    if(!function_exists('showDate')){
        function showDate($date){
            $date_format = Config::get('date_format');
            return $date->format($date_format);
        }
    }


// Compile article details
if(!function_exists('compileArticleDetails')){
    function compileArticleDetails($article) {
        return [
            'hex' => 'jWDX1QWLXkb',
            'image' => 'iGciAy-1684058759.webp'
        ];
    }
}