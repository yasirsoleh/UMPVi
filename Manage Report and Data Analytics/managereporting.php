<?php
include($_SERVER["DOCUMENT_ROOT"] .'/UMPVi/Dependencies/connect.php');
$accident = "select count(violation_details) from violation where violation_details='Cause accident'";
$parking = "select count(violation_details) from violation where violation_details='Parking violation'";
$nosticker = "select count(violation_details) from violation where violation_details='No sticker displayed' ";
$seatorhelmet = "select count(violation_details) from violation where violation_details='Not wearking seat belt or helmet' ";
$violationStudent = "select count(user_role) from violation left join user on violation.user_id=user.user_id where user_role='student'";
$violationStaff = "select count(user_role) from violation left join user on violation.user_id=user.user_id where user_role='staff'";
$violationAdmin = "select count(user_role) from violation left join user on violation.user_id=user.user_id where user_role='admin'";
$approved = "select count(sticker_approve) from sticker where sticker_approve='approved'";
$notapproved = "select count(sticker_approve) from sticker where sticker_approve='not-approved'";
$freesticker = "select count(point_freeSticker) from point where point_freeSticker='yes'";

$resultAccident = mysqli_query($conn, $accident);
$resultParking = mysqli_query($conn, $parking);
$resultNoSticker = mysqli_query($conn, $nosticker);
$resultSeatOrHelmet = mysqli_query($conn, $seatorhelmet);
$resultStudent = mysqli_query($conn, $violationStudent);
$resultStaff = mysqli_query($conn, $violationStaff);
$resultAdmin = mysqli_query($conn, $violationAdmin);
$resultApproved = mysqli_query($conn, $approved);
$resultNotApproved = mysqli_query($conn, $notapproved);
$resultFreeSticker = mysqli_query($conn, $freesticker);

$dataAccident=0;
$dataParking=0;
$dataNoSticker=0;
$dataSeatOrHelmet=0;
$dataStudent=0;
$dataStaff=0;
$dataAdmin=0;
$dataApproved=0;
$dataNotApproved=0;
$dataFreeSticker=0;

while ($row=mysqli_fetch_array($resultAccident)){
    $dataAccident = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultAccident)){
    $dataParking = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultNoSticker)){
    $dataNoSticker = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultNoSticker)){
    $dataSeatOrHelmet = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultStudent)){
    $dataStudent = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultStaff)){
    $dataStaff = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultAdmin)){
    $dataAdmin = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultApproved)){
    $dataApproved = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultNotApproved)){
    $dataNotApproved = (int)$row['0'];
}
while ($row=mysqli_fetch_array($resultFreeSticker)){
    $dataFreeSticker = (int)$row['0'];
}
?>
<!-- HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/header.php'); ?>
<!-- /HEADER-->

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>  
    <div class="row w-100">
        <!-- SIDENAV-->
        <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/sidenavAdmin.php'); ?>
        <!-- /SIDENAV-->
        <!-- DIV MAIN CLASS-->
        <div class="col-10 p-2">
            <h1>Sticker Summary</h1>
            <div class="row">
                <div class="col-lg">
                    <h2>Application Approval</h2>
                    <table class="table" style="border:none;font-size:30px">
                        <tbody>
                            <tr>
                                <td>Approved</td>
                                <th><?php echo $dataApproved ?></th>
                            </tr>  
                            <tr>
                                <td>Not Approved</td>
                                <th><?php echo $dataNotApproved ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg">
                    <h2>Qualified for Free Sticker</h2>
                    <h1 style="font-size:100px;" class="text-center"><?php echo $dataFreeSticker ?></h1>
                </div>
            </div>
            <h1>Violation Summary</h1>
            <div class="row">
                <div class="col-lg">
                    <h2>Type of Violation</h2>
                    <canvas id="violationsTypeChart"></canvas>
                </div>
                <div class="col-lg">
                    <h2>Role</h2>
                    <canvas id="violationsRoleChart"></canvas>
                </div>
            </div>

        </div>
        <!-- /DIV MAIN CLASS-->
    </div>

    <script>
        var ctx = document.getElementById('violationsTypeChart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Cause accident', 'Parking violation', 'No sticker displayed', 'Not wearing seat belt or helmet'],
                datasets: [{
                    data: ["<?php echo $dataAccident; ?>", "<?php echo $dataParking; ?>", "<?php echo $dataNoSticker; ?>", "<?php echo $dataSeatOrHelmet; ?>"],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
        
        var ctx1 = document.getElementById('violationsRoleChart');
        var myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Student', 'Staff', 'Admin'],
                datasets: [{
                    data: ["<?php echo $dataStudent; ?>", "<?php echo $dataStaff; ?>", "<?php echo $dataAdmin; ?>"],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
    
</body>
<!-- FOOTER -->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi//Dependencies/footer.php'); ?>
<!-- /FOOTER -->