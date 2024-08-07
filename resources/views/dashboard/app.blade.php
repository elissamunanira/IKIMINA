<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>{{ config('app.name', 'IKIBINA') }}</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="/http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="/http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="/http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="/http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="/dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="/dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="/dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="/dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="/dashboard/css/style.css" rel="stylesheet">


    {{-- bootstrap css --}}

    <link rel="stylesheet" href="/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="/">
                            <!-- <img src="images/logo.png" alt="" /> --><span>{{ config('app.name', 'IKIMINA') }}</span></a></div>
                    <li class="label">Main</li>
                    <li><a href="/ikimina-dashboard"><i class="ti-home"></i> Dashboard </a>
                       
                    </li>
                    @can('users-list')
                    <li><a href="/users"><i class="fa fa-users" aria-hidden="true"></i> Users </a></li>
                    @endcan

                    @can('role-list')                       
                    <li><a href="/roles"><i class="ti-layout-tab"></i> Roles </a></li>
                    @endcan

                    @can('budget-record')
                    <li><a href="/budgets"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>Budgets</a></li> 
                    @endcan

                    {{-- <li><a class="sidebar-sub-toggle"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i>Budget<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/budgets">Budgets</a></li> 
                            <li><a href="/budgets/{{$budget->id}}/budgetlines">Budgetlines</a></li>
                        </ul> 
                    </li> --}}

                    {{-- <li><a href="/expenses"><i class="fa fa-table" aria-hidden="true"></i>Expenses</a></li> --}}
                    @can('mituelle-recording')
                    <li><a href="/total-mituelle"><i class="fa fa-life-ring" aria-hidden="true"></i>Mituelles</a></li>
                    @endcan

                    @can('savings-record')
                    <li><a href="/totalSavings"><i class="ti-briefcase"></i>Savings</a></li>
                    @endcan
                    
                    @can('loan-approval')
                    <li><a class="sidebar-sub-toggle"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Loans <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/loan-categories">Loan Categories</a></li> 
                            <li><a href="/loans">All Loans</a></li>
                        </ul>
                    </li> 
                    @endcan
                    @if (Auth()->user()->roles)
                    @foreach ( Auth()->user()->roles as $role )
                        @if ($role->name == 'Admin')
                            <li><a href="/loan-payment-records"><i class="fa fa-balance-scale" aria-hidden="true"></i>Payments </a></li>
                        @endif
                    @endforeach
                        
                    @endif

                    {{-- @can('rule') --}}
                    <li><a href="/rules"><i class="fa fa-balance-scale" aria-hidden="true"></i>Cooperative Rules </a></li>
                    {{-- @endcan --}}

                    {{-- @can('penalties') --}}
                    <li><a href="/penalties"><i class="fa fa-gavel" aria-hidden="true"></i>Penalties </a></li>
                    {{-- @endcan --}}
                    
                    <li><a class="sidebar-sub-toggle"><i class="ti-money"></i> My Account <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('my-saving') }}">My Saving</a></li>
                            <li><a href="{{ route('my-loan') }}">My Loan</a></li>
                            <li><a href="{{ route('my-penalties') }}">My Penalties</a></li>
                            <li><a href="{{ route('my-mituelles') }}">My Mituelles</a></li>
                        </ul>
                    </li>

                    {{-- <li class="label">Apps</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Charts <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/chart-flot">Flot</a></li>
                        </ul>
                    </li>
                    <li><a href="/calender"><i class="ti-calendar"></i> Calender </a></li>
                    <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                    <li><a href="/app-profile"><i class="ti-user"></i> Profile</a></li>
                    <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li>
                    <li class="label">Features</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>

                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>

                            <li><a href="ui-list-group.html">List Group</a></li>

                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="uc-calendar.html">Calendar</a></li>
                            <li><a href="uc-carousel.html">Carousel</a></li>
                            <li><a href="uc-weather.html">Weather</a></li>
                            <li><a href="uc-datamap.html">Datamap</a></li>
                            <li><a href="uc-todo-list.html">To do</a></li>
                            <li><a href="uc-scrollable.html">Scrollable</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                            <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                            <li><a href="uc-nestable.html">Nestable</a></li>

                            <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                            <li><a href="uc-rating-jRate.html">jRate</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="/table-basic">Basic</a></li>

                            <li><a href="/table-export">Datatable Export</a></li>
                            <li><a href="/table-row-select">Datatable Row Select</a></li>
                            <li><a href="/table-jsgrid">Editable </a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="font-themify.html">Themify</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="gmaps.html">Basic</a></li>
                            <li><a href="vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="label">Form</li>
                    <li><a href="/form-basic"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                    <li class="label">Extra</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="invoice.html">Basic</a></li>
                            <li><a href="invoice-editable.html">Editable</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-reset-password.html">Forgot password</a></li>
                        </ul>
                    </li> --}}
                   <li><a href="/logout"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="/dashboard/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ Auth::user()->firstname }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="/app-profile">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('inc.messages')
    </div>

    @yield('content')

    
    <!-- Footer -->
    <footer class="sticky-footer bg-black">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; ikimina <span id="date"></span></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
</div>
</div>
<!-- jquery vendor -->
<script src="/dashboard/js/lib/jquery.min.js"></script>
<script src="/dashboard/js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="/dashboard/js/lib/menubar/sidebar.js"></script>
<script src="/dashboard/js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<script src="/dashboard/js/lib/bootstrap.min.js"></script>
<script src="/dashboard/js/scripts.js"></script>
<!-- bootstrap -->

<script src="/dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
<script src="/dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
<script src="/dashboard/js/lib/calendar-2/pignose.init.js"></script>


<script src="/dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
<script src="/dashboard/js/lib/weather/weather-init.js"></script>
<script src="/dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
<script src="/dashboard/js/lib/circle-progress/circle-progress-init.js"></script>
<script src="/dashboard/js/lib/chartist/chartist.min.js"></script>
<script src="/dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
<script src="/dashboard/js/lib/sparklinechart/sparkline.init.js"></script>
<script src="/dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="/dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>
<!-- scripit init-->
<script src="/dashboard/js/dashboard2.js"></script>


{{-- datatable links --}}

<script src="/dashboard/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="/dashboard/lib/menubar/sidebar.js"></script>
<script src="/dashboard/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<!-- scripit init-->
<script src="/dashboard/js/lib/data-table/datatables.min.js"></script>
<script src="/dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.flash.min.js"></script>
<script src="/dashboard/js/lib/data-table/jszip.min.js"></script>
<script src="/dashboard/js/lib/data-table/pdfmake.min.js"></script>
<script src="/dashboard/js/lib/data-table/vfs_fonts.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.html5.min.js"></script>
<script src="/dashboard/js/lib/data-table/buttons.print.min.js"></script>
<script src="/dashboard/js/lib/data-table/datatables-init.js"></script>
</body>

</html>
