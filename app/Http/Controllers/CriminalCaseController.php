<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CriminalCaseController extends Controller
{

    protected $site, $model, $directory, $label, $plural, $pageHeadings, $viewAssets, $toast;


    public function __construct()
    {
        $this->site = new Site();
        $this->model = $this->site->formatModelData('CriminalCase', 'md');
        $this->pageHeadings = $this->site->getPageHeadings($this->model);
        $this->toast = "Good!";
        $this->viewAssets = (object) array(
            'showAdminNav' => true
        );
        
    }



    
    // INDEX OF RESOURCES


    public function index() : View
    {
        $this->site->injectMetadata(ucfirst($this->model->plural), true, 'List of the true crime cases we have covered. Deep-dive information on the hottest cases in true crime. Statistics and news about upcoming court cases, criminal news stories and data gathering.');

        return view($this->model->directory.'.index', [
            'pageHeadings' => $this->pageHeadings,
            'criminal_cases' => $this->site->criminalCases(true, 12, 'public')
        ]);

    }




// END OF CLASS

}
