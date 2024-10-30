<link rel="stylesheet" href="<?php bloginfo('home')?>/wp-content/plugins/kazooky-loyalty-rewards/css/style.css" type="text/css">
<script src="http://console.kazookyloyalty.com/js/api/kloyalty.operator.js" type="text/javascript"></script>
<script src="<?php bloginfo('home')?>/wp-content/plugins/kazooky-loyalty-rewards/js/kazooky.js" type="text/javascript"></script>

<div class="wrap">
<?php //screen_icon('options-general');?>
<div class="imgkazooky"><img src="<?php bloginfo('home')?>/wp-content/plugins/kazooky-loyalty-rewards/kazooky.png"></div>
<?php 
$url=get_bloginfo('home');
$host = explode('//',  $url);
$host = $host[1];
if(isset($_GET['success'])){?>
    <div id="message" class="updated">
        <p><b>Done!</b></p>
    </div>
<?php  }?>
<h2>Kazooky Loyalty</h2>
<!-- ##### FREE Loyalty Account Start here ####-->
<div class="span6">
		<div style="background-color: white;float:left" class="well"> 
			<div class="form-horizontal"> 
				<h4>Account Information</h4>
					
				<div class="control-group ">
					<label for="website" class="control-label">Website</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on">http://</span>
				   			<input type="text" id="website"  value="<?php echo $host;?>" class="input-large" name="website">
				   			<!--<span id="website_error" class="error"></span>-->
				   		</div>
				   	</div>
				</div>
				<div class="control-group ">
					<label for="email" class="control-label">Email</label>
					<div class="controls">
						<input type="text" id="email" value="" class="input-large" name="email">
						<span id="email_error" class="error"></span>
					</div>	
				</div>
				<div class="control-group ">
					<label for="password" class="control-label">Password</label>
					<div class="controls">
						<input type="password" id="password" value="" class="input-large" name="password">
						<span id="password_error" class="error"></span>
					</div>	
				</div>
				<div class="control-group ">
					<label for="verifyPassword" class="control-label">Verify Password</label>
					<div class="controls">
						<input type="password" id="verifyPassword" value="" class="input-large" name="verifyPassword">
						<span id="verifyPassword_error" class="error"></span>
					</div>	
				</div>				
				<div class="form-actions">
					<div class="pull-right">
						<input type="submit" value="Sign Up to Kazooky Loyalty" class="btn btn-large btn-warning signupButton button-primary"  name="submitButton" id="signupNow" >
					</div>
					
				</div>
			</div> 	
			<div class="msgkazooky">
			<h3>Why Sign Up To Kazooky Loyalty?</h3>
			<p>We need your information so we can create your account in your new <a href="https://console.kazookyloyalty.com" target="_blank">Engagement Console</a>. This gives you access to powerfull tools to create loyalty
			   and reward your users. you can also build promotions and offers that can be used to drive more sales and conversions.
			</p>
			</div>
		<p class="kaz_privacy">Privacy- Kazooky Inc will never share private information with any 3rd party companies or organization.</p>	
		</div>
		
	</div>
<!-- ##### FREE Loyalty Account End here ####-->


<div class="save">
<form method="post" enctype="multipart/form-data">
<?php wp_nonce_field( 'kazooky_loyalty_settings_page', 'kazooky_loyalty_settings_page' ); ?>
<p><strong>Your Kazooky Loyalty App Id: </strong><input type="text" class="regular-text" name="appId" value="<?php echo $appId;?>" /></p>
<p><input type="submit" class="button-primary" value="Save Changes" /></p>
<p></p>
<p><strong></strong></p>
<p class="howto"></p>
</form>
<div>If you already have a Kazooky Loyalty account,then you can find your App ID in<br>
<a target="_blank" href="https://console.kazookyloyalty.com">Your Kazooky Engagement Console</a>

</div>
</div>
</div>
