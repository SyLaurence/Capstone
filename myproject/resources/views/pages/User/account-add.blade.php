@extends ('layouts.nav')
        
        <!-- page content -->
        @section ('title')
            <title>Bus companies</title>
        @endsection
        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
        <div class="">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                          
                            <form id="formAddAccount" data-parsley-validate class="form-horizontal form-label-left">
                                <span class="section">New account</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtUserName" name="txtUserName" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="txtPassword" name="txtPassword" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Confirm password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="txtConfPassword" name="txtConfPassword" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtFirstName" name="txtFirstName" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Middle Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtMiddleName" name="txtMiddleName" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtLastName" name="txtLastName" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        E-mail <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="txtEmail" name="txtEmail" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Contact number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <span class="form-control-feedback left" aria-hidden="true">+63</span>
                                        <input type="text" data-parsley-type='number' id="txtContact" name="txtContact" required="required" data-parsley-minlength='10' maxlength='10' placeholder="9123456789" class="form-control has-feedback-left col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                    Role <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="txtAccountType" id="txtAccountType" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Employee">Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button onclick="window.location='/Users';" class="btn btn-primary">Cancel</button>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#formAddAccount').submit(function() {
                var strPass = $("#txtPassword").val();
                var strPass2 = $("#txtConfPassword").val();

                if(strPass == strPass2){
                    form.submit();
                }
                else{
                    window.alert("Please make sure your passwords match.");
                    return false;
                }
            });
        });
    </script>
  </body>
</html>
@endsection