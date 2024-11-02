<script lang="javascript">
function setbg(id, color) {
	document.getElementById(id).style.background=color;	
}


function AskConfirm() {

	return confirm ('Updates will be applied immediately! Press OK to Apply changes now.')
}

</script>
<div class="wrap" style="width:800px">
	<div id="brand" style="float:right;"><a href="http://brmo.co/bm_wpplugin"><img src="https://s3.amazonaws.com/brickandmobile/wordpress/brickandmobilelogo.png" /></a></div>
	<form name="optionsForm" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	<div class="icon32" id="icon-options-general"><br></div>
	<h2 style="font-family:Arial">brick&amp;mobile: Mobile  Redirect  Installer</h2>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="6" style="border:1px solid #ddd;padding:7px;background-color:#f0f0f0; font-family:Arial">
		<tr>
			<td align="left" width="150px">Redirect Status</td>
		  	<td valign="middle">
				 <?php 	if (get_option( 'mrr_redirect_status' )== "Active" )
				 			$status_active = "checked";
						if (get_option( 'mrr_redirect_status' )== "Inactive" )	
							$status_inactive = "checked";
				 ?>
				<p>
				  <label>
				    <input  name="redirect_status" type="radio" id="redirect_status_0" value="Active" <?php echo $status_active; ?>>
				    Active</label>
				  
				  <label>
				    <input type="radio" name="redirect_status" value="Inactive" id="redirect_status_1" <?php echo $status_inactive; ?>>
				    Inactive</label>
				  <br>
		    	</p>			
            </td>
      </tr>
         <tr>   
			<td align="left">Redirect Script Type</td>
		  	<td valign="middle">
            	<?php 	if (get_option( 'mrr_redirect_type' )== "JavaScript" )
				 			$js_active = "checked";
						if (get_option( 'mrr_redirect_type' )== "PHP" )	
							$php_active = "checked";
				 ?>
				<p>
				  <label>
				    <input type="radio" name="mrr_redirect_script" value="JavaScript" id="mrr_redirect_script_0" <?php echo $js_active; ?>>
				    HTML/JavaScript </label>
				  
				  <label>
				    <input type="radio" name="mrr_redirect_script" value="PHP" id="mrr_redirect_script_1" <?php echo $php_active; ?>>
				    PHP</label>
				  <br>
		    	</p>		  
            </td>
		</tr>
		<tr>
        	<td colspan="2">
        		Mobile Detection Code:
        	</td>
        </tr>	
		<tr>
        	<td colspan="2">
        		<textarea style="font-family: 'Lucida Grande', Verdana, Arial;font-size:11px;" id="mrr_redirect_code" 
									  onfocus="setbg('mrr_redirect_code','#d9ffd9');" onBlur="setbg('mrr_redirect_code','white');" rows="15" cols="105" name="mrr_redirect_code"><?php echo stripslashes(base64_decode ( get_option( 'mrr_redirect_code'))); ?></textarea>
        	</td>
        </tr>		
        <tr>			
			<td colspan="2">
				<input type="submit" name="update_page" value="Save" onClick="return AskConfirm()"/>				

            </td>
			
		</tr>
	</table>
	</form>	
</div>
	
<div style="border:1px solid #DDDDDD; margin-top:5px; margin-bottom:10px; background-color:#f1f1ff;padding:2px;width:800px; font-family:Arial">
	
		<strong style="margin-left:5px;">Instructions:</strong>
  <ul style="list-style:circle;margin-left:25px;">
			<li><strong>Step 1: </strong>Login to the  <a href="https://admin.brickandmobile.com">brick&amp;mobile Mobile CMS</a> and open the mobile website you want to redirect</li>
			<li><strong>Step 2: </strong>Under the Mobile Site Settings menu on the left side panel, click &quot;Integrate&quot;</li>
			<li><strong>Step 3:</strong> Copy the entire mobile detection code from either the HTML/JavaScript (preferred) or PHP boxes</li>
			<li><strong>Step 4:</strong> Paste the mobile detection code into the large box on this page</li>
			<li><strong>Step 5:</strong> Select the appropriate Redirect Script Type based on the script code you pasted</li>
			<li><strong>Step 6:</strong> Select &quot;Active&quot; on the settings above to enable the redirect </li>
			<li><strong>Step 7:</strong> Click &quot;Save' and you're done! The redirect script will automatically be installed in the perfect place. </li>
  </ul>
        <strong style="margin-left:5px;"><em>Frequently Asked Questions:</em></strong>
        <ul style="list-style:circle;margin-left:25px;">
			<li><em><strong>Should I use HTML/JavaScript or PHP?</strong>
		    </em>
			  <ul>
			    <li><em>HTML/JavaScript is preferred, but it depends on the theme you have installed. Certain Wordpress themes work better with PHP redirect scripts. Choose PHP if HTML/JavaScript is not working for you.</em></li>
		      </ul>
		  </li>
  </ul>
        <ul style="list-style:circle;margin-left:25px;">
          <li><em><strong>Where will this script direct users to?</strong>
          </em>
            <ul>
              <li><em>The script will redirect users to the mobile website that you generated the mobile redirect script for. Be careful only to use the mobile redirect script generated in the brick&amp;mobile Mobile CMS for the same website, as every redirect script is unique.</em></li>
            </ul>
          </li>
  </ul>
        <ul style="list-style:circle;margin-left:25px;">
          <li><em><strong>What kind of devices will be redirected?</strong>
          </em>
            <ul>
              <li><em>Only mobile phone browsers will be redirected to your mobile website. This includes  iPhone, BlackBerry, Android and Windows Phone devices. Currently iPad and tablet devices are not handled by the detection code.</em></li>
            </ul>
          </li>
        </ul>
  <ul style="list-style:circle;margin-left:25px;">
          <li><em><strong>What if I don't have an account with brick&amp;mobile?</strong>
          </em>
            <ul>
              <li><em>You can sign up for a free trial anytime by visiting <a href="http://brmo.co/bm_wpplugin">brickandmobile.com</a></em></li>
            </ul>
    </li>
  </ul>
        <h3 style="margin-left:5px">&nbsp;</h3>
        <h3 style="margin-left:5px">Have a question? Please <a href="http://support.brickandmobile.com/tickets/new">submit a ticket</a> with our support desk.  </h3>
  <p> <strong style="margin-left:5px;">Powered by brick&amp;mobile </strong></p>
        <p style="font-size:10px">© 2012 <a href="http://www.brickandmobile.com/">brick&amp;mobile</a>, a division of Axiom Marketing Inc. All Rights Reserved.<br />
        <a href="http://www.brickandmobile.com/terms">Terms of Service</a> | <a href="http://www.brickandmobile.com/privacy">Privacy Policy</a></p>
</div>