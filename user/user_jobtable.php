

<?php 
$error_log['apply']='';

if(!empty($array_result)) {?>
    <thead>
        <th  scope="col" width = "15%">Company</th>
        <th  scope="col" width = "15%" >Position</th>
        <th  scope="col" style="text-align: center;" width = "45%">Requirment</th>
        <th  scope="col" width = "15%">Salary</th>
        <th  scope="col" width = "10%">Action</th>
    </thead>
    <tbody>
    <?php
        foreach($array_result as $value){    ?>
            <tr>
            <td><?php echo $value['compname'];?></td>
            <td><?php echo $value['jobtitle'];?></td>
            <td><?php echo $value['requirment'];?></td>
            <td><?php echo $value['salary'];?></td>
            <td>
            <input type="submit" value = "Apply Now" class="btn btn-primary" id="apply-btn" 
            data-posid = "<?php echo $value['posid'];?>" data-userid = "<?php echo $_SESSION['userid'];?>" href="#">
            <p class = "error-msg"><?php echo $error_log['apply'];?></p>
            </td>
            </tr>


<?php } 
}


else{ ?>
    <p>NO RECORD FOUND</p>
<?php }?>

<script src="index_admin.js"></script>

