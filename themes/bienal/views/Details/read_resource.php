<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	header("Access-Control-Allow-Origin: *");

	$vn_object_location_id = $this->getVar("id");
	$va_api_credentials = $this->getVar("api_credentials");

	foreach($va_api_credentials as $vs_instance => $va_instance_api)
	{
		$vs_rs_url = $va_instance_api['resourcespace_base_api_url'];
		$vs_private_key = $va_instance_api['resourcespace_api_key'];
		$vs_user = $va_instance_api['resourcespace_user'];

		break;
	}

	$vs_query = "user=" . $vs_user . "&function=do_search&search=" . $vn_object_location_id . "&order_by=resourceid&sort=asc";

	// Sign the query using the private key
	$vs_sign = hash("sha256", $vs_private_key . $vs_query);

	$va_resources = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));
	
	$vb_resource_found = false;
	if (count($va_resources))
	{
		foreach($va_resources as $va_resource)
		{
			//if ( ($va_resource->field113 == $vn_object_location_id) || ($va_resource->ref == $vn_object_location_id) )
			{
				$vb_resource_found = true;
				$vn_resource_ref = $va_resource->ref;

				if ($va_resource->file_extension == "pdf")
					$vb_pdf = true;

				break;
			}
		}
	}
	
	if (!isset($va_resource) || !$vb_resource_found)
	{
		print "Nenhuma imagem disponível.";
		exit();
	}
	
	$vb_pdf = false;
	if ($va_resource->file_extension == "pdf")
		$vb_pdf = true;

	if (!$vb_pdf)
		$vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $vn_resource_ref . "&getfilepath=1&size=scr";
	else
		$vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $vn_resource_ref . "&getfilepath=1&extension=pdf";
	
	$vs_sign = hash("sha256", $vs_private_key . $vs_query);

	$vs_resource_path = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));	

	if (!$vb_pdf)
	{
	?>										
		<img id="image" src="<?php print trim($vs_resource_path); ?>" width="500px">
	<?php
	}
	else
	{
	?>
		<?php if (false) { ?>
		<object data="<?php print trim($vs_resource_path); ?>" type="application/pdf" width="500px" height="600px">
			<object data="<?php print trim($vs_resource_path); ?>" type="application/pdf">
		</object>
		<?php } else { ?>
		<iframe src="/pawtucket/themes/bienal/assets/pdfjs/web/viewer.html?file=<?php print $vs_resource_path; ?>" width="100%" height="600px"></iframe>
		<?php } ?>
		
		<input type="hidden" id="resource_ref" value="<?php print trim($vn_resource_ref); ?>">
		
	<?php
	}
?>