<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\View\View;
use App\Models\CriminalCase;
use Illuminate\Http\Request;

class CriminalCaseController extends Controller
{

    protected $site, $model, $directory, $label, $plural, $pageHeadings, $viewAssets, $toast;


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->site = new Site();
        $this->model = $this->site->formatModelData('CriminalCase', 'lg');
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




    // SHOW SINGLE RESOURCE

    public function show(CriminalCase $criminal_case) : View
    {
        return view($this->model->directory.'.show', [
            'pageHeadings' => [
                $criminal_case->title,
                $criminal_case->caption
            ],
            'criminal_case' => $criminal_case
        ]);

    }




    // USER AUTHENTICATION REQUIRED


    // ADMIN INDEX

    public function adminIndex() : View
    {
        $this->site->injectMetadata('Manage '.$this->model->plural, true, null, true);

        return view('admin.resources.index', [
            'pageHeadings' => $this->pageHeadings,
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'criminal_cases' => $this->site->criminalCases(true, 12)
        ]);
    }




    // VIEW CREATE FORM
        
    public function create() : View
    {
        $this->site->injectMetadata('Create '.$this->model->label, true, null, true);

        return view('admin.resources.create', [
            'pageHeadings' => $this->pageHeadings,
            'form_fields' => [
                'input-title',
                'input-short-name',
                'select-category',
                'textarea-description-ck-editor',
                'input-image',
                'select-state',
                'input-city',
                'select-status'
            ],
            'model' => $this->model,
            'viewAssets' => $this->viewAssets,
            'categories' => $this->site->categories(),
            'states' => $this->site->states()
        ]);

    }




// END OF CLASS

}
