
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
		<img src=
				"<?php
				if (isset ($_SESSION ['key']))
					echo $_SESSION ['img'];
				else
					echo 'imgs/loadingfood.gif';
				?>" onerror = 'imgs/loadingfood.gif' alt="FAILL" >
		<form action = "" method = "post" >
			<input type = "text" name = "textbox" autocomplete = "off" placeholder = 
					"<?php 
					if (isset ($_SESSION['show']) && $_SESSION ['show']==true) 
						echo getName(); 
					else if (empty ($_POST ['textbox'])&&isset ($_SESSION ['key']))
						echo 'answer here';
					else if (!isset ($_SESSION ['key']))
						echo 'pick a category!';
					?>" autofocus>
			<div class = "space"> </div>
			<div class = "nav">
				<button name = "submit"> <i class="fa fa-check"></i> </button>
				<button name = "skip"> <i class="fa fa-chevron-right"></i>  </button>
				<button name = "freeans"> <i class="<?php
					if (isset ($_SESSION ['show']) && $_SESSION ['show'] == true)
						echo 'fa fa-eye';
					else
						echo 'fa fa-eye-slash';
					?> " ></i>  </button>
				<button name = "website" onClick = "window.open ('<?=$_SESSION ["context"]?>');"> <i class="fa fa-rocket"></i>  </button>
			</div>
		</form>
	</div>

	<div class = "sidebar">
			<div class = "space"> </div>
			<div class = "top">
				<div class = "topl">
					<div class = "mas">	
						<div class = "two"> <p>  
							<?php 
							if (isset ($_SESSION ['streak']) && $_SESSION['streak']>2)
								echo $_SESSION ['streak'] . "<i class='em em-fire'></i>" ; 
							?>
						</p> 
						</div>
						<div class = "three"> <p> 
							<?php 
							if (isset ($_SESSION ['check'])) {
								if ($_SESSION['check']==1) 
									echo "<i class='em em-snowman'></i>"; 
								if ($_SESSION['check']==0) 
									echo  "<i class='em em-dizzy_face'></i>";
							}
							?>  
						</p>
						</div>   
					</div>
				</div>
				<p class = "title"> PICOLY </p>
				<div class = "topr">
					<div> <button name = "info" id="myBtn"> <i class="fa fa-question"></i>  </button> </div>
				</div>
			</div>
			<p class = "subtitle"> v.2016-17 </p>
		<form action = "" method = "post" >
			<div class = "menu">
				<button name = "invasives"> invasives </button>
				<button name = "anat"> a&p diseases </button>
				<button name = "microbe"> microbe diseases </button>
				<button name = "rocks"> rocks </button>
				<button name = "more"> + </button>
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
		<br> <b class = red><i class="fa fa-rocket"></i> </b> opens a website with the species -- but first allow popups!
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
