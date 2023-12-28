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
            'categories' => $this->site->categories(true, 12)
        ]);

    }




    // ADMIN INDEX

    public function adminIndex(){

        return view('categories.admin-index', [
            'pageHeadings' => [
                'Manage categories',
                'Manage the categories on '.config('app.title')
            ],
            'categories' => $this->site->categories(true, 12)
        ]);

    }




// END OF CLASS

}
