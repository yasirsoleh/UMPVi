<!-- Page to insert registration form data to be approved by the admin and to show the user that the info is being approved -->
<?php


include($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/connect.php');

if (isset($_POST['submit'])) {

    extract($_POST);
    $query = "INSERT INTO sticker VALUES('0','$inputUserName','$inputUserId','$inputPlateNum','$inputVehicleGrant',now(),'$approveStatus')";
    if (mysqli_query($conn, $query)) {
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    $location = "location.href=''";
    echo "<h1>Your info is being verified</h1>
    <button onclick=" . $location . ">View Sticker</button>";
} else {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT sticker_approve, sticker_platenum FROM sticker WHERE sticker_userid='$user_id' and sticker_approve='approved'";
    $result = mysqli_query($conn, $query);

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

                <?php
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <h2>Your registration was successful</h2>
                        <button class="btn-warning" onclick="location.href='/UMPVi/Manage QR Code/generateqrcode.php'">Qr Code</button>
                        <h3>Your Sticker</h3>

                        <div id="elem">
                            <div class="sticker" style="background-color: lightseagreen;">
                                <center>
                                    <table>
                                        <tr>
                                            <td>
                                            <center>
                                                <img style="text-align:center;width:100px;" src="/UMPVi/Dependencies/logoumpnotext.png" alt="logoump">
                                            <center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <h1>Universiti Malaysia Pahang</h1>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <center>
                                                    <div class="whitebox">
                                                        <h2><?php echo $row['sticker_platenum']; ?></h2>
                                                    </div>
                                                    <h1>Vehicle Sticker</h1>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <form name="QRform" id="QRform">
                                                <td><input type="" name="textField" rows="8" cols="70" onkeyup='updateQRCode(this.value)' onclick="this.focus();this.select();" value="<?= $row['sticker_id'] ?>" hidden>
                                                    <center><div style="" id="qrcode"></div></center>
                                                </td>
                                            </form>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                        </div>
                        <div>
                            <button class=" btn-lg btn-dark my-2" onclick="PrintElem()">Print</button>
                        </div>
            </div>
        <?php
                    }
                } else {
        ?>
        <div class="main">
            <h1>Your form is either being validated or is absent</h1>
            <h4>Please take your time to fill the form if you havent already</h4>
            <button onclick="location.href='managevehiclesticker.php'">Click me to register </button>
            <button onclick="location.href='formregistered.php'">Click me to go to home page </button>

        </div>



<?php

                }
            }
?>
<script>
    function PrintElem() {
        var mywindow = window.open('', 'PRINT', 'height=600,width=400   ');
        mywindow.document.write('<html><head><title>' + document.title + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById("elem").innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
<script type="text/javascript">
    function updateQRCode(text) {

        var element = document.getElementById("qrcode");

        var bodyElement = document.body;
        if (element.lastChild)
            element.replaceChild(showQRCode(text), element.lastChild);
        else
            element.appendChild(showQRCode(text));

    }

    updateQRCode('www.tutorialspoint.com');
</script>







<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->