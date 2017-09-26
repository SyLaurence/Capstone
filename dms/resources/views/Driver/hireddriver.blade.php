    @extends ('layouts.nav')
    @section ('title')
        Drivers
    @endsection
        @section ('pageContent')
         <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Hired Drivers</h3>
                    </div>
                </div>
                <!-- /page title & search bar -->

                <div class="clearfix"></div>

                <!-- table -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">  
                                <table id="apprenticeTable" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">
                                                
                                            </th>
                                            <th class="column-title">
                                                Start Date
                                            </th>
                                            <th class="column-title">
                                                Name
                                            </th>
                                            <th class="column-title">
                                                Bus company
                                            </th>
                                            <th class="column-title">
                                                Status
                                            </th>
                                            <th class="column-title no-link last">
                                                <span class="nobr">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($drivers as $driver)
                                        @if($driver->hireddriver != '[]')
                                            @if($driver->hireddriver->last()->status != 3)
                                                <tr class="even pointer">
                                                    <th class=" ">
                                                        <!-- photo of user from database PLEASE CHANGE SRC(SOURCE) -->
                                                        <img src="{{$driver->personalinfo->first()->image_path}}" alt="" class="image-width-120px image-height-120px"> 
                                                    </th>
                                                    <td>{{$arrDate[$ctr]}}</td>
                                                    <td class="">{{$arrDriv[$ctr]}}</td>
                                                    <td class="">{{$arrBus[$ctr]}}</td>
                                                    <td class="">{{$arrStat[$ctr]}}</td>
                                                    <td class="">
                                                        <input type="button" class="btn btn-info" value="View Profile" onclick="location.href = 'PersonalInfo/{{$driver->id}}';">
                                                        <input type="button" style="background-color: #30499B" class="btn btn-info" id="dlt{{$driver->id}}" value="Change Company" >
                                                        <!-- <input type="button" class="btn btn-primary" value="Evaluate" onclick="location.href = 'Appraisal/{{$driver->id}}';"> -->
                                                        <input type="button" class="btn btn-warning btnTerminate{{$driver->id}}" value="Dismiss" >
                                                    </td>
                                                </tr>
                                                <input type="text" value="{{$ctr++}}" hidden>
                                            @endif
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                  </div>
                </div>
                @foreach($drivers as $driver)
                @if($driver->hireddriver != '[]')
                 <!-- Modal Delete -->
                <div class="modal fade" id="modalDel{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title custom_align" id="Heading">Change Bus Company</h4>
                            </div>
                            <form action="{{action('DesignateController@update', $driver->id)}}" method="post">
                            <div class="modal-body">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                                <div>
                                    <h5>Bus Companies: </h5>
                                      <select name="busbrand" id="busbrand" class="form-control" required>
                                        <option value="">Choose..</option>
                                        @foreach($buses as $bus)
                                            <option value="{{$bus->name}}">{{$bus->name}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                              <div class="modal-footer ">
                                  <button type="submit" class="btn btn-success btn-delete-yes"> Change </button>
                              </div>
                            </form>
                        </div> <!-- /.modal-content --> 
                    </div> <!-- /.modal-dialog -->
                </div>
                <!--/Modal Delete -->
                <!-- Modal Delete -->
                <div class="modal fade" id="modalDelete{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title custom_align" id="Heading">Terminate Driver</h4>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <span class="fa fa-warning"></span> &nbsp; Are you sure you want to terminate {{$driver->first_name}} {{$driver->middle_name}} {{$driver->last_name}} {{$driver->extension_name}}?
                                </div>
                            </div>
                            <form action="{{action('HiredDriverController@destroy', $driver->id)}}" method="post">
                            {{csrf_field()}}
                              <div class="modal-footer ">
                              <input name="_method" type="hidden" value="DELETE">
                                  <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                                  <button type="submit" class="btn btn-success btn-delete-yes"> Yes </button>
                              </div>
                            </form>
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

            @foreach($drivers as $applicant)
            $("#dlt{{$applicant->id}}").click(function(){
              console.log("Delete!");
              $("#modalDel{{$applicant->id}}").modal("show");
            });
            @endforeach

            @foreach($drivers as $driver)
                @if($driver->hireddriver != '[]')
                    $(".btnTerminate{{$driver->id}}").click(function(){
                      console.log("Delete!");
                      $("#modalDelete{{$driver->id}}").modal("show");
                    });
                @endif
            @endforeach

            $('#apprenticeTable').dataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 4 ] }, 
                            { "bSearchable": false, "aTargets": [ 0, 4 ] }]
            }); 
        });
    </script>
    @endsection