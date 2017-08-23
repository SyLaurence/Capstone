        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title & search bar -->
            <div class="page-title">
                <div class="title_left">
                    <h3>
                      <a href="/Appraisal"> {{$item->name}} </a> 
                      > Criteria
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
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <a href="/Activity/Item/{{$item->id}}/create">Add new criteria</a>
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
                            <th class="column-title">Severity</th>
                            <th class="column-title no-link last">
                              <span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($item->criteriasetup as $criteria)
                            <tr class="even pointer">
                              <td class=" ">{{$criteria->name}}</td>
                              @if($criteria->severity == 0)
                                  <td class=" ">Low</td>
                                @endif
                                @if($criteria->severity == 1)
                                  <td class=" ">Medium</td>
                                @endif
                                @if($criteria->severity == 2)
                                  <td class=" ">High</td>
                                @endif
                              <td class=" last">
                                <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '/Criteria/{{$criteria->id}}/edit';">
                                <input type="button" class="btn btn-danger btn-delete{{$criteria->id}}" value="Delete">        
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
          @foreach($item->criteriasetup as $criteria)
          <!-- Modal Delete -->
          <div class="modal fade" id="modalDelete{{$criteria->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                <form action="{{action('CriteriaController@destroy', $criteria->id)}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <input type="text" name="itmID" value="{{$item->id}}" hidden>
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
          @foreach($item->criteriasetup as $criteria)
            $(".btn-delete{{$criteria->id}}").click(function(){
                console.log("Delete!");
                $("#modalDelete{{$criteria->id}}").modal("show");
            });
            @endforeach

            $('#itemTable').dataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 2 ] }, 
                            { "bSearchable": false, "aTargets": [ 2 ] }]
            }); 
        });
    </script>
    @endsection
