
        <!--===================================================================================================================-->
        @extends ('layouts.nav')
        
        <!-- page content -->
        @section ('title')
            <title>Bus companies</title>
        @endsection
        @section ('Content')
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Bus Brands</h3>
                    </div>
                </div>
                <!-- /page title & search bar -->

                <div class="clearfix"></div>
                {{csrf_field()}}
                <!-- table -->
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a href="CompanyBrand/create">Add new brand</a>
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
                                            <th class="column-title no-link last" colspan="2">
                                                <span class="nobr">Action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($CBItem as $item)
                                        <tr class="even pointer">
                                            <td class=" ">
                                                {{$item->name}}
                                            </td>
                                            <td class=" ">
                                                {{$item->description}}
                                            </td>
                                            
                                            <td class=" last">
                                                <a href="/CompanyBrand/{{$item->id}}/edit">Edit</a>|
                                                <a href="" onclick="return false;" class="btnDelete{{$item->id}}">Delete</a>
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
            @foreach($CBItem as $item)
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
                        
                        <form action="{{action('CompanyBrandController@destroy', $item->id)}}" method="post">
                        {{csrf_field()}}
                        
                        <div class="modal-footer ">
                            <input name="_method" type="hidden" value="DELETE">
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                            
                            <button type="submit" class="btn btn-success"> Yes </button>
                            
                        </div>
                        </form>

                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            @endforeach
        </div>
        
        <!-- /page content -->
        <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    @foreach($CBItem as $item)
    <script>
        $(document).ready(function(){
            $(".btnDelete{{$item->id}}").click(function(){
                console.log("Delete!");
                $("#modalDelete{{$item->id}}").modal("show");
            });
        });
    </script>
    @endforeach
         @endsection

