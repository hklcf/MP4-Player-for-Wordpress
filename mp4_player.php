<?php
/*
Plugin Name: MP4 Player
Plugin URI:  https://github.com/hklcf/MP4-Player-for-Wordpress
Description: Embed mp4 stream to WordPress using JW Player
Version:     1.0
Author:      HKLCF
Author URI:  https://eservice-hk.net/
License:     GPL3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: mp4p
Domain Path: /languages
*/

function add_mp4p_menu() {
	add_plugins_page('MP4 Player Setting', 'MP4 Player', 'administrator', 'mp4p-setting', 'mp4p_setting_function');
	$option_group = 'mp4p_setting';
	$option_name = 'mp4p_player_option';
	$setting_section = 'mp4p_setting_section';
	register_setting( $option_group, $option_name );

	add_settings_section( $setting_section, 'Setting', 'mp4p_setting_section_function', $option_group );
	function mp4p_setting_section_function() {
		echo 'MP4 Player Setting';
	}

	add_settings_field( 'mp4p_player_version', '<label for="mp4p_player_option[version]">JW Player Version</label>', 'mp4p_player_version_function', $option_group, $setting_section );
	function mp4p_player_version_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<input class="regular-text" id="mp4p_player_option[version]" name="mp4p_player_option[version]" type="text" value="'.$mp4p_player_option['version'].'" placeholder="8.12.5">';
	}

	add_settings_field( 'mp4p_player_key', '<label for="mp4p_player_option[key]">JW Player License Key</label>', 'mp4p_player_key_function', $option_group, $setting_section );
	function mp4p_player_key_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<input class="regular-text" id="mp4p_player_option[key]" name="mp4p_player_option[key]" type="text" value="'.$mp4p_player_option['key'].'" placeholder="License Key">';
		echo '<p class="description">Certain JW Player features may require a specific license.</p>';
	}

	add_settings_field( 'mp4p_player_id', '<label for="mp4p_player_option[id]">Player ID</label>', 'mp4p_player_id_function', $option_group, $setting_section );
	function mp4p_player_id_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<input class="regular-text" id="mp4p_player_option[id]" name="mp4p_player_option[id]" type="text" value="'.$mp4p_player_option['id'].'" placeholder="player">';
	}

	add_settings_field( 'mp4p_player_size', 'Player Size', 'mp4p_player_size_function', $option_group, $setting_section );
	function mp4p_player_size_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<label for="mp4p_player_option[height]">Height </label><input class="small-text" id="mp4p_player_option[height]" name="mp4p_player_option[height]" type="text" value="'.$mp4p_player_option['height'].'" placeholder="100%">';
		echo '&nbsp;';
		echo '<label for="mp4p_player_option[width]">Width </label><input class="small-text" id="mp4p_player_option[width]" name="mp4p_player_option[width]" type="text" value="'.$mp4p_player_option['width'].'" placeholder="100%">';
	}

	add_settings_field( 'mp4p_player_ratio', '<label for="mp4p_player_option[ratio]">Player Ratio</label>', 'mp4p_player_ratio_function', $option_group, $setting_section );
	function mp4p_player_ratio_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<input class="regular-text" id="mp4p_player_option[ratio]" name="mp4p_player_option[ratio]" type="text" value="'.$mp4p_player_option['ratio'].'" placeholder="16:9">';
	}

	add_settings_field( 'mp4p_player_preload', '<label for="mp4p_player_option[preload]">Video Preload</label>', 'mp4p_player_preload_function', $option_group, $setting_section );
	function mp4p_player_preload_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		$preload = $mp4p_player_option['preload'];
		echo '<select id="mp4p_player_option[preload]" name="mp4p_player_option[preload]">';
		echo '<option value="none" '.selected( $preload, 'none' ).'>none</option><option value="metadata" '.selected( $preload, 'metadata' ).'>metadata</option><option value="auto" '.selected( $preload, 'auto' ).'>auto</option>';
		echo '</select>';
	}

	add_settings_field( 'mp4p_player_playbackratecontrols', '<label for="mp4p_player_option[playbackratecontrols]">Video Playback Rate Controls</label>', 'mp4p_player_playbackratecontrols_function', $option_group, $setting_section );
	function mp4p_player_playbackratecontrols_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		$playbackratecontrols = $mp4p_player_option['playbackratecontrols'];
		echo '<select id="mp4p_player_option[playbackratecontrols]" name="mp4p_player_option[playbackratecontrols]">';
		echo '<option value="false" '.selected( $playbackratecontrols, 'false' ).'>false</option><option value="true" '.selected( $playbackratecontrols, 'true' ).'>true</option>';
		echo '</select>';
	}

	add_settings_field( 'mp4p_player_resumeplayback', '<label for="mp4p_player_option[resumeplayback]">Resume Playback w/ Cookies</label>', 'mp4p_player_resumeplayback_function', $option_group, $setting_section );
	function mp4p_player_resumeplayback_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		$resumeplayback = $mp4p_player_option['resumeplayback'];
		echo '<select id="mp4p_player_option[resumeplayback]" name="mp4p_player_option[resumeplayback]">';
		echo '<option value="false" '.selected( $resumeplayback, 'false' ).'>false</option><option value="true" '.selected( $resumeplayback, 'true' ).'>true</option>';
		echo '</select>';
	}

	add_settings_field( 'mp4p_player_thumbnail', 'Video Thumbnail', 'mp4p_player_thumbnail_function', $option_group, $setting_section );
	function mp4p_player_thumbnail_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<label><input name="mp4p_player_option[thumbnail]" type="checkbox" value="1" ';
		echo checked( $mp4p_player_option['thumbnail'], 1 ).'> featured image</label>';
	}

	add_settings_field( 'mp4p_player_logo', 'Player Logo', 'mp4p_player_logo_function', $option_group, $setting_section );
	function mp4p_player_logo_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		$logo_position = $mp4p_player_option['logo_position'];
		echo '<input class="regular-text" name="mp4p_player_option[logo]" type="text" value="'.$mp4p_player_option['logo'].'" placeholder="Logo URL">';
		echo '<p class="description">Location of an external JPG, PNG or GIF image to be used as watermark (e.g. /assets/logo.png). We recommend using 24 bit PNG images with transparency, since they blend nicely with the video.</p>';
		echo '<br>';
		echo '<input class="regular-text" name="mp4p_player_option[logo_link]" type="text" value="'.$mp4p_player_option['logo_link'].'" placeholder="http://">';
		echo '<p class="description">The HTTP URL which will load when your watermark image is clicked. (e.g. http://www.mywebsite.com/). If this is not set, a click on the watermark will not do anything.</p>';
		echo '<br>';
		echo '<label for="mp4p_player_option[logo_position]">Position </label><select id="mp4p_player_option[logo_position]" name="mp4p_player_option[logo_position]">';
		echo '<option value="top-left" '.selected( $logo_position, 'top-left' ).'>top-left</option><option value="top-right" '.selected( $logo_position, 'top-right' ).'>top-right</option><option value="bottom-left" '.selected( $logo_position, 'bottom-left' ).'>bottom-left</option><option value="bottom-right" '.selected( $logo_position, 'bottom-right' ).'>bottom-right</option><option value="control-bar" '.selected( $logo_position, 'control-bar' ).'>control-bar</option>';
		echo '</select>';
	}

	add_settings_field( 'mp4p_player_right_click', 'Setting the Right-click', 'mp4p_player_right_click_function', $option_group, $setting_section );
	function mp4p_player_right_click_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<input class="regular-text" name="mp4p_player_option[abouttext]" type="text" value="'.$mp4p_player_option['abouttext'].'" placeholder="About Text">';
		echo '<p class="description">Additional text which will display in the right-click menu. This must be set in order to use aboutlink.</p>';
		echo '<br>';
		echo '<input class="regular-text" name="mp4p_player_option[aboutlink]" type="text" value="'.$mp4p_player_option['aboutlink'].'" placeholder="http://">';
		echo '<p class="description">The URL then will open when a user clicks on abouttext. If this is not set, custom text will redirect to http://www.jwplayer.com/learn-more/.</p>';
	}

	add_settings_field( 'mp4p_player_advertising', 'Advertising', 'mp4p_player_advertising_function', $option_group, $setting_section );
	function mp4p_player_advertising_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		$advertising_client = $mp4p_player_option['advertising_client'];
		echo '<label for="mp4p_player_option[advertising_client]">Client </label><select id="mp4p_player_option[advertising_client]" name="mp4p_player_option[advertising_client]">';
		echo '<option value="none" '.selected( $advertising_client, 'none' ).'>none</option><option value="vast" '.selected( $advertising_client, 'vast' ).'>vast</option><option value="googima" '.selected( $advertising_client, 'googima' ).'>googima</option><option value="freewheel" '.selected( $advertising_client, 'freewheel' ).'>freewheel</option>';
		echo '</select>';
		echo '<br><br>';
		echo '<input class="regular-text" name="mp4p_player_option[advertising_tag]" type="text" value="'.$mp4p_player_option['advertising_tag'].'" placeholder="http://">';
		echo '<p class="description">The URL of the VAST tag to display, or custom string of the Freewheel tag to display</p>';
	}

	add_settings_field( 'mp4p_player_encode', 'Script Encode', 'mp4p_player_encode_function', $option_group, $setting_section );
	function mp4p_player_encode_function() {
		$mp4p_player_option = get_option( 'mp4p_player_option' );
		echo '<label><input name="mp4p_player_option[encode]" type="checkbox" value="1" ';
		echo checked( $mp4p_player_option['encode'], 1 ).'> encode the video source</label>';
	}
}
add_action( 'admin_menu', 'add_mp4p_menu' );

function mp4p_setting_function() {
	$option_group = 'mp4p_setting';
	echo '<h1>MP4 Player</h1>';
	echo '<form method="post" action="options.php">';
	settings_fields( $option_group );
	do_settings_sections( $option_group );
	submit_button();
	echo '</form>';
}

function mp4p_video_func( $atts, $link = '' ) {
	$mp4p_player_option = get_option( 'mp4p_player_option' );
	$thumbnail = $mp4p_player_option['thumbnail'] === '1' ? get_the_post_thumbnail_url('','full') : '';
	$advertising = $mp4p_player_option['advertising_client'] === 'none' ? '' : ',"advertising":{"client":"'.$mp4p_player_option['advertising_client'].'","tag":"'.$mp4p_player_option['advertising_tag'].'"}';
	$source = $link;
	$atts = shortcode_atts(
		array(
			'id' => $mp4p_player_option['id'],
		), $atts, 'mp4' );
	$player_div = '<div id="'.esc_html($atts['id']).'"></div><script src="https://ssl.p.jwpcdn.com/player/v/'.$mp4p_player_option['version'].'/jwplayer.js"></script>';
	$player = '<script>jwplayer.key="'.$mp4p_player_option['key'].'";jwplayer("'.esc_html($atts['id']).'").setup({"aspectratio":"'.$mp4p_player_option['ratio'].'","image":"'.$thumbnail.'","sources":"'.$source.'","displaytitle":false,"height":"'.$mp4p_player_option['height'].'","width":"'.$mp4p_player_option['width'].'","preload":"'.$mp4p_player_option['preload'].'","playbackRateControls":"'.$mp4p_player_option['playbackratecontrols'].'","logo":{"file":"'.$mp4p_player_option['logo'].'","link":"'.$mp4p_player_option['logo_link'].'","position":"'.$mp4p_player_option['logo_position'].'"},"abouttext":"'.$mp4p_player_option['abouttext'].'","aboutlink":"'.$mp4p_player_option['aboutlink'].'"'.$advertising.'});</script>';
	if($mp4p_player_option['resumeplayback'] === 'true') {
		$resumeplayback = '<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script><script>jwplayer("'.esc_html($atts['id']).'").once("play",function(){cookieData=Cookies.get("resume_playback");[resumeAt,duration]=cookieData.split(":");if(resumeAt<duration){jwplayer("'.esc_html($atts['id']).'").seek(resumeAt);}});jwplayer("'.esc_html($atts['id']).'").on("time",function(e){Cookies.set("resume_playback",`${Math.floor(e.position)}`+":"+jwplayer("'.esc_html($atts['id']).'").getDuration(),{path:`${document.location.pathname}`});});</script>';
	}
	if($mp4p_player_option['encode'] === '1') {
		return $player_div.'<script>document.write(window.atob("'.base64_encode($player.$resumeplayback).'"));</script>';
	} else {
		return $player_div.$player.$resumeplayback;
	}
}
add_shortcode( 'mp4', 'mp4p_video_func' );

function mp4p_video_quicktags() {
	if(wp_script_is('quicktags')) {
?>
		<script type="text/javascript">
			QTags.addButton( 'mp4', 'mp4', '[mp4]', '[/mp4]', '', 'MP4 Player', 201 );
		</script>
<?php
	}
}
add_action( 'admin_print_footer_scripts', 'mp4p_video_quicktags' );
?>
