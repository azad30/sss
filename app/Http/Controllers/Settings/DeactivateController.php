<?php
namespace App\Http\Controllers\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Region;
use App\User;
use App\Zone;
use Session;

class DeactivateController extends Controller
{
    public function deactivate()
    {
        $region = Region::pluck('name', 'id');
        $zone = Zone::pluck('name', 'id');
        $branch = Branch::pluck('name', 'id');
        return view('settings.user.create', compact('region', 'zone', 'branch'))->with("role", auth()->user()->role);
    }
}
