<?php
include($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/connect.php');
$query = "SELECT * FROM sticker INNER JOIN qrcode ON qrcode.sticker_id=sticker.sticker_id";
$result = mysqli_query($conn, $query) or die("Error query select all from sticker");

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
            <h1>Traffic Violation</h1>
            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <th>Sticker ID</th>
                        <th>User Name</th>
                        <th>Plate Num</th>
                    </thead>
                    <form action="" method="post">
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $row['sticker_id'] ?></td>
                                    <td><?= $row['sticker_name'] ?></td>
                                    <td><?= $row['sticker_platenum'] ?></td>
                                </tr>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->