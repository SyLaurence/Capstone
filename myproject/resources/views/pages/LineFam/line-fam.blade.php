
@extends ('layouts.nav')
        
        <!-- page content -->
        @section ('title')
            <title>Bus companies</title>
        @endsection
        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title & search bar -->
            <div class="page-title">
                <div class="title_left">
                    <h3>Line Familiarization Criteria</h3>
                </div>
                <!-- search bar -->
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- search bar -->
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
                                <a href="/LineFam/create">Add new criterion</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>  
                    <div class="x_content">
                        <div class="table-responsive">  
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        
                                        <th class="column-title">
                                            Name
                                        </th>
                                        <th class="column-title">
                                            Description
                                        </th>
                                        <th class="column-title">
                                            Type
                                        </th>
                                        <th class="column-title no-link last" colspan="2">
                                            <span class="nobr">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr class="odd pointer">
                                        
                                        <td class=" ">
                                            Physically and mentally fit
                                        </td>
                                        <td class=" ">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris scelerisque orci vitae velit sagittis dapibus. Proin et massa mi. Sed sed nisi gravida, maximus sapien luctus, elementum urna. Nullam auctor.
                                        </td>
                                        <td class=" ">
                                            Check box
                                        </td>
                                        <td class=" last">
                                            <a href="LineFam/1/edit">Edit</a>
                                        
                                            <a href="" onclick="return false" class="btnDelete">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
              </div>
            </div>
            <!-- /table -->

          </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                            <button type="button" class="btn btn-success"> Yes </button>
                        </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->

          
        </div>
        <!-- /page content -->

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".btnDelete").click(function(){
                console.log("Delete!");
                $("#modalDelete").modal("show");
            });
        });
    @endsection
