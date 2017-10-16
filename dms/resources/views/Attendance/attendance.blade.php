    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Attendance
          @endsection
        @else
          @section ('title')
          HR Staff | Attendance
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
                      Attendance
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
                      <label class="col-md-1"></label> 
                      <div class="col-md-10 col-sm-6 col-xs-12">
                          <label class="col-md-2">Bus Company</label> 
                          <div class="col-md-4">
                          <select name="cmbxBusCompany" id="cmbxBusCompany" class="form-control" required>
                            <option value="All">All</option>
                            @foreach($buses as $bus)
                              <option value="{{$bus->id}}"> {{$bus->name}}</option>
                            @endforeach
                          </select>
                          </div>
                          <label class="col-md-1"></label> 
                          <label class="col-md-1">Status</label> 
                          <div class="col-md-3">
                          <select name="cmbxStat" id="cmbxStat" class="form-control" required>
                            <option value="All">All</option>
                            <option value="Available"> Available</option>
                            <option value="Driving"> Driving</option>
                            <option value="On Leave/Not Available"> On Leave/Not Available</option>
                          </select>
                          </div>
                      </div>
                    </div>

                    <br>
                    <div class="row">
                      <label class="col-md-1 col-sm-2 col-xs-12 text-right"></label>
                      <div class="table-responsive col-md-10">  
                        <table id="itemTable" class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th class="column-title">Name </th>
                              <th class="column-title">Bus Company </th>
                              <th class="column-title">Status</th>
                              @if(session()->get('level') == 0)
                              <th class="column-title">
                                <span class="nobr">Action</span>
                              </th>
                              @endif
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($arrAll as $all)
                              <tr>
                                <td>{{$all['name']}}</td>
                                <td>{{$all['bus']}}</td>
                                <td>{{$all['status']}}</td>
                                @if(session()->get('level') == 0)
                                @if($all['btn'] == 'Dis')
                                  <td><input type="button" class="btn btn-primary" onclick="showModalDis{{$all['id']}}();" value="Dispatch" /> <input type="button" class="btn btn-warning" onclick="showModalLeave{{$all['id']}}();" value="File Leave" /></td>
                                @elseif($all['btn'] == 'Driv')
                                  <td><input type="button" class="btn btn-success" onclick="showModalArrive{{$all['id']}}();" value="Report Arrival" /> <input type="button" class="btn btn-danger" onclick="showModalNo{{$all['id']}}();" value="No Arrival" /></td>
                                @elseif($all['btn'] == 'Leav')
                                  <td><input type="button" class="btn btn-success" onclick="showModalAvail{{$all['id']}}();" value="Report Availability" /></td>
                                @endif
                                @endif
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
            @foreach($applicants as $applicant)
            <!-- modal no arrival -->
            <div class="modal fade" id="modalNoArrival{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title custom_align" id="Heading">No Arrival</h4>
                  </div>
                  
                  <form id="formNoArrival" method="post" action="{{route('Attendance.store')}}" data-parsley-validate class="form-horizontal form-label-left">
                  {{csrf_field()}}
                  <input type="text" value="{{$applicant->id}}" name="appID" hidden>
                  <input type="text" value="No Arrival" name="type" hidden>
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Reason for no arrival <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea rows="3" style="resize:vertical" name="comment" id="txtNoArrivalReason" required="required" class="form-control col-md-7 col-xs-12"></textarea>                          
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> Cancel </button>
                      <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>

                </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!-- /modal no arrival -->

            <!-- modal dispatch -->
            <div class="modal fade" id="modalDispatch{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title custom_align" id="Heading">Dispatch</h4>
                      </div>

                      <form id="formDispatch" method="post" action="{{route('Attendance.store')}}" data-parsley-validate class="form-horizontal form-label-left">
                        {{csrf_field()}}
                        <input type="text" value="{{$applicant->id}}" name="appID" hidden>
                        <input type="text" value="Dispatch" name="type" hidden>
                        <div class="modal-body">
                          <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                              Starting Destination <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="text" id="txtStartDest" name="from" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                              Ending Destination <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="text" id="txtEndDest" name="to" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                              Bus No. <span class="required">*</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                              <input type="text" id="txtbno" name="bno" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> Cancel </button>
                          <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </form>

                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!-- /modal dispatch -->

            <!-- modal leave -->
            <div class="modal fade" id="modalLeave{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title custom_align" id="Heading">File leave</h4>
                  </div>

                  <form id="formLeave" method="post" action="{{route('Attendance.store')}}" data-parsley-validate class="form-horizontal form-label-left">
                  {{csrf_field()}}
                  <input type="text" value="{{$applicant->id}}" name="appID" hidden>
                  <input type="text" value="FileLeave" name="type" hidden>
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                          Number of days <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="number" id="txtLeaveNumDays" name="days" step="1" min="1" max="15" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                          Reason for leave <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <textarea rows="3" style="resize:vertical" name="reason" id="txtLeaveReason" required="required" class="form-control col-md-7 col-xs-12"></textarea>                          
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> Cancel </button>
                      <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>

                </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!-- /modal leave -->

            <!-- modal arrival -->
            <div class="modal fade" id="modalArrival{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title custom_align" id="Heading">Report Arrival</h4>
                  </div>
                  
                  <form id="formArrival" method="post" action="{{route('Attendance.store')}}" data-parsley-validate class="form-horizontal form-label-left">
                  {{csrf_field()}}
                  <input type="text" value="{{$applicant->id}}" name="appID" hidden>
                  <input type="text" value="Arrival" name="type" hidden>
                    <div class="modal-body">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Comment
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea rows="3" style="resize:vertical" name="comment" id="txtArrivalComment" class="form-control col-md-7 col-xs-12"></textarea>                          
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> Cancel </button>
                      <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>

                </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!-- /modal arrival -->

            <!-- modal available -->
            <form id="formAdd{{$applicant->id}}" method="post" action="{{route('Attendance.store')}}">
              {{csrf_field()}}
              <input type="text" name="appID" value="{{$applicant->id}}" hidden>
              <input type="text" name="type" value="Available" hidden>
            </form>
            <!-- /modal available -->
            @endforeach
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
       @if($type != '')
          @if($type=="Available")
            document.getElementById('cmbxStat').selectedIndex = 1;
          @elseif($type=='On Leave/Not Available')
            document.getElementById('cmbxStat').selectedIndex = 3;
          @elseif($type=='Driving')
            document.getElementById('cmbxStat').selectedIndex = 2;
          @endif
        @endif

      $(document).ready(function(){
        
        $("#cmbxBusCompany").change(function(){
          var strCompany = $("#cmbxBusCompany").val();
          var strStat = $("#cmbxStat").val();
          console.log(strCompany);
          $('#itemTable tbody > tr').remove(); // Clear
          $('#itemTable thead > tr').remove(); // Clear
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/changebus/'+strCompany,
            type: 'get',
            data: {
              'busid': strCompany,
              'status': strStat,
            },
            dataType:'json',
            success: function(data){
              @if(session()->get('level') == 0)
              if(data[0] == 'All'){
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Bus Company</th><th>Status</th><th>Action</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].status+'</td><td>'+data[ctr].btn+'</td></tr>'); // Add
                }
              } else{
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Status</th><th>Action</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].status+'</td><td>'+data[ctr].btn+'</td></tr>'); // Add
                }
              }
              @else
              if(data[0] == 'All'){
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Bus Company</th><th>Status</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].status+'</td></tr>'); // Add
                }
              } else{
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Status</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].status+'</td></tr>'); // Add
                }
              }
              @endif
            }
          });
          
          //get data for the table
        });

        $("#cmbxStat").change(function(){
          var strCompany = $("#cmbxBusCompany").val();
          var strStat = $("#cmbxStat").val();
          console.log(strCompany);
          $('#itemTable tbody > tr').remove(); // Clear
          $('#itemTable thead > tr').remove(); // Clear
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Attendance/changebus/'+strCompany,
            type: 'get',
            data: {
              'busid': strCompany,
              'status': strStat,
            },
            dataType:'json',
            success: function(data){
              @if(session()->get('level') == 0)
              if(data[0] == 'All'){
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Bus Company</th><th>Status</th><th>Action</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].status+'</td><td>'+data[ctr].btn+'</td></tr>'); // Add
                }
              } else{
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Status</th><th>Action</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].status+'</td><td>'+data[ctr].btn+'</td></tr>'); // Add
                }
              }
              @else
              if(data[0] == 'All'){
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Bus Company</th><th>Status</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].status+'</td></tr>'); // Add
                }
              } else{
                $('#itemTable thead').append('<tr class=""><th>Name</th><th>Status</th></tr>');
                for(var ctr = 1; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].status+'</td></tr>'); // Add
                }
              }
              @endif
            }
          });
          
          //get data for the table
        });
      });

      
      @foreach($applicants as $applicant)
        function showModalArrive{{$applicant->id}}(){
          $("#modalArrival{{$applicant->id}}").modal("show");
        }
        function showModalNo{{$applicant->id}}(){
          $("#modalNoArrival{{$applicant->id}}").modal("show");
        }
        function showModalDis{{$applicant->id}}(){
          $("#modalDispatch{{$applicant->id}}").modal("show");
        }
        function showModalLeave{{$applicant->id}}(){
          $("#modalLeave{{$applicant->id}}").modal("show");
        }
        function showModalAvail{{$applicant->id}}(){
          document.getElementById("formAdd{{$applicant->id}}").submit();
        }


        $("#modalNoArrival{{$applicant->id}}").on('hidden.bs.modal', function(){
          $('#txtNoArrivalReason').val("");
          $('#formNoArrival').parsley().reset();
        });

        $("#modalDispatch{{$applicant->id}}").on('hidden.bs.modal', function(){
          $('#txtStartDest').val("");
          $('#txtEndDest').val("");
          $('#formDispatch').parsley().reset();
        });

        $("#modalLeave{{$applicant->id}}").on('hidden.bs.modal', function(){
          $('#txtLeaveNumDays').val("");
          $('#txtLeaveReason').val("");
          $('#formDispatch').parsley().reset();
        });

        $("#modalArrival{{$applicant->id}}").on('hidden.bs.modal', function(){
          $('#txtArrivalComment').val("");
          $('#formDispatch').parsley().reset();
        });

      @endforeach
    </script>
    @endsection