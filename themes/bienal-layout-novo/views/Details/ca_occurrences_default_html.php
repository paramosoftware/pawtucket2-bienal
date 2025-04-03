<?php
$t_object = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
?>

<div class="sec-header">
    <span id="hierarchy">
        {{{<unit relativeTo="ca_occurrences.hierarchy" delimiter="/">
            ^ca_occurrences.type_id: <l>^ca_occurrences.preferred_labels</l>
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
        <h1>{{{<unit>^ca_occurrences.preferred_labels</unit>}}}</h1>
        <label>id: {{{<unit>^ca_occurrences.idno</unit>}}}</label>
    </div>

    <div>
        <span><b>{{{<unit>^ca_occurrences.type_id</unit>}}}</b></span>

        <?php if (count($exportacao_formatos)) { ?>
            <div class="select-div">
                <button class="select-btn" popovertarget="select-popover">
                    <img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/download.svg" /><?= _t("Select a Report") ?>
                </button>
                <div popover id="select-popover">
                    <ul>
                        <?php
                        foreach ($exportacao_formatos as $formato) {
                            print '<li><a target="_blank" href="' . $this->request->getFullUrlPath() . '/view/' . $formato["type"] . '/download/1/export_format/' . $formato["code"] . '">' . _t($formato['name']) . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<div id="links">
    <a href="/pawtucket/index.php/Browse/obras/facet/occurrences_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">obras</a>
    <a href="/pawtucket/index.php/Browse/documentos/facet/occurrences_production_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">documentos</a>
    <a href="/pawtucket/index.php/Browse/entidades/facet/participation_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">participações</a>
</div>

<div class="wrapper">
    <div class="summary-sheet">
        <div class="summary-sheet-attributes">

            {{{<ifdef code="ca_occurrences.nonpreferred_labels">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Other Names") ?></div>
                            <div class="summary-sheet-attribute-value">
                            	^ca_occurrences.nonpreferred_labels
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.event_type">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Type of Event") ?></div>
                            <div class="summary-sheet-attribute-value">
                            	<strong><?= _t("Type") ?>:</strong> ^ca_occurrences.event_type.event_type_value<br />
                                <strong><?= _t("Bienal Event") ?>:</strong> ^ca_occurrences.event_type.event_type_bienal
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.event_period">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Event Date") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <ifdef code="ca_occurrences.event_period.event_period_startdate"><strong><?= _t("Start Date") ?>:</strong> ^ca_occurrences.event_period.event_period_startdate<br /></ifdef>
                                <ifdef code="ca_occurrences.event_period.event_period_enddate"><strong><?= _t("End Date") ?>:</strong> ^ca_occurrences.event_period.event_period_enddate</ifdef>
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.participants_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Participating Artists") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.participants_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.artworks_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Works Exhibited") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.artworks_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{
                        <ifcount code="ca_places" min="1">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Event Location") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_places" delimiter="<br/>" restrictToRelationshipTypes="site"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="realizacao">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Executed By") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="realizacao"><b><l>^ca_entities.preferred_labels</l></b></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{
                        <ifcount code="ca_places" min="1">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Places") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifdef code="ca_occurrences.visitors_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Visitor Attendees") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.visitors_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.countries_number">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Number of Countries Represented") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.countries_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.cost">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Cost") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.cost</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.note">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Notes") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.note</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.art_form">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Artistic Expression") ?></div>
                            <div class="summary-sheet-attribute-value">^ca_occurrences.art_form</div>                            
                        </div>
                        </ifdef>}}}

            {{{
                        <ifcount code="ca_entities" min="1" restrictToRelationshipTypes="patrocinio,apoio">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Sponsors and Supporters") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities" delimiter="<br/>" restrictToRelationshipTypes="patrocinio,apoio"><l>^ca_entities.preferred_labels</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Entities (Production Context)") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="representacao">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("National Representation") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> (<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>) </unit>
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

            {{{<ifcount code="ca_occurrences.related" min="1" restrictToRelationshipTypes="production">
                        <div class="summary-sheet-attribute">
                            <div class="summary-sheet-attribute-label"><?= _t("Related Event(s)") ?></div>
                            <div class="summary-sheet-attribute-value">
                                <unit relativeTo="ca_occurrences.related" delimiter="<br/>" restrictToRelationshipTypes="production"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

        </div>

    </div>

    {{{<ifcount code="ca_occurrences.children" min="1">
                
                <div id="conteudo">
    
                    <div id="contagem">
                        <strong><span class="quantidade"></span></strong><?= _t("Sections / Subsections") ?>
                    </div>            

                    <table id="itens">
                      	
                        <unit relativeTo="ca_occurrences.children" delimiter=" ">
                        <tr class="item">
                            <td class="col tipo">^ca_occurrences.type_id</td>
                            <td class="col titulo"><l>^ca_occurrences.preferred_labels</l></td>
                        </tr>
                        </unit>
                        
                    </table>  
                    
                </div>

				<script>
                    $("#contagem .quantidade").html( $(".item").length + " " );
                </script>
                
                </ifcount>}}}

</div>

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
            <a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
        </li>
    </ul>
</div>