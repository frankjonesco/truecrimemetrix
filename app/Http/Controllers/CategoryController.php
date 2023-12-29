<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{

    protected $site, $model, $directory, $label, $plural, $viewAssets, $toast;


    public function __construct(){

        $this->site = new Site();
        $this->model = $this->site->formatModelData('Category', 'md');
        $this->directory = $this->model->directory;
        $this->label = $this->model->label;
        $this->plural = $this->model->plural;
        $this->toast = "Good!";
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
        
    }




    // INDEX


    public function index(){

        return view('categories.index', [
            'pageHeadings' => [
                'True crime categories',
                'Categories of true crime cases we have convered.'
            ],
            'categories' => $this->site->categories(true, 12, 'public')
        ]);

    }




    // SHOW SING CATEGORY


    public function show(Category $category){

        return view('categories.show', [
            'pageHeadings' => [
                $category->name,
                $category->description
            ]
        ]);

    }




    // ADMIN INDEX


    public function adminIndex(){

        Meta::setTitle('Admin: Categories - '.config('app.name'))
            ->addMeta('robots', ['content' => 'noindex']);

        return view('admin.resources.index', [
            'pageHeadings' => [
                'Manage categories',
                'Manage the categories on '.config('app.name')
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'categories' => $this->site->categories(true, 12)
        ]);
            
    }




    // VIEW CREATE FORM
    

    public function create(){

        Meta::setTitle('Create category - '.config('app.name'))
            ->addMeta('robots', ['content' => 'noindex']);

        return view('admin.resources.create', [
            'pageHeadings' => [
                'Create a category',
                'Add a new criminal category on '.config('app.name')
            ],
            'form_fields' => [
                'input-name',
                'textarea-description',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets
        ]);

    }




    // STORE IN DATABASE


    public function store(Request $request){

        $request->merge([
            'hex' => Str::random(11),
            'user_id' => auth()->id(),
            'slug' => Str::slug($request->name),
        ]);

        $resource = $request->validate([
            'hex' => 'required|unique:categories,hex',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required',
            'status' => 'required'
        ]);

        $resource = Category::create($resource);

        return redirect('admin/'.$this->directory)->with('toast', $this->toast);
        
    }




    // VIEW EDIT FORM
    

    public function edit(Category $category){

        Meta::setTitle('Edit category: '.$category->name.' - '.config('app.name'))
            ->addMeta('robots', ['content' => 'noindex']);

        return view('admin.resources.edit', [
            'pageHeadings' => [
                'Edit category',
                'Update the information for this category.'
            ],
            'form_fields' => [
                'input-name',
                'textarea-description',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets, 
            'resource' => $category
        ]);

    }




    // UPDATE RESOURCE IN DATABASE

    public function update(Category $category, Request $request){

        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'slug' => 'required|unique:categories,slug,'.$category->id,
            
            'description' => '',
            'status' => 'required'
        ]);

        $resource = $category;
            
        $resource->name = $request->name;
        $resource->slug = Str::slug($request->name);
        $resource->description = $request->description;
        $resource->status = $request->status;
            
        $resource->save();

        return redirect('admin/'.$this->directory)->with('toast', $this->toast);
            
    }




    // VIEW CONFIRM DELETE FORM

    public function confirmDelete(Category $category){

        Meta::setTitle('Delete category: '.$category->name.' - '.config('app.name'))
            ->addMeta('robots', ['content' => 'noindex']);

        return view('admin.resources.confirm-delete', [
            'pageHeadings' => [
                'Delete category',
                'Are you sure you want to delete this '.$this->label
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'resource' => $category
            
        ]);
    }




    // DESTROY DATABASE RECORD AND DELETE IMAGE DIRECTORY

    public function destroy(Category $category, Request $request){

        $request->validate([
            'resource' => 'required'
        ]);

        $resource = $category;

        $resource->delete();

        File::deleteDirectory(public_path('images/'.$this->directory.'/'.$resource->routeKeyValue()));

        return redirect('admin/'.$this->directory)->with('toast', $this->toast);

    }




// END OF CLASS

}
