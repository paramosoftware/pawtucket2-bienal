<?php
$item = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
?>

<div class="sec-header">
    <span id="hierarchy">
        {{{<unit relativeTo="ca_objects.hierarchy" delimiter="/">
            ^ca_objects.type_id: <l>^ca_objects.preferred_labels</l>
        </unit>}}}
    </span>

    <script>
        const f_name = "<?= $acao ?>";
        for (let a of document.getElementById("hierarchy").getElementsByTagName("a")) {
            let split_href = a.href.split("//");
            if (split_href.length == 3) {
                a.setAttribute("href", split_href[0] + "//" + split_href[1] + "/" + f_name + "/" + split_href[2]);
            }
        }
    </script>

    <hr />

    <div>
        <h1>{{{<unit>^ca_objects.preferred_labels</unit>}}}</h1>
        <label>id: {{{<unit>^ca_objects.idno</unit>}}}</label>
    </div>

    <div>
        <span><b>{{{<unit>^ca_objects.type_id</unit>}}}</b></span>
        <div class="select-div">
            <button class="select-btn" popovertarget="select-popover">
                <img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/download.svg" /><?= _t("Select a Report") ?>
            </button>
            <div popover id="select-popover">
                <ul>
                    <?php
                    foreach ($exportacao_formatos as $formato) {
                        print '<li><a target="_blank" href="' . $this->request->getFullUrlPath() . '/view/' . $formato["type"] . '/download/1/export_format/' . $formato["code"] . '">' . $formato["name"] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="summary-sheet">
        <div class="summary-sheet-attributes">

            <!-- campos específicos de obra -->

            {{{<ifdef code="ca_objects.nonpreferred_labels">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Other Titles") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.nonpreferred_labels</div>
                        </div>
                        </ifdef>}}}


            <div class="summary-sheet-attribute">
                <div class="summary-sheet-attribute-label"><?= _t("Production Date") ?></div>
                <div class="summary-sheet-attribute-value">{{{^ca_objects.production_date.production_date_value}}}</div>
            </div>

            <?php
            $va_processos_artisticos = array();

            $vs_tecnica = $item->get("ca_objects.artwork_technique", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
            $vs_tecnica_processo = $item->get("ca_objects.artwork_technique_process", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));

            $vs_suporte = $item->get("ca_objects.artwork_support", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));
            $vs_material_suporte = $item->get("ca_objects.artwork_material_support", array('delimiter' => '; ', 'convertCodesToDisplayText' => true));

            if ($vs_tecnica)
                $va_processos_artisticos[] = $vs_tecnica;

            if ($vs_tecnica_processo)
                $va_processos_artisticos[] = $vs_tecnica_processo;

            if ($vs_suporte)
                $va_processos_artisticos[] = $vs_suporte;

            if ($vs_material_suporte)
                $va_processos_artisticos[] = $vs_material_suporte;

            $vs_processos_artisticos = implode("; ", $va_processos_artisticos);

            if ($vs_processos_artisticos) {
            ?>

                <div class="summary-sheet-attribute">
                    <div class="summary-sheet-attribute-label"><?= _t("Artistic Processes (Support, Technique, and Material)") ?></div>
                    <div class="summary-sheet-attribute-value"><?php print $vs_processos_artisticos; ?></div>
                </div>

            <?php
            }
            ?>

            {{{<ifdef code="ca_objects.artwork_type">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Type of Work") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.artwork_type</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.art_form">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Artistic Expression") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.art_form</div>
                        </div>
                        </ifdef>}}}

            <?php
            $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><l>^ca_occurrences.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_occurrences.bienal_awards</unit></unit>');
            if ($resp) {
            ?>
                <div class="summary-sheet-attribute">
                    <div class="summary-sheet-attribute-label"><?= _t("Prize Awarded") ?></div>
                    <div class="summary-sheet-attribute-value">
                        <?php
                        print $resp
                        ?>
                    </div>
                </div>
            <?php } ?>

            <!-- fim obra -->

            {{{<ifdef code="ca_objects.unitdate.date_value">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Dates") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_objects.unitdate" delimiter="<br>">^ca_objects.unitdate.dates_types: ^ca_objects.unitdate.date_value</unit>
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_genre">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Documentary Genre") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.document_genre</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_type">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Document Type") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.document_type</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.analog_digital">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Analog/Digital") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.analog_digital</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.form">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Form") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.form</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.inscription">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Inscription") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.inscription</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.other_identification_form">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Pre-existing Identification") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.other_identification_form</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.others_idno">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Other Numbers or Identification Codes") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.others_idno</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_support">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Support") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.document_support</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_technique">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Technique") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.document_technique</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.dimensions">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Dimension") ?></div>
                            <unit relativeTo="ca_objects.dimensions" delimiter=" ">
                            <div class="summary-sheet-attribute-value">
                            
                            	<ifdef code="ca_objects.dimensions.measured_material_type">
                                <div class="subatributo">
                                    <span><?= _t("Type of Measured Material") ?>:</span>
                                    <span>^ca_objects.dimensions.measured_material_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_type">
                                <div class="subatributo">
                                    <span><?= _t("Type of Dimension") ?>:</span>
                                    <span>^ca_objects.dimensions.dimension_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_value">
                                <div class="subatributo">
                                    <span><?= _t("Dimension Value") ?>:</span>
                                    <span>^ca_objects.dimensions.dimension_value ^ca_objects.dimensions.measurement_unit</span>
                                </div>
                                </ifdef>
                                
                            </div>
                            </unit>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.artwork_description">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Artwork Description") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.artwork_description</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.location_identifier">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Location Code") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.location_identifier</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.storage_note">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Location Note") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.storage_note</div>
                        </div>
                        </ifdef>}}}

            <?php
            $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_entities" delimiter="<br>" restrictToRelationshipTypes="edition;creator;contributor;publisher"><b><l>^ca_entities.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_entities.entity_functions</unit></unit>');
            if ($resp) {
            ?>
                <div class="summary-sheet-attribute">
                    <div class="summary-sheet-attribute-label"><?= _t("Related Entities (Production Context)") ?></div>
                    <div class="summary-sheet-attribute-value">
                        <?php
                        print $resp
                        ?>
                    </div>
                </div>
            <?php } ?>

            {{{<ifdef code="ca_objects.city_country">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Place of Production") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.city_country</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production;subject">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Event (Documentary Production Context)") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifdef code="ca_objects.nat_representation">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("National Representation") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.nat_representation</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.content_description">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Content Description") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.content_description</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.langmaterial.lang_material_lang">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Language") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.langmaterial.lang_material_lang</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.existing_copies_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Existing Document Units") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.existing_copies_number</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_objects.related" min="1" restrictToRelationshipTypes="exemplar;copy">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Registered Copies/Originals") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" restrictToRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_objects.related" min="1" restrictToTypes="file;documents;document_parts" excludeRelationshipTypes="exemplar;copy">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Documents") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" excludeRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_list_items" min="1">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Controlled Vocabulary") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_entities" min="1" excludeRelationshipTypes="edition;creator;contributor;publisher">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Entities") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities" delimiter="<br/>" excludeRelationshipTypes="edition;creator;contributor;publisher"><l><b>^ca_entities.preferred_labels</b></l></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_objects.related" restrictToTypes="artworks" min="1">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Artwork") ?></div>
                            <div class="summary-sheet-attribute-value"><unit relativeTo="ca_objects.related" restrictToTypes="artworks" delimiter="<br/>"><unit delimiter=" -> "><l><b>^ca_objects.hierarchy.preferred_labels</b></l></unit></unit></div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production;subject">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Events") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Event Participation") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="participation"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifdef code="ca_objects.edition_month">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Edition Month") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.edition_month</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.edition_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Edition Number") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.edition_number</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_volume">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Tome / Volume") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.biblio_location_volume</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_cromia">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Chromatics") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.tipo_cromia</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_polaridade">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Polarity") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.tipo_polaridade</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_midia">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Type of Media") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.tipo_midia</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.padrao_gravacao">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Recording Standard") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.padrao_gravacao</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_type ">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Type of Publication") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.biblio_location_type </div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_subject">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Subject") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.biblio_location_subject</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_PHA">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("PHA Table") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.biblio_location_PHA</div>
                        </div>
                        </ifdef>}}}

        </div>

    </div>

    <?php
    if ($this->getVar("representation_id")) {
        print '<div id="media_representativa">' . $this->getVar("representationViewer") . '</div>';
    }
    ?>

</div>

<div class="sec-footer">
    <ul class="sec-footer-social-list">
        <li>
            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/facebook.svg" alt="logo facebook" /></a>
        </li>
        <li>
            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(location.href) + '&amp;tw_p=tweetbutton&amp;url=' + encodeURIComponent(location.href),'twitter-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/x-twitter.svg" alt="logo twitter" /></a>
        </li>
        <li>
            <a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
        </li>
    </ul>
</div>

<div id="caMediaPanel">
    <div id="caMediaPanelContentArea"></div>
</div>

<script type="text/javascript">
    var caMediaPanel;
    jQuery(document).ready(function() {
        if (caUI.initPanel) {
            caMediaPanel = caUI.initPanel({
                panelID: 'caMediaPanel',
                /* DOM ID of the <div> enclosing the panel */
                panelContentID: 'caMediaPanelContentArea',
                /* DOM ID of the content area <div> in the panel */
                exposeBackgroundColor: '#FFFFFF',
                /* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
                exposeBackgroundOpacity: 0.7,
                /* opacity of background color masking out page content; 1.0 is opaque */
                panelTransitionSpeed: 400,
                /* time it takes the panel to fade in/out in milliseconds */
                allowMobileSafariZooming: true,
                mobileSafariViewportTagID: '_msafari_viewport',
                closeButtonSelector: '.close' /* anything with the CSS classname "close" will trigger the panel to close */
            });
        }
    });
</script>
