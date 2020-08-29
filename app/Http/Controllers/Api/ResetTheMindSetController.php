<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Http\Request;

class ResetTheMindSetController extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $data = [];
        $data['title'] = 'RESET THE MINDSET';
        $data['descripttion'] = 'Few lines of description about this, excerpt or summary from the about us section of this page. this text is used as a placeholder, iska kisi bhi jivit ya mrit vyakti se koi smpark nhi h, iska prayoge keval testing purpose k liye kiya gya hai.';
        $data['options'] = [
            [
                'title' => 'ABOUT',
                'icon' => 'abt',
                'action' => 'Actions.abt()'
            ],
            [
                'title' => 'STOP - TACTICAL BREATHING',
                'icon' => 'stopwatch',
                'action' => 'Actions.stopwatch()'
            ],
            [
                'title' => 'OBSERVE',
                'icon' => 'observe',
                'action' => 'Actions.observe()'
            ],
            [
                'title' => 'OBSERVE/GUIDANCE',
                'icon' => 'guidance',
                'action' => 'Actions.guidance()'
            ],
            [
                'title' => 'SELECT',
                'icon' => 'select',
                'action' => 'Actions.select()'
            ],
            [
                'title' => 'BRIEF',
                'icon' => 'brief',
                'action' => 'Actions.brief()'
            ],
            [
                'title' => 'VISUALIZATION',
                'icon' => 'visual',
                'action' => 'Actions.visual()'
            ],
            [
                'title' => 'BRAIN DUMP',
                'icon' => 'braindump',
                'action' => 'Actions.braindump()'
            ],
            [
                'title' => 'COGNITIVE CRISIS IMMEDIATE HELP',
                'icon' => 'crisishelp',
                'action' => 'Actions.crisishelp()'
            ]
        ];

        return Response::json(['status'=>TRUE,'data'=>$data]);
    }

}