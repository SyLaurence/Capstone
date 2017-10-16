    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Performance Evaluation Record
          @endsection
        @else
          @section ('title')
          HR Staff | Performance Evaluation Record
          @endsection
        @endif
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <!-- page title & search bar -->
                <div class="conttainer">
                    <h3>
                      <a href="/PersonalInfo/{{$id}}">{{$drivername}}</a> > Performace Evaluation Record
                    </h3>
                </div>
            
            <!-- /page title & search bar -->
            <br>
            <div class="clearfix"></div><br>


            <!-- table -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <br>
                    <div class="row">
                      <div class="table-responsive col-md-12">  
                        <table id="itemTable" class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">Date</th>
                                  <th class="column-title">Period</th>
                                  <th class="column-title">Evaluated By</th>
                                  <th class="column-title">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              @for($ctr = 0; $ctr < count($arrApp); $ctr++)
                                <tr class="even-pointer">
                                  <td>{{$arrApp[$ctr]['date']}}</td>
                                  <td>{{$arrApp[$ctr]['period']}}</td>
                                  <td>{{$arrApp[$ctr]['name']}}</td>
                                  <td><input type="button" class="btn btn-info" value="View Details" onclick="location.href='/AppraisalDetail/{{$arrApp[$ctr]['id']}}/{{$id}}/Detail'"></td>
                                </tr>
                              @endfor
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
      $('#itemTable').dataTable({
            "aoColumnDefs": [{ "bSortable": true, "aTargets": [ 0, 3 ] }, 
                            { "bSearchable": true, "aTargets": [ 0, 3 ] }]
            }); 
    });
    </script>
    @endsection