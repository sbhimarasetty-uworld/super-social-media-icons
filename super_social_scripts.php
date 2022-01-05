<?php
/*---------------------------------------------------
Styling for social icons
----------------------------------------------------*/



function super_social_scripts()
		{
		  
			$super_social_style_settings = get_option ('super_social_style_settings');
		
		  	$size = $super_social_style_settings['size'];
			$alignment = $super_social_style_settings['align'];
			$border = $super_social_style_settings['border'];
			$bottom_spacing=$super_social_style_settings['bottom_spacing'];
			$icon_style=$super_social_style_settings['icon_style'];
              
			?>
			<style>
			.super-social
			{
			color: white !important;
			text-align: center !important;
			margin-bottom:<?php echo $bottom_spacing;?>px;
			border-radius:<?php echo $border;?>%;

		    background:<?php echo $super_social_style_settings['icon_style']; ?>;
	
<?php
			// Checking size  if size if 40
			if( $size=="40")
			{
			?>
			line-height: 51px !important;
			width: 48px !important;
			height: 48px !important;
			font-size: 1em !important;
			<?php
			}
			if( $size=="35")
			{
			// Checking size if its 35 then set it
			?>
			line-height: 34px !important;
			width: 32px !important;
			height: 32px !important;
			font-size: 1em !important;
			<?php
			}
			if( $size=="30")
			{
			// Checking size if its  30 small then set it
			?>
			line-height: 25px !important;
			width: 30px !important;
			height: 24px !important;
			font-size: 1em !important;
			<?php
			}
			if( $size=="25")
			{
			// Checking size if 25  then set it
			?>
			line-height: 25px !important;
			width: 24px !important;
			height: 24px !important;
			font-size: 1em !important;
			<?php
			}
			?>
			
	
			}
			
		
.alignment { text-align:<?php echo $alignment;?>; }
<?php   if($icon_style=='default_style') { ?>		 
.fb-super-social { background: #3b5998; }

.tw-super-social { background: #00aced; }

.linkedin-super-social { background: #007bb6; }

.g-plus-super-social{ background:#f74425 ; }

.rss-super-social { background: #C58542; }

.youtube-super-social { background: #bb0000; }

.pinterest-super-social {background: #cb2027; }

.flickr-super-social { background: #ff0084; }

.instagram-super-social { background: #517fa4; }

.dribble-super-social { background: #00bf8f; }
<?php  }   ?>
</style>
<?php
	}
	add_action('wp_enqueue_scripts', 'super_social_scripts');
?>