        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title-->
            <div class="page-title">
              <div class="title_left">
                <h3>Activities</h3>
              </div>
              <div class="pull-right">
                <input type="button" class="btn btn-default" value="New Activity" onclick="location.href ='Stage/create';">
              </div>
              <div class="clearfix"></div>
              <br>
            </div>
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

                  <div class="x_content" style="display:none">
                    <div>
                      <label for="">Target days:</label> {{$arrTarget[$ctr-1]}}
                    </div>
                    <br>
                    <table id="stage1Act" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Activity Name</th>
                          <th>Type</th>
                          <th>Skippable</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($Activities as $activity)
                        @if($activity->stage_no == $ctr)
                        <tr>
                        @if($activity->stage_no == $ctr)
                          <td>{{$activity->name}}</td>
                          @endif
                          @if($activity->type == 0)
                              <td>Document</td>
                          @endif
                          @if($activity->type == 1)
                              <td>Evaluation</td>
                          @endif
                          @if($activity->type == 2)
                              <td>Interview</td>
                          @endif
                           @if($activity->type == 3)
                              <td>Onboarding</td>
                          @endif
                          @if($activity->is_skippable == 1)
                          <td>Yes</td>
                          @endif
                          @if($activity->is_skippable == 0)
                          <td>No</td>
                          @endif
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = 'Stage/{{$activity->id}}/edit';">
                            <input type="button" class="btn btn-danger delete-activity{{$activity->id}}" value="Delete">
                            @if($activity->type == 1)
                              <input type="button" value="View Factor/s" class="btn btn-info" onclick="location.href = 'Stage/Activity/{{$activity->id}}';">
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Stage -->
            <input type="text" id="hdctr" value="{{$ctr++}}" hidden>
            @endwhile
            @if($lastStage == 0)
            	<div>
                <br><br><br>
                <center>
                  <h1>
                    No Existing Record
                  </h1>
                </center>
              </div>
            @endif
            @foreach($Activities as $activity)
            <!-- Modal Delete -->
            <div class="modal fade" id="modalDeleteActivity{{$activity->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                          <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this activity?
                        </div>
                      </div>
                      <form action="{{action('StageController@destroy', $activity->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> No </button>
                        <button type="submit" class="btn btn-success btn-delete-act-yes"> Yes </button>
                      </div>
                      </form>
                  </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
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
    <script src="js/recruitment-details-view.js')}}"></script>

    <script>
      $(document).ready(function(){

        //===== ACTIVITY crud functions
        @foreach($Activities as $activity)
        $(".delete-activity{{$activity->id}}").click(function(){
          $("#modalDeleteActivity{{$activity->id}}").modal("show");
        });
        @endforeach
        $(".btn-delete-stage-yes").click(function(){
          //delete activity
        });

      });
    </script> 
    @endsection
