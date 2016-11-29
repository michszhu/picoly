<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="attempt2css.php">
</head>


<body>
	
<?php include 'dostuff.php';?>
	

	
<div class = "container">

	<div class = "main">
		<img src="<?=$_SESSION ['img']?>" alt="FAILL" >
			<form action = "" method = "post" >
				<input type = "text" name = "textbox" autocomplete = "off" placeholder = 
						"<?php 
						if (isset ($_SESSION['show']) && $_SESSION ['show']==true) 
							echo getName(); 
						else if (empty ($_POST ['textbox']))
							echo 'ANSWER';
						 ?>
						 ">
				<div class = "space"> </div>
				<div class = "nav">
					<button name = "submit"> <i class="fa fa-check"></i> </button>
					<button name = "skip"> <i class="fa fa-chevron-right"></i>  </button>
					<button name = "freeans"> <i class="fa fa-eye"></i>  </button>
					<button name = "website"> <i class="fa fa-rocket"></i>  </button>
					<button name = "settings"> <i class="fa fa-cog"></i>  </button>
				</div>
			</form>
	</div>

	<div class = "sidebar">
		<form action = "" method = "post" >
			<div class = "space"> </div>
			<div class = "top">
				<div class = "topl">
					<div class = "mas">	
						<div class = "two"> <p> <i class="em em-fire"></i> <?php echo $_SESSION ['streak']; ?></p> </div>
						<div class = "three"> <p> <?php 
							if (isset ($_SESSION ['check'])) {
								if ($_SESSION['check']==1) 
									echo "<i class='em em-snowman'></i>"; 
								if ($_SESSION['check']==0) 
									echo  "<i class='em em-dizzy_face'></i>";
							}
						?>  </p>
						</div>   
					</div>
				</div>
				<p class = "title"> PICOLY </p>
				<div class = "topr">
					<div> <button name = "info"> <i class="fa fa-question"></i>  </button> </div>
				</div>
			</div>
			<p class = "subtitle"> v.2016-17 </p>
	
			<div class = "menu">
				<button name = "invasives"> invasives </button>
				<button name = "anat"> a&p diseases </button>
				<button name = "microbe"> microbe diseases </button>
				<button name = "rocks"> rocks </button>
				<button name = "diysubmit"> + </button>
			</div>	
			<div class = "space"> </div>
			<div class = "space"> </div>

		</form>
</div>

</body>
</html>
