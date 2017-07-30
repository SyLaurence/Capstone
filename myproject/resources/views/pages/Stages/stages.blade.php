
@extends ('layouts.nav')
        
        <!-- page content -->
        @section ('title')
            <title>Bus companies</title>
        @endsection
        @section ('Content')
        <!--===================================================================================================================-->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <!-- page title & search bar -->
                <div class="page-title">
                    <div class="title_left">
                        <h3>Stages</h3>
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
                                    <a href="" onclick="return false" class="btnAddStage">Add new stage</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>  

                        <div class="x_content">
                            <div class="table-responsive">  
                                <table id="tblStages" name="tblStages" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">Stage Number</th>
                                            <th class="column-title">ID</th>
                                            <th class="column-title">Description</th>
                                            <th class="column-title">Number of days</th>
                                            <th class="column-title no-link last" colspan="3"><span class="nobr">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even pointer">
                                            <td class=" ">1</td>
                                            <td class=" ">12342134 </td>
                                            <td class=" ">Screening and Road test</td>
                                            <td class=" ">6</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                            <td>
                                                <a href="activities.html">View Activities</a>
                                            </td>
                                        </tr>
                                        <tr class="odd pointer">
                                            <td class=" ">2</td>
                                            <td class=" ">12341234 </td>
                                            <td class=" ">Screening and Road test 2</td>
                                            <td class=" ">2</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">View Activities</a>
                                            </td>
                                        </tr>
                                        <tr class="even pointer">
                                            <td class=" ">3</td>
                                            <td class=" ">12342134 </td>
                                            <td class=" ">Screening and Road test 3</td>
                                            <td class=" ">3</td>
                                            <td class=" last">
                                                <a href="" onclick="return false" class="btnEdit">Edit</a>
                                            </td>
                                                <td>   
                                                <a href="" onclick="return false" class="btnDelete">Delete</a>
                                            </td>
                                            <td>
                                                <a href="" onclick="return false" class="btnDelete">View Activities</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                        <div class="x_footer">
                            <div class="col-md-2 col-md-offset-10">
                                
                                
                                    <input type="hidden" id="tableContent">
                                    <button id="btnSaveChanges" name="btnSaveChanges" class="btn btn-success right"> Save Changes </button> 
                                
                            </div>
                        </div>  
                    </div>
                  </div>
                </div>

            </div>


            <!-- MODAL Add New Stage -->
            <div class="modal fade" id="modalAddStage" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>New stage</h3>
                        </div>
                        
                        <div class="modal-body">
                            <form id="formAddStage" name="formAddStage" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Stage Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtAddStageNo" name="txtAddStageNo" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="txtAddStageDesc" name="txtAddStageDesc" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Number of days <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtAddStageNoDOfDays" name="txtAddStageNoDOfDays" required="required" class="form-control col-md-7 col-xs-12">
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
            <div class="modal fade" id="modalEditStage" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>New stage</h3>
                        </div>
                        
                        <div class="modal-body">
                            <form id="formEditStage" name="formEditStage" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Stage Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtEditStageNo" name="txtEditStageNo" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="txtEditStageDesc" name="txtEditStageDesc" required="required" class="form-control col-md-7 col-xs-12" val="">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        Number of days <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="number" id="txtEditStageNoDOfDays" name="txtEditStageNoDOfDays" required="required" class="form-control col-md-7 col-xs-12">
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
            var arrJSONStages = [
                //      SAMPLE DATA ONLY. KEEP THIS AS A COMMENT.
                //{ "strID" : "ID-0001" , "intStageNum" : 1 , "strName":"Screening and Road test", "strNumOfDays":1 }, 
                //{ "strID" : "ID-0003" , "intStageNum" : 3 , "strName":"Apprentice", "strNumOfDays":14 }, 
                //{ "strID" : "ID-0002" , "intStageNum" : 2 , "strName":"Workshop", "strNumOfDays":3 },
                //{ "strID" : "ID-0006" , "intStageNum" : 6 , "strName":"Operation Orientation", "strNumOfDays":3 },
                //{ "strID" : "ID-0004" , "intStageNum" : 4 , "strName":"Pre-emp Req.", "strNumOfDays":3 },
                //{ "strID" : "ID-0005" , "intStageNum" : 5 , "strName":"Policy Orientation", "strNumOfDays":3 },
            ];

            var arrStageNames = new Array();
            var arrDeletedID = new Array();
            var intHighestStageNo = 0;
            var intOldStageNo = 0; //used to get the former stage number of an edited record

            var strStartID = 0; // yung unang ID  --  SY! DITO MO ILALAGAY YUNG LATEST NA ID FROM DB


            // SORT THE JSON ACCORDING TO STAGE NUMBER(intStageNum)
            function fnSorting(json_object, key_to_sort_by) {
                function sortByKey(a, b) {
                    var x = a[key_to_sort_by];
                    var y = b[key_to_sort_by];
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                }
                json_object.sort(sortByKey);
                intHighestStageNo = arrJSONStages.length;
            }

            // GET TABLE VALUES TO JSON
            function fnTableToJson(){
                var strID = "";
                var intNum = 0;
                var strName = "";
                var strNumOfDays = 0;
                var obj = [];
                intHighestStageNo = 0;

                // check first if there is a record in the table
                if(($("#tblStages > tbody").find("tr").length) > 0){
                    $("#tblStages tbody tr").each(function(){
                        strID = $(this).children()[1].textContent;
                        intNum = parseInt($(this).children()[0].textContent);
                        strName = $(this).children()[2].textContent;
                        strNumOfDays = parseInt($(this).children()[3].textContent);
        
                        obj.push({"strID" : strID , "intStageNum" : intNum , "strName": strName , "strNumOfDays": strNumOfDays});
                        arrJSONStages = JSON.stringify(obj);
                        //console.log(arrJSONStages);
                        obj = JSON.parse(arrJSONStages);
                    });
                    arrJSONStages = JSON.parse(arrJSONStages);
                }
                else{
                    console.log("fnTableToJSON: Table # of rows = " + $("#tblStages > tbody").find("tr").length);
                }
            }

            //PUSH A RECORD IN JSON
            function fnPushToJSON(strID, intNum, strName, strNumOfDays){
                var obj = arrJSONStages;
                obj.push({"strID" : strID , "intStageNum" : intNum , "strName": strName , "strNumOfDays": strNumOfDays});
                arrJSONStages = JSON.stringify(obj);
                //console.log(arrJSONStages);
                arrJSONStages = JSON.parse(arrJSONStages);
            }

            fnTableToJson();
            fnSorting(arrJSONStages, 'intStageNum');

            // submit form add
            $("#formAddStage").submit(function(){
                event.preventDefault();
                var intStageNo = parseInt($("#txtAddStageNo").val());
                var strStageName = $("#txtAddStageDesc").val();
                var intStageNoOfDays = parseInt($("#txtAddStageNoDOfDays").val());

                /// To check if the no of days is greater that 1
                if(intStageNoOfDays > 0){
                    ///if the stage number inputed is more than two than the stages given
                    if(intStageNo > (intHighestStageNo + 1)){               
                            alert("Stage number should not be more than " + (intHighestStageNo + 1));
                        }
                        ///is the stage is to be added at the last
                        else if(intStageNo == (intHighestStageNo + 1)){                
                            //add 1 to ID
                            strStartID++;
                            console.log("ID = " + strStartID);

                            //push the new record to JSON
                            fnPushToJSON(strStartID, intStageNo, strStageName, intStageNoOfDays);

                            //remake the whole table
                            $("#tblStages > tbody").empty();
                            fnSorting(arrJSONStages, 'intStageNum');

                            $.each(arrJSONStages, function(key) {
                                $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                            });

                            //close modal
                            $("#modalAddStage").modal("hide");
                            document.getElementById("formAddStage").reset();
                        }
                        /// if the new stage is to be added between the stages
                        else if(intStageNo < (intHighestStageNo + 1)){          
                            //add 1 to ID
                            strStartID++;
                            console.log("ID = " + strStartID);

                            //move numbers to stage
                            $.each(arrJSONStages, function(key) {
                                if(arrJSONStages[key].intStageNum >= intStageNo){
                                    arrJSONStages[key].intStageNum++;
                                }
                            });

                            //push the new record to JSON
                            fnPushToJSON(strStartID, intStageNo, strStageName, intStageNoOfDays);

                            //remake the whole table
                            $("#tblStages > tbody").empty();
                            fnSorting(arrJSONStages, 'intStageNum');

                            $.each(arrJSONStages, function(key) {
                                $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                            });
                            
                            //close modal
                            $("#modalAddStage").modal("hide");
                        } 
                }
                else{
                    alert("Number of days should be greater than 0.");
                    return false;
                }
            });


            //submit form edit
            $("#formEditStage").submit(function(){
                event.preventDefault();
                console.log("panget in!");
                var intStageNo = parseInt($("#txtEditStageNo").val());
                var strStageName = $("#txtEditStageDesc").val();
                var intStageNoOfDays = parseInt($("#txtEditStageNoDOfDays").val());
                console.log(intOldStageNo + " " + intStageNo + "  " + strStageName + "  " + intStageNoOfDays);

                if(intStageNo > (intHighestStageNo + 1)){               //IF THE STAGE NUMBER INPUTED IS MORE THAN TWO THAN THE STAGES GIVEN
                    alert("Stage number should not be more than " + (intHighestStageNo + 1));
                }
                else if(intStageNo <= (intHighestStageNo + 1)){
                    //CONCEPT: IT CHANGES THE EDIT RECORD, AND THE OTHERS WILL BE MOVED FORWARD (STAGENO + 1)

                    //CHECKS IF THE ORIGINAL STAGE VALUE IS GREATER THAN OR LESS THAN THE NEW STAGE VALUE
                    if(intOldStageNo > intStageNo){         //CHANGES FOR THE FIELDS AND STAGE NUMBERS. THE OTHER STAGES WILL BE MOVED FORWARD
                        $.each(arrJSONStages, function(key){
                            if(arrJSONStages[key].intStageNum >= intStageNo && arrJSONStages[key].intStageNum < intOldStageNo){
                                arrJSONStages[key].intStageNum++;
                            }
                            else if(arrJSONStages[key].intStageNum == intOldStageNo){
                                arrJSONStages[key].intStageNum = intStageNo;
                                arrJSONStages[key].strName = strStageName;
                                arrJSONStages[key].strNumOfDays = intStageNoOfDays;
                            }
                        });

                        //SORT AND GET NEW STAGE NAMES
                        fnSorting(arrJSONStages, 'intStageNum');

                        //REMAKE THE WHOLE TABLE
                        $("#tblStages > tbody").empty();
                        $.each(arrJSONStages, function(key){
                            $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                        });

                        $("#modalEditStage").modal("hide");
                    }
                    else if(intOldStageNo < intStageNo){ 
                        for(var intCtr=(arrJSONStages.length-1); intCtr>=0; intCtr--){
                            if(arrJSONStages[intCtr]['intStageNum'] > intOldStageNo && arrJSONStages[intCtr]['intStageNum'] <= intStageNo){
                                arrJSONStages[intCtr]['intStageNum']--;
                            }
                            else if(arrJSONStages[intCtr]['intStageNum'] == intOldStageNo){                                     
                                arrJSONStages[intCtr]['intStageNum'] = intStageNo;
                                arrJSONStages[intCtr]['strName'] = strStageName;
                                arrJSONStages[intCtr]['strNumOfDays'] = intStageNoOfDays;
                            }
                            //console.log("After " + arrJSONStages[intCtr]['intStageNum'] + " " + arrJSONStages[intCtr]['strName'] + " - " + arrJSONStages[intCtr]['strNumOfDays']);
                        }

                        //SORT JSON
                        fnSorting(arrJSONStages, 'intStageNum');

                        //REMAKE THE WHOLE TABLE
                        $("#tblStages > tbody").empty();
                        $.each(arrJSONStages, function(key){
                            $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                        });

                        $("#modalEditStage").modal("hide");
                    }
                    else if(intOldStageNo == intStageNo){   //CHANGES FOR THE OTHER FIELDS. NO CHANGES IN THE STAGE NUMBERS
                        $("#tblStages > tbody").empty();
                        $.each(arrJSONStages, function(key){
                            if(arrJSONStages[key].intStageNum == intStageNo){
                                arrJSONStages[key].strName = strStageName;
                                arrJSONStages[key].strNumOfDays = intStageNoOfDays;
                            }
                            //REMAKE THE WHOLE TABLE
                            $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                        });
                        $("#modalEditStage").modal("hide");
                    }
                }
            });


            // modal edit show and hide
            $(document).on("click", ".btnEdit", function(){
                $("#modalEditStage").modal("show");
                $(this).parent().parent().addClass("edit-tr");
                intOldStageNo = parseInt($(this).parent().parent().children()[0].textContent);
                console.log(intOldStageNo);
                $("#txtEditStageNo").val(intOldStageNo);
                $("#txtEditStageDesc").val($(".edit-tr").children()[2].textContent.trim());
                $("#txtEditStageNoDOfDays").val($(".edit-tr").children()[3].textContent);
            });

            $("#modalEditStage").on('hidden.bs.modal', function(){
                //document.getElementById("formEditStage").reset();
                $('.form-group, .has-error').removeClass('has-error');
                $('.edit-tr').removeClass('edit-tr');
            });

            // modal add show and hide
            $(".btnAddStage").click(function(){
                $("#modalAddStage").modal("show");
            });

            // modal delete show and hide
            $(document).on("click", ".btnDelete", function(){
                $("#modalDelete").modal("show");
                $(this).parent().parent().addClass("remove-row");
            });

            $("#modalDelete").on('hidden.bs.modal', function(){
                $('.remove-row').removeClass('remove-row');
            });
            
            $(".btnDeleteNo").click(function(){
                $('.remove-row').removeClass('remove-row');
                $("#modalDelete").modal("hide");
            });

            $(".btnDeleteYes").click(function(){
                var intStageNo = parseInt($(".remove-row").children()[0].textContent);
                arrDeletedID.push($(".remove-row").children()[1].textContent);
                
                console.log("Stage to be deleted " + intStageNo);

                arrJSONStages.splice(intStageNo-1,1);
                $.each(arrJSONStages, function(key){
                    if(arrJSONStages[key].intStageNum > intStageNo){
                        arrJSONStages[key].intStageNum--;
                    }
                });
                console.log(JSON.stringify(arrJSONStages));

                //SORT AND GET NEW STAGE NAMES
                fnSorting(arrJSONStages, 'intStageNum');

                //REMAKE THE WHOLE TABLE
                $("#tblStages > tbody").empty();
                $.each(arrJSONStages, function(key){
                    $("#tblStages tbody").append('<tr class="even pointer"><td class=" "> ' + arrJSONStages[key].intStageNum + '</td><td class=" ">' + arrJSONStages[key].strID + '</td><td class=" ">' + arrJSONStages[key].strName + '</td><td class=" ">' + arrJSONStages[key].strNumOfDays + '</td><td class=" last"><a href="" onclick="return false" class="btnEdit">Edit</a></td><td><a href="" onclick="return false" class="btnDelete">Delete</a></td><td><a href="activities.html">View Activities</a></td></tr>');
                });

                $("#modalDelete").modal("hide");
            });

            $("#btnSaveChanges").click(function(){
                console.log("Final JSON VALUES = " + JSON.stringify(arrJSONStages));
                console.log("FINAL Deleted VALUES =  " + arrDeletedID);
                //save changes to database
                document.getElementById("tableContent").value = JSON.stringify(arrJSONStages)+'';
                console.log(document.getElementById("tableContent").value);
            });


        });
    </script>
   @endsection
