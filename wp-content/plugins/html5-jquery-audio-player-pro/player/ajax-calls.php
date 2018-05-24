<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery("#add_new_song").click(function(){
			
		var playlist_name		=	jQuery("#playlist_name").val();
		var mp3					=	jQuery("#mp3").val();
		var ogg					=	jQuery("#ogg").val();
		var title				=	jQuery("#title").val();
		var buy					=	jQuery("#buy").val();
		var buyy				=	jQuery("#buyy").val();
		var buyyy				=	jQuery("#buyyy").val();
		var price				=	jQuery("#price").val();
		var cover				=	jQuery("#cover").val();
		var duration			=	jQuery("#duration").val();
		var artist				=	jQuery("#artist").val();
		
		
    	var buyp				=	buy.replace(/&/g, "amp;");
		var buyyp				=	buyy.replace(/&/g, "amp;");
		var buyyyp				=	buyyy.replace(/&/g, "amp;");
		
		/*if(mp3.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/)){
			jQuery("#mp3").addClass('hmp-special-val');	
		}
		
		jQuery("#mp3").focus(function(){
			jQuery(this).removeClass('hmp-special-val');	
		}); */
	
		if(mp3==''){
			jQuery("#mp3").addClass('hmp-empty-val');	
		}
		
		jQuery("#mp3").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		/*
		if(ogg.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/)){
			jQuery("#ogg").addClass('hmp-special-val');	
		}
		
		jQuery("#ogg").focus(function(){
			jQuery(this).removeClass('hmp-special-val');	
		});
		*/
		
		if(ogg==''){
			jQuery("#ogg").addClass('hmp-empty-val');	
		}
		
		jQuery("#ogg").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		/*
		if(title.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/)){
			jQuery("#title").addClass('hmp-special-val');	
		}
		
		jQuery("#title").focus(function(){
			jQuery(this).removeClass('hmp-special-val');	
		});
		*/
		if(title==''){
			jQuery("#title").addClass('hmp-empty-val');	
		}
		
		jQuery("#title").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		
		if(mp3!='' && ogg!=='' && title!=''){
		
			jQuery.ajax({
			type:'POST',
			url: ajaxurl,
			cache:false,
			data:'action=my_special_ajax_call&playlist_name='+playlist_name+'&mp3='+mp3+'&ogg='+ogg+'&title='+title+'&buyp='+buyp+'&buyyp='+buyyp+'&buyyyp='+buyyyp+'&price='+price+'&cover='+cover+'&duration='+duration+'&artist='+artist,
			beforeSend:function(){
			
			jQuery("#hmp-ajax-loader").fadeIn(500).delay(1000).fadeOut(500);
			
			},
			success:function(res){
				
				jQuery("#myres").html(res);
				jQuery("#hmp-song-added").fadeIn(500).delay(1000).fadeOut(500);
				location.reload();
				
			}
		});
		
		}else{
			
			jQuery("#hmp-empty-val").fadeIn(500).delay(1000).fadeOut(500);
			/*
			if(mp3.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) || ogg.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) || title.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) ){
				jQuery("#hmp-special-val").fadeIn(500).delay(1000).fadeOut(500);
			}
		*/
		}
		
		});
		
		
		//Ajax update song code
		
		jQuery("#update_song").click(function(){
		
		var song_id				=	jQuery("#song_id").val();
		var playlist_name		=	jQuery("#playlist_name").val();
		var mp3					=	jQuery("#mp3").val();
		var ogg					=	jQuery("#ogg").val();
		var title				=	jQuery("#title").val();
		var buy					=	jQuery("#buy").val();
		var buyy				=	jQuery("#buyy").val();
		var buyyy				=	jQuery("#buyyy").val();
		var price				=	jQuery("#price").val();
		var cover				=	jQuery("#cover").val();
		var duration			=	jQuery("#duration").val();
		var artist				=	jQuery("#artist").val();
		
		
		var buyp				=	buy.replace(/&/g, "amp;");
		var buyyp				=	buyy.replace(/&/g, "amp;");
		var buyyyp				=	buyyy.replace(/&/g, "amp;");
		if(mp3==''){
			jQuery("#mp3").addClass('hmp-empty-val');	
		}
		
		jQuery("#mp3").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		
		if(ogg==''){
			jQuery("#ogg").addClass('hmp-empty-val');	
		}
		
		jQuery("#ogg").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	
		});
		
		if(title==''){
			jQuery("#title").addClass('hmp-empty-val');	
		}
		
		jQuery("#title").focus(function(){
			jQuery(this).removeClass('hmp-empty-val');	<!-- -->
		});
		/*
		if(mp3.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/)){
			jQuery("#mp3").addClass('hmp-special-val');	
		}
		
		jQuery("#mp3").focus(function(){
			jQuery(this).removeClass('hmp-special-val');	
		});
		*/
		if(mp3!='' && ogg!=='' && title!=''){
		
			jQuery.ajax({
			type:'POST',
			url: ajaxurl,
			cache:false,
			data:'action=my_special_ajax_call1&playlist_name='+playlist_name+'&mp3='+mp3+'&ogg='+ogg+'&title='+title+'&buyp='+buyp+'&buyyp='+buyyp+'&buyyyp='+buyyyp+'&price='+price+'&cover='+cover+'&duration='+duration+'&artist='+artist+'&song_id='+song_id,
			beforeSend:function(){
			
			jQuery("#hmp-ajax-loader").fadeIn(500).delay(1000).fadeOut(500);
			
			},
			success:function(res){
				
				jQuery("#hmp-song-updated").fadeIn(500).delay(1000).fadeOut(500);
				location.reload();
				
			}
		});
		
		}else{
			
			jQuery("#hmp-empty-val").fadeIn(500).delay(1000).fadeOut(500);
			/*
			if(mp3.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) || ogg.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) || title.match(/[\\\`:;^£\"\$\[\]\%*()}{@#~<>\/\'|=_+&]/) ){
				jQuery("#hmp-special-val").fadeIn(500).delay(1000).fadeOut(500);
			}*/
		
		}
		
		});
		
		
		
		
		
			
	});
			
</script>