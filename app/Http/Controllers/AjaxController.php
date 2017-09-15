<?php

namespace App\Http\Controllers;

use App\Branch;
use App\ProblemRequest;
use App\Zone;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AjaxController extends Controller
{
    public function showZone(){
        $zones = Zone::where('region_id', '=', Input::get('region_id'))->get();
        return view('ajax.showZone', compact('zones'));
    }
    public function showBranch(){
        $branches = Branch::where('zone_id', '=', Input::get('zone_id'))->get();
        return view('ajax.showBranch', compact('branches'));
    }

    public function assignBy(){
        $request = ProblemRequest::findOrFail(Input::get('request_id'));
        if(Input::get('assign_by_id') != '')
        {
            $request->update(['assign_by_id' => Input::get('assign_by_id'), 'assign_given_by_id' => Auth::user()->id]);
        }
        else
        {
            $request->update(['assign_by_id' => NULL, 'assign_by_seen' => NULL, 'assign_given_by_id' => Auth::user()->id]);
        }
        if(!empty($request->assign->name))
        {
            echo $request->assign->name;
        }
        else
        {
            echo 0;
        }

    }
    public function makeSuccess(){
        $request = ProblemRequest::findOrFail(Input::get('request_id'));
        $request->update(['status_id' => 4, 'accomplished_by_id' => Auth::user()->id]);
        echo $request->status->name;
    }
    public function makeCancel(){
        $request = ProblemRequest::findOrFail(Input::get('request_id'));
        $request->update(['status_id' => 3, 'accomplished_by_id' => Auth::user()->id]);
        echo $request->status->name;
    }
}
