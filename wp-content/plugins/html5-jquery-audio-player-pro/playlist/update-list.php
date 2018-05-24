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
        </tr><form name="addplaylist" action="" method="post" enctype="multipart/form-data">
        <tr valign="top">
        <th scope="row"><strong>Playlist Name update</strong></th>
        <td width="25%"><input type="text" size="50" name="playlist_name" value="<?php echo $uresults->playlist_name ; ?>" /></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"></td>
        </tr>
        <!--
        <tr valign="top">
        <th scope="row"><strong>Description</strong></th>
        <td width="25%"><textarea name="playlist_description" cols="52"><?php echo $uresults->playlist_description ; ?></textarea></td>
        <td><span style="font-size:11px; color:#b2b2b2; font-style:italic;"></span></td>
        </tr>
      	-->
         <tr valign="top">
        <th scope="row"><input type="submit" class="button-primary" value="<?php _e('Update Playlist') ?>" name="update" /></th>
        <td></td>
        <td></td>
        </tr>
         
        
       	
      </form>  
         
    </table>
    <p><strong>Drag and drop songs to re-order playlist</strong></p>
    <table class="wp-list-table widefat fixed" cellspacing="0" style=" margin-top:20px;">
	<thead>
	<tr>
        <th scope="col" width="25%"><a href="javascrip:;">Title</a></th>
        <th scope="col" width="15%"><a href="javascrip:;">Playlist Name</a></th>
        <th scope="col" width="10%" ><a href="javascrip:;">Artist</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Price</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Rating</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Duration</a></th>
     </tr>
	</thead>

	<tfoot>
	<tr>
	    <th scope="col" width="25%"><a href="javascrip:;">Title</a></th>
        <th scope="col" width="15%"><a href="javascrip:;">Playlist Name</a></th>
        <th scope="col" width="10%" ><a href="javascrip:;">Artist</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Price</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Rating</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Duration</a></th>
     </tr>
	</tfoot>

	<tbody id="the-list">
	<script type="text/javascript">
	jQuery(document).ready(function(){
	//jQuery('#idToSort ul li:last').css('border-bottom','none');
	jQuery(".submitdelete").click(function(){
		var postdata1	=	'action=my_special_ajax_call3&songid='+jQuery(this).attr('id');
		
		jQuery.ajax({
			type:'POST',
			url:ajaxurl,
			cache:false,
			data: postdata1,
			beforeSend:function(){
			
			},
			success:function(res){
				location.reload();
			}
		});
		
	});					   
	jQuery(function() {
		jQuery("#idToSort .sorter").sortable({ opacity: 0.6, cursor: 'move', update: function(event, ui) {
			var postdata	=	'action=my_special_ajax_call2&order='+jQuery(this).sortable("toArray") + '&dbaction=updateRecordsListings';
			jQuery.ajax({
			type:'POST',
			url: ajaxurl,
			cache:false,
			data: postdata,
			beforeSend:function(){
			
			},
			success:function(res){
				
			}
		});
			
															 
		}								  
		});
	});
	jQuery('.quick-edit').css('display','none');
	jQuery('.spinner').css('display','none');
	jQuery(".quick-edit-action").click(function(){
		var curActID	=	jQuery(this).attr('id');
		
		jQuery('.quick-edit').css('display','none');
		jQuery('div#'+curActID).css('display','inline-block');
		
		jQuery('.curhidden').removeClass('curhidden');
		jQuery('.curshown').removeClass('curshown');
		jQuery(this).parents('.main-details').addClass('curhidden');
		jQuery('div#'+curActID).addClass('curshown');
		
		
	});
	
	jQuery('.qsave').click(function(){
		jQuery('.spinner').css('display','inline-block').delay(1000).hide(500);
		var qSaveId	=	jQuery(this).attr('id');
		
		var findCvalsId	=	jQuery(this).parents('.quick-edit').attr('qsave');
	
		var qtitle			=	jQuery('div[qsave="'+findCvalsId+'"] #qtitle').val();
		var qcover			=	jQuery('div[qsave="'+findCvalsId+'"] #qcover').val();
		var qbutton1		=	jQuery('div[qsave="'+findCvalsId+'"] #qbutton1').val();
		var qbutton2		=	jQuery('div[qsave="'+findCvalsId+'"] #qbutton2').val();
		var qbutton3		=	jQuery('div[qsave="'+findCvalsId+'"] #qbutton3').val();
		var qprice			=	jQuery('div[qsave="'+findCvalsId+'"] #qprice').val();
		var qduration		=	jQuery('div[qsave="'+findCvalsId+'"] #qduration').val();
		var qartist			=	jQuery('div[qsave="'+findCvalsId+'"] #qartist').val();
		
		if(qtitle==''){
			jQuery("#qtitle").addClass('hmp-empty-val');
			jQuery('.error').html('<strong>Title cannot be empty</strong>').delay(1000).show(500).css('color','red');	
		}else{
			var postdata1	=	'action=my_special_ajax_call4&qtitle='+qtitle+'&qcover='+qcover+'&qbutton1='+qbutton1+'&qbutton2='+qbutton2+'&qbutton3='+qbutton3+'&qprice='+qprice+'&qduration='+qduration+'&qartist='+qartist+'&qSaveId='+qSaveId;	
			
			jQuery.ajax({
			type:'POST',
			url:ajaxurl,
			cache:false,
			data: postdata1,
			beforeSend:function(){
			
			},
			success:function(res){
				
				jQuery('.error').html('<strong>Updated Successfully</strong>').show(500).css('color','green');
				//jQuery('.error').html(res).show(500).css('color','green');
				window.setTimeout(function(){location.reload()},3000);
				
				
			}
		});
		}
		
		jQuery("#qtitle").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		
		
	});


});	
</script>
<style type="text/css">
.curshown{
	display:inline-block;	
}
.curhidden{
	display:none;	
}
</style>
     <tr>
        
	<?php
		global $wpdb;
		$playlist_name	=	$_GET['name'];
		$table		=	$wpdb->prefix."hmp_songs"; // add quote marks //
		$sql		=	"SELECT * FROM $table WHERE `playlist_name`='$playlist_name' ORDER BY list_order ASC";

		$results 	= 	$wpdb->get_results( $sql );
	?>
    
	<?php if( !empty( $results ) ) : ?>
    	<td colspan="6" id="idToSort">
       	<ul class="sorter">
       
    <?php foreach( $results as $result ): ?>
   				
           
            	<li id="recordsArray_<?php echo $result->id;?>" newarray="<?php echo $result->id;?>" class="myrecords">
                	<div class="main-details"><span style="width:30%;"><a href="javascript:;"><strong><?php echo $result->title; ?></strong></span></a>
                    <div class="row-actions1"><span class="edit"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_songs&action=update&id=<?php echo $result->id; ?>">Edit</a></span><span><a href="javascript:;" class="quick-edit-action" id="quick-edit-action-<?php echo $result->id;?>">Quick Edit</a></span><span class="trash"><a class="submitdelete" id="<?php echo $result->id; ?>" title="This will delete permanently" href="javascript:;">Delete</a></span></div>
                    <span style="width:17.7%;"><?php echo $result->playlist_name; ?></span>
                    <span style="width:11.6%;"><?php echo $result->artist; ?></span>
                    <span style="width:11.6%;"><?php echo $result->price; ?></span>
                    <span style="width:11.6%;"><?php echo $result->rating; ?></span>
                    <span style="width:10%;"><?php echo $result->duration; ?></span>
                    <div style="clear:both;"></div></div>
            
                    <div class="quick-edit inline-edit-row" id="quick-edit-action-<?php echo $result->id;?>" qsave="<?php echo $result->id;?>">
            		<h4>Quick Edit</h4>	
                    <fieldset class="first">
                    	<label>
                        	<span class="title">Title</span>
                            <span class="input-text-wrap"><input type="text" name="qtitle" id="qtitle" value="<?php echo $result->title; ?>"></span>
                        </label>
                        <label>
                        	<span class="title">Cover</span>
                            <span class="input-text-wrap"><input type="text" name="qcover" id="qcover" value="<?php echo $result->cover ; ?>"></span>
                        </label>
                    </fieldset>
                    <fieldset class="second">
                    	<label>
                        	<span class="title">Button 1</span>
                            <span class="input-text-wrap"><input type="text" name="qbutton1" id="qbutton1" value="<?php echo $result->buy ; ?>"></span>
                        </label>
                        <label>
                        	<span class="title">Button 2</span>
                            <span class="input-text-wrap"><input type="text" name="qbutton2" id="qbutton2" value="<?php echo $result->buyy ; ?>"></span>
                        </label>
                        <label>
                        	<span class="title">Button 3</span>
                            <span class="input-text-wrap"><input type="text" name="qbutton3" id="qbutton3" value="<?php echo $result->buyyy ; ?>"></span>
                        </label>
                    </fieldset>
                     <fieldset class="third">
                    	<label>
                        	<span class="title">Price</span>
                            <span class="input-text-wrap"><input type="text" name="qprice" id="qprice" value="<?php echo $result->price; ?>"></span>
                        </label>
                        <label>
                        	<span class="title">Duration</span>
                            <span class="input-text-wrap"><input type="text" name="qduration" id="qduration" value="<?php echo $result->duration; ?>"></span>
                        </label>
                        <label>
                        	<span class="title">Artist</span>
                            <span class="input-text-wrap"><input type="text" name="qartist" id="qartist" value="<?php echo $result->artist; ?>"></span>
                        </label>
                    </fieldset>
                    

<p class="submit inline-edit-save">
			<!--<a accesskey="c" href="#inline-edit" title="Cancel" class="button-secondary cancel alignleft" id="qcancel">Cancel</a>-->
			<a accesskey="s" href="#inline-edit" title="Update" class="button-primary qsave alignright"  id="<?php echo $result->id;?>">Update</a>
			<span class="spinner alignright"></span>
			<span class="error" style="display:none"></span>
			<br class="clear">
		</p>
                    </div>
               </li>
               
           
	<?php endforeach; ?>
	 </ul>
        </td>
	
	<?php else: ?>
    
    <td class="posts column-posts num" colspan="6">Please Add Songs No Songs Listed Yet <a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_songs&action=add" class="add-new-h2">Add New</a></td>
   
	<?php endif; ?>
  	 </tr>
  </tbody>
</table>