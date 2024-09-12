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
        
        <div id="titulo">
            busca avançada de <i>entidades</i>
        </div>
        
        <div id="formulario">
            
            {{{form}}}
            
                <div class="coluna">
                	
					<div class="campo">
						<label>Nome</label>
                        {{{ca_entities.preferred_labels%label=Nome}}}
                    </div>
                    
					<div class="campo">
                        <label>Tipo de entidade</label>
                        {{{ca_entities.type_id%label=Tipo de entidade}}}
                    </div> 
                    
                    <div class="campo">
                        <label>Categoria de entidade</label>
                        {{{ca_entities.entity_category%label=Categoria de entidade}}}
                    </div>       
   
                    <div class="campo">
                        <label>Data de nascimento</label>
                        {{{ca_entities.lifespandates.lifespandate_birthdate%label=Data de nascimento}}}
						
                        <label>Data de morte</label>
                        {{{ca_entities.lifespandates.lifespandate_deathdate%label=Data de morte}}}
                    </div> 

					<div class="campo">
                        <label>Nacionalidade (país)	</label>
                        <input name="ca_places.preferred_labels/birthplace" value="" class="" id="ca_placess_preferred_labels_birthplace" rows="1" style="" size="" type="text">
                        <input name="ca_places.preferred_labels/birthplace_label" value="Nacionalidade" type="hidden">
                        <script>
                            jQuery(document).ready(function() {
                                var v = jQuery('#ca_placess_preferred_labels_birthplace').val();	
                                v=v.replace(/(<\/?[^>]+>)/gi);
                                v=v.replace(/\[([\d]+)\]$/gi);
                                jQuery('#ca_placess_preferred_labels_birthplace').val(v.trim());						
                                jQuery('#ca_placess_preferred_labels_birthplace').autocomplete( {
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
                                            jQuery('#ca_placess_preferred_labels_birthplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                            event.preventDefault()									
                                        },
                                        change: function( event, ui ) {}
                                    }
                                ).click(function() { this.select(); });
                            });
                        </script>
                    </div>
					
				</div>
                
                <div class="coluna">
                    					
                    <div class="campo">
                        <label>Participação em evento</label>
                        <div>
                        	<label>Nome do evento</label>
                            <input name="ca_occurrences.preferred_labels/participation" value="" class="" id="ca_occurrences_preferred_labels_participation" rows="1" style="" size="" type="text">
                            <input name="ca_occurrences.preferred_labels/participation_label" value="Participação em evento" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_occurrences_preferred_labels_participation').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_occurrences_preferred_labels_participation').val(v.trim());						
                                    jQuery('#ca_occurrences_preferred_labels_participation').autocomplete( {
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
                                                jQuery('#ca_occurrences_preferred_labels_participation').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
                            <label>Tipo de participação</label>
                            {{{ca_entities_x_occurrences.participation_type%label=Tipo de participação}}}
                           
                            <label>Representação nacional</label>
                            <input name="ca_entities_x_occurrences.national_representation" value="" class="" id="ca_entities_x_occurrences_national_representation" rows="1" style="" size="" type="text">
                            <input name="ca_entities_x_occurrences.national_representation_label" value="[beta] Representação nacional" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_entities_x_occurrences_national_representation').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_entities_x_occurrences_national_representation').val(v.trim());						
                                    jQuery('#ca_entities_x_occurrences_national_representation').autocomplete( {
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
                                                jQuery('#ca_entities_x_occurrences_national_representation').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
                            
                            <label>Seção/Subseção</label>
                            <input name="ca_entities_x_occurrences.participation_event_section" value="" class="" id="ca_entities_x_occurrences_participation_event_section" rows="1" style="" size="" type="text">
                            <input name="ca_entities_x_occurrences.participation_event_section_label" value="Seção/Subseção" type="hidden">
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
                        <label>Premiação em evento</label>
                        <div>
                        	<<label>Nome do evento</label>
                            <input name="ca_occurrences.preferred_labels/award" value="" class="" id="ca_occurrences_preferred_labels_award" rows="1" style="" size="" type="text">
                            <input name="ca_occurrences.preferred_labels/award_label" value="Premiação em evento" type="hidden">
                            <script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_occurrences_preferred_labels_award').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_occurrences_preferred_labels_award').val(v.trim());						
                                    jQuery('#ca_occurrences_preferred_labels_award').autocomplete( {
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
                                                jQuery('#ca_occurrences_preferred_labels_award').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>
                            <label>Prêmio recebido</label>
                            {{{ca_entities_x_occurrences.bienal_awards}}}
                            
                        </div>
                    </div>

					<div class="campo">
                        <label>Documentos ou obras relacionadas (busca por título)</label>
                        {{{ca_objects.preferred_labels.name/subject,creator%label=Documentos ou obras relacionadas}}} 
                    </div>                    
					
					<!--
					<div class="campo">
                        <label>Entidades relacionadas</label>                        
						<input name="ca_entities.preferred_labels.displayname/member" value="" class="" id="ca_placess_preferred_labels_birthplace" >
                        <input name="ca_entities.preferred_labels_member_label" value="ca_entities.related.preferred_labels" type="hidden">
                    </div>
					-->
					
					<div class="campo">
                        <label>Eventos relacionados</label>
                        {{{ca_occurrences.preferred_labels.name%label=Eventos relacionados}}}
                    </div>
                            
                </div>
                
                <div class="enviar">{{{submit%label=procurar}}}</div>                       
                
            {{{/form}}}

        </div>
        
        <script>
		
			var a = $("input[name='_formElements']").val();
			var b = a.split("|");
			//b.splice(2, 0, "ca_entities.preferred_labels.displayname/member");
			b.splice(2, 0, "ca_places.preferred_labels/birthplace");
			b.splice(2, 0, "ca_occurrences.preferred_labels/participation");
			b.splice(2, 0, "ca_occurrences.preferred_labels/award");
			b.splice(2, 0, "ca_entities_x_occurrences.national_representation");
			b.splice(2, 0, "ca_entities_x_occurrences.participation_event_section");
			b = b.join("|");
			$("input[name='_formElements']").val( b );
		
		</script>
        
        