<link href="css/bootstrap_min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>PayU Watch Login Page</title>
	<link rel="stylesheet" href="css/bootstrap_4.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquary.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

        <link href="css/style.css" rel="stylesheet">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/payu.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="btnSubmit" class="btn login_btn" value="Login">
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
//$submit = $_POST['btnSubmit'];
//echo $submit;
//Error Checking
error_reporting(E_ALL);
ini_set('display_errors', '1');
//after submit the butten
if(isset($_POST['btnSubmit'])){
// using ldap bind
$ldaprdn  = $_POST['username'];
$ldappass = $_POST['password'];

// connect to ldap server
$ldapconn = ldap_connect("ldap://edc.payumum.com")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {

    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verify binding
    if ($ldapbind) {
        echo "Login successful...";
    } else {
        echo "LDAP Login failed failed...";
    }

}
}
?>


<?php  session_start(); ?> 
<?php
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors',1);
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location: index.php"); 
 }
if(isset($_POST['btnSubmit'])){
// using ldap bind
    $ldaprdn  = $_POST['username'];
    $ldappass = $_POST['password'];
    $domain = 'edc.payumum.com';
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $ldapconfig['host'] = '10.50.3.11';
    $ldapconfig['port'] = 389;
    $ldapconfig['basedn'] = 'DC=edc,DC=payumum,DC=com';
    $ldap_manager_group = 'Payu_RW';
    $ldap_user_group = 'Payu_RO';
    $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

    $dn=$ldapconfig['basedn'];
    $bind=ldap_bind($ds, $username .'@' .$domain, $password);
    $attr = array("memberof","givenname");
    $isITuser = ldap_search($ds,$dn,"(sAMAccountName=" . $username. ")" ,$attr);
    $data = ldap_get_entries($ds,$isITuser);

    echo $data['count']." entry found ";
    echo "<pre>";
    $results =  print_r($data,true);
//    echo $results;

print_r($data[0]['memberof']);
// check groups
      $access = 0;
      foreach($data[0]['memberof'] as $grps) {
     // is manager, break loop
      if(strpos($grps, $ldap_manager_group)) {
         $access = 2; echo 'Done';
         $_SESSION['use']=$ldaprdn;
         header("Location: index.php"); exit; }

     // is user
      elseif(strpos($grps, $ldap_user_group)){
          $access = 1;
          $_SESSION['use']=$ldaprdn;
          header("Location: index.php"); exit; }
      }
if ($isITuser) {
        echo("Login correct");
        $_SESSION['contact']=$ldaprdn;
        header("Location: contact.php"); exit;
    } else {
        echo("Login incorrect");
        echo '<script language="javascript">';
        echo 'alert("Invalid Username and Password.")';  //not showing an alert box.
        echo '</script>';

    }
}
?>
