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
     $Lend_Account_No = $_POST['Lend_Account_No'];
    
     // mysql delete query 

    $pdoQuery = "DELETE FROM `project` WHERE `Lend_Account_No` = :Lend_Account_No";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":Lend_Account_No"=>$Lend_Account_No));
    
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
         <li ><a href="#"><button type="button">Welcome <?php echo $_SESSION['User_ID']; ?></button></a></li>
           <li><a href="homepage.php"><button>Home</button></a></li>
		   <li><a href="Borrow.php"><button>Borrow</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
    <div class="container" style="background-image:url('img/formsbg.jpg');">
		<h1 class="label">&nbsp;&nbsp;&nbsp;&nbsp;Payment Details</h1>
		<form class="login_form" action="repaymentpage.php" method="post" name="form" >
        <div class="font font6"></div>
            <label class="lab" for="User_ID">User ID:</label>
			<input type="text"   name="User_ID" required>

			<div class="font font6"></div>
            <label  class="lab" for="Name">Name:</label>
			<input autocomplete="off" type="text"  name="Name"  required>

			<div class="font font5"></div>
            <label class="lab" for="Project_ID">Project ID:</label>
            <input type="text"   name="Project_ID" required>
			

			
						
			<div class="font font3"></div>                        
            <label class="lab" for="Lend_Account_No">Lender's Account No.:</label>
			<input type="text"   name="Lend_Account_No" required>				
                     

            <div class="font font6"></div>
            <label class="lab" for="Borrow_Account_No">Borrower's Account No.:</label>
			<input type="text"   name="Borrow_Account_No" required>

            <div class="font font6"></div>
            <label class="lab" for="EMI">Do you need EMI:</label>
			<select type="text" value ="" placeholder="EMI" name="EMI" required>
        
        <option>No</option>
        <option>3 Month</option>
        <option>4 Month</option>
        <option>5 Month</option>
        <option>6 Month</option>
		
        </select>

            
            <label class="lab" for="EMI_Instalment_No">EMI No:</label>
			<select type="text" value ="" placeholder="EMI_Instalment_No" name="EMI_Instalment_No" required>
        
        <option>One Time Payment</option>
        <option>1st</option>
        <option>2nd</option>
        <option>3rd</option>
        <option>4th</option>
        <option>5th</option>
        <option>6th</option>
		
        </select>

			<div class="font font6"></div>
            <label class="lab" for="Amount">Amount to be tranformed</label>
			<input type="number"   name="Amount" required>
			
            
        </br>


			
            <button name="Repay" class="Update_btn" type="submit">Repay</button>

		</form>

        <?php
			if(isset($_POST['Repay']))
			{
				$conn = config::conectphp();
                $Name=$_POST['Name'];
                $Lend_Account_No=$_POST['Lend_Account_No'];		
				
				$EMI=$_POST['EMI'];
				$User_ID=$_POST['User_ID'];
                $Amount=$_POST['Amount'];
                $Project_ID=$_POST['Project_ID'];
                $Borrow_Account_No=$_POST['Borrow_Account_No'];
                $EMI_Instalment_No=$_POST['EMI_Instalment_No'];
                
                try{
                $sql = "INSERT INTO repay (Name,Lend_Account_No,EMI,User_ID,Amount,Project_ID,Borrow_Account_No,EMI_Instalment_No)
                VALUES (:Name, :Lend_Account_No, :EMI, :User_ID, :Amount, :Project_ID, :Borrow_Account_No, :EMI_Instalment_No)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Name'=>$Name,
                'Lend_Account_No'=>$Lend_Account_No,'EMI'=>$EMI,'User_ID'=>$User_ID, 
                'Amount'=>$Amount, 'Project_ID'=>$Project_ID, 'Borrow_Account_No'=>$Borrow_Account_No, 'EMI_Instalment_No'=>$EMI_Instalment_No,]);
                echo '<script type="text/javascript">alert("Payment successfully")</script>';
                
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
