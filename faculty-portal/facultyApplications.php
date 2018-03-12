            



                <table class="table table-striped">
                    <thead style="font-size: 14px;">
                        <tr>
                            
                            <th title="Student Name">Name</th>
                            <th title="Year">Year</th>
                            <th title="Department">Department</th>
                            <th title="C.G.P.A">C.G.P.A</th>
                            <th title="Student's Priority">Student's Priority</th>
                            <th title="Approve">Approve</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php 
                             $jsonCont = file_get_contents('../jsonDb/faculty.json');
                              $content = json_decode($jsonCont, true);
                              if($facultyRealId == $content['facultyId']){
                                $StudentIds = $content['studentId'];
                                $sql    = "SELECT id,name,email,cgpa,department,college,year,spriority1,spriority2,spriority3,spriority4,spriority5 from student where sparkId in ($StudentIds)";
                              }else{
                                $sql    = "SELECT id,name,email,department,college,year,spriority1,spriority2,spriority3,spriority4,spriority5,cgpa from student where ( spriority1!=0 or spriority2!=0 or spriority3!=0 or spriority4!=0 or spriority5!=0 ) and LENGTH(resume)>0 and length(noc)>0 ;";
                              }

                             
                            $result = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($result)) { ?>

                                            <tr onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;" >
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['cgpa']; ?></td>

                                    <?php if($row['spriority1']==$facultyRealId){ ?>
                                        
                                            <td>1st</td>
                                            
                                    <?php }else if($row['spriority2']==$facultyRealId){?>
                                        
                                            <td>2nd</td>

                                    <?php }else if($row['spriority3']==$facultyRealId){?>

                                            <td>3rd</td>

                                    <?php }else if($row['spriority4']==$facultyRealId){?>

                                            <td>4th</td>

                                    <?php }else if($row['spriority5']==$facultyRealId){?>

                                            <td>5th</td> 

                                     <?php }else{ ?>
                                            <td></td> 
                                     <?php } ?>
                                            <td>
                                                <div class='btn-group'>
                                                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    Priority <span class='caret'></span>
                                                  </button>
                                                  <ul class='dropdown-menu'>
                                                    <li onclick="fpriority1(<?php echo $row['id']; ?>)"><a>1st </a></li>
                                                    <li onclick="fpriority2(<?php echo $row['id']; ?>)"><a>2nd </a></li>
                                                    <li onclick="fpriority3(<?php echo $row['id']; ?>)"><a>3rd </a></li>
                                                    <li onclick="fpriority4(<?php echo $row['id']; ?>)"><a>4rd </a></li>
                                                    <li onclick="fpriority5(<?php echo $row['id']; ?>)"><a>5rd </a></li>
                                                  </ul>
                                                  <div id="fpriority1Div"></div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php 
                                }
                                            
                         $result->free();
                        ?>

                        
                        
                    </tbody>
                </table>

<script>

        function fpriority1(data){

            var studentId = data;
            var facultyId = <?php echo $facultyRealId; ?> ;
            con = confirm('If you want to set him/her as 1st priority for your project? ');
            if(con==true ){
                $.ajax({
                    url: 'fpriority1.php',
                    data: {"studentId":studentId,"facultyId":facultyId},
                    async: true,
                    type: 'POST',          

                    success: function(data){
                        $("#fpriority1Div").html(data);
                    },
                   error : function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown+ 'Priority Set.');
                    }
                });
            }
        }


        function fpriority2(data){

            var studentId = data;
            var facultyId = <?php echo $facultyRealId; ?> ;
            con = confirm('If you want to set him/her as 2nd priority for your project? ');
            if(con==true ){
                $.ajax({
                    url: 'fpriority2.php',
                    data: {"studentId":studentId,"facultyId":facultyId},
                    async: true,
                    type: 'POST',          

                    success: function(data){
                            $("#fpriority1Div").html(data);
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown+ 'Priority Set.');
                    }
                });
            }
        }

        function fpriority3(data){

            var studentId = data;
            var facultyId = <?php echo $facultyRealId; ?> ;
            con = confirm('If you want to set him/her as 3rd priority for your project? ');
            if(con==true ){
                $.ajax({
                    url: 'fpriority3.php',
                    data: {"studentId":studentId,"facultyId":facultyId},
                    async: true,
                    type: 'POST',          

                    success: function(data){
                            $("#fpriority1Div").html(data);
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown+ 'Priority Set.');
                    }
                });
            }
        }

        function fpriority4(data){

            var studentId = data;
            var facultyId = <?php echo $facultyRealId; ?> ;
            con = confirm('If you want to set him/her as 4th priority for your project? ');
            if(con==true ){
                $.ajax({
                    url: 'fpriority4.php',
                    data: {"studentId":studentId,"facultyId":facultyId},
                    async: true,
                    type: 'POST',          

                    success: function(data){
                            $("#fpriority1Div").html(data);
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown+ 'Priority Set.');
                    }
                });
            }
        }

        function fpriority5(data){

            var studentId = data;
            var facultyId = <?php echo $facultyRealId; ?> ;
            con = confirm('If you want to set him/her as 5th priority for your project? ');
            if(con==true ){
                $.ajax({
                    url: 'fpriority5.php',
                    data: {"studentId":studentId,"facultyId":facultyId},
                    async: true,
                    type: 'POST',          

                    success: function(data){
                            $("#fpriority1Div").html(data);
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown+ 'Priority Set.');
                    }
                });
            }
        }

    </script>


