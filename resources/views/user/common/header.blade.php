<!-- Add Task in sidebar list modal -->
    <div class="modal fade" id="modal-add-task" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal">
                    <div class="modal-header default">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel1">
                            Add Task
                        </h4>
                    </div>

                    <div class="modal-body">
                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label" for="task-name">Task Name</label>
                            <div class="controls">
                                <input id="task-name" name="task-name" type="text" placeholder="" class="form-control">
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="control-group">
                            <label class="control-label" for="Description">Description</label>
                            <div class="controls">
                                <textarea id="Description" name="Description" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label" for="owner">Owner</label>
                            <div class="controls">
                                <input id="owner" name="owner" type="text" placeholder="" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--./ Add Task in sidebar list modal -->

    <!-- Add Contact in sidebar list modal -->
    <div class="modal fade" id="modal-add-contact" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header default">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel2">
                        Add Contact
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="name">Name</label>
                        <div class="controls">
                            <input id="name" name="name" type="text" placeholder="" class="form-control">
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="control-group">
                        <label class="control-label" for="Address">Address</label>
                        <div class="controls">
                            <textarea id="Address" name="Address" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Phone">Phone</label>
                        <div class="controls">
                            <input id="Phone" name="Phone" type="number" placeholder="" class="form-control">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label" for="owner">Email</label>
                        <div class="controls">
                            <input id="Email" name="Email" type="text" placeholder="" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--./ Add Contact in sidebar list modal -->
    <header id="header">

        <nav class="navbar navbar-default nopadding" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <button type="button" id="menu-open" class="navbar-toggle menu-toggler pull-left">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/dashboard') }}" id="logo-panel">
                    {{ HTML::image('design/assets/img/logo.png', '', array())  }}
                </a>


            </div>
            <form action="#" class="form-search-mobile pull-right">
                <input id="search-fld" class="search-mobile" type="text" name="param" placeholder="Search ...">
                <button id="submit-search-mobile" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <a href="#" id="cancel-search-mobile" title="Cancel Search"><i class="fa fa-times"></i></a>
            </form>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li id="search-show-li" class="dropdown">
                        <a href="#" id="search-mobile-show" class="dropdown-toggle" >
                            <i class="fa fa-search"></i>
                        </a>
                    </li>


                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ HTML::image('design/assets/img/avatars/member.png', Auth::user()->name, array('height' => '50', 'width' => '50', 'class' => 'img-circle')) }}
                            {{ Auth::user()->name }}
                            <strong class="caret"></strong>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/profile') }}">Profile<span class="fa fa-user pull-right"></span></a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="{{ URL('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out<span class="fa fa-power-off pull-right"></span></a>
                            </li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('request/create') }}" >
                            Request a problem
                        </a>
                    </li>
                </ul>

            </div>

        </nav>
    </header>