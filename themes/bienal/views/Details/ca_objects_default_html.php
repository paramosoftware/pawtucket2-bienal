<?php
$item = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();

$page = $this->getVar("page");
if (!$page)
	$page = 1;

$vb_exibir_imagem = true;
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
				main .links {display:inline-block;vertical-align:top;font-size:14px;font-family:"Helvetica Roman";color:#09C;padding:4px;border-radius:4px;border:#09c solid 1px;height:27px}
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
                main #atributos .atributo .valor {font-family:"Helvetica Roman";display:inline-block;width:calc(100% - 200px);vertical-align:top;font-size:14px;padding:11px;text-align: left; max-width:1000px}
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
                main #itens .item .col.descricao {width:55%;color:#555}
				main #itens .item .col.img {width:4%}
				
				main .download-button 
                {
                    display:inline-block;
                    vertical-align:top;
                    font-size:14px;
                    font-family:"Helvetica Roman";
                    color: #fff;
                    background-color:#09C;
                    padding:4px;
                    border-radius:4px;
                    border:#09c solid 1px;
                    height: 27px;
                    cursor: pointer;
                }
				
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
                        
                        {{{<ifdef code="ca_objects.production_date.production_date_value">
                        <div class="atributo">
                            <div class="label">Data de produção</div>
                            <div class="valor">^ca_objects.production_date.production_date_value</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.artwork_material_support">
                        <div class="atributo">
                            <div class="label">Suporte</div>
                            <div class="valor">^ca_objects.artwork_material_support</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.artwork_technique">
                        <div class="atributo">
                            <div class="label">Técnica</div>
                            <div class="valor">^ca_objects.artwork_technique</div>
                        </div>
                        </ifdef>}}}
                        
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
						
						<!-- Acrescentado por Fred, 20/4/2023 -->
                        <!-- Alterado por Fred, 27/7/2023 -->
                        <?php
                        {                            
                            $vs_recursos = $item->getWithTemplate('<unit relativeTo="ca_objects.info_resource_rs">^ca_objects.info_resource_rs.info_resource_rs_location_id|^ca_objects.info_resource_rs.info_resource_access</unit>');
                            $va_recursos = array();
                            $va_recursos_indisponiveis = array();

                            if ($vs_recursos)
                            {
                                $va_recursos = explode(";", $vs_recursos);

                                foreach ($va_recursos as $va_recurso)
                                {
                                    $va_info_recurso = explode("|", $va_recurso);

                                    if ($va_info_recurso[1] == "Não")
                                        $va_recursos_indisponiveis[] = $va_info_recurso[0];
                                }
                            }
                            
                            $vb_tem_imagem = ($item->get('ca_objects.has_external_image') == 227);
                            $vb_exibir_imagem = ($item->get('ca_objects.rs_resource_public') == 227);
                            
                            if ( ($vb_tem_imagem && !$vb_exibir_imagem) || (count($va_recursos) && (count($va_recursos_indisponiveis) == count($va_recursos))))
                            {
                            ?>
                               <div class="atributo">
                                    <div class="label">Documento digital acessível</div>

                                    <div class="valor">
                                        Não 
                                    </div>
                                </div>
                            <?php
                            }
                            elseif (count($va_recursos_indisponiveis))
                            {
                            ?>
                                <div class="atributo">
                                    <div class="label">Documento digital não acessível</div>

                                    <div class="valor">
                                    <?php
                                        print implode("; ", $va_recursos_indisponiveis)
                                    ?>    
                                    </div>
                                </div>
                                
                            <?php
                            }
                        }
                        ?>
                
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
                        
                        {{{<ifdef code="ca_objects.location_identifier">
                        <div class="atributo">
                            <div class="label">Código de localização</div>
                            <div class="valor">^ca_objects.location_identifier%delimiter=;_</div>
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
                        
						<!--
                        {{{<ifdef code="ca_objects.city_country">
                        <div class="atributo">
                            <div class="label">Local de produção</div>
                            <div class="valor">^ca_objects.city_country</div>
                        </div>
                        </ifdef>}}}
						-->
						
						<?php
                        $locais_producao = $item->getWithTemplate('<unit relativeTo="ca_objects_x_places" delimiter="<br>" restrictToRelationshipTypes="created">^ca_places.hierarchy.preferred_labels%delimiter=_->_</unit>');
						if ( $locais_producao ) 
						{
						?>
							<div class="atributo">
								<div class="label">Local de produção</div>
								<div class="valor">
									<?php print $locais_producao; ?>
								</div>
							</div>
							<?php
                        }
						?>
                                
                        {{{<ifdef code="ca_objects.adminbiohist">
                        <div class="atributo">
                            <div class="label">História administrativa / biografia</div>
                            <div class="valor">^ca_objects.adminbiohist</div>
                        </div>
                        </ifdef>}}} 
                        
                        {{{<ifdef code="ca_objects.custohist">
                        <div class="atributo">
                            <div class="label">História arquivística</div>
                            <div class="valor">^ca_objects.custohist</div>
                        </div>
                        </ifdef>}}} 
                        
                        {{{<ifdef code="ca_objects.scopecontent">
                        <div class="atributo">
                            <div class="label">Âmbito e conteúdo</div>
                            <div class="valor">^ca_objects.scopecontent</div>
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_objects.appraisal">
                        <div class="atributo">
                            <div class="label">Avaliação, eliminação e temporalidade</div>
                            <div class="valor">^ca_objects.appraisal</div>
                        </div>
                        </ifdef>}}} 
                        
                        {{{<ifdef code="ca_objects.accruals">
                        <div class="atributo">
                            <div class="label">Incorporações</div>
                            <div class="valor">^ca_objects.accruals</div>
                        </div>
                        </ifdef>}}} 
                        
                        {{{<ifdef code="ca_objects.arrangement">
                        <div class="atributo">
                            <div class="label">Sistema de arranjo</div>
                            <div class="valor">^ca_objects.arrangement</div>
                        </div>
                        </ifdef>}}}     
                                
                        {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production">
                        <div class="atributo">
                            <div class="label">Evento relacionado (contexto de produção documental)</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{<ifdef code="ca_objects.nat_representation">
                        <div class="atributo">
                            <div class="label">Representação nacional</div>
                            <div class="valor">
							<unit delimiter="<br>">
								^ca_objects.nat_representation
							</unit>
							</div>
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
  
						{{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production">
                        <div class="atributo">
                            <div class="label">Eventos relacionados</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
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

                        {{{<ifdef code="ca_objects.physaccessrestrict">
                        <div class="atributo">
                            <div class="label">Acesso Físico</div>
                            <div class="valor">^ca_objects.physaccessrestrict</div>
                        </div>
                        </ifdef>}}}
						
						<!-- Acrescentado por Fred, 17/4/2021 -->
						{{{<ifdef code="ca_objects.external_link">
                        <div class="atributo">
                            <div class="label">Links externos</div>
                            <div class="valor">
								<unit relativeTo="ca_objects.external_link" delimiter="<br/>">
									<a href="^ca_objects.external_link.url_entry" target="_blank">
									<b>
										<ifdef code="ca_objects.external_link.url_source">
											^ca_objects.external_link.url_source
										</ifdef>
										
										<ifnotdef code="ca_objects.external_link.url_source">
											^ca_objects.external_link.url_entry
										</ifnotdef>
									</b>
									</a>
								</unit>
							</div>
                        </div>
                        </ifdef>}}}
                        
                    </div>
                
                </div>
                <!-- FIM div descrição -->
				
				<!-- Vamos montar aqui a seção do representante digital -->
				
				<?php
                    $o_config = Configuration::load();

                    if (!is_array($va_api_credentials = $o_config->get('resourcespace_apis'))) { $va_api_credentials = []; }
                    
                    foreach($va_api_credentials as $vs_instance => $va_instance_api)
                    {
                        $vs_rs_url = $va_instance_api['resourcespace_base_api_url'];
                        $vs_private_key = $va_instance_api['resourcespace_api_key'];
                        $vs_user = $va_instance_api['resourcespace_user'];
                
                        break;
                    }

					$vb_external_image_access = $item->get('ca_objects.rs_resource_public');
					$vb_exibir_imagem = ($vb_external_image_access == 227);
													
					$vn_object_location_id = $item->get('ca_objects.location_identifier');
					$va_object_locations_ids = array();
					
					$vb_resource_found = false;

					if ($vn_object_location_id && ($item->get('ca_objects.has_external_image') == 227) && $vb_exibir_imagem)
					{
						$va_info_resources = explode("|", $item->getWithTemplate('<unit relativeTo="ca_objects.info_resource_rs" delimiter="|">^ca_objects.info_resource_rs.info_resource_rs_location_id:^ca_objects.info_resource_rs.info_resource_public_access</unit>'));

						$va_resources_permissions = array();
                        foreach ($va_info_resources as $va_info_resource)
                        {
                            $va_resources_permissions[explode(":", $va_info_resource)[0]] = explode(":", $va_info_resource)[1];
                        }
						
						$va_initial_object_locations_ids = explode(";", $vn_object_location_id);
						sort($va_initial_object_locations_ids);
						
						foreach ($va_initial_object_locations_ids as $vn_object_location_id)
                        {
                            if (in_array($va_resources_permissions[$vn_object_location_id], ["", "Sim", "Yes"]))
                                $va_object_locations_ids[] = $vn_object_location_id;
                        }

						foreach ($va_object_locations_ids as $vn_object_location_id)
                        {						
							$vs_query = "user=" . $vs_user . "&function=do_search&search=" . urlencode("cdigodelocalizao:" . $vn_object_location_id) . "&order_by=resourceid&sort=asc";

							// Sign the query using the private key
							$vs_sign = hash("sha256", $vs_private_key . $vs_query);

							$va_resources = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));

							if (is_array($va_resources) && count($va_resources))
                            {
                                $vb_resource_found = true;
								$vn_current_object_location_id = $vn_object_location_id;
								
                                break;
                            }
                            else
                                array_shift($va_object_locations_ids);
                        }
						
						if ($vb_resource_found)
						{
						?>
				
							<div id="media_representativa">
								<?php
								if (count($va_object_locations_ids) > 1)
								{				
								?>
									<div style="overflow:auto; width:100%; margin:auto; text-align:center;">
									<a href="#" class="links" id="previous_image" style="display:none"> < </a>
									<select id="image_number">
									<?php
										$contador_recursos = 1;
										foreach($va_object_locations_ids as $vs_resource_location_id)
										{
										?>
											<option value="<?php print $vs_resource_location_id; ?>"><?php print $vs_resource_location_id; ?></option>
										<?php
											$contador_recursos++;
										}
									?>
									<select>
									<a href="#" class="links" id="next_image"> > </a>
									</div>
								<?php
								}
								?>

								<script>
									$(document).on('change', "#image_number", function()
									{
										update_image($(this).val(), $(this).val());
									});
									
									$(document).on('click', ".links", function()
									{
										event.preventDefault();
										
										if ($(this).attr('id') == 'previous_image')
											vn_new_image = (parseInt($("#image_number").prop('selectedIndex')) - 1);
										else if ($(this).attr('id') == 'next_image')							
											vn_new_image = (parseInt($("#image_number").prop('selectedIndex')) + 1);
										
										$('#image_number option:eq('+vn_new_image+')').prop('selected', true)
										update_image($("#image_number").val(), $("#image_number").val());
										
										$('#image_number').selectBox('value', $("#image_number").val());
									});
									
									function update_image(vn_pagina, vs_location_id)
									{
										vs_url_imagem = "/pawtucket/index.php/Detail/ReadResourceSpaceResource/id/"+vn_pagina;
										$("#images").html("<i class='caIcon fa fa fa-cog fa-spin fa-1x' ></i> Carregando imagem...");
										
										$.get(vs_url_imagem, function(data, status)
										{
											$("#images").html(data);
											
											current_resource_ref = $("#resource_ref").val();
                                            current_resource_location_id = vs_location_id;
										});
										
										vn_pagina = $('#image_number').prop('selectedIndex');
										
										if (vn_pagina == 0)
											$("#previous_image").hide();
										else
											$("#previous_image").show();
										
										if (vn_pagina == <?php print (count($va_object_locations_ids) - 1); ?>)
											$("#next_image").hide();
										else
											$("#next_image").show();
									}
								</script>
							
								<div id="images">
									<?php
										$contador_recursos = 1;
										$vb_pdf = false;
										
										foreach($va_resources as $va_resource)
										{
											if ($va_resource->file_extension == "pdf")
												$vb_pdf = true;

											//if (in_array($va_resource->field113, $va_object_locations_ids) && (!$vb_pdf) )
											if ((!$vb_pdf) )
											{
												$vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $va_resource->ref . "&getfilepath=1&size=lpr&page=". $vn_page;
											
												$vs_sign = hash("sha256", $vs_private_key . $vs_query);
										
												$vs_resource_path = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));												
											?>										
												
												<img id="image" src="data:image/png;base64,<?php print base64_encode(file_get_contents($vs_resource_path)); ?>" width="500px"
												<?php if ($contador_recursos > 1)
													print ' style="display:none"';
												?>
												>
											<?php
													
												$contador_recursos++;
											}
										}							
									?>
								</div>
								
								<?php if ($vb_pdf || true)
								{
								?>
								<div style="margin-top:10px">
                                    <button class="download-button" onClick="downloadResource();">Download</button>
                                </div>
								
								<script>
                                    current_resource_ref = '<?php print $va_resource->ref; ?>';
                                    current_resource_location_id = '<?php print $vn_current_object_location_id; ?>';
                                    
	    							function downloadResource()
                                    {
                                        window.location.href = "/pawtucket/index.php/Detail/DownloadResourceSpaceResource/object_id/<?php print $item->get('object_id'); ?>/location_id/"+current_resource_location_id+"/resource/"+current_resource_ref+"/format/<?php print $va_resource->file_extension; ?>";
                                    }
								</script>
								<?php
								}
								?>
								
								<?php if (!$vb_pdf)
								{
								?>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.js" integrity="sha512-lgj1oT2/0EWpv2oHNeqzWmINqNEfHR4kjvl5DXc6o8IPxoRLgMxhW6c/mZ/fnSFN+6ByTSabiq//GGbYMo/4Lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
								<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.css" integrity="sha512-c7kgo7PyRiLnl7mPdTDaH0dUhJMpij4aXRMOHmXaFCu96jInpKc8sZ2U6lby3+mOpLSSlAndRtH6dIonO9qVEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
								
								<script>
									const viewer = new Viewer(document.getElementById('images'));
									//viewer.show();
								</script>
								<?php
								}
								?>
							</div>
						<?php
						}
					}
				?>
				
				<!-- Fim da seção do representante digital -->
				
                <?php
                if ( $this->getVar("representation_id") && ($item->get('ca_objects.has_external_image') != 227)) 
				{
                    print '<div id="media_representativa">' . $this->getVar("representationViewer") . '</div>';
                }
                ?>
				
				<?php
					$o_data = new Db();
					$o_id = $item->get('object_id');
					
					$qr_result = $o_data->query("
						SELECT COUNT(ca_objects.object_id) as Q
						FROM ca_objects
						WHERE ca_objects.parent_id = $o_id AND ca_objects.deleted = 0 AND ca_objects.access = 1
					");
					
					$vn_numero_itens = 0;
					if($qr_result->nextRow())
						$vn_numero_itens = $qr_result->get('Q');
					
					$primeiro_item = ($page-1)*20;
					$paginas_totais = ceil($vn_numero_itens / 20);
					
					$qr_result = $o_data->query("
						SELECT ca_list_item_labels.name_singular, ca_objects.access, ca_objects.object_id, ca_object_labels.name, (
							SELECT ca_attribute_values.value_longtext1
							FROM ca_attribute_values
							INNER JOIN ca_attributes
							ON ca_attributes.attribute_id = ca_attribute_values.attribute_id
							INNER JOIN ca_metadata_elements
							ON ca_metadata_elements.element_id = ca_attribute_values.element_id
							AND ca_metadata_elements.element_code = 'content_description' 
							WHERE ca_attributes.row_id = ca_objects.object_id 
							LIMIT 1 
						) as description,
						
						(SELECT ca_attribute_values.value_longtext1
							FROM ca_attribute_values
							INNER JOIN ca_attributes
							ON ca_attributes.attribute_id = ca_attribute_values.attribute_id
							WHERE ca_attributes.row_id = ca_objects.object_id 
							AND ca_attributes.element_id = 289
							LIMIT 1 
						) as has_external_image
						
						FROM ca_objects
						INNER JOIN ca_list_items
						ON ca_objects.type_id=ca_list_items.item_id
						INNER JOIN ca_list_item_labels 
						ON ca_list_item_labels.item_id = ca_list_items.item_id
						INNER JOIN ca_object_labels
						ON ca_object_labels.object_id = ca_objects.object_id							
						WHERE ca_objects.parent_id = $o_id AND ca_list_item_labels.locale_id = 13 AND ca_object_labels.locale_id = 13 AND ca_objects.deleted = 0 AND ca_objects.access = 1
						LIMIT $primeiro_item, 20
					");
				?>
                
				<?php
				if ($vn_numero_itens > 1)
				{		
				?>
                <div id="conteudo">
					<?php
					if ($paginas_totais > 1)
					{		
					?>
						<div style="overflow:auto; width:100%; margin:auto; text-align:center;">
						<a href="#" class="links page" id="previous_page"> < </a>
						<select id="page_number">
						<?php
							$contador_paginas = 1;
							while($contador_paginas <= $paginas_totais)
							{
							?>
								<option value="<?php print $contador_paginas; ?>"
								<?php if ($contador_paginas == $page)
									print " selected";
								?>
								><?php print "Página " . $contador_paginas; ?></option>
							<?php
								$contador_paginas++;
							}
						?>
						<select>
						<a href="#" class="links page" id="next_page"> > </a>
						</div>
						
						<script>
							$(document).on('change', "#page_number", function()
							{
								update_page($(this).val());
							});
							
							$(document).on('click', ".page", function()
							{
								event.preventDefault();
								
								if ($(this).attr('id') == 'previous_page')
									vn_new_image = (parseInt($("#page_number").val()) - 1);
								else if ($(this).attr('id') == 'next_page')							
									vn_new_image = (parseInt($("#page_number").val()) + 1);
								
								update_page(vn_new_image);
							});
							
							function update_page(vn_pagina)
							{
								url = '<?php print $this->request->getBaseUrlPath() . "/index.php/Detail/documento/" . $o_id; ?>';
								window.location.href = url + "/page/" + vn_pagina;
							}
						</script>
					<?php
					}
					?>
							
                    <div id="contagem">
                        <strong><span class="quantidade"><?php print $vn_numero_itens . ( $vn_numero_itens ? " registros" : " registro" ); ?></span></strong> neste nível
                    </div>         

                    <div id="itens">
                      	
                        <?php						
						while($qr_result->nextRow()) 
						{
                            print '<div class="item"><a href="' . $this->request->getBaseUrlPath() . '/index.php/Detail/documento/' . $qr_result->get('ca_objects.object_id') . '">';
							print '<div class="col tipo">' . $qr_result->get('ca_list_item_labels.name_singular') . ' </div>';
							print '<div class="col titulo">' . $qr_result->get('ca_object_labels.name') . '</div>';
							print '<div class="col descricao">' . $qr_result->get('description') . '</div>';
							
							if ( ($qr_result->get('has_external_image') == 227) )
								print '<div class="col img"><img src="/pawtucket/themes/bienal/assets/graphics/image.png" width="24px"></div>';
							
							print '</a></div>';
						}
 
						?>
                         
                    </div>  
                    
                </div>
                <?php
				}
				?>
					
				<script>
                    if ( $(".atributo").length <= 0 ) {					
						if ( $("#contagem").length > 0 ) {
							$("#descricao").remove();
						} else {
							$("#descricao").html("<div class='aviso'>este item não possui descrição ou registros</div>");
						}
					}
                </script>
            
            </div>
                            
            <div id="caMediaPanel"> 
                <div id="caMediaPanelContentArea"></div>
            </div>
    
            <script type="text/javascript">
                var caMediaPanel;
                jQuery(document).ready(function() 
				{
					<?php if ($vb_resource_found && $vb_pdf)
					{
					?>
						update_image('<?php print $va_resource->ref; ?>', current_resource_location_id);
					<?php
					}
					?>					
                });
            </script>            