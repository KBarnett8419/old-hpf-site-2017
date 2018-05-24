<div id="wpbody">

<div id="wpbody-content">
		
			
		
<div class="wrap">
<div id="icon-edit" class="icon32 icon32-posts-post"><br></div><h2>Manage Playlists <a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_playlist&action=add" class="add-new-h2">Add New</a></h2>
<?php


global $wpdb;
$table		=	$wpdb->prefix."hmp_playlists"; // add quote marks //
$table1		=	$wpdb->prefix."hmp_songs";

if(isset($_GET['id'])){
	$id		=	$_GET['id'];
}
if($_GET['name']){
$name	=	$_GET['name'];

}



if(isset($_GET['action'])){
	$action	=	$_GET['action'];	
}





switch($action){
	
	case "add";
		if($_POST['submit']){
	$playlist_name				=	$_POST['playlist_name'];
	$playlist_description		=	$_POST['playlist_description'];
	
	$shortcode	=	str_replace(" ","_", $playlist_name);
	$shortcode	=	'[hmp_player playlist="'.$shortcode.'"]'; 
	
	
	
$data	=	array(
				'playlist_name' 		=> $playlist_name,
				'shortcode' 			=> $shortcode,
				'playlist_description' 	=> $playlist_description,
				

				);
if(!empty($_POST['playlist_name'])){
	
	$insert		=	$wpdb->insert($table,$data) or die(mysql_error());
	$isuccess	=	"Playlist added successfully to the playlist";
		
}else{
	$ierror		=	"You cannot left empty Playlist Name";	
}

}


	break;
	
	
	
	case "update";
	
		
		
		if($_POST['update']){
	
	
	
	
	$playlist_name				=	$_POST['playlist_name'];
	$playlist_description		=	$_POST['playlist_description'];
	$shortcode	=	str_replace(" "," _", $playlist_name);
	$shortcode	=	'[hmp_player playlist="'.$shortcode.'"]'; 

$data	=	array(
				'playlist_name' 		=> $playlist_name,
				'shortcode' 			=> $shortcode,
				'playlist_description' 	=> $playlist_description,

				);
				
$ID		=	array(
			'id'	=>	$id
			
			);
$oldplaylist	=	array(
					'playlist_name'=>$name,
);
$data1			=	array(
					'playlist_name'=>$playlist_name,
);
if(!empty($_POST['playlist_name'])){
	
	
	
	
	$songsupdate	=	$wpdb->update($table1,$data1,$oldplaylist);	
	$update			=	$wpdb->update($table,$data,$ID);
	$usuccess	=	"Playlist updated successfully ";
	
	
		
}else{
	$uerror		=	"You cannot left empty fields Playlist Name";	
}

}
	
	break;
	
	
	
	case "delete";
		
		
		$get_name		=	$wpdb->get_row("SELECT * FROM $table WHERE id='$id'");
		$get_name		=	$get_name->playlist_name;
		
		$delete1	=	$wpdb->query(
							"DELETE FROM $table1 WHERE playlist_name='$get_name'"
						);
		$delete		=	$wpdb->query(
							"DELETE FROM $table WHERE id='$id'"
						);
	break;	
}




$usql		=	"SELECT * FROM $table WHERE id='$id'";
$uresults 	= 	$wpdb->get_row( $usql  );


?>

<?php if($action=='update'): ?>

	
<?php require 'update-list.php'; ?>





<?php elseif($action=='add'):?>




<?php require 'add-new.php'; ?>	

<?php else: ?>

<?php require 'list-playlists.php'; ?>
<?php endif; ?>
</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div>