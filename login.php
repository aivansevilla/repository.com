<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body class="hold-transition ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<script>
start_loader()
</script>
<!------STUDENT LOGIN DESIGN------>
<style>
body{


    background-repeat: no-repeat;
    background-size: cover;
    background-image:url("uploads/cnshs3.png");
    
}


::selection{
background: #4158d0;
color: #fff;
}

.student .title{
  font-family: 'Poppins', sans-serif;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  line-height: 100px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: linear-gradient(110.1deg, rgb(34, 126, 34) 2.9%, rgb(168, 251, 60) 90.3%);
}
.student form{
  padding: 10px 30px 50px 30px;
}
.student form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.student form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}

.student form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.student form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .content{
  display: flex;
  width: 100%;
  height: 50px;
  font-size: 16px;
  align-items: center;
  justify-content: space-around;
}

form .content input{
  width: 15px;
  height: 15px;
  background: red;
}
form .content label{
  color: #262626;
  user-select: none;
  padding-left: 5px;
}
form .content .pass-link{
  color: "";
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  width:200px;
  background: linear-gradient(110.1deg, rgb(34, 126, 34) 2.9%, rgb(168, 251, 60) 90.3%);
  font-family: 'Poppins', sans-serif;
  transition: all 0.3s ease;
}

.student{
margin: 70px auto;
margin-top: 10%;
background: #fff;
border-radius: 5px;
width: 30%;
position: relative;
transition: all 5s ease-in-out;
width: 30%;
height: 50%;
background: #fff;
border-radius: 15px;
box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}

.student .close {
position: absolute;
top: 20px;
right: 34px;
transition: all 200ms;
font-size: 30px;
font-weight: bold;
text-decoration: none;
color: #333;
}

.close:hover {
color: #06D85F;
}

.password-container{
  width: 400px;
  position: relative;
}
.password-container input[type="password"],
.password-container input[type="text"]{
  width: 100%;
  padding: 12px 36px 12px 12px;
  box-sizing: border-box;
}
.fa-eye{
  position: absolute;
  top: 28%;
  right: 6%;
  cursor: pointer;
  color: lightgray;
}
    </style>
           
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>


<!------STUDENT LOGIN FORM------>
    <div id="student" class="overlay">
    <div class="student">
      <div id="loginForm">
    <a class="close" href="<?php echo base_url ?>">&times;</a>
        <div class="title">STUDENT LOG-IN</div>
        <form action="" id="slogin-form">
        <div class="field">
        <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-border" required>
        </div>
        <div class="field" id="password-container">
        <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-border" required><i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <br>
        <div class="pass-link"><a href="phpmailer/forgot.php">Forgot password?</a></div>
        <script src="main.js"></script>
        <div class="content">
        </div>
        <br>
        <center>
        <div class="field">

        <input type="submit"  value="Login">
        </center>
        </div>
      </form> 
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent form submission

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      // Replace this with your actual authentication logic
      const isAuthenticated = checkCredentials(email, password);

      if (isAuthenticated) {
        Swal.fire({
          title: 'Success!',
          text: 'You have successfully logged in.',
          icon: 'success',
          allowOutsideClick: false,
    showConfirmButton: false,
    allowEscapeKey: false,
          timer: 20000
          
        });
      } else {
        Swal.fire({
          title: 'Error!',
          text: 'Invalid email or password.',
          icon: 'error',
          allowOutsideClick: false,
    showConfirmButton: false,
    allowEscapeKey: false,
          timer:20000
        
        });
      }
    });
  });

  function checkCredentials(email, password) {
    // Replace this function with your actual authentication logic
    // Return true if the credentials are valid, otherwise return false.
    // For demonstration purposes, let's assume the credentials are valid if both fields are non-empty.
    return email.trim() !== '' && password.trim() !== '';
  }
</script>


<!------STUDENT LOGIN POPUP MESSAGES------>
 <script>
  $(document).ready(function(){
    end_loader();
    $('#slogin-form').submit(function(e){
        e.preventDefault()
        var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
        
        $.ajax({
            url:_base_url_+"classes/Login.php?f=student_login",
            method:'POST',
            data:_this.serialize(),
            dataType:'json',
            error:err=>{
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader();
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.href= "./"
                }else if(!!resp.msg){
                    el.text(resp.msg)
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }else{
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('show')
                }
                end_loader();
                $('html, body').animate({scrollTop: 0},'slow')
            }
        })
    })
  })
</script>

<!------STUDENT LOGIN SHOW PASSWORD------>
<script>
const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye") 

eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
})

</script>
</body>
</html>