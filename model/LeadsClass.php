<?php
/**
 * Developed By: Ranz Daren Castillano
 */

class Leads extends Database{
    	
	function addLeads($data) {
        extract($data);
        $created = date('Y-m-d H:i:s');
        $dbconn = $this->dbConn();
        $stmt = $dbconn->prepare("INSERT INTO leads (leads_lname, leads_fname, leads_position, leads_hname, leads_cnumber, leads_eadd, leads_dreg)VALUES(:leads_ID, :leads_lname, :leads_fname, :leads_position, :leads_hname, :leads_cnumber, :leads_eadd, :leads_dreg);");
        $stmt->bindParam(':leads_lname',$data['leads_lname']);
        $stmt->bindParam(':leads_fname',$data['leads_fname']);
        $stmt->bindParam(':leads_position',$data['leads_position']);
        $stmt->bindParam(':leads_hname',$data['leads_hname']);
        $stmt->bindParam(':leads_cnumber',$data['leads_cnumber']);
        $stmt->bindParam(':leads_eadd',$data['leads_eadd']);
        $stmt->bindParam(':leads_dreg',$created);
        if($stmt->execute())
        {
          return true;
        }
    }
    
	function getLeads(){
		$dbconn = $this->dbConn();
		$query = "SELECT * FROM leads";
		$stmt = $dbconn->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	function getLeadsInfo($leadid){
		$dbconn = $this->dbConn();
		$query = "SELECT * FROM leads WHERE leads_ID = :leads_ID";
		$stmt = $dbconn->prepare($query);
		$stmt->bindParam(':leads_ID', $leadid);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	

	function deleteLeadsByID($leadid){
        $dbconn = $this->dbconn();
        $sql = "DELETE FROM leads WHERE leads_ID = '".$leadid."'";
         try {
            $stmt = $dbconn->prepare($sql);
            $value = $stmt->execute();
            $dbconn = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $value;
    }


	function editLeadsByID($data) { 
        extract($data);
        $dbconn = $this->dbconn();
        $sql = "UPDATE leads
                SET leads_lname             = '".$data['leads_lname']."',
                    leads_fname             = '".$data['leads_fname']."',
                    leads_position          = '".$data['leads_position']."',
                    leads_hname             = '".$data['leads_hname']."',
                    leads_cnumber           = '".$data['leads_cnumber']."',
                    leads_eadd              = '".$data['leads_eadd']."'
                WHERE leads_ID  = '".$data['leads_ID']."'";
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


    function checkLeadsUpdate($leadid){
        $dbconn = $this->dbConn();
        $query = "SELECT 1 FROM leads WHERE leads_ID = :leadid";
        $stmt = $dbconn->prepare($query);
        $stmt->bindParam(':leadid', $leadid);
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
