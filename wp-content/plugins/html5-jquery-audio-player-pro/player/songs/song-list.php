<table class="wp-list-table widefat fixed" cellspacing="0" style=" margin-top:20px;">
	<thead>
	<tr>
        <th scope="col" width="25%"><a href="javascrip:;">Title</a></th>
        <th scope="col" width="15%"><a href="javascrip:;">Playlist Name</a></th>
        <th scope="col" width="10%" ><a href="javascrip:;">Artist</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Price</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Rating</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Duration</a></th>
        <th scope="col" width="10%"><a href="javascrip:;">Edit</a></th>	
        <th scope="col" width="10%"><a href="javascrip:;">Delete</a></th>	
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
        <th scope="col" width="10%"><a href="javascrip:;">Edit</a></th>	
        <th scope="col" width="10%"><a href="javascrip:;">Delete</a></th>		
     </tr>
	</tfoot>

	<tbody id="the-list">
	<script type="text/javascript">
	jQuery(document).ready(function(){ 
		alert('working');				   
	jQuery(function() {
		jQuery("#idToSort ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var postdata	=	'action=my_special_ajax_call2&order='+jQuery(this).sortable("toArray") + '&dbaction=updateRecordsListings';
			alert(postdata);
			jQuery.ajax({
			type:'POST',
			url:ajaxurl,
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

});	
</script>
     <tr>
        
	<?php
		$sql		=	"SELECT * FROM $table ORDER BY list_order ASC";

		$results 	= 	$wpdb->get_results( $sql );
	?>
    
	<?php if( !empty( $results ) ) : ?>
    	<td colspan="8" id="idToSort">
       	<ul>
    <?php foreach( $results as $result ): ?>
   				
           
            	<li id="recordsArray_<?php echo $result->id;?>" newarray="<?php echo $result->id;?>" class="myrecords"><?php echo $result->id;?>
                	<span style="width:23.5%;"><?php echo $result->title; ?></span>
                    <span style="width:14%; pa"><?php echo $result->playlist_name; ?></span>
                    <span style="width:9%;"><?php echo $result->artist; ?></span>
                    <span style="width:9%;"><?php echo $result->price; ?></span>
                    <span style="width:9%;"><?php echo $result->rating; ?></span>
                    <span style="width:9%;"><?php echo $result->duration; ?></span>
                    <span style="width:9%;"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_songs&action=update&id=<?php echo $result->id; ?>">Update</a></span>
                    <span style="width:8%;"><a href="<?php bloginfo('wpurl'); ?>/wp-admin/admin.php?page=hmp_songs&action=delete&id=<?php echo $result->id; ?>">Delete</a></span>
                    <div style="clear:both;"></div>
               </li>
               
           
	<?php endforeach; ?>
	 </ul>
        </td>
	
	<?php else: ?>
    
    <td class="posts column-posts num" colspan="8">Please Add Songs No Songs Listed Yet</td>
   
	<?php endif; ?>
  	 </tr>
  </tbody>
</table>