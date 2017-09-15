<?php

namespace App\Http\Controllers\Settings;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Region;
use App\User;
use App\Zone;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $user = User::where("id", "!=", auth()->user()->id)->paginate($perPage);

        //dd($user);

        return view('settings.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $region = Region::pluck('name', 'id');
        $zone = Zone::pluck('name', 'id');
        $branch = Branch::pluck('name', 'id');
        return view('settings.user.create', compact('region', 'zone', 'branch'))->with("role", auth()->user()->role);
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255|same:retype_password',
            'contact' => 'max:255',
            'address' => 'max:255',
            'role' => 'required',
            'user_id' => 'required',
            'branch_id' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'address' => $request->address,
            'department' => $request->department,
            'designation' => $request->designation,
            'pin' => $request->pin,
            'office' => $request->office,
            'officeaddress' => $request->officeaddress,
            'role' => $request->role,
            'status' => 'Active',
            'branch_id' => $request->branch_id,
            'user_id' => $request->user_id,
            'remember_token' => bcrypt(str_random(10)),
        ]);

        Session::flash('flash_success_msg', 'User added!');

        return redirect('settings/user');
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
        $user = User::findOrFail($id);

        return view('settings.user.show', compact('user'));
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
        $user = User::findOrFail($id);
        if($user->role != 'admin'){
            $region = Region::pluck('name', 'id');
            $zone = Zone::pluck('name', 'id');
            $branch = Branch::pluck('name', 'id');
            return view('settings.user.edit', compact('user', 'region', 'zone', 'branch'));
        }
        elseif($user->role != 'superadmin'){
            $region = Region::pluck('name', 'id');
            $zone = Zone::pluck('name', 'id');
            $branch = Branch::pluck('name', 'id');
            return view('settings.user.edit', compact('user', 'region', 'zone', 'branch'));
        }
        else{
            return redirect('settings/user');
        }
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
        $user = User::findOrFail($id);
        if($user->role != 'admin'){
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'max:255',
                'address' => 'max:255',
                'role' => 'required',
                'user_id' => 'required',
                'branch_id' => 'required'
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
                'department' => $request->department,
                'designation' => $request->designation,
                'pin' => $request->pin,
                'office' => $request->office,
                'officeaddress' => $request->officeaddress,
                'role' => $request->role,
                'status' => 'active',
                'branch_id' => $request->branch_id,
                'user_id' => $request->user_id,
            ]);


            Session::flash('flash_success_msg', 'User updated!');

            return redirect('settings/user');
        }

        elseif($user->role != 'superadmin'){
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'max:255',
                'address' => 'max:255',
                'role' => 'required',
                'user_id' => 'required',
                'branch_id' => 'required'
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'address' => $request->address,
                'department' => $request->department,
                'designation' => $request->designation,
                'pin' => $request->pin,
                'office' => $request->office,
                'officeaddress' => $request->officeaddress,
                'role' => $request->role,
                'status' => 'active',
                'branch_id' => $request->branch_id,
                'user_id' => $request->user_id,
            ]);


            Session::flash('flash_success_msg', 'User updated!');

            return redirect('settings/user');
        }

        else{
            return redirect('settings/user');
        }
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
        $user = User::findOrFail($id);

        if($user->role = 'admin'){
            $user->delete();

            Session::flash('flash_success_msg', 'User deleted!');

            return redirect('settings/user');
        }
        elseif($user->role = 'superadmin'){
            $user->delete();
            Session::flash('flash_success_msg', 'User deleted!');
            return redirect('settings/user');
        }
        else{
            return redirect('settings/user');
        }
    }


    public function user_active_deactive($id)
    {
        $user = User::findOrFail($id);
        $deactive = "Deactive";
        $user->update([
            'status' => $deactive
        ]);

        Session::flash('flash_success_msg', 'User Deactivate !!!');
        return redirect('settings/user');

    }


    public function active_deactive($id)
    {
        $user = User::findOrFail($id);
        $activate = "Active";
        $user->update([
            'status' => $activate
        ]);

        Session::flash('flash_success_msg', 'User Activate !!!');

        return redirect('settings/user');

    }
}
