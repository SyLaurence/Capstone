        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->

        <div class="right_col" role="main">
          <div class="">
            <!-- page title-->
            
              <div class="title_left">
                <h3><a href="/PersonalInfo/{{$appID}}">{{$driverName}}</a> - Recruitment Progress</h3><br>
                <h4>Written Exam Status: 
                  @if($res==1)
                    <label style="color: #00be70">Passed</label> (<a href="/WrittenDetail/{{$appID}}">View Result</a>)
                  @elseif($res==0)
                    <label style="color: #f82d2d">Failed</label> (<a href="/Written/exam/{{$appID}}">Take Here</a>) | (<a href="/WrittenDetail/{{$appID}}">View Result</a>)
                  @else
                    <label style="color: #faaa20">Not Taken</label> (<a href="/Written/exam/{{$appID}}">Take Here</a>)
                  @endif
                    </h4>
              </div>
              <div class="clearfix"></div>
              <br>
            
            <!-- /page title-->
            @while($ctr<=$lastStage)
            <!-- Stage -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Stage {{$ctr}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- if driver is currently in this stage remove  style="display:none" -->
                  <div class="x_content" style="display:none">

                    <form id="formStageNumber">  <!-- if the driver is currently not in this stage, remove <form> tag -->
                      <table id="stage1Act" class="table table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Activity Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($Activities as $activity)
                          @if($activity->stage_no == $ctr)
                          <tr>
                           <td>
                              <input type="checkbox" name="" id="chkb{{$activity->id}}" value="{{$activity->id}}" class="flat" disabled/>
                           </td>
                          <input type="text" value="{{$count++}}" hidden>
                            <td>{{$activity->name}}</td>
                            <td>
                              {{$arrStart[$Count]}}
                            </td>
                            <td>
                              {{$arrEnd[$activity->id]}}
                            <input type="text" value="{{$Count++}}" hidden/>
                            </td>
                            @if($activity->type == 0)
                              <td>
                              @if(session()->get('level') == 0)
                              <input type="button" id="Doc{{$activity->id}}" class="btn btn-default btn-doc{{$activity->id}}" value="Attach" />
                              @else
                              <input type="button" id="Doc{{$activity->id}}" class="btn btn-default btn-doc{{$activity->id}}" value="Attach" hidden/>
                              @endif
                              </td>
                            @elseif($activity->type == 1)
                              <td>
                              @if(session()->get('level') == 0)
                                <input type="button" id="Evaluate{{$activity->id}}" class="btn btn-primary" value="Evaluate" onclick="location.href = '/Evaluation/{{$activity->id}}/{{$appID}}/Evaluate';">
                                @else
                                <input type="button" id="Evaluate{{$activity->id}}" class="btn btn-primary" value="Evaluate" onclick="location.href = '/Evaluation/{{$activity->id}}/{{$appID}}/Evaluate';" hidden/>
                                @endif
                                @foreach($checkedActivities as $chk)
                                	@if($chk->activity_setup_id == $activity->id)
                                		@if($chk->activityitem != '[]')
                                			<input type="button" class="btn btn-info" value="View Result/s" onclick="location.href='/Evaluation/{{$activity->id}}/{{$appID}}}/Detail';"> @break
                                		@endif
                                	@endif
                                @endforeach
                              </td>
                            @elseif($activity->type == 2)
                              <td>
                              @if(session()->get('level') == 0)
                                <input type="button" id="Interview{{$activity->id}}" class="btn btn-primary" value="Interview" onclick="location.href = '/Interview/{{$activity->id}}/{{$appID}}/Interview';">
                                @else
                                <input type="button" id="Interview{{$activity->id}}" class="btn btn-primary" value="Interview" onclick="location.href = '/Interview/{{$activity->id}}/{{$appID}}/Interview';" hidden/>
                                @endif
                                @foreach($checkedActivities as $chk)
                                  @if($chk->activity_setup_id == $activity->id)
                                    @if($chk->recommendation != '')
                                      <input type="button" class="btn btn-info" value="View Details" onclick="location.href='/Interview/{{$activity->id}}/{{$appID}}/Detail';"> @break
                                    @endif
                                  @endif
                                @endforeach
                              </td>
                            @endif
                            <td></td>
                          </tr>
                          @endif
                        @endforeach
                        </tbody>
                      </table>

                      
                      <!-- to be removed if driver not in this stage -->
											
                    </form>
                    <!-- to be removed if driver not in this stage -->

                  </div>
                </div>
              </div>
            </div>
            <!-- /Stage -->
            <input type="text" id="hdctr" value="{{$ctr++}}" hidden>
            @endwhile
            @if($hired == 0)
            <div class="form-group">
              <div class="col-md-6 col-md-offset-5">
              @if(session()->get('level') == 0)
                <input type="button" onclick="toSubmit()" id="btnSubmit" class="btn btn-success" value="Update">
              @endif
              </div>
            </div>
            @endif
            @if($lastStage == 0)
              <div>
                <br><br><br>
                <center>
                  <h1>
                    No Existing Record of Activities
                  </h1>
                </center>
              </div>
            @endif
            <form id="formAdd" method="post" action="{{route('Recruitment.store')}}" hidden>
            {{csrf_field()}}
              @for($countNotChecked = 0; $countNotChecked < count($arrNotChecked) ; $countNotChecked++)
                <input type="text" id="checked{{$countNotChecked}}" name="checked{{$countNotChecked}}" hidden>  
              @endfor
              <input type="text" id="totalAct" name="totalAct" hidden>  
              <input type="text" id="recID" name="recID" value="{{$recID}}" hidden> 
              <input type="text" id="appID" name="appID" value="{{$appID}}" hidden> 
            </form>
            <!-- Modal Delete -->
            <div class="modal fade" id="forContract" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">First Contract</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span class="fa fa-file-text-o"></span>&nbsp; Pass {{$driverName}} to First Contract?
                            </div>
                        </div>
                        <form id="Con" action="{{action('RecruitmentController@update', $appID)}}" method="post">
                        <input type="text" id="txtType" value="Con" name="type" hidden>
                        {{csrf_field()}}
                          <div class="modal-footer ">
                          <input name="_method" type="hidden" value="PATCH">
                              <button type="button" onclick="changevalue();" class="btn btn-default btn-delete-yes"> Hold </button>
                              <button type="submit" class="btn btn-success btn-delete-yes"> Yes </button>
                          </div>
                        </form>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            @foreach($Activities as $activity)
            @if($activity->type == 0)
              <!-- Modal Delete -->
              <div class="modal fade" id="modalDoc{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title custom_align" id="Heading">Attach Document - {{$activity->name}}</h4>
                          </div>
                          <div class="modal-body">
                            <!-- <h5 class="pull-right">
                                <a href="" onclick="return false" class="add-new-page">Add page</a>
                            </h5> -->
                            <br>
                            <form action="{{action('RecruitmentController@update', $appID)}}" method="post" id="formDoc{{$activity->id}}">
                              <input type="text" value="Doc" name="type" hidden>
                              <input type="text" value="{{$activity->id}}" name="actID" hidden>
                              <input name="_method" type="hidden" value="PATCH">
                              {{csrf_field()}}
                              <div id="DocDiv">
                                <input type="file" id="photo" name="photo" accept="image/*" value="default"><br>
                                <img id="DocImg" src="#" alt="" />
                              </div>
                          </form>
                          </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                <input type="button" onclick="submit{{$activity->id}}();" class="btn btn-success" value="Submit" />
                            </div>
                      </div> <!-- /.modal-content --> 
                  </div> <!-- /.modal-dialog -->
              </div>
              <!--/Modal Delete -->
            @endif
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
    <!-- bootstrap-datetimepicker -->    
    <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
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

    <!-- Custom Theme Scripts for this HTML -->
    <script src="{{asset('js/recruitment-details-view.js')}}"></script>

    <script>

    function changevalue(){
      document.getElementById('txtType').value = 'hold';
      document.getElementById('Con').submit();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#DocImg').attr('src', e.target.result).width(540);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#photo").change(function(){
        readURL(this);
    });

    @foreach($Activities as $activity)
      @if($activity->type == 0)
        function submit{{$activity->id}}(){
          document.getElementById("formDoc{{$activity->id}}").submit();
        }
      @endif
    @endforeach

    $(document).ready(function(){
      @if($showModal == 1 && $res==1)
        @if($hired == 0)
          $("#forContract").modal("show");      
        @endif
      @endif

       @foreach($Activities as $activity)
       @if($activity->type == 0)
          $(".btn-doc{{$activity->id}}").click(function(){
            console.log("Delete!");
            $("#modalDoc{{$activity->id}}").modal("show");
          });
          @endif
        @endforeach

        @for($count = 0; $count < count($arrNotChecked) ; $count++)
        	$("#chkb{{$arrNotChecked[$count]}}").click(function() {
			    if(document.getElementById('chkb{{$arrNotChecked[$count]}}').checked) {
			        alert('asd');
			    }
			});
      	@endfor

        // $(document).on("click", ".add-new-page", function () {
        //     var toTrim = document.getElementById('photo').name;
        //     var ctr = toTrim.substring(5, 6);
        //     ctr++;
        //         $("#DocDiv").append('<input type="file" id="photo" name="photo"'+ ctr +' accept="image/*" class="" value="default"><br>');
        //     });


      });
    
    var counter = 1;
    var c = 0;
    @foreach($Activities as $activity)
      c = counter;
      @if($activity->type == 3)
        @if(session()->get('level') == 0)
          document.getElementById("chkb" + c).disabled = false;
        @else
          document.getElementById("chkb" + c).disabled = true;
        @endif
      @endif
      @foreach($checkedActivities as $chkAct)
        @if($activity->id == $chkAct->activity_setup_id && $chkAct->recommendation == "Pass")
          document.getElementById("chkb" + c).checked = true;
          document.getElementById("chkb" + c).disabled = true;
          @if($activity->type == 1)
            document.getElementById("Evaluate{{$activity->id}}").style.visibility = "hidden";
          @elseif($activity->type == 2)
            document.getElementById("Interview{{$activity->id}}").style.visibility = "hidden";
           @elseif($activity->type == 0) 
           document.getElementById("Doc{{$activity->id}}").style.visibility = "hidden";
          @endif
        @endif
      @endforeach
      counter++;
    @endforeach

      function toSubmit(){
      	@for($c = 0; $c< count($arrNotChecked); $c++)
      		if(document.getElementById('chkb{{$arrNotChecked[$c]}}').checked){
      			document.getElementById('checked{{$c}}').value = "{{$arrNotChecked[$c]}}";
      		} else {
      			document.getElementById('checked{{$c}}').value = "notchecked";
      		}
      	@endfor
      	document.getElementById('totalAct').value = '{{count($arrNotChecked)}}'
        document.getElementById("formAdd").submit();
      }

    </script>
    @endsection
