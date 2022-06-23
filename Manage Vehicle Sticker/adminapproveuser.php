<?php
include($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/connect.php');
if (isset($_POST['submit'])) {
    foreach ($_POST['toupdate'] as $update_id) {
        $query = "UPDATE sticker SET sticker_approve='approved' where sticker_userid='$update_id'";
        mysqli_query($conn, $query) or die("Error querying database");
    };
    echo 'Approval Successful';
}
if (isset($_POST['search'])) {
    $search = $_POST['searchquery'];
    $query = "SELECT * FROM sticker where sticker_name='$search'" ;
    $result = mysqli_query($conn, $query) or die("Error query select all from sticker");
}else{
    $query = "SELECT * FROM sticker where sticker_approve='not-approved'";
    $result = mysqli_query($conn, $query) or die("Error query select all from sticker");
}



?>
<!-- HEADER/SIDENAV/NAVBAR -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>

<body>
    <div class="row w-100">
        <!-- SIDENAV-->
        <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavAdmin.php'); ?>
        <!-- /SIDENAV-->
        <!-- DIV MAIN CLASS-->
        <div class="col-10 p-2">
            <div class="container-fluid">
            <div><form action="" method="post">
            Search <input type="text" name="searchquery">
            <button type="submit" name="search">Search</button></form>
            </div>
                <table class="table">
                    <thead>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Plate Num</th>
                    </thead>
                    <form action="" method="post">
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><input type="checkbox" value="<?= $row['sticker_userid']; ?>" name="toupdate[]"> <?= $row['sticker_userid'] ?></td>
                                    <td><?= $row['sticker_name'] ?></td>
                                    <td><?= $row['sticker_platenum'] ?></td>
                                </tr>
                                </tr>
                            <?php
                            } ?>
                            <tr>
                                <td><input type="submit" name="submit" value="Update"></td>
                            </tr>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->