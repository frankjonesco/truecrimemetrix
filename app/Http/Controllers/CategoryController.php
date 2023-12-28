<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    
    protected $site;

    public function __construct(Site $site){

        $this->site = $site;
        
    }




    // INDEX

    public function index(){

        return view('categories.index', [
            'pageHeadings' => [
                'True crime categories',
                'Categories of true crime cases we have convered.'
            ],
            'categories' => $this->site->categories(true, 4)
        ]);

    }
}
