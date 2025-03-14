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

<div class="advanced-search-form">

    {{{form}}}

    <div class="advanced-search-form-column">
        <div class="advanced-search-form-field">

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

    <div class="advanced-search-form-column">

        <div class="advanced-search-form-field">
            <label><?= _t("Title or Denomination of Document") ?></label>
            {{{ca_objects.preferred_labels%label=<?= _t("Title or Denomination of Document") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Production Date or Period") ?></label>
            <div>
                {{{data_documento%label=<?= _t("Production Date or Period") ?>}}}
                {{{ca_objects.unitdate.dates_types}}}
            </div>
        </div>

        <div class="advanced-search-form-field "> <!-- _attribute_value_document_genre -->
            <label><?= _t("Documentary Genre") ?></label>
            {{{ca_objects.document_genre%label=<?= _t("Documentary Genre") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Document Type") ?></label>
            {{{ca_objects.document_type%label=<?= _t("Document Type") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Support") ?></label>
            {{{ca_objects.document_support%label=<?= _t("Support") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Entity / Responsible") ?></label>
            {{{ca_entities.preferred_labels%restrictToRelationshipTypes=creator;publisher;edition;contributor&label=<?= _t("Entity / Responsible") ?>}}}

            <label><?= _t("Institution") ?></label>
            <input name="ca_objects_x_entities.entity_institution" />
            <input type="hidden" name="ca_objects_x_entities.entity_institution_label" value="<?= _t("Institution") ?>" />
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Related Event in Production Context") ?></label>
            {{{ca_occurrences.preferred_labels%restrictToRelationshipTypes=production;subject&label=<?= _t("Related Event in Production Context") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("National Representation") ?></label>
            <input name="ca_objects.nat_representation[]" />
            <input type="hidden" name="ca_objects.nat_representation_label" value="<?= _t("National Representation") ?>" />
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Content Description") ?></label>
            {{{ca_objects.content_description%label=<?= _t("Content Description") ?>}}}
        </div>

        <div class="advanced-search-form-field">
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

        <div class="advanced-search-form-field">
            <label><?= _t("Related Entity") ?></label>
            {{{ca_entities.preferred_labels%label=<?= _t("Related Entity") ?>}}}
        </div>

        <div class="advanced-search-form-field">
            <label><?= _t("Related Places") ?></label>
            {{{ca_places.preferred_labels%label=<?= _t("Related Places") ?>}}}
        </div>

    </div>

    <div class="submit-button">{{{submit%label=<?= _t("Search") ?>}}}</div>

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