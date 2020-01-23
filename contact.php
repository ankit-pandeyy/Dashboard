<?php   session_start();  ?>
<?php
      if(!isset($_SESSION['contact'])) // If session is not set then redirect to Login Page
       {
        
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/contact.css">
  <title>Layered Card Hover</title>
</head>
<body>
  <div class="box">
      <div class="card">
        <div class="imgBx">
          <a href="mailto:ankit.kashyap@payu.in?Subject=PayU%20Watch%20Access" target="_top" style="text-decoration:none;"><img src="img/ankit.jpg" alt="images"></a>
        </div>
        <div class="details">
            <h2>Ankit Kashyap<br><span>DevOps Manager</span></h2>
        </div>
      </div>
    
       <div class="card">
         <div class="imgBx">
          <a href="mailto:vivek.raj@payu.in?Subject=PayU%20Watch%20Access" target="_top" style="text-decoration:none;"><img src="img/vivek.jpg" alt="images"></a>
         </div>
         <div class="details">
            <h2>Vivek Raj<br><span>NOC Engineer</span></h2>
          </div>
       </div>

       <div class="card">
         <div class="imgBx">
          <a href="mailto:himashu.panday@payu.in?Subject=PayU%20Watch%20Access" target="_top" style="text-decoration:none;"><img src="img/himanshu.jpg" alt="images"></a>
         </div>
         <div class="details">
            <h2>Himanshu Panday<br><span>NOC Engineer</span></h2>
          </div>
       </div>
 
  </div>
</body>
</html>
