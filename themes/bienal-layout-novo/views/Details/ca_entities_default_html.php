<?php
$t_object = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
?>

<div class="sec-header">
    <span id="hierarchy">
        {{{<unit relativeTo="ca_entities.hierarchy" delimiter="/">
            ^ca_entities.type_id: <l>^ca_entities.preferred_labels</l>
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
        <h1>{{{<unit>^ca_entities.preferred_labels</unit>}}}</h1>
        <label>id: {{{<unit>^ca_entities.idno</unit>}}}</label>
    </div>
    <div>
        <span><b>{{{<unit>^ca_entities.type_id</unit>}}}</b></span>
        <?php if(count($exportacao_formatos)) { ?>
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
        <?php } ?>
    </div>
</div>

<div class="wrapper">
    <div class="summary-sheet">
        <div class="summary-sheet-attributes">

            {{{<ifdef code="ca_entities.lifespandates">
                        <div class="summary-sheet-attribute">
                            <ifdef code="ca_entities.lifespandates.lifespandate_birthdate"><strong><?= _t("Date of Birth") ?>: ^ca_entities.lifespandates.lifespandate_birthdate</strong></ifdef>
                            <ifdef code="ca_entities.lifespandates.lifespandate_deathdate"><strong><?= _t("Date of Death") ?>: ^ca_entities.lifespandates.lifespandate_deathdate</strong></ifdef>
                        </div></ifdef>}}}

            {{{<ifdef code="ca_entities.preferred_labels.displayname">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Display Name") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.preferred_labels.displayname</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.preferred_labels.otherforenames">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Other First Names") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.preferred_labels.otherforenames</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.nonpreferred_labels">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Alternative Names") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.nonpreferred_labels</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.nonpreferred_labels.otherforenames">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Other Alternative First Names") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.nonpreferred_labels.otherforenames</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.biography">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Biography") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.biography</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.entity_category">
							<unit relativeTo="ca_entities.entity_category">
							<if rule="^ca_entities.entity_category =~ /Artista \/ Arquiteto/">
							<div class="summary-sheet-attribute">
								<div class="summary-sheet-attribute-label"><?= _t("Entity Category") ?></div>
								<div class="summary-sheet-attribute-value">^ca_entities.entity_category</div>
							</div>
							</if>
							</unit>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.entity_functions">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Occupation/Functions") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.entity_functions</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_places" min="1" restrictToRelationshipTypes="birthplace">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Nationality") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_places" restrictToRelationshipTypes="birthplace">^ca_places.preferred_labels.name</unit>
                            </div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_entities.note">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Note") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_entities.note</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_objects" min="1" restrictToTypes="artworks">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Artwork") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_objects" delimiter="<br>" restrictToTypes="artworks"><b><l>^ca_objects.preferred_labels</l></b> (<unit delimiter=", " relativeTo="ca_occurrences">^ca_occurrences.preferred_labels</unit>)</unit>
                            </div>
                        </div>
                        </ifcount>}}}

            <?php
            $o_data = new Db();

            $vn_entity_id = $t_object->get('entity_id');

            $vs_sql = "SELECT DISTINCT ca_objects_x_entities.object_id
								FROM ca_attribute_values 
								INNER JOIN ca_attributes ON ca_attribute_values.attribute_id = ca_attributes.attribute_id

								INNER JOIN ca_objects_x_entities ON ca_attributes.row_id = ca_objects_x_entities.relation_id
								INNER JOIN ca_objects ON ca_objects_x_entities.object_id = ca_objects.object_id
																
								WHERE ca_attributes.element_id = 214 
								AND ca_attribute_values.value_longtext1 = " .  $vn_entity_id;

            $vs_sql = $vs_sql . " AND ca_objects.access = 1 ";

            $qr_result = $o_data->query($vs_sql);
            ?>

            {{{<case>
							<ifcount code="ca_objects" min="1" restrictToTypes="file;documents;document_parts">
							<div class="summary-sheet-attribute">
								<div class="summary-sheet-attribute-label"><?= _t("Related Documents") ?></div>
								
								<div class="summary-sheet-attribute-value" style="padding-bottom:0px">
									<unit relativeTo="ca_objects" delimiter="<br/>" restrictToTypes="file;documents;document_parts">
										<unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l>
										</unit>
									</unit>
								</div>
								
								<div class="summary-sheet-attribute-value" style="padding-top:0px">
									<?php
                                    $qr_result->seek(0);
                                    while ($qr_result->nextRow()) {
                                        $t_documento = new ca_objects($qr_result->get('object_id'));

                                        print $t_documento->getWithTemplate('<l>^ca_objects.hierarchy.preferred_labels%delimiter=_->_</l>') . "<br>";
                                    }
                                    ?>
								</div>
							</div>
							</ifcount>
						
							<?php
                            $qr_result->seek(0);
                            if ($qr_result->nextRow()) {
                            ?>
							<ifcount code="ca_objects" max="0" restrictToTypes="file;documents;document_parts">
							<div class="summary-sheet-attribute">
								<div class="summary-sheet-attribute-label"><?= _t("Related Documents") ?></div>
								<div class="summary-sheet-attribute-value">
									<?php
                                    $qr_result->seek(0);
                                    while ($qr_result->nextRow()) {
                                        $t_documento = new ca_objects($qr_result->get('object_id'));

                                        print $t_documento->getWithTemplate('<l>^ca_objects.hierarchy.preferred_labels%delimiter=_->_</l>') . "<br>";
                                    }
                                    ?>
								</div>
							</div>
							</ifcount>
							<?php
                            }
                            ?>
						</case>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Event Participation") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="participation"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b> - <ifdef code="ca_entities_x_occurrences.participation_event_section"><unit delimiter=", ">^ca_entities_x_occurrences.participation_event_section</unit></ifdef>: <unit delimiter=", ">^ca_entities_x_occurrences.participation_type</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.national_representation</unit>)</ifdef></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="award">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Prize Awarded") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><unit relativeTo="ca_occurrences" delimiter=" -> " ><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.bienal_awards</unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="representacao">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Representation in Event") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><unit relativeTo="ca_occurrences" delimiter=" -> "><l>^ca_occurrences.preferred_labels</l></unit></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> <ifdef code="ca_entities_x_occurrences.national_representation">(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>)</ifdef></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Events") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" restrictToTypes="event;section;subsection" delimiter="<br>" excludeRelationshipTypes="participation;award;representacao;pesquisado_por;entidade_pesquisada">
								
								<b><unit relativeTo="ca_occurrences" restrictToTypes="event;section;subsection" delimiter=" -> ">
								<l>^ca_occurrences.hierarchy.preferred_labels</l></unit></b>: 
								<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> 
								<ifdef code="ca_entities_x_occurrences.ocurrencexentity_notes">
								(<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_notes</unit>)
								</ifdef>
								
								</unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_entities.related" min="1">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Entities") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities.related" delimiter="<br>"><l>^ca_entities.preferred_labels</l></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            <!-- Acrescentado por Fred, 23/10/2021 -->
            {{{<ifdef code="ca_entities.external_link">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("External Links") ?></div>
                            <div class="summary-sheet-attribute-value">
								<unit relativeTo="ca_entities.external_link" delimiter="<br/>">
									<a href="^ca_entities.external_link.url_entry" target="_blank">
                                    <b>
										<ifdef code="ca_entities.external_link.url_source">
											^ca_entities.external_link.url_source
										</ifdef>
										
										<ifnotdef code="ca_entities.external_link.url_source">
											^ca_entities.external_link.url_entry
										</ifnotdef>
                                    </b>
									</a>
								</unit>
							</div>
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
