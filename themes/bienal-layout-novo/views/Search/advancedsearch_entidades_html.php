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

    main #formulario {}

    main #formulario form {
        display: flex;
        flex-flow: row wrap;
        width: 99dvw;
    }

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
    <span>Home / <?= _t("Advanced Search") ?>:&nbsp;<b><?= _t("Entities") ?></b></span>
    <hr />
    <div>
        <h1><?= _t("Entities") ?></h1>
    </div>
    <div>
        <span><b><?= _t("Advanced Search") ?></b></span>
    </div>
</div>

<div id="formulario">

    {{{form}}}

    <div class="coluna">

        <div class="campo">
            <label><?= _t("Name") ?></label>
            {{{ca_entities.preferred_labels%label=<?= _t("Name") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Type of Entity") ?></label>
            <div>
                {{{ca_entities.type_id%label=<?= _t("Type of Entity") ?>}}}
            </div>
        </div>

        <div class="campo">
            <label><?= _t("Entity Category") ?></label>
            {{{ca_entities.entity_category%label=<?= _t("Entity Category") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Date of Birth") ?></label>
            {{{ca_entities.lifespandates.lifespandate_birthdate%label=<?= _t("Date of Birth") ?>}}}

            <label><?= _t("Date of Death") ?></label>
            {{{ca_entities.lifespandates.lifespandate_deathdate%label=<?= _t("Date of Death") ?>}}}
        </div>

        <div class="campo">
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
                                url: '/pawtucket2-bienal/index.php/quickfind/Place',
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

    <div class="coluna">

        <div class="campo">
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
                                    url: '/pawtucket2-bienal/index.php/quickfind/Occurrence',
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
                                    url: '/pawtucket2-bienal/index.php/quickfind/Place',
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
                                    url: '/pawtucket2-bienal/index.php/quickfind/Occurrence',
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

        <div class="campo">
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
                                    url: '/pawtucket2-bienal/index.php/quickfind/Occurrence',
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

        <div class="campo">
            <label><?= _t("Related Documents or Artworks (Search by Title)") ?></label>
            {{{ca_objects.preferred_labels.name/subject,creator%label=<?= _t("Related Documents or Artworks (Search by Title)") ?>}}}
        </div>

        <!--
					<div class="campo">
                        <label>Entidades relacionadas</label>                        
						<input name="ca_entities.preferred_labels.displayname/member" value="" class="" id="ca_placess_preferred_labels_birthplace" >
                        <input name="ca_entities.preferred_labels_member_label" value="ca_entities.related.preferred_labels" type="hidden">
                    </div>
					-->

        <div class="campo">
            <label><?= _t("Related Events") ?></label>
            {{{ca_occurrences.preferred_labels.name%label=<?= _t("Related Events") ?>}}}
        </div>

    </div>

    <div class="enviar">{{{submit%label=<?= _t("Search") ?>}}}</div>

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