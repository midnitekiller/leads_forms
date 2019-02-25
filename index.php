<!DOCTYPE html>
<html>
<body>

<?php

        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "qwe!@#123";
        $dbname = "leadsDB";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = mysqli_query($conn, $sql);
        $leads = $result->fetch_assoc();




 <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title-table">
                <label>LEADS LISTS</label>
                <a class="buttonsp" id="addleads" name="action" value="" type="submit"><i class="fa fa-plus"></i> Add New Leads</a>
                <a class="buttonsp" id="addsales" name="action" value="" type="submit"><i class="fa fa-plus"></i> Add New Sales</a>
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
<button id="btnaddsales" class="material-button material-button-toggle" title="Add Sales"><span class="fa fa-plus" aria-hidden="true"></span></button>
<script>

 $(document).ready(function(){
    $('#addleads').on('click',function(){
        window.location.href='addrooms.php';
    });
    $('#btnaddsa;es').on('click',function(){
        window.location.href='addrooms.php';
    });
 });


$(function () {
    $("#RoomsListTable").DataTable({
        "iDisplayLength": 15,
        "order": [[ 0,"desc"]]
    });
});
</script>

?> 

</body>
</html>