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
    <span>Home / <?= _t("Advanced Search") ?>:&nbsp;<b><?= _t("Events") ?></b></span>
    <hr />
    <div>
        <h1><?= _t("Events") ?></h1>
    </div>
    <div>
        <span><b><?= _t("Advanced Search") ?></b></span>
    </div>
</div>

<div id="formulario">

    {{{form}}}

    <div class="coluna">

        <div class="campo">

            <label><?= _t("At a Level") ?></label>
            <div>
                <select id="hierarchyselecter1" style="width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="1">
                    <option><?= _t("Loading") ?>...</option>
                </select>
                <select id="hierarchyselecter2" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="2"></select>
                <select id="hierarchyselecter3" disabled="disabled" style="opacity:.2;width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="3"></select>

                <input type="hidden" name="nivel_hierarquico_1" id="nivel_hierarquico_1" class="hierarchyselectervalue" />
                <input type="hidden" name="nivel_hierarquico_2" id="nivel_hierarquico_2" class="hierarchyselectervalue2" />

                <input type="hidden" name="ca_occurrences.parent_id_label" value="nível hierárquico" />
            </div>

            <script>
                function hierarchyfinder_find($obj) {
                    var selecter = $($obj);
                    var value = selecter.val();

                    var level = Number(selecter.data("level"));
                    var populate = $("#hierarchyselecter" + (level + 1));
                    hierarchyfinder_clear(level + 1);
                    populate.prop('disabled', 'disabled');
                    populate.css("opacity", ".2");
                    populate.find('option').remove().end().append('<option value=""><?= _t("Loading") ?>...</option>').val('');

                    $(".hierarchyselectervalue").val(value);
                    $(".hierarchyselectervalue2").val(selecter.find('option:selected').attr('tag'));

                    hierarchyfinder_get(value, populate);
                }

                function hierarchyfinder_disable($obj) {
                    $obj.prop('disabled', 'disabled');
                    $obj.css("opacity", ".2");
                    $obj.find('option').remove().end().append('<option value="">-</option>').val('');
                }

                function hierarchyfinder_clear($level) {
                    for (var i = $level + 1; i <= 5; i++) {
                        hierarchyfinder_disable($("#hierarchyselecter" + i));
                    }
                }

                function hierarchyfinder_get($parent_id, $selecter) {

                    u = "<?= $this->request->getBaseUrlPath() ?>/service.php/HierarchyLookup/occurrences?id=" + $parent_id;

                    $.ajax({
                        url: u,
                        dataType: 'json',
                        method: 'GET',
                        success: function($data) {
                            hierarchyfinder_populate($data, $parent_id, $selecter);
                        }
                    });
                }

                function hierarchyfinder_populate($data, $parent_id, $selecter) {

                    $data = $data[$parent_id];
                    if ($data["_itemCount"] > 0) {
                        $selecter.prop('disabled', false);
                        $selecter.css("opacity", "1");
                        $selecter.find("option:first-child").html("-").val("");

                        $.each($data, function() {
                            var o = this;

                            occurrence_id = o["occurrence_id"];
                            occurrence_name = o["name"];
                            occurrence_idno = o["idno"];

                            //if ( o["name"] ) $selecter.append($("<option />").val( o["occurrence_id"] ).text( o["name"] ));
                            if (o["name"]) $selecter.append('<option tag="' + occurrence_idno + '" value="' + occurrence_id + '">' + occurrence_name + '</option>');
                        });

                    } else {
                        $selecter.find("option:first-child").html("não há mais registros");

                        //$(".hierarchyselectervalue").val('');
                    }
                }

                hierarchyfinder_get(1, $("#hierarchyselecter1"));
                //hierarchyfinder_get( 'ev_0000' , $("#hierarchyselecter1") );
            </script>

        </div>

        <div class="campo">
            <label><?= _t("Type of Level") ?></label>
            <div>
                {{{ca_occurrences.type_id%label=<?= _t("Type of Level") ?>}}}
            </div>
        </div>

        <div class="campo">
            <label><?= _t("Event Denomination") ?></label>
            {{{ca_occurrences.preferred_labels%label=<?= _t("Event Denomination") ?>}}}
        </div>

        <!--
                    <div class="campo">
                        <label>Outras denominações</label>
                        {{{ca_occurrences.nonpreferred_labels%label=Outras denominações}}}
                    </div>
					-->

        <div class="campo">
            <label><?= _t("Type of Event") ?></label>
            {{{ca_occurrences.event_type%label=<?= _t("Type of Event") ?>}}}
        </div>

    </div>

    <div class="coluna">

        <div class="campo">

            <label><?= _t("Related Entity") ?></label>
            <div>
                <label><?= _t("Name") ?></label>
                {{{ca_entities.preferred_labels%label=<?= _t("Related Entity") ?>}}}

                <label><?= _t("Function") ?></label>
                {{{ca_entities_x_occurrences.ocurrencexentity_entityrole%label=<?= _t("Function") ?>}}}

                <!--
                        <label>Manifestação</label>
                        {{{ca_entities_x_occurrences.ocurrencexentity_juriartforms}}}
						-->

                <label><?= _t("National Representation") ?></label>
                <input name="ca_entities_x_occurrences.ocurrencexentity_curatorplace" value="" class="" id="ca_entities_x_occurrences_ocurrencexentity_curatorplace" rows="1" style="" size="" type="text">
                <input name="ca_entities_x_occurrences.ocurrencexentity_curatorplace_label" value="<?= _t("National Representation") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val(v.trim());
                        jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').autocomplete({
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
                                jQuery('#ca_entities_x_occurrences_ocurrencexentity_curatorplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
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
            <label><?= _t("Event Date") ?></label>
            <div>
                <label><?= _t("Start Date") ?></label>
                {{{ca_occurrences.event_period.event_period_startdate%label=<?= _t("Start Date") ?>}}}

                <label><?= _t("End Date") ?></label>
                {{{ca_occurrences.event_period.event_period_enddate%label=<?= _t("End Date") ?>}}}
            </div>
        </div>

        <div class="campo">
            <label><?= _t("Responsible Institution") ?></label>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=realizacao&label=<?= _t("Responsible Institution") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Event Location") ?></label>
            {{{ca_places.preferred_labels%restrictToRelationshipTypes=site&label=<?= _t("Event Location") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("National Representation") ?></label>
            <div>
                <label><?= _t("Name of Entity") ?></label>
                <input name="ca_entities.preferred_labels.displayname/representacao" value="" id="ca_entities_preferred_labels" rows="1" style="" size="" type="text">
                <input name="ca_entities.preferred_labels/representacao_label" value="<?= _t("Name of Entity") ?> (<?= _t("National Representation") ?>)" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val(v.trim());
                        jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').autocomplete({
                            minLength: 3,
                            delay: 800,
                            html: true,
                            source: function(request, response) {
                                $.ajax({
                                    url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Entity',
                                    dataType: 'json',
                                    method: 'GET',
                                    //data: { term: request.term , limit:5 },
                                    data: {
                                        term: ('ca_entities.preferred_labels.displayname:' + request.term)
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
                                jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels.displayname/representacao"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>

                <label><?= _t("Country of Origin/Representation") ?></label>
                <input name="ca_entities_x_occurrences.ocurrencexentity_repnacplace" value="" class="" id="ca_entities_x_occurrences_ocurrencexentity_repnacplace" rows="1" style="" size="" type="text">
                <input name="ca_entities_x_occurrences.ocurrencexentity_repnacplace_label" value="<?= _t("Country of Origin/Representation") ?>" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val(v.trim());
                        jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').autocomplete({
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
                                jQuery('#ca_entities_x_occurrences_ocurrencexentity_repnacplace').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
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
            <label>Participação</label>
            <div>
                <label><?= _t("Name of Entity") ?></label>
                <input name="ca_entities.preferred_labels/participation" value="" id="ca_entities_preferred_labels" rows="1" style="" size="" type="text">
                <input name="ca_entities.preferred_labels/participation_label" value="<?= _t("Name of Entity") ?> (<?= _t("Participation") ?>)" type="hidden">
                <script>
                    jQuery(document).ready(function() {
                        var v = jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val();
                        v = v.replace(/(<\/?[^>]+>)/gi);
                        v = v.replace(/\[([\d]+)\]$/gi);
                        jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val(v.trim());
                        jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').autocomplete({
                            minLength: 3,
                            delay: 800,
                            html: true,
                            source: function(request, response) {
                                $.ajax({
                                    url: '<?= $this->request->getBaseUrlPath() ?>/index.php/quickfind/Entity',
                                    dataType: 'json',
                                    method: 'GET',
                                    //data: { term: request.term , limit:5 }
                                    data: {
                                        term: request.term
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
                                jQuery('#ca_entities_preferred_labels[name="ca_entities.preferred_labels/participation"]').val(jQuery.trim(ui.item.label.replace(/<\/?[^>]+>/gi, '')));
                                event.preventDefault()
                            },
                            change: function(event, ui) {}
                        }).click(function() {
                            this.select();
                        });
                    });
                </script>
                <label><?= _t("Type of Participation") ?></label>
                {{{ca_entities_x_occurrences.participation_type}}}

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

        <div class="campo">
            <label><?= _t("Related Documents (Search by Title)") ?></label>
            {{{ca_objects.preferred_labels.name/production%label=<?= _t("Related Documents (Search by Title)") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Related Artworks (Search by Title)") ?></label>
            {{{ca_objects.preferred_labels.name/participation%label=<?= _t("Related Artworks (Search by Title)") ?>}}}
        </div>

    </div>

    <div class="enviar">{{{submit%label=<?= _t("Search") ?>}}}</div>

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
    $("input[name='_formElements']").val(b);
</script>