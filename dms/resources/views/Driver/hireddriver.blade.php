    @extends ('layouts.navStaff')
    @section ('title')
        HR Staff | Drivers
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
                                    @foreach($applicants as $applicant)
                                        <tr class="even pointer">
                                            <th class=" ">
                                                <!-- photo of user from database PLEASE CHANGE SRC(SOURCE) -->
                                                <img src="{{$applicant->image_path}}" alt="" class="image-width-120px image-height-120px"> 
                                            </th>
                                            <td class="">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}</td>
                                            <td class="">Bicol Isarog</td>
                                            <td class="">Regular</td> <!-- stage num : activity -->
                                            <td class="">
                                                <input type="button" class="btn btn-info" value="View Profile" onclick="location.href = 'PersonalInfo/{{$applicant->id}}';">
                                                <!-- <input type="button" class="btn btn-primary" value="View Progress" onclick="location.href = '/Recruitment/1';"> -->
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
            $('#apprenticeTable').dataTable({
            "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 0, 4 ] }, 
                            { "bSearchable": false, "aTargets": [ 0, 4 ] }]
            }); 
        });
    </script>
    @endsection