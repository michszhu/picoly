<?php 
session_start();   // bc session variables
?>


<?php

$_SESSION ['invasiveskey'] = makeKey ('https://docs.google.com/spreadsheets/d/1Y_4Zi1yQC3yFSqaI9ODL_Cg5rLAuGEhp69l-BC2bHg8/edit#gid=0');
$_SESSION ['microbekey'] = makeKey ('https://docs.google.com/spreadsheets/d/1yEIn5lkZv-plluXnTBdOWKeH4S2kzX5DxCqIA7cnWgc/edit#gid=0');
$_SESSION ['rockskey'] = makeKey ('https://docs.google.com/spreadsheets/d/18tbjKAAlcLOWXR50HCVIjF05zlCqn97G6rIKHS-nP0Q/edit#gid=0');



/* TO BEGIN WITH NEW GAME - gets the very first image */ 
if (!isset ($_SESSION ['count'])){
	if (isset ($_SESSION ['key'])){
		$_SESSION ['count'] = 1; 
		dostuff();		
	}
//	echo "complete refresh";
}

/* AFTER NEW GAME IS BEGUN */
else {
	/* check user input on press enter button */
	if (isset ($_POST ['submit'])  ){
		/* empty submit */
		if (empty ($_POST ['textbox'])){
			unset ($_SESSION ['check']);
			$_SESSION ['streak'] = 0;
		}
		/* correct submit */
		else if (in_array ( strtolower ($_POST['textbox']), $_SESSION['names'])){
			dostuff();
			$_SESSION['check'] = 1;
			$_SESSION ['streak'] = 	$_SESSION ['streak'] + 1;
		}
		/* incorrect submit */
		else{
			$_SESSION['check'] = 0;	
			$_SESSION ['streak'] = 0;	
		}
	}
	
	/* skip button */
	if (isset ($_POST ['skip'])){
		dostuff();
		$_SESSION ['streak'] = 0;
	}
	
	/* show answer button not clicked */	
	if (!isset ($_POST['freeans']) ) {
		$_SESSION ['show'] = false;
	//	unset ($_SESSION['check']);  //???/??
	}	
	/* show answer button clicked */
	if (isset ($_POST['freeans']) ) {
		$_SESSION ['show'] = true;
		// $_SESSION ['names'][0] . " / " . $_SESSION ['names'][1] ;
		$_SESSION ['streak'] = 0;
		unset ($_SESSION['check']);
	}
}


////////////////////////////////////////////////////////////////////////////////////

/* CLICK MAIN MENU BUTTONS */
if (isset ($_POST ['invasives']) ){
	if ( !isset ($_SESSION ['key']) || $_SESSION['key'] != $_SESSION['invasiveskey'] ){
		setKey ($_SESSION['invasiveskey']);
		dostuff();
	}
	else if ( $_SESSION['key'] == $_SESSION['invasiveskey'] ){
		unsetKey ();
	}
}

else if (isset ($_POST ['anat'])){
	
}
else if (isset ($_POST ['microbe'])){
	if ( !isset ($_SESSION ['key']) || $_SESSION['key'] != $_SESSION['microbekey'] ){
		setKey ($_SESSION['microbekey']);
		dostuff();
	}
	else if ( $_SESSION['key'] == $_SESSION['microbekey'] ){
		unsetKey ();
	}
}
else if (isset ($_POST ['rocks'])){
	if ( !isset ($_SESSION ['key']) || $_SESSION['key'] != $_SESSION['rockskey'] ){
		setKey ($_SESSION['rockskey']);
		dostuff();
	}
	else if ( $_SESSION['key'] == $_SESSION['rockskey'] ){
		unsetKey ();
	}
}
else if (isset ($_POST ['diy'])){
}

////////////////////////////////////////////////////////////////////////////////////

/* STUFF TO DO PER NEW SPECIES */
function dostuff (){
	/* GET AND SET STUFF*/
	$_SESSION ['names'] = name ($_SESSION ['arr']); // get names
//	var_dump ( $_SESSION ['names']);
//	echo $_SESSION ['names'][0] . " / " . $_SESSION ['names'][1] ;
	$urls = img ($_SESSION ['names'][0], 20); // get img url from api google image search of the name
	$_SESSION ['img'] = $urls [0]; // the main image url
	$_SESSION ['context'] = $urls [1]; // the url of the website that the image comes from
//	echo $_SESSION ['img'];
//	echo $_SESSION ['context'];

	/* GAME RELATED VARIABLES */
	$_SESSION ['show'] = false;  // hide the names
	if (!isset ($_SESSION ['count']))
		$_SESSION ['count'] = 1;  // on game start
	else
		$_SESSION ['count'] = 1+ $_SESSION['count']; 
	unset ($_SESSION ['check']);  // user's answer is not checked
}


////////////////////////////////////////////////////////////////////////////////////

/* GET THE NAMES AND ALTERNATVE NAMES FROM A RANDOM IMAGE */
function name ($arr){
	$index = rand (0,count ($arr ['Sheet1'])-1);  // index of random name
	$names = array (); // all the names
	
	$name = $arr ['Sheet1'] [$index]['hard'];
	if ($name == "")
		name ($arr);
	if (strpos ($name , ',') == FALSE)
		$names [] = $name;
	else {
		$pieces = explode (',' , $name);
		$names = array_merge ($names, $pieces);
	}
	
	$alts = $arr ['Sheet1'] [$index]['medium'];
	if (strpos ($alts , ',') == FALSE)
		$names [] = $alts;
	else {
		$pieces = explode (',' , $alts);
		$names = array_merge ($names, $pieces);
	}
	
	$names = array_map('strtolower', $names);
	array_walk($names, 'trim_value'); // removes spaces
	return $names; 
}
function trim_value(&$value) { 
    $value = trim($value); 
}
function getName (){
	return $_SESSION ['names'][0] . " / " . $_SESSION['names'][1];
}

/* GET A RANDOM IMAGE URL FOR THE NAME */
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

////////////////////////////////////////////////////////////////////////////////////

/* TAKE OUT KEY FROM GOOGLE SHEETS URL */
function makeKey ($url){
	return substr ($url , (strrpos ($url, "/d/")+3) , (strrpos ($url, "edit")-1) - (strrpos ($url, "/d/")+3) ) ; 
}

/* GET EVERYTHING FROM GOOGLE SHEETS USING THE KEY */
function sheets ($key){
	$url = 'https://script.google.com/macros/s/AKfycbxOLElujQcy1-ZUer1KgEvK16gkTLUqYftApjNCM_IRTL3HSuDk/exec?id='
		.  $key. '&sheet=Sheet1';
	$result = file_get_contents($url);
	$arr = json_decode($result, true);
	return $arr;
}

/* SET KEY, GET EVERYTHING FROM SHEETS, RESTART GAME */
function setKey($key){	
	// $key = substr ($url , (strrpos ($url, "/d/")+3) , (strrpos ($url, "edit")-1) - (strrpos ($url, "/d/")+3) );
//	echo $key; 
	$_SESSION ['key'] = $key;
	$_SESSION ['arr'] = sheets ($_SESSION ['key']);
	unset ($_SESSION ['count']);
}
function unsetKey(){	
	unset ($_SESSION ['key']);
}


?>
