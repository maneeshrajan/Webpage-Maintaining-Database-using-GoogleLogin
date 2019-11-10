<?php
$connect = mysqli_connect("localhost", "root", "", "test");

	if(isset($_POST['update_dp']))
	{

		$id = htmlentities(mysqli_real_escape_string($con,$_POST['id']));
		$part = htmlentities(mysqli_real_escape_string($con,$_POST['part']));
	#	$id = htmlentities(mysqli_real_escape_string($con,$_POST['id']));
		$prev = htmlentities(mysqli_real_escape_string($con,$_POST['p_years']));
		$last = htmlentities(mysqli_real_escape_string($con,$_POST['l_years']));

		#$query = "INSERT INTO tbl_excel(excel_id,excel_part,excel_prev,excel_latest) VALUES ('".$id."', '".$part."', '".$prev."', '".$last."')";

		$insert = "insert into tbl_excel (excel_id,excel_part,excel_prev,excel_latest)
		values('$id','$part','$prev','$last')";

		$query = mysqli_query($connect, $insert);

		if($query){
			echo "<script>alert('Well Done you have update your database.')</script>";
			
		}
		else{
			echo "<script>alert('please try again!')</script>";
			echo "<script>window.open('update_t.php', '_self')</script>";
		}
	}
?>		