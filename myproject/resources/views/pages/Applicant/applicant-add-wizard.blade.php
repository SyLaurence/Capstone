        @extends ('layouts.nav')

        
         
        @section ('title')
            Add Applicant
        @endsection

        @section ('Content')
        <!--===================================================================================================================-->


        <!-- page content -->

        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <div id="smartwizard">
                                    <ul>
                                        <!--li><a href="#step-1">Step 1<br /><small>Application</small></a></li-->
                                        <li><a href="#step-2">Step 1<br /><small> Personal Information </small></a></li>
                                        <li><a href="#step-3">Step 2<br /><small> Educational Background </small></a></li>
                                        <li><a href="#step-4">Step 3<br /><small> Professional Exam </small></a></li>
                                        <li><a href="#step-5">Step 4<br /><small> Work Experience  </small></a></li>
                                        <li><a href="#step-6">Step 5<br /><small></small> References </a></li>
                                        <li><a href="#step-7">Step 6<br /><small> Family Background  </small></a></li>
                                    </ul>
                                    
                                    <div>
                                        <!--div id="step-1" class="">
                                            <center>
                                                <h2>Application</h2><br>
                                            </center>
                                            
                                            <form id="formApplication" data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <label class="control-label" for="">
                                                        How did you find our about bicol Isarog Transport System Inc. career opportunities? 
                                                        <span class="required">*</span>
                                                    </label>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="radio" class="flat" name="btnApplication" id="btnWalkIn" value="Walk-In" checked="" required class="form-control col-md-7 col-xs-12"/>
                                                        Walk-In
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="radio" class="flat" name="btnApplication" id="btnJobFair" value="Job Fair" checked="" class="form-control col-md-7 col-xs-12"/>
                                                        Job Fair
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="radio" class="flat" name="btnApplication" id="btnSocialMedia" value="Social Media" checked=""  class="form-control col-md-7 col-xs-12"/>
                                                        Social Media
                                                    </div>
                                                </div>
                                            </form>
                                        </div-->

                                        <div id="step-2" class="">
                                            <center>
                                                <h2>Personal Information</h2>
                                            </center>
                                            <br>
                                            
                                            <form id="formPersonalInfo" data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                                        Driver photo<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" id="photo" name="photo" accept="image/*" class="col-md-7 col-xs-12" >
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtFName" name="txtFName" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Middle Name
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtMName" name="txtMName" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtLName" name="txtLName" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="txtLName" name="txtTileName" placeholder="Title (Eg: III, Jr., Sr.)" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="txtLName" name="txtNickName" placeholder="Nickname" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sex <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                                        Male <input type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        Female <input type="radio" class="flat" name="gender" id="genderF" value="Female" />
                                                    </div>
                                                </div>

                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cmbxCivilStatus">
                                                    Civil Status <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="cmbxCivilStatus" id="cmbxCivilStatus" class="form-control" required>
                                                            <option value="">Choose..</option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="date" id="dtBDate" name="dtBDate" class="form-control" required/>
                                                    </div>
                                                    <label class="control-label col-md-1 col-sm-1 col-xs-12">Age 
                                                    </label>
                                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                                        <input type="text" id="txtAge" name="txtAge" class="form-control" value="" disabled/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtBirthPlace">Place of birth <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtBirthPlace" name="txtBirthPlace" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Citizenship <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtCitizen" name="txtCitizen" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Religion <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtReligion" name="txtReligion" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Height <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtHeight" name="txtHeight" required="required" placeholder="in feet" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Weight <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtWeight" name="txtWeight" required="required" placeholder="in kg" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cmbxCivilStatus">
                                                    Residence Type <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="cmbxResidenceType" id="cmbxResidenceType" class="form-control" required>
                                                            <option value="">Choose..</option>
                                                            <option value="Owned">Owned</option>
                                                            <option value="Rented">Rented</option>
                                                            <option value="Living with parents">Living with parents</option>
                                                            <option value="Mortage">Mortage</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Contact number <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtContact" name="txtContact" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Address <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtCurrAddress" name="txtCurrAddress" required="required" placeholder="Current Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> 
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtPermAddress" name="txtPermAddress" required="required" placeholder="Permanent Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> 
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtPrevAddress" name="txtPrevAddress" required="required" placeholder="Previous Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> SSS <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtSSS" name="txtSSS" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> TIN <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtTIN" name="txtTIN" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> PhilHealth <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtPhilHealth" name="txtPhilHealth" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> Pag-ibig <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtPagIbig" name="txtPagIbig" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                            </form>
                                        </div>

                                        <div id="step-3" class="">
                                            <center>
                                                <h2>Educational Background</h2>
                                            </center>
                                            <br>

                                            <form id="formEducBackground" data-parsley-validate class="form-horizontal form-label-left">
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Grade school <span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtGSName" name="txtGSName" required="required" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtGSAddress" name="txtGSAddress" required="required" placeholder="Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">High school <span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtHSName" name="txtHSName" required="required" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtHSAddress" name="txtHSAddress" required="required" placeholder="Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">College <span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtCollegeName" name="txtCollegeName" required="required" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtCollegeAddress" name="txtCollegeAddress" required="required" placeholder="Address" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                

                                            </form>
                                        </div>

                                        <div id="step-4" class="">
                                            <center>
                                                <h2 class="StepTitle">Professional Exam</h2>
                                            </center>
                                            <br>

                                            <form id="formProfExam" data-parsley-validate class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Taken <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="date" id="dtExamTaken" name="dtExamTaken" class="form-control" required/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Exam Taken<span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtExamName" name="txtExamName" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Rating <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        Passed <input type="radio" class="flat" name="btnRating" id="btnPassed" value="Passed" checked="" required class="form-control col-md-7 col-xs-12"/>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        Fail <input type="radio" class="flat" name="btnRating" id="btnFail" value="Fail" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">License Number<span class="required">*</span>
                                                    </label>    
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="txtLicenseNum" name="txtLicenseNum" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>

                                        <div id="step-5" class="">
                                            <center>
                                                <h2 class="StepTitle">Work Experience</h2>
                                            </center>

                                            <h4 class="pull-right">
                                                <a href="" onclick="return false" class="add-new-WE">Add new</a>
                                            </h4>

                                            <br>

                                            <table id="tblWE" class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">
                                                            Company name 
                                                        </th>
                                                        <th class="column-title">
                                                            Position
                                                        </th>
                                                        <th class="column-title">
                                                            Description
                                                        </th>
                                                        <th class="column-title">
                                                            Contact number
                                                        </th>
                                                        <th class="column-title">
                                                            Reason for leaving
                                                        </th>
                                                        <th class="column-title no-link last" colspan="1">
                                                            <span class="nobr">Action</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td contenteditable="true" class=""></td>
                                                        <td contenteditable="true"class=""></td>
                                                        <td class="">
                                                            <input type="date" name="dateResigned" class="form-control dateResigned" required/>
                                                        </td>
                                                        <td contenteditable="true" class=""></td>
                                                        <td contenteditable="true" class=""></td>
                                                        <td>
                                                            <a href="" onclick="return false" class="btnDelete">Delete</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div id="step-6" class="">
                                            <center>
                                                <h2 class="StepTitle">References</h2><br>
                                                <small>Please provide three references from your previous employers (if previously or currently employed) who are not your relative if have not been employed</small>
                                            </center>
                                            
                                            <h4 class="pull-right">
                                                <a href="" onclick="return false" class="add-new-reference">Add new</a>
                                            </h4>

                                            <br>

                                            <table id="tblReferences" class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">
                                                            Name/Company 
                                                        </th>
                                                        <th class="column-title">
                                                            Occupation
                                                        </th>
                                                        <th class="column-title">
                                                            Address
                                                        </th>
                                                        <th class="column-title">
                                                            Contact number
                                                        </th>
                                                        <th class="column-title no-link last" colspan="1">
                                                            <span class="nobr">Action</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td contenteditable="true" class=""></td>
                                                        <td contenteditable="true"class=""></td>
                                                        <td contenteditable="true" class=""></td>
                                                        <td contenteditable="true" class=""></td>
                                                        <td>
                                                            <a href="" onclick="return false" class="btnDelete">Delete</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div id="step-7" class="">
                                            <center>
                                                <h2 class="">Family Background</h2><br>
                                            </center>

                                            <form id="formEducBackground" data-parsley-validate class="form-horizontal form-label-left">
                                                <div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Father
                                                        </label>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtFatherName" name="txtFatherName" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Birthdate
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="dtFatherBDate" name="dtFatherBDate" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtFatherAddress" name="txtFatherAddress" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mother
                                                        </label>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtMotherName" name="txtMotherName" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Birthdate
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="dtMotherBDate" name="dtMotherBDate" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtMotherAddress" name="txtMotherAddress" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Spouse
                                                        </label>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtSpouseName" name="txtSpouseName" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Birthdate
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="dtSpouseBDate" name="dtSpouseBDate" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtSpouseAddress" name="txtSpouseAddress" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <hr>

                                            <div>
                                                <center>
                                                    <h4>Siblings</h4>
                                                </center>
                                                <h4 class="pull-right">
                                                    <a href="" onclick="return false" class="add-new-sibling">Add new</a>
                                                </h4>
                                                
                                                <table id="tblSiblings" class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                        <tr class="headings">
                                                            <th class="column-title">
                                                                Name
                                                            </th>
                                                            <th class="column-title">
                                                                Birthday
                                                            </th>
                                                            <th class="column-title">
                                                                Address
                                                            </th>
                                                            <th class="column-title no-link last" colspan="1">
                                                                <span class="nobr">Action</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td contenteditable="true" class=""></td>
                                                            <td class="">
                                                                <input type="date" name="dateSiblingBirthday" class="form-control dateSiblingBirthday" required/>
                                                            </td>
                                                            <td contenteditable="true" class=""></td>
                                                            <td>
                                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <br><hr>

                                            <div>
                                                <center>
                                                    <h4>Children</h4>
                                                </center>
                                                <h4 class="pull-right">
                                                    <a href="" onclick="return false" class="add-new-children">Add new</a>
                                                </h4>
                                                
                                                <table id="tblChildren" class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                        <tr class="headings">
                                                            <th class="column-title">
                                                                Name
                                                            </th>
                                                            <th class="column-title">
                                                                Birthday
                                                            </th>
                                                            <th class="column-title">
                                                                Address
                                                            </th>
                                                            <th class="column-title no-link last" colspan="1">
                                                                <span class="nobr">Action</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td contenteditable="true" class=""></td>
                                                            <td class="">
                                                                <input type="date" name="dateChildrenBirthday" class="form-control dateChildrenBirthday" required/>
                                                            </td>
                                                            <td contenteditable="true" class=""></td>
                                                            <td>
                                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <br><hr>

                                            <form id="formEmergencyContactPerson" data-parsley-validate class="form-horizontal form-label-left">
                                                <div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-offset-3 col-sm-offset-3 col-md-4 col-sm-4 col-xs-12" for="first-name">Person to notify in case of emergency
                                                        </label>  
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtEmergencyName" name="txtEmergencyName" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtEmergencyAddress" name="txtEmergencyAddress" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Relationship
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtEmergencyRelationship" name="txtEmergencyRelationship" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Number
                                                        </label>    
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="txtEmergencyContactNo" name="txtEmergencyContactNo" placeholder="Name" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div> <!-- /smartWizard -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- jQuery Smart Wizard -->
    <!--script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="../vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            arrJSONSiblings = [
                //                              FORMAT
                //{"strName" : "NAME" , "dtBirthdate" : "YYYY-MM-DD" , "strAddress": "ADDRESS"}
            ];

            arrJSONChildren = [
                //                              FORMAT
                //{"strName" : "NAME" , "dtBirthdate" : "YYYY-MM-DD" , "strAddress": "ADDRESS"}
            ];

            arrJSONWorkExp = [
                //                              FORMAT
                //{"strName" : "NAME" , "strPosition": "Something" , "dtResigned" : "YYYY-MM-DD" , "strContactNo": "0922123124" , "strReason" : "Too far from home"}
            ];

            arrJSONReference = [
                //                              FORMAT
                //{"strName" : "NAME" , "strOccupation" : "Accountant" , "strAddress": "ADDRESS", "strContactNo": "0922123124"}
            ];



            function getSiblings(){
                var strName = "";
                var dtBirthdate = "";
                var strAddress = "";
                var obj = [];

                // check first if there is a record in the table
                if(($("#tblSiblings > tbody").find("tr").length) > 0){
                    $("#tblSiblings tbody tr").each(function(){
                        strName = $(this).children()[0].textContent;
                        dtBirthdate = $(this).find("input.dateSiblingBirthday").val();
                        strAddress = $(this).children()[2].textContent;

                        obj.push({"strName" : strName , "dtBirthdate" : dtBirthdate , "strAddress" : strAddress});

                        arrJSONSiblings = JSON.stringify(obj);
                        obj = JSON.parse(arrJSONSiblings);
                    });
                    arrJSONSiblings = JSON.parse(arrJSONSiblings);
                    console.log(JSON.stringify(arrJSONSiblings));
                }
                else{
                    console.log("fnTableToJSON: Table # of rows = " + $("#tblStages > tbody").find("tr").length);
                }
            }

            function getChildren(){
                var strName = "";
                var dtBirthdate = "";
                var strAddress = "";
                var obj = [];

                // check first if there is a record in the table
                if(($("#tblChildren > tbody").find("tr").length) > 0){
                    $("#tblChildren tbody tr").each(function(){
                        strName = $(this).children()[0].textContent;
                        dtBirthdate = $(this).find("input.dateChildrenBirthday").val();
                        strAddress = $(this).children()[2].textContent;

                        obj.push({"strName" : strName , "dtBirthdate" : dtBirthdate , "strAddress" : strAddress});

                        arrJSONChildren = JSON.stringify(obj);
                        obj = JSON.parse(arrJSONChildren);
                    });
                    arrJSONChildren = JSON.parse(arrJSONChildren);
                    console.log(JSON.stringify(arrJSONChildren));
                }
                else{
                    console.log("fnTableToJSON: Table # of rows = " + $("#tblStages > tbody").find("tr").length);
                }
            }

            function getWorkExperience(){
                var strName = "";
                var dtBirthdate = "";
                var strAddress = "";
                var obj = [];

                // check first if there is a record in the table
                if(($("#tblWE > tbody").find("tr").length) > 0){
                    $("#tblWE tbody tr").each(function(){
                        strName = $(this).children()[0].textContent;
                        strPosition = $(this).children()[1].textContent;
                        dtResigned = $(this).find("input.dateResigned").val();
                        strContactNo = $(this).children()[3].textContent;
                        strReason = $(this).children()[4].textContent;

                        obj.push({"strName" : strName , "strPosition" : strPosition , "dtResigned" : dtResigned, "strContactNo" : strContactNo , "strReason" : strReason});

                        arrJSONWorkExp = JSON.stringify(obj);
                        obj = JSON.parse(arrJSONWorkExp);
                    });
                    arrJSONWorkExp = JSON.parse(arrJSONWorkExp);
                    console.log(JSON.stringify(arrJSONWorkExp));
                }
                else{
                    console.log("fnTableToJSON: Table # of rows = " + $("#tblWE > tbody").find("tr").length);
                }
            }

            function getReference(){
                var strName = "";
                var dtBirthdate = "";
                var strAddress = "";
                var obj = [];

                // check first if there is a record in the table
                if(($("#tblReferences > tbody").find("tr").length) > 0){
                    $("#tblReferences tbody tr").each(function(){
                        strName = $(this).children()[0].textContent;
                        strOccupation = $(this).children()[1].textContent;
                        strAddress = $(this).children()[2].textContent;
                        strContactNo = $(this).children()[3].textContent;

                        obj.push({"strName" : strName , "strOccupation" : strOccupation , "strAddress" : strAddress , "strContactNo" : strContactNo});

                        arrJSONReference = JSON.stringify(obj);
                        obj = JSON.parse(arrJSONReference);
                    });
                    arrJSONReference = JSON.parse(arrJSONReference);
                    console.log(JSON.stringify(arrJSONReference));
                }
                else{
                    console.log("fnTableToJSON: Table # of rows = " + $("#tblReferences > tbody").find("tr").length);
                }
            }
           

            $(document).on("click", ".btnDelete", function(){
                $(this).parent().parent().remove();
            });

            $(document).on("click", ".add-new-WE", function(){  
                $("#tblWE tbody").append('<tr class=""><td contenteditable="true" class=""></td><td contenteditable="true"class=""></td><td class=""><input type="date" name="dateResigned" class="form-control dateResigned" required/></td><td contenteditable="true" class=""></td><td contenteditable="true" class=""></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td></tr>');
            });

            $(document).on("click", ".add-new-reference", function(){
                $("#tblReferences tbody").append('<tr class=""><td contenteditable="true" class=""></td><td contenteditable="true"class=""></td><td contenteditable="true" class=""></td><td contenteditable="true" class=""></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td></tr>');
            });

            $(document).on("click", ".add-new-sibling", function(){
                $("#tblSiblings tbody").append('<tr class=""><td contenteditable="true" class=""></td><td "class=""><input type="date" name="dateSiblingBirthday" class="form-control dateSiblingBirthday" required/></td><td contenteditable="true" class=""></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td></tr>');
            });

            $(document).on("click", ".add-new-children", function(){
                $("#tblChildren tbody").append('<tr class=""><td contenteditable="true" class=""></td><td class=""><input type="date" name="dateChildrenBirthday" class="form-control dateChildrenBirthday" required/></td><td contenteditable="true" class=""></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td></tr>');
            });

            // Smart Wizard functions
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ 
                                                 alert('Finish Clicked'); 
                                                 getSiblings();
                                                 getChildren();
                                                 getWorkExperience();
                                                 getReference();
                                                 //============== SUBMIT DATA TO DATABASE=============
                                                 // FORM NAMES: formApplication, formPersonalInfo, formEducBackground,
                                                 //             formProfExam, formEducBackground, formEmergencyContactPerson
                                                 // JSON NAMES: arrJSONReference, arrJSONWorkExp, arrJSONChildren, arrJSONSiblings
                                            });
            
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ 
                                                 $('#smartwizard').smartWizard("reset"); 
                                             });                      

            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'dots',
                    transitionEffect:'fade',
                    showStepURLhash: false,
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
            });
        });   
    </script> 
        @endsection