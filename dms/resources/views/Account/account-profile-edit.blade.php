    @extends ('layouts.nav')
    @section ('title')
        Admin | Edit Profile
    @endsection
    @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            
                                <form method="post" action="{{action('AdminUsersController@update', $user->id)}}" id="formAddAccount" data-parsley-validate class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="text" id="hdRType" name="hdRType" value="prof" hidden>
                                    <span class="section">Edit Profile</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            User photo<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" id="photo" name="photo" accept="image/*" class="col-md-7 col-xs-12" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            User Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="txtUserName" name="txtUserName" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->username}}" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            First Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="txtFirstName" name="txtFirstName" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->first_name}}" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            Middle Name
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="txtMiddleName" name="txtMiddleName" class="form-control col-md-7 col-xs-12" value="{{$user->middle_name}}" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            Last Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="txtLastName" name="txtLastName" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->last_name}}" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                            E-mail <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="txtEmail" name="txtEmail" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->email}}" >
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                            Contact number <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <span class="form-control-feedback left" aria-hidden="true">+63</span>
                                            <input type="text" data-parsley-type='number' id="txtContact" name="txtContact" required="required" data-parsley-minlength='10' maxlength='10' placeholder="9123456789" class="form-control has-feedback-left col-md-7 col-xs-12" value="{{substr($user->contact_no,1)}}" >
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button onclick="window.location='/User';" class="btn btn-primary">Cancel</button>
                                            <button id="btnSubmit" type="submit" class="btn btn-success">Save Changes</button>
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
    @endsection
