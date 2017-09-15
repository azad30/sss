<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Branch;
use App\Zone;
use Illuminate\Http\Request;
use Session;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $branch = Branch::orderBy('id', 'desc')->paginate($perPage);
        return view('settings.branches.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $zones = Zone::pluck('name', 'id');
        return view('settings.branches.create',compact('zones'));
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
        $this->validate($request, [
            'name' => 'required|unique:branches,name|max:255',
            'zone_id' => 'required',
            'user_id' => 'required'
        ]);


        Branch::create($request->all());

        Session::flash('flash_success_msg', 'Branch added!');

        return redirect('settings/branch');
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
        $branch = Branch::findOrFail($id);

        return view('settings.branches.show', compact('branch'));
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
        $branch = Branch::findOrFail($id);
        $zones = Zone::pluck('name', 'id');
        return view('settings.branches.edit', compact('branch','zones'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'zone_id' => 'required',
            'user_id' => 'required'
        ]);
        $requestData = $request->all();

        $branch = Branch::findOrFail($id);
        $branch->update($requestData);

        Session::flash('flash_success_msg', 'Branch updated!');

        return redirect('settings/branch');
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
        $branch = Branch::findOrFail($id);
        $branch->delete();

        Session::flash('flash_success_msg', 'Branch deleted!');

        return redirect('settings/branch');
    }
}
