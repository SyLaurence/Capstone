    @extends ('layouts.nav')
    @section ('title')
        Attendance
    @endsection
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
                      <label class="col-md-2 col-sm-2 col-xs-12 text-right">Bus Company</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="cmbxBusCompany" id="cmbxBusCompany" class="form-control" required>
                          <option value="0">Choose..</option>
                          @foreach($buses as $bus)
                            <option value="{{$bus->id}}"> {{$bus->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <br>

                    <div class="table-responsive">  
                      <table id="itemTable" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Name </th>
                            <th class="column-title">Status</th>
                            <th class="column-title">
                              <span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                      </table>
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
      $(document).ready(function(){
        $("#cmbxBusCompany").change(function(){
          var strCompany = $("#cmbxBusCompany").val();
          console.log(strCompany);
          $('#itemTable tbody > tr').remove(); // Clear
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: 'Attendance/changebus/'+strCompany,
            type: 'get',
            data: {
              'busid': strCompany,
            },
            dataType:'json',
            success: function(data){
                for(var ctr = 0; ctr< data.length; ctr++){
                  $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].status+'</td><td>'+data[ctr].btn+'</td></tr>'); // Add
                }
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