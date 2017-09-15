<?php

namespace App\Http\Controllers;

use App\ProblemRequest;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Session;

class RequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function  __construct()
    {
//        if ((Auth::check()) && (Auth::user()->role == 'admin')){
//            return redirect('/home');
//        }
    }

    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }
        $perPage = 25;
        $status = Status::pluck('name', 'id');
        if(!empty(Input::get('per-page'))){
            $requests = ProblemRequest::
            where('user_id', '=', Auth::user()->id)
                ->paginate(Input::get('per-page'));
        }
        else {
            $requests = ProblemRequest::where('user_id', '=', Auth::user()->id)->paginate($perPage);
        }
        return view('user.request.index', compact('requests', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }
        if (isset(Auth::user()->branch->name)){
            $branch = Auth::user()->branch->name;
            $branch_id = Auth::user()->branch->id;
        }
        else{
            $branch = 'Deleted';
            $branch_id = 'Deleted';
        }
        if (isset(Auth::user()->branch->zone->name)){
            $zone = Auth::user()->branch->zone->name;
            $zone_id = Auth::user()->branch->zone->id;
        }
        else{
            $zone = 'Deleted';
        }
        if (isset(Auth::user()->branch->zone->region->name)){
            $region = Auth::user()->branch->zone->region->name;
            $region_id = Auth::user()->branch->zone->region->id;
        }
        else{
            $region = 'Deleted';
        }
        return view('user.request.create', compact('branch', 'branch_id', 'zone', 'zone_id', 'region', 'region_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }
        $this->validate($request, [
            'contact_name' => 'required|max:100',
            'contact_number' => 'required|max:100',
            'problem' => 'required|max:20',
            'mis_problem_name' => 'nullable|max:100',
            'mis_problem_member_name' => 'nullable|max:100',
            'mis_problem_member_id' => 'nullable|max:100',
            'mis_problem_samity_code' => 'nullable|max:100',
            'mis_problem_date' => 'nullable|date',
            'mis_problem_amount' => 'nullable|max:12',
            'mis_problem_details' => 'nullable|max:500',
            'mis_right_member_name' => 'nullable|max:100',
            'mis_right_member_id' => 'nullable|max:100',
            'mis_right_samity_code' => 'nullable|max:100',
            'mis_right_amount' => 'nullable|max:12',
            'mis_right_details' => 'nullable|max:500',
            'ais_problem_name' => 'nullable|max:100',
            'ais_problem_voucher_date' => 'nullable|date',
            'ais_problem_voucher_code' => 'nullable|max:100',
            'ais_right_details' => 'nullable|max:500',
            'regular_activities_type' => 'max:20',
            'regular_activity_name' => 'nullable|max:100',
            'regular_activity_details' => 'nullable|max:750',
            'others_problem_name' => 'nullable|max:100',
            'others_problem_details' => 'nullable|max:500',
            'others_right_details' => 'nullable|max:100',
            'user_id' => 'required'
        ]);
        if ($request->problem == 'MIS'){
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $full_name = $filename;
                $upload_success = $file->move($destinationPath,$full_name);
            }
            else
                $full_name = null;
            ProblemRequest::create([
                'documentt'=>$full_name,
                'branchcode' => $request->branchcode,
                'branch_name' => $request->branch_name,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_number,
                'problem_type' => $request->problem,
                'problem_name' => $request->mis_problem_name,
                'problem_member_name' => $request->mis_problem_member_name,
                'problem_member_id' => $request->mis_problem_member_id,
                'problem_samity_code' => $request->mis_problem_samity_code,
                'problem_date' => $request->mis_problem_date,
                'problem_amount' => $request->mis_problem_amount,
                'problem_details' => $request->mis_problem_details,
                'right_member_name' => $request->mis_right_member_name,
                'right_member_id' => $request->mis_right_member_id,
                'right_samity_code' => $request->mis_right_samity_code,
                'right_amount' => $request->mis_right_amount,
                'right_details' => $request->mis_right_details,
                'status_id' => 1,
                'user_id' => $request->user_id,
            ]);
        }
        else if ($request->problem == 'AIS'){
            $this->validate($request, [
                'ais_problem_name' => 'required|max:100',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $full_name = $filename;
                $upload_success = $file->move($destinationPath, $full_name);
            }
            else
                $full_name = null;
            ProblemRequest::create([
                'documentt'=>$full_name,
                'branchcode' => $request->branchcode,
                'branch_name' => $request->branch_name,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_number,

                'problem_type' => $request->problem,
                'problem_name' => $request->ais_problem_name,
                'problem_date' => $request->ais_problem_voucher_date,
                'voucher_code' => $request->ais_problem_voucher_code,

                'right_details' => $request->ais_right_details,

                'status_id' => 1,
                'user_id' => $request->user_id
            ]);
        }
        else if ($request->problem == 'Regular-Activities'){
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $full_name = $filename;
                $upload_success = $file->move($destinationPath, $full_name);
            }
            else
                $full_name = null;
            ProblemRequest::create([
                'documentt'=>$full_name,
                'branchcode' => $request->branchcode,
                'branch_name' => $request->branch_name,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_number,

                'problem_type' => $request->problem,
                'module_type' => $request->regular_activities_type,
                'problem_name' => $request->regular_activity_name,
                'problem_details' => $request->regular_activity_details,

                'status_id' => 1,
                'user_id' => $request->user_id
            ]);
        }
        else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $full_name = $filename;
                $upload_success = $file->move($destinationPath, $full_name);

            }
            else
                $full_name = null;
                ProblemRequest::create([
                'documentt'=>$full_name,
                'branchcode' => $request->branchcode,
                'branch_name' => $request->branch_name,
                'contact_name' => $request->contact_name,
                'contact_number' => $request->contact_number,
                'problem_type' => $request->problem,
                'problem_name' => $request->others_problem_name,
                'problem_details' => $request->others_problem_details,
                'right_details' => $request->others_right_details,
                'status_id' => 1,
                'user_id' => $request->user_id
            ]);
        }

//        $lastID = $user->id;
        Session::flash('flash_success_msg', 'Request created!');

        return redirect('/request');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }
        $request = ProblemRequest::findOrFail($id);

        return view('user.request.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }

        $problemRequest = ProblemRequest::findOrFail($id);
//        $image = $problemRequest->documentt;
//        dd($image);
        if($problemRequest->status_id == 1) {
                if (isset(Auth::user()->branch->name)) {
                    $branch = Auth::user()->branch->name;
                    $branch_id = Auth::user()->branch->id;
                } else {
                    $branch = 'Deleted';
                    $branch_id = 'Deleted';
                }
                if (isset(Auth::user()->branch->zone->name)) {
                    $zone = Auth::user()->branch->zone->name;
                    $zone_id = Auth::user()->branch->zone->id;
                } else {
                    $zone = 'Deleted';
                }
                if (isset(Auth::user()->branch->zone->region->name)) {
                    $region = Auth::user()->branch->zone->region->name;
                    $region_id = Auth::user()->branch->zone->region->id;
                } else {
                    $region = 'Deleted';
                }
            }

        else
            {
                Session::flash('flash_warning_msg', 'You can not edit the request! Because this status has changed. Now status name is: ' . $problemRequest->status->name);
                return redirect('/request');
            }
            return view('user.request.edit', compact('problemRequest', 'branch', 'branch_id', 'zone','zone_id', 'region','region_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        if(Auth::user()->role == 'admin')
        {
            return redirect('/home');
        }
        $problemRequest = ProblemRequest::findOrFail($id);
        if($problemRequest->status_id == 1)
        {
            $this->validate($request, [
                'contact_name' => 'required|max:100',
                'contact_number' => 'required|max:100',
                'problem' => 'required|max:20',
                'mis_problem_name' => 'nullable|max:100',
                'mis_problem_member_name' => 'nullable|max:100',
                'mis_problem_member_id' => 'nullable|max:100',
                'mis_problem_samity_code' => 'nullable|max:100',
                'mis_problem_date' => 'nullable|date',
                'mis_problem_amount' => 'nullable|max:12',
                'mis_problem_details' => 'nullable|max:500',

                'mis_right_member_name' => 'nullable|max:100',
                'mis_right_member_id' => 'nullable|max:100',
                'mis_right_samity_code' => 'nullable|max:100',
                'mis_right_amount' => 'nullable|max:12',
                'mis_right_details' => 'nullable|max:500',

                'ais_problem_name' => 'nullable|max:100',
                'ais_problem_voucher_date' => 'nullable|date',
                'ais_problem_voucher_code' => 'nullable|max:100',

                'ais_right_details' => 'nullable|max:500',

                'regular_activities_type' => 'max:20',
                'regular_activity_name' => 'nullable|max:100',
                'regular_activity_details' => 'nullable|max:750',

                'others_problem_name' => 'nullable|max:100',
                'others_problem_details' => 'nullable|max:500',
                'others_right_details' => 'nullable|max:100',
                'user_id' => 'required'
            ]);

            $problemRequest->update([
                'branchcode' => null,
                'problem_type' => null,
                'module_type' => null,
                'problem_name' => null,
                'problem_member_name' => null,
                'problem_member_id' => null,
                'problem_samity_code' => null,
                'problem_date' => null,
                'problem_amount' => null,
                'problem_details' => null,
                'voucher_type' => null,
                'voucher_id' => null,
                'voucher_date' => null,

                'right_member_name' => null,
                'right_member_id' => null,
                'right_samity_code' => null,
                'right_amount' => null,
                'right_details' => null,
            ]);
            if ($request->problem == 'MIS'){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = 'uploads';
                    $filename = $file->getClientOriginalName();
                    $full_name = $filename;
                    $upload_success = $file->move($destinationPath, $full_name);

                }
                else
                    $full_name = null;

                    $problemRequest->update([
                    'documentt'=>$full_name,
                    'contact_name' => $request->contact_name,
                    'contact_number' => $request->contact_number,
                    'problem_type' => $request->problem,
                    'problem_name' => $request->mis_problem_name,
                    'problem_member_name' => $request->mis_problem_member_name,
                    'problem_member_id' => $request->mis_problem_member_id,
                    'problem_samity_code' => $request->mis_problem_samity_code,
                    'problem_date' => $request->mis_problem_date,
                    'problem_amount' => $request->mis_problem_amount,
                    'problem_details' => $request->mis_problem_details,

                    'right_member_name' => $request->mis_right_member_name,
                    'right_member_id' => $request->mis_right_member_id,
                    'right_samity_code' => $request->mis_right_samity_code,
                    'right_amount' => $request->mis_right_amount,
                    'right_details' => $request->mis_right_details,

                    'status_id' => 1,
                    'user_id' => $request->user_id
                ]);
            }
            else if ($request->problem == 'AIS'){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = 'uploads';
                    $filename = $file->getClientOriginalName();
                    $full_name = $filename;
                    $upload_success = $file->move($destinationPath, $full_name);

                }
                else
                    $full_name = null;
                $problemRequest->update([
                    'documentt'=>$full_name,
                    'contact_name' => $request->contact_name,
                    'contact_number' => $request->contact_number,

                    'problem_type' => $request->problem,
                    'problem_name' => $request->ais_problem_name,
                    'problem_date' => $request->ais_problem_voucher_date,
                    'voucher_code' => $request->ais_problem_voucher_code,

                    'right_details' => $request->ais_right_details,

                    'status_id' => 1,
                    'user_id' => $request->user_id
                ]);
            }
            else if ($request->problem == 'Regular-Activities'){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = 'uploads';
                    $filename = $file->getClientOriginalName();
                    $full_name = $filename;
                    $upload_success = $file->move($destinationPath, $full_name);

                }
                else
                    $full_name = null;
                $problemRequest->update([
                    'documentt'=>$full_name,
                    'contact_name' => $request->contact_name,
                    'contact_number' => $request->contact_number,

                    'problem_type' => $request->problem,
                    'module_type' => $request->regular_activities_type,
                    'problem_name' => $request->regular_activity_name,
                    'problem_details' => $request->regular_activity_details,

                    'status_id' => 1,
                    'user_id' => $request->user_id
                ]);
            }
            else{
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $destinationPath = 'uploads';
                    $filename = $file->getClientOriginalName();
                    $full_name = $filename;
                    $upload_success = $file->move($destinationPath, $full_name);

                }
                else
                    $full_name = null;
                $problemRequest->update([
                    'contact_name' => $request->contact_name,
                    'contact_number' => $request->contact_number,

                    'problem_type' => $request->problem,
                    'problem_name' => $request->others_problem_name,
                    'problem_details' => $request->others_problem_details,

                    'right_details' => $request->others_right_details,

                    'status_id' => 1,
                    'user_id' => $request->user_id
                ]);
            }
            Session::flash('flash_success_msg', 'Request edited!');
        }
        else
        {
            Session::flash('flash_warning_msg', 'You can not change the request! Because this status has changed. Now status name is: ' . $problemRequest->status->name);
        }
        return redirect('/request');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $problemRequest = ProblemRequest::findOrFail($id);
        if($problemRequest->status_id == 1)
        {
            $problemRequest->delete();
        }
        else
        {
            Session::flash('flash_warning_msg', 'You can not delete the request! Because this status has changed. Now status name is: ' . $problemRequest->status->name);
            return redirect('/request');
        }
        Session::flash('flash_success_msg', 'Request deleted!');

        return redirect('request');
    }

}
