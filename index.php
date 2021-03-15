<?php
include('header.php');
include('db.php');

?>




<?php

$sql="SELECT * FROM clients";
$results=mysqli_query($db,$sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
</head>
<body>


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
 <script type>
   $(document).ready( function () {
    $('#table_id').DataTable();
 } );

 </script>

</body>
</html>