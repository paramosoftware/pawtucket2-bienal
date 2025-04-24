<?php
    $item = $this->getVar("item");
    $exportacao_formatos = $this->getVar('export_formats');
    $acao = $this->request->getAction();

    $page = $this->getVar("page");
    if (!$page)
        $page = 1;

    $vb_exibir_imagem = true;
    ?>

    <?php
    $o_data = new Db();
    $o_id = $item->get('object_id');

    $qr_result = $o_data->query("
                                SELECT COUNT(ca_objects.object_id) as Q
                                FROM ca_objects
                                WHERE ca_objects.parent_id = $o_id AND ca_objects.deleted = 0 AND ca_objects.access = 1
                            ");

    $vn_numero_itens = 0;
    if ($qr_result->nextRow())
        $vn_numero_itens = $qr_result->get('Q');

    $primeiro_item = ($page - 1) * 20;
    $paginas_totais = ceil($vn_numero_itens / 20);

    $qr_result = $o_data->query("
            SELECT ca_list_item_labels.name_singular, ca_objects.access, ca_objects.object_id, ca_object_labels.name, (
                SELECT ca_attribute_values.value_longtext1
                FROM ca_attribute_values
                INNER JOIN ca_attributes
                ON ca_attributes.attribute_id = ca_attribute_values.attribute_id
                INNER JOIN ca_metadata_elements
                ON ca_metadata_elements.element_id = ca_attribute_values.element_id
                AND ca_metadata_elements.element_code = 'content_description' 
                WHERE ca_attributes.row_id = ca_objects.object_id 
                LIMIT 1 
            ) as description,
            
            (SELECT ca_attribute_values.value_longtext1
                FROM ca_attribute_values
                INNER JOIN ca_attributes
                ON ca_attributes.attribute_id = ca_attribute_values.attribute_id
                WHERE ca_attributes.row_id = ca_objects.object_id 
                AND ca_attributes.element_id = 289
                LIMIT 1 
            ) as has_external_image
            
            FROM ca_objects
            INNER JOIN ca_list_items
            ON ca_objects.type_id=ca_list_items.item_id
            INNER JOIN ca_list_item_labels 
            ON ca_list_item_labels.item_id = ca_list_items.item_id
            INNER JOIN ca_object_labels
            ON ca_object_labels.object_id = ca_objects.object_id							
            WHERE ca_objects.parent_id = $o_id AND ca_list_item_labels.locale_id = 13 AND ca_object_labels.locale_id = 13 AND ca_objects.deleted = 0 AND ca_objects.access = 1
            LIMIT $primeiro_item, 20
        ");
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

        <div class="select-div" id="<?=$this->request->getController()?>-select-wrapper">
            <button class="select-btn <?=$this->request->getController()?>" onclick="toggleById('select-popover', 'block', 9000)">
                <img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/download.svg" /><?= _t("Select a Report") ?>
            </button>

            <div class="select-popover" id="select-popover">
                <ul>
                    <?php
                    foreach ($exportacao_formatos as $formato) {
                        print '<li><a target="_blank" href="' . $this->request->getFullUrlPath() . '/view/' . $formato["type"] . '/download/1/export_format/' . $formato["code"] . '">' . _t($formato['name']) . '</a></li>';
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

            {{{<ifdef code="ca_objects.production_date.production_date_value">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Production Date") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.production_date.production_date_value</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.artwork_material_support">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Technique") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.artwork_material_support</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.artwork_technique">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Technique") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.artwork_technique</div>
                        </div>
                        </ifdef>}}}

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

            <!-- Acrescentado por Fred, 20/4/2023 -->
            <!-- Alterado por Fred, 27/7/2023 -->

            <?php {
                $vs_recursos = $item->getWithTemplate('<unit relativeTo="ca_objects.info_resource_rs">^ca_objects.info_resource_rs.info_resource_rs_location_id|^ca_objects.info_resource_rs.info_resource_access</unit>');
                $va_recursos = array();
                $va_recursos_indisponiveis = array();

                if ($vs_recursos) {
                    $va_recursos = explode(";", $vs_recursos);

                    foreach ($va_recursos as $va_recurso) {
                        $va_info_recurso = explode("|", $va_recurso);

                        if ($va_info_recurso[1] == "Não")
                            $va_recursos_indisponiveis[] = $va_info_recurso[0];
                    }
                }

                $vb_tem_imagem = ($item->get('ca_objects.has_external_image') == 227);
                $vb_exibir_imagem = ($item->get('ca_objects.rs_resource_public') == 227);

                if (($vb_tem_imagem && !$vb_exibir_imagem) || (count($va_recursos) && (count($va_recursos_indisponiveis) == count($va_recursos)))) {
            ?>
                    <div class="summary-sheet-attribute">
                        <div class="summary-sheet-attribute-label"><?= _t("Accessible Digital Document") ?></div>

                        <div class="summary-sheet-attribute-value">
                            Não
                        </div>
                    </div>
                <?php
                } elseif (count($va_recursos_indisponiveis)) {
                ?>
                    <div class="summary-sheet-attribute">
                        <div class="summary-sheet-attribute-label"><?= _t("Non-accessible Digital Document") ?></div>

                        <div class="summary-sheet-attribute-value">
                            <?php
                            print implode("; ", $va_recursos_indisponiveis)
                            ?>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

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
                            <div class="summary-sheet-attribute-label"><?= _t("Other Numbers or Identification Codes") ?></div>
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
                                <div class="summary-sheet-subattribute">
                                    <span><?= _t("Type of Measured Material") ?>:</span>
                                    <span>^ca_objects.dimensions.measured_material_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_type">
                                <div class="summary-sheet-subattribute">
                                    <span><?= _t("Type of Dimension") ?>:</span>
                                    <span>^ca_objects.dimensions.dimension_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.dimensions.dimension_value">
                                <div class="summary-sheet-subattribute">
                                    <span><?= _t("Dimension Value") ?>:</span>
                                    <span>^ca_objects.dimensions.dimension_value ^ca_objects.dimensions.measurement_unit</span>
                                </div>
                                </ifdef>
                                
                            </div>
                            </unit>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.location_identifier">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Location Code") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.location_identifier%delimiter=;_</div>
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

            <?php
            $locais_producao = $item->getWithTemplate('<unit relativeTo="ca_objects_x_places" delimiter="<br>" restrictToRelationshipTypes="created">^ca_places.hierarchy.preferred_labels%delimiter=_->_</unit>');
            if ($locais_producao) {
            ?>
                <div class="summary-sheet-attribute">
                    <div class="summary-sheet-attribute-label"><?= _t("Place of Production") ?></div>
                    <div class="summary-sheet-attribute-value">
                        <?php print $locais_producao; ?>
                    </div>
                </div>
            <?php
            }
            ?>

            {{{<ifdef code="ca_objects.adminbiohist">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Administrative History / Biography") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.adminbiohist</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.custohist">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Archival History") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.custohist</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.scopecontent">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Scope and Content") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.scopecontent</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.appraisal">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Appraisal, Disposal, and Time Span") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.appraisal</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.accruals">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Incorporations") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.accruals</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.arrangement">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Arrangement System") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.arrangement</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Event (Documentary Production Context)") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifdef code="ca_objects.nat_representation">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("National Representation") ?></div>
                            <div class="summary-sheet-attribute-value">
							<unit delimiter="<br>">
								^ca_objects.nat_representation
							</unit>
							</div>
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
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Existing Document Units)") ?></div>
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

            {{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Events") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
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

            {{{<ifdef code="ca_objects.physaccessrestrict">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Physical Access") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_objects.physaccessrestrict</div>
                        </div>
                        </ifdef>}}}

            <!-- Acrescentado por Fred, 17/4/2021 -->
            {{{<ifdef code="ca_objects.external_link">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("External Links") ?></div>
                            <div class="summary-sheet-attribute-value">
								<unit relativeTo="ca_objects.external_link" delimiter="<br/>">
									<a href="^ca_objects.external_link.url_entry" target="_blank">
									<b>
										<ifdef code="ca_objects.external_link.url_source">
											^ca_objects.external_link.url_source
										</ifdef>
										
										<ifnotdef code="ca_objects.external_link.url_source">
											^ca_objects.external_link.url_entry
										</ifnotdef>
									</b>
									</a>
								</unit>
							</div>
                        </div>
                        </ifdef>}}}

        </div>

    </div>
    <!-- FIM div descrição -->

    <!-- Vamos montar aqui a seção do representante digital -->

    <?php
    $o_config = Configuration::load();
    if (!is_array($va_api_credentials = $o_config->get('resourcespace_apis'))) {
        $va_api_credentials = [];
    }

    foreach ($va_api_credentials as $vs_instance => $va_instance_api) {
        $vs_rs_url = $va_instance_api['resourcespace_base_api_url'];
        $vs_private_key = $va_instance_api['resourcespace_api_key'];
        $vs_user = $va_instance_api['resourcespace_user'];

        break;
    }

    $vb_external_image_access = $item->get('ca_objects.rs_resource_public');
    $vb_exibir_imagem = ($vb_external_image_access == 227);

    $vn_object_location_id = $item->get('ca_objects.location_identifier');
    $va_object_locations_ids = array();

    $vb_resource_found = false;

    if ($vn_object_location_id && ($item->get('ca_objects.has_external_image') == 227) && $vb_exibir_imagem) {
        $va_info_resources = explode("|", $item->getWithTemplate('<unit relativeTo="ca_objects.info_resource_rs" delimiter="|">^ca_objects.info_resource_rs.info_resource_rs_location_id:^ca_objects.info_resource_rs.info_resource_public_access</unit>'));

        $va_resources_permissions = array();

        foreach ($va_info_resources as $va_info_resource) {
            $va_resources_permissions[explode(":", $va_info_resource)[0]] = explode(":", $va_info_resource)[1];
        }

        $va_initial_object_locations_ids = explode(";", $vn_object_location_id);
        sort($va_initial_object_locations_ids);

        foreach ($va_initial_object_locations_ids as $vn_object_location_id) {
            if (isset($va_resources_permissions[$vn_object_location_id]) && in_array($va_resources_permissions[$vn_object_location_id], ["", "Sim", "Yes"]))
                $va_object_locations_ids[] = $vn_object_location_id;
        }

        foreach ($va_object_locations_ids as $vn_object_location_id) {
            $vs_query = "user=" . $vs_user . "&function=do_search&search=" . urlencode("cdigodelocalizao:" . $vn_object_location_id) . "&order_by=resourceid&sort=asc";

            // Sign the query using the private key
            $vs_sign = hash("sha256", $vs_private_key . $vs_query);
            $va_resources = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));

            if (is_array($va_resources) && count($va_resources)) {
                $vb_resource_found = true;
                $vn_current_object_location_id = $vn_object_location_id;

                break;
            } else
                array_shift($va_object_locations_ids);
        }

        if ($vb_resource_found) {
    ?>

            <div id="media_representativa">
                <?php
                if (count($va_object_locations_ids) > 1) {
                ?>
                    <div id="media_representativa_seletor" style="overflow:auto; width:100%; margin:auto; text-align:center;">
                        <a href="#" class="links icon anterior" id="previous_image" style="display:none"></a>
                                <select id="image_number">
                                    <?php
                                    $contador_recursos = 1;
                                    foreach ($va_object_locations_ids as $vs_resource_location_id) {
                                        echo "<option value=" . $vs_resource_location_id . ">" . $vs_resource_location_id . "</option>";

                                        $contador_recursos++;
                                    }
                                    ?>
                                </select>
                                <a href="#" class="links icon proximo" id="next_image"></a>
                    </div>
                <?php
                }
                ?>

                <script>
                    $(document).on('change', "#image_number", function() {
                        update_image($(this).val(), $(this).val());
                    });

                    $(document).on('click', ".links", function() {
                        event.preventDefault();

                        if ($(this).attr('id') == 'previous_image')
                            vn_new_image = (parseInt($("#image_number").prop('selectedIndex')) - 1);
                        else if ($(this).attr('id') == 'next_image')
                            vn_new_image = (parseInt($("#image_number").prop('selectedIndex')) + 1);

                        $('#image_number option:eq(' + vn_new_image + ')').prop('selected', true)
                        update_image($("#image_number").val(), $("#image_number").val());

                        $('#image_number').selectBox('value', $("#image_number").val());
                    });

                    function update_image(vn_pagina, vs_location_id) {
                        vs_url_imagem = "<?= $this->request->getBaseUrlPath() ?>/index.php/Detail/ReadResourceSpaceResource/id/" + vn_pagina;
                        $("#images").html("<i class='caIcon fa fa fa-cog fa-spin fa-1x' ></i> Carregando imagem...");

                        $.get(vs_url_imagem, function(data, status) {
                            $("#images").html(data);

                            current_resource_ref = $("#resource_ref").val();
                            current_resource_location_id = vs_location_id;
                        });

                        vn_pagina = $('#image_number').prop('selectedIndex');

                        if (vn_pagina == 0)
                            $("#previous_image").hide();
                        else
                            $("#previous_image").show();

                        if (vn_pagina == <?php print(count($va_object_locations_ids) - 1); ?>)
                            $("#next_image").hide();
                        else
                            $("#next_image").show();
                    }
                </script>

                <div id="images">
                    <?php
                    $contador_recursos = 1;
                    $vb_pdf = false;

                    foreach ($va_resources as $va_resource_temp) {
                        if ($va_resource_temp->file_extension == "pdf") {
                            $va_resource = $va_resource_temp;
                            $vb_pdf = true;
                        }

                        if (!$vb_pdf) {
                            if (isset($va_resources_permissions[$va_resource_temp->field92]) && ($va_resources_permissions[$va_resource_temp->field92] == "No"))
                                continue;

                            $va_resource = $va_resource_temp;

                            $vs_query = "user=" . $vs_user . "&function=get_resource_path&ref=" . $va_resource_temp->ref . "&getfilepath=1&size=lpr&page=" . $vn_page;

                            $vs_sign = hash("sha256", $vs_private_key . $vs_query);

                            $vs_resource_path = json_decode(file_get_contents($vs_rs_url . $vs_query . "&sign=" . $vs_sign));
                    ?>

                            <img id="image" src="data:image/png;base64,<?php print base64_encode(file_get_contents($vs_resource_path)); ?>" width="500px"
                                <?php if ($contador_recursos > 1)
                                    print ' style="display:none"';
                                ?>>
                    <?php

                            $contador_recursos++;
                        }
                    }
                    ?>
                </div>

                <?php if ($vb_pdf || true) {
                ?>
                    <div style="margin-top:10px">
                        <span class="image-subtitle">Placeholder para legenda.</span>
                        <button class="download-button" onClick="downloadResource();">Download</button>
                    </div>

                    <script>
                        current_resource_ref = '<?php print $va_resource->ref; ?>';
                        current_resource_location_id = '<?php print $vn_current_object_location_id; ?>';

                        function downloadResource() {
                            window.location.href = "<?=$this->request->getBaseUrlPath()?>/index.php/Detail/DownloadResourceSpaceResource/object_id/<?php print $item->get('object_id'); ?>/location_id/" + current_resource_location_id + "/resource/" + current_resource_ref + "/format/<?php print $va_resource->file_extension; ?>";
                        }
                    </script>
                <?php
                }
                ?>

                <?php if (!$vb_pdf) {
                ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.js" integrity="sha512-lgj1oT2/0EWpv2oHNeqzWmINqNEfHR4kjvl5DXc6o8IPxoRLgMxhW6c/mZ/fnSFN+6ByTSabiq//GGbYMo/4Lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.5/viewer.css" integrity="sha512-c7kgo7PyRiLnl7mPdTDaH0dUhJMpij4aXRMOHmXaFCu96jInpKc8sZ2U6lby3+mOpLSSlAndRtH6dIonO9qVEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                    <script>
                        const viewer = new Viewer(document.getElementById('images'));
                        //viewer.show();
                    </script>
                <?php
                }
                ?>
            </div>
    <?php
        }
    }
    ?>

    <!-- Fim da seção do representante digital -->

    <?php
    if ($this->getVar("representation_id") && ($item->get('ca_objects.has_external_image') != 227)) {
        print '<div id="media_representativa">' . $this->getVar("representationViewer") . '</div>';
    }
    ?>

    <!-- ESPAÇO ONDE O BLOCO DE SQL FICAVA -->

    <?php
    if ($vn_numero_itens > 1) {
    ?>
        <div id="conteudo">
            <div id="contagem" onclick="toggleItems()">
                <strong><span class="quantidade"><?= $vn_numero_itens . ($vn_numero_itens ? " " . _t("Records") . " " : " " . _t("Record") . " ") ?></span></strong><?= _t("at this level") ?>
            </div>

            <table id="itens">
                <?php while ($qr_result->nextRow()) 
                {
                    print '<tr class="item">';
                    print '<td class="col tipo">' . $qr_result->get('ca_list_item_labels.name_singular') . '</td>';
                    print '<td class="col titulo"><a href="' . $this->request->getBaseUrlPath() . '/index.php/Detail/documento/' . $qr_result->get('ca_objects.object_id') . '">' . $qr_result->get('ca_object_labels.name') . '</a></td>';
                    print '<td class="col descricao">' . $qr_result->get('description') . '</td>';

                    if (($qr_result->get('has_external_image') == 227))
                        print '<td class="col img"><img src="' . $this->request->getBaseUrlPath() . '/themes/bienal-layout-novo/assets/pawtucket/graphics/image.png" width="24px"></td>';

                    print '</tr>';
                } #FECHA while($qr_result->nextRow()) 
                ?>


                <script>
                    if ($(".summary-sheet-attribute").length <= 0) {
                        if ($("#contagem").length > 0) {
                            $(".summary-sheet").remove();
                        } else {
                            $(".summary-sheet").html("<div class='aviso'>este item não possui descrição ou registros</div>");
                        }
                    }
                </script>

                </table> <!-- FECHA itens -->


            <?php
            if ($paginas_totais > 1) 
            {
                $vb_has_summary_sheet = !empty($item->getWithTemplate('^ca_objects.content_description'))
            ?>
                <!-- PAGINAÇÂO -->
                <div class="pagination-bar">
                    <?php
                    $fullPath = $this->request->getFullUrlPath();
                    if (str_contains($fullPath, "page/")) {
                        $fullPath = substr($fullPath, 0, strlen($fullPath) - (strlen("/page/" . $page))); # remove "/page/<valor>" redundantes do final para evitar chamadas redundantes de /page como "/page/2/page/4"
                    }
                    ?>

                    <div class="pagination-bar-summary">
                        <?php
                            if ($vb_has_summary_sheet)
                                print $page . "/" . $paginas_totais;
                            else
                                print _t("Page") . " " . $page . " " . _t("of") . " " . $paginas_totais 
                        ?>
                    </div>

                    <?php if (!$vb_has_summary_sheet) : ?>
                        <div class="pagination-bar-page-numbers">
                        <?php
                            $vn_i = 1;

                            if (in_array($page, [1,2]))
                                $vn_f = 5;
                            elseif ($page + 2 < $paginas_totais)
                                $vn_f = $page + 2;
                            else
                                $vn_f = $paginas_totais;
                            
                            $html_paginacao = '';
                            
                            if ($page > 1) {
                                $html_paginacao .= "<a class='nextNav botao icon inicio' href='" . $fullPath . "/page/1'></a>";
                            }

                            if ($page > 10) {
                                $html_paginacao .= "<a class='nextNav botao icon anterior' href='" . $fullPath . "/page/" . ($page - 1) . "'></a>";
                            }

                            $html_paginacao .= '<ul>';

                            while ($vn_i <= $vn_f) {
                                $html_paginacao .= "<li " . ($vn_i == $page ? 'class="pagination-bar-selected-page"' : "") . ">" .
                                    "<a class='nextNav' href='" . $fullPath . "/page/$vn_i'>$vn_i</a>"
                                    . "</li>";
                                $vn_i++;
                            }

                            $html_paginacao .= "</ul>";

                            if (!$vb_has_summary_sheet && ($page < $paginas_totais)) {
                                $html_paginacao .= "<a class='nextNav botao icon proximo' href='" . $fullPath . "/page/" . ($page + 1) . "'></a>";
                            }

                            if (!$vb_has_summary_sheet && ($page < $paginas_totais)) {
                                $html_paginacao .= "<a class='nextNav botao icon final' href='" . $fullPath . "/page/$vn_f'></a>";
                            }

                            print $html_paginacao;
                        ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($paginas_totais > 1) { ?>
                        <div class="pagination-bar-page-jumper">
                            <?php
                                print _t("Jump to page");
                            ?><br>
                            <input />
                        </div>
                    <?php } ?>

                    <script>
                        $(".pagination-bar-page-jumper input").keypress(function($e) {
                            if ($e.which == 13 && $(this).val().trim() != "" && !isNaN($(this).val()) && Number($(this).val()) <= <?= $paginas_totais ?> && Number($(this).val()) > 0) {
                                window.location.href = "<?= $fullPath . '/page/' ?>" + $(this).val();
                            }
                        });
                    </script>
                </div>
                <!-- FIM PAGINAÇÂO -->
            <?php
            } # FECHA if ($paginas_totais > 1)
            ?>

        </div> <!-- FECHA conteudo -->
    <?php
    } # FECHA if ($vn_numero_itens > 1)
    ?>



</div> <!-- FECHA WRAPPER -->

<div id="caMediaPanel">
    <div id="caMediaPanelContentArea"></div>
</div>



<script type="text/javascript">
    var caMediaPanel;
    current_resource_location_id = '<?php print $vn_current_object_location_id; ?>';
    jQuery(document).ready(function() {
        <?php if ($vb_resource_found && $vb_pdf) {
        ?>
            update_image('<?php print $va_resource->ref; ?>', current_resource_location_id);
        <?php
        }
        ?>
    });
</script>

<div class="sec-footer">
    <ul class="sec-footer-social-list">
        <li>
            <?= _t("Share") ?>
        </li>
        <li>
            <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/facebook.svg" alt="logo facebook" /></a>
        </li>
        <li>
            <a href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(location.href) + '&amp;tw_p=tweetbutton&amp;url=' + encodeURIComponent(location.href),'twitter-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/x-twitter.svg" alt="logo twitter" /></a>
        </li>
        <li>
            <a href="#" onclick="window.open('https://wa.me/?text=' + encodeURIComponent(location.href),'whatsapp-share-dialog','width=626,height=436');return false;"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
        </li>
    </ul>
</div>