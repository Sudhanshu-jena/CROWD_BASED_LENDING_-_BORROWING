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
         <li><a href="newprojectform.php"><button>New Project</button></a></li>
           <li><a href="homepage.html"><button>Home</button></a></li>
		   <li><a href="Borrow.php"><button>Borrow</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
       <div class="rightside"> 
    
    <div id="main-wrapper" >
    <center><h2>Project Information</h2></center></br></br>
      <center><h3>Once confirm your project ID to view</h3></center></br></br>
      <form action="LendBorrow.php" method="post">
        
        <div class="inner_container">
        
          <label><b>Category</b></label>
				

				<select type="text" value ="" placeholder="Category" name="Category" required>
        <optgrup label="college">
        <option>Agriculture</option>
        <option>Arts</option>
        <option>Health</option>
        <option>Education</option>
		
        </select>
        <label><b>Region</b></label>
				

				<select type="text" value ="" placeholder="Region" name="Region" required>
        <optgrup label="college">
        <option>Mumbai</option>
        <option>Pune</option>
        <option>Nashik</option>
        <option>Navi Mumbai</option>
		
        </select>
        
          
          
          <button name="Confirm" class="confirm_btn" type="submit">Confirm</button>
           
          
          
          
          
          
        </div>
          </form>
  
          <?php
  
  
  if(isset($_POST['Confirm']))
        {
          $conn = config::conectphp();
                  $Category=$_POST['Category'];
                  $Region=$_POST['Region'];
                  
          
                  try{
                  $sql = "SELECT  `Description` FROM `project` WHERE `Category` = :Category";
                  // use exec() because no results are returned
                  $stmt = $conn->prepare($sql);
                  $stmt->execute(array(":Category"=>$Category));
                  
              
                  foreach($stmt as $row){
                      echo '<table width="70%" border="2" cellpadding="5" cellspacing="5">
                      <tr>
                          <th>Description</th>
                          
                          
                      </tr>';
                      
                          echo '<tr>
                          <th>'.$row ["Description"].'</th>
                          <th><a href="paymentpage.php"><button>Lend</button></a></th>
                          
                      
                          
                      </tr>';
                      echo '</table>';
  
  
                      }
                      
                  
          
                  
                  
                  }
                  catch(PDOException $e){
  
                  }
              }
              
          
          
          
          
      ?>
         
         
         
         
         
         
         
          </div>
          
  </div>
    
</section>
</header>
</body>
</html>
