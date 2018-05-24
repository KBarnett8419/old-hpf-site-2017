<?php
/*
Plugin Name: HTML5 jQuery Audio Player Pro
Plugin URI: http://wordpress.org/extend/plugins/html5-jquery-audio-player/
Description: The trendiest audio player plugin for WordPress. Works on iPhone/iPad and other mobile devices.
Author: Enigma Digital
Version: 2.3
Author URI: http://www.enigmaweb.com.au/plugins/html5-jquery-audio-pro/
*/
// Load the auto-update class

/*
//jetpack activation check
register_deactivation_hook( __FILE__, 'reset_notice' );
function reset_notice(){
	delete_option( 'dismiss-notice' );	
} 
$jetpack = 'jetpack/jetpack.php';
$active_plugins = get_option('active_plugins');
if(in_array($jetpack,$active_plugins)){
	function _my_plugin_php_warning() {
    echo '<div id="message" class="error">';
    echo '  <p>NOTICE: There is a known conflict with the following modules of Jetpack (publicize and sharing). We are working on a solution but for now please disable these modules to enjoy HTML5 jQuery Audio Player. 
	<form method="post" action="options.php">
	<input type="hidden" value="1" name="dismiss-notice"><input type="submit" name="submit" id="submit" style="border:none; color:red; font-weight:bold;background-color:none; cursor:pointer;"  value="DISMISS">
	';
	settings_fields( 'baw-settings-group' );
	
	
	echo '</form></p>';
    echo '</div>';
	
	}
	$notice_option	=	get_option('dismiss-notice');
	if(!$notice_option){
		add_action('admin_notices', '_my_plugin_php_warning');
	}

}
*/

add_filter('widget_text', 'do_shortcode');
add_action('init', 'hmp_activate_au');
function hmp_activate_au()
{
    require_once ('wp_autoupdate.php');
    $hmp_plugin_current_version = '2.3';
	
    $hmp_plugin_remote_path = 'http://www.enigmaweb.com.au/plugins/html5-jquery-audio-pro/kJ7gwLSz3ju/update.php';
    $hmp_plugin_slug = plugin_basename(__FILE__);
    new wp_auto_update ($hmp_plugin_current_version, $hmp_plugin_remote_path, $hmp_plugin_slug);
}

require 'includes/db-settings.php';
require 'hmp_widget.php';

add_action('plugins_loaded','hmp_db_create_rating');
add_action('plugins_loaded','hmp_db_create_playlist');
add_action('plugins_loaded','hmp_db_create_songs');


function pro_scripts_method() {
    $query = $_SERVER['PHP_SELF'];
	wp_enqueue_script('jquery');
	//wp_deregister_script( 'hmp-jquery' );
	//wp_register_script( 'hmp-jquery', "http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
	
	wp_deregister_script( 'hmp-custom-js' );
	wp_register_script( 'hmp-custom-js', plugin_dir_url( __FILE__ )."player/js/hmp-custom.js");
	wp_enqueue_script( 'jquery-ui-sortable' );
	
	//wp_deregister_script( 'jquery-sortable' );
	//wp_register_script( 'jquery-sortable', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js');
    wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	
	if(strpos($query,'admin.php')!==false){
		//wp_enqueue_script('hmp-jquery');
		wp_enqueue_script( 'hmp-custom-js' );
		//wp_enqueue_script( 'jquery-sortable' );
		
			
	}
	wp_register_style( 'hmp-style', plugin_dir_url( __FILE__ )."/includes/css/hmp-style.css");
    wp_enqueue_style( 'hmp-style' );
	wp_enqueue_style('thickbox');
}    
 
add_action('admin_enqueue_scripts', 'pro_scripts_method');
function load_jquery(){
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');
add_action( 'admin_menu', 'pro_plugin_menu' );




function pro_plugin_menu() {
	add_menu_page( 'HTML5 MP3 Player', 'HTML5 Player +', 'manage_options', 'hmp-options', 'wp_hmp_options',plugin_dir_url( __FILE__ )."/music-beam.png" );
	add_submenu_page('hmp-options','','','manage_options','hmp-options','wp_hmp_options');
	add_submenu_page('hmp-options','Display Settings','Display Settings','manage_options','display_settings','wp_hmp_options');
	add_submenu_page( 'hmp-options', 'Manage Playlists', 'Manage Playlists', 'manage_options', 'hmp_playlist', 'wp_hmp_playlist' );
	add_submenu_page( 'hmp-options', 'Add Songs', 'Add Songs', 'manage_options', 'hmp_songs', 'wp_hmp_songs' );
	
}


add_action( 'admin_init', 'register_mysettings' );

function register_mysettings() {
	register_setting( 'baw-settings-group', 'ratings' );
	register_setting( 'baw-settings-group', 'autoplay' );
	register_setting( 'baw-settings-group', 'buy_text' );
	register_setting( 'baw-settings-group', 'buy_active' );
	register_setting( 'baw-settings-group', 'buyy_text' );
	register_setting( 'baw-settings-group', 'buyy_active' );
	register_setting( 'baw-settings-group', 'buyyy_text' );
	register_setting( 'baw-settings-group', 'buyyy_active' );
	register_setting( 'baw-settings-group', 'player_width' );
	register_setting( 'baw-settings-group', 'color' );
	register_setting( 'baw-settings-group', 'showlist' );
	register_setting( 'baw-settings-group', 'tracks' );
	register_setting( 'baw-settings-group', 'currency' );
	register_setting( 'baw-settings-group', 'tcolor' );
	register_setting( 'baw-settings-group', 'dismiss-notice' );
}



function wp_hmp_options() {

include 'player/settings.php';

 }



function wp_hmp_songs(){
		
	include('player/manage-songs.php');
		
}

function wp_hmp_playlist(){
	include('playlist/manage-playlists.php');
}
function wp_hmp_player($atts){
global $wpdb;
$table		=	$wpdb->prefix.'hmp_songs';	
	
	extract( shortcode_atts( array(
		'playlist' => 'no value',
	
	), $atts ) );
	
	
	$playlist_name	=	str_replace("_", " ",$playlist);
	$palylist_table	=	$db->prefix."hmp_playlists";
	$desc_query	=	"SELECT * FROM $palylist_table WHERE playlist_name='$playlist_name'";
	$desc 		= 	$wpdb->get_row( $desc_query  );
	
	
	$nt		=	get_option('tracks');
	if(empty($nt)){
		$nt		=	0;
	}
	$ap			=	get_option('autoplay');
	if(!$ap){
		$ap		=	0;	
	}
	
	
	$bt			=	get_option('buy_text');
	$btactive	=	get_option('buy_active');		
	$bt2		=	get_option('buyy_text');
	$bt2active	=	get_option('buyy_active');	
	$bt3		=	get_option('buyyy_text');
	$bt3active	=	get_option('buyyy_active');	
	$pw			=	get_option('player_width');
	if(empty($pw)){
		$pw	=	"370px";	
	}
	if($pw>369){
		$diff		= 	$pw-370;
		$plc		=	$diff+229;
		$plc		=	$plc.'px';
		$pbr		=	$diff+168;
		$pbr		=	$pbr.'px';		
	}
	
	$cr		=	get_option('currency');
	$sl		=	get_option('showlist');
	$cl		=	get_option('color');
	$rt		=	get_option('ratings');
	
	$tc		=	get_option('tcolor'); 
	if(empty($tc)){
		$tc		=	'#cccccc';
	}
	
		
	
	if($pw){echo '<style type="text/css"> .ttw-music-player{ width:'.$pw.' !important; }.ttw-music-player .track-info, .ttw-music-player .player-controls{width:'.$plc.' !important;} .ttw-music-player .progress-wrapper{width:'.$pbr.' !important;}</style>';}
	if(!empty($cl)){ ?>
<style type="text/css">
.ttw-music-player {
background:<?php echo $cl;
?>;
!important;
}
</style>
<?php }
	if(!empty($tc)){ ?>
<style type="text/css">
.ttw-music-player .tracklist, .ttw-music-player .buy, .ttw-music-player .buyy, .ttw-music-player .buyyy, .ttw-music-player .description, .ttw-music-player .player .title, .ttw-music-player .artist, .ttw-music-player .artist-outer {
color:<?php echo $tc;
?>;
!important;
}
</style>
<?php }
	if($tc=='black'){ ?>
<style type="text/css">
.ttw-music-player .player .title, .ttw-music-player .description, .ttw-music-player .tracklist li {
	text-shadow:none !important;
}
</style>
<?php } 
	if($sl==0){ ?>
<style type="text/css">
.tracklist {
	display:none !important;
}
</style>
<?php }
	if($rt==0){ ?>
<style type="text/css">
.ttw-music-player .track-info .rating, .ttw-music-player .tracklist .rating {
	display:none !important;
}
</style>
<?php }
	if($bt3active==1 && $bt2active==1 && $btactive==1){ $rightdivwidht	=	267;  
	}elseif($bt3active==1 && $bt2active==1 && $btactive==0){ $rightdivwidht	=	227; 
	}elseif($bt3active==1 && $bt2active==0 && $btactive==1){ $rightdivwidht	=	202; 
	}elseif($bt3active==0 && $bt2active==1 && $btactive==1){ $rightdivwidht	=	194;
	}elseif($bt3active==1 && $bt2active==0 && $btactive==0){ $rightdivwidht	=	173;
	}elseif($bt3active==0 && $bt2active==1 && $btactive==0){ $rightdivwidht	=	155;
	}elseif($bt3active==0 && $bt2active==0 && $btactive==1){ $rightdivwidht	=	140;
	}elseif($bt3active==0 && $bt2active==0 && $btactive==0){ $rightdivwidht	=	102; } 
	?>
<style type="text/css">
.rightdiv {
width:<?php echo $rightdivwidht;
?>px !important;
}
</style>
<?php	
	  
	$pluginurl	=	plugin_dir_url( __FILE__ );
?>
<?php  

	
	
	$lsql		=	"SELECT * 
	FROM $table
	WHERE playlist_name = '$playlist_name'
	ORDER BY list_order ASC";
		

	$songs 	= 	$wpdb->get_results( $lsql  );
	
	
?>
<link href="<?php echo $pluginurl ; ?>includes/css/style.css" type="text/css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="<?php echo $pluginurl ; ?>includes/jquery-jplayer/jquery.jplayer.js"></script>
<?php require_once 'includes/ttw-music-player.php'; ?>
<script type="text/javascript">
	
	
	var myPlaylist = [

<?php  

	
	
	$lsql		=	"SELECT * 
	FROM $table
	WHERE playlist_name = '$playlist_name'
	ORDER BY list_order ASC";
		

	$songs 	= 	$wpdb->get_results( $lsql  );
	$rating_table	=	$wpdb->prefix.'hmp_rating';
	
if(!empty($songs)):
foreach($songs as $song): 
$song_id	=	$song->id;
if($song->total_votes==''){$song->total_votes	=	1;};
$total_ratings	=	$wpdb->get_results("SELECT `rating_value` FROM $rating_table WHERE `song_id`='$song_id'",ARRAY_N);
$sumArray = array();
foreach($total_ratings as $total_rating){

foreach($total_rating as $key=>$val){
	$sumArray[$key]+=$val;
}
}
 $final_rating	=	ceil($sumArray[0]/$song->total_votes);
?> 

   
   
    {
        mp3:'<?php echo $song->mp3; ?>',
        oga:'<?php echo $song->ogg; ?>',
        title:'<?php echo $song->title; ?>',
        artist:'<?php echo $song->artist; ?>',
		rating:'<?php echo $final_rating; ?>',
        <?php if($song->buyyy!=''): ?>
		buyyy:'<?php echo $song->buyyy; ?>',
		<?php endif; ?>
		<?php if($song->buy!=''): ?>
		buy:'<?php echo $song->buy; ?>',
		<?php endif; ?>
		<?php if($song->buyy!=''): ?>
		buyy:'<?php echo $song->buyy; ?>',
		<?php endif; ?>
		price:'<?php echo $song->price; ?>',
        duration:'<?php echo $song->duration; ?>',
        <?php if($song->cover!=''): ?>
		cover:'<?php echo $song->cover; ?>'
		<?php endif; ?>
    }, <?php endforeach ?>
	<?php else: ?>
	
	{
        mp3:'<?php echo $pluginurl; ?>player/mix/1.mp3',
        oga:'<?php echo $pluginurl; ?>player/mix/1.ogg',
        title:'Sample Track',
        artist:'Sample',
        rating:4,
        buy:'#',
        price:'1.00',
        duration:'4:50',
        cover:'<?php echo $pluginurl; ?>player/mix/1.png'
    }
	
	
	<?php endif; ?>
];

	
        jQuery(document).ready(function(){
            jQuery('#myplayer').ttwMusicPlayer(myPlaylist, {
				
				currencySymbol:'<?php echo $cr; ?>',
				<?php if($nt!=0){ ?>
				tracksToShow:<?php echo $nt; ?>,
				<?php } ?>
        		description:'<?php echo $desc->playlist_description; ?>',
				buyText:'<?php echo $bt; ?>',
				buyyText:'<?php echo $bt2; ?>',
				buyyyText:'<?php echo $bt3; ?>',
				<?php if($ap==0): ?>
				autoplay:false,
				<?php else: ?>
				autoplay:true,
				<?php endif; ?>
        		
			});
        });
 
    </script>
<?php
  $palyer_div	=	'<div id="myplayer"></div>';
return $palyer_div;

}
add_shortcode('hmp_player','wp_hmp_player');


require 'player/ajax-functions.php';





add_action('wp_ajax_my_special_ajax_call', 'implement_ajax');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'implement_ajax');//for users that are not logged in.

add_action('wp_ajax_my_special_ajax_call1', 'implement_ajax1');
add_action('wp_ajax_nopriv_my_special_ajax_call1', 'implement_ajax1');//for users that are not logged in.

add_action('wp_ajax_my_special_ajax_call2', 'implement_ajax2');
add_action('wp_ajax_nopriv_my_special_ajax_call2', 'implement_ajax2');//for users that are not logged in.

add_action('wp_ajax_my_special_ajax_call3', 'implement_ajax3');
add_action('wp_ajax_nopriv_my_special_ajax_call3', 'implement_ajax3');//for users that are not logged in.

add_action('wp_ajax_my_special_ajax_call4', 'implement_ajax4');
add_action('wp_ajax_nopriv_my_special_ajax_call4', 'implement_ajax4');//for users that are not logged in.

add_action('wp_ajax_my_special_ajax_call5', 'implement_ajax5');
add_action('wp_ajax_nopriv_my_special_ajax_call5', 'implement_ajax5');//for users that are not logged in.