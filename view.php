<?php
include ('db.php');
include('header.php');

$id=$_GET['id'];
$sql="SELECT * FROM clients WHERE id='$id'";
$results = mysqli_query($db,$sql);
foreach($results as $result){
?>

<div class="container">
      <div class="row">
         <div class="col-md-6">
           <div class="card ">
               <div class="card-header text-center">
                   Form
               </div>
           </div>   
         </div>
         <div class="col-md-6 float-right">
           <div class="card">
              <div class="card-header">
                    Client Details
              </div>
              <div class="card-body">
                   <p><strong>Name</strong>: <?php echo $result['name']; ?></P>
              </div>
           </div>
         </div>
        <?php }?>
      </div>

</div>