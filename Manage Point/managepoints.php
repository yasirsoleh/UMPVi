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
        <h1>Manage Points</h1>
    <?php
        //Connect to the database server.
        $link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

        //Select the database.
        mysqli_select_db($link, "umpvi") or die(mysqli_error());

        //SQL query
        $strSQL = "SELECT * FROM point";

        //Execute the query (the recordset $rs contains the result)
        $rs = mysqli_query($link, $strSQL);

        //Loop the recordset $rs 
        echo "<table border=1>";
        echo "<tr>";
        echo "<td> ID </td>";
        echo "<td> Username </td>";
        echo "<td> Points </td>";
        echo "</tr>";


        while ($row=mysqli_fetch_array($rs)){
        //Write the value of the column FirstName and Address


        echo "<tr>";
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['point']."</td>";
        echo "</tr><br>";

        }
        echo "</table>";
        //Close the database connection
        mysqli_close($link);
        ?>

    </div>
    <!-- /DIV MAIN CLASS-->
</body>
<!-- FOOTER -->
<!-- <?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/UMPVi/Dependencies/footer.php'); ?> -->
<!-- /FOOTER -->