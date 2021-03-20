<?php
error_reporting(0); 
include('db.php');
include('header.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



$id = $_GET['id'];
$sql ="SELECT * FROM clients WHERE id = '$id'";
$results = mysqli_query($db,$sql);
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
				<button type="submit" name="btnSubmit" class="btn btn-outline-success">Send e-mail</button>
			</div>
		</div>
	</form>

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
<?php
if(isset($_POST['btnSubmit'])){
	$path = 'upload/'.$_FILES['invoice']['name'];
	move_uploaded_file($_FILES['invoice']['tmp_name'], $path);



	$mail= new PHPMailer();

	  //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth=true;                               // Enable SMTP authentication
    $mail->Username = 'testte748@gmail.com';                 // SMTP username
    $mail->Password = 'testing@;;';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Host = 'smtp.gmail.com';

    $mail->isHTML();
    $mail->Port = 465;                                    // TCP port to connect to
    $email = $result['email'];
    $mail->setFrom('testte748@gmail.com', 'Mailer');
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
    $mail->addAttachment($path); 

    $mail->addAddress($email);     // Add a recipient
    $result = $mail->send();
    if($result==true){
    	$cid = $_GET['id'];
    	$subject = $_POST['subject'];
    	$message = $_POST['message'];
    	$date = date('Y-m-d');
    	$sql = "INSERT INTO messages(client_id,subject,message,file,created)VALUES('$cid','$subject','$message','$path','$date')";
    	mysqli_query($db,$sql);

    	echo 'Message has been sent';

    }
}

?>
	<?php }?>

	</div>
<?php
$id = $_GET['id'];
$sql ="SELECT * FROM messages WHERE client_id = '$id'";
$messages = mysqli_query($db,$sql);
?>
<div class="col-md-12">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Subject</th>
				<th>Message</th>
				<th>File</th>
				<th>Date</th>
			</tr>
			<?php foreach($messages as $message){  ?>
			<tr>
				<td><?php echo $message['subject']; ?></td>

				<td><?php echo $message['message']; ?></td>

				<td><img width="100" src="<?php echo $message['file']; ?>"></td>

				<td><?php echo $message['created']; ?></td>
			</tr>
		<?php }?>
		</thead>
	</table>
</div>


	</div>
</div>
