
    <body class="skin-yellow sidebar-mini">
        <div class="page-loader-wrapper">
            <div class="spinner"></div>
        </div>
        <div class="wrapper">
            <!-- Main Header -->
            <header class="top-menu-header">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="logo bc-secondary">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">R<img src="{{ asset('assets/img/logo.png') }}" class="img-circle" lt="Logo Mini"/></span>
                    <!-- logo for regular state and mobile devices -->
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Mini" width="150px;"/>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" style="background-color:#ff7900 !important;">
                    <!-- Sidebar toggle button-->
                    <a class="sidebar-toggle fa-icon" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-top-menu">
                        <ul class="nav navbar-nav">



                            <!-- Navbar Search -->

                            <!-- /. Navbar Search -->
                            <!--Fullscreen-->
                            <li>
                                <a id="fullscreen-page" role="button"><i class="fa fa-arrows-alt"></i></a>
                            </li>
                            <!-- /. FulllScreen -->
                            <!-- Messages-->

                            <!-- /.messages-menu -->
                            <!-- Notifications Menu -->

                            <!-- Tasks Menu -->

                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" data-toggle="dropdown" aria-expanded="false">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{session('user')['login']}}

                                    <!-- existait un code ici pour la photo et autres -->
                                     <i class="fa fa-angle-down pull-right"></i></span>
                                    <!-- The user image in the navbar-->

                                </a>
                                <ul class="dropdown-menu user-menu animated flipInY">
                                    <li><a href="{{ route('users.show', session('user')['identifiant']) }}"><i class="ti-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-off"></span>Se déconnecter</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </nav>
            </header>
