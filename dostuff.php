<?php 
session_start();
?>


<?php

// setKey ('1Y_4Zi1yQC3yFSqaI9ODL_Cg5rLAuGEhp69l-BC2bHg8');

if (isset ($_POST ['invasives'])){
//	echo 'done';
	setKey ( 'https://docs.google.com/spreadsheets/d/1Y_4Zi1yQC3yFSqaI9ODL_Cg5rLAuGEhp69l-BC2bHg8/edit#gid=0');
	dostuff();
}
else if (isset ($_POST ['anat'])){
	
}
else if (isset ($_POST ['microbe'])){
	setKey ('https://docs.google.com/spreadsheets/d/1yEIn5lkZv-plluXnTBdOWKeH4S2kzX5DxCqIA7cnWgc/edit#gid=0');
	dostuff();
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
			unset ($_SESSION ['check']);
			$_SESSION ['streak'] = 0;
		}
		else if (in_array ( strtolower ($_POST['textbox']), $_SESSION['names'])){
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
		unset ($_SESSION['check']);
	}

	/*if (isset ($_POST ['website'])){
		echo '<script type="text/javascript" language="javascript">    // fixed to onclick -> no popups 
		window.open("' . $_SESSION['context'] .'" ); 
		</script>'; 
	}  */
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
	var_dump ( $_SESSION ['names']);
//	echo $_SESSION ['names'][0] . " / " . $_SESSION ['names'][1] ;

	$urls = img ($_SESSION ['names'][0], 10);
	$_SESSION ['img'] = $urls [0];
	$_SESSION ['context'] = $urls [1];
//	echo $_SESSION ['img'];
//	echo $_SESSION ['context'];

	$_SESSION ['show'] = false;
	if (!isset ($_SESSION ['count']))
		$_SESSION ['count'] = 1;
	else
		$_SESSION ['count'] = 1+ $_SESSION['count'];
	unset ($_SESSION ['check']);
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
	$names = array ($name);
	
	$alts = $arr ['Sheet1'] [$index]['alts'];
	if (strpos ($alts , ',') == FALSE)
		$names [] = $alts;
	else {
		$pieces = explode (',' , $alts);
		$names = array_merge ($names, $pieces);
	}
	
	$names = array_map('strtolower', $names);
	array_walk($names, 'trim_value');
	return $names; 
}

function trim_value(&$value) 
{ 
    $value = trim($value); 
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
