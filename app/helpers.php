<?php

use Illuminate\Support\Str;
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


    // Truncate
    if(!function_exists('truncate')){
        function truncate($str, $limit = 45) {
            return Str::limit($str, $limit);
        }
    }


    // Compile article details
    if(!function_exists('countArticles')){
        function countArticles($item) {
            if(count($item->articles) === 1){
                return count($item->articles).' article';
            }
            return count($item->articles).' articles';
        }
    }

