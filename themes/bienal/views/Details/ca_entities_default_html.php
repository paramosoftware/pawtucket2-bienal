<?php
$t_object = $this->getVar("item");
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
                main #conteudo {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
                main #contagem {padding:20px 10px;font-family:"Helvetica Bold";font-size:13px;color:#222;border:#bbb solid 1px;border-bottom:#555 dashed 1px;border-radius:5px 5px 0px 0px}
                main #contagem strong {color:#09c}			
                main #atributos {border:#aaa solid 1px;border-radius:5px}
                main #atributos .atributo {width:100%;font-size:0px;border-bottom:#555 dashed 1px;text-align: right;}
                main #atributos .atributo .label {font-family:"Helvetica Bold";display:inline-block;width:200px;vertical-align:top;font-size:14px;text-align:right;padding:11px;color:#555}
                main #atributos .atributo .valor {font-family:"Helvetica Roman";display:inline-block;width:calc(100% - 200px);vertical-align:top;font-size:14px;padding:11px;text-align: left;}
                main #atributos .atributo .valor .item {border-bottom:#ccc solid 1px;padding:5px 0px}
				main #atributos .atributo .valor .subitem {font-size:12px;float:right}
				main #atributos .atributo .valor a:hover {color:#09C}
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
                	{{{<unit relativeTo="ca_entities.hierarchy" delimiter=" ">
                        <li><strong>^ca_entities.type_id</strong><l>^ca_entities.preferred_labels</l></li>
                    </unit>}}}
				</ul>
        	</div>
            
			<div id="titulo">
            	<i>{{{<unit>^ca_entities.type_id</unit>}}}</i> {{{<unit>^ca_entities.preferred_labels</unit>}}}
                <div class="idno">id: {{{<unit>^ca_entities.idno</unit>}}}</div>
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
        
                		{{{<ifdef code="ca_entities.lifespandates">
                        <div class="atributo">
                            <ifdef code="ca_entities.lifespandates.lifespandate_birthdate"><strong>nasceu em ^ca_entities.lifespandates.lifespandate_birthdate</strong></ifdef>
                            <ifdef code="ca_entities.lifespandates.lifespandate_deathdate"><strong>morreu em ^ca_entities.lifespandates.lifespandate_deathdate</strong></ifdef>
                        </div></ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.preferred_labels.displayname">
                        <div class="atributo">
                            <div class="label">Nome para visualização</div>
                            <div class="valor">^ca_entities.preferred_labels.displayname</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.preferred_labels.otherforenames">
                        <div class="atributo">
                            <div class="label">Outros primeiros nomes</div>
                            <div class="valor">^ca_entities.preferred_labels.otherforenames</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.nonpreferred_labels">
                        <div class="atributo">
                            <div class="label">Nomes alternativos</div>
                            <div class="valor">^ca_entities.nonpreferred_labels</div>
                        </div>
                        </ifdef>}}}
                        
                       {{{<ifdef code="ca_entities.nonpreferred_labels.otherforenames">
                        <div class="atributo">
                            <div class="label">Outros primeiros nomes alternativos</div>
                            <div class="valor">^ca_entities.nonpreferred_labels.otherforenames</div>
                        </div>
                        </ifdef>}}}
                                                
                        {{{<ifdef code="ca_entities.biography">
                        <div class="atributo">
                            <div class="label">Biografia</div>
                            <div class="valor">^ca_entities.biography</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.entity_category">
							<unit relativeTo="ca_entities.entity_category">
							<if rule="^ca_entities.entity_category =~ /Artista \/ Arquiteto/">
							<div class="atributo">
								<div class="label">Categoria da entidade</div>
								<div class="valor">^ca_entities.entity_category</div>
							</div>
							</if>
							</unit>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.entity_functions">
                        <div class="atributo">
                            <div class="label">Ocupação/funções</div>
                            <div class="valor">^ca_entities.entity_functions</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_places" min="1" restrictToRelationshipTypes="birthplace">
                        <div class="atributo">
                            <div class="label">Nacionalidade</div>
                            <div class="valor">
                                <unit relativeTo="ca_places" restrictToRelationshipTypes="birthplace">^ca_places.preferred_labels.name</unit>
                            </div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_entities.note">
                        <div class="atributo">
                            <div class="label">Nota</div>
                            <div class="valor">^ca_entities.note</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifcount code="ca_objects" min="1" restrictToTypes="artworks">
                        <div class="atributo">
                            <div class="label">Obras relacionadas</div>
                            <div class="valor">
                                <unit relativeTo="ca_objects" delimiter="<br>" restrictToTypes="artworks"><b><l>^ca_objects.preferred_labels</l></b> (<unit delimiter=", " relativeTo="ca_occurrences">^ca_occurrences.preferred_labels</unit>)</unit>
                            </div>
                        </div>
                        </ifcount>}}}
						
						<?php
							$o_data = new Db();
							 
							$vn_entity_id = $t_object->get('entity_id');
							
							$vs_sql = "SELECT DISTINCT ca_objects_x_entities.object_id
								FROM ca_attribute_values 
								INNER JOIN ca_attributes ON ca_attribute_values.attribute_id = ca_attributes.attribute_id

								INNER JOIN ca_objects_x_entities ON ca_attributes.row_id = ca_objects_x_entities.relation_id
								INNER JOIN ca_objects ON ca_objects_x_entities.object_id = ca_objects.object_id
																
								WHERE ca_attributes.element_id = 214 
								AND ca_attribute_values.value_longtext1 = " .  $vn_entity_id;
								
							$vs_sql = $vs_sql . " AND ca_objects.access = 1 ";
							
							$qr_result = $o_data->query($vs_sql);
						?>
                        
                        {{{<case>
							<ifcount code="ca_objects" min="1" restrictToTypes="file;documents;document_parts">
							<div class="atributo">
								<div class="label">Documentos relacionados</div>
								
								<div class="valor" style="padding-bottom:0px">
									<unit relativeTo="ca_objects" delimiter="<br/>" restrictToTypes="file;documents;document_parts">
										<unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l>
										</unit>
									</unit>
								</div>
								
								<div class="valor" style="padding-top:0px">
									<?php
									$qr_result->seek(0);
									while ($qr_result->nextRow())
									{
										$t_documento = new ca_objects($qr_result->get('object_id'));
										
										print $t_documento->getWithTemplate('<l>^ca_objects.hierarchy.preferred_labels%delimiter=_->_</l>') . "<br>";
									}
									?>
								</div>
							</div>
							</ifcount>
						
							<?php 
							$qr_result->seek(0);
							if ($qr_result->nextRow())
							{
							?>
							<ifcount code="ca_objects" max="0" restrictToTypes="file;documents;document_parts">
							<div class="atributo">
								<div class="label">Documentos relacionados</div>
								<div class="valor">
									<?php
									$qr_result->seek(0);
									while ($qr_result->nextRow())
									{
										$t_documento = new ca_objects($qr_result->get('object_id'));
										
										print $t_documento->getWithTemplate('<l>^ca_objects.hierarchy.preferred_labels%delimiter=_->_</l>') . "<br>";
									}
									?>
								</div>
							</div>
							</ifcount>
							<?php
							}
							?>
						</case>}}}
                        
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
                        <div class="atributo">
                            <div class="label">Participação em<br />evento</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="participation"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b> - <ifdef code="ca_entities_x_occurrences.participation_event_section"><unit delimiter=", ">^ca_entities_x_occurrences.participation_event_section</unit></ifdef>: <unit delimiter=", ">^ca_entities_x_occurrences.participation_type</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.national_representation</unit>)</ifdef></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="award">
                        <div class="atributo">
                            <div class="label">Prêmio recebido</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.bienal_awards</unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="representacao">
                        <div class="atributo">
                            <div class="label">Representação em<br />evento</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><unit relativeTo="ca_occurrences" delimiter=" -> "><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>)</ifdef></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">
                        <div class="atributo">
                            <div class="label">Eventos relacionados</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" restrictToTypes="event;section;subsection" delimiter="<br>" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">
								
								<b><unit relativeTo="ca_occurrences" restrictToTypes="event;section;subsection" delimiter=" -> ">
								<l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b>: 
								<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> 
								<ifdef code="ca_entities_x_occurrences.ocurrencexentity_notes">
								(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_notes</unit>)
								</ifdef>
								
								</unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifcount code="ca_entities.related" min="1">
                        <div class="atributo">
                            <div class="label">Entidades relacionadas</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities.related" delimiter="<br>"><l>^ca_entities.preferred_labels</l></unit>
                            </div>
                        </div>
                        </ifcount>}}}
						
						<!-- Acrescentado por Fred, 23/10/2021 -->
						{{{<ifdef code="ca_entities.external_link">
                        <div class="atributo">
                            <div class="label">Links externos</div>
                            <div class="valor">
								<unit relativeTo="ca_entities.external_link" delimiter="<br/>">
									<a href="^ca_entities.external_link.url_entry" target="_blank">
                                    <b>
										<ifdef code="ca_entities.external_link.url_source">
											^ca_entities.external_link.url_source
										</ifdef>
										
										<ifnotdef code="ca_entities.external_link.url_source">
											^ca_entities.external_link.url_entry
										</ifnotdef>
                                    </b>
									</a>
								</unit>
							</div>
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