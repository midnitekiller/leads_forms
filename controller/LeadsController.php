<?php
session_start();
include '../model/Database.php';
include '../model/LeadsClass.php';

$Leads_db = new Leads();

switch ($_POST['action']) {
    case 'Add Leads':
        if($Leads_db->addLeads($_POST)){
            echo 'true';
        }else{
            echo 'false';
        }
    break;
    case 'Get Leads By ID':
        $result = $Leads_db->getLeadsInfo($_POST['leads_ID']);
        echo $result;
    break;
    case 'Edit Leads':
        $result = $Leads_db->checkLeadsUpdate($_POST);
          if($result == true){
            $Leads_db->editLeadsByID($_POST);
             echo 'sucess';
        }else{
          echo 'false';
        }
    break;
    case 'Remove Leads':
        $Leads_db->deleteLeadsByID($_POST['leads_ID']);
        echo 'true';
    break;
} 
?>