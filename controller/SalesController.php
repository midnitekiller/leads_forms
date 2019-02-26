<?php
session_start();
include '../model/Database.php';
include '../model/SalesClass.php';

$Sales_db = new Sales();

switch ($_POST['action']) {
    case 'Add Sales':
        if($Sales_db->addSales($_POST)){
            echo 'true';
        }else{
            echo 'false';
        }
    break;
    case 'Get Sales By ID':
        $result = $Sales_db->getSalesInfo($_POST['sales_ID']);
        echo $result;
    break;
    case 'Edit Sales':
        $result = $Sales_db->checkSalesUpdate($_POST);
          if($result == true){
            $Sales_db->editSalesByID($_POST);
             echo 'sucess';
        }else{
          echo 'false';
        }
    break;
    case 'Remove Sales':
        $Sales_db->deleteSalesByID($_POST['sales_ID']);
        echo 'true';
    break;
} 
?>