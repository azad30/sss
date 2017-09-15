<?php

namespace App\Http\Controllers;

use App\Branch;
use App\ProblemRequest;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemRequestController extends Controller
{

    private $unseenRequestNotifications;
    private $unseenTaskNotifications;
    private $requestNotifications;
    private $taskNotifications;
    public function index()
    {
        $sl = 0;
        $requests = ProblemRequest::orderBy('id', 'DESC')->paginate(15);
        $branches = Branch::all();
        $statuses = Status::all();
        return view('problem_request.index', compact('requests', 'branches', 'statuses', 'sl'));
    }
    public function misindex()
    {
        $sl = 0;
        $requests = ProblemRequest::WHERE('problem_type','=','MIS')->orderBy('id', 'DESC')->paginate(15);
        $branches = Branch::all();
        $statuses = Status::all();

        return view('problem_request.mis.index', compact('requests','branches','statuses', 'sl'));
    }
    public function aisindex()
    {
        $sl = 0;
        $requests = ProblemRequest::WHERE('problem_type','=','AIS')->orderBy('id', 'DESC')->paginate(15);
        $branches = Branch::all();
        $statuses = Status::all();

        return view('problem_request.ais.index', compact('requests','branches','statuses', 'sl'));
    }
    public function regularindex()
    {
        $sl = 0;
        $requests = ProblemRequest::WHERE('problem_type','=','Regular-Activities')->orderBy('id', 'DESC')->paginate(15);
        $branches = Branch::all();
        $statuses = Status::all();

        return view('problem_request.regular_activity.index', compact('requests','branches','statuses', 'sl'));
    }
    public function othersindex()
    {
        $sl = 0;
        $requests = ProblemRequest::WHERE('problem_type','=','others')->orderBy('id', 'DESC')->paginate(15);
        $branches = Branch::all();
        $statuses = Status::all();

        return view('problem_request.others.index', compact('requests','branches','statuses', 'sl'));
    }
    public function show($id)
    {
        $request = ProblemRequest::findOrFail($id);
        if ($request->seen_by_id == '') {
            if ($request->update(['seen_by_id' => Auth::user()->id, 'status_id' => 2])) {
            } else {
                Session::flash('flash_warning_msg', 'Something error');
                return redirect('/problem_request');
            }
        }
        if((!empty($request->assign_by_id)) && (empty($request->assign_by_seen)) && ($request->assign_by_id == Auth::user()->id))
        {
            if ($request->update(['assign_by_seen' => 1]))
            {}
            else
            {
                Session::flash('flash_warning_msg', 'Something error');
                return redirect('/problem_request');
            }
        }

        $this->unseenRequestNotifications = ProblemRequest::whereNull('seen_by_id')->count();
        $this->unseenTaskNotifications = ProblemRequest::where('assign_by_id', '=', Auth::user()->id)->whereNull('assign_by_seen')->count();
        $this->requestNotifications = ProblemRequest::orderBy('id', 'desc')->limit(10)->get();
        $this->taskNotifications = ProblemRequest::where('assign_by_id', '=', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();

        view()->share('unseenRequestNotifications', $this->unseenRequestNotifications);
        view()->share('unseenTaskNotifications', $this->unseenTaskNotifications);
        view()->share('requestNotifications', $this->requestNotifications);
        view()->share('taskNotifications', $this->taskNotifications);

        return view('problem_request.show', compact('request'));
    }
}
