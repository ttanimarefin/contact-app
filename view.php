<?php
include('db.php');
include('header.php');

$id = (isset($_POST['id']) ? $_GET['id'] : '');
$sql ="SELECT * FROM clients WHERE id = '$id'";
$results = mysqli_query($db,$sql);
var_dump($results);
foreach($results as $result){  

?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Send email</h1>
		  <form action="view.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label for="">Subject</label>
				<input type="text" name="subject" class="form-control" required="">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" class="form-control" required=""></textarea>
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" name="invoice" class="form-control" required="">
			</div>
			<div class="form-group">
				<button type="submit" name="btnsubmit" class="btn btn-outline-success">Send e-mail</button>
			</div>
		    
	        </form>
		</div>

	    <div class="col-md-6 float-right">
			<div class="card">
				<div class="card-header">
					Client Details
				</div>
				<div class="card-body">
					<p><strong>Name</strong>: <?php echo $result['name']; ?></p>
					<p><strong>Email</strong>: <?php echo $result['email']; ?></p>
					<p><strong>Phone</strong>: <?php echo $result['phone']; ?></p>
					<p><strong>Address</strong>: <?php echo $result['address']; ?></p>
					<p><strong>Description</strong>: <?php echo $result['description']; ?></p>
				</div>
			</div>
		</div>
    </div>
</div>
 <?php
  ?>



<?php }?>