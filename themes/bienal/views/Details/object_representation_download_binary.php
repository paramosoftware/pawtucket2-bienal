<?php
/* ----------------------------------------------------------------------
 * app/views/objects/object_representation_download_binary.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2009-2014 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	/*
	$vs_show_version = $this->getVar('version');
	$vs_file_path = $this->getVar('version_path');
	
	if (!headers_sent()) {
		header("Content-type: application/octet-stream");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate, private, post-check=0, pre-check=0");
		header("Pragma: no-cache");
	
		header("Content-Disposition: attachment; filename=".$this->getVar('version_download_name'));
	}
	
	set_time_limit(0);
	$o_fp = @fopen($vs_file_path,"rb");
	while(is_resource($o_fp) && !feof($o_fp)) {
		print(@fread($o_fp, 1024*8));
		ob_flush();
		flush();
	}
	
	exit();
	*/
	
	$va_files_paths = $this->getVar('version_path');
	$vs_resource_format = $this->getVar('format');

	if (!headers_sent()) 
	{
		if ($vs_resource_format == "pdf")
		{
			header("Content-type: application/pdf");
			header("Content-Disposition: attachment; filename=".$this->getVar('version_download_name').".pdf");
		}
		elseif ($vs_resource_format == "jpg")
		{
			header("Content-type: image/jpeg");
			header("Content-Disposition: attachment; filename=".$this->getVar('version_download_name').".jpg");
		}
			
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate, private, post-check=0, pre-check=0");
		header("Pragma: no-cache");
	}
	
	set_time_limit(0);

	if ($vs_resource_format == "pdf" || true)
	{
		print file_get_contents($va_files_paths[0]);
	}
	else
	{
		$pdf = new Imagick();
		$contador = 1;

		foreach ($va_files_paths as $vs_file_path)
		{
			$o_fp = file_get_contents($vs_file_path);

			$img1 = new Imagick();
			$img1->readImageBlob($o_fp);

			$pdf->addImage($img1);

			$img1->clear();
			$img1->destroy();
			
			if ($contador == 1)
				$pdf->setImageFormat('pdf');

			$contador++;
		}
		
		print $pdf->getImagesBlob();
	}

	exit();