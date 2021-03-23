<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <title>CROWD BASED LENDING & BORROWING</title>
    <link rel="stylesheet" type="text/css" href="css/newProject.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/newProject.css">
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
		<h1 class="label">&nbsp;&nbsp;&nbsp;&nbsp;Create New Project</h1>
		<form class="form-horizontal" action="newprojectform.php" method="post" name="form" >
			
            <label  class="control-label" for="Name">Name:</label>
			<input autocomplete="off" type="text"  name="Name" class="input-xlarge" required></br></br>
			
            
            <label class="lab" for="Project_ID">Project ID:</label>
			<input type="text"   name="Project_ID" required></br></br>
            
			
            <label class="lab" for="User_ID">User ID:</label>
			<input autocomplete="off" type="text"   name="User_ID"  required>

			

			
            </br></br><label class="lab" for="Category">Category:</label>&emsp;
			<select type="text" value ="" placeholder="Category" name="Category" required>
        
        <option>Agriculture</option>
        <option>Arts</option>
        <option>Health</option>
        <option>Education</option>
		
        </select>&emsp;&emsp;
            
			
            
            <label class="lab" for="Region">Region:</label>
            <select type="text" value ="" placeholder="Region" name="Region" required>
        
        <option>Mumbai</option>
        <option>Pune</option>
        <option>Nashik</option>
        <option>Navi Mumbai</option>
		
        </select></br></br>

        
				

				

            
            <label class="lab" for="Start_Date">Borrowing Start Date:</label>
            <input type="date"   name="Start_Date" required></br></br>

            
            <label class="lab" for="ENd_Date">Borrowing End Date:</label>
            <input type="date"   name="End_Date" required></br></br>


			
			
			                      
            <label class="lab" for="Account_No">Account No.:</label>
			<input type="text"   name="Account_No" required></br></br>

            
            <label class="lab" for="Amount_Required">Amount Required:</label>
            <input type="number"   name="Amount_Required" required></br></br>
				
            <p>Any previous loan pending:</p>

<div>
  <input type="radio" id="Yes" name="Loan_Pending" value="Yes"
          style= "margin: .3rem;">
  <label for="Yes">Yes</label>



  <input type="radio" id="No" name="Loan_Pending" value="No" checked style= "margin: .3rem;">
  <label for="No">No</label>
</div>           

            
 <label class="lab" for="Description">Description:</label>
			<input type="text"   name="Description" required><br><br>
			
            
        


			
            <button name="Create" class="btn btn-primary btn-lg btn-block" type="submit">Create</button>

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
                $Start_Date=$_POST['Start_Date'];
                $End_Date=$_POST['End_Date'];
                $Loan_Pending=$_POST['Loan_Pending'];
                $Amount_Required=$_POST['Amount_Required'];
                $Project_ID=$_POST['Project_ID'];
                $Description=$_POST['Description'];
                
                try{
                $sql = "INSERT INTO project (Name,User_ID,Account_No,Category,Region,Start_Date,End_Date,Amount_Required,Amount_pending,Loan_Pending,Project_ID,Description)
                VALUES (:Name, :User_ID, :Account_No, :Category, :Region, :Start_Date, :End_Date, :Amount_Required,:Amount_Required, :Loan_Pending, :Project_ID, :Description)";
                // use exec() because no results are returned
                $stmt = $conn->prepare($sql);
                $stmt->execute(['Name'=>$Name,
                'User_ID'=>$User_ID, 'Account_No'=>$Account_No,'Category'=>$Category,'Region'=>$Region, 'Start_Date'=>$Start_Date,
                'End_Date'=>$End_Date, 'Amount_Required'=>$Amount_Required,'Loan_Pending'=>$Amount_Required, 'Loan_Pending'=>$Loan_Pending, 'Project_ID'=>$Project_ID, 'Description'=>$Description]);
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script> 
</body>
</html>