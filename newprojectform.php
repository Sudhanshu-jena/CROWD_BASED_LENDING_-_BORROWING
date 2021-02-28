<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>
<?php

// php delete data in mysql database using PDO

if(isset($_POST['Create']))
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

    $pdoQuery = "DELETE FROM `project` WHERE `User_ID` = :User_ID";
    
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
           <li><a href="homepage.html"><button>Home</button></a></li>
		   <li><a href="Borrow.php"><button>Borrow</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
    <div class="container" style="background-image:url('img/formsbg.jpg');">
		<h1 class="label">&nbsp;&nbsp;&nbsp;&nbsp;Create New Project</h1>
		<form class="login_form" action="newprojectform.php" method="post" name="form" >
			<div class="font"></div>
            <label  class="lab" for="Name">Name:</label>
			<input autocomplete="off" type="text"  name="Name"  required>
			
			<div class="font font2"></div>
            <label class="lab" for="User_ID">User ID:</label>
			<input autocomplete="off" type="text"   name="User_ID"  required>

			<div class="font font6"></div>
            <label class="lab" for="Email">Email:</label>
			<input type="Email"   name="Email" required>

			<div class="font font4"></div>
            <label class="lab" for="Category">Category:</label>
			<input type="text"   name="Category" required>
			
            <div class="font font5"></div>
            <label class="lab" for="Region">Region:</label>
            <input type="text"   name="Region" required>

			<div class="font font6"></div>
            <label class="lab" for="Address">Address:</label>
			<input type="text"   name="Address" required>
			
			<div class="font font3"></div>                        
            <label class="lab" for="Account_No">Account No.:</label>
			<input type="text"   name="Account_No" required>
				
            <p>Any previous loan pending:</p>

<div>
  <input type="radio" id="Yes" name="Loan_Pending" value="Yes"
          style= "margin: .3rem;">
  <label for="Yes">Yes</label>
</div></br>

<div>
  <input type="radio" id="No" name="Loan_Pending" value="No" checked style= "margin: .3rem;">
  <label for="No">No</label>
</div>           

            <div class="font font6"></div>
            <label class="lab" for="Description">Description:</label>
			<input type="text"   name="Description" required>
			
            
        </br>


			
            <button name="Create" class="Update_btn" type="submit">Create</button>

		</form>

        <?php
			if(isset($_POST['Create']))
			{
				$conn = config::conectphp();
                $Name=$_POST['Name'];
                $User_ID=$_POST['User_ID'];
				$Account_No=$_POST['Account_No'];
				
				$Category=$_POST['Category'];
				$Region=$_POST['Region'];
                $Loan_Pending=$_POST['Loan_Pending'];
                $Email=$_POST['Email'];
                $Description=$_POST['Description'];
                $Address=$_POST['Address'];
                try{
                $sql = "INSERT INTO project (Name,User_ID,Account_No,Category,Region,Loan_Pending,Email,Description,Address)
                VALUES (:Name, :User_ID, :Account_No, :Category, :Region, :Loan_Pending, :Email, :Description, :Address)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Name'=>$Name,
                'User_ID'=>$User_ID, 'Account_No'=>$Account_No,'Category'=>$Category,'Region'=>$Region, 
                'Loan_Pending'=>$Loan_Pending, 'Email'=>$Email, 'Description'=>$Description, 'Address'=>$Address,]);
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