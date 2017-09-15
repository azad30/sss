<?php

namespace App\Http\Controllers;
use App\ProblemRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $unseenRequestNotifications;
    private $unseenTaskNotifications;
    private $requestNotifications;
    private $taskNotifications;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->unseenRequestNotifications = ProblemRequest::whereNull('seen_by_id')->count();
            $this->unseenTaskNotifications = ProblemRequest::where('assign_by_id', '=', Auth::user()->id)->whereNull('assign_by_seen')->count();
            $this->requestNotifications = ProblemRequest::orderBy('id', 'desc')->limit(10)->get();
            $this->taskNotifications = ProblemRequest::where('assign_by_id', '=', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();

            view()->share('unseenRequestNotifications', $this->unseenRequestNotifications);
            view()->share('unseenTaskNotifications', $this->unseenTaskNotifications);
            view()->share('requestNotifications', $this->requestNotifications);
            view()->share('taskNotifications', $this->taskNotifications);

            return $next($request);
        });
    }


}
