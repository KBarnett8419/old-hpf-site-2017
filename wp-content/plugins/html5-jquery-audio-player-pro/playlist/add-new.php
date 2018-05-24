<table class="form-table">
        
        <?php if(!empty($isuccess)): ?>
        
        <tr valign="top">
       
        <td width="25%"><span style="color:green;"><?php echo $isuccess; ?></span></td>
       
        </tr>
        <?php elseif(!empty($ierror)): ?>
        
        
        
        <tr valign="top">
       
        <td width="25%"><span style="color:red;"><?php echo $ierror; ?></span></td>
       
        </tr>
        <?php endif ?>
        
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
                    	<td style="border:0;">you can also help by <a href="http://wordpress.org/support/view/plugin-reviews/html5-jquery-audio-player" target="_blank">rating this plugin plugin on wordpress.org</a></td>
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
        </tr>
        <form name="addplaylist" action="" method="post" enctype="multipart/form-data">
        <tr valign="top">
        <th scope="row"><strong>Playlist Name</strong></th>
        <td width="25%"><input type="text" size="50" name="playlist_name" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"></span></td>
        </tr>
        
       <!-- <tr valign="top">
        <th scope="row"><strong>Description</strong></th>
        <td width="25%"><textarea name="playlist_description" cols="52"></textarea></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;">Please avoid special characters and symbols in this field because it can cause malfunction.</td>
        </tr> -->
        
        <tr valign="top">
        <th scope="row"><input type="submit" class="button-primary" value="<?php _e('Add Playlist') ?>" name="submit" /></th>
        <td></td>
        <td></td>
        </tr>
         </form>
        
       	
        
         
    </table>