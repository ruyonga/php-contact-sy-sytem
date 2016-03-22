<?php include("header.php"); ?>
<style type="text/css">
	#error, #form{
		padding-left: 10%;
		padding-right: 10%;
		margin-top: 1%;
		font-size: 1.4em;


	}
	.form-group{
		width: 60%;
	}
</style>

<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
	$email_to = "cc@senoproperties.com";
	$email_subject = "Sono Properties Client";


	function died($error) {
        // your error code can go here

		echo ' <div style="margin-left:10%;
		margin-right: 10%; margin-top:2%; font-size:1.2em"class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert">X</button>
		We are very sorry, but there were error(s) found with the form you submitted.<br />
		';

		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please and fix these errors.<br /><br /> </div>";
	header('Location:contactus.php');
		die();
	}

    // validation expected data exists
	if(!isset($_POST['name']) &&!isset($_POST['msg'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');      
	}

    $name = $_POST['name']; // required
   // $last_name = $_POST['last_name']; // required
    $email = $_POST['email']; // required
   // $telephone = $_POST['telephone']; // not required
    $msg = $_POST['msg']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email)) {
    	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
  /*if(!preg_match($string_exp,$name)) {
    $error_message .= 'The  Name you entered does not appear to be valid.<br />';
}*/
  /*if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
}*/
if(strlen($msg) < 2) {
	$error_message .= 'The msg you entered do not appear to be valid.<br />';
}
if(strlen($error_message) > 0) {
	died($error_message);
}
$email_message = "Form details below.\n\n";

function clean_string($string) {
	$bad = array("content-type","bcc:","to:","cc:","href");
	return str_replace($bad,"",$string);
}

$email_message .= "Name: ".clean_string($name)."\n";
   // $email_message .= "Last Name: ".clean_string($last_name)."\n";
$email_message .= "Email: ".clean_string($email)."\n";
   // $email_message .= "Telephone: ".clean_string($telephone)."\n";
$email_message .= "msg: ".clean_string($msg)."\n";


// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
$msg = "Message Sent.";
}
?>

<div >
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Contact us</h3>
		</div>
		<div class="panel-body">
			<table width="100%">
				<tr>
					<td>


						<form class="form-horizontal"   action='contactus.php' method='POST' >
							<legend>Tell us your needs</legend>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 control-label">Name</label>
								<div class="col-lg-10">
									<input class="form-control" name="name" placeholder="Name" type="text">
								</div>
							</div>

							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input class="form-control" id="inputEmail" name="email"placeholder="Email" type="text">
									<span class="help-block">Your Email will not be published</span>
								</div>
							</div>

							<div class="form-group">
								<label for="textArea" class="col-lg-2 control-label">Your Message</label>
								<div class="col-lg-10">
									<textarea class="form-control"  name="msg"rows="3" id="textArea"></textarea>

								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button class="btn btn-default">Cancel</button>
									<button type="submit" name="email" class="btn btn-primary">Send</button>
								</div>
							</div>
						</fieldset>
					</form>
				</td>

			</tr>
		</table>
	</div>
</div>
</div>


<?php include("include/footer.php"); ?>