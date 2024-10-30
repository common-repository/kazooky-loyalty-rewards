<?php
 
if (!class_exists("KazookyLoyalty")) {
	class KazookyLoyalty{
		var $plugin_url = '' ;
		var $plugin_path = '' ;
		var $version = '0.1';
		var $setting_page = '';
		var $options = '';
		var $option_name = 'KazookyLoyalty';
		
		function __construct(){
			global $wpdb;
			$this->plugin_path = dirname(__FILE__);
			$this->lib_path = $this->plugin_path.'/lib';
			$this->plugin_url = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__));
			add_action('admin_menu',array(&$this,'add_menu_pages'));
			add_action('wp_head',array(&$this,'wp_head'));
		
		}
		
		function wp_head(){
			if(!$appId = $this->get_option('appId'))
				return;
			wp_enqueue_script('kazooky_loyalty_js','https://console.kazookyloyalty.com/dynjs/ktoolbar?appId='.$appId,array('jquery','jquery-ui-core','jquery-ui-dialog', 'jquery-ui-button', 'jquery-ui-datepicker', 'jquery-ui-resizable', 'jquery-ui-tabs'),'1',false);
		}
		
		
		function add_menu_pages(){

			add_menu_page('Kazooky Loyalty', 'Kazooky Loyalty', 'manage_options','kazooky_loyalty_settings_page',  array(&$this,'settings_page'));

			$m0=add_submenu_page('kazooky_loyalty_settings_page', 'Settings Page', 'Settings Page', 'manage_options','kazooky_loyalty_settings_page',  array(&$this,'settings_page'));

		}

		
		function install(){
		
			$o = $this->get_option();
			
			if( !$o || $o['version'] != $this->version ){
			
				$o = array(
						'version'=>$this->version,
						'appId'=>$o['appId']?$o['appId']:'',
					);
			}
			$this->update_option($o);
			
			
			
		}
		
		function uninstall(){
			
			delete_option($this->option_name);
		}
		
		
		function get_option($name=''){
			
			if(empty($this->options)){
			
				$options = get_option($this->option_name);
				
			}else{
			
				$options = $this->options;
			}
			if(!$options) return false;
			if($name)
				return $options[$name];
			return $options;
		}
		
		function update_option($ops){
		
			if(is_array($ops)){
			
				$options = $this->get_option();
				
				foreach($ops as $key => $value){
					
					$options[$key] = $value;
					
				}
				update_option($this->option_name,$options);
				$this->options = $options;
			}			
			
		
		}
		
		
		function settings_page(){
			if(wp_verify_nonce( $_POST['kazooky_loyalty_settings_page'], 'kazooky_loyalty_settings_page' )){
				$o = $this->get_option();
				$o['appId'] = wp_strip_all_tags($_POST['appId']);
				$this->update_option($o);
				$this->redirect_to_current_page();
			}
			$options = $this->get_option();
			extract($options);
			@include($this->plugin_path.'/kazooky_loyalty_settings_page.php');
		}


		
		function redirect_to_current_page(){
			
			$this->redirect_to_page(admin_url('admin.php?page='.$_REQUEST['page'].'&success'));
		}
		
		function redirect_to_page($redir){
			echo "<meta http-equiv='refresh' content='0;url={$redir}' />";
			exit;
		}
		
	}
	
	
}

if(!isset($KazookyLoyalty)){
		$KazookyLoyalty = new KazookyLoyalty();
}
?>
