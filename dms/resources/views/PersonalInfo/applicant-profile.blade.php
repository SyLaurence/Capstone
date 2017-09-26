
    @extends ('layouts.nav')    
    @section ('title')
        User | Applicant
    @endsection
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title & search bar -->
            <div class="page-title">
              <div class="title_left">
                <h3>Name: {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}</h3>
                <h5><b>BUS COMPANY:</b> {{$busname}}</h5>
                <h5><b>Contact number:</b> {{$applicant->contact_no}}</h5>
                <h5><b>Current Status:</b> 
                  @if($currStat == 0)
                    @if($completed == 1)
                    <a href="/Recruitment/{{$applicant->id}}">Recruitment</a> <a id="Cont">(Pass to 1st Contract)</a> <br><br>
                    @else
                    <a href="/Recruitment/{{$applicant->id}}">Recruitment</a><br><br>
                    @endif
                    <b>Last Activity:</b> {{$actName}}<br><br>
                    @if($actName != "No Completed Activities.")
                      <b>Date Completed:</b> {{date_format(date_create($act->end_date),"F j, Y")}}
                    @endif
                  @elseif($currStat == 1)
                    {{$status}}<br><br>
                    <b>Start Date:</b> {{date_format(date_create($hire->created_at),"F j, Y")}}<br><br>
                    <b><a href="/Recruitment/{{$applicant->id}}"><u>View Recruitment Details</u></a></b>
                  @elseif($currStat == 2)
                    {{$status}}<br><br>
                      <b>Job Duration (In Years):</b> {{$years}}
                    <br><br>
                    <b>Job Ended At:</b> {{date_format(date_create($hire->created_at),"F j, Y")}}<br><br>
                    <b><a href="/Recruitment/{{$applicant->id}}"><u>View Recruitment Details</u></a></b>
                  @endif
                </h5>
              </div>
              <div class="pull-right">
                <!-- photo of user from database PLEASE CHANGE SRC(SOURCE) -->
                <img src="/{{$applicant->image_path}}" alt="" class="image-width-120px image-height-120px"> 
              </div>
            </div>

            <div class="clearfix"></div>
            <!-- Document -->
                  <div class="row">
                  <div class="container">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2> Documents </h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="display: none;">
                            <table class="table table-striped jambo_table bulk_action">
                              <!-- <thead>
                                <tr class="headings">
                                  <th class="column-title"></th>
                                </tr>
                              </thead> -->
                              <tbody>
                              @for($ctr = 0; $ctr < count($arrName); $ctr++)
                                <tr class="even-pointer">
                                  <td class=" "> <a href="#" id="view{{$ctr}}" ><center><h5>{{$arrName[$ctr]}}</h5></center></a> </td>
                                </tr>
                              @endfor
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2> Evaluations </h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="display: none;">
                            <table class="table table-striped jambo_table bulk_action">
                              <h3>Recruitment</h3>
                              <thead>
                                  <th class="column-title">Name</th>
                                  <th></th>
                              <tbody>
                              @for($ctr = 0; $ctr < count($arrEval); $ctr++)
                                <tr class="even-pointer">
                                  <td class=" ">{{$arrEval[$ctr]['name']}}</td>
                                  <td><input type="button" class="btn btn-info" value="View Result/s" onclick="location.href='/Evaluation/{{$arrEval[$ctr]['id']}}/{{$applicant->id}}/Detail'"></td>
                                </tr>
                              @endfor
                              </tbody>
                            </table>
                            @if($hasApp==1)
                            <table class="table table-striped jambo_table bulk_action">
                            <h3>Performance Appraisal</h3>
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">Date</th>
                                  <th class="column-title">Period</th>
                                  <th class="column-title">Evaluated By</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                              @for($ctr = 0; $ctr < count($arrApp); $ctr++)
                                <tr class="even-pointer">
                                <td>{{$arrApp[$ctr]['date']}}</td>
                                  <td class=" ">{{$arrApp[$ctr]['period']}}</td>
                                  <td>{{$arrApp[$ctr]['name']}}</td>
                                  <td><input type="button" class="btn btn-info" value="View Details" onclick="location.href='/Appraisal/{{$arrApp[$ctr]['id']}}/{{$applicant->id}}}/Detail'"></td>
                                </tr>
                              @endfor
                              </tbody>
                            </table>
                            @endif
                        </div>
                      </div>
                    </div>
                   
                    <!-- <div class="col-md-5 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2> Interviews </h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="display: none;">
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                <tr class="headings">
                                  <th class="column-title">Date</th>
                                  <th class="column-title">Name</th>
                                  <th class="column-title">Evaluated By</th>
                                </tr>
                              </thead>
                              <tbody>
                              @for($ctr = 0; $ctr < count($arrInter); $ctr++)
                                <tr class="even-pointer">
                                  <td></td>
                                  <td class=" "> <a href="/Interview/{{$arrInter[$ctr]['id']}}/{{$applicant->id}}/Detail" ><center><h5>{{$arrInter[$ctr]['name']}}</h5></center></a> </td>
                                  <td></td>
                                </tr>
                              @endfor
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div> -->

                  </div>
                  <!-- Document -->

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
                        <label for="">Date of Birth:</label> {{date_format(date_create($applicant->dob),"F j, Y")}} <br>
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
                              {{date_format(date_create($fam->dob),"F j, Y")}}
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
                              {{date_format(date_create($fam->dob),"F j, Y")}}
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
                              {{date_format(date_create($fam->dob),"F j, Y")}}
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
                          <td class=" "> {{date_format(date_create($fam->dob),"F j, Y")}} </td>
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
                          <td class=" "> {{date_format(date_create($fam->dob),"F j, Y")}} </td>
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
            @for($ctr = 0; $ctr< count($arrName);$ctr++)
            <!-- Modal Delete -->
            <div class="modal fade" id="modal{{$ctr}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">{{$arrName[$ctr]}}</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img src="/{{$arrImage[$ctr]}}" height="100%" width="100%"> 
                            </div>
                        </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            @endfor
            <!-- Modal Delete -->
            <div class="modal fade" id="forContract{{$applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">First Contract</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span class="fa fa-file-text-o"></span>&nbsp; Pass {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} to First Contract?
                            </div>
                        </div>
                        <form action="{{action('RecruitmentController@update', $applicant->id)}}" method="post">
                        <input type="text" value="Con" name="type" hidden>
                        {{csrf_field()}}
                          <div class="modal-footer ">
                          <input name="_method" type="hidden" value="PATCH">
                              <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                              <button type="submit" class="btn btn-success btn-delete-yes"> Yes </button>
                          </div>
                        </form>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
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
    <script type="text/javascript">
      
      @for($ctr = 0; $ctr< count($arrImage); $ctr++)
        $("#view{{$ctr}}").click(function(){
          console.log("Delete!");
          $("#modal{{$ctr}}").modal("show");
        });
        @endfor
        $("#Cont").click(function(){
          $("#forContract{{$applicant->id}}").modal("show");
        });
    </script>
    @endsection
