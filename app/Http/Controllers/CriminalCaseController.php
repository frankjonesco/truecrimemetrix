<?php

namespace App\Http\Controllers;

use App\Models\CriminalCase;
use Illuminate\Http\Request;

class CriminalCaseController extends Controller
{
    // Admin articles index
    public function adminIndex(){
        $criminal_cases = CriminalCase::orderBy('id', 'DESC')->get();
        return view('dashboard.criminal-cases-index', [
            'criminal_cases' => $criminal_cases
        ]);
    }
}
