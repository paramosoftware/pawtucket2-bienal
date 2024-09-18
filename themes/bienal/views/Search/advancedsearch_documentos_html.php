		<style>
			
			main {font-size:0px;}			
			main #titulo {padding:20px 30px;font-family:"Helvetica Roman";font-size:38px;text-transform:uppercase;color:#333;border-bottom:#222 dashed 1px;}			
			main #titulo i {font-style:normal;font-family:"Helvetica Heavy";}
			main #formulario {}
			main #formulario form {display:flex;flex-flow:row wrap;}
			main #formulario .coluna {flex-basis:calc(25% - 60px);flex-grow:2;border-right:#999 solid 1px;margin:30px 30px 0px 30px;border:#999 solid 1px;border-radius:4px}
			main #formulario .coluna:last-child {border:none}
			main #formulario .coluna .campo:last-child {border:none}
			main #formulario .coluna .campo {padding:10px;}
			main #formulario .campo {width:100%;padding:10px 30px;transition:background-color 1s;border-bottom:#666 dashed 1px;position:relative}
			main #formulario .campo > div {display:inline-block;vertical-align:top;width:calc(100% - 170px);position:relative}
			main #formulario .campo > div > div {display:block}
			main #formulario .campo i {font-size:12px;font-family:"Helvetica Bold";font-weight:normal;font-style:normal;color:#333}
			main #formulario .campo label {padding:7px 9px 7px 0px;font-family:"Helvetica Medium";display:inline-block;font-size:14px;text-transform:lowercase;color:#333;width:160px;text-align:left;vertical-align:top}
			main #formulario .campo > div > label {display:block}
			main #formulario .campo table {width:100%;position:relative}
			main #formulario .campo input, main #formulario .campo select, main #formulario .campo textarea {resize:none;min-height:33px;background-color:#09C;border:none;outline:none;border-radius:4px;padding:7px 10px;vertical-align:top;color:#fff;width:calc(100% - 170px) !important;margin-bottom: 1px}
			main #formulario .enviar {padding:30px;flex-basis:100%;}
			main #formulario .enviar a {font-family:"Helvetica Medium";text-transform:uppercase;margin:0 auto;display:block;padding:16px;background-color:#09c;color:#fff;font-size:14px;border-radius:4px;width:200px;text-align:center;}
			main #formulario .campo > div input {width:100% !important}

			#ui-datepicker-div {background-color: #656565 !important;color: #fff;padding: 20px;font-family: "Roboto";font-size: 14px;display:none}
			#ui-datepicker-div a {padding: 3px;text-align: center;display: inline-block;}			
			#ui-datepicker-div .ui-datepicker-next {float:right}
			#ui-datepicker-div .ui-datepicker-title {padding-bottom: 10px;text-align: center;font-weight: 700;color: #18c5ff;}
			
        </style>
        
		<style>
		
			#bMorePanel {padding:30px;background-color:#09C;position:fixed;top:70px;right:0px;width:100%;height:calc(100% - 70px);display:none;max-width:400px;font-size:0px;z-index:100}
			#bMorePanel #bMorePanelClose {}
			#bMorePanel #bScrollListLabel {color:#fff;font-weight:normal;font-size:22px;line-height:22px;font-family:"Helvetica Medium";margin: 0;padding: 0;margin-bottom: 20px;}
			#bMorePanel #bScrollListLabel .bFilterCount {font-size: 15px;display: block;border-radius: 4px;padding: 5px 8px;background-color: #fff;color: #09c;margin-top: 10px;}
			#bMorePanel #bLetterBar {width:30px;display:inline-block;vertical-align:top;color:#fff;font-size:12px;font-family:"Helvetica Bold"}
			#bMorePanel #bScrollList {overflow:auto;width:calc(100% - 30px); height:calc(100% - 70px); display:inline-block; vertical-align:top; color:#fff; font-size:12px; font-family:"Helvetica Roman"}
			#bMorePanel #bScrollList div {margin:2px;}
			#bMorePanel #bScrollList div strong {margin:15px 0px;font-family:"Helvetica Bold"}
			
        </style>
		
        <div id='bMorePanel'>
            <div id="bScrollList"></div>
        </div>
		
        <div id="titulo">
            busca avançada de <i>documentos</i>
        </div>
        
        <div id="formulario">
            
           {{{form}}}
            
            	<div class="coluna">
					
					<!-- Estamos desabilitando o campo "fundos e coleções, porque é um 
					campo que se repete no primeiro nível dos campos abaixo
					FRED 6/2/2021

                    <div class="campo">        
                        <label>fundos e coleções</label>
                        <select name="ca_objects.idno" id="idno" >
                            <option value="">-</option>
                            <option value="FMS*">Francisco Matarazzo Sobrinho</option>
                            <option value="MAM*">Museu de Arte Moderna de São Paulo</option>
                            <option value="BSP*">Fundação Bienal de São Paulo</option>
                            <option value="BIB*">Biblioteca</option>
                            <option value="DAR*">Dossiê de Artistas</option>
                            <option value="DTA*">Dossiê de Temas de Arte</option>
                        </select>
                        <input type="hidden" name="ca_objects.idno_label" value="fundo" />
                    </div>
                    -->
					
                    <div class="campo">        
                       
                        <label>Em um nível hierárquico</label>
                        <div>
                            <select id="hierarchyselecter1" style="width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="1">
                                <option>carregando...</option>
                            </select>
                            <select id="hierarchyselecter2" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="2"></select>
                            <select id="hierarchyselecter3" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="3"></select>
                            <select id="hierarchyselecter4" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="4"></select>
                            
							<!--
							<select id="hierarchyselecter5" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="5"></select>
                            -->
							
							<input type="hidden" name="ca_objects.parent_id" id="parent_id" class="hierarchyselectervalue" />       
                            <input type="hidden" name="ca_objects.parent_id_label" value="nível hierárquico" />
                        </div>
                        <script>
						
                            function hierarchyfinder_find( $obj ) {
                                var selecter = $( $obj );
                                var value = selecter.val();
                                var level = Number(selecter.data("level"));
                                var populate = $("#hierarchyselecter" + (level+1) );
                                hierarchyfinder_clear(level+1);
                                populate.prop('disabled', 'disabled');
                                populate.css("opacity",".2");					
                                populate.find('option').remove().end().append('<option value="">carregando...</option>').val('');				
                                
								if ( (value == '') && (level > 1) )
								{
									$(".hierarchyselectervalue").val( $("#hierarchyselecter" + (level-1)).children("option:selected").val() );
								}
								else
									$(".hierarchyselectervalue").val( value );				
                                
								hierarchyfinder_get( value , populate );
                            }
                            function hierarchyfinder_disable( $obj ) {
                                $obj.prop('disabled', 'disabled');
                                $obj.css("opacity",".2");					
                                $obj.find('option').remove().end().append('<option value="">-</option>').val('');
                            }
                            function hierarchyfinder_clear( $level ) {
                                for ( var i = $level+1 ; i <= 5 ; i++ ) {
                                    hierarchyfinder_disable( $("#hierarchyselecter" + i ) );
                                }
                            }							
                            function hierarchyfinder_get( $parent_id , $selecter ) {
                                u = "/pawtucket/service.php/HierarchyLookup/objects?id=" + $parent_id;

								$.ajax({
                                    url: u ,
                                    dataType: 'json',
                                    method:'GET',
                                    success: function( $data ) {
                                        console.log($data);
                                        hierarchyfinder_populate( $data , $parent_id , $selecter );
                                    }
                                })
                                .fail(function (jqXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                });
								
                            }
                            function hierarchyfinder_populate( $data , $parent_id , $selecter ) {

								$data = $data[ $parent_id ];								
                                if ( $data["_itemCount"] > 0 ) {
                                    $selecter.prop('disabled', false);
                                    $selecter.css("opacity","1");		
                                    $selecter.find("option:first-child").html("-").val("");		
									$.each( $data , function() {
                                        var o = this;							
                                       if ( o["name"] ) $selecter.append($("<option />").val( o["object_id"] ).text( o["name"] ));
                                    });	
                                } else {
                                    $selecter.find("option:first-child").html("não há mais registros");
                                }
                            }
                            hierarchyfinder_get( 1 , $("#hierarchyselecter1") );
							
                        </script>
                    </div>
                    
                </div>
                
                <div class="coluna">
                
                    <div class="campo">
                        <label>Título ou denominação do documento</label>
                        {{{ca_objects.preferred_labels%label=Título do documento}}}
                    </div>
                    
    				<div class="campo">
                        <label>Data ou período de produção</label>
                        <div>
                        {{{data_documento%label=Data ou período de produção}}}
						{{{ca_objects.unitdate.dates_types}}}
                        </div>
                    </div>
                    
                    <div class="campo _attribute_value_document_genre">
                        <label>Gênero documental</label>
                        {{{ca_objects.document_genre%label=Gênero documental}}}
                    </div>
            
                    <div class="campo">
                        <label>Espécie documental</label>
                        {{{ca_objects.document_type%label=Espécie documental}}}
                    </div>
                    
					<!--
                    <div class="campo">
                        <label>Analógico / digital</label>
                        {{{ca_objects.analog_digital}}}
                    </div>
					-->

                    <div class="campo">
                        <label>Suporte</label>
                        {{{ca_objects.document_support%label=Suporte}}}
                    </div>
                    
                    <div class="campo">
                        <label>Entidade / responsável</label>
                        {{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator;publisher;edition;contributor&label=Entidade/responsável}}}
                        
						<label>Instituição</label>
                        <input name="ca_objects_x_entities.entity_institution"/>
                        <input type="hidden" name="ca_objects_x_entities.entity_institution_label" value="Instituição" />
                    </div>
				    
                    <!--
                    <div class="campo">
                        <label>Local relacionado no contexto de produção</label>
                        <div>
                        <label>cidade</label>
                        {{{ca_objects.city_country.city_country_cityvalue}}}
                        <label>país</label>
                        {{{ca_objects.city_country.city_country_countryvalue}}}
                        </div>
                    </div>
                    -->
                                        
                    <div class="campo">
                        <label>Evento relacionado no contexto de produção</label>
                        {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=production;subject&label=Evento relacionado no contexto de produção}}}
                    </div>
                    
                    <div class="campo">
                        <label>Representação nacional</label>
                        <input name="ca_objects.nat_representation[]" />
                        <input type="hidden" name="ca_objects.nat_representation_label" value="Representação nacional" />
                    </div>
                    
                    <div class="campo">
                        <label>Descrição do conteúdo</label>
                        {{{ca_objects.content_description%label=Descrição do conteúdo}}}
                    </div>

                    <div class="campo">
                        <label>Vocabulário controlado relacionado <a href="#" class="icon question" onclick="load_vocabulary_list(); return false"></a></label>
                        {{{ca_list_items.preferred_labels%label=Vocabulário controlado relacionado}}}
                    </div>
                    
					<!-- FRED 07/03/2024
                    Adicionando painel lateral para exibição da lista de itens do vocabulário controlado -->
					
                    <script>

                    function load_vocabulary_list()
                    {	
                        u = "/pawtucket/index.php/lookup/ListItem/GetHierarchyLevel/list_id/85/id/7549/noSymbols/1/init/1";
 
                        $.ajax({
                            url: u,
                            dataType: 'json',
                            method:'GET',
                            success: function( $data ) {
                                $data = $data["7549"];
                                
                                jQuery("#bMorePanel").mouseleave(function() {
                                    $("#bScrollList").empty();
                                    jQuery("#bMorePanel").hide()}
                                );

                                $("#bScrollList").append('<a href="#" class="pull-right" id="bMorePanelClose" onclick="jQuery(&quot;#bMorePanel&quot;).toggle(); return false;"><span class="glyphicon glyphicon-remove-circle"></span></a>');
                                $("#bScrollList").append('<div style="margin-top:20px"><h1 id="bScrollListLabel">Vocabulário Bibliográfico<span class="bFilterCount"> (' + $data["_itemCount"] + ' total)</span></h1></div>');

                                $.each( $data , function() {
                                    
                                    if (typeof(this["name_singular"]) != "undefined")
                                        $("#bScrollList").append('<div><a href="#" onclick="select_vocabulary_item(\''+this["name_singular"]+'\'); return false">' + this["name_singular"] + '</a></div>');
                                    
                                    //$('#bMorePanel').show();
                                });
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                        });

                        u = "/pawtucket/index.php/lookup/ListItem/GetHierarchyLevel/list_id/83/id/246/noSymbols/1/init/1";
                        
                        $.ajax({
                            url: u ,
                            dataType: 'json',
                            method:'GET',
                            success: function( $data ) {
                                $data = $data["246"];

                                $("#bScrollList").append('<h1 id="bScrollListLabel">Vocabulário Iconográfico<span class="bFilterCount"> (' + $data["_itemCount"] + ' total)</span></h1>');

                                $.each( $data , function() {
                                    
                                    if (typeof(this["name_singular"]) != "undefined")
                                        $("#bScrollList").append('<div><a href="#" onclick="select_vocabulary_item(\''+this["name_singular"]+'\'); return false">' + this["name_singular"] + '</a></div>');
                                    
                                    $('#bMorePanel').show();
                                });
                            }
                        });
                    }

                    function select_vocabulary_item(ps_value)
                    {
                        $("#ca_list_items_preferred_labels").val(ps_value);
                        $("#bScrollList").empty();
                        jQuery("#bMorePanel").hide();
                    }

                    </script>

                    <!-- FRED 07/03/2024 -->
					
                    <div class="campo">
                        <label>Entidade relacionada</label>
                        {{{ca_entities.preferred_labels%label=Entidade relacionada}}}
                    </div>
                    
					<!--
                    <div class="campo">
                        <label>Obras relacionadas</label>
                        <input name="ca_objects.related.preferred_labels" />
                        <input type="hidden" name="ca_objects.related.preferred_labels_label" value="ca_objects.related.preferred_labels" />
                    </div>
                    -->
					
					<!--
                    <div class="campo">
                        <label>Eventos relacionados</label>
                        {{{ca_occurrences.preferred_labels%label=Eventos relacionados}}}
                    </div>
                    -->
					
                    <div class="campo">
                        <label>Lugares relacionados</label>
                        {{{ca_places.preferred_labels%label=Lugares relacionados}}}
                    </div>
                    
                </div>
                
                <div class="enviar">{{{submit%label=procurar}}}</div>                       
                
            {{{/form}}}

        </div>
        
        <script>
		
			var a = $("input[name='_formElements']").val();
			var b = a.split("|");
			b.splice(2, 0, "ca_objects.parent_id");
			b.splice(2, 0, "ca_objects.idno");
			b.splice(2, 0, "ca_objects.nat_representation");
			b.splice(2, 0, "ca_objects.related.preferred_labels");
			b.splice(2, 0, "ca_objects_x_entities.entity_institution");
			b = b.join("|");
			$("input[name='_formElements']").val( b );
		
		</script>