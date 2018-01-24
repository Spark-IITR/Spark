<?php 
        // $main_username = $main_role = $main_name = '';
        // if (isset($_COOKIE['username'])) {
        //   $main_username = $_COOKIE["username"];
        // }
        // if (isset($_COOKIE['role'])) {
        //   $main_role = $_COOKIE["role"];
        // }
        // if (isset($_COOKIE['name'])) {
        //   $main_name = $_COOKIE["name"];
        // }
        
        // echo $main_role;
        // echo $main_username;
        // echo $main_name;
        require_once 'header.php';
     ?>
<body>

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
                <div class="container" >
                    <table class="table table-striped">
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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Research interests/Tentative projects for summer internship</th>
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



<?php include 'footer.php' ; ?>

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
