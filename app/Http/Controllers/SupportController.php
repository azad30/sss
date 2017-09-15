<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\ProblemRequest;
class SupportController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

            if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin'){

            $requests_count_by_regions = \DB::table('regions')
                ->join('zones', 'regions.id', '=', 'zones.region_id')
                ->join('branches', 'zones.id', '=', 'branches.zone_id')
                ->join('users', 'branches.id', '=', 'users.branch_id')
                ->join('requests', 'users.id', '=', 'requests.user_id')
                ->groupBy('regions.id', 'regions.name')
                ->select(DB::raw('regions.name, count(*) as cnt'))
                ->get();

                //return json_encode($requests_count_by_regions);


            return view('home',compact('requests_count_by_regions'))
                                        ->with("dta", $requests_count_by_regions);
        }
//

        else {
            return redirect('/request');
        }

    }

}
