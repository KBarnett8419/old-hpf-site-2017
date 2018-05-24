<div id="wpbody">

<div id="wpbody-content">
		
			
		
<div class="wrap">
<h2><?php if($_GET['action']=='update'): ?>Update Song<?php else: ?>Add Songs<?php endif; ?></h2>
<div id="hmp-empty-val">Please Fill In highlighted fields</div>
<div id="hmp-special-val">No special Characters are allowed</div>
<div id="hmp-song-added">New Song Added</div>
<div id="hmp-song-updated">Song Updated Successfully</div>
<div id="hmp-ajax-loader"><?php echo '<img src="' .plugins_url( 'ajax-loader.gif' , __FILE__ ). '" height="19" width="220" > '; ?></div>

<?php

require 'ajax-calls.php';
global $wpdb;
$table		=	$wpdb->prefix."hmp_songs"; // add quote marks //

if(isset($_GET['id'])){
	$id		=	$_GET['id'];
}



$action		=	"add";
if(isset($_GET['action'])){
	$action	=	$_GET['action'];	
}





switch($action){

	case "delete";
		
		$delete		=	$wpdb->query(
							"DELETE FROM $table WHERE id='$id'"
						);
	break;
}




$usql		=	"SELECT * FROM $table WHERE id='$id'";
$uresults 	= 	$wpdb->get_row( $usql  );


?>

<?php if($action=='update'): ?>

	<?php require 'songs/update-song.php'; ?>

<?php else:?>

	<?php require 'songs/add-song.php'; ?>

<?php endif ?>

<?php //require 'songs/song-list.php'; ?>
</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div>