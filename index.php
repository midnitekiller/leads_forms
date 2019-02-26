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
                        <?php foreach ($leads as $values => $leads_lists): ?>
                        <tr class="lists-item">
                            <td class="text-center"><?php echo $leads_lists['hotel_name'];?></td>
                            <td class="text-center"><?php echo $leads_lists['last_name'];?></td>
                            <td class="text-center"><?php echo $leads_lists['first_name'];?></td>
                            <td class="text-center"><?php echo $leads_lists['position'];?></td>
                            <td class="text-center"><?php echo $leads_lists['contact_number'];?></td>
                            <td class="text-center"><?php echo $leads_lists['email_add'];?></td>
                            <td class="text-center"><?php echo $leads_lists['sales_assigned'];?></td>
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
