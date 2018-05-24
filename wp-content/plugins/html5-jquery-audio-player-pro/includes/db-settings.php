<?php


//Database table versions
global $hmp_player_db_table_songs_version;
$hmp_player_db_table_songs_version = "2.0";

//Create database tables needed by the player
function hmp_db_create_songs () {
    hmp_create_table_songs();
}

//Create dive table
function hmp_create_table_songs(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "hmp_songs";
    global $hmp_player_db_table_songs_version;
    $installed_ver = get_option( "hmp_player_db_table_songs_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver != $hmp_player_db_table_songs_version ) {
        $sql = "CREATE TABLE " . $table_name . " (
              `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              `list_order` INT( 9 ) NOT NULL,
			  `playlist_name` TEXT NOT NULL,
			  `mp3` TEXT NOT NULL,
              `ogg` TEXT NOT NULL,
              `title` TEXT NOT NULL,
              `buy` TEXT NOT NULL,
			  `buyy` TEXT NOT NULL,
			  `buyyy` TEXT NOT NULL,
			  `price` VARCHAR( 50 ) NOT NULL,
			  `cover` TEXT NOT NULL,
			  `duration` TEXT NOT NULL,
			  `artist` TEXT NOT NULL,
			  `total_votes` TEXT NOT NULL,
              UNIQUE KEY id (id)
            );";
		
		//$result = mysql_query("SHOW COLUMNS FROM $table_name WHERE COLUMN_NAME='total_rating'");
		//if($result){
		
		//}
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
		$result = mysql_query("SHOW COLUMNS FROM wp_hmp_songs WHERE field ='total_votess'");
		$rows	=	mysql_num_rows($result);
		if($rows>0){
			$sql1	=	"ALTER TABLE $table_name DROP `rating`";
			mysql_query($sql1) or die(mysql_error());
		}
		
        update_option( "hmp_player_db_table_songs_version", $hmp_player_db_table_songs_version );
}else{ 
		
}
    //Add database table versions to options
    add_option("hmp_player_db_table_songs_version", $hmp_player_db_table_songs_version);
}




//Database table versions
global $hmp_player_db_table_playlist_version;
$hmp_player_db_table_playlist_version = "2.0";

//Create database tables needed by the player
function hmp_db_create_playlist () {
    hmp_create_table_playlist();
}

//Create playlist table
function hmp_create_table_playlist(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "hmp_playlists";
    global $hmp_player_db_table_playlist_version;
    $installed_ver1 = get_option( "hmp_player_db_table_playlist_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver1 != $hmp_player_db_table_playlist_version ) {
        $sql = "CREATE TABLE " . $table_name . " (
              `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              `playlist_name` TEXT NOT NULL,
			  `playlist_description` TEXT NOT NULL,
			  `shortcode` TEXT NOT NULL,
              UNIQUE KEY id (id)
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "hmp_player_db_table_playlist_version", $hmp_player_db_table_playlist_version );
}
    //Add database table versions to options
    add_option("hmp_player_db_table_playlist_version", $hmp_player_db_table_playlist_version);
}


//Database table versions
global $hmp_player_db_table_rating_version;
$hmp_player_db_table_rating_version = "2.0";

//Create database tables needed by the player
function hmp_db_create_rating () {
    hmp_create_table_rating();
}



//Create ratings table
function hmp_create_table_rating(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "hmp_rating";
    global $hmp_player_db_table_rating_version;
    $installed_ver1 = get_option( "hmp_player_db_table_rating_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver1 != $hmp_player_db_table_rating_version ) {
        $sql = "CREATE TABLE " . $table_name . " (
              `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              `song_id` TEXT NOT NULL,
			  `rating_value` TEXT NOT NULL,
			  `user_ip` TEXT NOT NULL,
              UNIQUE KEY id (id)
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "hmp_player_db_table_rating_version", $hmp_player_db_table_rating_version );
}
    //Add database table versions to options
    add_option("hmp_player_db_table_rating_version", $hmp_player_db_table_rating_version);
}