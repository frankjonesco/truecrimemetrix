<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ADMIN INDEX

    public function index(){
        return view('admin.index', [
            'pageHeadings' => [
                'Manage content',
                'View, create, edit and delete your content.'
            ]
        ]);
    }
}
