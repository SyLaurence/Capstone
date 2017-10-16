    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Choice
          @endsection
        @else
          @section ('title')
          HR Staff | Choice
          @endsection
        @endif
    @section ('pageContent')
       <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3><a href="/Written">
                        @if(substr($question->question, -1) == '?')
                        {{$question->question}}
                        @else
                        {{$question->question}}?
                        @endif
                        </a></h3><br>
                        <h4>Choices</h4>
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
                                  <button class="btn btn-success" onclick="showAdd();">Add Choice</button>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>  

                      <div class="x_content">
                        <div class="table-responsive">  
                          <!--table id="datatable" class="table table-striped jambo_table bulk_action"-->
                          <table id="datatable" class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title">
                                  Choice
                                </th>
                                <th class="column-title no-link last">
                                  <span class="nobr">Actions</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($question->choice as $choice)
                              @if($choice->is_correct==1)
                                <tr class="even pointer" style="background-color: #b6ffa5;">
                                  <td class=" ">
                                    {{$choice->choice}}
                                  </td>
                                  <td class=" last">
                                    <input type="button" class="btn btn-primary" value="Edit" onclick="showEdit{{$choice->id}}();">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="showDelete{{$choice->id}}();">
                                  </td>
                                </tr>
                              @else
                                <tr class="even pointer">
                                  <td class=" ">
                                    {{$choice->choice}}
                                  </td>
                                  <td class=" last">
                                    <input type="button" class="btn btn-primary" value="Edit" onclick="showEdit{{$choice->id}}();">
                                    <input type="button" class="btn btn-danger" value="Delete" onclick="showDelete{{$choice->id}}();">
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
                </div>

            </div>
            @foreach($question->choice as $choice)
            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete{{$choice->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                              <button type="submit" class="btn btn-success" onclick="delete{{$choice->id}}();" > Yes </button>
                          </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{$choice->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Add Choice</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    Choice:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtEdit{{$choice->id}}" class="form-control" value="{{$choice->choice}}" />
                                  </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
                              <button type="submit" class="btn btn-success" onclick="edit{{$choice->id}}();"> Submit </button>
                          </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Edit -->
            @endforeach
            <!-- Modal Add -->
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Add Choice</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    Choice:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtAddC" class="form-control" />
                                  </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
                              <button type="submit" class="btn btn-success" onclick="add();"> Submit </button>
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
    <!--script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="{{asset('vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <script>
    function showAdd(){
      $("#modalAdd").modal("show"); 
    }
    function add(){
      $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/Written/addchoice/add',
          type: 'get',
          data: {
            'choice': document.getElementById('txtAddC').value,
            'questionid': '{{$question->id}}',
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
    }
      @foreach($question->choice as $choice)
        function showEdit{{$choice->id}}(){
          $("#modalEdit{{$choice->id}}").modal("show"); 
        } 
        function showDelete{{$choice->id}}(){
          $("#modalDelete{{$choice->id}}").modal("show"); 
        }

        function edit{{$choice->id}}(){
          $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: '/Written/upchoice/add',
          type: 'get',
          data: {
            'choice': document.getElementById('txtEdit{{$choice->id}}').value,
            'id': '{{$choice->id}}',
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
        } 
        function delete{{$choice->id}}(){
            $.ajaxSetup({
              headers:
              {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
            });
            $.ajax({
              url: '/Written/delchoice/add',
              type: 'get',
              data: {
                'choice': '{{$choice->id}}',
              },
              dataType:'json',
              success: function(data){
                location.href='';
              }
            });
        }
      @endforeach
    </script>
    @endsection
