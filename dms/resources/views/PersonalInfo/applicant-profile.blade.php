        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title & search bar -->
            <div class="page-title">
              <div class="title_left">
                <h3>Name: {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}</h3>
                <h5>ID:  {{$applicant->id}}</h5>
                <h5>BUS COMPANY: </h5>
                <h5>Contact number: {{$applicant->contact_no}}</h5>
              </div>
              <div class="pull-right">
                <!-- photo of user from database PLEASE CHANGE SRC(SOURCE) -->
                <img src="images/0003.jpg" alt="" class="image-width-120px image-height-120px"> 
              </div>
            </div>
            <div class="clearfix"></div>


            <!-- personal information -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Personal Information </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Civil Status:</label> 
                        @if($applicant->civil_status == 0)
                              Single
                        @endif
                        @if($applicant->civil_status == 1)
                              Married
                        @endif
                        @if($applicant->civil_status == 2)
                              Widowed
                        @endif <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Citizenship:</label> {{$applicant->citizenship}} <br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Date of Birth:</label> {{$applicant->dob}} <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Place of Birth:</label> {{$applicant->pob}} <br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for=""> Height:</label> {{$applicant->height}} <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for=""> Weight:</label> {{$applicant->weight}} <br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Religion:</label> {{$applicant->religion}} <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Residence Type:</label> 
                        @if($applicant->residence_type == 0)
                              Rented
                        @endif
                        @if($applicant->residence_type == 1)
                              Living with Parents
                        @endif
                        @if($applicant->residence_type == 2)
                              Mortage
                        @endif
                        @if($applicant->residence_type == 3)
                              Owned
                        @endif
                         <br>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Current Address:</label> 
                        @foreach($applicant->address as $add)
                              @if($add->type == 1)
                                    {{$add->address}}
                              @endif
                      @endforeach
                         <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Permanent Address:</label> 
                        @foreach($applicant->address as $add)
                            @if($add->type == 2)
                                  {{$add->address}}
                            @endif
                        @endforeach <br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Previous Address:</label> 
                        @foreach($applicant->address as $add)
                          @if($add->type == 0)
                                {{$add->address}}
                          @endif
                        @endforeach <br>
                      </div>
                    </div>

                    <hr>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">SSS:</label> {{$applicant->sss_id}} <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">TIN:</label> {{$applicant->tin_id}} <br>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">PhilHealth:</label> {{$applicant->philhealth}} <br>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="">Pag-ibig:</label> {{$applicant->pagibig}} <br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /personal information -->

            <!-- Educational background -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Educational background </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title"></th>
                          <th class="column-title">
                            Name
                          </th>
                          <th class="column-title">
                            Address
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr class="even-pointer">
                            <td class=" ">
                                Grade School
                            </td>
                            @foreach($applicant->educationbackground as $ed)
                              @if($ed->level == 0)
                            <td class=" ">
                                {{$ed->school_name}}
                            </td>
                            <td class=" ">
                                {{$ed->school_address}}
                            </td>
                            @endif
                            @endforeach
                          </tr>
                          <tr class="odd-pointer">
                            <td class=" ">
                                High School
                            </td>
                            @foreach($applicant->educationbackground as $ed)
                              @if($ed->level == 1)
                            <td class=" ">
                                {{$ed->school_name}}
                            </td>
                            <td class=" ">
                                {{$ed->school_address}}
                            </td>
                            @endif
                            @endforeach
                          </tr>
                          <tr class="even-pointer">
                            <td class=" ">
                                College
                            </td>
                            @foreach($applicant->educationbackground as $ed)
                              @if($ed->level == 2)
                            <td class=" ">
                                {{$ed->school_name}}
                            </td>
                            <td class=" ">
                                {{$ed->school_address}}
                            </td>
                            @endif
                            @endforeach
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Educational background -->

            <!-- Professional Exam -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Professional Exam </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Exam Name</th>
                            <th class="column-title">Date Taken</th>
                            <th class="column-title">Rating</th>
                            <th class="column-title">Liscence Number</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($applicant->professionalexam as $pxm)
                          <tr class="even-pointer">
                            <td class=" "> {{$pxm->name}} </td>
                            <td class=" "> {{$pxm->date}} </td>
                            <td class=" "> {{$pxm->rating}} </td>
                            <td class=" "> {{$pxm->license_no}} </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Professional Exam -->
          
            <!-- Work Experience -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Work Experience </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title">
                              Company name
                          </th>
                          <th class="column-title">
                              Position
                          </th>
                          <th class="column-title">
                              Date Resigned
                          </th>
                          <th class="column-title">
                              Contact Number
                          </th>
                          <th class="column-title">
                              Reason for leaving
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($applicant->workexperience as $wxp)
                        <tr class="even-pointer">
                          <td class=" "> {{$wxp->name}} </td>
                          <td class=" "> {{$wxp->position}} </td>
                          <td class=" "> {{$wxp->date_resigned}} </td>
                          <td class=" "> {{$wxp->contact_no}} </td>
                          <td class=" "> {{$wxp->reason_for_leaving}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- References -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> References </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">
                    <table class="table table-striped jambo_table bulk_action">
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
                              Contact Number
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($applicant->referer as $ref)
                        <tr class="even-pointer">
                          <td class=" "> {{$ref->name}} </td>
                          <td class=" "> {{$ref->occupation}} </td>
                          <td class=" "> {{$ref->address}} </td>
                          <td class=" "> {{$ref->contact_no}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Family Background -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Family Background </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right">
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none;">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title"></th>
                          <th class="column-title">
                            Name
                          </th>
                          <th class="column-title">
                            Birthdate
                          </th>
                          <th class="column-title">
                            Address
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($applicant->familybackground as $fam)
                        @if($fam->relationship == 2)
                        <tr class="even-pointer">
                          <td class=" ">
                              Spouse
                          </td>
                          <td class=" ">
                              {{$fam->name}}
                          </td>
                          <td class=" ">
                              {{$fam->dob}}
                          </td>
                          <td class=" ">
                              {{$fam->address}}
                          </td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach($applicant->familybackground as $fam)
                        @if($fam->relationship == 0)
                        <tr class="even-pointer">
                          <td class=" ">
                              Father
                          </td>
                          <td class=" ">
                              {{$fam->name}}
                          </td>
                          <td class=" ">
                              {{$fam->dob}}
                          </td>
                          <td class=" ">
                              {{$fam->address}}
                          </td>
                        </tr>
                        @endif
                        @endforeach
                        @foreach($applicant->familybackground as $fam)
                        @if($fam->relationship == 1)
                        <tr class="even-pointer">
                          <td class=" ">
                              Mother
                          </td>
                          <td class=" ">
                              {{$fam->name}}
                          </td>
                          <td class=" ">
                              {{$fam->dob}}
                          </td>
                          <td class=" ">
                              {{$fam->address}}
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>

                    <br><br>
                    <center>
                        <h5>Siblings</h5>
                    </center>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title">
                            Name
                          </th>
                          <th class="column-title">
                            Birthdate
                          </th>
                          <th class="column-title">
                            Address
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($applicant->familybackground as $fam)
                        @if($fam->relationship == 3)
                        <tr class="even pointer">
                          <td class=" "> {{$fam->name}} </td>
                          <td class=" "> {{$fam->dob}} </td>
                          <td class=" "> {{$fam->address}} </td>
                        </tr>
                        @endif
                      @endforeach
                      </tbody>
                    </table>

                    <br><br>
                    <center>
                        <h5>Children</h5>
                    </center>
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th class="column-title">
                            Name
                          </th>
                          <th class="column-title">
                            Birthdate
                          </th>
                          <th class="column-title">
                            Address
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($applicant->familybackground as $fam)
                        @if($fam->relationship == 4)
                        <tr class="even pointer">
                          <td class=" "> {{$fam->name}} </td>
                          <td class=" "> {{$fam->dob}} </td>
                          <td class=" "> {{$fam->address}} </td>
                        </tr>
                        @endif
                      @endforeach
                      </tbody>
                    </table>
                    
                    <br><hr><br>

                    <center>
                      <label for="">Person to nofify in case of emergency</label> <br>
                    </center>
                    @foreach($applicant->foremergency as $fem)
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label for="">Name:</label> {{$fem->person_to_notify}}  <br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label for="">Address:</label> {{$fem->address}} <br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label for="">Relationship:</label> {{$fem->relationship}} <br>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <label for="">Contact Number:</label> {{$fem->contact_no}} <br>
                    </div>
                    @endforeach
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
    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    @endsection
