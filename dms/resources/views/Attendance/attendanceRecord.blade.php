    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Attendance Record
          @endsection
        @else
          @section ('title')
          HR Staff | Attendance Record
          @endsection
        @endif
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <!-- page title & search bar -->
            <div class="page-title">
                <div class="title_left">
                    <h3>
                      Attendance Record
                    </h3>
                </div>
            </div>
            <!-- /page title & search bar -->
            <div class="clearfix"></div>


            <!-- table -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="row">
                      <div class="col-md-12 col-sm-6 col-xs-12">
                          <center><label class="col-md-2">Record to Show: </label> </center>
                          <div class="col-md-4">
                          <select name="cmbxBusCompany" id="cmbxBusCompany" class="form-control" required>
                            <option value="All">All</option>
                             <option value="Arrived"> Arrived</option>
                             <option value="No Arrival"> No Arrival</option>
                          </select>
                          </div>
                      </div>
                    </div>

                    <br>
                    <div class="row">
                      <div class="table-responsive col-md-12">  
                        <table id="itemTable" class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th class="column-title">Dispatched by</th>
                              <th class="column-title">Bus No.</th>
                              <th class="column-title">Starting Destination</th>
                              <th class="column-title">Ending Destination</th>
                              <th class="column-title">Departure Time</th>
                              <th class="column-title">Arrival Time</th>
                              <th class="column-title">Comment</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($arr as $ar)
                                <tr>
                                  <td>{{$ar['user']}}</td>
                                  <td>{{$ar['bno']}}</td>
                                  <td>{{$ar['from']}}</td>
                                  <td>{{$ar['to']}}</td>
                                  <td>{{$ar['dept']}}</td>
                                  <td>{{$ar['arrive']}}</td>
                                  <td>{{$ar['comment']}}</td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                        </div>
                    </div>  
                  </div>
                </div>
              </div>
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
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
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
        $("#cmbxBusCompany").change(function(){
          var type = $("#cmbxBusCompany").val();
          var appID = "{{$appID}}";
          $('#itemTable tbody > tr').remove(); // Clear
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/record/'+type,
            type: 'get',
            data: {
              'type': type,
              'appID': appID,
            },
            dataType:'json',
            success: function(data){
                for(var ctr = 0; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].user+'</td><td>'+data[ctr].from+'</td><td>'+data[ctr].to+'</td><td>'+data[ctr].dept+'</td><td>'+data[ctr].arrive+'</td><td>'+data[ctr].comment+'</td></tr>'); // Add
                }
              }
          });
          
          //get data for the table
        });
        $('#itemTable').dataTable({
            "aoColumnDefs": [{ "bSortable": true, "aTargets": [ 0, 5 ] }, 
                            { "bSearchable": true, "aTargets": [ 0, 5 ] }]
            }); 
      });
    </script>
    @endsection