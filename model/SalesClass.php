<?php
/**
 * Developed By: Ranz Daren Castillano
 */
class Sales extends Database{
    	
	function addSales($data) {
        extract($data);
        $created = date('Y-m-d H:i:s');
        $status = "active"
        $dbconn = $this->dbConn();
        $stmt = $dbconn->prepare("INSERT INTO sales (sales_ID, sales_lname, sales_fname, sales_position, sales_cnumber, sales_eadd, sales_status sales_dreg)VALUES(:sales_ID, :sales_lname, :sales_fname, :sales_position, :sales_cnumber, :sales_eadd, :sales_status :sales_dreg);");
        $stmt->bindParam(':sales_ID',$data['sales_ID']);
        $stmt->bindParam(':sales_lname',$data['sales_lname']);
        $stmt->bindParam(':sales_fname',$data['sales_fname']);
        $stmt->bindParam(':sales_position',$data['sales_position']);
        $stmt->bindParam(':sales_cnumber',$data['sales_cnumber']);
        $stmt->bindParam(':sales_eadd',$data['sales_eadd']);
        $stmt->bindParam(':sales_status',$status);
        $stmt->bindParam(':sales_dreg',$created);
        if($stmt->execute())
        {
          return true;
        }
    }
    
	function getSales(){
		$dbconn = $this->dbConn();
		$query = "SELECT * FROM sales";
		$stmt = $dbconn->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	function getSalesInfo($salesid){
		$dbconn = $this->dbConn();
		$query = "SELECT * FROM sales WHERE sales_ID = :sales_ID";
		$stmt = $dbconn->prepare($query);
		$stmt->bindParam(':sales_ID', $salesid);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	

	function deleteSalesByID($salesid){
        $dbconn = $this->dbconn();
        $sql = "DELETE FROM sales WHERE sales_ID = '".$salesid."'";
         try {
            $stmt = $dbconn->prepare($sql);
            $value = $stmt->execute();
            $dbconn = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $value;
    }


	function editSalesByID($data) { 
        extract($data);
        $dbconn = $this->dbconn();
        $sql = "UPDATE sales
                SET sales_lname             = '".$data['sales_lname']."',
                    sales_fname             = '".$data['sales_fname']."',
                    sales_position          = '".$data['sales_position']."',
                    sales_hname             = '".$data['sales_hname']."',
                    sales_cnumber           = '".$data['sales_cnumber']."',
                    sales_eadd              = '".$data['sales_eadd']."'
                WHERE sales_ID  = '".$data['sales_ID']."'";
        $result = false;
        try {
            $stmt = $dbconn->prepare($sql);
            $result = $stmt->execute();
            $dbconn = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }


    function checkSalesUpdate($salesid){
        $dbconn = $this->dbConn();
        $query = "SELECT 1 FROM sales WHERE sales_ID = :salesid";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':salesid', $salesid);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result){
            return true;
        }else {
            return false;
        }
    }

	
}
?>