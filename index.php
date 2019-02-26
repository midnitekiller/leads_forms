 <?php
include 'script-foot.php';

$servername = "localhost";
$username = "root";
$password = "qwe!@#123";
$dbname = "leadsDB";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from leads";
$result = $conn->query($sql);


if ($result->num_rows >0) {

 while($row[] = $result->fetch_assoc()) {

// $tem = $row;

// $json = json_encode($tem,  JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
echo "<tr><td>".$row["leads_ID"]."</td><td>".$row["leads_fname"]." ".$row["leads_lname"]."</td><td>".$row["leads_position"]."</td><td>".$row["leads_hname"]."</td><td>".$row["leads_cnumber"]."</td><td>".$row["leads_eadd"]."</td><td>".$row["leads_dreg"]."</td></tr>";
 }
 echo "</table>";
} else {
 echo "No Results Found.";
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<body>
 <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title-table">
                <label>LEADS LISTS</label>
		<link rel="stylesheet" type="text/css" href="assets/main.css" media="all">
		<a class="buttonsp" onclick="window.location.href = 'leads/leads.html';">Add Leads</a>
		<a class="buttonsp" onclick="window.location.href = 'sales/sales.html';">Add Sales</a>
            </div>
            <div class="ibox-content"> 
                <table id="#LeadsListTable" class="table table-bordered dynamicDataTables">
                    <thead>
                        <tr> 
                            <th class="text-center">Hotel Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Position</th>
                            <th class="text-center">Contact Number</th>
                            <th class="text-center">Email Address</th>
                            <th class="text-center">Sales Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $values => $leads_lists): ?>
                        <tr class="lists-item">
                            <td class="text-center"><?php echo $leads_lists['leads_hname'];?></td>
                            <td class="text-center"><?php echo $leads_lists['leads_lname'];?></td>
                            <td class="text-center"><?php echo $leads_lists['leads_fname'];?></td>
                            <td class="text-center"><?php echo $leads_lists['leads_position'];?></td>
                            <td class="text-center"><?php echo $leads_lists['leads_cnumber'];?></td>
                            <td class="text-center"><?php echo $leads_lists['leads_eadd'];?></td>
			    <td class="text-center"><?php echo $leads_lists['leads_dreg'];?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"  src="assets/main.js"></script>

<?php include'script-foot.php' ?>
<script>
$(function () {
    $("#LeadsListTable").DataTable({
        "iDisplayLength": 15,
        "order": [[ 0,"desc"]]
    });
});
</script>


</body>
</html>

