<!DOCTYPE html>
<html>
<head>
 <title>CROWD BASED LENDING & BORROWING</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
 <link rel="stylesheet" type="text/css" href="css/borrow.css">
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
     
    <li ><a href="LendBorrow.php"><button type="button">Lend/Borrow</button></a></li>
    <li ><a href="accountDetails.php"><button type="button">Update Account</button></a></li>
	<li ><a href="logout.php"><button type="button">Logout</button></a></li>
    
   </ul>
  </div>
 </nav>
 <section>
  
  <div class="rightside"> 
  <a href="newprojectform.php"><button class="button1">Create a new project</button></a></br></br>
  

   <div class="div1"><h3>Existing or previous borrows</h3></br>
   <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "crowd_based");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM project where `User_ID` = project.User_ID";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        foreach($result as $row){
        echo "<table class='table'>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr class='table-dark'>";
			
                echo "<th>Name</th>";
				echo "<td>" . $row['Name'] . "</td>";
					
				
                
            echo "</tr>";
			echo "<tr>";
                echo "<th>User ID</th>";
				echo "<td>" . $row['User_ID'] . "</td>";
				
                
            echo "</tr>";
      echo "<tr>";
                echo "<th>Email</th>";
				echo "<td>" . $row['Email'] . "</td>";
				
                
            echo "</tr>";

			echo "<tr>";
                echo "<th>Account No</th>";
				echo "<td>" . $row['Account_No'] . "</td>";
				
                
            echo "</tr>";
			
		}
			
        
        echo "</table>";
    }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script> 
   </div></br></br>
   <a href="repaymentpage.php"><button class="button1">Repay</button></a>
   
  </div>
  
 </section>

</header>
<script>
     function change(src){
          window.location=src;
          
     }
</script>


</body>
</html>



