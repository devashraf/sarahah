<?php $header = include 'layout/includes/header.php';?>

<div class='form'>

	<h1>Sarahah Ashraf Elsayed</h1>
	
	<form action="src/sendmessage.php" method="post">
	
		<textarea name="message" placeholder="Your Message" required></textarea>
		
		<input type="submit" name="send_m" value="Send Message">
		
	</form>
	
</div>

<?php include 'layout/includes/footer.php'; ?>
