<?php 
    header("Content-type: text/css; charset: UTF-8");
$watermelon = "#F23E3F";
$green = "#ced957";
$green2 = "#B9C34E";
$dark = "#a9a9a9";
$light = "#EEF0DB";
?>

/* EVERYTHING */ 
body{
	background-color: <?php echo $light; ?>;
}

/* MAIN AREA DOES NOT INCLUDE THE TOPBAR */ 
.main{
//	display: flex;
	width: 100%;
	height: 100%;
	align-self: center;
	align-items: center;
	justify-content: center;
	flex-direction: row;
// 	align-content: space-around;
	flex-wrap: wrap;
}

/* image and border */ 
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

/* user input textbox under the image */ 
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
/* gray textbox placeholder - EITHER answer here OR WHERE THE NAMES APPEAR */
p.label{
	color: <?php echo $dark; ?>;;
	font-size: 20px;
    transform: translate(-50%, +20%)
}

/* NAVIGATION BUTTONS E.G. SKIP, SUBMIT, SHOW ANSWER, JET */  
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
	transition: all 0.3s ease;

}

.nav button:hover{
  background-color: <?php echo $green2; ?>;
}


/* TOPBAR */  
.topbar{
	position: absolute;
	top: 0;
	left: 0;
	
	display: flex;
	width: 100%;
	height: 70px;
	background-color: <?php echo $green; ?>;
	box-shadow: 0  8px  <?php echo $green2; ?>;
	flex-direction: row;
	justify-content: space-between; 
}

.mas {
	display: flex;
	flex-direction: row;
	justify-content: center; 
}

.streak p, .corr p{
	background-color:transparent;
	font-size: 17px;
	color: <?php echo $watermelon; ?>;
	font-weight: bold;
	font-family: "Segoe UI";
	margin: 20px 0 ; 
}
/* information button*/
.topr button{
	padding: 6px 10px;
	border-radius: 50%;
	color:  <?php echo $watermelon; ?>;
	background-color: transparent;
	font-size: 13px;
	outline: none;
	border: none; 
	margin: 20px 10px; 		
}

.topr button:hover{
	background-color: <?php echo $watermelon; ?>;
	color: <?php echo $green; ?>;
}
/* TITLES AND SUBTITLES */


p.title , .infotitle{
	color: <?php echo $watermelon; ?>;
	font-family: "Segoe UI";
	font-size: 20px;
	align-self:center;
	margin: 20px 20px ; 
}

 .infosub{
	color: <?php echo $green2?>;
	font-family: "Segoe UI";
	text-align: center;
	font-size: 15px;
	margin: 5vh 0vw;
}

/* MAIN MENU E.G. INVASIVES, ROCKS ETC */

.menu{
	height: 70px; 
}

.button1 , .inputaddon, select, .pressed, .spacer , .title{
	float: left; 
	height: 70px; 
	border: none; 
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  color: <?php echo $watermelon; ?>;
  background-color: transparent;
  border:  none; // 2px solid <?php echo $watermelon; ?>;
 font-family: "Segoe UI";
 outline: none;
 	font-weight: bold;
	transition: all 0.3s ease;
	padding: 0px 20px;


}

.title{
	font-size: 10px; 
	font-weight: bold; 

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
.spacer{
	width: 10px; 
	padding: 0 0 ;
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
	color: <?php echo $dark; ?>;
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
