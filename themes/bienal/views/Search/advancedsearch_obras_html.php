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
            busca avançada de <i>obras</i>
        </div>
        
        <div id="formulario">
            
            {{{form}}}
            
                <div class="coluna">
                
                    <div class="campo">
                        <label>Título da obra</label>
                        {{{ca_objects.preferred_labels%label=Título da obra}}}
                    </div>
                    
                    <div class="campo" id="campo_ca_entities_preferred_labels">
                        <label>Artista / responsável pela criação</label>
                        {{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator&label=Artista/responsável pela criação}}}
                        
                        <script>
							jQuery(document).ready(function() {
								var v = jQuery('#ca_entities_preferred_labels').val();	
								v=v.replace(/(<\/?[^>]+>)/gi);
								v=v.replace(/\[([\d]+)\]$/gi);
								jQuery('#ca_entities_preferred_labels').val(v.trim());						
								jQuery('#ca_entities_preferred_labels').autocomplete({
									minLength:3,
									delay: 800,
									html: true,
									source: function( request, response ) {										
										$.ajax({
											url: '/pawtucket/index.php/quickfind/Entity',
											dataType: 'json',
											method:'GET',
											data: { term: ('ca_entities.preferred_labels.displayname:' + request.term) , limit:5 },										
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
										jQuery('#ca_entities_preferred_labels').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
										event.preventDefault()									
									},
									change: function( event, ui ) {}
								}).click(function() { this.select(); });
							});
						</script>
                        
                    </div>
					
					<div class="campo">
                        <label>Data de criação</label>
                        {{{ca_objects.production_date.production_date_value%label=Data de criação}}}
                    </div>
					
					<div class="campo">
                        <label>Processos artísticos (suporte, técnica e material)</label>
                        {{{artisticProcess%label=Processos artísticos}}}
                    </div>
               </div>
               
               <div class="coluna">
                    <!--
                    <div class="campo">
                        <label>Processos artísticos</label>
                        {{{ca_objects.processos_artisticos}}}
                    </div>
                    -->
                    
                    <div class="campo">
                        <label>Premiação em evento</label>
                        <div>
                            <label>Nome do evento</label>
                            {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=award&label=Nome do evento (Premiação em evento)}}}
                            
							<script>
                                jQuery(document).ready(function() {
                                    var v = jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val();	
                                    v=v.replace(/(<\/?[^>]+>)/gi);
                                    v=v.replace(/\[([\d]+)\]$/gi);
                                    jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val(v.trim());						
                                    jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').autocomplete( {
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
                                                jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                                event.preventDefault()									
                                            },
                                            change: function( event, ui ) {}
                                        }
                                    ).click(function() { this.select(); });
                                });
                            </script>                        
                            <label>Prêmio recebido</label>
                            {{{ca_objects_x_occurrences.bienal_awards%label=Prêmio recebido}}}
                        </div>
                        
                    </div>
                    
					<!--
                    <div class="campo">
                        <label>Documentos relacionados</label>
                        {{{ca_objects.preferred_labels.name/subject%label=Documentos relacionados}}}
                    </div>
					-->
                    
                    <div class="campo">
                        <label>Eventos relacionados</label>
                        {{{evento_relacionado%label=Eventos relacionados}}}
						
                        <script>
							jQuery(document).ready(function() {
								var v = jQuery('#evento_relacionado').val();	
								v=v.replace(/(<\/?[^>]+>)/gi);
								v=v.replace(/\[([\d]+)\]$/gi);
								jQuery('#evento_relacionado').val(v.trim());						
								jQuery('#evento_relacionado').autocomplete( {
										minLength:3,
										delay: 800,
										html: true,
										source: function( request, response ) {										
											$.ajax({
												url: '/pawtucket/index.php/quickfind/Occurrence',
												dataType: 'json',
												method:'GET',
												//data: { term: request.term , limit:5 },
												data: { term: request.term , sort: 'ca_occurrences.preferred_labels.name'},
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
											jQuery('#evento_relacionado').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
											event.preventDefault()									
										},
										change: function( event, ui ) {}
									}
								).click(function() { this.select(); });
							});
						</script>
                    </div>
                    
					<!--
                    <div class="campo">
						<label>Entidades relacionadas</label>
                        {{{ca_entities.preferred_labels}}}
					</div>
					-->
					
                        <script>
							jQuery(document).ready(function() {
								var v = jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').val();	
								v=v.replace(/(<\/?[^>]+>)/gi);
								v=v.replace(/\[([\d]+)\]$/gi);
								jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').val(v.trim());						
								jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').autocomplete( {
										minLength:3,
										delay: 800,
										html: true,
										source: function( request, response ) {										
											$.ajax({
												url: '/pawtucket/index.php/quickfind/Entity',
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
											jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
											event.preventDefault()									
										},
										change: function( event, ui ) {}
									}
								).click(function() { this.select(); });
							});
						</script>
                    
                                                
				</div>
                
				<div class="enviar">{{{submit%label=procurar}}}</div>                       
                
			{{{/form}}}

        </div> 
        
		<script>
		
			var a = $("input[name='_formElements']").val();
			var b = a.split("|");
			b.splice(2, 0, "ca_objects.related.preferred_labels");
			b = b.join("|");
			$("input[name='_formElements']").val( b );
		
		</script>           