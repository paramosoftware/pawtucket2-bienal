<div class="sec-header">
    <span>Home / <?= _t("Advanced Search") ?>:&nbsp;<b><?= _t("Entities") ?></b></span>
    <hr />
    <div>
        <h1><?= _t("Entities") ?></h1>
    </div>
    <div>
        <span><b><?= _t("Advanced Search") ?></b></span>
    </div>
</div>

<div class="advanced-search-form">

    {{{form}}}

    <div class="advanced-search-form-column">

        <div class="advanced-search-form-field">
            <label><?= _t("Name") ?></label>
            {{{ca_entities.preferred_labels%label=<?= _t("Name") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Type of Entity") ?></label>
            <div>
                {{{ca_entities.type_id%label=<?= _t("Type of Entity") ?>}}}
            </div>
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Entity Category") ?></label>
            {{{ca_entities.entity_category%label=<?= _t("Entity Category") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Date of Birth") ?></label>
            {{{ca_entities.lifespandates.lifespandate_birthdate%label=<?= _t("Date of Birth") ?>}}}

            <label><?= _t("Date of Death") ?></label>
            {{{ca_entities.lifespandates.lifespandate_deathdate%label=<?= _t("Date of Death") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Nationality (Country)") ?></label>
            <input name="ca_places.preferred_labels/birthplace" value="" class="" id="ca_placess_preferred_labels_birthplace" rows="1" style="" size="" type="text">
            <input name="ca_places.preferred_labels/birthplace_label" value="Nacionalidade" type="hidden">
            <script>
                jQuery(document).ready(function() {
                    var v = jQuery('#ca_placess_preferred_labels_birthplace').val();
                    v = v.replace(/(<\/?[^>]+>)/gi);
                    v = v.replace(/\[([\d]+)\]$/gi);
                    jQuery('#ca_placess_preferred_labels_birthplace').val(v.trim());
                    jQuery('#ca_placess_preferred_labels_birthplace').autocomplete({
                        minLength: 3,
                        delay: 800,
                        html: true,
                        source: function(request, response) {
                            $.ajax({
                                url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Place',
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
                            jQuery('#ca_placess_preferred_labels_birthplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                            event.preventDefault()
                        },
                        change: function(event, ui) {}
                    }).click(function() {
                        this.select();
                    });
                });
            </script>
        </div>

    </div>

    <div class="advanced-search-form-column">

        <div class="advanced-search-form-field">
            <label><?= _t("Event Participation") ?></label>
            <div>
                <label><?= _t("Event Name") ?></label>
                <input name="ca_occurrences.preferred_labels/participation" value="" class="" id="ca_occurrences_preferred_labels_participation" rows="1" style="" size="" type="text">
                <input name="ca_occurrences.preferred_labels/participation_label" value="<?= _t("Event Participation") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_occurrences_preferred_labels_participation').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_occurrences_preferred_labels_participation').val(v.trim());
                        jQuery('#ca_occurrences_preferred_labels_participation').autocomplete({
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
                                jQuery('#ca_occurrences_preferred_labels_participation').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>
                <label><?= _t("Type of Participation") ?></label>
                {{{ca_entities_x_occurrences.participation_type%label=<?= _t("Type of Participation") ?>}}}

                <label><?= _t("National Representation") ?></label>
                <input name="ca_entities_x_occurrences.national_representation" value="" class="" id="ca_entities_x_occurrences_national_representation" rows="1" style="" size="" type="text">
                <input name="ca_entities_x_occurrences.national_representation_label" value="[beta] <?= _t("National Representation") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_x_occurrences_national_representation').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_x_occurrences_national_representation').val(v.trim());
                        jQuery('#ca_entities_x_occurrences_national_representation').autocomplete({
                            minLength: 3,
                            delay: 800,
                            html: true,
                            source: function(request, response) {
                                $.ajax({
                                    url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Place',
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
                                jQuery('#ca_entities_x_occurrences_national_representation').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>

                <label><?= _t("Section / Subsection") ?></label>
                <input name="ca_entities_x_occurrences.participation_event_section" value="" class="" id="ca_entities_x_occurrences_participation_event_section" rows="1" style="" size="" type="text">
                <input name="ca_entities_x_occurrences.participation_event_section_label" value="<?= _t("Section / Subsection") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_x_occurrences_participation_event_section').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_x_occurrences_participation_event_section').val(v.trim());
                        jQuery('#ca_entities_x_occurrences_participation_event_section').autocomplete({
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
                                jQuery('#ca_entities_x_occurrences_participation_event_section').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>

            </div>
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Award in Event") ?></label>
            <div>
                <label><?= _t("Event Name") ?></label>
                <input name="ca_occurrences.preferred_labels/award" value="" class="" id="ca_occurrences_preferred_labels_award" rows="1" style="" size="" type="text">
                <input name="ca_occurrences.preferred_labels/award_label" value="<?= _t("Award in Event") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_occurrences_preferred_labels_award').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_occurrences_preferred_labels_award').val(v.trim());
                        jQuery('#ca_occurrences_preferred_labels_award').autocomplete({
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
                                jQuery('#ca_occurrences_preferred_labels_award').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>
                <label><?= _t("Prize Awarded") ?></label>
                {{{ca_entities_x_occurrences.bienal_awards}}}

            </div>
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Related Documents or Artworks (Search by Title)") ?></label>
            {{{ca_objects.preferred_labels.name/subject,creator%label=<?= _t("Related Documents or Artworks (Search by Title)") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Related Events") ?></label>
            {{{ca_occurrences.preferred_labels.name%label=<?= _t("Related Events") ?>}}}
        </div>

    </div>

    <div class="submit-button">{{{submit%label=<?= _t("Search") ?>}}}</div>

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
    $("input[name='_formElements']").val(b);
</script>