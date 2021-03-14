<?php
include('header.php');
include('db.php');

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<?php

$sql="SELECT * FROM clients";
$results=mysqli_query($db,$sql);

?>


 <div class="container">
 
 <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $result){
         ?>
         <tr>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['email'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td><?php echo $result['address'];?></td>
            <td><?php echo $result['description'];?></td>
            <td><?php echo $result['created'];?></td>
            
         </tr>
       <?php }?>  
    </tbody>
</table>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $(document).ready( function () {
    $('#table_id').DataTable();
} );

</script>