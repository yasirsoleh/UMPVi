<!-- Page contains the form which students can fill in to get the approval to get the vehicle sticker -->
<?php

?>
<!-- HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>
<!-- /HEADER-->

<body>
    <div class="row w-100">
        <!-- SIDENAV-->
        <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavUser.php'); ?>
        <!-- /SIDENAV-->
        <!-- DIV MAIN CLASS-->
        <div class="col-10 p-2">
            <form action="formregistered.php" method="post">
                <div class="">
                    <div class="">
                        <h1 class=""><i class="fas fa-user"></i><span> Sticker Registration Form</span></h1>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group row">
                                    <label for="userName" class="col-3 col-form-label">Name</label>
                                    <div class="col-9">
                                        <input id="inputUserName" type="text" name="inputUserName" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="plateNum" class="col-3 col-form-label">Vehicle Plate</label>
                                    <div class="col-9">
                                        <input id="inputPlateNum" type="text" name="inputPlateNum" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="inputVehicleGrant" class="col-form-label">Vehicle Grant</label>
                                    </div>
                                    <div class="col-6 row">
                                        <div class="pt-3 form outline mt-0 col-10">
                                            <p id="no-photo">No Photo Selected</p>
                                            <img style="width:150px;" id="grant-preview" class="img-fluid" alt="">
                                            <input type="file" accept="image/*" onchange="loadFile(event)">
                                            <input type="text" name="inputVehicleGrant" id="inputVehicleGrant" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input type="hidden" name="inputUserId" value="<?php echo $_SESSION['user_id'] ?>">
                                        <input type="text" name="approveStatus" value="not-approved" hidden>
                                        <button type="submit" name="submit" value="submit" class="btn-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--SCRIPTS-->
    <script src="jquery-3.5.1.js"></script>
    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                //Preview
                var output = document.getElementById('grant-preview');
                document.getElementById('no-photo').innerHTML = "";
                output.src = reader.result;
                //Pipe base64 to database
                var imageData = document.getElementById('inputVehicleGrant');
                imageData.value = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <!--/SCRIPTS-->
    </div>
    <!-- /DIV MAIN CLASS-->
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->