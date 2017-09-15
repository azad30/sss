<?php

namespace App\Http\Controllers;
use App\Branch;
use App\Zone;
use App\Region;
use DateTime;
use App\ProblemRequest;
use App\Status;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $getStatus = $request->get('status');
        $status = Status::pluck('name', 'id');
        $format = 'Y-m-d';
        $startDate = DateTime::createFromFormat($format, trim($request->get('from-date')))->format('Y-m-d');
        $endDate = DateTime::createFromFormat($format, trim($request->get('to-date')))->format('Y-m-d');

        $report = ProblemRequest::whereDate('created_at', '>=', date($startDate))
            ->whereDate('created_at', '<=', date($endDate))
            ->where('status_id', '=', $getStatus)
            ->get();

        //dd($report);
        return view ('/result',compact('report','status'));

//
//
////        get branch name
//        $data = $request->get('branch');
//        $searches = Branch::where('id', '=', $data)->get();
//
////        get zone_id and zone_name
//        $zoneID = Branch::where('id',$data)->select('zone_id')->first();
//        $getZoneID = $zoneID->zone_id;
//        $zonename = Zone::where('id', '=', $getZoneID)->first();
//        $getZoneName = $zonename->name;
//
////        get region_id and region_name
//        $regionID = Zone::where('id',$getZoneID)->select('region_id')->first();
//        $getregionID = $regionID->region_id;
//        $regionName  = Region::where('id', '=', $getregionID)->first();
//        $getregionName = $regionName->name;
////        dd($getregionName);
//
//        return view ('/result',compact('searches','getZoneName','getregionName'));
    }
}
