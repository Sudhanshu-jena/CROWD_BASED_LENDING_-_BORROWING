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
           <li><a href="homepage.html"><button>Home</button></a></li>
		   <li><a href="Borrow.php"><button>Borrow</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
    <div class="container" style="background-image:url('img/formsbg.jpg');">
		<h1 class="label">&nbsp;&nbsp;&nbsp;&nbsp;Payment Details</h1>
		<form class="login_form" action="repaymentpage.php" method="post" name="form" >
			<div class="font"></div>
            <label  class="lab" for="Name">Name:</label>
			<input autocomplete="off" type="text"  name="Name"  required>
			
			<div class="font font6"></div>
            <label class="lab" for="Email">Email:</label>
			<input type="Email"   name="Email" required>

			<div class="font font6"></div>
            <label class="lab" for="Address">Address:</label>
			<input type="text"   name="Address" required>

			<div class="font font5"></div>
            <label class="lab" for="Region">Region:</label>
            <input type="text"   name="Region" required>

			<div class="font font4"></div>
            <label class="lab" for="Category">Category:</label>
			<input type="text"   name="Category" required>
						
			<div class="font font3"></div>                        
            <label class="lab" for="Lend_Account_No">Lender's Account No.:</label>
			<input type="text"   name="Lend_Account_No" required>

				
                     

            <div class="font font6"></div>
            <label class="lab" for="Borrow_Account_No">Borrower's Account No.:</label>
			<input type="text"   name="Borrow_Account_No" required>

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
				
				$Category=$_POST['Category'];
				$Region=$_POST['Region'];
                $Amount=$_POST['Amount'];
                $Email=$_POST['Email'];
                $Borrow_Account_No=$_POST['Borrow_Account_No'];
                $Address=$_POST['Address'];
                try{
                $sql = "INSERT INTO repay (Name,Lend_Account_No,Category,Region,Amount,Email,Borrow_Account_No,Address)
                VALUES (:Name, :Lend_Account_No, :Category, :Region, :Amount, :Email, :Borrow_Account_No, :Address)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Name'=>$Name,
                'Lend_Account_No'=>$Lend_Account_No,'Category'=>$Category,'Region'=>$Region, 
                'Amount'=>$Amount, 'Email'=>$Email, 'Borrow_Account_No'=>$Borrow_Account_No, 'Address'=>$Address,]);
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
