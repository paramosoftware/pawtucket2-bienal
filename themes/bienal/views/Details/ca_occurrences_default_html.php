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
			    main #links {display:block;vertical-align:top;padding:20px 0px 5px 30px;width: 100%;}
                main #links a {display:inline-block;vertical-align:top;font-size:14px;font-family:"Helvetica Roman";color:#09C;padding:10px;border-radius:4px;border:#09c solid 1px;margin-right:10px;}
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
                main #itens .item .col.titulo {width:30%;color:#333}
                main #itens .item .col.descricao {width:50%;color:#555}
                
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
                	{{{<unit relativeTo="ca_occurrences.hierarchy" delimiter=" ">
                        <li><strong>^ca_occurrences.type_id</strong><l>^ca_occurrences.preferred_labels</l></li>
                    </unit>}}}
				</ul>
        	</div>
            
			<div id="titulo">
            	<i>{{{<unit>^ca_occurrences.type_id</unit>}}}</i> {{{<unit>^ca_occurrences.preferred_labels</unit>}}}
                <div class="idno">id: {{{<unit>^ca_occurrences.idno</unit>}}}</div>
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
            
            <div id="links">
                <a href="/pawtucket/index.php/Browse/obras/facet/occurrences_facet/id/<?=$t_object->getPrimaryKey()?>/view/list">obras</a>
                <a href="/pawtucket/index.php/Browse/documentos/facet/occurrences_production_facet/id/<?=$t_object->getPrimaryKey()?>/view/list">documentos</a>
                <a href="/pawtucket/index.php/Browse/entidades/facet/participation_facet/id/<?=$t_object->getPrimaryKey()?>/view/list">participações</a>
            </div>
        	
            <div class="container">
			
                <div id="descricao">
                	
                    <div id="atributos">
        				
                        {{{<ifdef code="ca_occurrences.nonpreferred_labels">
                        <div class="atributo">
                            <div class="label">Outros nomes</div>
                            <div class="valor">
                            	^ca_occurrences.nonpreferred_labels
                            </div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.event_type">
                        <div class="atributo">
                            <div class="label">Tipo de evento</div>
                            <div class="valor">
                            	<strong>Tipo:</strong> ^ca_occurrences.event_type.event_type_value<br />
                                <strong>Evento bienal:</strong> ^ca_occurrences.event_type.event_type_bienal
                            </div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.event_period">
                        <div class="atributo">
                            <div class="label">Data de realização</div>
                            <div class="valor">
                                <ifdef code="ca_occurrences.event_period.event_period_startdate"><strong>Data inicial:</strong> ^ca_occurrences.event_period.event_period_startdate<br /></ifdef>
                                <ifdef code="ca_occurrences.event_period.event_period_enddate"><strong>Data final:</strong> ^ca_occurrences.event_period.event_period_enddate</ifdef>
                            </div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.participants_number">
                        <div class="atributo">
                            <div class="label">Número de artistas participantes</div>
                            <div class="valor">^ca_occurrences.participants_number</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.artworks_number">
                        <div class="atributo">
                            <div class="label">Número de obras expostas</div>
                            <div class="valor">^ca_occurrences.artworks_number</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{
                        <ifcount code="ca_places" min="1">
                        <div class="atributo">
                            <div class="label">Local de realização</div>
                            <div class="valor">
                                <unit relativeTo="ca_places" delimiter="<br/>" restrictToRelationshipTypes="site"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}
                        
                        {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="realizacao">
                        <div class="atributo">
                            <div class="label">Realizada por</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="realizacao"><b><l>^ca_entities.preferred_labels</l></b></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                        {{{
                        <ifcount code="ca_places" min="1">
                        <div class="atributo">
                            <div class="label">Lugares relacionados</div>
                            <div class="valor">
                                <unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}
                        
                        {{{<ifdef code="ca_occurrences.visitors_number">
                        <div class="atributo">
                            <div class="label">Número de público visitante</div>
                            <div class="valor">^ca_occurrences.visitors_number</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.countries_number">
                        <div class="atributo">
                            <div class="label">Número de países representados</div>
                            <div class="valor">^ca_occurrences.countries_number</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.cost">
                        <div class="atributo">
                            <div class="label">Custo</div>
                            <div class="valor">^ca_occurrences.cost</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.note">
                        <div class="atributo">
                            <div class="label">Notas</div>
                            <div class="valor">^ca_occurrences.note</div>                            
                        </div>
                        </ifdef>}}}
                        
                        {{{<ifdef code="ca_occurrences.art_form">
                        <div class="atributo">
                            <div class="label">Manifestação artística</div>
                            <div class="valor">^ca_occurrences.art_form</div>                            
                        </div>
                        </ifdef>}}}
                        
 						{{{
                        <ifcount code="ca_entities" min="1" restrictToRelationshipTypes="patrocinio,apoio">
                        <div class="atributo">
                            <div class="label">Patrocinadores e apoiadores</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities" delimiter="<br/>" restrictToRelationshipTypes="patrocinio,apoio"><l>^ca_entities.preferred_labels</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}
                        
                        {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;">
                        <div class="atributo">
                            <div class="label">Entidades relacionadas (contexto de produção)</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                    
                         {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="representacao">
                        <div class="atributo">
                            <div class="label">Representação nacional</div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> (<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>) </unit>
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
						
						{{{<ifcount code="ca_occurrences.related" min="1" restrictToRelationshipTypes="production">
                        <div class="atributo">
                            <div class="label">Evento(s) relacionado(s)</div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences.related" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}
                        
                    </div>
                
                </div>

                {{{<ifcount code="ca_occurrences.children" min="1">
                
                <div id="conteudo">
    
                    <div id="contagem">
                        <strong><span class="quantidade"></span></strong> seções / subseções
                    </div>            

                    <div id="itens">
                      	
                        <unit relativeTo="ca_occurrences.children" delimiter=" ">
                        <div class="item">
                            <div class="col tipo">^ca_occurrences.type_id</div>
                            <div class="col titulo"><l>^ca_occurrences.preferred_labels</l></div>
                        </div>
                        </unit>
                        
                    </div>  
                    
                </div>

				<script>
                    $("#contagem .quantidade").html( $(".item").length );
                </script>
                
                </ifcount>}}}            
			
            </div>