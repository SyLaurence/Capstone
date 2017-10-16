    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Driver Offenses
          @endsection
        @else
          @section ('title')
          HR Staff | Driver Offenses
          @endsection
        @endif
    @section ('pageContent')
       <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Driver Offenses</h3>
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
                            <label>Less Grave to Grave Equivalence: </label><br><br>
                            <label>Offense limit: </label>
                          </div>
                          <div class="col-md-3">
                          @if($limit!='')
                            <div class="no">{{$limit->less_grave_no}}</div> <br>
                            <div class="limit"><b>{{$limit->limit_of_grave}} Grave/s</b> ({{$limit->limit_of_grave*$limit->less_grave_no}} Less Grave/s) </div>
                          @else
                            <div class="no">Not Set.</div> <br>
                            <div class="limit">Not Set.</div> 
                          @endif
                          </div>
                        </h4>
                        </div>
                        <br>
                        @if(session()->get('level') == 0)
                          @if($limit!='')
                            <input class="btn btn-primary" class="btnSet" onclick="showchange();" value="Change" type="button" />
                          @else
                            <input class="btn btn-primary" class="btnSet" onclick="showchange();" value="Set" type="button"  />
                          @endif
                          <ul class="nav navbar-right panel_toolbox">
                              <li>
                                  <button class="btn btn-success" onclick="showAdd();" id="add">Add Offense</button>
                              </li>
                          </ul>
                        @endif
                          <div class="clearfix"></div>
                      </div>  

                      <div class="x_content">
                        <div class="table-responsive">  
                          <!--table id="datatable" class="table table-striped jambo_table bulk_action"-->
                          <table id="datatable" class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th class="column-title">
                                  Offense
                                </th>
                                <th class="column-title">
                                  Level
                                </th>
                                @if(session()->get('level') == 0)
                                <th class="column-title no-link last">
                                  <span class="nobr">Actions</span>
                                </th>
                                @endif
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($offenses as $offense)
                              <tr class="even pointer">
                                <td>
                                  {{$offense->name}}
                                </td>
                                <td class=" ">
                                  @if($offense->level == 0)
                                    Less Grave
                                  @elseif($offense->level == 1)
                                    Grave
                                  @endif
                                </td>
                                <td class=" last">
                                  @if(session()->get('level') == 0)
                                  <input type="button" class="btn btn-primary" onclick="showEdit{{$offense->id}}();" value="Edit">
                                  <input type="button" class="btn btn-danger" onclick="showDelete{{$offense->id}}();" value="Delete">
                                  @endif
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
            @foreach($offenses as $offense)
            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete{{$offense->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                              <button type="button" class="btn btn-default" data-dismiss="modal">No </button>
                              <button type="submit" class="btn btn-success" onclick="delete{{$offense->id}}();" >Yes </button>
                          </div>
                        </form>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{$offense->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Update this entry</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                  <div class="col-md-2">
                                    Offense:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtEdit{{$offense->id}}" class="form-control" value="{{$offense->name}}" />
                                  </div>
                                </div>  
                                <br>
                                <div class="row">
                                  <div class="col-md-2">
                                    Level:
                                  </div>
                                  <div class="col-md-3">
                                  @if($offense->level == 0)
                                    <input type="radio" class="flat" name="offense{{$offense->id}}" id="offense{{$offense->id}}" value="{{$offense->id}}" checked="checked" /> Less Grave <br><br>
                                    <input type="radio" class="flat" name="offense{{$offense->id}}" id="offense{{$offense->id}}" value="{{$offense->id}}" /> Grave
                                  @else
                                  <input type="radio" class="flat" name="offense{{$offense->id}}" id="offense{{$offense->id}}" value="{{$offense->id}}" /> Less Grave <br><br>
                                    <input type="radio" class="flat" name="offense{{$offense->id}}" id="offense{{$offense->id}}" value="{{$offense->id}}" checked="checked" /> Grave
                                  @endif
                                  </div>
                                </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                              <button type="submit" class="btn btn-success" onclick="edit{{$offense->id}}();">Submit </button>
                          </div>
                        </form>
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
                            <h4 class="modal-title custom_align" id="Heading">Add Offense</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                  <div class="col-md-2">
                                    Offense:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtAdd" class="form-control" />
                                  </div>
                                </div>  
                                <br>
                                <div class="row">
                                  <div class="col-md-2">
                                    Level:
                                  </div>
                                  <div class="col-md-3">
                                      <input type="radio" class="flat" name="offense" id="offense" value="" /> Less Grave <br><br>
                                      <input type="radio" class="flat" name="offense" id="offenseG" value="" /> Grave
                                  </div>
                                </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                              <button class="btn btn-success btn-add-yes" onclick="add();">Submit </button>
                          </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Add -->
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
                                      <label>Less Grave to Grave Equivalence: </label><br><br><br>
                                      <label>Offense limit: </label>
                                    </div>
                                    <div class="col-md-6" >
                                    @if($limit!='')
                                      <input type="number" class="form-control" value="{{$limit->less_grave_no}}" id="txtLGtoG"><br>
                                    @else
                                      <input type="number" class="form-control" value="0" id="txtLGtoG"><br>
                                    @endif
                                      <div class="col-md-8">
                                      @if($limit!='')
                                        <input type="number" class="form-control" value="{{$limit->limit_of_grave}}" id="txtLimitG">
                                        </div> Grave/s <br><br>
                                        <div class="col-md-8">
                                        <input type="number" class="form-control" value="{{$limit->limit_of_grave*$limit->less_grave_no}}" id="txtLimitLG" disabled>
                                       </div> Less Grave/s
                                       @else
                                       <input type="number" class="form-control" value="0" id="txtLimitG">
                                        </div> Grave/s <br><br>
                                        <div class="col-md-8">
                                        <input type="number" class="form-control" value="0" id="txtLimitLG" disabled>
                                       </div> Less Grave/s
                                       @endif
                                    </div>
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
    <!--script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="{{asset('vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <script>
    $("#txtLimitG").change(function(){
      document.getElementById('txtLimitLG').value = document.getElementById('txtLimitG').value*document.getElementById('txtLGtoG').value;
    });
    $("#txtLGtoG").change(function(){
      document.getElementById('txtLimitLG').value = document.getElementById('txtLimitG').value*document.getElementById('txtLGtoG').value;
    });
    function showchange(){
        $("#modalChange").modal("show");
    }
    function showAdd(){
         $("#modalAdd").modal("show");
      }
      function add(){
        var lev = 0;
        if(document.getElementById('offenseG').checked){
          lev = 1;
        } else {
          lev = 0;
        }
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Offense/add/add',
          type: 'get',
          data: {
            'offense': document.getElementById('txtAdd').value,
            'level': lev,
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
      }
      function change(){
        if(document.getElementById('txtLGtoG').value == '' || document.getElementById('txtLimitG').value == '' || document.getElementById('txtLGtoG').value == 0 || document.getElementById('txtLimitG').value == 0){
          if(document.getElementById('txtLGtoG').value == '' || document.getElementById('txtLimitG').value == ''){
            alert('Please fill up all fields!');
          } else if(document.getElementById('txtLGtoG').value == 0 || document.getElementById('txtLimitG').value == 0){
            alert('Should be greater than 0!');
          }
        } else {
          $.ajaxSetup({
            headers:
            {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
          });
          $.ajax({
            url: 'Offense/limit/add',
            type: 'get',
            data: {
              'for': 'off',
              'no': document.getElementById('txtLGtoG').value,
              'limit': document.getElementById('txtLimitG').value,
            },
            dataType:'json',
            success: function(data){
              $(".btnSet").val('Change');
              $(".no").html(document.getElementById('txtLGtoG').value);
              $(".limit").html('<b>'+ document.getElementById('txtLimitG').value +' Grave/s</b> ('+ document.getElementById('txtLimitLG').value +' Less Grave/s) ');
              $("#modalChange").modal("hide");
              //location.href='';
            }
          });
        }
      }
    @foreach($offenses as $offense)
      function showEdit{{$offense->id}}(){
          $("#modalEdit{{$offense->id}}").modal("show"); 
        }
      function showDelete{{$offense->id}}(){
         $("#modalDelete{{$offense->id}}").modal("show");
      }

      function edit{{$offense->id}}(){
        var offense = document.getElementById('txtEdit{{$offense->id}}').value;
        var lev = 0;
        if(document.getElementById('offenseG').checked){
          lev = 1;
        } else {
          lev = 0;
        }
        
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Offense/up/add',
          type: 'get',
          data: {
            'id': '{{$offense->id}}',
            'offense': offense,
            'level': lev,
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
      } 
      function delete{{$offense->id}}(){
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Offense/del/add',
          type: 'get',
          data: {
            'id': '{{$offense->id}}',
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
