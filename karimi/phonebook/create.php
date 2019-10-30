<!DOCTYPE html>
<html>
<head>
	<title>Phonebook | Create</title>
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">
</head>
<body class="pt-5">
	<div class="container">
		<div class="card">
			<div class="card-body">
		        <form method="POST" action="number.php">
		        	<div class="form-group">
			            <label for="name">Name</label>
		                <input class="form-control" type="text" id="name" name="name" placeholder="Name">
		        	</div>
		        	<div class="form-group">
			            <label for="mobile">Mobile</label>
		                <input class="rectangle form-control" type="text" name="mobile" id="mobile" placeholder="Mobile">
		        	</div>
		        	<div class="form-group">
			            <label for="email">Email</label>
		                <input class="rectangle form-control" type="text" name="email" id="email" placeholder="Email">
		        	</div>
		            <button type="submit" class="btn btn-success btn-block">Create Contact</button>
		        </form>
			</div>
		</div>
	</div>
</body>
</html>