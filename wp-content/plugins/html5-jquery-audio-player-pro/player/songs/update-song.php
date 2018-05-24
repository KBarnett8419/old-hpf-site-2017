<table class="form-table">
        <tr valign="top">
        <th scope="row"></th>
        <td width="25%"></td>
        <td></td>
        <td rowspan="9" width="25%">
         	<table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
            	<thead>
                	<th scope="col"><strong style="color:#008001;">Help Improve This Plugin!</strong></th>
                </thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contributaion.</td>
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
                    	<td style="border:0;">you can also help by <a href="http://wordpress.org/extend/plugins/html5-jquery-audio-player/" target="_blank">rating this plugin plugin on wordpress.org</a></td>
                    </tr>
                   
                </tbody>
            </table>
            <table cellpadding="0" class="widefat" border="0">
            	<thead>
                	<th scope="col">Need Support</th>
                </thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">If you are having problems with plugin please talk about them on <a href="http://wordpress.org/support/plugin/html5-jquery-audio-player" target="_blank">Support Forums</a></td>
                    </tr>
                   
                </tbody>
            </table>
         </td>
        </tr><form name="addplaylist" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="song_id" id="song_id" value="<?php echo $uresults->id ; ?>" />
        <tr valign="top">
        <th scope="row"><strong>Playlist Name</strong></th>
        <td width="25%">
        <?php
		$table1		=	$wpdb->prefix."hmp_playlists";
		$psql		=	"SELECT * FROM $table1";

		$presults 	= 	$wpdb->get_results( $psql );
	
		
		?>
        <?php if( !empty( $presults ) ) : ?>
        <select id="playlist_name">
        
    	<?php foreach( $presults as $presult ): ?>
        	<option value="<?php echo $presult->playlist_name; ?>" <?php if($presult->playlist_name==$uresults->playlist_name){echo 'selected="selected"';} ?>><?php echo $presult->playlist_name; ?></option>
        <?php endforeach; ?>
        </select>
       
        <?php endif; ?>
        </td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"><strong>Required</strong> Playlist name where to add song</span></td>
        
        </tr>
        
        <tr valign="top">
        <th scope="row"><strong>MP3 Link</strong></th>
        <td width="25%"><input type="text" size="50" name="mp3" value="<?php echo $uresults->mp3 ; ?>" id="mp3" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"><strong>Required</strong> Full File Path of mp3 file</span></td>
        
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Ogg Link</strong></th>
        <td><input type="text" size="50" name="ogg" value="<?php echo $uresults->ogg ; ?>" id="ogg" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"><strong>Required</strong> Full File Path of ogg file</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Song Title</strong></th>
        <td><input type="text" size="50" name="title" value="<?php echo $uresults->title ; ?>" id="title" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"><strong>Required</strong> Title of the song</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Button 1 Link</strong></th>
        <td><input type="text" size="50" name="buy" value="<?php echo $uresults->buy ; ?>" id="buy" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"> This will link button 1</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Button 2 Link</strong></th>
        <td><input type="text" size="50" name="buyy" value="<?php echo $uresults->buyy ; ?>" id="buyy" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"> This will link button 2</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Button 3 Link</strong></th>
        <td><input type="text" size="50" name="buyyy" value="<?php echo $uresults->buyyy ; ?>" id="buyyy" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"> This will link button 3</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Song Price</strong></th>
        <td><input type="text" size="50" name="price" value="<?php echo $uresults->price ; ?>" id="price" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"> Price of the song </span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Cover Image</strong></th>
        <td><input type="text" size="50" name="cover" value="<?php echo $uresults->cover ; ?>" id="cover" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;">Full File Path to cover image ( 125*125 )</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Duration</strong></th>
        <td><input type="text" size="50" name="duration" value="<?php echo $uresults->duration ; ?>" id="duration" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;">Duration of the song</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Artist</strong></th>
        <td><input type="text" size="50" name="artist" value="<?php echo $uresults->artist ; ?>" id="artist" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"> Artist of the song</span></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><input type="button" class="button-primary" value="<?php _e('Update Song') ?>" name="update" id="update_song" /></th>
        <td> <a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_songs&action=add"><input type="button" class="button-primary" value="<?php _e('Add New Song') ?>" name="update" /></a></td>
        <td></td>
        </tr>
         
        
       	
       </form> 
         
    </table>