<?php

include('header.php');
include('db.php');
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
 <?php
     
    if(isset($_SESSION['message'])){
        echo'<div class="alert alert-success">'.$_SESSION['message'].'</div>';
        unset($_SESSION['message']);
    }

    ?>
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
        <?php foreach($results as $result){ ?>
         <tr>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['email'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td><?php echo $result['address'];?></td>
            <td><?php echo $result['description'];?></td>
            <td><?php echo $result['created'];?></td>
            <td>
                 <button class="btn btn-success btn-sm">view</button>
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $result['id']; ?>">
                     Edit
                 </button>
                 <button class="btn btn-danger btn-sm">delete</button>
            </td>
            
        </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $result['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <form  action="update.php" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client ID:<?php echo $result['id']; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
    <div class="modal-body">
      <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $result['email']; ?>">
        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $result['phone'] ;?>">
        </div>
        
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $result['address']; ?>">
        </div>
         
         <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">
                <?php echo $result['description']; ?>
            </textarea>
        </div>

      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="btnsubmit"  id="update" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </form>
</div>


<?php }?> 
 </tbody>
 </table>
 
 </div>
 
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
   $(document).ready( function () {
    $('#table_id').DataTable();
    $('#Modal').modal('show');
 } );

 </script>

<style>

</style>

 
</body>
</html>