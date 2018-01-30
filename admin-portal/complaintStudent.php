<?php 
    
    $sql = "SELECT sparkId,id,name,cgpa,department,email,complaints,adminRemark from student";
    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" >
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>C.G.P.A</th>
                            <th>Department</th>
                            <th>College</th>
                            <th>Complaints</th>
                            <th>Remark Given</th>
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
                            <td><?php echo $row['cgpa']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['college']; ?></td>
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

