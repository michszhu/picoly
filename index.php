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

	<!-- MAIN  -->
	<div class = "main">
	
		<!-- MAIN IMAGE  -->
		<img src=
				"<?php
				if (isset ($_SESSION ['key']))
					echo $_SESSION ['img'];
				else
					echo 'imgs/loadingfood.gif';
				?>" onerror = 'imgs/loadingfood.gif' alt="FAILL" >
				
	<form action = "" method = "post" >
		<!-- USER'S ANSWER TEXTBOX  -->
		<input type = "text" name = "textbox" autocomplete = "off" placeholder = 
				"<?php 
				if (isset ($_SESSION['show']) && $_SESSION ['show']==true)   // show the correct answer
					echo getName(); 
				else if (empty ($_POST ['textbox'])&&isset ($_SESSION ['key']))   // no answer typed 
					echo 'answer here';
				else if (!isset ($_SESSION ['key']))  // no set is picked
					echo 'pick a category!';
				?>" <?php if (isset ($_SESSION ['key'])) echo "autofocus"; ?> >
				
		<div class = "space"> </div>
		
		<!-- USER NAVIGATION  -->
		<div class = "nav">
			<button name = "submit" style="display: none;" > <i class="fa fa-check"></i> </button>
			<button name = "skip"> <i class="fa fa-chevron-right"></i>  </button>
			<button name = "freeans"> <i class="<?php
				if (isset ($_SESSION ['show']) && $_SESSION ['show'] == true)
					echo 'fa fa-eye';
				else
					echo 'fa fa-eye-slash';
				?> " ></i>  </button>
			<button name = "website" onClick = "window.open ('<?=$_SESSION ["context"]?>');"> <i class="fa fa-rocket"></i>  </button>
			<button name = "github" onClick = "window.open ('https://github.com/michzzzm/picoly');"> <i class="fa fa-github"></i>  </button>

		</div>
	</form>
	
	</div>

	
	
	<!-- SIDEBAR  -->
	<div class = "sidebar">
		<div class = "space"> </div>
		
		<div class = "top">
			<div class = "topl">
				<div class = "mas">	
				
					<!-- STREAK  -->
					<div class = "streak"> <p>  
						<?php 
						if (isset ($_SESSION ['streak']) && $_SESSION['streak']>2)
							echo $_SESSION ['streak'] . "<i class='em em-fire'></i>" ; 
						?>
					</p> 
					</div>
					
					<!-- RIGHT OR WRONG EMOJIS  -->
					<div class = "corr"> <p> 
						<?php 
						if (isset ($_SESSION ['check'])) {
							if ($_SESSION['check']==1) // CORRECT 
								echo "<i class='em em-snowman'></i>"; 
							if ($_SESSION['check']==0) //INCORRECT
								echo  "<i class='em em-dizzy_face'></i>";
						}
						?>  
					</p>
					</div>   
				</div>
			</div>
			
			<!-- MAIN TITLE  -->
			<p class = "title"> PICOLY </p>
			
			<!-- INFO  -->
			<div class = "topr">
				<div> <button name = "info" id="myBtn"> <i class="fa fa-question"></i>  </button> </div>
			</div>
		</div>
		
		
		<!-- SUB TITLE  -->
		<p class = "subtitle"> v.2016-17 </p>
		
		
		<!-- MENU BUTTONS -->
		<form action = "" method = "post" >
			<div class = "menu">
				<button name = "invasives" class = <?php if (isset ($_SESSION ['key']) && $_SESSION['key'] == $_SESSION['invasiveskey']) echo 'pressed'; else echo 'button1';?> > invasives  </button>
				<button name = "anat" class = "button1" > a&p diseases </button>
				<button name = "microbe" class = <?php if (isset ($_SESSION ['key']) && $_SESSION['key'] == $_SESSION['microbekey']) echo 'pressed'; else echo 'button1';?> > microbe diseases </button>
				<button name = "rocks" class = <?php if (isset ($_SESSION ['key']) && $_SESSION['key'] == $_SESSION['rockskey']) echo 'pressed'; else echo 'button1';?> > rocks </button>
				<button name = "more" class = "button1" > + </button>
			</div>	
			<div class = "space"> </div>
		</form>
		
	</div>
	
	
	
</div>
		


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <p class = "infotitle">INFO</p>
	<p class = "infosub"> Sets pulled from 
		<a href= "https://drive.google.com/drive/folders/0B9m30q2Odd2YYnpfX3hTUndLNk0?usp=sharing" target= "_blank"> here </a>
		<br>An option to add your own sheets may be created if and when I am in the mood to figure it out!<br>

		<br>
		<br> <b class = red><i class="fa fa-chevron-right"></i></b> skip
		<br> <b class = red><i class="fa fa-eye"></i></b> show answer
		<br> <b class = red><i class="fa fa-rocket"></i> </b> opens a website with the species !
		<br> <b class = red><i class="fa fa-github"></i> </b> source code
		<br> <b ><i class='em em-snowman'></i> </b> your answer was correct
		<br> <b ><i class='em em-dizzy_face'></i> </b> your answer was incorrect
		<br> <b ><i class='em em-fire'></i> </b> STREAKKK 3+  :))
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>		
		
		
</body>
</html>
