    @extends ('layouts.navStaff')
    @section ('title')
        HR Staff | Accounts
    @endsection
    @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Accounts</h3>
                    </div>
                </div>
                <!-- /page title & search bar -->

                <div class="clearfix"></div>

                <!-- table -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <!-- <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="/User/create">Add new account</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>   -->

                        <div class="x_content">
                            <div class="table-responsive">  
                                <table id="accountTable" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title"></th>
                                            <th class="column-title">Username </th>
                                            <th class="column-title">Full name</th>
                                            <th class="column-title">E-mail</th>
                                            <th class="column-title">Contact number</th>
                                            <th class="column-title">Role</th>
                                            <!-- <th class="column-title no-link last" colspan="2">
                                                <span class="nobr">Action</span>
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                        <tr class="even pointer">
                                            <th class=" ">
                                                <img src="{{$user->image_path}}" alt="" class="image-width-120px image-height-120px"> 
                                            </th>
                                            <td class=" ">{{$user->username}}</td>
                                            <td class=" ">{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                                            <td class=" ">{{$user->email}}</td>
                                            <td class=" ">{{$user->contact_no}}</td>
                                            @if($user->level == 0)
                                                <td class=" ">Admin</td>
                                            @endif
                                            @if($user->level == 1)
                                                <td class=" ">HR Staff</td>
                                            @endif
                                            @if($user->level == 2)
                                                <td class=" ">Appraiser</td>
                                            @endif
                                            
                                           <!--  <td class=" last">
                                                <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = 'User/{{$user->id}}/edit';">        
                                            </td> -->
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>  
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
            $(".btn-delete").click(function(){
                console.log("Delete!");
                $("#modalDelete").modal("show");
            });

            $('#accountTable').dataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 5 ] }, 
                            { "bSearchable": false, "aTargets": [ 0, 5 ] }]
            }); 
        });
    </script>
    @endsection
