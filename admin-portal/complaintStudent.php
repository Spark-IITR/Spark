<?php 
    
    $sql = "SELECT id,sparkId,name,email,complaints from student";



    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {


            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Complaint</th>

                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php
            while($row = $result->fetch_assoc()) {
               
                if($row['complaints']!=null){
                ?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['sparkId']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td style="list-style-type: none;"><?php echo $row['complaints']; ?></td>
                        </tr>
                        
                <?php  
                }

                $result->free();
            } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
}           
?>


 