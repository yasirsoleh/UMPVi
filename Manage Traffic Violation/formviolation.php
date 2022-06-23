<!-- Page to insert violation details-->
<?php
    include($_SERVER["DOCUMENT_ROOT"] .'/UMPVi/Dependencies/connect.php');
    extract($_POST);
    $violation_timestamp = date("Y-m-d H:i:s");
    $query = "INSERT INTO violation VALUES('0','$qrcode_id','$violation_details','$violation_timestamp','$user_id')";
    if (mysqli_query($conn, $query)) {
    	$message = "Success Insert!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '/UMPVi/Manage Traffic Violation/view.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>
