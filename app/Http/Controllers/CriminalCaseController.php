<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CriminalCase;
use Illuminate\Http\Request;

class CriminalCaseController extends Controller
{
    // PUBLIC METHODS

    // List public criminal_cases
    public function index(){
        $criminal_cases = CriminalCase::orderBy('id', 'DESC')->where('status', 'public')->get();
        return view('criminal-cases.index', [
            'criminal_cases' => $criminal_cases
        ]);
    }

    // Show single criminal_cases index
    public function show(CriminalCase $criminal_case){
        // Increment criminal_case->views
        $criminal_case->views = $criminal_case->views + 1;
        $criminal_case->save();

        // Other criminal_cases
        $other_criminal_cases = CriminalCase::orderBy('id', 'DESC')->where('status', 'public')->where('hex', '!=', $criminal_case->hex)->get();

        return view('criminal-cases.show', [
            'criminal_case' => $criminal_case,
            'other_criminal_cases' => $other_criminal_cases,
            'meta' => [
                'title' => $criminal_case->title.' - True Crime Metrix',
                'description' => truncate(strip_tags($criminal_case->body), 140),
                'image' => 'https://truecrimemetrix.test/images/criminal_case/'.$criminal_case->hex.'/'.$criminal_case->image
            ]
        ]);
    }



    // ADMIN METHODS

    // Admin articles index
    public function adminIndex(){
        $criminal_cases = CriminalCase::orderBy('id', 'DESC')->get();
        return view('criminal-cases.admin-index', [
            'criminal_cases' => $criminal_cases
        ]);
    }

    // View create criminal_case form
    public function create(){
        return view('criminal-cases/create');
    }

    // Store criminal_case in database
    public function store(Request $request, CriminalCase $criminal_case){
        $request->validate([
            'title' => 'required'
        ]);

        $criminal_case->create([
            'hex' => Str::random(11),
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect('dashboard/criminal-cases')->with('message', 'Criminal case created!');
    }

    // View edit criminal_case form
    public function edit(CriminalCase $criminal_case){
        return view('criminal-cases/edit', [
            'criminal_case' => $criminal_case
        ]);
    }

    // Update criminal_case in database
    public function update(CriminalCase $criminal_case, Request $request){
        $request->validate([
            'title' => 'required'
        ]);

        $criminal_case->title = $request->title;
        $criminal_case->status = $request->status;
        
        $criminal_case->save();

        return redirect('dashboard/criminal-cases')->with('message', 'Criminal case updated!');
    }

    // Show form to select an image to upload
    public function selectImage(CriminalCase $criminal_case,){
        return view('criminal-cases/select-image', [
            'criminal_case' => $criminal_case
        ]);
    }

    // Upload image
    public function uploadImage(CriminalCase $criminal_case, Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        if($request->hasFile('image')){
            $criminal_case->saveImage($request);
        }
        
        return redirect('dashboard/criminal-cases/'.$criminal_case->hex.'/images/crop')->with('message', 'Your image was uploaded. Now let\'s crop it.');
    }

    // Crop Image
    public function cropImage(CriminalCase $criminal_case){
        
        $criminal_case->details = compileArticleDetails($criminal_case);
        return view('criminal-cases.crop-image', [
            'criminal_case' => $criminal_case
        ]);
    }

    // Render image
    public function renderImage(CriminalCase $criminal_case, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $criminal_case->saveRenderedImage($data);

        return redirect('dashboard/criminal-cases')->with('message', 'Your image has been cropped.');
    }
}
