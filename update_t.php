<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #187FAB;
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}

</style>
<body>
	<form method=POST action="update_dp.php" >
<table cellspacing=10>
<tr>
<td>ID:</td><td><input type=text  name=id></td></tr>
<td>PARTICULARS:</td><td><input type=text  name=part></td></tr>
<td>PREVIOUS YEARS:</td><td><input type=text  name=p_years></td></tr>
<td>LATEST YEAR:</td><td><input type=text  name=l_years></td></tr>



<tr></tr><tr><td><td><input type=submit value="UPDATE"></td>
</form>
<!---<form method=get action="signup.php">
<td><input type=submit value="Signup"></td></tr>
</form>
	<form method="GET" action="Export.php">
       <input type="submit" name="export" class="btn btn-info" value="Expot Excel" />
    </form>  -->
</body>

</html>
