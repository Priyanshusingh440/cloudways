<?php

require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class login
{
    
    public function __construct($db)
    {
    $this->conn=$db;
    }

   public function update_details()
   {
 
    
$json_data = file_get_contents("php://input");

// Checks if it's empty or not
if( !empty($json_data) )
{
  
  // Decodes the JSON object to an Array
  $data = json_decode($json_data, true);
  
  $uname=$data['username'];
  $password=$data['pwd'];
  // Now you can access to your single datas as a normal array. 
  // For example: if in your form you had a field with name="city" you can print it like so:
 // echo $data["username"];
 // echo $data['pwd'];
  //  echo $data['user_type'];
  if ($uname != "" && $password != "")
  {
    $check='SELECT * FROM user_details WHERE mobile_number="'.$uname.'" and password="'.$password.'" and user_type="'.$data['user_type'].'"';
    $result=$this->conn->query($check);
    
    if($result->num_rows==1)
        {
            session_start();
            $_SESSION['uname'] = $uname;
            echo 1;
            
        }
        else
        {
            echo 0;
        }
  }

    
}
else 
{
  echo "Empty JSON object, something's wrong!";
}

    /*
        $check='SELECT * FROM user_details WHERE id="'.$_REQUEST['id'].'"';
        $result=$this->conn->query($check);
        $rowinfo=$result->fetch_assoc();

                    $status="1";
                    $message="Updated Successfully";
                    $data['message']=$message;
                    $data['status']=$status;
                    $data['id']=$rowinfo['id'];
                    $data['full_name']=$rowinfo['full_name'];
                    $data['mobile_number']=$rowinfo['mobile_number'];
        			$data['email_id']=$rowinfo['email_id'];
        			$data['gender']=$rowinfo['gender'];
        			$data['device_token']=$rowinfo['device_token'];
                    $data['dob']=$rowinfo['dob'];
                    $data['photo']=$rowinfo['photo'];
        			$data['user_status']=$rowinfo['user_status'];
        			$data['wallet']=$rowinfo['wallet'];

 $cdata['response']=$data;
                    echo json_encode($cdata);      

*/
                }

            }

            $basic_details=new login($db);
            $basic_details->update_details();