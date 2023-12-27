<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteController extends Controller
{


    // VIEW HOME

    public function viewHome(){

        // // Grab settings from database as a list
        // $settings = Site::where('id', 1)->get();

        // // Generate and save config file
        // $filePath = config_path() . '/settings.php';
        // $content = '<?php return ' . var_export($settings, true) . ';';
        // File::put($filePath, $content);

        return view('pages.home', [
            'pageHeadings' => [
                'A true crime corner of the internet',
                'News and statistics on high profile true crime cases.'
            ]
        ]);
    }




    // VIEW ABOUT

    public function viewAbout(){
        return view('pages.about', [
            'pageHeadings' => [
                'About',
                'What we do at '.config('app.name').'.'
            ]
        ]);
    }




    // VIEW CONTACT US

    public function viewContactUs(){
        return view('pages.contact-us', [
            'pageHeadings' => [
                'Contact us',
                'Ask us anything'
            ]
        ]);
    }




    // VIEW OPPORTUNITIES

    public function viewOpportunities(){
        return view('pages.opportunities', [
            'pageHeadings' => [
                'Opportunities',
                'Become a contributer at '.config('app.name').'.'
            ]
        ]);
    }




    // VIEW PRIVACY POLICY

    public function viewPrivacyPolicy(){
        return view('pages.privacy-policy', [
            'pageHeadings' => [
                'Privacy policy',
                'View our privacy policy at '.config('app.name').'.'
            ],
            'navButtons' => [
                [
                    'name' => 'Overview',
                    'scroll-to' => 'overview'
                ],
                [
                    'name' => 'Hosting',
                    'scroll-to' => 'hosting'
                ],
                [
                    'name' => 'General information',
                    'scroll-to' => 'generalInformation'
                ],
                [
                    'name' => 'Data recording',
                    'scroll-to' => 'dataRecording'
                ],
                [
                    'name' => 'Social media',
                    'scroll-to' => 'socialMedia'
                ],
                [
                    'name' => 'Analytics',
                    'scroll-to' => 'analytics'
                ],
                [
                    'name' => 'Plug-ins',
                    'scroll-to' => 'plugins'
                ],
            ],
        ]);
    }




    // VIEW TERMS OF USE

    public function viewTermsOfUse(){
        return view('pages.terms-of-use', [
            'pageHeadings' => [
                'Terms of use',
                'View the terms of use on '.config('app.name').'.'
            ],
            'navButtons' => [
                [
                    'name' => 'Overview',
                    'scroll-to' => 'overview'
                ],
                [
                    'name' => 'Information',
                    'scroll-to' => 'information'
                ],
                [
                    'name' => 'At a glance',
                    'scroll-to' => 'atAGlance'
                ],
                [
                    'name' => 'Terms of use',
                    'scroll-to' => 'termsOfUse'
                ],
                [
                    'name' => 'Liability',
                    'scroll-to' => 'liability'
                ],
                [
                    'name' => 'US users',
                    'scroll-to' => 'usUsers'
                ],
                [
                    'name' => 'Common provisions',
                    'scroll-to' => 'commonProvisions'
                ],
            ]
        ]);
    }




    
}
