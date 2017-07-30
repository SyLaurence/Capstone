
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
                        <h3>Road Test</h3>
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
                                    <a href="" onclick="return false" class="btnAddCriterion">Add new criterion</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>  

                        <div class="x_content">
                            <div class="table-responsive">  
                                <table id="tblRdTest" name="tblRdTest" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">ID</th>
                                            <th class="column-title">Name</th>
                                            <th class="column-title">Percent</th>
                                            <th class="column-title no-link last" colspan="2"><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even pointer">
                                            <td class=" ">1</td>
                                            <td class=" ">Check tire</td>
                                            <td class=" ">15</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class=" ">2</td>
                                            <td class=" ">Seat position on driver on driver seat</td>
                                            <td class=" ">15</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class=" ">3</td>
                                            <td class=" ">Use Hazard Light</td>
                                            <td class=" ">20</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <!-- additional row for the total please don't change -->
                                        <tr class="even pointer">
                                            <td class=" ">TOTAL</td>
                                            <td class=" "></td>
                                            <td class="total-percent">15</td>
                                            <td class="" colspan="2">
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class=" ">REMAINING PERCENT</td>
                                            <td class=" "></td>
                                            <td class="remaining-percent">15</td>
                                            <td class="" colspan="2">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>  
                        </div>
                        <div class="x_footer">
                            <div class="col-md-2 col-md-offset-10">
                                <button id="btnSaveChanges" name="btnSaveChanges" class="btn btn-success right"> Save Changes </button>
                            </div>
                        </div>  
                    </div>
                  </div>
                </div>

            </div>


            <!-- MODAL Add New Criterion -->
            <div class="modal fade" id="mdlAddRdTest" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>New stage</h3>
                        </div>
                        
                        <div class="modal-body">
                            <form id="formAddRdTest" name="formAddRdTest" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtAddRTCriName">
                                        Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="txtAddRTCriName" name="txtAddRTCriName" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtAddRTCriPercent">
                                        Percent<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtAddRTCriPercent" name="txtAddRTCriPercent" required="required" class="form-control col-md-7 col-xs-12" min="1" max="100" step="any">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-10">
                                        <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- /MODAL Add New Stage -->   

            <!-- Edit Stage Modal -->
            <div class="modal fade" id="mdlEditRdTest" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>New stage</h3>
                        </div>
                        
                        <div class="modal-body">
                            <form id="formEditRdTest" name="formEditRdTest" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtAddRdTestName">
                                        Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="txtEditRTCriName" name="txtEditRTCriName" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtAddRdTestPercent">
                                        Percent<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtEditRTCriPercent" name="txtEditRTCriPercent" required="required" class="form-control col-md-7 col-xs-12" min="1" max="100" step="any">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-2 col-md-offset-9">
                                        <button id="btnSubmit" type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Stage Modal -->

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
                            <button type="button" class="btn btn-default btnDeleteNo" data-dismiss="modal"> No </button>
                            <button type="button" class="btn btn-success btnDeleteYes"> Yes </button>
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
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
        $(document).ready(function(){
            var dblTotalPercent = 0;
            var dblLeftPercent = 0;
            var dblTemp = 0;
            var arrDeletedID = new Array();

            var strStartID = "0"; // yung unang ID  --  SY! DITO MO ILALAGAY YUNG LATEST NA ID FROM DB



            //========= Compute percent total in the table ==========   
            function computePercentage(){
                console.log("IN");
                
                dblTemp = 0;
                $("#tblRdTest tbody tr").each(function(){
                    dblTemp += parseFloat($(this).children()[2].textContent);
                    console.log(dblTemp);
                    //dblTemp = total percent in the table
                });
                dblLeftPercent = parseFloat(100 - dblTemp);
                $(".total-percent").html(dblTemp);
                $(".remaining-percent").html(dblLeftPercent);
                //console.log("Left: " + dblLeftPercent);

                if(dblTemp == 100){
                    $("#btnSaveChanges").prop("disabled", false);
                }
                else{
                    $("#btnSaveChanges").prop("disabled", true);
                }
            }

            computePercentage();

            //============== Modal Add Functions ===================
            $(".btnAddCriterion").click(function(){
                if(dblTemp == 100){
                    alert("The total percent is already 100%. Please delete or edit a criterion to add a new one");
                }else{
                    $("#mdlAddRdTest").modal("show");
                }
            });

            $("#mdlAddRdTest").on('hidden.bs.modal', function(){
                document.getElementById("formAddRdTest").reset();
            });

            $("#formAddRdTest").submit(function(){
                event.preventDefault();
                
                var strName = $("#txtAddRTCriName").val();
                var dblInput = parseFloat($("#txtAddRTCriPercent").val());

                computePercentage();
                dblTotalPercent = parseFloat(dblTemp + dblInput);

                if(dblTotalPercent > 100){
                    alert("Input should not be more than " + dblLeftPercent);
                }
                else{
                    //ADD 1 TO THE ID AND PADS THE 0 BEFORE THE NUMBER
                    strStartID++;
                    
                    //ADD THE TD CELL VALUES
                    $("#tblRdTest tbody").append('<tr class="even pointer"><td class=" ">' + strStartID + '</td><td class=" ">' + strName + '</td><td class=" ">' + dblInput + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td></tr>');

                    //computes the table again and changes the total and left percent something
                    computePercentage();
                    $(".remaining-percent").html(dblLeftPercent);
                    $(".total-percent").html(dblTemp);
                    
                    
                    $("#mdlAddRdTest").modal("hide"); //close modal
                }
            });



            //============== Modal Edit Functions ===================
            $(document).on("click", ".btnEdit", function(){
                $("#mdlEditRdTest").modal("show");
                $(this).parent().parent().addClass("edit-tr");
                $("#txtEditRTCriName").val($(this).parent().parent().children()[1].textContent);
                $("#txtEditRTCriPercent").val($(this).parent().parent().children()[2].textContent);
            });

            $("#mdlEditRdTest").on('hidden.bs.modal', function(){
                document.getElementById("formEditRdTest").reset();
                $('.edit-tr').removeClass('edit-tr');
            });

            $("#formEditRdTest").submit(function(){
                event.preventDefault();
                
                var dblInput = parseFloat($("#txtEditRTCriPercent").val());

                //compute percentage
                dblTemp = 0;
                $("#tblRdTest tbody tr").each(function(){
                    if(!$(this).hasClass('edit-tr')){
                        dblTemp += parseFloat($(this).children()[2].textContent);
                    }
                });
                dblLeftPercent = parseFloat(100 - dblTemp);
                $("#lblPercentLeft").html(dblLeftPercent);


                dblTotalPercent = parseFloat(dblTemp + dblInput);

                if(dblTotalPercent > 100){
                    alert("Input should not be more than " + dblLeftPercent);
                }
                else{
                    //CHANGES THE TD CELL VALUES
                    $('tbody tr.edit-tr td:eq(1)').html($("#txtEditRTCriName").val());
                    $('tbody tr.edit-tr td:eq(2)').html(dblInput)

                    //computes the table again and changes the total and left percent something
                    computePercentage();
                    $(".remaining-percent").html(dblLeftPercent);
                    $(".total-percent").html(dblTemp);
                    
                    $("#mdlEditRdTest").modal("hide"); //close modal
                    $('.edit-tr').removeClass('edit-tr'); //remove class edit-tr
                }
            });



            //========= Delete Modal Functions ==========  
            $(document).on("click", ".btnDelete", function(){
                $(this).parent().parent().addClass('remove-row');
                $("#modalDelete").modal("show");
            });

            $(".btnDeleteYes").click(function(){
                arrDeletedID.push($(".remove-row").children()[0].textContent);
                console.log(arrDeletedID);
                $(".remove-row").remove();
                $("#modalDelete").modal("hide");
                computePercentage();
            });

            $(".btnDeleteNo").click(function(){
                $('.remove-row').removeClass('remove-row');
                $("#modalDelete").modal("hide");
            });

            $("#modalDelete").on('hidden.bs.modal', function(){
                $('.remove-row').removeClass('remove-row');
                $("#modalDelete").modal("hide");
            });
            

            //========= Save Changes Functions ==========  
            $("#btnSaveChanges").click(function(){
                var arrJSONRdTest = [
                //      SAMPLE DATA ONLY. KEEP THIS AS A COMMENT.
                //{ "strID" : "0001" , "intRdTestName" : 1 , "dblPercent":"15"}, 
                //{ "strID" : "0003" , "intRdTestName" : 3 , "dblPercent":"15"}, 
                //{ "strID" : "0002" , "intRdTestName" : 2 , "dblPercent":"15"},
                //{ "strID" : "0006" , "intRdTestName" : 6 , "dblPercent":"15"},
                //{ "strID" : "0004" , "intRdTestName" : 4 , "dblPercent":"15"},
                //{ "strID" : "0005" , "intRdTestName" : 5 , "dblPercent":"25"},
                ];
                
                var strID = "";
                var strName = "";
                var strPercent = 0;
                var obj = [];

                $("#tblRdTest tbody tr").each(function(){
                    strID = $(this).children()[0].textContent;
                    strName = $(this).children()[1].textContent;
                    strPercent = parseFloat($(this).children()[2].textContent);
    
                    obj.push({"strID" : strID , "strName": strName , "dblPercent": strPercent});
                    arrJSONRdTest = JSON.stringify(obj);
                    obj = JSON.parse(arrJSONRdTest);
                });
                arrJSONRdTest = JSON.parse(arrJSONRdTest);
                
                //save changes to database
            });
        });
    </script>
  @endsection
