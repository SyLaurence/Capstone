        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Dashboard
          @endsection
        @else
          @section ('title')
          HR Staff | Dashboard
          @endsection
        @endif
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <!-- Top Tiles -->
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{$total}}</div>
                  <h3>Total Drivers</h3>
                  @if($asOfTotal != "No Driver")
                  <p>As of {{$asOfTotal}}</p> <!-- Yung start date ng pinakamatandang regular employee -->
                  @endif
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bars"></i></div>
                  <div class="count">{{$training}}</div>
                  <h3>On Training</h3>
                  @if($asOfTrain != "No Applicant")
                    @if($asOfTrain)
                    <p>As of {{$asOfTrain}}</p>
                    @endif
                  @endif
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bus"></i></div>
                  <div class="count">{{$contract}}</div>
                  <h3>Contractual</h3>
                  @if($asOfContract != "No Contractual")
                  <p>As of {{$asOfContract}}</p>
                  @endif
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">{{$regular}}</div>
                  <h3>Regular</h3>
                  @if($asOfRegular != "No Regular")
                    @if($asOfRegular)
                    <p>As of {{$asOfRegular}}</p>
                    @endif
                  @endif
                </div>
              </div>
            </div>
            <!-- /Top Tiles -->
            <h3>Attendance as of {{date("F j, Y",strtotime('now'))}}</h3>
            <!-- Top Tiles -->
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats" id="da">
                  <div class="icon"><i class="fa fa-child"></i></div>
                  <div class="count">{{$arrAtt[0]}}</div>
                  <h3>Drivers Available</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats" id="dot">
                  <div class="icon"><i class="fa fa-road"></i></div>
                  <div class="count">{{$arrAtt[1]}}</div>
                  <h3>Drivers on Trip</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats" id="dol">
                  <div class="icon"><i class="fa fa-calendar-times-o"></i></div>
                  <div class="count">{{$arrAtt[2]}}</div>
                  <h3>Drivers on Leave</h3>
                </div>
              </div>
            </div>
            <!-- /Top Tiles -->

            <div class="row">

              <!-- Chart -->
              <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Drivers Hired <small>by month</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lChartHiredPerMonth"></canvas>
                  </div>
                </div>
              </div>
              <!-- /Chart -->
              @if(session()->get('level') == 0)
              <!-- notif panel -->
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reminders</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  @if($norecord=="Has")
                  @for($ctr = 0; $ctr < count($arrBus); $ctr++)
                    <article class="media event">
                        <a class="pull-left date" >
                          <!--p class="month">April</p>
                          <p class="day">23</p-->
                          <img src="{{$arrImage[$ctr]}}" alt="" style="width:42px; height:42px">
                        </a>
                        <div class="media-body">
                          <a class="title" href="/PersonalInfo/{{$arrAppID[$ctr]}}">{{$arrName[$ctr]}} - {{$arrBus[$ctr]}}</a>
                          <p>
                          @if($arrDays[$ctr] == 1)
                            Has <u>{{$arrDays[$ctr]}} day left</u> before contract ends.
                          @else
                            @if($below == 2)
                              Contract ended.
                            @else
                              Has <u>{{$arrDays[$ctr]}} days left</u> before contract ends.
                            @endif
                          @endif
                           Please conduct <a class="title" href="/Appraisal/{{$arrAppID[$ctr]}}">Performance Evaluation.</a> </p>
                        </div>
                    </article>
                    @endfor
                    @else
                  <center>{{$norecord}}</center>
                  @endif
                  </div>
                </div>
              </div>
              <!-- /notif panel -->
              @endif
            </div>
  
            
          </div>
        </div>
        <!-- /page content -->
        @endsection
        @section ('jscript')
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js')}} -->
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- jQuery Smart Wizard -->
    <!--script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="{{asset('vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <script>
      
      $(document).ready(function(){
        $('#da').click(function(){
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/link/Available',
            type: 'get',
            data: {
              
            },
            dataType:'json',
            success: function(data){

              }
          });
          location.href='/Attendance/link/Available';
        });  
        $('#dot').click(function(){
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/link/Driving',
            type: 'get',
            data: {
              
            },
            dataType:'json',
            success: function(data){

              }
          });
          location.href='/Attendance/link/Driving';
        });  
        $('#dol').click(function(){
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/link/Leave',
            type: 'get',
            data: {
              
            },
            dataType:'json',
            success: function(data){

              }
          });
          location.href='/Attendance/link/Leave';
        });  
        
        var ctx = document.getElementById("lChartHiredPerMonth").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [ @foreach($months as $month)
                '{{$month}}',
                @endforeach
                ],
                datasets: [{
                    label: '# of Hired',
                    data: [ @foreach($num as $n)
                    '{{$n}}',
                    @endforeach
                    ],
                    backgroundColor: [
                        'rgba(64, 188, 136, 0.2)'
                    ],
                    borderColor: [
                        'rgba(42, 130, 116, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
      });
    </script>
    @endsection