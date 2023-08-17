<!DOCTYPE HTML>
<html>   
<head>
<!------HOME DESIGN------>
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

.content-container{
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 2;
  clip: rect(auto, auto, auto, auto);
  pointer-events: none;
}

.content-inner{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 100%;
  padding: 0;
  z-index: 99;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  will-change: transform;
  -webkit-perspective: 1000;
  perspective: 1000;
  pointer-events: all;
}

.content-center{
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}



.bottom-section{
  background: #d4fef2;
}

.section h1{
  font-size: 650%;
  font-weight: 300px;
  text-transform: uppercase;
  text-align: center;
 margin-top: 10%;
 position: fixed;
  left: 7;
  bottom: 3;
}

.content-theme-dark h1{
  color: #dbf26e ;
  text-shadow: 0 20px 40px rgba(0,0,0,.5);
}


.content-theme-light h1{
  color:#1b8b00;
  text-shadow: 0 20px 40px rgba(0,0,0,.5);
}


.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 15px;
  text-align: center;
  background:#dbf26e;
  width: 25%;
  margin-top: 24%;

}

</style>

<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
   background: linear-gradient(to bottom, #33cc33 0%, #66ff33 100%);
  color: white;
  text-align: center;
  padding: 1%;
  margin-top: 1.35%;
}
</style>



</head> 
<body>> 
</div> 
<center>

    <section class="section top-section">
    <div class="content-container content-theme-dark">
      <div class="content-inner">
        <div class="content-right">
         <h1>Online Repository of CSHS Student
         Researches</h1>
                 </div>
      </div>
    </div>
     </section>


<center> 
<div class="card"> 
<img class="nature" src="uploads/s1.jpg" width="101%" height="220px">
<img class="nature" src="uploads/s2.jpg" width="101%" height="220px"> 
<img class="nature" src="uploads/s3.jpg" width="101%" height="220px"> 
</div>
</center>

<script src="https://www.w3schools.com/lib/w3.js"></script>
<script>w3.slideshow(".nature", 2500);</script>


<div class="footer">
  <p>CABIAO NATIONAL SENIOR HIGH SCHOOL
Palasinan, Cabiao, Nueva Ecija 3107</p>
</div>



</body>
</html>



