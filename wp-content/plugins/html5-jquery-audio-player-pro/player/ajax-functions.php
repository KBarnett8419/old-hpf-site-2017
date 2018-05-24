<?php
function implement_ajax(){

sleep(2);
 global $wpdb;
 $table		=	$wpdb->prefix."hmp_songs";	
 
 $playlist_name		=	$_POST['playlist_name'];
 $mp3				=	$_POST['mp3'];
 $ogg				=	$_POST['ogg'];
 $title				=	$_POST['title'];
 $price				=	$_POST['price'];
 $buyp				=	$_POST['buyp'];
 $buyyp				=	$_POST['buyyp'];
 $buyyyp			=	$_POST['buyyyp'];
 $cover				=	$_POST['cover'];
 $duration			=	$_POST['duration'];
 $artist			=	$_POST['artist'];

$buyp				=	str_replace("amp;","&",$buyp);
$buyyp				=	str_replace("amp;","&",$buyyp);
$buyyyp				=	str_replace("amp;","&",$buyyyp);
$data	=	array(
				'playlist_name' 		=> $playlist_name,
				'ogg' 					=> $ogg,
				'mp3' 					=> $mp3,
				'title' 				=> $title,
				'buy' 					=> $buyp,
				'buyy' 					=> $buyyp,
				'buyyy' 				=> $buyyyp,
				'price' 				=> $price,
				'cover' 				=> $cover,
				'duration' 				=> $duration,
				'artist' 				=> $artist

				);

$insert		=	$wpdb->insert($table,$data) or die(mysql_error());
die();
  
   
}


function implement_ajax1(){

sleep(2);
 global $wpdb;
 $table		=	$wpdb->prefix."hmp_songs";	
 
 $ID				=	$_POST['song_id'];
 $playlist_name		=	$_POST['playlist_name'];
 $mp3				=	$_POST['mp3'];
 $ogg				=	$_POST['ogg'];
 $title				=	$_POST['title'];
 $price				=	$_POST['price'];
 $buyp				=	$_POST['buyp'];
 $buyyp				=	$_POST['buyyp'];
 $buyyyp			=	$_POST['buyyyp'];
 $cover				=	$_POST['cover'];
 $duration			=	$_POST['duration'];
 $artist			=	$_POST['artist'];
$buyp				=	str_replace("amp;","&",$buyp);
$buyyp				=	str_replace("amp;","&",$buyyp);
$buyyyp				=	str_replace("amp;","&",$buyyyp);

$wpdb->update( 
	$table, 
	array(
				'playlist_name' 		=> $playlist_name,
				'ogg' 					=> $ogg,
				'mp3' 					=> $mp3,
				'title' 				=> $title,
				'buy' 					=> $buyp,
				'buyy' 					=> $buyyp,
				'buyyy' 				=> $buyyyp,
				'price' 				=> $price,
				'cover' 				=> $cover,
				'duration' 				=> $duration,
				'artist' 				=> $artist

				), 
	array( 'ID' => $ID ) 
	
);


die();
  
   
}

function implement_ajax2(){

global $wpdb;
$table		=	$wpdb->prefix."hmp_songs";


$dbaction				=	$_POST['dbaction'];
$order					=	$_POST['order'];
$order					=	str_replace("recordsArray_","",$order);
$updateRecordsArray		=	explode(",",$order);
print_r($updateRecordsArray);

if ($dbaction == "updateRecordsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		
		$query = "UPDATE  $table SET list_order ='$listingCounter' WHERE id = '$recordIDValue'";
		mysql_query($query) or die(mysql_error());
		$listingCounter = $listingCounter + 1;	
	}
	
}else{
	echo "wrong";	
}

die();
  
   
} 


function implement_ajax3(){

global $wpdb;
$table		=	$wpdb->prefix."hmp_songs";

$songid		=	$_POST['songid'];
//echo $songid;

$wpdb->query("DELETE FROM $table WHERE id='$songid'");


die();
  
   
}

function implement_ajax4(){
sleep(1);
global $wpdb;
$table		=	$wpdb->prefix."hmp_songs";

$ID			=	$_POST['qSaveId'];


$wpdb->update( 
	$table, 
	array(
				'title' 				=> $_POST['qtitle'],
				'buy' 					=> $_POST['qbutton1'],
				'buyy' 					=> $_POST['qbutton2'],
				'buyyy' 				=> $_POST['qbutton3'],
				'price' 				=> $_POST['qprice'],
				'cover' 				=> $_POST['qcover'],
				'duration' 				=> $_POST['qduration'],
				'artist' 				=> $_POST['qartist']

				), 
	array( 'ID' => $ID ) 
	
) or die(mysql_error());

die();
  
   
}


function implement_ajax5(){

global $wpdb;
$table		=	$wpdb->prefix."hmp_songs";
$table1		=	$wpdb->prefix."hmp_rating";

$song_title		=	$_POST['trackname'];
$rating_value	=	$_POST['rating'];	

$songres	=	$wpdb->get_row("SELECT * FROM $table WHERE `title`='$song_title'") or die(mysql_error());
$song_id	=	$songres->id;
$total_votes=	$songres->total_votes;
$total_votes=	$total_votes+1;

$ip			=	$_SERVER['REMOTE_ADDR'];


$data	=	array(
			'song_id' => $song_id,
			'rating_value' => $rating_value,
			'user_ip' => $ip
);


$check	=	$wpdb->get_results("SELECT * FROM $table1 WHERE song_id='$song_id' AND user_ip='$ip'");
if(!$check){

$insert	=	$wpdb->insert($table1,$data);
	

$wpdb->update( 
	$table, 
	array(
				'total_votes' 				=> $total_votes,
				), 
	array( 'ID' => $song_id ) 
	
) or die(mysql_error());
echo 'Thank You';
}else{echo 'Already rated';}	
	


die();
  
   
}