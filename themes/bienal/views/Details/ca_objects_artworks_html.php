<?php
$item = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
?>

			<style>
                
                .container {margin:0 auto;max-width:1300px;display:flex;flex-flow:row wrap;width:100%}
                main {font-size:0px;display:flex;flex-flow:row wrap;}			
                main #hierarquia {border-bottom:#333 dashed 1px;padding:5px 20px;width:100%}
                main #hierarquia ul {margin:0;padding:0;}
                main #hierarquia ul li {color:#444;padding:10px;font-size:12px;display:inline-block;font-family:"Helvetica Roman";position:relative;padding-left:30px;}
                main #hierarquia ul li:hover a {color:#09C}
                main #hierarquia ul li:after {content:"";border-top:9px solid transparent;border-bottom:9px solid transparent;border-left:9px solid #fff;position: absolute;left:0px;top:9px;}
                main #hierarquia ul li:before {content:"";border-top:10px solid transparent;border-bottom:10px solid transparent;border-left:10px solid #777;position: absolute;left: 0;top:8px;}
                main #hierarquia ul li:first-child {padding-left:12px}
                main #hierarquia ul li:first-child:after {border:none}
                main #hierarquia ul li:first-child:before {border:none}
                main #hierarquia ul li strong {font-size:12px;font-family:"Helvetica Roman";margin-right:5px}
                main #hierarquia ul li a {font-size:12px;}
                main #titulo {padding:20px 30px;font-family:"Helvetica Heavy";font-size:38px;text-transform:uppercase;color:#333;width:100%;padding-right:20%;position:relative;line-height:38px}
                main #titulo i {font-style:normal;font-family:"Helvetica Roman";}
                main #titulo .idno {border:#aaa solid 1px;background-color:#fff;color:#555;font-size:10px;padding:5px 9px;font-family:"Helvetica Medium";text-transform:uppercase;border-radius:4px;position:absolute;top:15px;right:15px;line-height:normal}
                main #ferramentas {padding:15px 10px 15px 30px;text-align:left;width:100%;border-bottom:#555 dashed 1px;border-top:#aaa dashed 1px;}
                main #ferramentas select {height:30px;line-height:30px;padding:5px;border:#999 solid 1px;border-radius:4px;font-size:14px;font-family:"Helvetica Roman";margin-right:7px;vertical-align:top}
                main #ferramentas select:last-child {margin:0}
                main #ferramentas .icon {line-height:30px;margin-right:7px;font-size:22px}
                main #download {display:inline-block;vertical-align:top}
                main #compartilhar {float:right;display:inline-block;vertical-align:top}
                main #compartilhar div {display:inline-block;vertical-align:top}
                main #compartilhar a {}			
                main #media_representativa {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
				main #descricao {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
                main #descricao .aviso {text-align: center;font-size: 22px;margin: 100px;border-radius: 6px;padding: 30px 50px;background-color: #ddd;font-family:"Helvetica Medium";}
				main #conteudo {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
                main #contagem {padding:20px 10px;font-family:"Helvetica Bold";font-size:13px;color:#222;border:#bbb solid 1px;border-bottom:#555 dashed 1px;border-radius:5px 5px 0px 0px}
                main #contagem strong {color:#09c}			
                main #atributos {border:#aaa solid 1px;border-radius:5px}
                main #atributos .atributo {width:100%;font-size:0px;border-bottom:#555 dashed 1px;text-align: right;}
                main #atributos .atributo .label {font-family:"Helvetica Bold";display:inline-block;width:200px;vertical-align:top;font-size:14px;text-align:right;padding:11px;color:#555}
                main #atributos .atributo .valor {font-family:"Helvetica Roman";display:inline-block;width:calc(100% - 200px);vertical-align:top;font-size:14px;padding:11px;text-align: left;}
                main #atributos .atributo:last-child {border:none}							
                main #atributos .atributo .subatributo {}
                main #atributos .atributo .subatributo span:nth-child(2) {font-family:"Helvetica Roman";}
                main #atributos .atributo .subatributo span:nth-child(1) {font-family:"Helvetica Bold";}
                main #itens {border:#aaa solid 1px;border-top:none;border-radius:0px 0px 5px 5px}
                main #itens .item {font-family:"Helvetica Roman";border-bottom:#777 dashed 1px;font-size:0px;}
                main #itens .item:last-child {border:none}			
                main #itens .item .col {padding:20px 10px;display:inline-block;font-size:13px;vertical-align:top;border-left:#bbb dashed 1px}
                main #itens .item .col:last-child {border:none}
                main #itens .item .col:first-child {border:none}	
                main #itens .item .col.tipo {width:20%;color:#111}
                main #itens .item .col.titulo {width:20%;color:#333}
                main #itens .item .col.descricao {width:60%;color:#555}
				
				.zoomButton {display:none !important}
                
                @media screen and (max-width:680px) {
                }
            
                @media screen and (max-width:780px) {			
                }
                
                @media screen and (max-width:880px) {
                }
                
                @media screen and (max-width:980px) {			
                    main #itens .item .col.tipo {width:35%;}
                    main #itens .item .col.titulo {width:65%;}
                    main #itens .item .col.descricao {display:none}
                }
                
                @media screen and (max-width:1080px) {
                }
                
                @media screen and (max-width:1180px) {
                }
                
                @media screen and (max-width:1280px) {
                }
                
                @media screen and (max-width:1380px) {
                }	
                
                @media screen and (min-width:1480px) {
                }
                
            </style>
            
            <div id="hierarquia">
            	<ul>
                	{{{<unit relativeTo="ca_objects.hierarchy" delimiter=" ">
                        <li><strong>^ca_objects.type_id</strong><l>^ca_objects.preferred_labels</l></li>
                    </unit>}}}
				</ul>
        	</div>
            
			<div id="titulo">
            	<i>{{{<unit>^ca_objects.type_id</unit>}}}</i> {{{<unit>^ca_objects.preferred_labels</unit>}}}
                <div class="idno">id: {{{<unit>^ca_objects.idno</unit>}}}</div>
            </div>
            
            <div id="ferramentas">
            
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
					var url = document.location.href + "/view/" + view + "/download/1/export_format/" + code;							
                    window.location.href = url;
                });					
                </script>											
                <?php } ?>
                
                <div id="compartilhar">
                    <a class="icon facebook" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;"></a>
                    <a class="icon twitter" href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(location.href) + '&amp;tw_p=tweetbutton&amp;url=' + encodeURIComponent(location.href),'twitter-share-dialog','width=626,height=436');return false;"></a>
                    <a class="icon google" href="#" onclick="window.open('https://plus.google.com/share?url='+encodeURIComponent(location.href),'googleplus-share-dialog','width=510,height=436');return false;"></a>
                </div>
                
			</div>
        	
            <div class="container">
			
                <div id="descricao">
                	
                    <div id="atributos">
        				
                        <!-- campos específicos de obra -->
                        
                        {{{<ifdef code="ca_objects.nonpreferred_labels">
                        <div class="atributo">
                            <div class="label">Outros títulos</div>
                            <div class="valor">^ca_objects.nonpreferred_labels</div>
                        </div>
                        </ifdef>}}}
                        
                        
                        <div class="atributo">
                            <div class="label">Data de produção</div>
                            <div class="valor">{{{^ca_objects.production_date.production_date_value}}}</div>
                        </div>
                        
                        <?php
							$va_processos_artisticos = array();
							
							$vs_tecnica = $item->get("ca_objects.artwork_technique", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
							$vs_tecnica_processo = $item->get("ca_objects.artwork_technique_process", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
							
							$vs_suporte = $item->get("ca_objects.artwork_support", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
							$vs_material_suporte = $item->get("ca_objects.artwork_material_support", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
							
							if ($vs_tecnica)
								$va_processos_artisticos[] = $vs_tecnica;
							
							if ($vs_tecnica_processo)
								$va_processos_artisticos[] = $vs_tecnica_processo;
							
							if ($vs_suporte)
								$va_processos_artisticos[] = $vs_suporte;
							
							if ($vs_material_suporte)
								$va_processos_artisticos[] = $vs_material_suporte;
							
							$vs_processos_artisticos = implode("; ", $va_processos_artisticos);
							
							if ($vs_processos_artisticos)
							{
							?>
                        
								<div class="atributo">
									<div class="label">Processos artísticos (suporte, técnica e material)</div>
									<div class="valor"><?php print $vs_processos_artisticos; ?></div>
								</div>
							
							<?php
							}
						?>
                        
                        {{{<ifdef code="ca_objects.artwork_type">
                        <div class="atributo">
                            <div class="label">Tipo de obra</div>
                            <div class="valor">^ca_objects.artwork_type</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.art_form">
                        <div class="atributo">
                            <div class="label">Manifestação artística</div>
                            <div class="valor">^ca_objects.art_form</div>
                        </div>
                        </ifdef>}}}
                        
                        <?php
                        $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><l>^ca_occurrences.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_occurrences.bienal_awards</unit></unit>');
                        if ( $resp ) {
                        ?>
                        <div class="atributo">
                            <div class="label">Prêmio recebido</div>
                            <div class="valor">
                                <?php
                                print $resp
                                ?>
                            </div>
                        </div>  
                        <?php } ?>
                            
                        <!-- fim obra -->   
                        
                        {{{<ifdef code="ca_objects.unitdate.date_value">
                        <div class="atributo">
                            <div class="label">Datas</div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.unitdate" delimiter="<br>">^ca_objects.unitdate.dates_types: ^ca_objects.unitdate.date_value</unit>
                            </div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.document_genre">
                        <div class="atributo">
                            <div class="label">Gênero documental</div>
                            <div class="valor">^ca_objects.document_genre</div>
                        </div>
                        </ifdef>}}}
                
                        {{{<ifdef code="ca_objects.document_type">
                        <div class="atributo">
                            <div class="label">Espécie documental</div>
                            <div class="valor">^ca_objects.document_type</div>
                        </div>
                        </ifdef>}}}
                
                       {{{<ifdef code="ca_objects.analog_digital">
                        <div class="atributo">
                            <div class="label">Analógico/digital</div>
                            <div class="valor">^ca_objects.analog_digital</div>
                        </div>
                        </ifdef>}}}
                
                        {{{<ifdef code="ca_objects.form">
                        <div class="atributo">
                            <div class="label">Forma</div>
                            <div class="valor">^ca_objects.form</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.inscription">
                        <div class="atributo">
                            <div class="label">Inscrição</div>
                            <div class="valor">^ca_objects.inscription</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.other_identification_form">
                        <div class="atributo">
                            <div class="label">Identificação pré-existente</div>
                            <div class="valor">^ca_objects.other_identification_form</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.others_idno">
                        <div class="atributo">
                            <div class="label">Outros números ou códigos de identificação</div>
                            <div class="valor">^ca_objects.others_idno</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.document_support">
                        <div class="atributo">
                            <div class="label">Suporte</div>
                            <div class="valor">^ca_objects.document_support</div>
                        </div>
                        </ifdef>}}}        
                
                        {{{<ifdef code="ca_objects.document_technique">
                        <div class="atributo">
                            <div class="label">Técnica</div>
                            <div class="valor">^ca_objects.document_technique</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.dimensions">
                        <div class="atributo">
                            <div class="label">Dimensão</div>
                            <unit relativeTo="ca_objects.dimensions" delimiter=" ">
                            <div class="valor">
                            
                            	<ifdef code="ca_objects.dimensions.measured_material_type">
                                <div class="subatributo">
                                    <span>Tipo de material mensurado:</span>
                                    <span>^ca_objects.dimensions.measured_material_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_type">
                                <div class="subatributo">
                                    <span>Tipo de dimensão:</span>
                                    <span>^ca_objects.dimensions.dimension_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_value">
                                <div class="subatributo">
                                    <span>Valor da dimensão:</span>
                                    <span>^ca_objects.dimensions.dimension_value ^ca_objects.dimensions.measurement_unit</span>
                                </div>
                                </ifdef>
                                
                            </div>
                            </unit>
                        </div>
                        </ifdef>}}}
                        
						{{{<ifdef code="ca_objects.artwork_description">
                        <div class="atributo">
                            <div class="label">Descrição da obra</div>
                            <div class="valor">^ca_objects.artwork_description</div>
                        </div>
                        </ifdef>}}}
						
                        {{{<ifdef code="ca_objects.location_identifier">
                        <div class="atributo">
                            <div class="label">Código de localização</div>
                            <div class="valor">^ca_objects.location_identifier</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.storage_note">
                        <div class="atributo">
                            <div class="label">Nota de Localização</div>
                            <div class="valor">^ca_objects.storage_note</div>
                        </div>
                        </ifdef>}}}
                		
                        <?php
                        $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_entities" delimiter="<br>" restrictToRelationshipTypes="edition;creator;contributor;publisher"><b><l>^ca_entities.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_entities.entity_functions</unit></unit>');
						if ( $resp ) {
						?>
                        <div class="atributo">
                            <div class="label">Entidades relacionadas (contexto de produção)</div>
                            <div class="valor">
                                <?php
                                print $resp
                                ?>
                            </div>
                        </div>  
                        <?php } ?>
						
                        <?php 
						/*
                        {{{<ifdef code="ca_objects.acqinfo">
                        <div class="atributo">
                            <div class="label">Procedência</div>
                            <div class="valor">
                            	
                                <ifdef code="ca_objects.acqinfo.acqinfo_entity_source">
                                <div class="subatributo">
                                    <span>Fonte imedia da aquisição ou transferência:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_entity_source</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acq_type">
                                <div class="subatributo">
                                    <span>Tipo de aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acq_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_entry_date">
                                <div class="subatributo">
                                    <span>Data de entrada:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_entry_date</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acquisition_date">
                                <div class="subatributo">
                                    <span>Data de aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acquisition_date</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acquisition_details">
                                <div class="subatributo">
                                    <span>Detalhes da aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acquisition_details</span>
                                </div>
                                </ifdef>
                                
                            </div>
                        </div>
                        </ifdef>}}} 
						*/
						?> 
                        
                        {{{<ifdef code="ca_objects.city_country">
                        <div class="atributo">
                            <div class="label">Local de produção</div>
                            <div class="valor">^ca_objects.city_country</div>
                        </div>
                        </ifdef>}}} 
                                
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production;subject">
                        <div class="atributo">
                            <div class="label">Evento relacionado (contexto de produção documental)</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifdef code="ca_objects.nat_representation">
                        <div class="atributo">
                            <div class="label">Representação nacional</div>
                            <div class="valor">^ca_objects.nat_representation</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.content_description">
                        <div class="atributo">
                            <div class="label">Descrição de conteúdo</div>
                            <div class="valor">^ca_objects.content_description</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.langmaterial.lang_material_lang">
                        <div class="atributo">
                            <div class="label">Idioma</div>
                            <div class="valor">^ca_objects.langmaterial.lang_material_lang</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.existing_copies_number">
                        <div class="atributo">
                            <div class="label">Número de unidades documentais existentes</div>
                            <div class="valor">^ca_objects.existing_copies_number</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifcount code="ca_objects.related" min="1" restrictToRelationshipTypes="exemplar;copy">
                        <div class="atributo">
                            <div class="label">Cópias / originais cadastrados</div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" restrictToRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_objects.related" min="1" restrictToTypes="file;documents;document_parts" excludeRelationshipTypes="exemplar;copy">
                        <div class="atributo">
                            <div class="label">Documentos relacionados</div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" excludeRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_list_items" min="1">
                        <div class="atributo">
                            <div class="label">Vocabulário controlado relacionado</div>
                            <div class="valor">
                                <unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_entities" min="1" excludeRelationshipTypes="edition;creator;contributor;publisher">
                        <div class="atributo">
                            <div class="label">Entidades relacionadas</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities" delimiter="<br/>" excludeRelationshipTypes="edition;creator;contributor;publisher"><l><b>^ca_entities.preferred_labels</b></l></unit>
                            </div>
                        </div>
                        </ifcount>}}}
   
						{{{<ifcount code="ca_objects.related" restrictToTypes="artworks" min="1">
                        <div class="atributo">
                            <div class="label">Obras relacionadas</div>
                            <div class="valor"><unit relativeTo="ca_objects.related" restrictToTypes="artworks" delimiter="<br/>"><unit delimiter=" -> "><l><b>^ca_objects.hierarchy.preferred_labels</b></l></unit></unit></div>
                        </div>
                        </ifcount>}}}
  
						{{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production;subject">
                        <div class="atributo">
                            <div class="label">Eventos relacionados</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
                        <div class="atributo">
                            <div class="label">Participação em evento</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="participation"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifdef code="ca_objects.edition_month">
                        <div class="atributo">
                            <div class="label">Mês da edição</div>
                            <div class="valor">^ca_objects.edition_month</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.edition_number">
                        <div class="atributo">
                            <div class="label">Número da edição</div>
                            <div class="valor">^ca_objects.edition_number</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.biblio_location_volume">
                        <div class="atributo">
                            <div class="label">Tomo / Volume</div>
                            <div class="valor">^ca_objects.biblio_location_volume</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.tipo_cromia">
                        <div class="atributo">
                            <div class="label">Cromia</div>
                            <div class="valor">^ca_objects.tipo_cromia</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.tipo_polaridade">
                        <div class="atributo">
                            <div class="label">Polaridade</div>
                            <div class="valor">^ca_objects.tipo_polaridade</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.tipo_midia">
                        <div class="atributo">
                            <div class="label">Tipo de mídia</div>
                            <div class="valor">^ca_objects.tipo_midia</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.padrao_gravacao">
                        <div class="atributo">
                            <div class="label">Padrão de gravação</div>
                            <div class="valor">^ca_objects.padrao_gravacao</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.biblio_location_type ">
                        <div class="atributo">
                            <div class="label">Tipo de publicação</div>
                            <div class="valor">^ca_objects.biblio_location_type </div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.biblio_location_subject">
                        <div class="atributo">
                            <div class="label">Assunto</div>
                            <div class="valor">^ca_objects.biblio_location_subject</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.biblio_location_PHA">
                        <div class="atributo">
                            <div class="label">Tabela PHA</div>
                            <div class="valor">^ca_objects.biblio_location_PHA</div>
                        </div>
                        </ifdef>}}}                        
                        
                    </div>
                
                </div>
                
                <?php
                if ( $this->getVar("representation_id") ) {
                    print '<div id="media_representativa">' . $this->getVar("representationViewer") . '</div>';
                }
                ?>
                            
            </div>
                            
            <div id="caMediaPanel"> 
                <div id="caMediaPanelContentArea"></div>
            </div>
    
            <script type="text/javascript">
                var caMediaPanel;
                jQuery(document).ready(function() {
                    if (caUI.initPanel) {
                        caMediaPanel = caUI.initPanel({ 
                            panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
                            panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
                            exposeBackgroundColor: '#FFFFFF',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
                            exposeBackgroundOpacity: 0.7,							/* opacity of background color masking out page content; 1.0 is opaque */
                            panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
                            allowMobileSafariZooming: true,
                            mobileSafariViewportTagID: '_msafari_viewport',
                            closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
                        });
                    }
                });
            </script>            