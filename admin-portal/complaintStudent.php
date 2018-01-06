<?php 
    
    $sql1 = "SELECT id,sparkId,name,email,complaints from student";



    $result1 = $conn->query($sql1);
    
    if($result1){
        if(!$result1->num_rows == 0) {


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
            while($row1 = $result1->fetch_assoc()) {
               
                if($row1['complaints']!=null){
                ?>
                         <tr style="cursor: pointer;">
                            <td ><?php echo $row1['id']; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td><?php echo $row1['email']; ?></td>
                            <td style="list-style-type: none;"><?php echo $row1['complaints']; ?></td>
                        </tr>
                        
                <?php  
                }
                $result1->free();
            } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
}           
?>


 