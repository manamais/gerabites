<!DOCTYPE html>
<html lang='en'>

    <head>

        <meta charset='UTF-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
        <meta name='msapplication-tap-highlight' content='no' />
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <!-- Chrome, Firefox OS and Opera -->
        <meta name='theme-color' content='#49CEFF'/>
        <!-- Windows Phone -->
        <meta name='msapplication-navbutton-color' content='#49CEFF' />
        <!-- iOS Safari -->
        <meta name='apple-mobile-web-app-capable' content='yes'/>
        <meta name='apple-mobile-web-app-status-bar-style' content='black-translucent'/>

        <title>Pacificonis - Icon Menu Vertical</title>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/bootstrap/dist/css/bootstrap.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/animate.css/animate.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/metisMenu/dist/metisMenu.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/Waves/dist/waves.min.css')}}'/>
        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/toastr/toastr.css')}}'/>


        <link rel='stylesheet' href='{{url('assets/restrito/bower_components/datatables/media/css/jquery.dataTables.min.css')}}'/>
          <!--<link rel="stylesheet" href="assets/restrito/bower_components/datatables/media/css/jquery.dataTables.min.css">-->
        <link rel='stylesheet' href='{{url('assets/restrito/css/style.css')}}'/>


        @stack('css')
        @stack('js-topo')

        <script> window.bemfuncional = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>

        <!--[if lt IE 9]>
          <script src='{{url('assets/restrito/bower_components/html5shiv/dist/html5shiv.min.js')}}'></script>
          <script src='{{url('assets/restrito/bower_components/respondJs/dest/respond.min.js')}}'></script>
        <![endif]-->
    </head>

    <body class='icon-menu menu-alt'>
        <!--Preloader-->
        <!--<div id='preloader'>
              <div class='refresh-preloader'><div class='preloader'><i>.</i><i>.</i><i>.</i></div></div>
        </div>-->


        <div class='wrapper'>
            <nav class='navbar'>
                <div class='navbar-header container'>
                    <a href='#' class='menu-toggle'><i class='zmdi zmdi-menu'></i></a>
                    <a href='index.html' class='logo'><img src='{{url('assets/restrito/img/logo.png')}}' alt='Logo Pacificonis'></a>
                    <a href='index.html' class='icon-logo'></a>
                </div>
                <div class='navbar-container clearfix'>
                    <div class='pull-left'>
                        <a href='#' class='page-title text-uppercase'>Icon Menu Vertical</a>
                    </div>

                    <div class='pull-right'>
                        <div class='pull-left search-container'>
                            <form class='searchbox'>
                                <input type='search' placeholder='Search' name='search' class='searchbox-input'>
                                <input type='submit' class='searchbox-submit' value=''>
                                <span class='searchbox-icon'><span class='zmdi zmdi-search search-icon'></span></span>
                            </form>
                        </div>

                        <ul class='nav pull-right right-menu'>
                            <li class='more-options dropdown'>
                                <a class='dropdown-toggle' data-toggle='dropdown'>
                                    <i class='zmdi zmdi-account-circle'></i>
                                </a>

                                <div class='more-opt-container dropdown-menu'>
                                    <a href='#'><i class='zmdi zmdi-account-o'></i>Account<span class='badge badge-warning'>3</span></a>
                                    <a href='#'><i class='zmdi zmdi-storage'></i>Storage <span class='badge badge-danger'>2</span></a>
                                    <a href='#'><i class='zmdi zmdi-calendar-note'></i>Calendar <span class='badge badge-success'>2</span></a>
                                    <a href='#'><i class='zmdi zmdi-chart-donut'></i>Analytics <span class='badge badge-success'>7</span></a>
                                    <a href='#'><i class='zmdi zmdi-balance'></i>Balance <span class='badge badge-info'>5</span></a>
                                    <a href='#'><i class='zmdi zmdi-run'></i>Exit</a>
                                </div>
                            </li>
                            <li class='notification dropdown'>
                                <a class='dropdown-toggle'>
                                    <i class='zmdi zmdi-notifications'></i>
                                    <span class='badge badge-primary'>8</span>
                                </a>

                                <div class='dropdown-menu'>
                                    <h4 class='text-center info-color m-0'>You have 19 new notifications</h4>
                                    <div class='notification-container'>
                                        <a href='#'><i class='zmdi zmdi-email warning-color m-r-5'></i> You have 16 messages <span class='pull-right'>4 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-twitter info-color m-r-5'></i> 3 new followers <span class='pull-right'>12 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-dropbox info-color m-r-5'></i> 7 changed files <span class='pull-right'>18 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-instagram warning-color m-r-5'></i> 26 new followers <span class='pull-right'>22 minutes ago</span></a>
                                        <a href='#'><i class='zmdi zmdi-twitter info-color m-r-5'></i> 8 new followers <span class='pull-right'>23 minutes ago</span></a>
                                    </div>
                                    <a href='#' class='text-uppercase clear-all'>Clear all notifications</a>
                                    <div class='check-ok'>
                                        <i class='zmdi zmdi-check'></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class='sidepanel-toggle' href='#'>
                                    <i class='zmdi zmdi-more-vert'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <aside class='sidebar'>
                <ul class='nav metismenu'>
                    <li class='profile-sidebar-container'>
                        <div class='profile-sidebar text-center'>
                            <div class='profile-userpic'>
                                <img img='profile_user.jpg' class='img-responsive img-circle center-block' alt='user'>
                                <span class='online'></span>
                            </div>
                            <div class='profile-usertitle'>
                                <div class='name'>
                                    Marcus Doe
                                </div>
                                <div class='city'>
                                    <i class='zmdi zmdi-pin'></i>San Francisco, CA
                                </div>
                            </div>
                            <div class='profile-activity clearfix'>
                                <div class='pull-left'>
                                    Photos
                                    <br>
                                    <span>56</span>
                                </div>
                                <div class='pull-right'>
                                    Videos
                                    <br>
                                    <span>18</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href='#'><i class='zmdi zmdi-view-dashboard'></i>Dashboard<span class='zmdi arrow'></span></a>
                        <ul class='nav nav-inside collapse'>
                            <li class='inside-title'>Dashboard</li>
                            <li><a href='index.html'>Dashboard v1</a></li>
                            <li><a href='dashboard-2.html'>Dashboard v2</a></li>
                            <li><a href='dashboard-3.html'>Dashboard v3</a></li>
                            <li><a href='dashboard-4.html'>Dashboard v4</a></li>
                        </ul>
                    </li>








                    <li>
                        <a aria-expanded='false' href='#'><i class='zmdi zmdi-apps'></i>Apps<span class='zmdi arrow'></span></a>
                        <ul aria-expanded='false' class='nav nav-inside collapse'>
                            <li class='inside-title'>Apps</li>
                            <li><a href='calendar.html'>Calendar</a></li>
                            <li><a href='chat.html'>Chat</a></li>
                            <li><a href='file-manager.html'>File Manager</a></li>
                            <li><a href='issue-list.html'>Issue List</a></li>
                            <li><a href='timeline.html'>Timeline</a></li>
                            <li class='menu-child'>
                                <a aria-expanded='false' href='#'><i class='zmdi zmdi-email'></i>Mailbox<span class='zmdi arrow'></span></a>
                                <ul aria-expanded='false' class='nav nav-inside collapse'>
                                    <li class='inside-title'>Mailbox</li>
                                    <li><a href='email-inbox.html'>Email Inbox</a></li>
                                    <li><a href='email-view.html'>Email View</a></li>
                                    <li><a href='email-compose.html'>Email Compose</a></li>
                                    <li><a href='email-templates.html'>Email Templates</a></li>
                                </ul>
                            </li>
                            <li class='menu-child'>
                                <a aria-expanded='false' href='#'><i class='zmdi zmdi-format-list-numbered'></i>Tasks<span class='zmdi arrow'></span></a>
                                <ul aria-expanded='false' class='nav nav-inside collapse'>
                                    <li class='inside-title'>Tasks</li>
                                    <li><a href='task-list.html'>Task List</a></li>
                                    <li><a href='task-detail.html'>Task Detail</a></li>
                                    <li><a href='taskboard.html'>Taskboard</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    @if (Auth::guest())
                    <li></li>
                    @else

                    <li>
                        <a href='{{url('/logout')}}'
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='zmdi zmdi-run'></i>Logout<span class='zmdi arrow'></span>
                        </a>
                    </li>
                    @endif
                    <input type="hidden" id="token" value="{{csrf_token()}}"/>
                    <form id='logout-form' action='{{ url('/logout')}}' method='POST' style='display: none;'>
                        {{ csrf_field() }}
                    </form>



                </ul>
            </aside>








            <!-- containner content -->
            @yield('content')
            <!-- containner content -->




            <footer class='page-footer'>© 2016 Copyright</footer>
        </div>



        <script src='{{url('assets/restrito/bower_components/jquery/dist/jquery.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/bootstrap/dist/js/bootstrap.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/metisMenu/dist/metisMenu.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/Waves/dist/waves.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/toastr/toastr.js')}}'></script>


        <script src='{{url('assets/restrito/bower_components/datatables/media/js/jquery.dataTables.min.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/datatables.net-responsive/js/dataTables.responsive.js')}}'></script>
        <script src='{{url('assets/restrito/bower_components/moment/min/moment.min.js')}}'></script>

        <!--<script src='{{url('assets/restrito/bower_components/Chart.js/Chart.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot/jquery.flot.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot/jquery.flot.resize.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/flot.tooltip/js/jquery.flot.tooltip.js')}}'></script>-->
        <!--<script src='{{url('assets/restrito/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js')}}'></script>-->



        <script src='{{url('assets/restrito/js/common.js')}}'></script>


        @stack('js-footer')






    </body>
</html>