<?php
/*
Plugin Name: brick&amp;mobile Mobile Redirect Installer
Plugin URL: http://www.brickandmobile.com/
Description: This plugin installs the brick&amp;mobile Mobile Detection Code into the perfect position on your Wordpress website or blog to redirect mobile visitors to your premium mobile website. 
Version: 1.2012.02.29
Author: brick&amp;mobile
Author URL: http://www.brickandmobile.com/
*/
class BrickMobileRedirect {		

	// -----------------------------------------------------------------------------------------
	
	var $pluginPath;
	var $pluginUrl;
		
	// -----------------------------------------------------------------------------------------
	
	public function __construct(){
		
		$this->pluginPath = dirname(__FILE__);
		$this->pluginUrl = WP_PLUGIN_URL . '/brickandmobile-redirect';
		
		//default policies

		//add_action("wp_head", array($this, "inject_js")); 
		add_filter ('wp', array($this, 'mobile_redirect_pro'));
		
		register_activation_hook( __FILE__, array($this, 'mr_install_default_values') );
		
		register_deactivation_hook( __FILE__, array($this, 'mr_uninstall_default_values') );
		
		$menu_page = add_action('admin_menu', array($this, 'mr_plugin_menu'));
	
	}
	
	function mr_install_default_values(){
		add_option( 'mrr_redirect_status', 'Inactive');
		add_option( 'mrr_redirect_type', '');												
		add_option( 'mrr_redirect_code', '');

		
	}
	function mr_uninstall_default_values(){
		delete_option( 'mrr_redirect_status');												
		delete_option( 'mrr_redirect_type');												
		delete_option( 'mrr_redirect_code');
		
	}
	function mr_plugin_menu() {
		add_menu_page('Mobile Redirect', 'Mobile Redirect', 10, basename(__FILE__), array($this, 'mr_options'));
			//add_submenu_page(basename(__FILE__), 'Help', 'Help', 10, 'mr_help', array($this, 'mr_help'));
	}
	
	//parsing policy for url and blogname and email address
	function mr_options() {
		if(isset($_REQUEST[update_page]) && $_REQUEST[update_page] == 'Save' ){
			//print_r($_POST);
			$this->updateOptions();		
			echo '<div class="updated" style="font-size:16px; padding: 4px; margin-top:5px; margin-bottom:5px;">Redirect options updated!</div>';
		}
		if (file_exists (dirname (__FILE__).'/mr_options.php'))
			include (dirname (__FILE__).'/mr_options.php');
	}

	function updateOptions() {		
		update_option( 'mrr_redirect_status', stripslashes( (string) $_POST['redirect_status' ] ));												
		update_option( 'mrr_redirect_type', stripslashes( (string) $_POST['mrr_redirect_script' ] ));
		update_option( 'mrr_redirect_code', base64_encode(trim($_POST['mrr_redirect_code' ])));
		if(get_option('mrr_redirect_type') == "PHP"){
			$handle = fopen($this->pluginPath."/php_redirect.php", "w+");
			fwrite($handle, stripslashes($_POST['mrr_redirect_code' ]));
		}	

	}
		
	
	function mr_help() {
		$help_string ='<ul>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='<li>Help text will be published here!</li>';
		$help_string .='</ul>';
		echo $help_string;
	}	
	
	function mobile_redirect_pro() {
		//error_reporting(0);	
		if( get_option('mrr_redirect_status') == "Active" ) {
			$redirect_code = stripslashes(base64_decode ( get_option( 'mrr_redirect_code')));
			if( get_option('mrr_redirect_type') == "JavaScript" ) {
				if($redirect_code!=''){
					add_action("wp_head", array($this, "inject_js")); 
				}
			}
			else if (get_option('mrr_redirect_type') == "PHP"){
				if($redirect_code!=''){
					if (file_exists($this->pluginPath."/php_redirect.php")) {
						include($this->pluginPath."/php_redirect.php");
					} /*else {
						$php_tags = array("<?php", "?>", "return;");
						$clean_code =  str_ireplace( $php_tags, "", $redirect_code);
						eval($clean_code);						
					}*/
				}
			}
					
		}
		

	}
	function inject_js(){
		$redirect_code = stripslashes(base64_decode ( get_option( 'mrr_redirect_code')));
		echo $redirect_code;
	}
		
		
}
$BrickMobileRedirect = new BrickMobileRedirect();	
?>