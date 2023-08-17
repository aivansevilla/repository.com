<!DOCTYPE HTML>
<html>   
<head>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<!------HOME DESIGN------>
<style>


  .logo{
    margin-top: 15%;
  
  }

  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 15%;
  }

  body{
    background-repeat: no-repeat;
    background-size: cover;
    background-image:url("uploads/cnshs3.png");
  }


  .box {
  width: 60%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  margin-top: -100px;
}
.button {
font-size: 25px;
font-family: 'Poppins', sans-serif;
padding: 15px;
color: #fff;
background: #FBB117;
border: 2px solid black;
border-radius: 50px/50px;
width: 20%;
text-decoration: none;
cursor: pointer;
transition: all 0.3s ease-out;
width: 20%;
}
.btn1{
text-align: center;
margin-top:20%;
font-family: 'Poppins', sans-serif;
}
.btn2{
text-align: center;
margin-top: 9%;
}
.btn3{
text-align: center;
margin-top: 9%;

}
.button:hover {
background-color: #f2cf07;
background-image: linear-gradient(315deg, #f2cf07 0%, #55d284 74%); 

}

.overlay {
position: fixed;
top: 0;
bottom: 0;
left: 0;
right: 0;
background: rgba(0, 0, 0, 0.7);
transition: opacity 500ms;
visibility: hidden;
opacity: 0;
}
.overlay:target {
visibility: visible;
opacity: 1;
}
.popup {
margin: 70px auto;
padding: 20px;
background: #fff;
border-radius: 5px;
width: 30%;
position: relative;
transition: all 5s ease-in-out;
}
</style>
</head>
<body>
    <div class="logo">
    <img src="uploads/logo CNSHS.png" class="center">
    </div>
    <div class="box">
<!--Register btn-->
    <div class="btn1">
      <a class="button" href="./register.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>

<!--Student btn-->
    <div class="btn2">
       <a class="button" href="./login.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Log-in&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>

<!--Admin btn-->
    <div class="btn3">
        <a class="button" href="./admin">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Log-in&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
  </div>
</body>
</html>

