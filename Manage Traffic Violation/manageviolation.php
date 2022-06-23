<?php
$user_id=$_SESSION['user_id'];
?>


<!-- HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>
<!-- /HEADER-->

<body>
    <div class="row w-100">
        <!-- SIDENAV-->
        <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavAdmin.php'); ?>
        <!-- /SIDENAV-->
        <!-- DIV MAIN CLASS-->
        <div class="col-10 p-2">
            <form action="formviolation.php" method="post">
                <h1>Traffic Violation Form</h1>
                <div class="col-10 p-2">
                    <div>
                        <label>Violation details: </label>
                        <select name="violation_details">
                            <option>Cause accident</option>
                            <option>Parking violation</option>
                            <option>No sticker displayed</option>
                            <option>Not wearing seat belt or helmet</option>
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="qrcode_id" value="2">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="submit" value="submit">
                    </div>
                </div>
            </form> 
        </div>
    </div>
    <!-- /DIV MAIN CLASS-->
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->