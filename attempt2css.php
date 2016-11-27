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
    height: 300px;
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
    transform: translate(-50%, +10%); 
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

p.title{
	color: <?php echo $watermelon; ?>;
	font-family: "Segoe UI";
	font-weight: bold;
	text-align: center;
	font-size: 5vw;
	max-height: 5vh;
	margin: 10vh 0vw;

}

p.subtitle{
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
.menu button{
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
}

.menu button:hover{
	background-color: <?php echo $watermelon; ?>;
	color: <?php echo $green; ?>;
}

.space{
	height: 8vh;
}



