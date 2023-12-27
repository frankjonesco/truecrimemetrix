<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    protected $site;

    public function __construct(Site $site){

        $this->site = $site;
        
    }





    // ADMIN INDEX

    public function index(){
        return view('admin.index', [
            'pageHeadings' => [
                'Manage content',
                'View, create, edit and delete your content.'
            ]
        ]);
    }




    // VIEW EDIT CONFIG FORM

    public function editConfig(){
        return view('admin.edit-config', [
            'pageHeadings' => [
                'Edit configuration',
                'Global settings for '.config('app.name').'.'
            ],
            'config' => $this->site->getConfig()
        ]);
    }




    // UPDATE CONFIG

    public function updateConfig(Request $request){

        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'meta_author' => '',
            'meta_image' => '',
            'contact_email' => 'required|email',
            'copyright' => 'required',
            'powered_by' => 'required',
            'powered_by_link' => 'required',
            'allow_registration' => '',
            'allow_comments' => '',
            'facebook_url' => '',
            'twitter_url' => '',
            'youtube_url' => '',
            'instagram_url' => '',
            'content_image_width' => 'required',
            'content_image_height' => 'required',
            'pagination_items' => 'required',
            'site_offline' => '',
        ]);

        $config = $this->site->getConfig();
        $config->meta_title = $request->meta_title;
        $config->meta_description = $request->meta_description;
        $config->meta_keywords = $request->meta_keywords;
        $config->meta_author = $request->meta_author;
        $config->meta_image = $request->meta_image;
        $config->contact_email = $request->contact_email;
        $config->copyright = $request->copyright;
        $config->powered_by = $request->powered_by;
        $config->powered_by_link = $request->powered_by_link;
        $config->allow_registration = $request->allow_registration ? true : false;
        $config->allow_comments = $request->allow_comments ? true : false;
        $config->facebook_url = $request->facebook_url;
        $config->twitter_url = $request->twitter_url;
        $config->youtube_url = $request->youtube_url;
        $config->instagram_url = $request->instagram_url;
        $config->content_image_width = $request->content_image_width;
        $config->content_image_height = $request->content_image_height;
        $config->pagination_items = $request->pagination_items;
        $config->site_offline = $request->site_offline ? true : false;

        $config->save();

        // Generate and save config file
        $config_array = $config->toArray();
        $filePath = config_path() . '/settings.php';
        $content = '<?php return ' . var_export($config_array, true) . ';';
        File::put($filePath, $content);

        return redirect('admin')->with('toast', 'Configuration updated!');

    }
}
