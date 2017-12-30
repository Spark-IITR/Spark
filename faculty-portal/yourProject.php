				

                                    <div class="">
                                        <table class="table table-striped">
                                            <thead style="">
                                                <tr>
                                                    
                                                    <th title="Field #5">Research interests/Tentative projects for summer internship</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php  
                                                $sql    = "SELECT project from user where id=$facultyRealId";
                                                $result = $conn->query($sql);
                                                if($result) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "
                                                                <tr>
                                                                    
                                                                    <td>"; echo $row['project']; echo "</td>
                                                                </tr>";
                                                        }
                                                    
                                                    $result->free();
                                                }
                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
