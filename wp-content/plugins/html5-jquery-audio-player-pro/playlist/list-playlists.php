<table width="100%">
<tr>
<td width="70%" valign="top">
<table class="wp-list-table widefat fixed" cellspacing="0" style=" margin-top:25px;">
	<thead>
	<tr>
		
        <th scope="col" width="25%" ><a href="javascrip:;">Playlist Name</a></th>
        <th scope="col" width="25%"><a href="javascrip:;">Shortcode</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Edit</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Delete</a></th>	
     </tr>
	</thead>

	<tfoot>
	<tr>
        <th scope="col" width="25%" ><a href="javascrip:;">Playlist Name</a></th>
        <th scope="col" width="25%"><a href="javascrip:;">Shortcode</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Edit</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Delete</a></th>	
     </tr>
	</tfoot>

	<tbody id="the-list">
    
    <?php
		global $wpdb;
		$table		=	$wpdb->prefix."hmp_playlists";
		$sql		=	"SELECT * FROM $table";
		$results 	= 	$wpdb->get_results( $sql );
	?>
	<?php if( !empty( $results ) ) : ?>
    <?php foreach( $results as $result ): ?>
    <tr>
        <td width="25%"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_playlist&action=update&id=<?php echo $result->id; ?>&name=<?php echo $result->playlist_name; ?>"><?php echo $result->playlist_name; ?></a></td>
        <td width="25%"><input type="text" value="<?php echo str_replace('"', "'", $result->shortcode); ?>" readonly="readonly" size="50" /></td>
        <td width="10%"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_playlist&action=update&id=<?php echo $result->id; ?>&name=<?php echo $result->playlist_name; ?>">Edit</a></td>
        <td width="10%"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_playlist&action=delete&id=<?php echo $result->id; ?>">Delete</a></td>
	</tr>
	<?php endforeach; ?>
	
	<?php else: ?>
    
    <td class="posts column-posts num" colspan="4">Please Add Playlists No Playlists Listed Yet </td>
    
	<?php endif; ?>
  	
  </tbody>
</table>
</td>
<td width="25%" valign="top"><table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001; margin-top:24px; margin-left:8px;">
            	<thead>
                	<tr><th scope="col"><strong style="color:#008001;">Help Improve This Plugin!</strong></th>
                </tr></thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contribution.</td>
                    </tr>
                    <tr>
                    	<td style="border:0;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="A74K2K689DWTY">
<input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form></td>
                    </tr>
                    <tr>
                    	<td style="border:0;">you can also help by <a href="http://wordpress.org/support/view/plugin-reviews/html5-jquery-audio-player" target="_blank">rating this plugin plugin on wordpress.org</a></td>
                    </tr>
                   
                </tbody>
            </table><table cellpadding="0" class="widefat" border="0" style="margin-left:8px;">
            	<thead>
                	<tr><th scope="col">Need Support</th>
                </tr></thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">If you are having problems with plugin please talk about them on <a href="http://wordpress.org/support/plugin/html5-jquery-audio-player" target="_blank">Support Forums</a></td>
                    </tr>
                   
                </tbody>
            </table></td>
</tr></table>