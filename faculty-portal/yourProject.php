				

                                    <div class="">
                                        <table class="table table-striped">
                                            <thead style="">
                                                <tr>
                                                    <th title="Field #1">#</th>
                                                    <th title="Field #5">Research interests/Tentative projects for summer internship</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php  
                                                $sql    = "select project from user where email='$email'";
                                                $result = $conn->query($sql);
                                                if($result) {
                                                        while($row = $result->fetch_assoc()) {
                                                            echo "
                                                                <tr>
                                                                    <td align='right'>1</td>
                                                                    <td>{$row['project']}</td>
                                                                </tr>";
                                                        }
                                                    
                                                    $result->free();
                                                }
                                                 ?>
                                            </tbody>
                                        </table>
                                    </div>
