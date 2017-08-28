    @extends ('layouts.nav')
    @section ('title')
        Admin | Edit Role
    @endsection
    @section ('pageContent')
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <form id="formEditAccount" method="post" action="{{action('AdminUsersController@update', $user->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="text" id="hdRType" name="hdRType" value="role" hidden>
                      <span class="section">{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}} > Edit Account Role</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                        Role <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="txtAccountType" id="txtAccountType" class="form-control" required>
                            <option value="Admin" Selected >Admin</option>
                            <option value="HR Staff">HR Staff</option>
                            <option value="Appraiser">Appraiser</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button onclick="window.location='/User';" class="btn btn-primary">Cancel</button>
                          <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                    
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
        $('#formAddAccount').submit(function() {
          var strPass = $("#txtPassword").val();
          var strPass2 = $("#txtConfPassword").val();
          var uname = $("#txtUserName").val();
          if(strPass == strPass2) {
              form.submit();
          }
          else{
              window.alert("Please make sure your passwords match.");
              return false;
          }
        });
      });
    </script>
  @endsection
