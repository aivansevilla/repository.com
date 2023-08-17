<?php
require_once '../Login.php';?>

 <?php
// Function definition
function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Welcome to Geeks for Geeks");

?>
<style>

    body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}

    </style>
<script type="text/javascript">
    Swal.fire({
  position: 'left-end',
  icon: 'success',
  title: 'Your Log in Has Been Successfully',
  showConfirmButton: false,
  timer: 2500
})

</script>
