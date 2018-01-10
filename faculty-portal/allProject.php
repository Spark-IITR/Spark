			

                                    <div class="">
                                        <table class="table table-striped">
                                            <?php  
                                                $sql = "select id,sparkId,name,department,project from faculty where role='faculty'";
                                                $result = $conn->query($sql);
                                                if($result) {
                                                    if($result->num_rows == 0) {
                                                        echo '<p>There are no files in the database</p>';
                                                    }
                                                    else {
                                                        echo '<thead style="">
                                                                <tr>
                                                                    <th title="Field #1">ID</th>
                                                                    <th title="Field #2">Name</th>
                                                                    <th title="Field #3">Department</th>
                                                                    <th title="Field #4">Research interests/Tentative projects for summer internship</th>
                                                                </tr>
                                                             </thead>';
                                                                 
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "
                                                                <tbody id='myTable'>
                                                                    <tr>
                                                                        <td>{$row['sparkId']}</td>
                                                                        <td>{$row['name']}</td>
                                                                        <td>{$row['department']}</td>
                                                                        <td>{$row['project']}</td>
                                                                        
                                                                    </tr>
                                                                </tbody>";
                                                        }
                                                    }
                                                 
                                                    $result->free();
                                                }
                                            ?>
                                        </table>
                                    </div>
