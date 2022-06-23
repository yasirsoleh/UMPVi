<?php
include($_SERVER["DOCUMENT_ROOT"] .'/UMPVi/Dependencies/connect.php');
if (isset($_POST['student'])){
    // Grab User submitted information
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];
    $query="select * from user where user_username='$username' AND user_password='$password' AND user_role='student'" or die (mysqli_error());
    $result=mysqli_query($conn,$query);
    mysqli_store_result($conn);
    $count_row=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if ($count_row > 0) {
        session_start();
        $_SESSION['user_id']=$row['user_id'];
        header("Location: /UMPVi/Manage Vehicle Sticker/managevehiclesticker.php");
    }
    else{
        $message= "<script language=javascript>alert(\"Sorry Invalid Password And User Name Please Try Again.\");</script>"; 
        echo $message;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
if (isset($_POST['staff'])){
    // Grab User submitted information
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];
    $query="select * from user where user_username='$username' AND user_password='$password' AND user_role='staff'" or die (mysqli_error());
    $result=mysqli_query($conn,$query);
    mysqli_store_result($conn);
    $count_row=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if ($count_row > 0) {
        session_start();
        $_SESSION['user_id']=$row['user_id'];
        header("Location: /UMPVi/Manage Vehicle Sticker/managevehiclesticker.php");
    }
    else{
        $message= "<script language=javascript>alert(\"Sorry Invalid Password And User Name Please Try Again.\");</script>"; 
        echo $message;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
if (isset($_POST['admin'])){
    // Grab User submitted information
    $username = $_POST["inputUsername"];
    $password = $_POST["inputPassword"];
    $query="select * from user where user_username='$username' AND user_password='$password' AND user_role='admin'" or die (mysqli_error());
    $result=mysqli_query($conn,$query);
    mysqli_store_result($conn);
    $count_row=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if ($count_row > 0) {
        session_start();
        $_SESSION['user_id']=$row['user_id'];
        header("Location: /UMPVi/Manage Traffic Violation/manageviolation.php");
    }
    else{
        $message= "<script language=javascript>alert(\"Sorry Invalid Password And User Name Please Try Again.\");</script>"; 
        echo $message;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
<!-- HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/headerLogin.php'); ?>
<!-- /HEADER-->

<body>
    <!-- DIV MAIN CLASS-->
    <div class="main row">
        <div class="center col-md-3" id="">
            <div class="text-center mb-4">
                <img class="mb-4" src="/UMPVi/Dependencies/logoumpnotext.png" alt="" height="100">
                <h1 class="mb-3">UMPVi</h1>
                <h1 class="h3 mb-3">Login</h1>
            </div>
            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-student-tab" data-toggle="pill" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-staff-tab" data-toggle="pill" href="#staff" role="tab" aria-controls="staff" aria-selected="false">Staff</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-admin-tab" data-toggle="pill" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student">
                    <form action="" method="post">
                        <div class="form-label-group">
                            <input type="username" name="inputUsername" id="inputUsername" class="form-control" placeholder="Student Username" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="submit" name="student" id="inputSubmit" value="Submit" class="btn btn-dark btn-lg btn-block ">
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff">
                    <form action="" method="post">
                        <div class="form-label-group">
                            <input type="username" name="inputUsername" id="inputUsername" class="form-control" placeholder="Staff Username" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="submit" name="staff" id="inputSubmit" value="Submit" class="btn btn-dark btn-lg btn-block ">
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin">
                    <form action="" method="post">
                        <div class="form-label-group">
                            <input type="username" name="inputUsername" id="inputUsername" class="form-control" placeholder="Admin Username" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-label-group">
                            <br>
                            <input type="submit" name="admin" id="inputSubmit" value="Submit" class="btn btn-dark btn-lg btn-block ">
                        </div>
                    </form>
                </div>
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