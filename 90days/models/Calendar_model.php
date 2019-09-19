<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents($contactid)
	{
		
	$sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? AND `description`='$contactid' ORDER BY events.start ASC";
	return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();

	}

/*Create new events */

	Public function addEvent()
	{

	$sql = "INSERT INTO events (title,events.start,events.end,description, color) VALUES (?,?,?,?,?)";
	$this->db->query($sql, array($_POST['title'], $_POST['start'],$_POST['end'], $_POST['description'], $_POST['color']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function updateEvent()
	{

	$sql = "UPDATE events SET title = ?, description = ?, color = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent()
	{

	$sql = "DELETE FROM events WHERE id = ?";
	$this->db->query($sql, array($_GET['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()
	{
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE events SET  events.start = ? ,events.end = ?  WHERE id = ?";
			$this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;


	}

/*   login data   */

    function checklogin($email,$password)
    {
        $query=$this->db->query("SELECT * FROM `login` WHERE `username`= '$email' AND `password`= '$password' ");
        return $query->num_rows();
    }
    function getcounttooltip($email,$password)
    {
        $query=$this->db->query("SELECT * FROM `login` WHERE `username`= '$email' AND `password`= '$password' ");
        return $query->result();
    }

/*   up data   */
    function getupdate($abc,$abc1,$contactid)
    {
        $this->db->query("UPDATE `login` SET `start`='$abc',`end`='$abc1',`active`='1' WHERE `id`='$contactid'");
    }
    function ftimeupdate($contactid)
    {
        $this->db->query("UPDATE `login` SET `ftime`='1' WHERE `id`='$contactid'");
    }
    function updateltime($contactid)
    {
        $this->db->query("UPDATE `login` SET `ltime`='1' WHERE `id`='$contactid'");
    }
    
    function getadmininfo()
    {
        $query=$this->db->query("SELECT * FROM `admin-data`");
        return $query->result();
    }
    
    function getdatedata($contactid)
    {
        $query=$this->db->query("SELECT * FROM `login` WHERE `id`='$contactid'");
        return $query->result();
    }
    function setalldata($contactid,$row,$abc)
    {
        $new_name = $this->db->escape_str($row);
        $this->db->query("INSERT INTO `infodata`(`id`, `userid`, `ans`,`qid`) VALUES ('','$contactid','$new_name','$abc')");
    }
    function setcountper($contactid,$row,$abc)
    {
        $new_name = $this->db->escape_str($row);
        $this->db->query("INSERT INTO `infodata`(`id`, `userid`, `ans`,`qid`) VALUES ('','$contactid','$new_name','$abc')");
    }
    function setcountper1($contactid,$row,$abc)
    {
        $new_name = $this->db->escape_str($row);
        $this->db->query("UPDATE `infodata` SET `ans`='$new_name' WHERE `userid`='$contactid' AND `qid`='$abc' ");
    }
    function getcountper($contactid,$id)
    {
        $query=$this->db->query("SELECT * FROM `infodata` WHERE `userid`='$contactid' AND `qid`='$id'");
        return $query->num_rows();
    }
    function mycountdata($contactid)
    {
        $query=$this->db->query("SELECT * FROM `infodata` WHERE `userid`='$contactid' ");
        return $query->num_rows();
    }
    function myshowdata($contactid)
    {
        $query=$this->db->query("SELECT * FROM `infodata` WHERE `userid`='$contactid' ");
        return $query->result();
    }
    function deletefile($contactid)
    {
        $this->db->query("DELETE FROM `infodata` WHERE `userid`='$contactid' ");
    }
    function getandinfo($contactid)
    {
        $query=$this->db->query("SELECT * FROM `infodata` WHERE `userid`='$contactid'");
        return $query->result();
    }
}