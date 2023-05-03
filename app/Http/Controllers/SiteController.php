<?php

namespace App\Http\Controllers;

use Carbon;
use App\Models\Criminal;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('home');
    }

    public function viewCriminals(){
        return view('criminals/index');
    }

    public function createCriminal(){
        return view('criminals/create');
    }

    public function storeCriminal(Request $request){
        $form_data = $request->validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'dob_day' => 'numeric|min:2|max:2',
            'dob_month' => 'numeric|min:2|max:2',
            'dob_year' => 'numeric|min:4|max:4'
        ]);

        $date_of_birth = $form_data['dob_day'].'-'.$form_data['dob_month'].'-'.$form_data['dob_year'];

        $criminal = new Criminal();

        $criminal->first_name = $form_data['first_name'];
        $criminal->last_name = $form_data['last_name'];
        $criminal->date_of_birth = $form_data['date_of_birth'];
        

        $criminal->save();
    }
}
