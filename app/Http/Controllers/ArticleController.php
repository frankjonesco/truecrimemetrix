<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use App\Models\ImageProcess;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Articles index
    public function articlesIndex(){
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
        
        return redirect('dashboard/articles/'.$article->hex.'/images/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
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

        return redirect('dashboard/articles/'.$article->hex)->with('success', 'Your image has been cropped.');
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $image = new ImageProcess();
        $this->image = $image->renderCrop($data, 'articles', $this, 760, 428);
        return $this;  
    }

}
