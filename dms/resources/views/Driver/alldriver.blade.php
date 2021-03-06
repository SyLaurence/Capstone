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
                        <h3>Driver Pool</h3>
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
                                        @if($driver->hireddriver != '[]' || $driver->hold != '[]')
                                            <tr class="even pointer">
                                                <th class=" ">
                                                    <!-- photo of user from database PLEASE CHANGE SRC(SOURCE) -->
                                                    <img src="{{$driver->personalinfo->first()->image_path}}" alt="" class="image-width-120px image-height-120px"> 
                                                </th>
                                                <td class="">{{$arrDriv[$ctr]}}</td>
                                                <td class="">{{$arrBus[$ctr]}}</td>
                                                <td class="">{{$arrStat[$ctr]}}</td>
                                                <td class="">
                                                    <input type="button" class="btn btn-info" value="View Profile" onclick="location.href = 'PersonalInfo/{{$driver->id}}';">
                                                    @if($arrStat[$ctr] == 'On Hold for 1st Contract')
                                                        <input type="button" class="btn btn-default btnCon{{$driver->id}}" value="1st Contract">
                                                    @elseif($arrStat[$ctr] == 'On Hold for Regular')
                                                        <input type="button" class="btn btn-default btnCon{{$driver->id}}" value="Regular">
                                                    @elseif($arrStat[$ctr] == 'On Hold for 2nd Contract')
                                                        <input type="button" class="btn btn-default btnCon{{$driver->id}}" value="2nd Contract">
                                                    @endif
                                                    <!-- <input type="button" class="btn btn-primary" value="Evaluate" onclick="location.href = 'Appraisal/{{$driver->id}}';" hidden /> -->
                                                    <input type="button" class="btn btn-warning btnTerminate{{$driver->id}}" value="Dismiss" hidden />
                                                </td>
                                            </tr>
                                            <input type="text" value="{{$ctr++}}" hidden>
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
                @if($driver->hireddriver != '[]' || $driver->hold != '[]')
                <!-- Modal Delete -->
                <div class="modal fade" id="forContract{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">
                            @if($arrHold[$count]=='1st')
                            Pass to First Contract
                            @elseif($arrHold[$count]=='2nd')
                            Pass to 2nd Contract
                            @elseif($arrHold[$count]=='Reg')
                            Pass to Regular
                            @endif
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span class="fa fa-file-text-o"></span>&nbsp; Pass {{$driver->personalinfo->first()->first_name}} {{$driver->personalinfo->first()->middle_name}} {{$driver->personalinfo->first()->last_name}} {{$driver->personalinfo->first()->extension_name}} to 
                                @if($arrHold[$count]=='1st')
                                First Contract
                                @elseif($arrHold[$count]=='2nd')
                                2nd Contract
                                @elseif($arrHold[$count]=='Reg')
                                Regular
                                @endif
                                ?
                            </div>
                        </div>
                        <form action="{{action('RecruitmentController@update', $driver->id)}}" method="post">
                        <input type="text" value="{{$arrHold[$count]}}" name="Ctype" hidden>
                        <input type="text" value="ChangeCon" name="type" hidden>
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
            <input type="text" value="{{$count++}}" hidden />
            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Dismiss Driver</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span class="fa fa-warning"></span> &nbsp; Are you sure you want to <b>Dismiss</b> {{$driver->personalinfo->first()->first_name}} {{$driver->personalinfo->first()->middle_name}} {{$driver->personalinfo->first()->last_name}} {{$driver->personalinfo->first()->extension_name}}?
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

            @foreach($drivers as $driver)
                @if($driver->hireddriver != '[]' || $driver->hold != '[]')
                    $(".btnTerminate{{$driver->id}}").click(function(){
                      console.log("Delete!");
                      $("#modalDelete{{$driver->id}}").modal("show");
                    });
                    $(".btnCon{{$driver->id}}").click(function(){
                        $("#forContract{{$driver->id}}").modal("show");
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