<?php 
    
    $sql10 = "SELECT id,sparkId,name,email,complaints from user where role='faculty'";



    $result10 = $conn->query($sql10);
    
    if($result10){
        if(!$result10->num_rows == 0) {


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
            while($row10 = $result10->fetch_assoc()) {
               
                if($row10['complaints']!=null){
                ?>
                         <tr  onclick="fetch_faculty_detail(<?php echo $row10['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row10['id']; ?></td>
                            <td><?php echo $row10['name']; ?></td>
                            <td><?php echo $row10['email']; ?></td>
                            <td style="list-style-type: none;"><?php echo $row10['complaints']; ?></td>
                        </tr>
                        
                <?php  
                }
            } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
}           
?>


 