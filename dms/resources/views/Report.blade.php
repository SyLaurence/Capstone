    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
      @section ('title')
      Admin | Reports
      @endsection
    @else
      @section ('title')
      HR Staff | Reports
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
                      Reports
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
                      <label class="col-md-2 col-sm-2 col-xs-12 text-right"></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <select name="cmbxBusCompany" id="cmbxBusCompany" class="form-control" required>
                            <option value="No">Choose..</option>
                            <option value="HD"> Regular Drivers</option>
                            <option value="CD"> Contractual Drivers</option>
                            <option value="DOT"> Drivers On Training (Recruitment Process) </option>
                            <option value="NODPB"> Number of Hired Drivers and Applicants per Bus Company</option>
                            <option value="NOAPS"> Number of Applicants per Stage</option>
                            <option value="NOAPA"> Number of Applicants per Activity</option>
                          </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-md-2 col-sm-2 col-xs-12 text-right"></label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <label class="col-md-1 col-sm-2 col-xs-12 text-right">From*</label>
                            <div class="col-md-4">
                                <input type="date" id="from" name="from" class="form-control" required/>
                            </div>
                            <label class="col-md-1 col-sm-2 col-xs-12 text-right">To*</label>
                            <div class="col-md-4">
                                <input type="date" id="to" name="to" class="form-control" required/>
                            </div>
                            <input type="button" value="Generate" class="btn btn-success" onclick="submit();" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <label class="col-md-2 col-sm-2 col-xs-12 text-right" id="tableLabel"></label>
                      <div class="table-responsive col-md-8" id="tableDiv">  
                        <table id="itemTable" class="table table-striped jambo_table bulk_action">
                          <thead>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>  
                       <div class="col-md-10" id="print" hidden>
                          <a id="printLink" href="/Report/print/23123s" target="_blank"></a>
                          <input type="button" id="print" class="btn btn-primary pull-right" value="PDF"/>
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
        $('#cmbxBusCompany').change(function(){
          document.getElementById('print').hidden = true;  
          $('#itemTable tbody > tr').remove(); // Clear
          $('#itemTable thead > tr').remove(); // Clear
        });
        document.getElementById('printLink').hidden = true;
        $('#print').click(function(){ //foreach
            $pref = document.getElementById('cmbxBusCompany').value;
            if($pref == 'DOT'){
              reportName = 'Drivers on Training';
            } else if($pref == 'NOAPS'){
              reportName = 'Number of Applicants per Stage';
            } else if($pref == 'NOAPA'){
              reportName = 'Number of Applicants per Activity';
            } else if($pref == 'NODPB'){
              reportName = 'Number of Drivers per Bus Company';
            } else if($pref == 'HD') {
              reportName = 'Regular Drivers';
            } else if($pref == 'CD'){
              reportName = 'Contractual Drivers';
            }
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;
            document.getElementById("printLink").href = '/Report/print/'+from+'/'+to+'/'+reportName;
            document.getElementById('printLink').click();
        });
      });
      function submit(){
        
        var from = '';
        var to = '';
        
        if(document.getElementById('from').value !== null){
          from = document.getElementById('from').value;
        }
        if(document.getElementById('to').value !== null){
          to = document.getElementById('to').value;
        }
        if(to != '' && from != ''){
            var rtype = $("#cmbxBusCompany").val();
            if(rtype != "No"){
              $('#itemTable tbody > tr').remove(); // Clear
              $('#itemTable thead > tr').remove(); // Clear
              if(rtype == 'DOT'){
                $('#itemTable thead').append('<tr class=""><th>Date Started</th><th>Name</th><th>Company</th><th>Current Activity</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                      if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].date+'</td><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].curr+'</td></tr>'); // Add
                      }
                    }
                });
              } else if(rtype == 'HD'){
                $('#itemTable thead').append('<tr class=""><th>Date Started</th><th>Name</th><th>Company</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                    if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].date+'</td><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td></tr>'); // Add
                      }
                    }
                });
              } else if(rtype == 'CD'){
                $('#itemTable thead').append('<tr class=""><th>Date Started</th><th>Name</th><th>Company</th><th>Status</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                    if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].date+'</td><td>'+data[ctr].name+'</td><td>'+data[ctr].bus+'</td><td>'+data[ctr].status+'</td></tr>'); // Add
                      }
                    }
                });
              } else if(rtype == 'NODPB'){
                $('#itemTable thead').append('<tr class=""><th>Bus Company</th><th>Hired Drivers</th><th>Applicants</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                    if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].bus+'</td><td>'+data[ctr].reg+'</td><td>'+data[ctr].app+'</td></tr>'); // Add
                      }
                    }
                });
              } else if(rtype == 'NOAPA'){
                $('#itemTable thead').append('<tr class=""><th>Activity Name</th><th>Total</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                    if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].name+'</td><td>'+data[ctr].total+'</td></tr>'); // Add
                      }
                    }
                });
              } else if(rtype == 'NOAPS'){
                $('#itemTable thead').append('<tr class=""><th>Stage Number</th><th>Total</th></tr>');
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Report/generate/'+rtype,
                  type: 'get',
                  data: {
                    'rtype': rtype,
                    'from': from,
                    'to': to,
                  },
                  dataType:'json',
                  success: function(data){
                    if(data.length > 0){
                        document.getElementById('print').hidden = false;
                      }
                      for(var ctr = 0; ctr< data.length; ctr++){
                        $('#itemTable tbody').append('<tr class=""><td>'+data[ctr].stage+'</td><td>'+data[ctr].total+'</td></tr>'); // Add
                      }

                    }
                });
              }
            }
          }
      }
    </script>
    @endsection
