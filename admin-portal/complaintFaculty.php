<?php 
    
    $sql = "SELECT id,name,department,email,complaints,adminRemark from faculty";
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
                            <th>Department</th>
                            <th>Complaints</th>
                            <th>Remarks Given</th>

                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
            while($row = $result->fetch_assoc()) {
                if($row['complaints']!=null){

                ?>
                         <tr  onclick="fetch_faculty_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td style="list-style-type: none;"><?php echo $row['complaints']; ?></td>
                            <td><?php echo $row['adminRemark']; ?></td>
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
    $result->free();

}           
            ?>

