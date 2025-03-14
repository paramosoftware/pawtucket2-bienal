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

<style>
    #bMorePanel {
        padding: 30px;
        background-color: var(--tertiary4);
        position: fixed;
        top: 120px;
        right: 0px;
        width: 100%;
        height: calc(100% - 120px);
        display: none;
        max-width: 400px;
        font-size: 0px;
        z-index: 100
    }

    #bMorePanel #bMorePanelClose {}

    #bMorePanel #bScrollListLabel {
        font-family: "Helvetica Neue Bold";
        font-weight: normal;
        font-size: 18px;
        text-transform: uppercase;
        color: var(--secondary);
        background-color: var(--tertiary4);

        line-height: 22px;
        margin: 0;
        padding: 0;
        margin-bottom: 20px;
    }

    #bMorePanel #bScrollListLabel .bFilterCount {
        font-family: "Helvetica Neue Roman";
        font-size: 18px;
        text-transform: lowercase;

        color: var(--secondary);
        background-color: var(--tertiary4);

        display: block;
        /* border-radius: 4px; */
        /* padding: 5px 8px;
        margin-top: 10px; */
    }

    #bMorePanel #bScrollList div a {
        text-decoration: none;
        text-transform: lowercase;

        font-family: "Helvetica Neue Bold";
        font-size: 18px;

        color: var(--tertiary);
    }

    #bMorePanel #bLetterBar {
        width: 30px;
        display: inline-block;
        vertical-align: top;
        color: #fff;
        font-size: 12px;
        font-family: "Helvetica Bold"
    }

    #bMorePanel #bScrollList {
        overflow: auto;
        width: calc(100% - 30px);
        height: calc(100% - 70px);
        display: inline-block;
        vertical-align: top;
        color: #fff;
        font-size: 12px;
        font-family: "Helvetica Roman"
    }

    #bMorePanel #bScrollList div {
        margin: 2px;
    }

    #bMorePanel #bScrollList div strong {
        margin: 15px 0px;
        font-family: "Helvetica Bold"
    }
</style>

<div id='bMorePanel'>
    <div id="bScrollList"></div>
</div>


<div class="sec-header">
    <span>Home / <?= _t("Advanced Search") ?>:&nbsp;<b><?= _t("Documents") ?></b></span>
    <hr />
    <div>
        <h1><?= _t("Documents") ?></h1>
    </div>
    <div>
        <span><b><?= _t("Advanced Search") ?></b></span>
    </div>
</div>

<div id="formulario">

    {{{form}}}

    <div class="coluna">
        <div class="campo">

            <label><?= _t("Hierarchical Level") ?></label>
            <div>
                <select id="hierarchyselecter1" style="width:250px;display:block !important;margin-bottom:10px !important" onchange="hierarchyfinder_find(this)" data-level="1">
                    <option><?= _t("Loading") ?>...</option>
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
                function hierarchyfinder_find($obj) {
                    var selecter = $($obj);
                    var value = selecter.val();
                    var level = Number(selecter.data("level"));
                    var populate = $("#hierarchyselecter" + (level + 1));

                    hierarchyfinder_clear(level + 1);

                    populate.prop('disabled', 'disabled');
                    populate.css("opacity", ".2");
                    populate.find('option').remove().end().append('<option value="">carregando...</option>').val('');

                    if ((value == '') && (level > 1)) {
                        $(".hierarchyselectervalue").val($("#hierarchyselecter" + (level - 1)).children("option:selected").val());
                    } else
                        $(".hierarchyselectervalue").val(value);

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
                    u = "<?= $this->request->getBaseUrlPath() ?>/service.php/HierarchyLookup/objects?id=" + $parent_id;

                    $.ajax({
                            url: u,
                            dataType: 'json',
                            method: 'GET',
                            success: function($data) {
                                hierarchyfinder_populate($data, $parent_id, $selecter);
                            }
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
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
                            if (o["name"]) $selecter.append($("<option />").val(o["object_id"]).text(o["name"]));
                        });
                    } else {
                        $selecter.find("option:first-child").html("não há mais registros");
                    }
                }
                hierarchyfinder_get(1, $("#hierarchyselecter1"));
            </script>
        </div>

    </div>

    <div class="coluna">

        <div class="campo">
            <label><?= _t("Title or Denomination of Document") ?></label>
            {{{ca_objects.preferred_labels%label=<?= _t("Title or Denomination of Document") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Production Date or Period") ?></label>
            <div>
                {{{data_documento%label=<?= _t("Production Date or Period") ?>}}}
                {{{ca_objects.unitdate.dates_types}}}
            </div>
        </div>

        <div class="campo "> <!-- _attribute_value_document_genre -->
            <label><?= _t("Documentary Genre") ?></label>
            {{{ca_objects.document_genre%label=<?= _t("Documentary Genre") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Document Type") ?></label>
            {{{ca_objects.document_type%label=<?= _t("Document Type") ?>}}}
        </div>

        <!--
                    <div class="campo">
                        <label>Analógico / digital</label>
                        {{{ca_objects.analog_digital}}}
                    </div>
					-->

        <div class="campo">
            <label><?= _t("Support") ?></label>
            {{{ca_objects.document_support%label=<?= _t("Support") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Entity / Responsible") ?></label>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator;publisher;edition;contributor&label=<?= _t("Entity / Responsible") ?>}}}

            <label><?= _t("Institution") ?></label>
            <input name="ca_objects_x_entities.entity_institution" />
            <input type="hidden" name="ca_objects_x_entities.entity_institution_label" value="<?= _t("Institution") ?>" />
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
            <label><?= _t("Related Event in Production Context") ?></label>
            {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=production;subject&label=<?= _t("Related Event in Production Context") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("National Representation") ?></label>
            <input name="ca_objects.nat_representation[]" />
            <input type="hidden" name="ca_objects.nat_representation_label" value="<?= _t("National Representation") ?>" />
        </div>

        <div class="campo">
            <label><?= _t("Content Description") ?></label>
            {{{ca_objects.content_description%label=<?= _t("Content Description") ?>}}}
        </div>

        <div class="campo">
            <label><?= _t("Related Controlled Vocabulary") ?> <a href="#" class="icon question" onclick="load_vocabulary_list(); return false"></a></label>
            {{{ca_list_items.preferred_labels%label=<?= _t("Related Controlled Vocabulary") ?>}}}
        </div>

        <!-- FRED 07/03/2024
                    Adicionando painel lateral para exibição da lista de itens do vocabulário controlado -->

        <script>
            function load_vocabulary_list() {
                u = "<?= $this->request->getBaseUrlPath() ?>/index.php/lookup/ListItem/GetHierarchyLevel/list_id/85/id/7549/noSymbols/1/init/1";

                $.ajax({
                        url: u,
                        dataType: 'json',
                        method: 'GET',
                        success: function($data) {
                            $data = $data["7549"];

                            jQuery("#bMorePanel").mouseleave(function() {
                                $("#bScrollList").empty();
                                jQuery("#bMorePanel").hide()
                            });

                            $("#bScrollList").append('<a href="#" class="pull-right" id="bMorePanelClose" onclick="jQuery(&quot;#bMorePanel&quot;).toggle(); return false;"><span class="glyphicon glyphicon-remove-circle"></span></a>');
                            $("#bScrollList").append('<div style="margin-top:20px"><h1 id="bScrollListLabel"><?= _t("Bibliographic Vocabulary") ?><span class="bFilterCount"> (' + $data["_itemCount"] + ' total)</span></h1></div>');

                            $.each($data, function() {

                                if (typeof(this["name_singular"]) != "undefined")
                                    $("#bScrollList").append('<div><a href="#" onclick="select_vocabulary_item(\'' + this["name_singular"] + '\'); return false">' + this["name_singular"] + '</a></div>');

                                //$('#bMorePanel').show();
                            });
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    });

                u = "<?= $this->request->getBaseUrlPath() ?>/index.php/lookup/ListItem/GetHierarchyLevel/list_id/83/id/246/noSymbols/1/init/1";

                $.ajax({
                    url: u,
                    dataType: 'json',
                    method: 'GET',
                    success: function($data) {
                        $data = $data["246"];

                        $("#bScrollList").append('<h1 id="bScrollListLabel"><?= _t("Iconographic Vocabulary") ?><span class="bFilterCount"> (' + $data["_itemCount"] + ' total)</span></h1>');

                        $.each($data, function() {

                            if (typeof(this["name_singular"]) != "undefined")
                                $("#bScrollList").append('<div><a href="#" onclick="select_vocabulary_item(\'' + this["name_singular"] + '\'); return false">' + this["name_singular"] + '</a></div>');

                            $('#bMorePanel').show();
                        });
                    }
                });
            }

            function select_vocabulary_item(ps_value) {
                $("#ca_list_items_preferred_labels").val(ps_value);
                $("#bScrollList").empty();
                jQuery("#bMorePanel").hide();
            }
        </script>

        <!-- FRED 07/03/2024 -->

        <div class="campo">
            <label><?= _t("Related Entity") ?></label>
            {{{ca_entities.preferred_labels%label=<?= _t("Related Entity") ?>}}}
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
            <label><?= _t("Related Places") ?></label>
            {{{ca_places.preferred_labels%label=<?= _t("Related Places") ?>}}}
        </div>

    </div>

    <div class="enviar">{{{submit%label=<?= _t("Search") ?>}}}</div>

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
    $("input[name='_formElements']").val(b);
</script>