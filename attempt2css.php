<?php 
    header("Content-type: text/css; charset: UTF-8");
$watermelon = "#F23E3F";
$green = "#ced957";
$green2 = "#B9C34E";
$dark = "#a9a9a9";
$light = "#EEF0DB";
?>


body{
	background-color: <?php echo $light; ?>;
}
.container{
  display: flex;
  // flex-direction: row;
}
.main{
//	display: flex;
	width: 60vw;
	height: 100vh;
	align-self: center;
	align-items: center;
	justify-content: center;
	flex-direction: column;
// 	align-content: space-around;
	flex-wrap: wrap;
}

img {
  border: 10px solid #fff;
  border-bottom: 60px solid #fff;
	box-shadow: 0  8px  <?php echo $dark; ?>;
    height: 350px;
    width: auto; 
	align-self:center;
	justify-content: center;
	margin-bottom: 0;

	position: relative;
	top: -20%;
	left: 50%;
    transform: translate(-50%, +20%);  
}

input[type=text], select , p.label {
	width: 100%;
	height: 55px;
	font-size: 30px;
	color: <?php echo $watermelon; ?>;
	font-family: "Segoe UI";
	font-weight: bold; 
	outline:none;
	border-color: transparent;
	background-color: transparent;
	text-align: center;
	
	position: relative;
	top: -20%;
	left: 50%;
    transform: translate(-50%, +30%); 
}

p.label{
	color: <?php echo $dark; ?>;;
	font-size: 20px;
    transform: translate(-50%, +20%)
}

.nav{
	height: 50px; 
	width: auto; 
	
	margin: auto;
	margin-top: 10px;
	justify-content: center;
	
	display: flex;
	flex-direction: row;
}

.nav button{
  display: inline-block;
  padding: 10px 20px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: <?php echo $watermelon; ?>;
  background-color: <?php echo $green; ?>;
  border: none;
  box-shadow: 0 9px <?php echo $green2; ?>;
}

.nav button:hover{
  background-color: <?php echo $green2; ?>;
}
/* ============================ */
.sidebar{
	display: flex;
	width: 30vw;
	height: auto;
	background-color: <?php echo $green; ?>;
	align-self: center;
	margin: auto;
	box-shadow: 0  9px  <?php echo $green2; ?>;
	flex-direction: column;
	align-items: center;
}


.top{
	display: flex;
	flex-direction: row;
	justify-content: space-around;
	align-content: space-around;
}

.topl, .topr {
	display: flex;
	flex-direction: column;
	width: 3vw;
	margin: 0 2vw; 
}

.mas {
	float:right;
	display: flex;
	flex-direction: column;
	align-content: center;
}

.two, .three {
	display: flex;
	align-content: center;
	justify-content: center;

}

.topr button{
	padding: 5px 10px;
	border-radius: 50%;
	color:  <?php echo $watermelon; ?>;
	border: 2px solid  <?php echo $watermelon; ?>;
	background-color: transparent;
	font-size: 13px;
	align-self: flex-start;
	margin-bottom: 5px;
}

.topr button:hover{
	background-color: <?php echo $watermelon; ?>;
	color: <?php echo $green; ?>;
}

.two, .three{
	display: flex;
	align-content: center;
	justify-content: center;
	margin-bottom:5px;
	height: 25px;
}

.two p, .three p{
	background-color:transparent;
	font-size: 17px;
	color: <?php echo $watermelon; ?>;
	font-weight: bold;
	font-family: "Segoe UI";
	text-align:center;
	margin: 0px 0px;
}

p.title , .infotitle{
	color: <?php echo $watermelon; ?>;
	font-family: "Segoe UI";
	font-weight: bold;
	text-align: center;
	font-size: 5vw;
	max-height: 5vh;
	margin: 10vh 0vw;

}

p.subtitle , .infosub{
	color: <?php echo $green2?>;
	font-family: "Segoe UI";
	text-align: center;
	font-size: 15px;
	margin: 5vh 0vw;
}
.menu{
	width: 20vw; 
	border: 2px solid <?php echo $watermelon; ?>;

	justify-content: center;
	
	display: flex;
	flex-direction: column;
	align-self: center;
	margin:auto;
}
.button1 , .inputaddon, select, .pressed{
  display: inline-block;
  padding: 10px 20px;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  color: <?php echo $watermelon; ?>;
  background-color: transparent;
  border: 2px solid <?php echo $watermelon; ?>;
  font-weight: bold;
 font-family: "Segoe UI";
}

.button1:hover {
	background-color: <?php echo $watermelon; ?>;
	color: <?php echo $green; ?>;
}
.pressed{
	background-color: <?php echo $watermelon; ?>;
	color: <?php echo $green; ?>;
}
.space{
	height: 10vh;
}


/* The Modal (background) */
.modal{
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
	align-items: flex-start;
}
.infotitle{
	font-size: 2vw;
}

.infosub{
	color: <?php echo $green2; ?>;
	align-self: flex-start;
	text-align: left;
}

.modal input[type=text], select{
	padding: 0 0;
	margin: 0;
	font-size: 10px;
}

.red{
	color: <?php echo $watermelon; ?>;
	font-size: 20px;
}

/* The Close Button */
.close{
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
