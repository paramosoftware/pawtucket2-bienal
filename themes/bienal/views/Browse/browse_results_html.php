			<style>
				main {font-size:0px;}			
				main #titulo {padding:20px 30px;font-family:"Helvetica Heavy";font-size:38px;text-transform:uppercase;color:#333;}			
				main #criterios {padding:25px 30px;border-top:#888 dashed 1px}
				main #criterios span {font-family:"Helvetica Roman";border-radius:4px;background-color:#222;color:#fff;padding:9px 16px 9px 10px;font-size:13px;margin-right:5px}			
				main #criterios a {font-family:"Helvetica Roman";border-radius:4px;background-color:#09C;color:#fff;padding:9px 16px 9px 10px;font-size:13px;margin-right:5px}			
				main #criterios a:before {content:"\f00d";font-family:"FontAwesome";margin-right:5px;opacity:.5}
				
				/*
				main #facetas {border-top:#555 dashed 1px;display:inline-block;vertical-align:top;width:250px;font-size:12px;height:100%;border-left:#aaa solid 1px;position:relative;}
				*/
				
				main #facetas {border-top:#555 dashed 1px;display:inline-block;vertical-align:top;width:200px;font-size:12px;height:100%;position:relative;}
				
				main #facetas h3 {font-family:"Helvetica Heavy";text-transform:uppercase;font-weight:normal;color:#333;padding:30px 30px 0px 30px;margin:0;}
				main #facetas h3:before {content:"\f0b0";font-family:"FontAwesome";margin-right:5px}
				main #facetas ul {padding:0;margin:0;list-style:none;margin:0;padding:15px;border-bottom:#888 dashed 1px;color:#333;}
				main #facetas ul:last-child {border:none}
				main #facetas li {font-family:"Helvetica Roman";padding:4px 0px;border-top:#aaa dashed 1px}
				main #facetas li:first-child {border:none;padding-bottom:10px}
				main #facetas li.mais {margin-top:10px}
				main #facetas li.titulo {font-family:"Helvetica Bold";text-transform:uppercase;width:100%}
				main #facetas li.mais {display:inline-block;color:#09C;border:#09C solid 1px;color:#09c;padding:7px 11px;font-family:"Helvetica Roman";border-radius:4px}
				main #facetas li.mais:before {content:"\f067";font-family:"FontAwesome";margin-right:5px}
				main #resultado {padding:0px 30px 30px 30px;border-top:#555 dashed 1px;display:inline-block;vertical-align:top;width:calc(100% - 250px);font-size:12px;height:100%;position:relative}			
				main #ferramentas {padding:20px 0px;height:70px;text-align:right}
				main #ferramentas select {height:30px;line-height:30px;padding:5px;border:#999 solid 1px;border-radius:4px;font-size:14px;font-family:"Helvetica Roman";vertical-align:top}
				main #ferramentas select:last-child {margin:0}
				main #ferramentas .icon {line-height:30px;margin:0px 8px;font-size:22px}
				main #ferramentas .botao {margin-left:3px;font-family:"Helvetica Medium";font-size:11px;text-transform:uppercase}
				main #ordenacao {padding:20px 10px;font-family:"Helvetica Bold";font-size:13px;color:#222;border:#bbb solid 1px;border-bottom:#aaa solid 1px;border-radius:5px 5px 0px 0px}
				main #ordenacao ul {margin:0;padding:0;list-style:none;display:inline-block;vertical-align:top}
				main #ordenacao ul li {display:inline-block;line-height:20px;padding:4px}
				main #ordenacao ul li a {color:inherit;font-family:"Helvetica Roman";}
				main #ordenacao ul li.selecionado {color:#09c;border:#09c dashed 1px;border-radius:4px;padding:4px 9px}
				main #cabecalho {font-size:0px;color:#444;border:#aaa solid 1px;border-top:none;border-bottom:#555 dashed 1px;font-family:"Helvetica Medium"}
				main #itens {border:#aaa solid 1px;border-top:none}
				main #itens .item {font-family:"Helvetica Roman";border-bottom:#aaa dashed 1px;font-size:0px;}
				main #itens .item:last-child {border:none}			
				main #paginacao {padding:20px 10px;border:#aaa solid 1px;border-top:none;font-family:"Helvetica Roman";text-align:center;border-radius:0px 0px 5px 5px}
				main #paginacao .pagina {display:inline-block;}
				main #paginacao .paginas {display:inline-block}
				main #paginacao .jumper {float:right;color:#333;font-family:"Helvetica Heavy";text-transform:uppercase;display:inline-block;}
				main #paginacao .jumper input {background-color:#222;color:#fff;border-radius:4px;padding:7px 11px;border:none;width:60px;margin-left:4px}
				main #paginacao .paginas .botao {width:30px;margin-right: 3px;}
				main #paginacao .paginas ul {margin:0;padding:0;list-style:none;display:inline-block;line-height:20px;}
				main #paginacao .paginas ul li {display:inline-block;color:#333;font-family:"Helvetica Roman";font-size:14px;padding:0px 7px}
				main #paginacao .paginas ul li.selecionado {padding:4px 9px 5px 9px;border:#09C dashed 1px;color:#09c;font-family:"Helvetica Heavy";border-radius:4px}
				main #paginacao .paginas ul li a {color:inherit}			
				main #vocequisdizer {border-top:#666 dashed 1px;font-size:16px;padding:30px;font-family:"Helvetica Roman";color:#09C}
				main #vocequisdizer a {color:inherit}
				.botao {padding:7px 10px;border-radius:4px;background-color:#fff;border:#333 solid 1px;color:#333;display:inline-block;vertical-align:top;font-size:14px}
				.pagina {float:left;height:30px;line-height:30px;display:inline-block;font-family:"Helvetica Bold";font-size:14px;text-transform:uppercase;color:#222;}
				.col {padding:20px 10px;display:inline-block;font-size:13px;width:20%;vertical-align:top;border-right:#aaa dashed 1px}
				.col:last-child {border:none}
				.icon {color:inherit}
				.icon:before {font-family:"FontAwesome";border:none;font-size:inherit;color:inherit;vertical-align:top}
				.icon.download:before {content:"\f019"}
				.icon.layout:before {content:"\f0ca"}
				.icon.inicio:before {content:"\f100"}
				.icon.final:before {content:"\f101"}
				.icon.proximo:before {content:"\f105"}
				.icon.anterior:before {content:"\f104"}
				.icon.ordenacao-asc:before{content:"\f160"}
				.icon.ordenacao-desc:before {content:"\f161"}
			</style>
            
            
            <?php            
			$acesso = $this->getVar('access_values');
			$tabela = $this->getVar('table');
			$resultado = $this->getVar('result');
			$itens_por_pagina = (int)$this->getVar('hits_per_block');
			$offset	= (int)$this->getVar('start');
			$pagina_atual = ( ( $offset / $itens_por_pagina ) +1 );	
			$paginas_totais = ceil($resultado->numHits() / $itens_por_pagina);
			$browse_info = $this->getVar("browseInfo");
			
			$o_browse = $this->getVar('browse');
			$browse_type = $this->getVar("browse_type");
			
			$instance = $this->getVar('t_instance');
			$ordenacao_direcao = $this->getVar('sort_direction');	
			$ordenacoes = $this->getVar('sortBy');
			$ordenacao_atual = $this->getVar('sort');
			$views = $this->getVar('views');
			$view = $this->getVar('view');
			$key = $this->getVar('key');
			$is_advanced = (int)$this->getVar('is_advanced');
			$is_search = ($this->request->getController() == 'Search');
			$exportacao_formatos = $this->getVar('export_formats');
			$criterios = $this->getVar('criteria');
			$acao = $this->request->getAction();
			//$total_resultado = ( sizeof($criterios) > 0 ) ? $resultado->numHits() : $this->getVar('totalRecordsAvailable');
            $total_resultado = $resultado->numHits();
			$label = $browse_info["labelPlural"] ? $browse_info["labelPlural"] : $instance->getProperty('NAME_PLURAL');
            $label_singular = $browse_info["labelSingular"] ? $browse_info["labelSingular"] : $instance->getProperty('NAME_SINGULAR');
            $found_plural = $browse_info["foundPlural"];
			$found_singular = $browse_info["foundSingular"];
			$negative_word = "nenhum" . (substr( $found_singular , -1) == "a" ? "a" : "");
			?>

			<div id="titulo">
            	<?php
				if ( $total_resultado > 0 ) {
					print "$total_resultado $label $found_plural";
				} else {
					print "$negative_word $label_singular $found_singular";
				}
				?>
            </div>
			
			<?php if (sizeof($criterios) > 0) { ?>           
            
            <div id="criterios"> 
            	
            	<?php
				foreach($criterios as $filtro) {         	
                	if ($filtro['facet_name'] != '_search') {
						print caNavLink($this->request, $filtro['value'] , 'browseRemoveFacet', '*', '*', '*', array('removeCriterion' => $filtro['facet_name'], 'removeID' => $filtro['id'], 'view' => $view, 'key' => $key));
					} else {	
						$termo_busca = $filtro['value'];	
						if ($is_advanced) {
							print "<span>" . $termo_busca . "</span>";
						} else {
							print "<span>Palavra chave: " . $termo_busca . "</span>";
						}						
					}
                }
				?>
            </div>
            
            <?php } ?>
            
			<?php 
				// if($is_search && !$total_resultado && $termo_busca){
                // $o_search = caGetSearchInstance($tabela);
                // if ( sizeof($sugestoes = $o_search->suggest($termo_busca, array('request' => $this->request)))) {
                //     $sugestoes_links = array();
                //     foreach($sugestoes as $sugestao){
                //         $sugestoes_links[] = caNavLink($this->request, $sugestao, '', '*', '*', '*', array('search' => $sugestao, 'sort' => $ordenacao_atual, 'view' => $view));
                //     }                    
                //     print "<div id='vocequisdizer'>Você quis dizer " . join(', ', $sugestoes_links) . "</div>";
                // }
            	// }
			?>
			
            <?php if ( $total_resultado > 0 ) { ?>
				
			<div id="resultado">

                <div id="ferramentas">
                
                    <div class="pagina">página <?php echo $pagina_atual?> de <?php echo $paginas_totais?></div>
                    
                    <?php if ( sizeof($exportacao_formatos) ) { ?>
					<span class="icon download"></span>
                    <select id="download">
                    <option data-type='none' value='none'>selecione um relatório</option>
                    <?php
                    foreach($exportacao_formatos as $formato){
                        print "<option data-type='" . $formato["type"] . "' value='".$formato["code"]."'>". $formato["name"]."</option>";
                    }	
                    ?>
                    </select>                    
                    <script>					
                    $("#download").change(function($a,$b){						
                        var selected_options = $(this).find("option:selected");
                        var view = selected_options.data("type");
                        var code = $(this).val();		
						window.open("<?php echo $this->request->getBaseUrlPath();?>/index.php/<?=$this->request->getController()?>/<?=$acao?>/view/" + view + "/download/1/export_format/" + code + "/key/<?=$key?>","_self");
                    });					
                    </script>											
					<?php } ?>

                    <span class="icon layout"></span>
                    
                    <select id="layout">
                    <option data-type='none' value='none'>selecione uma visualização</option>
                    <?php
                    foreach($views as $layout => $layout_info){
                        print "<option value='".$layout."'>" . $layout_info["title"] . "</option>";
                    }	
                    ?>
                    </select>
                    <script>					
                    $("#layout").change(function($a,$b){						
                        var code = $(this).val();		
						window.open("<?php echo $this->request->getBaseUrlPath();?>/index.php/<?=$this->request->getController()?>/<?=$acao?>/view/" + code + "/key/<?=$key?>","_self");
                    });					
                    </script>
                    
                </div>            	

                <div id="ordenacao">

                    <ul>
                    	<li>Ordenar por</li>

                        <?php
						foreach( $ordenacoes as $ordenacao => $campo_ordenacao) {
							if ($ordenacao_atual === $ordenacao) {
								print "<li class='selecionado'>{$ordenacao}</li>\n";
							} else {
								print "<li>".caNavLink($this->request, $ordenacao, '', '*', '*', '*', array('view' => $view, 'key' => $key, 'sort' => $ordenacao, '_advanced' => $is_advanced ? 1 : 0))."</li>\n";
							}
						}
						?>

					</ul>
                    
                    <?php 
					print caNavLink($this->request, '' , 'botao icon ordenacao-' . $ordenacao_direcao , '*', '*', '*', array('view' => $view, 'key' => $key, 'sort' => $ordenacao_atual, '_advanced' => $is_advanced ? 1 : 0, 'direction' => $ordenacao_direcao == 'asc' ? 'desc' : 'asc' ));
					?>
                    
	            </div>            
				
                <?php 
				
				/*
				$vn_row_id = $this->request->getParameter('row_id', pInteger);
				$o_config = $this->getVar("config");
				$cache_key = md5($key.$ordenacao_atual.$ordenacao_direcao.$view.$offset.$itens_por_pagina.$vn_row_id);   
				if(($o_config->get("cache_timeout") > 0) && ExternalCache::contains($vs_cache_key,'browse_results')){
					print ExternalCache::fetch($cache_key, 'browse_results');
				}else{
					$render = $this->render("Browse/browse_results_{$view}_{$acao}_html.php");
					ExternalCache::save( $cache_key, $render, 'browse_results' );
					print $render;
				}*/
								
				print $this->render("Browse/browse_results_{$view}_{$acao}_html.php");
				
				?>
                
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
                            $html_paginacao .= caNavLink( $this->request, "" , 'nextNav botao icon inicio', '*', '*', '*', array('s' => 0 , 'view' => $view , 'key' => $key ));
                        }                        
                        if ( $vn_i > 10 ) { $html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon anterior', '*', '*', '*', array('s' => ($itens_por_pagina*($vn_i-1))-$itens_por_pagina, 'view' => $view , 'key' => $key ));}
						$html_paginacao .= '<ul>';
						while ($vn_i <= $vn_f ) {
                            $html_paginacao .= "<li ".($offset==(($itens_por_pagina*$vn_i)-$itens_por_pagina) ? 'class="selecionado"': "").">".caNavLink($this->request, $vn_i , 'nextNav', '*', '*', '*', array('s' => ($itens_por_pagina*$vn_i)-$itens_por_pagina, 'view' => $view , 'key' => $key ))."</li>";
                            $vn_i++;
                        }
                        $html_paginacao .= "</ul>";
                        if ( $vn_f < $paginas_totais) {  $html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon proximo', '*', '*', '*', array('s' => ($itens_por_pagina*($vn_i))-$itens_por_pagina, 'view' => $view , 'key' => $key )); }
                        if ( $vn_f < $paginas_totais ) {
                            $html_paginacao .= caNavLink($this->request, "" , 'nextNav botao icon final', '*', '*', '*', array('s' => ($itens_por_pagina*$paginas_totais)-$itens_por_pagina, 'view' => $view , 'key' => $key ));
                        }
                        print $html_paginacao;
                    
                    ?>
                    </div>
                    
					<?php if ( $paginas_totais > 1 ) { ?>                    
                    <div class="jumper">
                    	pular para página
                    	<input />
                    </div>
                    <?php } ?>
            		
	            </div>

            </div>
            
            <?php } ?>
			
			<div id="facetas">
				<!-- Linha transferida de Browse/browse_facets_html.php -->
				<h3>
					<?php 
						$v_url_facets_list = "/mandic/pawtucket/index.php/Browse/" . $browse_type . "/getFacetsList/1/key/" . $key;
					?>
					
					<a href='#' id='showRefine' onclick='jQuery("#caLoadingFacetsListIndicator").show(); jQuery("#filtros").load("<?php print $v_url_facets_list; ?> "); return false'>
						filtrar resultados
					</a>
				</h3>
			
				<div id="filtros">
				
					<?php
						// Adicionando estas três linhas para que os filtros sejam carregados junto
						// com a listagem de resultados
						// FRED 22/11/2021
						
						$o_browse->loadFacetContent(array('checkAccess' => $va_access_values));
						$vs_key = $this->request->getParameter('key', pString);
			
						print $this->render("Browse/ajax_browse_facets_html.php"); 
						
						// FIM
					?>
					
					<div id="caLoadingFacetsListIndicator" style="padding: 10px 0px 0px 30px; display:none">
						<i class='caIcon fa fa fa-cog fa-spin fa-1x'></i>
					</div>
                </div>      
            </div>
        
        <script>        
	       $(".jumper input").keypress(function ( $e ) {
			  if ( $e.which == 13 && $(this).val().trim() != "" && !isNaN( $(this).val() ) && Number($(this).val()) <= <?=$paginas_totais?> && Number($(this).val()) > 0 ) {
				  var offset = <?=$itens_por_pagina?> * ($(this).val()-1);
				  window.location.href = "<?php echo $this->request->getBaseUrlPath();?>/index.php/Search/<?=$acao?>/s/" + offset + "/view/<?=$view?>/key/<?=$key?>";
			  }
			});		
        </script>