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
    <link rel="stylesheet" type="text/css" href="css/lendBorrow.css">
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
         <li><a href="newprojectform.php"><button>New Project</button></a></li>
           <li><a href="homepage.php"><button>Home</button></a></li>
		   <li><a href="Borrow.php"><button>Borrow</button></a></li>
          
          
         </ul>
        </div>
       </nav>
       <section>
       <div class="rightside"> 
       <!-- margin-top: 25%; -->
    <div id="main-wrapper" class="card" style="width: 40rem; margin-top: 15rem; margin-left: 30rem;">
    <center><h2>Project Information</h2></center></br></br>
      
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
        
          
          
          <button name="Confirm" class="btn btn-primary" type="submit">Confirm</button>
           
          
          
          
          
          
        </div></br>
          </form>
  
          <?php
  
  
  if(isset($_POST['Confirm']))
        {
          $conn = config::conectphp();
                  $Category=$_POST['Category'];
                  $Region=$_POST['Region'];
                  
          
                  try{
                  $sql = "SELECT  * FROM `project` WHERE `Category` = :Category and `Region` = :Region";
                  // use exec() because no results are returned
                  $stmt = $conn->prepare($sql);
                  $stmt->execute(array(":Category"=>$Category,"Region"=>$Region));
                  
              
                  foreach($stmt as $row){
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead class="thead-dark">
                      <tr class="table-dark">
                      
                          <th >Description</th>
                          <th >Amount Required</th>
                          
                          
                      </tr>
                      </thead>';
                      
                          echo '<tbody>
                          <tr>
                          <th>'.$row ["Description"].'</th>
                          <th>'.$row ["Amount_Pending"].' OUT OF '.$row ["Amount_Required"]. '</th>
                          
                          
                      
                          
                      </tr>
                      <th><a href="paymentpage.php" ><button class="btn btn-primary mt-2">Lend</button></a></th>
                      </tbody>';
                      echo '</table>';
  
  
                      }
                      
                  
          
                  
                  
                  }
                  catch(PDOException $e){
  
                  }
              }
              
          
          
          
          
      ?>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script> 
         
         
         
         
         
         
          </div>
          
  </div>
    
</section>
</header>
</body>
</html>
