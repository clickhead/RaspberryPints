<?php
require_once __DIR__.'/header.php';
$configs = getAllConfigs();
$htmlHelper = new HtmlHelper();
?> 
<!-- Start Header  -->
<?php
include 'top_menu.php';
?>
<!-- End Header -->
	
<!-- Top Breadcrumb Start -->
<div id="breadcrumb">
	<ul>	
		<li><img src="img/icons/icon_breadcrumb.png" alt="Location" /></li>
		<li><strong>Location:</strong></li>
		<li class="current">Configure Settings</li>
	</ul>
</div>
<!-- Top Breadcrumb End -->

<!-- Right Side/Main Content Start -->
<div id="rightside">
	<div class="contentcontainer lg left">
		<div class="headings alt">
			<h2>Personalize </h2>
		</div>
		<div class="contentbox">
		<?php $htmlHelper->ShowMessage(); ?>
		<a id="columns"></a> 
<div id="success" style="display:none;  z-index: 99 !important;">
Configuration Updated
</div>
		<h2>Display Preferences</h2><br /> 
    		<div>
    			<?php
    			    $result = getConfigurableConfigs();
    				foreach($result as $row) {
    				    echo '<h3>' . $row['displayName'] . ":"  .'<span id="' . $row['configName'] . 'Success" style="display:none; color: #8EA534;"> (Updated)</span>'. '</h3>'.
    					'On<input type="radio" ' . ($row['configValue']?'checked':'') . ' name="' . $row['configName'] . '" value="1" onclick="changeConfiguration(this)">' .
    					'Off<input type="radio" ' . (!$row['configValue']?'checked':'') . ' name="' . $row['configName'] . '" value="0" onclick="changeConfiguration(this)">'. 
    					
    					'<br><br>';
    			} ?>
    		</div>
		<hr />

	<?php
		$headerText=$configs[ConfigNames::HeaderText];
		$headerTextTruncLen=$configs[ConfigNames::HeaderTextTruncLen];
		$Client_ID=$configs[ConfigNames::ClientID];
		$Client_Secret=$configs[ConfigNames::ClientSecret];
		$BreweryID=$configs[ConfigNames::BreweryID];
	?>
	<a id="header"></a> 
		<h2>Taplist Header</h2><br><br>
		<p><b>Text to Display:</b></p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="largebox" value="<?php echo $headerText; ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::HeaderText.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#header"/>'; ?>
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form><br><br>
		<p><b>Truncate To:</b> (# characters)</p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="smallbox" value="<?php echo $headerTextTruncLen; ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::HeaderTextTruncLen.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#header"/>'; ?>
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form>
			<hr />
		<a id="untappd"></a>
		<h2>Untappd Settings</h2>
		<p><b>Untappd ClientID:</b> </p>
		<form method="post" action="includes/config_update.php">
			<input type="text" class="largebox" value="<?php echo $Client_ID; ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::ClientID.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#untappd"/>'; ?>
			<input type="submit" class="btn" name="Submit" value="Submit">
		</form>
		<p><b>Untappd Client Secret:</b> </p>
		<form method="post" action="includes/config_update.php">
			<input type="text" class="largebox" value="<?php echo $Client_Secret; ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::ClientSecret.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#untappd"/>'; ?>
			<input type="submit" class="btn" name="Submit" value="Submit">
		</form>
		<p><b>Untappd Brewery ID:</b> </p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="largebox" value="<?php echo $BreweryID; ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::BreweryID.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#untappd"/>'; ?>
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form>
		<hr />
	<a id="tapListLogo"></a> 
		<h2>Taplist Logo</h2>
		<p>This logo appears on the taplist.</p>
			<b>Current image:</b><br /><br />
			<img src="../img/logo.png<?php echo "?" . time(); ?>" height="100" alt="Brewery Logo" style="border-style: solid; border-width: 2px; border-color: #d6264f;" />
			<form enctype="multipart/form-data" action="includes/upload_image.php" method="POST"><br />
				<input name="uploaded" type="file" accept="image/gif, image/jpg, image/png"/>
				<?php echo '<input type="hidden" name="target" value="../../img/logo.png"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#untappd"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#tapListLogo"/>'; ?>
				<input type="submit" class="btn" value="Upload" />
			</form> 
			<hr />
	<a id="adminLogo"></a> 
		<h2>Admin Logo</h2>
		<p>This logo appears on the admin panel.</p>
			<b>Current image:</b><br /><br />
			<img src="img/logo.png<?php echo "?" . time(); ?>" height="100" alt="Brewery Logo" style="border-style: solid; border-width: 2px; border-color: #d6264f;" />
			<form enctype="multipart/form-data" action="includes/upload_image.php" method="POST"><br />
				<input name="uploaded" type="file" accept="image/gif, image/jpg, image/png"/>
				<?php echo '<input type="hidden" name="target" value="../img/logo.png"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#adminLogo"/>'; ?>
				<input type="submit" class="btn" value="Upload" />
			</form> 

		<hr />
	<a id="tapListBackground"></a> 
		<h2>Background Image</h2>
		<p>This background appears on the taplist.</p>
			<b>Current image:</b><br /><br />
				<img src="../img/background.jpg<?php echo "?" . time(); ?>" width="200" alt="Background" style="border-style: solid; border-width: 2px; border-color: #d6264f;" />
			<form enctype="multipart/form-data" action="includes/upload_image.php" method="POST">
				<input name="uploaded" type="file" accept="image/gif, image/jpg, image/png"/>
				<?php echo '<input type="hidden" name="target" value="../../img/background.jpg"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#tapListBackground"/>'; ?>
				<input type="submit" class="btn" value="Upload" /><br /><br />
			</form>
			<form action="restore_background.php" method="POST">
				<input type="submit" class="btn" value="Restore Default Background" />
			</form> 
		<hr />
	<a id="weightCalculation"></a> 
		<h2>Default Configuration for Calculating Weight</h2><br><br>
		<p><b>Altitude Above Sea Level (<?php echo $configs[ConfigNames::DisplayUnitDistance]; ?>):</b></p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="largebox" value="<?php echo (convert_distance($configs[ConfigNames::BreweryAltitude], $configs[ConfigNames::BreweryAltitudeUnit], $configs[ConfigNames::DisplayUnitDistance])); ?>" name="configValue"> &nbsp; 
								
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::BreweryAltitude.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#weightCalculation"/>'; ?>
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form><br><br>
		<p><b>Default Fermenation Pressure (<?php echo $configs[ConfigNames::DisplayUnitPressure]; ?>):</b></p>
		<p>0 if not fermenting under pressure</p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="largebox" value="<?php echo convert_pressure($configs[ConfigNames::DefaultFermPSI], $configs[ConfigNames::DefaultFermPSIUnit], $configs[ConfigNames::DisplayUnitPressure]); ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::DefaultFermPSI.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#weightCalculation"/>'; ?> 
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form><br><br>
		<p><b>Default Beer Temperature During Kegging (<?php echo $configs[ConfigNames::DisplayUnitTemperature]; ?>):</b></p>
			<form method="post" action="includes/config_update.php">
				<input type="text" class="largebox" value="<?php echo convert_temperature($configs[ConfigNames::DefaultKeggingTemp], $configs[ConfigNames::DefaultKeggingTempUnit], $configs[ConfigNames::DisplayUnitTemperature]); ?>" name="configValue"> &nbsp; 
				<?php echo '<input type="hidden" name="configName" value="'.ConfigNames::DefaultKeggingTemp.'"/>'; ?>
				<?php echo '<input type="hidden" name="jumpto" value="#weightCalculation"/>'; ?>
				<input type="submit" class="btn" name="Submit" value="Submit">
			</form><br><br>
	</div>
</div>

<!-- Start Footer -->

<?php 
include 'footer.php';
?>

	<!-- End Footer -->
		
	</div>
	<!-- Right Side/Main Content End -->
	
	<!-- Start Left Bar Menu -->   
<?php 
include 'left_bar.php';
?>
	<!-- End Left Bar Menu -->  
	<!-- Start Js  -->
<?php
include 'scripts.php';
?>
	<!-- End Js -->
	<!--[if IE 6]>
	<script type='text/javascript' src='scripts/png_fix.js'></script>
	<script type='text/javascript'>
	DD_belatedPNG.fix('img, .notifycount, .selected');
	</script>
	<![endif]--> 
	<script>
	function changeConfiguration(checkBox, config){
		var data = {};
		data[checkBox.name] = checkBox.value;
		$.ajax(
            {
                   type: "POST",
                   url: "includes/update_columnConfig.php",
                   data: data,// data to send to above script page if any
                   cache: false,
    
                   success: function(response)
                   {
                	   checkBox.checked = true; 
                	   document.getElementById(checkBox.name + 'Success').style.display = ""; 
                   }
             });
  	}
  	</script>
</body>
</html>
