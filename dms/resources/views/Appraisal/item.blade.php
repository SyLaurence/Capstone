        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Criteria
          @endsection
        @else
          @section ('title')
          HR Staff | Criteria
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
                      Performance Evaluation Criteria
                    </h3>
                </div>
            </div>
            <!-- /page title & search bar -->
            <div class="clearfix"></div>
            <!-- table -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <div class="row">
                        <h4>
                          <div class="col-md-4">
                            <label>Regular Number of Trips per Month: </label><br><br>
                            <label>Number of Feedbacks: </label><br><br>
                            <label>Default Points (if no Feedback): </label>
                          </div>
                          <div class="col-md-3">
                          @if($feed!='')
                            <div class="att">{{$att->limit_of_grave}}</div> <br>
                            <div class="no">{{$feed->less_grave_no}}</div> <br>
                            <div class="limit"><b>{{$feed->limit_of_grave}}</b></div>
                          @else
                            <div class="att">Not Set.</div> <br>
                            <div class="no">Not Set.</div> <br>
                            <div class="limit">Not Set.</div> 
                          @endif
                          </div>
                        </h4>
                        </div>
                        <br>
                        @if(session()->get('level') == 0)
                          @if($feed!='')
                            <input class="btn btn-primary" class="btnSet" onclick="showchange();" value="Change" type="button" />
                          @else
                            <input class="btn btn-primary" class="btnSet" onclick="showchange();" value="Set" type="button"  />
                          @endif
                        @endif
                      </div>  
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                          @if(session()->get('level') == 0)
                            <button class="btn btn-success" onclick="location.href='/Appraisal/create';">Add New Criterion</button>
                          @endif
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>  
                  <div class="x_content">
                    <div class="table-responsive">  
                      <table id="itemTable" class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Name </th>
                                @if(session()->get('level') == 0)
                            <th class="column-title">Severity</th>
                            @endif
                            <th class="column-title no-link last">
                              <span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                              <tr class="even pointer">
                                <td class=" ">{{$item->name}}</td>
                                @if(session()->get('level') == 0)
                                @if($item->severity == 0)
                                  <td class=" ">Low</td>
                                @endif
                                @if($item->severity == 1)
                                  <td class=" ">Medium</td>
                                @endif
                                @if($item->severity == 2)
                                  <td class=" ">High</td>
                                @endif
                                @endif
                                <td class=" last">
                                @if(session()->get('level') == 0)
                                  <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '/Appraisal/{{$item->id}}/edit';">
                                  <input type="button" class="btn btn-danger btn-delete{{$item->id}}" value="Delete">        
                                @endif
                                  <input type="button" class="btn btn-info" value="View Criteria" onclick="location.href = '/Appraisal/Item/{{$item->id}}';">
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
          @foreach($items as $item)
          <!-- Modal Delete -->
          <div class="modal fade" id="modalDelete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">
                  <div>
                    <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?
                  </div>
                </div>
                <form action="{{action('ItemController@destroy', $item->id)}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <div class="modal-footer ">
                  <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                  <button type="submit" class="btn btn-success btn-delete-yes"> Yes </button>
                </div>
                </form>
              </div> <!-- /.modal-content --> 
            </div> <!-- /.modal-dialog -->
          </div>
          <!--/Modal Delete -->
          @endforeach
          <!-- Modal Add -->
            <div class="modal fade" id="modalChange" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Change</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-5">
                                      <label>Regular Number of Trips per Month: </label><br><br><br>
                                      <label>Number of Feedbacks: </label><br><br><br>
                                      <label>Default Points (if no Feedback): </label>
                                    </div>
                                    <div class="col-md-6" >
                                    @if($feed!='')
                                      <input type="number" class="form-control" value="{{$att->limit_of_grave}}" id="txtTrips"><br>
                                      <input type="number" class="form-control" value="{{$feed->less_grave_no}}" id="txtFeed"><br>
                                      <input type="number" class="form-control" value="{{$feed->limit_of_grave}}" id="txtDef"><br>
                                    @else
                                      <input type="number" class="form-control" value="0" id="txtTrips"><br>
                                      <input type="number" class="form-control" value="0" id="txtFeed"><br>
                                      <input type="number" class="form-control" value="0" id="txtDef"><br>
                                    @endif<br><br>
                                  </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                              <button class="btn btn-success btn-add-yes" onclick="change();">Save </button>
                          </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Add -->
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
    function showchange(){
        $("#modalChange").modal("show");
    }
    function change(){
        if(document.getElementById('txtTrips').value == '' || document.getElementById('txtFeed').value == '' || document.getElementById('txtTrips').value == 0 || document.getElementById('txtFeed').value == 0 || document.getElementById('txtDef').value == '' || document.getElementById('txtDef').value == 0){
          if(document.getElementById('txtTrips').value == '' || document.getElementById('txtFeed').value == '' || document.getElementById('txtDef').value == ''){
            alert('Please fill up all fields!');
          } else if(document.getElementById('txtTrips').value == 0 || document.getElementById('txtFeed').value == 0 || document.getElementById('txtDef').value == 0){
            alert('Should be greater than 0!');
          }
        } else {
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: 'Appraisal/limit/add',
            type: 'get',
            data: {
              'for': 'perf',
              'trips': document.getElementById('txtTrips').value,
              'num': document.getElementById('txtFeed').value,
              'def': document.getElementById('txtDef').value,
            },
            dataType:'json',
            success: function(data){
              location.href='';
            }
          });
        }
      }
        $(document).ready(function(){
          @foreach($items as $item)
            $(".btn-delete{{$item->id}}").click(function(){
                console.log("Delete!");
                $("#modalDelete{{$item->id}}").modal("show");
            });
            @endforeach
            $('#itemTable').dataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 2 ] }, 
                            { "bSearchable": false, "aTargets": [ 2 ] }]
            }); 
        });
    </script>
    @endsection
