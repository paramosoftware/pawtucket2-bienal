<?php
	$vn_set_id = $this->getVar("set_id");
	$va_set_item = $this->getVar("set_item");
	$va_set_items = $this->getVar("set_items");
	
	// FRED 14/03/2024
	// Recuperando subsets deste set //
	
	$va_subsets_info = $this->getVar("subsets") ?? array();
	$vn_parent_set = $this->getVar("parent_set") ?? "";

	// FRED 14/03/2024
	// Recuperando subsets deste set //
	
	$itens_por_pagina = 8;
	
	$offset	= (int)$this->getVar('start');
	$pagina_atual = ( ( $offset / $itens_por_pagina ) +1 );
			
	$paginas_totais = ceil(count($va_set_items) / $itens_por_pagina);
?>

<link rel="stylesheet" type="text/css" href="/pawtucket/assets/bootstrap/css/bootstrap.css" />

<style>
	.container {margin:0 auto;max-width:1300px;display:flex;flex-flow:row wrap;width:100%}
    main {font-size:0px;display:flex;flex-flow:row wrap;}
	main #titulo {padding:20px 30px;font-family:"Helvetica Heavy";font-size:38px;text-transform:uppercase;color:#333;width:100%;padding-right:20%;position:relative;line-height:38px;border-bottom:#555 dashed 1px;}
	main #conteudo {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
	main #descricao {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:100%;flex-grow:2;}
	
	main #paginacao {padding:20px 10px;border:#aaa solid 1px;font-family:"Helvetica Roman";text-align:center;border-radius:0px 0px 5px 5px}
	main #paginacao .pagina {display:inline-block;}
	main #paginacao .paginas {display:inline-block}
	main #paginacao .jumper {float:right;color:#333;font-family:"Helvetica Heavy";text-transform:uppercase;display:inline-block;}
	main #paginacao .jumper input {background-color:#222;color:#fff;border-radius:4px;padding:7px 11px;border:none;width:60px;margin-left:4px}
	main #paginacao .paginas .botao {width:30px;margin-right: 3px;}
	main #paginacao .paginas ul {margin:0;padding:0;list-style:none;display:inline-block;line-height:20px;}
	main #paginacao .paginas ul li {display:inline-block;color:#333;font-family:"Helvetica Roman";font-size:14px;padding:0px 7px}
	main #paginacao .paginas ul li.selecionado {padding:4px 9px 5px 9px;border:#09C dashed 1px;color:#09c;font-family:"Helvetica Heavy";border-radius:4px}
	main #paginacao .paginas ul li a {color:inherit}
	main #paginacao .paginas a:hover {text-decoration:none}
	
	main #links {display:block;vertical-align:top;padding:20px 0px 5px 30px;width: 100%;}
    main #links a {display:inline-block;vertical-align:top;font-size:14px;font-family:"Helvetica Roman";color:#09C;padding:10px;border-radius:4px;border:#09c solid 1px;margin-right:10px;}
		
	.pagina {float:left;height:30px;line-height:30px;display:inline-block;font-family:"Helvetica Bold";font-size:14px;text-transform:uppercase;color:#222;}
	.botao {padding:7px 10px;border-radius:4px;background-color:#fff;border:#333 solid 1px;color:#333;display:inline-block;vertical-align:top;font-size:14px}
	.icon {color:inherit}
	.icon:before {font-family:"FontAwesome";border:none;font-size:inherit;color:inherit;vertical-align:top}
	.icon.download:before {content:"\f019"}
	.icon.layout:before {content:"\f0ca"}
	.icon.inicio:before {content:"\f100"}
	.icon.final:before {content:"\f101"}
	.icon.proximo:before {content:"\f105"}
	.icon.anterior:before {content:"\f104"}

	#browseResultsContainer{
		margin-top:20px;
		height:100%;
		position:relative;
	}
	.bResultItemCol{
		height:280px;
		margin-bottom:10px;
	}
	.bResultItemContent {
		height:260px;
		overflow:hidden;
	}
	.bResultItem {
		background-color: #FFFFFF;
		-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
		line-height: 1em;
		padding: 10px;
	}
</style>

	<div id="titulo">
		<i>GALERIA</i> <?php print $this->getVar("label"); ?>
	</div>

	<div class="container">
		
        <div id="descricao">
            <div id="atributos">
				<div class="atributo">
					<div class="valor"><?php print $this->getVar("description"); ?></div>
				</div>
			</div>
		</div>
		
		<?php
			// FRED 14/03/2024
			// Exibindo botões de acesso aos subsets //

			if (count($va_subsets_info) || $vn_parent_set)
			{
			?>
				<div id="links">
					<?php
						if ($vn_parent_set) 
						{ 
						?>
							<a href="/pawtucket/index.php/Gallery/getSetInfo/set_id/<?php print $vn_parent_set; ?>">Voltar</a>
						<?php 
						} 
						
						foreach ($va_subsets_info as $va_subset)
						{
						?>
							<a href="/pawtucket/index.php/Gallery/getSetInfo/set_id/<?php print $va_subset["set_id"]; ?>/parent/<?php print $vn_set_id; ?>"><?php print $va_subset["set_name"]; ?></a>
						<?php
						}
					?>
				</div>
			<?php
			}

			// FRED 14/03/2024
			// Exibindo botões de acesso aos subsets //
		?>
		
		<div id="conteudo">
			<div class="row">
				<div id="">
					<?php
					
					$contador = 1;
					foreach($va_set_items as $va_set_item)
					{
						if ($contador > $offset)
						{
							$t_object = new ca_objects($va_set_item["row_id"]);

							$vb_external_image_access = $t_object->get('ca_objects.external_image_access');
							//$vb_external_image_access = 0;
							
							$vs_resource_path = "";
							$vb_resource_found = false;
							if ( true && (!isset($vb_external_image_access) || ($vb_external_image_access == 59)) && ($t_object->get('ca_objects.has_external_image') == 227) )
							{
								$vn_object_location_id = $t_object->get('location_identifier');
							
								$va_object_locations_ids = explode(";", $vn_object_location_id);
								sort($va_object_locations_ids);
								
								foreach ($va_object_locations_ids as $vn_object_location_id)
								{
									// Lendo a imagem via API do ResourceSpace
									// FRED 24/11/2022
									//////////////////////////////////////////
									
									$vs_rs_url = "http://187.50.25.114/api/?";
									//$vs_rs_url = "http://imagens.bienal.art.br/api/?";
									$vs_private_key = "fd2b498d659711bea88994660ba62a9fc69549ec3b882d3dd6e8238676732ee5";
									$vs_user = "api_access";

									$vs_query = "user=" . $vs_user . "&function=do_search&search=" . urlencode("cdigodelocalizao:" . $vn_object_location_id) . "&order_by=resourceid&sort=asc";

									// Sign the query using the private key
									$vs_sign = hash("sha256", $vs_private_key . $vs_query);
									
									$va_resources = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));
									
									if (is_array($va_resources) && count($va_resources))
									{
										$vb_resource_found = true;
										break;
									}
									else
										array_shift($va_object_locations_ids);
								}

								$vs_resource_path = "";
								if (count($va_resources))
								{
									$va_resource = $va_resources[0];
									
									$vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $va_resource->ref . "&getfilepath=1&size=thm";
									
									$vs_sign = hash("sha256", $vs_private_key . $vs_query);

									$vs_resource_path = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));
									//$vs_resource_path = str_replace('/var/www/resourcespace/include/../', 'http://187.50.25.114/', $vs_resource_path);
									$vs_resource_path = str_replace('/var/www/resourcespace/include/../', 'http://imagens.bienal.art.br/', $vs_resource_path);	
								}
							}
						?>
							<div class='bResultItemCol col-xs-6 col-sm-6 col-md-3'>
								<div class='bResultItem'>
									<div class='bResultItemContent'>
										<a style="color:unset" href="<?php print $this->request->getBaseUrlPath() . '/index.php/Detail/documento/' . $va_set_item['row_id']; ?>" target="_blank">
										<?php if ($vs_resource_path)
										{
										?>
											<div class='text-center bResultItemImg'>
												<img src="<?php print $vs_resource_path; ?>">
											</div>
										<?php
										}
										?>

										<div class='text-center bResultItemText'>
											<br>
											<small><?php print $t_object->getWithTemplate("^ca_objects.idno"); ?></small>
											<br/>
											<?php
												if ($t_object->getWithTemplate("^ca_objects.document_genre") == "Bibliográfico")
												{
													$vs_object_title = $t_object->getWithTemplate("^ca_objects.preferred_labels");
													
													print substr($vs_object_title, 0, 75) . ((strlen($vs_object_title) > 75) ? "..." : "");
												}
												else
													print $t_object->getWithTemplate("^ca_objects.document_type");
											?>
										</div>
										</a>
									</div>
								</div>
							</a>
							</div>					
						<?php
							if ($contador == 8 + $offset)
								break;
						}
						
						$contador++;
					}
					?>
				</div>
			</div>
			
			<div id="paginacao">
                
				<div class="pagina">página <?php echo $pagina_atual?> de <?php echo $paginas_totais?></div>
				
				<div class="paginas">
				<?php            
			
					$vn_i = (($offset/$itens_por_pagina)+1) - 10;
					$vn_i = $vn_i < 1 ? 1 : $vn_i;
					$vn_f = $vn_i+20;
					$vn_f = $vn_f > $paginas_totais ? $paginas_totais : $vn_f;
					$html_paginacao = '';
					if ( $vn_i > 1 ) {
						$html_paginacao .= caNavLink( $this->request, "" , 'nextNav botao icon inicio', '*', '*', '*', array('set_id' => $vn_set_id, 's' => 0));
					}                        
					if ( $vn_i > 10 ) { $html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon anterior', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina*($vn_i-1))-$itens_por_pagina));}
					$html_paginacao .= '<ul>';
					while ($vn_i <= $vn_f ) {
						$html_paginacao .= "<li ".($offset==(($itens_por_pagina*$vn_i)-$itens_por_pagina) ? 'class="selecionado"': "").">".caNavLink($this->request, $vn_i , 'nextNav', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina*$vn_i)-$itens_por_pagina ))."</li>";
						$vn_i++;
					}
					$html_paginacao .= "</ul>";
					if ( $vn_f < $paginas_totais) {  $html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon proximo', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina*($vn_i))-$itens_por_pagina )); }
					if ( $vn_f < $paginas_totais ) {
						$html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon final', '*', '*', '*', array('set_id' => $vn_set_id, 's' => ($itens_por_pagina*$paginas_totais)-$itens_por_pagina ));
					}
					print $html_paginacao;
				
				?>
				</div>
				
				<?php if ($paginas_totais > 1) { ?>                    
				<div class="jumper">
					pular para página
					<input />
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>
	
	<script>        
		$(".jumper input").keypress(function ( $e ) {
			if ( $e.which == 13 && $(this).val().trim() != "" && !isNaN( $(this).val() ) && Number($(this).val()) <= <?=$paginas_totais?> && Number($(this).val()) > 0 ) {
				var offset = <?=$itens_por_pagina?> * ($(this).val()-1);
				window.location.href = "<?php echo $this->request->getBaseUrlPath();?>/index.php/Gallery/getSetInfo/set_id/<?=$vn_set_id?>/s/" + offset;
			}
		});		
	</script>