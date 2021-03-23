<?php
session_start();
include_once("dbconfig/config.php");
if($_SESSION["User_ID"]==true){
    
}else{
    header('location:index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>CROWD BASED LENDING & BORROWING</title>
 <link rel="stylesheet" type="text/css" href="css/homepage.css">
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
    <li ><a href="LendBorrow.php"><button type="button">Lend/Borrow</button></a></li>
    <li ><a href="accountDetails.php"><button type="button">Update Account</button></a></li>
	<li ><a href="logout.php"><button type="button">Logout</button></a></li>
    
   </ul>
  </div>
 </nav>
 <section>
     <%- include('../partials/navbar')%>
  
  <div class="rightside"> 
   <h1> CROWD BASED </br>LENDING & BORROWING PLATFORM</h1></br></br></br>
   
        <font face="cinzel" size="5">
		    <a href="borrow.php">BORROW |</a>&nbsp;
		    <a href="LendBorrow.php">LEND |</a>&nbsp;
		    <a href="about us.html">ABOUT US |</a>&nbsp;
		    <a href="accountpage.php">ACCOUNT</a>&nbsp;
		</font></br></br>
		<font face="cinzel" size="4">
		    <a href="#">Privacy Policy |</a>&nbsp;
		    <a href="#">Terms of use </a>&nbsp;
		   
		</font>
   
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
