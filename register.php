<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<script>
start_loader()
</script>


<!------REGISTRATION DESIGN------>
<style>

body{


    background-repeat: no-repeat;
    background-image:url("uploads/cnshs3.png");
    background-size: cover;
    
}

::selection{
  background: #4158d0;
  color: #fff;
}
.register .title{
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
.register form{
  padding: 10px 30px 50px 30px;
}
.register form .field{
  height: 36px;
  width: 90%;
  margin-top: 15px;
  position: relative;
}
.register form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  border: none;
  border-bottom: 1px solid;
}

.register form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.register form .field label{
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
  height: 60px;
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
  margin-top: 12px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  border-radius: 25px;
  width:200px;
  background: linear-gradient(109.6deg, rgb(0, 204, 130) 11.2%, rgb(58, 181, 46) 91.7%);
  font-family: 'Poppins', sans-serif;
  transition: all 0.3s ease;
}

.text{
  font-size: 20px;
}

.register{
margin: 70px auto;
margin-top: 2%;
background: #fff;
width: 30%;
position: relative;
transition: all 5s ease-in-out;
width: 30%;
height: 80%;
background: #fff;
border-radius: 15px;
box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}

.register .close {
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

.student-img{
        object-fit:scale-down;
        object-position:center center;
        height:200px;
        width:200px;
        radius: 5%;
    }
</style>

    <!------REGISTRATION FORM------>
    <div id="register" class="overlay">
    <div class="register">
    <a class="close" href="<?php echo base_url ?>">&times;</a>
    <?php require_once "inc/register.php"; ?>
    <div class="title">REGISTER</div>
                    <!-- <form action="" id="registration-form"> -->
                     <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="firstname" id="firstname" autofocus placeholder="Firstname" class="form-control form-control-border" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="middlename" id="middlename" placeholder="Middlename (optional)" class="form-control form-control-border">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="genderMale" name="gender" value="Male" required checked>
                                    <label for="genderMale" class="custom-control-label">Male</label>
                                </div>
                            </div>
                            <div class="form-group col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="genderFemale" name="gender" value="Female">
                                    <label for="genderFemale" class="custom-control-label">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-secondary"><small>Strand</small></span>
                                    <select name="strand_id" id="strand_id" class="form-control" data-placeholder="Select Here Strand" required>
                                        <?php 
                                        $strand = $conn->query("SELECT * FROM `strand_list` where status = 1 order by `name` asc");
                                        while($row = $strand->fetch_assoc()):
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= ucwords($row['name']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-secondary"><small>Year level</small></span>
                                    <select name="yearlevel_id" id="yearlevel_id" class="form-control" data-placeholder="Select Here Year level" required>
                                        <option value="" disabled selected>Select Strand First</option>
                                        <?php 
                                        $yearlevel = $conn->query("SELECT * FROM `yearlevel_list` where status = 1 order by `name` asc");
                                        $cur_arr = [];
                                        while($row = $yearlevel->fetch_assoc()){
                                            $row['name'] = ucwords($row['name']);
                                            $cur_arr[$row['strand_id']][] = $row;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-12">
                           <input type="file" name="file" id="imageInput" accept="image/*" required>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="student_num" id="student_num" placeholder="Student number" class="form-control form-control-border" maxlength="12" pattern="\d{12}" title="Please enter exactly 12 digits" / required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group" id="password-container">
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-border" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><i class="fa-solid fa-eye" id="eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" id="cpassword" placeholder="Confirm Password" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <script src="main.js"></script>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="form-group text-right">
                            <center>
                            <div class="field">
                        <!-- <input type="submit" value="Register" onclick="uploadImage()"> -->
                        <input type="submit" name="btnReg" value="Register">
                </center>
            </div>
      </form> 
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>


<!------REGISTRATION FORM POPUP MASSAGE------>
<script>
    var cur_arr = $.parseJSON('<?= json_encode($cur_arr) ?>');
  $(document).ready(function(){
    end_loader();
    $('.select2').select2({
        width:"100%"
    })
    $('#strand_id').change(function(){
        var did = $(this).val()
        $('#yearlevel_id').html("")
        if(!!cur_arr[did]){
            Object.keys(cur_arr[did]).map(k=>{
                var opt = $("<option>")
                    opt.attr('value',cur_arr[did][k].id)
                    opt.text(cur_arr[did][k].name)
                $('#yearlevel_id').append(opt)
            })
        }
        $('#yearlevel_id').trigger("change")
    })

    
    $('#registration-form').submit(function(e){
        e.preventDefault()
        var _this = $(this)
            $(".pop-msg").remove()
            $('#password, #cpassword').removeClass("is-invalid")
        var el = $("<div>")
            el.addClass("alert pop-msg my-2")
            el.hide()
        if($("#password").val() != $("#cpassword").val()){
            el.addClass("alert-danger")
            el.text("Password does not match.")
            $('#password, #cpassword').addClass("is-invalid")
            $('#cpassword').after(el)
            el.show('slow')
            return false;
        }
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Users.php?f=save_student",
            method:'POST',
            data:_this.serialize(),
            dataType:'json',
            error:err=>{
                console.log(err)
                el.text("An error occured while saving the data")
                el.addClass("alert-danger")
                _this.prepend(el)
                el.show('slow')
                end_loader()
            },
            success:function(resp){
                if(resp.status == 'success'){
                    location.href= "./login.php"
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
                $('html, body').animate({scrollTop: 0},'fast')
            }
        })
    })
  })
</script>

<!------REGISTRATION FORM SHOW PASSWORD------>
<script>
const passwordInput = document.querySelector("#password")
const eye = document.querySelector("#eye") 

eye.addEventListener("click", function(){
  this.classList.toggle("fa-eye-slash")
  const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
  passwordInput.setAttribute("type", type)
})

</script>


<script>
    function uploadImage() {
    const input = document.getElementById('imageInput');

    if (input.files && input.files[0]) {
        const formData = new FormData();
        formData.append('image', input.files[0]);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                if (response.startsWith('Error:')) {
                    alert(response);
                } else {
                    const img = document.createElement('img');
                    img.src = response;
                    img.style.maxWidth = '300px'; // You can set a maximum width for the displayed image
                    const imageContainer = document.getElementById('imageContainer');
                    imageContainer.innerHTML = '';
                    imageContainer.appendChild(img);
                }
            }
        };
        xhr.send(formData);
    }
}


</script>
</body>
</html>

