        @extends ('pages.layout.nav')
        @section ('pageContent') 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title-->
            <div class="page-title">
                <div class="title_left">
                    <h4>
                      <a href="recruitment-setup.html">Recruitment process</a> >
                      <a href="javascript:(0)">Driver Recruitment</a>
                    </h4>
                </div>
                <div class="pull-right">
                    <input type="button" class="btn btn-default" value="New Stage" onclick="location.href ='/Stage/create';">
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- /page title-->

            <br>
            @foreach($stages as $stage)
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{$stage->name}}</h2>
                    <input type="text" id="hfStageID" name="{{$stage->id}}" value="" hidden disabled>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/Stage/{{$stage->id}}/edit">Edit</a></li>
                          <li><a href="javascript:(0)" class="delete-stage{{$stage->id}}">Delete</a></li>
                          <li class="divider"></li>
                          <li><a href="/Activity/{{$stage->id}}/create">Add Activity</a></li>
                        </ul>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display:none">
                    <div>
                      <label for="">Target days:</label> {{$stage->targetdays}} 
                    </div>
                    <br>

                    <table id="stage1Act" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Activity Name</th>
                          <th>Type</th>
                          <th>Grade Type</th>
                          <th>Passing grade</th>
                          <th>Max. grade</th>
                          <th>Skippable</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($activities as $activity)
                      @if($activity->stagesetup_id == $stage->id)
                        <tr>
                          <td>{{$activity->name}}</td>
                          @if($activity->type == 0)
                            <td>Status</td>
                          @endif
                          @if($activity->type == 1)
                            <td>Grade</td>
                          @endif
                          @if($activity->type == 1)
                            @if($activity->passingcriteria == 0)
                            <td>Sum</td>
                            @endif
                            @if($activity->passingcriteria == 1)
                            <td>Average</td>
                            @endif
                          @endif
                          @if($activity->type == 0)
                            <td>-</td>
                          @endif
                          @if($activity->type == 0)
                            <td>-</td>
                          @endif
                          @if($activity->type == 1)
                            <td>{{$activity->passing}}</td>
                          @endif
                          @if($activity->type == 0)
                            <td>-</td>
                          @endif
                          @if($activity->type == 1)
                            <td>{{$activity->maxrate}}</td>
                          @endif
                          @if($activity->isskippable == 0)
                            <td>No</td>
                          @endif
                          @if($activity->isskippable == 1)
                            <td>Yes</td>
                          @endif
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '/Activity/{{$activity->id}}/edit';">
                            <input type="button" class="btn btn-danger delete-activity{{$activity->id}}" value="Delete">
                            @if($activity->hassubactivity == 1)
                            <input type="button" class="btn btn-info" value="View items" onclick="location.href='activity-items-view.html';">
                            @endif
                          </td>
                        </tr>
                        @endif
                        @endforeach
                        <!--tr>
                          <td>Application Info</td>
                          <td>Status</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>No</td>
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = 'activity-edit.html';">
                            <input type="button" class="btn btn-danger delete-activity" value="Delete">
                          </td>
                        </tr>
                        <tr>
                          <td>Road test</td>
                          <td>Grade</td>
                          <td>Sum</td>
                          <td>75</td>
                          <td>100</td>
                          <td>Yes</td>
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = 'activity-edit.html';">
                            <input type="button" class="btn btn-danger delete-activity" value="Delete">
                            <input type="button" class="btn btn-info" value="View items" onclick="location.href='activity-items-view.html';">
                          </td>
                        </tr-->
                      </tbody>
                    </table>
                  </div>
                  <!-- Modal Delete Stage -->
                    <div class="modal fade" id="modalDeleteStage{{$stage->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                              </div>
                              <div class="modal-body">
                                <div>
                                  <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this stage?
                                </div>
                              </div>
                              <form action="{{action('StageController@destroy', $stage->id)}}" method="post">
                                <div class="modal-footer ">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-default btn-delete-stage-no" data-dismiss="modal"> No </button>
                                <button type="submit" class="btn btn-success btn-delete-stage-yes"> Yes </button>
                              </div>
                          </form>
                          </div> <!-- /.modal-content --> 
                      </div> <!-- /.modal-dialog -->
                    </div>
                    <!--/Modal Delete Stage -->
                </div>
              </div>
            </div>
            @endforeach
            @foreach($activities as $activity)
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
                      <form method="post">
                     
                      {{csrf_field()}}
                      <div class="modal-footer ">
                      <input name="_method" type="hidden" value="DELETE">
                        <button type="button" class="btn btn-default btn-delete-act-no" data-dismiss="modal"> No </button>
                        <button type="submit" class="btn btn-success btn-delete-act-yes"> Yes </button>
                      </div>
                  </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            @endforeach
           
          </div>
        </div>
        <!-- /page content -->
        @endsection

    <!--===================================================================================================================-->
    
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
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- jQuery Smart Wizard -->
    <!--script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="../vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Custom Theme Scripts for this HTML -->
    <script src="js/recruitment-details-view.js"></script>

    <script>
      $(document).ready(function(){
        var stageID = "";

        //===== STAGE crud functions
        @foreach($stages as $stage)
        $(".delete-stage{{$stage->id}}").click(function(){
          stageID = $(this).parent().parent().parent().parent().parent().find("input").attr('name');
          console.log(stageID);
          $("#modalDeleteStage{{$stage->id}}").modal("show");
        });
        @endforeach
        $(".btn-delete-stage-no").click(function(){
          stageID = "";
        });

        @foreach($activities as $activity)
        //===== ACTIVITY crud functions
        $(".delete-activity{{$activity->id}}").click(function(){
          $("#modalDeleteActivity{{$activity->id}}").modal("show");
        });
        @endforeach
      });
    </script> 
  </body>
</html>
