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

<div class="advanced-search-form">

	{{{form}}}

	<div class="advanced-search-form-column">

		<div class="advanced-search-form-field">
			<label><?= _t("Title of the Artwork") ?></label>
			{{{ca_objects.preferred_labels%label=<?= _t("Title of the Artwork") ?>}}}
		</div>

		<div class="advanced-search-form-field" id="campo_ca_entities_preferred_labels">
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

		<div class="advanced-search-form-field">
			<label><?= _t("Creation Date") ?></label>
			{{{ca_objects.production_date.production_date_value%label=<?= _t("Creation Date") ?>}}}
		</div>

		<div class="advanced-search-form-field">
			<label><?= _t("Artistic Processes (Support, Technique, and Material)") ?></label>
			{{{artisticProcess%label=<?= _t("Artistic Processes (Support, Technique, and Material)") ?>}}}
		</div>
	</div>

	<div class="advanced-search-form-column">
		<div class="advanced-search-form-field">
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

		<div class="advanced-search-form-field">
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

	<div class="submit-button">{{{submit%label=<?= _t("Search") ?>}}}</div>

	{{{/form}}}

</div>

<script>
	var a = $("input[name='_formElements']").val();
	var b = a.split("|");
	b.splice(2, 0, "ca_objects.related.preferred_labels");
	b = b.join("|");
	$("input[name='_formElements']").val(b);
</script>