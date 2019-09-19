<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
require(APPPATH."third_party/infusionsoft/isdk.php");
require(APPPATH."third_party/infusionsoft/class.phpmailer.php");

class User2 extends CI_Model 
{
	
	
	public function getCourse()
	{
		return $this->db->query("SELECT * FROM course");
	}
	
	public function getSolutions()
	{
		$contactid = $_SESSION['contactid'];
		$submission = $_SESSION['submission'];
		return $this->db->query("SELECT * FROM `$submission` WHERE `contactid` = '$contactid'");
	}
	
	public function getProfile()
	{
		$contactid = $_SESSION['contactid'];
		$cid = $_SESSION['courseid'];
		$user = $cid."_user";
		return $this->db->query("SELECT * FROM $user WHERE contactid='$contactid'");
	}
	
	public function getAssignmentDetail($cid)
	{
		$course = $cid;
		
		$query = $this->db->query("SELECT course FROM course where cid = '$course'");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
               $lname = $row->course;
			}
			return $lname;
		}
		else
		{
			$result = '';
			return $result;
		}
	}
	
	function getUser($email, $password)
         {
               
		    $user = $cid."_user";
                    $query = $this->db->query("SELECT * FROM $user WHERE username = '$email' and password = '$password'");
                    return $query->num_rows();
         }
       
       /* This is for login smb newgetuser */ 	
	function newgetUser($username, $password)
           {
               
		    $user="2_user";
                    $query = $this->db->query("SELECT * FROM  $user WHERE username = '$username' and password = '$password'");
                    if($query->num_rows()){
                                             return $query->row()->contactid;
                                          }else{
                                             return FALSE;   
                                               }
                  
          }
	
	function get_contactid($email, $password, $cid)
    {
		$user = $cid."_user";
                $query = $this->db->query("SELECT contactid FROM $user WHERE username = '$email' and password = '$password'");
             foreach ($query->result() as $row)
		{
             $contactid = $row->contactid;
		}
		return $contactid;
    }
	function change_pass($username,$opassword,$password)
	{
		$user = $_SESSION['courseid']."_user";
		$query = $this->db->query("SELECT * FROM `$user` where `username` = '$username'");
		foreach($query->result() as $r1)
		{
			$old = $r1->password;
		}
		if($old == $opassword)
		{
			$q = $this->db->query("UPDATE `$user` SET `password` = '$password' where `username` = '$username'");
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
	function forgot_pass($email,$cid)
    {
		$user = $cid."_user";
		$query = $this->db->query("SELECT * FROM $user WHERE username = '$email'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $r1)
			{
				$password = $r1->password;
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
				//$mail->AddAddress('avisingh.singh2011@gmail.com', '');
				$mail->AddAddress('salman@arfeenkhan.com', '');
				//$mail->AddAddress($r1->username, '');
				//$mail->AddAddress('harsh@arfeenkhan.com', '');
				//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
				$mail->Subject = 'Password for '.$_SESSION["course"];
				$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Password for '.$_SESSION["course"].'</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">'.$_SESSION["course"].'</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Url: </font>'.base_url().'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">Username : </font> '.$email.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Password: </font>'.$password.'</h3>
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
			$error = 'Your password has been sent to your registerd email id.<br><a href = "'.base_url().'user/login/'.$cid.'">Back to Login Page</a>';
		}
		else
		{
			$error = "No such email-id is register with us.";
		}
		return $error;
    }
	
	public function getAssignment()
	{
		$fields = array();
		$myval = array();
		$id = $_SESSION['contactid'];
		$assignment = $_SESSION['assignment'];
		$record = $_SESSION['record'];
		$query = $this->db->list_fields($record);
		foreach($query as $row)
		{
			if($row =='contactid'){}
			else
			$fields[] = $row;
		}
		//var_dump($fields);
		foreach ($fields as $f) 
		{ 
			$f1 = str_replace("a","",$f);
			$query1 = $this->db->query("SELECT * FROM `$assignment` WHERE `aid` = $f1");
			foreach ($query1->result() as $r1)
			{
				$aid = $r1->aid;
				$name = $r1->name;
				$file = $r1->file;
				$update = $r1->udate;
				$subdate = $r1->subdate;
				/*$now = time(); // or your date as well
				$your_date = strtotime($r1->subdate);
				$datediff = $your_date - $now;
				$pending = floor($datediff/(60*60*24));*/
				$query2 = $this->db->query("SELECT * FROM `$record` WHERE `contactid` = $id");
				foreach($query2->result() as $r2)
				{
					$status = $r2->$f;
					$myval[] = array('aid'=>$aid,'file'=>$file,'name'=>$name,'update'=>$update,'subdate'=>$subdate,'status'=>$status); 
				}
			}
			
		}
		return $myval;
	}
	public function checkSubmit($aid,$contactid)
	{
		$submission = $_SESSION['submission'];
		$query = $this->db->query("SELECT * FROM `$submission` where `contactid` = '$contactid' and `aid` = '$aid'");
		return $query->num_rows();
	}
	
	public function uploadSubmit($aid,$filename)
	{
		$contactid = $_SESSION['contactid'];
		$assignment = $_SESSION['assignment'];
		$record = $_SESSION['record'];
		$submission = $_SESSION['submission'];
		$user = $_SESSION['user'];
		$update = date('Y:m:d');
		
		$aid1 = "a".$aid;
		
		$query1 = $this->db->query("INSERT INTO `$submission` VALUES ('','$contactid','$aid','$filename','$update')");
		$query2 = $this->db->query("update `$record` set `$aid1` = '$contactid' WHERE `contactid` = '$contactid'");
		
			
		$query3 = $this->db->query("SELECT * FROM `$user` where contactid = '$contactid'");
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
				//$mail->AddAddress($r1->username, '');
				//$mail->AddAddress('harsh@arfeenkhan.com', '');
				//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
				$mail->Subject = 'Assignment '.$aid.' Solution Uploaded ';
				$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment '.$aid.' Solution Uploaded </title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">Thank You</h1>
	<h3 style="font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;padding:5% 15%;"><font style="font-size:20px;font-weight:bold;"></font>Thank you For Submitting the Assignment Solution We have Received Your Solution. We will revert you soon.</h3>
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
		/*-------------------Assignment Submmitted---------------*/
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
			//$mail->AddAddress($r1['username'], '');
			//$mail->AddAddress('harsh@arfeenkhan.com', '');
			//$mail->AddAddress('ajay@arfeenkhan.com', '');
           
			$mail->Subject = $_SESSION['course'].' - Assignment Solution Uploaded';
			$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment Solution Uploaded</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">'.$_SESSION['course'].' - Assignment Solution Uploaded</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment No: </font>'.$aid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Contactid: </font>'.$contactid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">Name: </font> '.$name.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Email: </font>'.$email.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Solution : </font><a href="http://docs.google.com/viewer?url='.base_url().'uploads/'.$submission.'/'.$filename.'">View</a></h3>
</div>
</body>
</html>'
;

			$mail->IsHTML(true);
			$mail->Send();
		} 
		catch (phpmailerException $e) 
		{
			return $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
		catch (Exception $e) 
		{
			return $e->getMessage(); //Boring error messages from anything else!
		}
		$result = "Assignment Solution Submitted successfully";
		return $result;
	}
	
	public function editSubmit($aid,$filename)
	{
		$contactid = $_SESSION['contactid'];
		$assignment = $_SESSION['assignment'];
		$record = $_SESSION['record'];
		$submission = $_SESSION['submission'];
		$user = $_SESSION['user'];
		$update = date('Y:m:d');

		$query2 = $this->db->query("UPDATE `$submission` SET `file` = '$filename',subdate = '$update' WHERE `contactid` = '$contactid' and `aid` = '$aid'");
		
			
		$query3 = $this->db->query("SELECT * FROM `$user` where contactid = '$contactid'");
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
				//$mail->AddAddress($r1->username, '');
				//$mail->AddAddress('harsh@arfeenkhan.com', '');
				//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
				$mail->Subject = 'Assignment '.$aid.' Solution Updated ';
				$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment '.$aid.' Solution Uploaded </title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">Thank You</h1>
	<h3 style="font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;padding:5% 15%;"><font style="font-size:20px;font-weight:bold;"></font>Thank you For Updating the Assignment Solution We have Received Your Solution. We will revert you soon.</h3>
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
		/*-------------------Assignment Submmitted---------------*/
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
			$mail->AddAddress('avisingh.singh2011@gmail.com', '');
			//$mail->AddAddress($r1['username'], '');
			//$mail->AddAddress('harsh@arfeenkhan.com', '');
			//$mail->AddAddress('ajay@arfeenkhan.com', '');
            
			$mail->Subject = $_SESSION['course'].' - Assignment Solution Updated';
			$mail->Body= '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment Solution Updated</title>
<style>
*{
	padding:0px;
	margin:0px;
}
</style>
</head>
<body>
<div id="body-wrapper" style="margin:2px auto;width:954px;border:3px solid #03489d;border-radius:20px;padding-left:20px;">
	<h1 style="font-size:30px;margin-bottom:5px;text-align:center;color:#00387e">'.$_SESSION['course'].' - Assignment Solution Updated</h1>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Assignment No: </font>'.$aid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Contactid: </font>'.$contactid.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;font-weight:normal;font-size:20px;"><font style="font-size:20px;font-weight:bold;">Name: </font> '.$name.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Email: </font>'.$email.'</h3>
	<h3 style="font-family:HelveticaNeueLT Pro 55 Cn;font-weight:normal;font-size:20px;text-align:left;margin-bottom:10px;font-size:20px;margin-left:5px;"><font style="font-size:20px;font-weight:bold;">Solution : </font><a href="http://docs.google.com/viewer?url='.base_url().'uploads/'.$submission.'/'.$filename.'">View</a></h3>
</div>
</body>
</html>'
;

			$mail->IsHTML(true);
			$mail->Send();
		} 
		catch (phpmailerException $e) 
		{
			return $e->errorMessage(); //Pretty error messages from PHPMailer
		} 
		catch (Exception $e) 
		{
			return $e->getMessage(); //Boring error messages from anything else!
		}
		
		$result = "Solution Updated Successfully";
		return $result;
	}
	
}