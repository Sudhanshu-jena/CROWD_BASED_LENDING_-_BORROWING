<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>
<?php

// php delete data in mysql database using PDO

if(isset($_POST['Update']))
{
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=crowd_based","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     // get id to delete
     $User_ID = $_POST['User_ID'];
    
     // mysql delete query 

    $pdoQuery = "DELETE FROM `account` WHERE `User_ID` = :User_ID";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":User_ID"=>$User_ID));
    
    if($pdoExec)
    {
        
    }else{
        
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CROWD BASED LENDING & BORROWING</title>
    <link rel="stylesheet" type="text/css" href="css/accountDetails.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<script src="https://kit.fontawesome.com/a076d05399.js" ></script>
</head>
<body>
    <header class="site-header clearfix">
    <nav>
        <div class="logo">
            <h1><img src="img/LOGO.png" height="70" width="70"></h1>
         
        </div>
        <div class="menu"> 
         <ul>
           <li><a href="homepage.php"><button>Home</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
    <div class="container" style="background-image:url('img/formsbg.jpg');">
		<h1 class="label">&nbsp;&nbsp;&nbsp;&nbsp;Account Details</h1>
		<form class="login_form" action="accountDetails.php" method="post" name="form" >
			<div class="font"></div>
            <label  class="lab" for="Name">Name:</label>
			<input autocomplete="off" type="text"  name="Name"  required>
			
			<div class="font font2"></div>
            <label class="lab" for="User_ID">User ID:</label>
			<input autocomplete="off" type="text"   name="User_ID"  required>
			
            <div class="font font3"></div>
                        
            <label class="lab" for="Account_No">Account No.:</label>
			<input type="text"   name="Account_No" required>
			
            <div class="font font4"></div>

            <label class="lab" for="IFSC_Code">IFSC Code:</label>
			<input type="text"   name="IFSC_Code" required>
			
            <div class="font font5"></div>
            <label class="lab" for="Bank_Name">Bank Name:</label>
            <input type="text"   name="Bank_Name" required>
		
            <div class="font font6"></div>
            <label class="lab" for="Bank_Branch">Banck Branch:</label>
			<input type="text"   name="Bank_Branch" required>

            <div class="font font6"></div>
            <label class="lab" for="Email">Email:</label>
			<input type="Email"   name="Email" required>

            <div class="font font6"></div>
            <label class="lab" for="Contact_No">Contact No:</label>
			<input type="number"   name="Contact_No" required>

            <div class="font font6"></div>
            <label class="lab" for="Address">Address:</label>
			<input type="text"   name="Address" required>
			
            
        </br>


			
            <button name="Update" class="Update_btn" type="submit">Update</button>

		</form>

        <?php
			if(isset($_POST['Update']))
			{
				$conn = config::conectphp();
                $Name=$_POST['Name'];
                $User_ID=$_POST['User_ID'];
				$Account_No=$_POST['Account_No'];
				
				$IFSC_Code=$_POST['IFSC_Code'];
				$Bank_Name=$_POST['Bank_Name'];
                $Bank_Branch=$_POST['Bank_Branch'];
                $Email=$_POST['Email'];
                $Contact_No=$_POST['Contact_No'];
                $Address=$_POST['Address'];
                try{
                $sql = "INSERT INTO account (Name,User_ID,Account_No,IFSC_Code,Bank_Name,Bank_Branch,Email,Contact_No,Address)
                VALUES (:Name, :User_ID, :Account_No, :IFSC_Code, :Bank_Name, :Bank_Branch, :Email, :Contact_No, :Address)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Name'=>$Name,
                'User_ID'=>$User_ID, 'Account_No'=>$Account_No,'IFSC_Code'=>$IFSC_Code,'Bank_Name'=>$Bank_Name, 
                'Bank_Branch'=>$Bank_Branch, 'Email'=>$Email, 'Contact_No'=>$Contact_No, 'Address'=>$Address,]);
                echo '<script type="text/javascript">alert("Project information updated successfully")</script>';
                
            }
            catch(PDOException $e){
              echo '<script type="text/javascript">alert("Try again with proper information")</script>';

            }
            }
            
            
            
				
				
				
				
		?>
	</div>	
</section>
</header>
</body>
</html>