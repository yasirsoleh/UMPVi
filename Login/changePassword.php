<?php
include($_SERVER["DOCUMENT_ROOT"] .'/UMPVi/Dependencies/connect.php');
$user_id = $_SESSION['user_id'];
if (isset($_POST['submit'])){
    // Grab User submitted information
    $password = $_POST["inputPassword"];
    $query="update from user set user_password = '$password' where user_id='$user_id' " or die (mysqli_error());
    $result=mysqli_query($conn,$query);
    mysqli_store_result($conn);
    $count_row=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if ($count_row > 0) {
        $message= "<script language=javascript>alert(\"Successful Change Password.\");</script>"; 
        echo $message;
    }
    else{
        $message= "<script language=javascript>alert(\"Unsuccessful.\");</script>"; 
        echo $message;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
    <!-- HEADER/SIDENAV/NAVBAR -->
    <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>

    <body>
    
        <div class="row w-100">
            <!-- SIDENAV-->
            <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavUser.php'); ?>
            <!-- /SIDENAV-->
            <!-- DIV MAIN CLASS-->
            <div class="col-10 p-2">
        <div class="center col-md-3" id="">
        <h1>Change Password</h1>
        <center>
            <div class="text-center mb-4">
            </div>
            <div>
                <div>
                    <form action="" method="post">
                        <div class="form-label-group">
                            <br>
                            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="submit" name="submit" id="inputSubmit" value="Submit" class="btn btn-dark btn-lg btn-block ">
                        </div>
                    </form>
                </div>
                </center>
            </div>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->