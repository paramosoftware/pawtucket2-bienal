<style>
	main #titulo {
		padding: 20px 30px;
		font-family: "Helvetica Roman";
		font-size: 38px;
		text-transform: uppercase;
		color: #333;
		border-bottom: #222 dashed 1px;
	}

	main #titulo i {
		font-style: normal;
		font-family: "Helvetica Heavy";
	}

	main .sec-header {
		padding-inline: 40px;
	}

	main .sec-header>div>span {
		text-transform: capitalize;
	}

	/* main #formulario {}

	main #formulario form {
		display: flex;
		flex-flow: row wrap;
		width: 99dvw;
	} */

	main #formulario .coluna {
		border-top: 2px solid var(--secondary);

		flex-basis: calc(25% - 60px);
		flex-grow: 2;
		margin-top: 30px;
		margin-left: 20px;
		margin-right: 40px;
	}

	main #formulario .coluna:first-of-type {
		margin-left: 40px;
		margin-right: 20px;
	}

	main #formulario .coluna .campo:last-child {
		border: none
	}

	/* main #formulario .coluna .campo {
        padding: 10px;
    } */

	main #formulario .campo {
		width: 100%;
		/* padding: 10px 30px; */
		transition: background-color 1s;
		/* border-bottom: #666 dashed 1px; */
		position: relative
	}

	main #formulario .campo:nth-child(even) {
		background-color: var(--tertiary2);
	}

	main #formulario .campo>div {
		display: inline-block;
		vertical-align: top;
		width: calc(100% - 170px);
		position: relative
	}

	main #formulario .campo>div>div {
		display: block
	}

	main #formulario .campo i {
		font-size: 12px;
		font-family: "Helvetica Bold";
		font-weight: normal;
		font-style: normal;
		color: #333
	}

	main #formulario .campo label {
		font-family: "Helvetica Neue Bold";
		font-size: 16px;
		text-transform: uppercase;
		text-align: left;
		color: var(--secondary);

		display: inline-block;
		vertical-align: top;
		/* width: 50%; */
		padding-top: 20px;
		padding-left: 15px;
	}

	main #formulario .campo>div>label {
		display: block
	}

	main #formulario .campo table {
		width: 100%;
		position: relative
	}


	main #formulario .campo textarea {
		display: inline-block;
	}

	main #formulario .campo input,
	main #formulario .campo select,
	main #formulario .campo textarea {
		resize: none;
		outline: none;
		vertical-align: top;
		min-height: 33px;
		width: calc(100% - 170px) !important;

		color: var(--secondary);
		background-color: var(--tertiary);
		border: 1px solid var(--secondary);
		border-radius: 4px;
	}

	main #formulario .campo input,
	main #formulario .campo select,
	main #formulario .campo textarea,
	.selectBox-dropdown {
		margin: 0;
		margin-block: 15px;

		height: 50px;
		width: 100% !important;
	}

	main #formulario .campo textarea {
		display: flex;
		align-items: center;
		height: 50px !important;
	}


	main #formulario .campo input,
	main #formulario .campo select,
	main #formulario .campo textarea {
		padding-left: 20px;
		padding-top: 5px;
	}

	main #formulario .campo input,
	main #formulario .campo select,
	main #formulario .campo textarea,
	.selectBox-dropdown {
		font-family: "Helvetica Neue Roman";
		font-size: 18px;
	}

	.selectBox-dropdown {
		display: flex !important;
		align-items: center;

		border: 1px solid var(--primary);
		color: var(--secondary);
		background-color: var(--tertiary);
	}

	.selectBox-options li a {
		background-color: var(--tertiary) !important;
		color: var(--secondary) !important;

		&:hover {
			background-color: var(--primary) !important;
			color: var(--tertiary) !important;
		}
	}

	.selectBox-dropdown-menu {
		border: 1px solid var(--primary) !important;
	}

	.selectBox-dropdown .selectBox-label {
		padding-right: 0;
		padding-top: 5px;
		padding-bottom: 0;
		margin: 0;
	}

	.selectBox-dropdown .selectBox-arrow {
		border-left: 1px solid var(--primary);
		filter: var(--filter-bienal-pink);
	}

	main #formulario .enviar {
		padding: 30px;
		flex-basis: 100%;
	}

	main #formulario .enviar {
		border-top: 2px solid var(--secondary);
		border-bottom: 2px solid var(--tertiary4);
		margin-bottom: 60px;
		margin-inline: 40px;
	}

	main #formulario .enviar a {
		text-decoration: none;
		text-transform: uppercase;
		text-align: center;
		font-family: "Helvetica Neue Medium";
		font-size: 18px;
		line-height: 1;

		background-color: var(--tertiary);
		color: var(--primary);
		border: 1px solid var(--primary);
		border-radius: 4px;

		display: flex;
		align-items: center;
		justify-content: center;

		width: fit-content;
		margin: 0 auto;
		padding-inline: 15px;
		padding-top: 17px;
		padding-bottom: 13px;

		&:hover {
			background-color: var(--primary);
			color: var(--tertiary);
		}
	}

	main #formulario .campo>div input {
		width: 100% !important
	}

	.icon:before {
		font-family: "FontAwesome";
		font-weight: normal;
		font-style: normal;
		border: none;
		font-size: inherit;
		color: var(--secondary);
		vertical-align: top;
	}

	.icon.question:before {
		content: "\f059";
	}

    main #formulario .campo>label {
        min-width: 25% !important;
        width: 25% !important;
    }

    main #formulario .campo>input,
    main #formulario .campo>div {
        min-width: 74% !important;
        width: 74% !important;
    }

	#ui-datepicker-div {
		background-color: #656565 !important;
		color: #fff;
		padding: 20px;
		font-family: "Roboto";
		font-size: 14px;
		display: none
	}

	#ui-datepicker-div a {
		padding: 3px;
		text-align: center;
		display: inline-block;
	}

	#ui-datepicker-div .ui-datepicker-next {
		float: right
	}

	#ui-datepicker-div .ui-datepicker-title {
		padding-bottom: 10px;
		text-align: center;
		font-weight: 700;
		color: #18c5ff;
	}
</style>

<div class="sec-header">
	<span>Home / <?= _t("Advanced Search") ?>:&nbsp;<b><?= _t("Artworks") ?></b></span>
	<hr />
	<div>
		<h1><?= _t("Artworks") ?></h1>
	</div>
	<div>
		<span><b><?= _t("Advanced Search") ?></b></span>
	</div>
</div>

<div id="advanced-search-form">

	{{{form}}}

	<div class="coluna">

		<div class="campo">
			<label><?= _t("Title of the Artwork") ?></label>
			{{{ca_objects.preferred_labels%label=<?= _t("Title of the Artwork") ?>}}}
		</div>

		<div class="campo" id="campo_ca_entities_preferred_labels">
			<label><?= _t("Artist / Creator") ?></label>
			{{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator&label=<?= _t("Artist / Creator") ?>}}}

			<script>
				jQuery(document).ready(function() {
					var v = jQuery('#ca_entities_preferred_labels').val();
					v = v.replace(/(<\/?[^>]+>)/gi);
					v = v.replace(/\[([\d]+)\]$/gi);
					jQuery('#ca_entities_preferred_labels').val(v.trim());
					jQuery('#ca_entities_preferred_labels').autocomplete({
						minLength: 3,
						delay: 800,
						html: true,
						source: function(request, response) {
							$.ajax({
								url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Entity',
								dataType: 'json',
								method: 'GET',
								data: {
									term: ('ca_entities.preferred_labels.displayname:' + request.term),
									limit: 5
								},
								success: function(data) {
									var result = [];
									for (var i in data) {
										result.push({
											id: 'id' + data[i]["label"],
											value: data[i]["value"],
											label: data[i]["label"]
										});
									}
									response(result);
								}
							});
						},
						select: function(event, ui) {
							jQuery('#ca_entities_preferred_labels').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
							event.preventDefault()
						},
						change: function(event, ui) {}
					}).click(function() {
						this.select();
					});
				});
			</script>

		</div>

		<div class="campo">
			<label><?= _t("Creation Date") ?></label>
			{{{ca_objects.production_date.production_date_value%label=<?= _t("Creation Date") ?>}}}
		</div>

		<div class="campo">
			<label><?= _t("Artistic Processes (Support, Technique, and Material)") ?></label>
			{{{artisticProcess%label=<?= _t("Artistic Processes (Support, Technique, and Material)") ?>}}}
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
			<label><?= _t("Award in Event") ?></label>
			<div>
				<label><?= _t("Event Name") ?></label>
				{{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=award&label=<?= _t("Event Name") ?>}}}

				<script>
					jQuery(document).ready(function() {
						var v = jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val();
						v = v.replace(/(<\/?[^>]+>)/gi);
						v = v.replace(/\[([\d]+)\]$/gi);
						jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val(v.trim());
						jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').autocomplete({
							minLength: 3,
							delay: 800,
							html: true,
							source: function(request, response) {
								$.ajax({
									url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Occurrence',
									dataType: 'json',
									method: 'GET',
									data: {
										term: request.term,
										limit: 5
									},
									success: function(data) {
										var result = [];
										for (var i in data) {
											result.push({
												id: 'id' + data[i]["label"],
												value: data[i]["value"],
												label: data[i]["label"]
											});
										}
										response(result);
									}
								});
							},
							select: function(event, ui) {
								jQuery('#ca_occurrences_preferred_labels[name="ca_occurrences.preferred_labels/award"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
								event.preventDefault()
							},
							change: function(event, ui) {}
						}).click(function() {
							this.select();
						});
					});
				</script>
				<label><?= _t("Prize Awarded") ?></label>
				{{{ca_objects_x_occurrences.bienal_awards%label=<?= _t("Prize Awarded") ?>}}}
			</div>

		</div>

		<!--
                    <div class="campo">
                        <label>Documentos relacionados</label>
                        {{{ca_objects.preferred_labels.name/subject%label=Documentos relacionados}}}
                    </div>
					-->

		<div class="campo">
			<label><?= _t("Related Events") ?></label>
			{{{evento_relacionado%label=<?= _t("Related Events") ?>}}}

			<script>
				jQuery(document).ready(function() {
					var v = jQuery('#evento_relacionado').val();
					v = v.replace(/(<\/?[^>]+>)/gi);
					v = v.replace(/\[([\d]+)\]$/gi);
					jQuery('#evento_relacionado').val(v.trim());
					jQuery('#evento_relacionado').autocomplete({
						minLength: 3,
						delay: 800,
						html: true,
						source: function(request, response) {
							$.ajax({
								url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Occurrence',
								dataType: 'json',
								method: 'GET',
								//data: { term: request.term , limit:5 },
								data: {
									term: request.term,
									sort: 'ca_occurrences.preferred_labels.name'
								},
								success: function(data) {
									var result = [];
									for (var i in data) {
										result.push({
											id: 'id' + data[i]["label"],
											value: data[i]["value"],
											label: data[i]["label"]
										});
									}
									response(result);
								}
							});
						},
						select: function(event, ui) {
							jQuery('#evento_relacionado').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
							event.preventDefault()
						},
						change: function(event, ui) {}
					}).click(function() {
						this.select();
					});
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
				v = v.replace(/(<\/?[^>]+>)/gi);
				v = v.replace(/\[([\d]+)\]$/gi);
				jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').val(v.trim());
				jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').autocomplete({
					minLength: 3,
					delay: 800,
					html: true,
					source: function(request, response) {
						$.ajax({
							url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Entity',
							dataType: 'json',
							method: 'GET',
							data: {
								term: request.term,
								limit: 5
							},
							success: function(data) {
								var result = [];
								for (var i in data) {
									result.push({
										id: 'id' + data[i]["label"],
										value: data[i]["value"],
										label: data[i]["label"]
									});
								}
								response(result);
							}
						});
					},
					select: function(event, ui) {
						jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
						event.preventDefault()
					},
					change: function(event, ui) {}
				}).click(function() {
					this.select();
				});
			});
		</script>


	</div>

	<div class="enviar">{{{submit%label=<?= _t("Search") ?>}}}</div>

	{{{/form}}}

</div>

<script>
	var a = $("input[name='_formElements']").val();
	var b = a.split("|");
	b.splice(2, 0, "ca_objects.related.preferred_labels");
	b = b.join("|");
	$("input[name='_formElements']").val(b);
</script>