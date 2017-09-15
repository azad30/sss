<div id="sidebar" class="sidebar" >
    <div class="tabbable-panel">
        <div class="tabbable-line">
            <ul class="nav nav-tabs nav-justified">
                <li id="tab_menu_a" class="active">
                    <a href="#tab_menu_1" data-toggle="tab">
                        <i class="fa fa-reorder"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_menu_1">
                    <!-- sidebar Menu -->
                    <div id="MainMenu" class="">

                        <ul id="menu-list" class="nav nav-list">
                            <li class="active">
                                <a href="{{ url('/dashboard') }}">
                                    <i class="menu-icon fa fa-tachometer"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-bug"></i>
                                    <span class="menu-text"> Problem Requests </span>

                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu nav-show">
                                    <li class="">
                                        <a href="{{ url('/problem_request') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">ALL Problem Requests</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('problem_request/mis') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">MIS</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('problem_request/ais') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">AIS</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('problem_request/regular_activity') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Regular Activities</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('problem_request/others') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Others</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-cog"></i>
                                    <span class="menu-text"> Settings </span>

                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu nav-show">
                                    <li class="">
                                        <a href="{{ url('settings/region') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Region</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('settings/zone') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Zone</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('settings/branch') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Branch</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('/settings/status') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">Status</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    <li class="">
                                        <a href="{{ url('/settings/user') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            <span class="menu-text">User</span>
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end tab-content-->
        </div><!-- end tabbable-line -->
    </div><!-- end tabbable-panel -->
</div>