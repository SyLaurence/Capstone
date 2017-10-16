    @extends ('layouts.nav')
    @if(session()->get('level') == 0)
          @section ('title')
          Admin | Written Exam
          @endsection
        @else
          @section ('title')
          HR Staff | Written Exam
          @endsection
        @endif
    @section ('pageContent')
       <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Written Exam Questions</h3>
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
                                @if(session()->get('level') == 0)
                                  <button class="btn btn-success" onclick="showAdd();" id="add">Add Question</button>
                                @endif
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
                                  Question
                                </th>
                                <th class="column-title">
                                  Answer
                                </th>
                                <th class="column-title" hidden>
                                  Severity
                                </th>
                                <th class="column-title no-link last">
                                  <span class="nobr">Actions</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                              <tr class="even pointer">
                                <td class=" ">
                                  @if(substr($question->question, -1) == '?')
                                  {{$question->question}}
                                  @else
                                  {{$question->question}}?
                                  @endif
                                </td>
                                <td class=" ">
                                  @if($question->choice == '[]')
                                    @if(session()->get('level') == 0)
                                      <a class="btn btn-success" href="/Written/{{$question->id}}/Choices">Add Choices</a>
                                    @else
                                      Not Set.
                                    @endif 
                                  @else
                                    @if($arrAns[$ctr]=='choose')
                                      @if(session()->get('level') == 0)
                                      <input type="button" style="background-color: #00be70" class="btn btn-success" onclick="showChoice{{$question->id}}();" value="Choose" />
                                      @else
                                       <label style="font-style: italic">Not Set. </label>
                                      @endif
                                    @else
                                      {{$arrAns[$ctr]}}
                                    @endif
                                  @endif
                                  
                                </td>
                                <td class=" " hidden>
                                  @if($question->severity == 0)
                                    Low
                                  @endif
                                  @if($question->severity == 1)
                                    Medium
                                  @endif
                                  @if($question->severity == 2)
                                    High
                                  @endif
                                </td>
                                <td class=" last">
                                  @if(session()->get('level') == 0)
                                  <input type="button" class="btn btn-primary" onclick="showEdit{{$question->id}}();" value="Edit">
                                  <input type="button" class="btn btn-danger" onclick="showDelete{{$question->id}}();" value="Delete">
                                  @endif
                                  @if($question->choice != '[]')
                                    @if($arrAns[$ctr]!='choose')
                                    <input type="button" style="background-color: #00be70" class="btn btn-success" onclick="showChoice{{$question->id}}();" value="Choice" />
                                    @endif
                                    <input type="text" value="{{$ctr++}}" hidden>
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
            @foreach($questions as $question)
            @if($question->choices != '[]')
            <!-- Modal Show -->
            <div class="modal fade" id="modalShow{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">
                              @if(substr($question->question, -1) == '?')
                                {{$question->question}}
                              @else
                                {{$question->question}}?
                              @endif
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                            <div class="pull-right">
                              <ul class="nav navbar-right panel_toolbox">
                                  <li>
                                    @if(session()->get('level') == 0)
                                      <a href="/Written/{{$question->id}}/Choices">Add Choices</a>
                                    @endif
                                  </li>
                              </ul>
                            </div>
                            <br><br>
                            <div>
                              @foreach($question->choice as $choice)
                                @if($choice->is_correct == 1)
                                  @if(session()->get('level') == 0)
                                  <input type="radio" class="flat" name="choice{{$question->id}}" id="choice{{$choice->id}}" value="{{$choice->id}}" checked="checked" /> {{$choice->choice}} <br><br>
                                  @else
                                  <input type="radio" class="flat" name="choice{{$question->id}}" id="choice{{$choice->id}}" value="{{$choice->id}}" checked="checked" disabled /> <label style="color: #00be70" >{{$choice->choice}}</label> <br><br>
                                  @endif
                                @else
                                  @if(session()->get('level') == 0)
                                  <input type="radio" class="flat" name="choice{{$question->id}}" id="choice{{$choice->id}}" value="{{$choice->id}}" /> {{$choice->choice}} <br><br>
                                  @else
                                  <input type="radio" class="flat" name="choice{{$question->id}}" id="choice{{$choice->id}}" value="{{$choice->id}}" disabled/> {{$choice->choice}} <br><br>
                                  @endif
                                @endif
                              @endforeach
                            </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                            @if(session()->get('level') == 0)
                              <button type="submit" class="btn btn-success" onclick="save{{$question->id}}();" >Save </button>
                            @endif
                          </div>
                        </form>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Show -->
            @endif
            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                              <button type="submit" class="btn btn-success" onclick="delete{{$question->id}}();" >Yes </button>
                          </div>
                        </form>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                    Question:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtEdit{{$question->id}}" class="form-control" value="{{$question->question}}" />
                                  </div>
                                </div>  
                                <br>
                                <div class="row" hidden>
                                  <div class="col-md-2">
                                    Severity:
                                  </div>
                                  <div class="col-md-3">
                                    <select name="txtSeverityEdit{{$question->id}}" id="txtSeverityEdit{{$question->id}}" class="form-control"required hidden>
                                        @if($question->severity == 2)
                                            <option value="0">Choose..</option>
                                            <option value="High" selected> High</option>
                                            <option value="Medium"> Medium</option>
                                            <option value="Low"> Low</option>
                                        @elseif($question->severity == 1)
                                            <option value="0">Choose..</option>
                                            <option value="High"> High</option>
                                            <option value="Medium" selected> Medium</option>
                                            <option value="Low"> Low</option>
                                        @else
                                            <option value="0">Choose..</option>
                                            <option value="High"> High</option>
                                            <option value="Medium"> Medium</option>
                                            <option value="Low" selected> Low</option>
                                        @endif
                                    </select>
                                  </div>
                                </div>
                            </div>
                        </div>
                          <div class="modal-footer ">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel </button>
                              <button type="submit" class="btn btn-success" onclick="edit{{$question->id}}();">Submit </button>
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
                            <h4 class="modal-title custom_align" id="Heading">Add Question</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div class="row">
                                  <div class="col-md-2">
                                    Question:
                                  </div>
                                  <div class="col-md-10">
                                    <input type="text" id="txtAdd" class="form-control" />
                                  </div>
                                </div>  
                                <br>
                                <div class="row" hidden>
                                  <div class="col-md-2">
                                    Severity:
                                  </div>
                                  <div class="col-md-3">
                                    <select name="txtSeverity" id="txtSeverity" class="form-control" required hidden>
                                      <option value="0">Choose..</option>
                                      <option value="High"> High</option>
                                      <option value="Medium"> Medium</option>
                                      <option value="Low"> Low</option>
                                    </select>
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
        var sev = 0;
        if(document.getElementById('txtSeverity').value == 'High'){
          sev = 2;
        } else if (document.getElementById('txtSeverity').value == 'Medium'){
          sev = 1;
        } else {
          sev = 0;
        }
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Written/add/add',
          type: 'get',
          data: {
            'question': document.getElementById('txtAdd').value,
            'severity': sev,
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
      }
    @foreach($questions as $question)
      function showEdit{{$question->id}}(){
          $("#modalEdit{{$question->id}}").modal("show"); 
        }
      function showDelete{{$question->id}}(){
         $("#modalDelete{{$question->id}}").modal("show");
      }
      function showChoice{{$question->id}}(){
         $("#modalShow{{$question->id}}").modal("show"); 
      }

      function save{{$question->id}}(){
        @if($question->choice != '[]')
          @foreach($question->choice as $choice)
            if(document.getElementById('choice{{$choice->id}}').checked){
                var choice = '{{$choice->id}}';
                var question = '{{$question->id}}';
                $.ajaxSetup({
                  headers:
                  {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
                $.ajax({
                  url: 'Written/ans/add',
                  type: 'get',
                  data: {
                    'questionid': question,
                    'choiceid': choice,

                  },
                  dataType:'json',
                  success: function(data){
                    location.href='';
                  }
                });
            }
          @endforeach
        @endif
      }

      function edit{{$question->id}}(){
        var question = document.getElementById('txtEdit{{$question->id}}').value;
        var sev = 0;
        if(document.getElementById('txtSeverityEdit{{$question->id}}').value == 'High'){
          sev = 2;
        } else if (document.getElementById('txtSeverityEdit{{$question->id}}').value == 'Medium'){
          sev = 1;
        } else {
          sev = 0;
        }
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Written/up/add',
          type: 'get',
          data: {
            'id': '{{$question->id}}',
            'question': question,
            'severity': sev,
          },
          dataType:'json',
          success: function(data){
            location.href='';
          }
        });
      } 
      function delete{{$question->id}}(){
        $.ajaxSetup({
          headers:
          {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          url: 'Written/delete/add',
          type: 'get',
          data: {
            'id': '{{$question->id}}',
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
