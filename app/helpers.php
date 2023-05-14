<?php

use Illuminate\Support\Facades\Config;

    // FORMATTERS

    // Show date
    if(!function_exists('showDateTime')){
        function showDateTime($date){

            $time = $date;
            // May 2, 2023 at 10:52am
            $date_format = 'F j, Y';
            $formatted_date = $date->format($date_format);
            
            $time_format = 'g:ia';
            $formatted_time = $time->format($time_format);

            return $formatted_date.' at '.$formatted_time;
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

