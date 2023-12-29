<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    protected $site, $model, $toast, $viewAssets;

    
    public function __construct(){

        $this->site = new Site();
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
        
    }




    // ADMIN INDEX


    public function index(){

        Meta::prependTitle('Manage content');

        return view('admin.index', [
            'pageHeadings' => [
                'Manage content',
                'View, create, edit and delete your content.'
            ],
            'categories' => $this->site->categories(true, 12),
            'viewAssets' => $this->viewAssets
        ]);

    }




    // VIEW DATABASES


    public function viewDatabases(){

        return view('admin.databases', [
            'pageHeadings' => [
                'Manage databases',
                'Clone the '.config('app.name').' database to import.'
            ],
            'viewAssets' => $this->viewAssets
        ]);

    }




    // CLONE DATABASE

    public function cloneDatabase(){

        
        // EMPTY IMPORT DATABASE

        Artisan::call('migrate:fresh --database="mysql_import"');
        


        // BUILD ARRAY OF TABLE IN LIVE DATABASEs

        $db = 'Tables_in_'.env('DB_DATABASE');
        $live_tables = DB::select('SHOW TABLES');
        $copy_tables = [];

        foreach($live_tables as $live_table){
            $copy_tables[] = $live_table->$db;
        }



        // FOR EACH TABLE, COPY THE TABLES TO THE IMPORT DATABASE

        foreach($copy_tables as $i => $copy_table){

            $row_to_copy = DB::connection('mysql')
                ->table($copy_table)
                ->distinct()
                ->select('*')
                ->get()
                ->toArray();

            $row_to_paste = json_decode( json_encode($row_to_copy), true );  

            DB::connection('mysql_import')
                ->table($copy_table)
                ->insert($row_to_paste);       
        }



        // RETURN TO ADMIN WITH TOAST

        return redirect('admin')->with('toast', 'Database copied to import database!');
        

    }




    // VIEW EDIT CONFIG FORM


    public function editConfig(){

        return view('admin.edit-config', [
            'pageHeadings' => [
                'Edit configuration',
                'Global settings for '.config('app.name').'.'
            ],
            'config' => $this->site->getConfig(),
            'viewAssets' => $this->viewAssets
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


        // SAVE TO CONFIG FILE

        $config_array = $config->toArray();
        $filePath = config_path() . '/settings.php';
        $content = '<?php return ' . var_export($config_array, true) . ';';
        File::put($filePath, $content);


        return redirect('admin')->with('toast', 'Configuration updated!');

    }




    // VIEW EDIT ENVIRONMENT FORM


    public function editEnvironment(){

        return view('admin.edit-environment', [
            'pageHeadings' => [
                'Edit environment',
                'Environment settings for '.config('app.name').'.'
            ],
            'config' => $this->site->getConfig(),
            'viewAssets' => $this->viewAssets
        ]);

    }




    // UPDATE ENVIRONMENT

        
    public function updateEnvironment(Request $request){

        $request->validate([
            'environment' => 'required',
            'css_assets' => 'required',
            'js_assets' => 'required',
        ]);

        $config = $this->site->getConfig();

        $config->environment = $request->environment;
        $config->css_assets = $request->css_assets;
        $config->js_assets = $request->js_assets;

        $config->save();

        
        // SAVE TO CONFIG FILE

        $config_array = $config->toArray();
        $filePath = config_path() . '/settings.php';
        $content = '<?php return ' . var_export($config_array, true) . ';';
        File::put($filePath, $content);

        return redirect('admin')->with('toast', 'Environment set to '.$request->environment.'!');

    }




// END OF CLASS

}
