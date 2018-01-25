<?php 
        require_once 'header.php';
     ?>
<body>
        <div  class="projectPage">
        <div class="container-fluid">
            <div class="row" id="aboutUs">
                <div class="col-sm-7 col-sm-offset-1">
                    <p class="projectsAvailableTag">PROJECTS AVAILABLE</p>
                    <!-- <p class="text-justify"><strong>The following projects are available to work upon as summer intern during summer vacations, 2018 </strong></p> -->
                </div>
                <div class="col-sm-3">
                    <input class="form-control projectSearchingInput" id="myInput" type="text" placeholder="Search Projects..">
                </div>
            </div>
            <div class="row" id="objectives">
                <div class="container"  style="margin-top: 2vh;">
                    <table class="table table-hover">
                        <?php  
                            $sql    = "SELECT sparkId,name,department,project from faculty where role='faculty'";
                            $result = $conn->query($sql);
                            if($result) {
                                if($result->num_rows == 0) {
                                    echo '<p>There are no entries in the database</p>';
                                }
                                else {
                                    echo '<thead style="">
                                            <tr>
                                                <th style="width:13%">ID</th>
                                                <th style="width:13%">Name</th>
                                                <th style="width:13%">Department</th>
                                                <th style="width:61%">Research interests/Tentative projects for summer internship</th>
                                            </tr>
                                        </thead>';
                                             
                                    while($row = $result->fetch_assoc()) {
                                        echo "
                                            <tbody id='myTable'>
                                                <tr>
                                                    <td>{$row['sparkId']}</td>
                                                    <td>{$row['name']}</td>
                                                    <td>{$row['department']}</td>
                                                    <td style='list-style-type:none'>{$row['project']}</td>
                                                    <td></td>
                                                </tr>
                                                <div id='spriority1Div'></div>
                                            </tbody>
                                        
                                        ";
                                    }
                                }
                             $result->free();
                            }  ?>
                    </table>
                </div>
            </div>
        </div>
        </div>



<?php include 'footer.php' ; ?>
<?php require_once('login_modal.php'); ?>


    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <!--http://www.convertcsv.com/csv-to-html.htm-->

</body>
