<?php 
$watermelon = "#F23E3F";
$green = "#ced957";
$green2 = "#B9C34E";
$dark = "#a9a9a9";
$light = "#EEF0DB";

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
<?php

// setKey ('1Y_4Zi1yQC3yFSqaI9ODL_Cg5rLAuGEhp69l-BC2bHg8');

if (isset ($_POST ['invasives'])){
//	echo 'done';
	setKey ( 'https://docs.google.com/spreadsheets/d/1Y_4Zi1yQC3yFSqaI9ODL_Cg5rLAuGEhp69l-BC2bHg8/edit#gid=0');
}
else if (isset ($_POST ['anat'])){
	
}
else if (isset ($_POST ['microbe'])){
	setKey ('https://docs.google.com/spreadsheets/d/1yEIn5lkZv-plluXnTBdOWKeH4S2kzX5DxCqIA7cnWgc/edit#gid=0');
}
else if (isset ($_POST ['rocks'])){
}
else if (isset ($_POST ['diy'])){
}

if (!isset ($_SESSION ['count'])){
	$_SESSION ['count'] = 1; 
	dostuff();
//	echo "complete refresh";
}

else {
	if (isset ($_POST ['submit'])  ){
		if (empty ($_POST ['textbox'])){
			$_SESSION ['check'] = -1;
			$_SESSION ['streak'] = 0;
		}
		else if (in_array ($_POST['textbox'], $_SESSION['names'])){
			dostuff();
//			echo "correct";
			$_SESSION['check'] = 1;
			$_SESSION ['streak'] = 	$_SESSION ['streak'] + 1;
		}
		else{
			$_SESSION['check'] = 0;	
			$_SESSION ['streak'] = 0;	
		}
	}

	if (isset ($_POST ['skip'])){
		dostuff();
		$_SESSION ['streak'] = 0;
	}

	if (isset ($_POST['freeans']) ) {
		$_SESSION ['show'] = true;
		// $_SESSION ['names'][0] . " / " . $_SESSION ['names'][1] ;
		$_SESSION ['streak'] = 0;
	}

	if (isset ($_POST ['website'])){
		echo '<script type="text/javascript" language="javascript"> 
		window.open("' . $_SESSION['context'] .'"); 
		</script>'; 
	}
}

function sheets ($key){
	$url = 'https://script.google.com/macros/s/AKfycbxOLElujQcy1-ZUer1KgEvK16gkTLUqYftApjNCM_IRTL3HSuDk/exec?id='
		.  $key. '&sheet=Sheet1';

	$result = file_get_contents($url);
	$arr = json_decode($result, true);
	return $arr;
}

function dostuff (){
	$_SESSION ['names'] = name ($_SESSION ['arr']);
//	var_dump ( $_SESSION ['names']);
//	echo $_SESSION ['names'][0] . " / " . $_SESSION ['names'][1] ;

	$urls = img ($_SESSION ['names'][0], 10);
	$_SESSION ['img'] = $urls [0];
	$_SESSION ['context'] = $urls [1];
//	echo $_SESSION ['img'];
//	echo $_SESSION ['context'];

	$_SESSION ['show'] = false;
	$_SESSION ['count'] = 1+ $_SESSION['count'];
	$_SESSION ['check'] = -1;
}

function setKey($url){	
	$key = substr ($url , (strrpos ($url, "/d/")+3) , (strrpos ($url, "edit")-1) - (strrpos ($url, "/d/")+3) );
//	echo $key; 
	$_SESSION ['key'] = $key;
	$_SESSION ['arr'] = sheets ($_SESSION ['key']);
	unset ($_SESSION ['count']);
}

function name ($arr){
	$index = rand (0,count ($arr ['Sheet1'])-1);
	$name = $arr ['Sheet1'] [$index]['name'];
	$names = array (trim ($name));
	
	$alts = $arr ['Sheet1'] [$index]['alts'];
	if (strpos ($alts , ',') == FALSE)
		$names [] = $alts;
	else 
		while (strpos ($alts, ',') != FALSE){
			$names [] = trim (substr ($alts, 0, strpos ($alts , ',')));
			$alts = substr ($alts , strpos ($alts , ',')+1);
		}
	return $names; 
}

function getName (){
	return $_SESSION ['names'][0] . " / " . $_SESSION['names'][1];
}

function img ($name , $num){
	$url = 'http://api.ababeen.com/api/images.php?q='. str_replace (' ', '+', $name) .'&count=' . $num;
//	echo $url;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($ch);
	curl_close($ch);
	
	$result = json_decode($result, true);

	$index = rand (1, $num); 
	return array ($result [$index] ["url"],  $result [$index] ["originalContextUrl"]);
}


?>
<div class = "container">

	<div class = "main">
		<img src="<?=$_SESSION ['img']?>" alt="FAILL" >
			<form action = "" method = "post" >
				<input type = "text" name = "textbox" autocomplete = "off" placeholder = 
						"<?php 
						if (isset ($_SESSION['show']) && $_SESSION ['show']==true) 
							echo getName(); 
						?>">
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
