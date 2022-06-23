<!-- Page contains the form which students can fill in to get the approval to get the vehicle sticker -->
<?php

?>
<!-- HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>
<!-- /HEADER-->

<body>
    <script type="text/javascript" src="/UMPVi/Dependencies/qr_code/qrcode.js"></script>
    <script type="text/javascript" src="/UMPVi/Dependencies/qr_code/html5-qrcode.js"></script>
    <div class="row w-100">
        <!-- SIDENAV-->
        <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavAdmin.php'); ?>
        <!-- /SIDENAV-->
        <!-- DIV MAIN CLASS-->
        <div class="col-10 p-2">
            <div class="border text-align" style="width:400px;">
                <img class="mx-auto" style="display: block;height:200px;text-align:center;" src="/UMPVi/Dependencies/logoumpnotext.png">
                <div class="mx-auto" style="display: block;" id="qrcode"></div>
                <h2 class="text-center">STUDENT</h2>
            <div>
        </div>
        <!-- /DIV MAIN CLASS-->
    </div>
    <script type="text/javascript">
        function updateQRCode(text) {

            var element = document.getElementById("qrcode");
            var bodyElement = document.body;
            if(element.lastChild){
                element.replaceChild(showQRCode(text), element.lastChild);
            }
            else{
                element.appendChild(showQRCode(text));
            }
        }
        updateQRCode("1");
    </script>
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?>
<!-- /FOOTER -->