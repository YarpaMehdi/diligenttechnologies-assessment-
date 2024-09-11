<?php 

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 

function theme_options_init(){
 register_setting( 'sample_options', 'sample_theme_options');
} 
function theme_options_add_page() {
 add_theme_page( __( 'Theme Options', 'sampletheme' ), __( 'Theme Options', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
} 
function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false; 
?>

<style>
.theme_option { padding:20px; height:100%;  }
.theme_option * { -webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box; }
.theme_option h1 { font-size:45px; }
.theme_option h1,
.theme_option h2 { text-transform:uppercase; font-weight: 800; margin: 0 0 30px; font-size:35px; line-height: 100%; }
.theme_option table { width:100%; text-align:left; }
.theme_option table th, .theme_option table td { padding:8px 15px; }
.theme_option table th { width:15%; text-transform:uppercase; padding:8px 15px 8px 0; }
.theme_option input[type="text"], .theme_option textarea { padding:8px 15px; width: 100%; display: block; font-size: 15px; font-weight: 100; border-radius:5px; }
.theme_option textarea { height:100px; }
.theme_option .btn { color: #fff; cursor: pointer; padding: 1em 2em; background: #23282d; font-weight: 700; border: 0; border-radius: 3px; text-transform: uppercase; margin: 30px 0 0; text-decoration: none; display:inline-block; }
.theme_option .img td { vertical-align:top; }
.theme_option .img img { border: 1px solid #adadad; padding: 2px; display: inline-block; vertical-align: top; border-radius: 3px; }
.theme_option .img input[type="text"] { width: 50%; min-width: 250px; display: inline-block; vertical-align: top; } 
.theme_option .img .btn { margin:0; vertical-align: top; }

.tabPanel { position: relative; height: 100%; width: 100%; background: #fff; }
.tabPanel:after { content:""; display:block; clear:both; }
.tabPanel .cstmTab { display:none; width: 75%;  float: left; padding:30px 20px; }

.tabTrgr { margin: 0; background: #23282d; border-radius: 3px; float: left; width: 20%; height: 80vh; }
.tabTrgr:after { content:""; display:block; clear:both; }
.tabTrgr li { display:block; margin:0; }
.tabTrgr li a { font-weight:400; font-size: 15px; text-transform: uppercase; padding:20px; color: #fff; display:block; text-decoration: none; border-top: 1px solid #fff; } 
.tabTrgr li:first-child a { border:0; }
.tabTrgr li a.active { background: #fff; color: #23282d; }
.saved_alert { background: #cbffcb; border: 1px solid #34da34; padding: 10px 15px; text-transform: uppercase; border-radius: 3px; margin: 0 0 10px; } 

</style>



<div class="theme_option">
	<?php screen_icon(); echo "<h1>". __( 'Custom Theme Options', 'customtheme' ) . "</h1>"; ?>
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="saved_alert">
			<strong><?php _e( 'Options saved', 'customtheme' ); ?></strong>
		</div>
	<?php endif; ?> 
	
	<form method="post" action="options.php">
		<?php 
			settings_fields( 'sample_options' ); $options = get_option( 'sample_theme_options' ); 
			if(function_exists( 'wp_enqueue_media' )){
				wp_enqueue_media();
			}else{
				wp_enqueue_style('thickbox');
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
			}
			/*$content = '';
			$editor_id = 'mycustomeditor';
			wp_editor( $content, $editor_id ); */
		?>
		
		<div class="tabPanel">
			<ul class="tabTrgr">
				<li> <a href="javascript:;" data-tab="#home_settings" class="active">Home Settings</a> </li>
				<li> <a href="javascript:;" data-tab="#header_settings">Header Settings</a> </li>
				<li> <a href="javascript:;" data-tab="#footer_settings">Footer Settings</a></li>
				<li> <a href="javascript:;" data-tab="#contact_settings">Contact Details</a></li>
				<li> <a href="javascript:;" data-tab="#socail_links">General Options</a>  </li>
			</ul>
		
			<div id="home_settings" class="cstmTab">
				<h2>Home Page Settings</h2>
				<table>
					<tbody>
						<tr><th>Home Tab</th></tr>
						<tr>
							<td width="30%">
								<input id="sample_theme_options[tab_1]" type="text" name="sample_theme_options[tab_1]" value="<?php esc_attr_e( $options['tab_1'] ); ?>" /><br>
								<textarea id="sample_theme_options[tabText]" class="large-text" name="sample_theme_options[tabText]"><?php echo esc_textarea( $options['tabText'] ); ?></textarea>
							</td>
							<td width="30%">
								<input id="sample_theme_options[tab_2]" type="text" name="sample_theme_options[tab_2]" value="<?php esc_attr_e( $options['tab_2'] ); ?>" /><br>
								<textarea id="sample_theme_options[tabText2]" class="large-text" name="sample_theme_options[tabText2]"><?php echo esc_textarea( $options['tabText2'] ); ?></textarea>
							</td>
							<td width="30%">
								<input id="sample_theme_options[tab_3]" type="text" name="sample_theme_options[tab_3]" value="<?php esc_attr_e( $options['tab_3'] ); ?>" /><br>
								<textarea id="sample_theme_options[tabText3]" class="large-text" name="sample_theme_options[tabText3]"><?php echo esc_textarea( $options['tabText3'] ); ?></textarea>
							</td>
						</tr>
					</tbody>
				</table> 
			</div>
			<div id="header_settings" class="cstmTab">
				<h2>Header Settings</h2>
				<table>
					<tbody>
						<tr class="img">
							<th>Logo Image URL:</th>
							<td>
								<img class="header_logo" src="<?php esc_attr_e( $options['logourl'] ); ?>" height="50" width="50"/>
								<input class="header_logo_url" type="text" name="sample_theme_options[logourl]" value="<?php esc_attr_e( $options['logourl'] ); ?>">
								<a href="#" class="header_logo_upload btn">Upload</a>
							</td>
						</tr>
						<tr class="img">
							<th>FavIcon Image:</th>
							<td>
								<img class="fav_logo" src="<?php esc_attr_e( $options['favIcon'] ); ?>" height="50" width="50"/>
								<input class="fav_logo_url" type="text" name="sample_theme_options[favIcon]" value="<?php esc_attr_e( $options['favIcon'] ); ?>">
								<a href="#" class="fav_logo_upload btn">Upload</a>
							</td>
						</tr>
						<tr>
							<th>Header Text</th>
							<td><textarea id="sample_theme_options[hdrText]" class="large-text" name="sample_theme_options[hdrText]"><?php echo esc_textarea( $options['hdrText'] ); ?></textarea></td>
						</tr>
					</tbody>
				</table> 
			</div>
			<div id="footer_settings" class="cstmTab">
				<h2>Footer Settings</h2>
				<table>
					<tbody>
						<tr>
							<th>Copyright</th>
							<td><input id="sample_theme_options[cpyrt]" type="text" name="sample_theme_options[cpyrt]" value="<?php esc_attr_e( $options['cpyrt'] ); ?>" /></td>
						</tr>
						<tr>
							<th>Footer Text</th>
							<td><textarea id="sample_theme_options[ftrText]" class="large-text" name="sample_theme_options[ftrText]"><?php echo esc_textarea( $options['ftrText'] ); ?></textarea></td>
						</tr>
					</tbody>
				</table> 
			</div>
			<div id="contact_settings" class="cstmTab">
				<h2>Contact Details</h2>
				<table>
					<tbody>
						<tr>
							<th>Address</th>
							<td><input id="sample_theme_options[addressOpt]" type="text" name="sample_theme_options[addressOpt]" value="<?php esc_attr_e( $options['addressOpt'] ); ?>" /></td>
						</tr>
						<tr>
							<th>Contact Phone</th>
							<td><input id="sample_theme_options[phnOpt]" type="text" name="sample_theme_options[phnOpt]" value="<?php esc_attr_e( $options['phnOpt'] ); ?>" /></td>
						</tr>
						<tr>
							<th>Email Address</th>
							<td><input id="sample_theme_options[emlOpt]" type="text" name="sample_theme_options[emlOpt]" value="<?php esc_attr_e( $options['emlOpt'] ); ?>" /></td>
						</tr>
						<tr>
							<th>Working Hours</th>
							<td><input id="sample_theme_options[timopt]" type="text" name="sample_theme_options[timopt]" value="<?php esc_attr_e( $options['timopt'] ); ?>" /></td>
						</tr>
					</tbody>
				</table> <br>
				<h2>Social Links</h2>
				<table>
					<tbody>
						<tr>
							<th>Facebook Link</th>
							<td><input id="sample_theme_options[fburl]" type="text" name="sample_theme_options[fburl]" value="<?php esc_attr_e( $options['fburl'] ); ?>" /></td>
						</tr> 
						<tr>
							<th>Twitter Link</th>
							<td><input id="sample_theme_options[twtrurl]" type="text" name="sample_theme_options[twtrurl]" value="<?php esc_attr_e( $options['twtrurl'] ); ?>" /></td>
						</tr>
						<tr>
							<th>Instagram Link</th>
							<td><input id="sample_theme_options[insturl]" type="text" name="sample_theme_options[insturl]" value="<?php esc_attr_e( $options['insturl'] ); ?>" /></td>
						</tr>
					</tbody>
				</table> 
			</div>
			<div id="socail_links" class="cstmTab">
				
			</div>
		</div>
		
		<input class="btn" type="submit" value="<?php _e( 'Save Options', 'customtheme' ); ?>" />
		
	</form>
</div>

<script>

	jQuery(document).ready(function($) {
		
		jQuery('.tabPanel .cstmTab:first').show();
		jQuery('.tabTrgr li a').click(function () {
			var src = jQuery(this).data('tab');
			jQuery('.tabTrgr li a').removeClass('active');
			jQuery('.tabPanel .cstmTab').hide();
			jQuery(this).addClass('active').closest('.tabPanel').find(src+'.cstmTab').fadeIn();
		});
		
        jQuery('.header_logo_upload').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: { text: 'Upload Image' },
                multiple: false  // Set this to true to allow multiple files to be selected
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                jQuery('.header_logo').attr('src', attachment.url);
                jQuery('.header_logo_url').val(attachment.url);
            }).open();
        });
		
		jQuery('.fav_logo_upload').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: { text: 'Upload Image' },
                multiple: false  // Set this to true to allow multiple files to be selected
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                jQuery('.fav_logo').attr('src', attachment.url);
                jQuery('.fav_logo_url').val(attachment.url);
            }).open();
        });
    });
</script>

<?php } ?>