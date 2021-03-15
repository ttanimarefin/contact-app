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
    <h2 class="text-center mb-3 mt-4"> Your Client Information</h2>
   <div class="total-client">
        Total Clients:<?php echo mysqli_num_rows($results);?>     
   </div>
 
 <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>

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
            <td>
                 <button class="btn btn-success btn-sm">view</button>
                 <button class="btn btn-primary btn-sm">edit</button>
                 <button class="btn btn-danger btn-sm">delete</button>
            </td>
            
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



 <style type="text/css">
       .total-client {
              position: relative;
              left: 1150px;
              top: -18px;
              color: indianred;
                 }
 </style> 
</body>
</html>