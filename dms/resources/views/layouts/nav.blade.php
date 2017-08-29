@if (session()->get('user_id') > 0)
    <!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress - is a progress bar-->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- SmartWizard-master -->
    <link href="{{asset('vendors/SmartWizard-master/dist/css/smart_wizard.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/SmartWizard-master/dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style || Created by: Jemee-->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- side navigation -->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-bus"></i> <span>Bicol Isarog</span></a>
            </div>

            <div class="clearfix"></div> 

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <!--
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><a href=""><i class="fa fa-tachometer"></i> Dashboard </a></li>
                    </ul>
                </div>
                -->
                <div class="menu_section">
                    <h3>Maintenance</h3>
                    <ul class="nav side-menu">
                        <li><a href="/CompanyBrand"><i class="fa fa-bus"></i> Bus company </a></li>
                        <li><a href="/Stage"><i class="fa fa-tasks"></i> Stage </a></li>
                        <li><a href="/Appraisal"><i class="fa fa-check-square-o"></i> Performance </a></li>
                        <li><a href="/User"><i class="fa fa-users"></i> Accounts </a></li>
                        <li><a><i class="fa fa-address-card"></i> Drivers <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/PersonalInfo">Apprentices</a></li>
                                <li><a href="/HiredDriver">Hired Drivers</a></li>
                                <li><a href="/AllDriver">Driver Pool</a></li>
                            </ul>
                        </li>          
                    </ul>
                </div>

                <div class="menu_section">
                    <h3>Transactions</h3>
                    <ul class="nav side-menu">
                        <li><a href="/PersonalInfo/create"><i class="fa fa-plus"></i> New applicant </a></li>
                        <li><a href="/Recruitment"><i class="fa fa-tasks"></i> Recruitment </a></li>
                        <li><a href="/PersonalInfo/create"><i class="fa fa-check-square-o"></i> Performance Evaluation </a></li>
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- side navigation -->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{session()->get('image')}}" alt=""> {{session()->get('username')}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/User/{{session()->get('user_id')}}prof/edit"> Edit Profile </a></li>
                    <li>
                      <a href="/User/{{session()->get('user_id')}}pass/edit">
                        <span>Change Password</span>
                      </a>
                    </li>
                    <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        @yield('pageContent')
      </div>
    </div>
    @yield('jscript')
    </body>
</html>
@else
        <div>
        <br><br><br>
        <center>
          <h1>
            You must <a href="/Login">Login</a> first.
          </h1>
        </center>
      </div>
@endif
