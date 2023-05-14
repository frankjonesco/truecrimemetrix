<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\ImageProcess;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{

    // List public articles
    public function index(){
        $articles = Article::orderBy('id', 'DESC')->where('status', 'public')->get();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    // Show single article index
    public function show(Article $article){

        $article->views = $article->views + 1;
        $article->save();

        $other_articles = Article::orderBy('id', 'DESC')->where('status', 'public')->where('hex', '!=', $article->hex)->get();
        return view('articles.show', [
            'article' => $article,
            'other_articles' => $other_articles
        ]);
    }


    // Admin articles index
    public function adminIndex(){
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('dashboard.articles-index', [
            'articles' => $articles
        ]);
    }

    // View create article form
    public function create(){
        return view('articles/create');
    }

    // Store article in database
    public function store(Request $request, Article $article){
        $form_data = $request->validate([
            'title' => 'required'
        ]);

        $article->create([
            'hex' => Str::random(11),
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'caption' => $request->caption,
            'body' => $request->body,
            'status' => $request->status
        ]);

        return redirect('dashboard/articles')->with('message', 'Article created!');
    }

    // View edit article form
    public function edit(Article $article){

        return view('articles/edit', [
            'article' => $article
        ]);
    }

    // Update article in database
    public function update(Article $article, Request $request){
        $form_data = $request->validate([
            'title' => 'required'
        ]);

        $article->title = $request->title;
        $article->caption = $request->caption;
        $article->body = $request->body;
        $article->status = $request->status;
        
        $article->save();

        return redirect('dashboard/articles')->with('message', 'Article updated!');
    }

    // Show form to select an image to upload
    public function selectImage(Article $article,){
        return view('articles/images-select-image', [
            'article' => $article
        ]);
    }

    // Upload image
    public function uploadImage(Article $article, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $article->saveImage($request);
        }
        
        return redirect('dashboard/articles/'.$article->hex.'/images/crop')->with('message', 'Your image was uploaded. Now let\'s crop it.');
    }

    // Upload images that have been added to the article body
    public function uploadArticleImages(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('media'), $fileName);
      
            $url = asset('media/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    // Crop Image
    public function cropImage(Article $article){
        
        $article->details = compileArticleDetails($article);
        return view('articles.crop-image', [
            'article' => $article
        ]);
    }

    // Render image
    public function renderImage(Article $article, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $article->saveRenderedImage($data);

        return redirect('dashboard/articles')->with('message', 'Your image has been cropped.');
    }

    

}
