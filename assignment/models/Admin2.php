<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
require(APPPATH."third_party/infusionsoft/isdk.php");
require(APPPATH."third_party/infusionsoft/class.phpmailer.php");

class Admin2 extends CI_Model 
{
	
	/*-------------------------------------------- Admin Login ------------------------------------------*/
	
	function checkAdmin($email, $password)
    {
        $query = $this->db->query("SELECT * FROM `admin` WHERE username = '$email' and password = '$password'");
        return $query->num_rows();
    }
	
	/*--------------------------------------------End of Admin Login ------------------------------------------*/
		
	/*------------------------------------------ Course -------------------------------------*/
	
	public function getCourse()
	{
		return $this->db->query("SELECT * FROM course");
	}
	
	public function addCourse($course)
	{
		$query = $this->db->query("SHOW TABLE STATUS LIKE 'course'");
		foreach ($query->result() as $row)
		{
			$cid = $row->Auto_increment;
		} 
		$user = $cid."_user";
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$submission = $cid."_submission";
		$query1 = $this->db->query("SELECT course FROM course WHERE course = '$course'");
		if($query1->num_rows() < 1)
		{
			mkdir('./uploads/'.$assignment);
			mkdir('./uploads/'.$submission);
			$query2 = $this->db->query("INSERT INTO `course` VALUES ('','$course')");
			$query3 = $this->db->query("CREATE TABLE $record(contactid INT NOT NULL PRIMARY KEY)");
			$query4 = $this->db->query("CREATE TABLE $submission(sid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,contactid INT NOT NULL,aid INT NOT NULL,file VARCHAR(200),subdate DATE NOT NULL)");
			$query5 = $this->db->query("CREATE TABLE $assignment(aid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,file VARCHAR(200),name VARCHAR(200),udate DATE NOT NULL,subdate DATE NOT NULL)");
			$query6 = $this->db->query("CREATE TABLE $user(uid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,contactid INT NOT NULL,name VARCHAR(200),username VARCHAR(200),password VARCHAR(200),phone VARCHAR(200))");
			$error = "Course $course created Successfully...";
			return $error;
		}
		else
		{
			$error = "Course $course Already Exits...";
			return $error;
		}
	}
	
	public function deleteCourse($cid)
	{
		$this->db->query("DELETE FROM `course` WHERE cid = '$cid'");
		return "Course Deleted Successfully";
	}
	
	/*----------------------------------------- End Of Course Tab --------------------------------------------*/
	
	
	/*----------------------------------------- Assignment Tab --------------------------------------------*/
	
	public function uploadAssignment($ufile,$fname,$udate,$subdate,$cid)
	{
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$user = $cid."_user";
		
		$update = date_format(date_create($udate), 'd-m-Y');
		$ldate = date_format(date_create($subdate), 'd-m-Y');
		$query = $this->db->query("SHOW TABLE STATUS LIKE '$assignment'");
		foreach ($query->result() as $row)
		{
			$aid = $row->Auto_increment;
		}
		$aid1 = "a".$aid;
		$query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$udate','$subdate')");
		$query = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		
		if($ufile == 'No')
		{
			$filelink = 'No';
		}
		else
		{
			$filelink = '<a href="http://docs.google.com/viewer?url='.base_url().'uploads/'.$assignment.'/'.$ufile.'">View</a>';
		}
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$query3 = $this->db->query("SELECT * FROM `$user`");
			foreach ($query3->result() as $r1)
			{
				$name = $r1->name;
				$email = $r1->username;
				
				$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
				$mail->Port = '26';
				$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
				$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
				$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
				$mail->SMTPSecure = 'SSL/TLS';
				try 
				{
					$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
					//$mail->AddAddress('salman@arfeenkhan.com', '');
					$mail->AddAddress($r1->username, '');
					//$mail->AddAddress('harsh@arfeenkhan.com', '');
					//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
					$mail->Subject = 'New Assignment Uploaded';
					$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Assignment</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">New Assignment Uploaded</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment No: </font>'.$aid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">DATE: </font> '.$update.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Last Date: </font>'.$ldate.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment File : </font>'.$filelink.'</h3>
</div>
</body>
</html>'
;

					$mail->IsHTML(true);
					$mail->Send();
				} 
				catch (phpmailerException $e) 
				{
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} 
				catch (Exception $e) 
				{
					echo $e->getMessage(); //Boring error messages from anything else!
				}
			}
			
			$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
				$mail->Port = '26';
				$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
				$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
				$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
				$mail->SMTPSecure = 'SSL/TLS';
				try 
				{
					$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
					$mail->AddAddress('salman@arfeenkhan.com', '');
					//$mail->AddAddress('avisingh.singh2011@gmail.com', '');
					//$mail->AddAddress($r1->username, '');
					$mail->AddAddress('harsh@arfeenkhan.com', '');
					//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
					$mail->Subject = 'New Assignment Uploaded';
					$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Assignment</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">New Assignment Uploaded</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment No: </font>'.$aid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">DATE: </font> '.$update.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Last Date: </font>'.$ldate.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment File : </font>'.$filelink.'</h3>
</div>
</body>
</html>'
;

					$mail->IsHTML(true);
					$mail->Send();
				} 
				catch (phpmailerException $e) 
				{
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} 
				catch (Exception $e) 
				{
					echo $e->getMessage(); //Boring error messages from anything else!
				}
			$result = "Assignment Uploaded Successfully";
			return $result;
		}
	}
	
	public function editAssignment($ufile,$fname,$udate,$subdate,$grp)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$aid = str_replace("_","",(strstr($grp,'_')));
		
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$user = $cid."_user";
		
		$update = date_format(date_create($udate), 'd-m-Y');
		$ldate = date_format(date_create($subdate), 'd-m-Y');
		
		$query = $this->db->query("update `$assignment` set name = '$fname',file = '$ufile',subdate = '$subdate' where aid = '$aid'");
		
		if($ufile == 'No')
		{
			$filelink = 'No';
		}
		else
		{
			$filelink = '<a href="http://docs.google.com/viewer?url='.base_url().'uploads/'.$assignment.'/'.$ufile.'">View</a>';
		}
		
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$query3 = $this->db->query("SELECT * FROM `$user`");
			foreach ($query3->result() as $r1)
			{
				$name = $r1->name;
				$email = $r1->username;
				
				$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
				$mail->IsSMTP(); // telling the class to use SMTP
				$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
				$mail->Port = '26';
				$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
				$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
				$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
				$mail->SMTPSecure = 'SSL/TLS';
				try 
				{
					$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
					$mail->AddAddress('salman@arfeenkhan.com', '');
					//$mail->AddAddress('avisingh.singh2011@gmail.com', '');
					$mail->AddAddress($r1->username, '');
					$mail->AddAddress('harsh@arfeenkhan.com', '');
					//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
					$mail->Subject = 'Assignment Updated';
					$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Assignment</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">Assignment Updated</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment No: </font>'.$aid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">DATE: </font> '.$update.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Last Date: </font>'.$ldate.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment File : </font>'.$filelink.'</h3>
</div>
</body>
</html>'
;

					$mail->IsHTML(true);
					$mail->Send();
				} 
				catch (phpmailerException $e) 
				{
					echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} 
				catch (Exception $e) 
				{
					echo $e->getMessage(); //Boring error messages from anything else!
				}
			}
			$result = "Assignment Updated Successfully";
			return $result;
		}
	}
	
	/*----------------------------------------- End of Assignment Tab --------------------------------------------*/
	
	/*----------------------------------------- Records Tab --------------------------------------------*/
	
	public function getUser($cid)
	{
		$user = $cid."_user";
		return $this->db->query("SELECT * FROM `$user`");
	}
	
	public function getUserDtl($grp)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$uid = str_replace("_","",(strstr($grp,'_')));
		$user = $cid."_user";
		return $this->db->query("SELECT * FROM `$user` where uid = '$uid'");
	}

	public function editUser($grp,$name,$username,$password,$phone)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$uid = str_replace("_","",(strstr($grp,'_')));
		$user = $cid."_user";
		$q = $this->db->query("UPDATE `$user` SET `name` = '$name',username = '$username',password = '$password',phone = '$phone' WHERE `uid` = '$uid'");
		if($q)
		{
			$error = "User detail updated successfully.";
		}
		else
		{
			$error = "Problem occur while updating user.";
		}
		return $error;
	}
	
	
	
	public function getAssignment($cid)
	{
		$assignment = $cid."_assignment";
		return $this->db->query("SELECT * FROM `$assignment`");
	}
	
	public function getAssignmentDtl($grp)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$aid = str_replace("_","",(strstr($grp,'_')));
		$assignment = $cid."_assignment";
		return $this->db->query("SELECT * FROM `$assignment` where aid = '$aid'");
	}
	
	
	
	public function getSubmission($cid)
	{
		$submission = $cid."_submission";
		return $this->db->query("SELECT * FROM `$submission`");
	}
	
	public function deleteUser($grp)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$contactid = str_replace("_","",(strstr($grp,'_')));
		$user = $cid."_user";
		$record = $cid."_record";
		$this->db->query("DELETE FROM `$record` WHERE contactid = '$contactid'");
		$this->db->query("DELETE FROM `$user` WHERE contactid = '$contactid'");
		return "User Deleted Successfully";
	}
	
	public function deleteAssignment($grp)
	{
		$cid = substr($grp, 0, strpos($grp, '_'));
		$aid = str_replace("_","",(strstr($grp,'_')));
		$submission = $cid."_submission";
		$record = $cid."_record";
		$assignment = $cid."_assignment";
		$aid1 = "a".$aid;
		$this->db->query("ALTER TABLE `$record` DROP `$aid1`");
		$this->db->query("DELETE FROM `$submission` WHERE aid = '$aid'");
		$this->db->query("DELETE FROM `$assignment` WHERE aid = '$aid'");
		return "Assignment Deleted Successfully";
	}
	
	/*----------------------------------------- End of Records Tab --------------------------------------------*/
	
	/*--------------------------------------------- User Add ----------------------------------------*/
	
	public function addUser($cid,$contactid)
	{
		$query = $this->db->query("SELECT * FROM course where cid = '$cid'");
		foreach ($query->result() as $row)
		{
			$course = $row->course;
		}
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$returnFields = array('FirstName','Email','Password','Phone1');
			$query = array('Id' => $contactid);
			$contacts = $app->dsQuery("Contact",10,0,$query,$returnFields);
			$arr=$contacts[0];
		}
		
		$name = $arr['FirstName'];
		$email = $arr['Email'];
		if(!empty($arr['Password']))
		{
			$password = $arr['Password'];
		}
		else
		{
			$password = $name."123";
		}
		if(!empty($arr['Phone1']))
		{
			$phone = str_replace('-','',str_replace(') ','',str_replace('(','',$arr['Phone1'])));
		}
		else
		{
			$phone = '1100000000';
		}
		$user = $cid."_user";
		$record = $cid."_record";
		$this->db->query("INSERT INTO `$user` VALUES ('','$contactid','$name','$email','$password','$phone')");
		$this->db->query("INSERT INTO $record(contactid) VALUES ('$contactid')");
		
		if ($app->cfgCon("connectionName")) 
		{
			
			$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
			$mail->Port = '26';
			$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
			$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
			$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
			$mail->SMTPSecure = 'SSL/TLS';
			try 
			{
				$mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
				$mail->AddAddress('salman@arfeenkhan.com', '');
				//$mail->AddAddress('avisingh.singh2011@gmail.com', '');
				$mail->AddAddress($email, '');
				$mail->AddAddress('harsh@arfeenkhan.com', '');
				//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
				$mail->Subject = $course.' Course Access';
				$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New User</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">'.$course.' Course Access</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Url: </font>'.base_url().'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">Name : </font> '.$name.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">Username : </font> '.$email.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Password: </font>'.$password.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Contact No: </font>'.$phone.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:18px;text-align:left;margin-bottom:10px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;color:red;">Note: </font> You Can Now Access the assignment from the following url and submit your assignment here.</h3>
</div>
</body>
</html>'
;

				$mail->IsHTML(true);
				$mail->Send();
			} 
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage(); //Boring error messages from anything else!
			}
			$error = "User $email Added to $course Successfully...";
			return $error;
		}
	}
	
	
	/*------------------------------------------ Admin Tab -------------------------------------*/
	public function getAdmin()
	{
		return $this->db->query("SELECT * FROM `admin`");
	}
	
	public function addAdmin($name,$username,$password)
	{
		$query2 = $this->db->query("INSERT INTO `admin` VALUES ('','$name','$username','$password')");
		$error = "Admin $name Added";
		return $error;
	}
	
	public function changePass1($opassword,$password)
	{
		$user = $_SESSION['username'];
		$query = $this->db->query("SELECT * FROM `admin` where `username` = '$user'");
		foreach($query->result() as $r1)
		{
			$old = $r1->password;
		}
		if($old == $opassword)
		{
			$q = $this->db->query("UPDATE `admin` SET `password` = '$password' where `username` = '$user'");
			if($q)
			{
				$error = "Password changed successfully";
			}
			else
			{
				$error = "Problem occur while changing password";
			}
		}
		else
		{
			$error = "Old password does not match";
		}
		return $error;
	}
	
	public function deleteAdmin($id)
	{
		$this->db->query("DELETE FROM `admin` WHERE id = '$id'");
		return "Admin Deleted Successfully";
	}
	/*------------------------------------------ End of Admin Tab -------------------------------------*/

}