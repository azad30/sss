<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Region;
use App\Zone;
use Illuminate\Http\Request;
use Session;

class ZoneController extends Controller
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

        $zone = Zone::paginate($perPage);

        return view('settings.zone.index', compact('zone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $regions = Region::pluck('name', 'id');
        return view('settings.zone.create', compact('regions'));
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
            'name' => 'required|unique:zones,name|max:255',
            'region_id' => 'required',
            'user_id' => 'required'
        ]);
        $requestData = $request->all();
        
        Zone::create($requestData);

        Session::flash('flash_success_msg', 'Zone added!');

        return redirect('settings/zone');
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
        $zone = Zone::findOrFail($id);

        return view('settings.zone.show', compact('zone'));
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
        $zone = Zone::findOrFail($id);

        $regions = Region::pluck('name', 'id');

        return view('settings.zone.edit', compact('zone', 'regions'));
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
            'region_id' => 'required',
            'user_id' => 'required'
        ]);

        $requestData = $request->all();
        
        $zone = Zone::findOrFail($id);
        $zone->update($requestData);

        Session::flash('flash_success_msg', 'Zone updated!');

        return redirect('settings/zone');
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
        $zone = Zone::findOrFail($id);
        $zone->delete();

        Session::flash('flash_success_msg', 'Zone deleted!');

        return redirect('settings/zone');
    }
}
