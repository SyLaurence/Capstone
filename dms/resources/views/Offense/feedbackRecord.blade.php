    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Feedback Record
          @endsection
        @else
          @section ('title')
          HR Staff | Feedback Record
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
                      Feedback Record
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
                      <div class="col-md-10 col-sm-6 col-xs-12">
                          <center><label class="col-md-2">Record to Show: </label> </center>
                          <div class="col-md-4">
                          <select name="cmbxBusCompany" id="cmbxBusCompany" class="form-control" required>
                            <option value="All">All</option>
                             <option value="Pos"> Positive</option>
                             <option value="Neg"> Negative</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-md-1">
                            <input type="button" class="btn btn-success" onclick="showadd();" value="Add Record" />
                          </div>
                    </div>

                    <br>
                    <div class="row">
                      <div class="table-responsive col-md-12">  
                        <table id="itemTable" class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th class="column-title">Dispatched by</th>
                              <th class="column-title">Date and Time Occured</th>
                              <th class="column-title">Comment</th>
                              <th class="column-title">Level</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($arr as $ar)
                                <tr>
                                  <td>{{$ar['user']}}</td>
                                  <td>{{$ar['dt']}}</td>
                                  <td>{{$ar['com']}}</td>
                                  <td>{{$ar['lev']}}</td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                        </div>
                    </div> 
                    <!-- Modal Add -->
                    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title custom_align" id="Heading">Add Record</h4>
                                </div>
                                <div class="modal-body">
                                    <div>
                                    <div class="row">
                                          <div class="col-md-2">
                                            Comment:
                                          </div>
                                          <div class="col-md-10">
                                            <textarea rows="4" cols="20" id="txtComment" name="txtComment" class="form-control col-md-7 col-xs-12" style="resize:vertical"></textarea>
                                          </div>
                                        </div><br>
                                        <div class="row">
                                          <div class="col-md-2">
                                            Offense:
                                          </div>
                                          <div class="col-md-10">
                                            <select name="txtType" id="txtType" class="form-control" required hidden>
                                              <option value="0">Choose..</option>
                                              <option value="Pos"> Positive</option>
                                              <option value="Neg"> Negative</option>
                                            </select>
                                          </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                  <div class="modal-footer ">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                                      <button class="btn btn-success btn-add-yes" onclick="add();">Add </button>
                                  </div>
                            </div> <!-- /.modal-content --> 
                        </div> <!-- /.modal-dialog -->
                    </div>
                    <!--/Modal Add --> 
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
          $('#itemTable thead > tr').remove();
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: '/Feedback/change/'+type,
            type: 'get',
            data: {
              'type': type,
              'appID': appID,
            },
            dataType:'json',
            success: function(data){
                for(var ctr = 0; ctr< data.length; ctr++){
                  if(type == "All"){
                    $('#itemTable thead').append('<tr class=""><th>Name</th><th>Date and Time Occured</th><th>Comment</th><th>Type</th></tr>');
                    $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].user+'</td><td>'+data[ctr].dt+'</td><td>'+data[ctr].com+'</td><td>'+data[ctr].lev+'</td></tr>');
                  } else {
                    $('#itemTable thead').append('<tr class=""><th>Name</th><th>Date and Time Occured</th><th>Comment</th></tr>');
                    $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].user+'</td><td>'+data[ctr].dt+'</td><td>'+data[ctr].com+'</td></tr>'); // Add
                  }
                  
                }
              }
          });
          
          //get data for the table
        });
      });
    </script>
    <script type="text/javascript">
        
        function showadd(){
         $("#modalAdd").modal("show");
      }
      function add(){
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/Feedback/addrecord/add',
          type: 'get',
          data: {
            'comment': document.getElementById('txtComment').value,
            'type': document.getElementById('txtType').value,
            'appid': '{{$appID}}',
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
      }

    </script>
    @endsection