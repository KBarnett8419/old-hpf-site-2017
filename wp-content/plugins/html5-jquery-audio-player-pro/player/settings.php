<div id="wpbody">

<div id="wpbody-content">
		
			
		
<div class="wrap">
<h2>Display Settings</h2>


    
    <table class="form-table">
        <tr valign="top">
        <th scope="row"></th>
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
                    	<td style="border:0;">you can also help by <a href="#">rating this plugin plugin on wordpress.org</a></td>
                    </tr>
                   
                </tbody>
            </table>
            <table cellpadding="0" class="widefat" border="0">
            	<thead>
                	<th scope="col">Need Support</th>
                </thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">If you are having problems with plugin please talk about them on <a href="#">Support Forums</a></td>
                    </tr>
                   
                </tbody>
            </table>
         </td>
        </tr><form method="post" action="options.php">
    <?php settings_fields( 'baw-settings-group' ); ?>
        <tr valign="top">	
        <th scope="row"><strong>Player Width</strong></th>
        <td><input type="text" name="player_width" value="<?php echo get_option('player_width'); ?>" size="50" id="omer"  /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Set width of player in the format  <strong>400px</strong></span></td>
        </tr>
        <tr valign="top" class="buy_text">	
        <th scope="row"><strong>Show Ratings</strong></th>
        <td> ON <input type="radio" name="ratings" value="1" <?php  if(get_option('ratings')==1){ echo 'checked="checked"';} ?> /> OFF <input type="radio" name="ratings" value="0" <?php  if(get_option('ratings')==0){ echo 'checked="checked"';} ?> /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Set ratings bars ON or OFF</span></td>
        </tr>
        <tr valign="top" class="buy_text">	
        <th scope="row"><strong>Auto Play</strong></th>
        <td> ON <input type="radio" name="autoplay" value="1" <?php  if(get_option('autoplay')==1){ echo 'checked="checked"';} ?> /> OFF <input type="radio" name="autoplay" value="0" <?php  if(get_option('autoplay')==0){ echo 'checked="checked"';} ?> /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Start playing when site is loaded</span></td>
        </tr>
        <tr valign="top" class="buy_text">	
        <th scope="row"><strong>Button Text 1</strong></th>
        <td><input type="text" name="buy_text" value="<?php echo get_option('buy_text'); ?>" size="50" id="omer"  /> ON <input type="radio" name="buy_active" value="1" <?php  if(get_option('buy_active')==1){ echo 'checked="checked"';} ?> /> OFF <input type="radio" name="buy_active" value="0" <?php  if(get_option('buy_active')==0){ echo 'checked="checked"';} ?> /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Text to show on first button. (activate up to 3 buttons using on/off option)</span></td>
        </tr>
        <tr valign="top" class="buy_text">	
        <th scope="row"><strong>Button Text 2</strong></th>
        <td><input type="text" name="buyy_text" value="<?php echo get_option('buyy_text'); ?>" size="50" id="omer"  /> ON <input type="radio" name="buyy_active" value="1" <?php  if(get_option('buyy_active')==1){ echo 'checked="checked"';} ?> /> OFF <input type="radio" name="buyy_active" value="0" <?php  if(get_option('buyy_active')==0){ echo 'checked="checked"';} ?> /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Text to show on second button. (activate up to 3 buttons using on/off option)</span></td>
        </tr>
        <tr valign="top" class="buy_text">	
        <th scope="row"><strong>Button Text 3</strong></th>
        <td><input type="text" name="buyyy_text" value="<?php echo get_option('buyyy_text'); ?>" size="50" id="omer"  /> ON <input type="radio" name="buyyy_active" value="1" <?php  if(get_option('buyyy_active')==1){ echo 'checked="checked"';} ?> /> OFF <input type="radio" name="buyyy_active" value="0" <?php  if(get_option('buyyy_active')==0){ echo 'checked="checked"';} ?> /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Text to show on third button. (activate up to 3 buttons using on/off option)</span></td>
        </tr>
      <tr valign="top">
        <th scope="row"><strong>Show Track List</strong></th>
        <td>Yes <input id="rd3" type="radio" name="showlist" value="1" <?php  if(get_option('showlist')==1){ echo 'checked="checked"';} ?> />  No <input id="rd4" type="radio" name="showlist" value="0" <?php  if(get_option('showlist')==0){ echo 'checked="checked"';} ?> /></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Number Of Tracks</strong></th>
        <td><input type="text" name="tracks" value="<?php echo get_option('tracks'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">This will apply only if Show track list is set to YES, write 0 to show all</span></td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Currency Symbol</strong></th>
        <td><input type="text" name="currency" value="<?php echo get_option('currency'); ?>" size="50" /></td>
        </tr>
         <tr valign="top">
        <th scope="row"><strong>Background Colour</strong></th>
        <td><?php $color	=	get_option('color'); ?>
        	<input type="text" name="color" value="<?php echo get_option('color'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Insert colour code in the format #000000 or use "transparent"</span>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><strong>Text Colour</strong></th>
        <td><?php $tcolor	=	get_option('tcolor'); ?>
        	<input type="text" name="tcolor" value="<?php echo get_option('tcolor'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">Insert colour code in the format #cccccc</span></td>
       
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div>