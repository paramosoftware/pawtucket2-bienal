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

			#ui-datepicker-div {background-color: #656565 !important;color: #fff;padding: 20px;font-family: "Roboto";font-size: 14px;display:none;}
			#ui-datepicker-div a {padding: 3px;text-align: center;display: inline-block;}			
			#ui-datepicker-div .ui-datepicker-next {float:right}
			#ui-datepicker-div .ui-datepicker-title {padding-bottom: 10px;text-align: center;font-weight: 700;color: #18c5ff;}
			
        </style>
        
        <div id="titulo">
            busca avançada de <i>eventos</i>
        </div>
        
        <div id="formulario">
            
            {{{form}}}
            
                <div class="coluna">
                	
					<div class="campo">        
                       
                        <label>Em um nível</label>
                        <div>
                            <select id="hierarchyselecter1" style="width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="1">
                                <option>carregando...</option>
                            </select>
                            <select id="hierarchyselecter2" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="2"></select>
                            <select id="hierarchyselecter3" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="3"></select>
                            
							<input type="hidden" name="nivel_hierarquico_1" id="nivel_hierarquico_1" class="hierarchyselectervalue" />
                            <input type="hidden" name="nivel_hierarquico_2" id="nivel_hierarquico_2" class="hierarchyselectervalue2" />
							
							<input type="hidden" name="ca_occurrences.parent_id_label" value="nível hierárquico" />
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
                                
								$(".hierarchyselectervalue").val( value );
								$(".hierarchyselectervalue2").val( selecter.find('option:selected').attr('tag') );
								
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
								
                                u = "/service.php/HierarchyLookup/occurrences?id=" + $parent_id;
								
								$.ajax({
                                    url: u ,
                                    dataType: 'json',
                                    method:'GET',
                                    success: function( $data ) {
                                        hierarchyfinder_populate( $data , $parent_id , $selecter );
                                    }
                                });
                            }
							
                            function hierarchyfinder_populate( $data , $parent_id , $selecter ) {

								$data = $data[ $parent_id ];								
                                if ( $data["_itemCount"] > 0 ) {
                                    $selecter.prop('disabled', false);
                                    $selecter.css("opacity","1");		
                                    $selecter.find("option:first-child").html("-").val("");
									
									$.each( $data , function() 
									{
										var o = this;
										
										occurrence_id = o["occurrence_id"];
										occurrence_name = o["name"];
										occurrence_idno = o["idno"];
										
										//if ( o["name"] ) $selecter.append($("<option />").val( o["occurrence_id"] ).text( o["name"] ));
										if ( o["name"] ) $selecter.append('<option tag="'+occurrence_idno+'" value="'+occurrence_id+'">'+occurrence_name+'</option>'); 
                                    });
									
                                } else {
                                    $selecter.find("option:first-child").html("não há mais registros");
									
									//$(".hierarchyselectervalue").val('');
                                }
                            }
														
                            hierarchyfinder_get( 1 , $("#hierarchyselecter1") );
							//hierarchyfinder_get( 'ev_0000' , $("#hierarchyselecter1") );
							
                        </script>
                        
                    </div>
                    
                    <div class="campo">
                        <label>Tipo de nível</label>
                        {{{ca_occurrences.type_id%label=Tipo de nível}}}
                    </div>
                                        
                    <div class="campo">
                        <label>Denominação do evento</label>
                        {{{ca_occurrences.preferred_labels%label=Denominação do evento}}}
                    </div>
                    
					<!--
                    <div class="campo">
                        <label>Outras denominações</label>
                        {{{ca_occurrences.nonpreferred_labels%label=Outras denominações}}}
                    </div>
					-->
				
                    <div class="campo">
                        <label>Tipo de evento</label>
                        {{{ca_occurrences.event_type%label=Tipo de evento}}}
                    </div>
                    
                </div>

				<div class="coluna">

					<div class="campo">
							
                        <label>Entidade relacionada</label>
                        <div>
                        <label>Nome</label>
                        {{{ca_entities.preferred_labels%label=Entidade relacionada}}}
						
                        <label>Função</label>
                        {{{ca_entities_x_occurrences.ocurrencexentity_entityrole%label=Função}}}
						
						<!--
                        <label>Manifestação</label>
                        {{{ca_entities_x_occurrences.ocurrencexentity_juriartforms}}}
						-->
						
                        <label>Representação Nacional</label>
                        <input name="ca_entities_x_occurrences.ocurrencexentity_curatorplace" value="" class="" id="ca_entities_x_occurrences_ocurrencexentity_curatorplace" rows="1" style="" size="" type="text">
                        <input name="ca_entities_x_occurrences.ocurrencexentity_curatorplace_label" value="Representação nacional" type="hidden">
                        <script>
							jQuery(document).ready(function() {
								var v = jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val();	
								v=v.replace(/(<\/?[^>]+>)/gi);
								v=v.replace(/\[([\d]+)\]$/gi);
								jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val(v.trim());						
								jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').autocomplete( {
										minLength:3,
										delay: 800,
										html: true,
										source: function( request, response ) {										
											$.ajax({
												url: '/pawtucket/index.php/quickfind/Place',
												dataType: 'json',
												method:'GET',
												data: { term: request.term , limit:5 },										
												success: function( data ) {
													var result = [];
													for ( var i in data ) {
														result.push( {
															id : 'id' + data[i]["label"],
															value : data[i]["value"],
															label : data[i]["label"]
														} );
													}
													response( result );
												}
											});									
										}, 
										select: function( event, ui ) {
											jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
											event.preventDefault()									
										},
										change: function( event, ui ) {}
									}
								).click(function() { this.select(); });
							});
						</script>
                            
                        </div>
                        
                    </div>
                    
                    <div class="campo">
                        <label>Data de realização</label>
                        <div>
                            <label>Data inicial</label>
                            {{{ca_occurrences.event_period.event_period_startdate%label=Data inicial}}}
							
                            <label>Data final</label>
                            {{{ca_occurrences.event_period.event_period_enddate%label=Data final}}}
                        </div>
                    </div>
                    
                    <div class="campo">
                        <label>Instituição responsável</label>
                        {{{ca_entities.preferred_labels%restrictToRelationshipTypes=realizacao&label=Instituição responsável}}}
                    </div>
                    
                    <div class="campo">
                        <label>Local de realização</label>
                        {{{ca_places.preferred_labels%restrictToRelationshipTypes=site&label=Local de realização}}}
                    </div>                    

                    <div class="campo">
                        <label>Representação nacional</label>
                        <div>
                            <label>Nome da entidade</label>
                            <input name="ca_entities.preferred_labels.displayname/representacao" value=""id="ca_entities_preferred_labels" rows="1" style="" size="" type="text">
                            <input name="ca_entities.preferred_labels/representacao_label" value="Nome da entidade (Representação nacional)" type="hidden">
							<script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val(v.trim());						
                                    jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').autocomplete( {
                                            minLength:3,
                                            delay: 800,
                                            html: true,
                                            source: function( request, response ) {										
                                                $.ajax({
                                                    url: '/pawtucket/index.php/quickfind/Entity',
                                                    dataType: 'json',
                                                    method:'GET',
                                                    //data: { term: request.term , limit:5 },
													data: { term: ('ca_entities.preferred_labels.displayname:' + request.term) },
                                                    success: function( data ) {
                                                        var result = [];
                                                        for ( var i in data ) {
                                                            result.push( {
                                                                id : 'id' + data[i]["label"],
                                                                value : data[i]["value"],
                                                                label : data[i]["label"]
                                                            } );
                                                        }
                                                        response( result );
                                                    }
                                                });									
                                            }, 
                                            select: function( event, ui ) {
                                                jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
                            
                            <label>País de origem/representação</label>
                            <input name="ca_entities_x_occurrences.ocurrencexentity_repnacplace" value="" class="" id="ca_entities_x_occurrences_ocurrencexentity_repnacplace" rows="1" style="" size="" type="text">
                            <input name="ca_entities_x_occurrences.ocurrencexentity_repnacplace_label" value="País de origem/representação" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val(v.trim());						
                                    jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').autocomplete( {
                                            minLength:3,
                                            delay: 800,
                                            html: true,
                                            source: function( request, response ) {										
                                                $.ajax({
                                                    url: '/pawtucket/index.php/quickfind/Place',
                                                    dataType: 'json',
                                                    method:'GET',
                                                    data: { term: request.term , limit:5 },										
                                                    success: function( data ) {
                                                        var result = [];
                                                        for ( var i in data ) {
                                                            result.push( {
                                                                id : 'id' + data[i]["label"],
                                                                value : data[i]["value"],
                                                                label : data[i]["label"]
                                                            } );
                                                        }
                                                        response( result );
                                                    }
                                                });									
                                            }, 
                                            select: function( event, ui ) {
                                                jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
						</div>
                    </div>
                        
					<div class="campo">
                        <label>Participação</label>
                        <div>
                            <label>Nome da entidade</label>
                            <input name="ca_entities.preferred_labels/participation" value=""id="ca_entities_preferred_labels" rows="1" style="" size="" type="text">
                            <input name="ca_entities.preferred_labels/participation_label" value="Nome da entidade (Participação)" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val(v.trim());						
                                    jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').autocomplete( {
                                            minLength:3,
                                            delay: 800,
                                            html: true,
                                            source: function( request, response ) {										
                                                $.ajax({
                                                    url: '/pawtucket/index.php/quickfind/Entity',
                                                    dataType: 'json',
                                                    method:'GET',
                                                    //data: { term: request.term , limit:5 }
													data: { term: request.term },
                                                    success: function( data ) {
                                                        var result = [];
                                                        for ( var i in data ) {
                                                            result.push( {
                                                                id : 'id' + data[i]["label"],
                                                                value : data[i]["value"],
                                                                label : data[i]["label"]
                                                            } );
                                                        }
                                                        response( result );
                                                    }
                                                });									
                                            }, 
                                            select: function( event, ui ) {
                                                jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
                            <label>Tipo de participação</label>
                            {{{ca_entities_x_occurrences.participation_type}}}
							
                            <label>Seção/subseção</label>
                            <input name="ca_entities_x_occurrences.participation_event_section" value="" class="" id="ca_entities_x_occurrences_participation_event_section" rows="1" style="" size="" type="text">
                            <input name="ca_entities_x_occurrences.participation_event_section_label" value="Seção/subseção" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_entities_x_occurrences_participation_event_section').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_entities_x_occurrences_participation_event_section').val(v.trim());						
                                    jQuery('#ca_entities_x_occurrences_participation_event_section').autocomplete( {
                                            minLength:3,
                                            delay: 800,
                                            html: true,
                                            source: function( request, response ) {										
                                                $.ajax({
                                                    url: '/pawtucket/index.php/quickfind/Occurrence',
                                                    dataType: 'json',
                                                    method:'GET',
                                                    data: { term: request.term , limit:5 },										
                                                    success: function( data ) {
                                                        var result = [];
                                                        for ( var i in data ) {
                                                            result.push( {
                                                                id : 'id' + data[i]["label"],
                                                                value : data[i]["value"],
                                                                label : data[i]["label"]
                                                            } );
                                                        }
                                                        response( result );
                                                    }
                                                });									
                                            }, 
                                            select: function( event, ui ) {
                                                jQuery('#ca_entities_x_occurrences_participation_event_section').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
						</div>
					</div>
                        
                    <div class="campo">
                        <label>Documentos relacionados (busca por título)</label>
                        {{{ca_objects.preferred_labels.name/production%label=Documentos relacionados}}}
                    </div>
    
                    <div class="campo">
                        <label>Obra relacionada (busca por título)</label>
                        {{{ca_objects.preferred_labels.name/participation%label=Obra relacionada}}}
                    </div>

                </div>                

            <div class="enviar">{{{submit%label=procurar}}}</div>                       
            
        {{{/form}}}

    </div>
    
	<script>
    
        var a = $("input[name='_formElements']").val();
        var b = a.split("|");
		//b.splice(2, 0, "ca_occurrences.parent_id");
		//b.splice(2, 0, "idno");
		
		//b.splice(2, 0, "nivel_hierarquico_1");
		b.splice(2, 0, "nivel_hierarquico_2");
		
        b.splice(2, 0, "ca_entities_x_occurrences.participation_event_section");
		b.splice(2, 0, "ca_entities.preferred_labels/participation");
		b.splice(2, 0, "ca_entities.preferred_labels.displayname/representacao");
		
		b.splice(2, 0, "ca_entities_x_occurrences.ocurrencexentity_curatorplace");
		b.splice(2, 0, "ca_entities_x_occurrences.ocurrencexentity_repnacplace");
		
		
        b = b.join("|");
        $("input[name='_formElements']").val( b );
    
    </script>    