<?php
$t_object = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
?>

<style>
    .wrapper {
        margin-inline: 40px;
        margin-bottom: 60px;
        max-width: 100dvw;
        width: 100%;
        display: flex;
        gap: 40px;
    }

    main {
        font-size: 0px;
        display: flex;
        flex-flow: row wrap;
    }

    main #hierarquia {
        border-bottom: #333 dashed 1px;
        padding: 5px 20px;
        width: 100%
    }

    main #hierarquia ul {
        margin: 0;
        padding: 0;
    }

    main #hierarquia ul li {
        color: #444;
        padding: 10px;
        font-size: 12px;
        display: inline-block;
        font-family: "Helvetica Roman";
        position: relative;
        padding-left: 30px;
    }

    main #hierarquia ul li:hover a {
        color: #09C
    }

    main #hierarquia ul li:after {
        content: "";
        border-top: 9px solid transparent;
        border-bottom: 9px solid transparent;
        border-left: 9px solid #fff;
        position: absolute;
        left: 0px;
        top: 9px;
    }

    main #hierarquia ul li:before {
        content: "";
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 10px solid #777;
        position: absolute;
        left: 0;
        top: 8px;
    }

    main #hierarquia ul li:first-child {
        padding-left: 12px
    }

    main #hierarquia ul li:first-child:after {
        border: none
    }

    main #hierarquia ul li:first-child:before {
        border: none
    }

    main #hierarquia ul li strong {
        font-size: 12px;
        font-family: "Helvetica Roman";
        margin-right: 5px
    }

    main #hierarquia ul li a {
        font-size: 12px;
    }

    main #titulo {
        padding: 20px 30px;
        font-family: "Helvetica Heavy";
        font-size: 38px;
        text-transform: uppercase;
        color: #333;
        width: 100%;
        padding-right: 20%;
        position: relative;
        line-height: 38px
    }

    main #titulo i {
        font-style: normal;
        font-family: "Helvetica Roman";
    }

    main #titulo .idno {
        border: #aaa solid 1px;
        background-color: #fff;
        color: #555;
        font-size: 10px;
        padding: 5px 9px;
        font-family: "Helvetica Medium";
        text-transform: uppercase;
        border-radius: 4px;
        position: absolute;
        top: 15px;
        right: 15px;
        line-height: normal
    }

    main #ferramentas {
        padding: 15px 10px 15px 30px;
        text-align: left;
        width: 100%;
        border-bottom: #555 dashed 1px;
        border-top: #aaa dashed 1px;
    }

    main #ferramentas select {
        height: 30px;
        line-height: 30px;
        padding: 5px;
        border: #999 solid 1px;
        border-radius: 4px;
        font-size: 14px;
        font-family: "Helvetica Roman";
        margin-right: 7px;
        vertical-align: top
    }

    main #ferramentas select:last-child {
        margin: 0
    }

    main #ferramentas .icon {
        line-height: 30px;
        margin-right: 7px;
        font-size: 22px
    }

    main .links {
        display: inline-block;
        vertical-align: top;
        font-size: 14px;
        font-family: "Helvetica Roman";
        color: #09C;
        padding: 4px;
        border-radius: 4px;
        border: #09c solid 1px;
        height: 27px
    }

    main #download {
        display: inline-block;
        vertical-align: top
    }

    main #compartilhar {
        float: right;
        display: inline-block;
        vertical-align: top
    }

    main #compartilhar div {
        display: inline-block;
        vertical-align: top
    }

    main #compartilhar a {}

    main #media_representativa {
        /* padding: 30px; */
        vertical-align: top;
        font-size: 12px;
        position: relative;
        flex-basis: 80%;
        flex-grow: 2;
    }

    main #media_representativa div:last-of-type {
        display: none;
    }

    #media_representativa #images #image {
        width: 100%;
    }

    #media_representativa #images iframe {
        height: calc(100dvh - var(--header-height));
    }

    main #descricao {
        vertical-align: top;
        font-size: 12px;
        position: relative;
        flex-basis: 80%;
        flex-grow: 2;
    }

    main #descricao .aviso {
        text-align: center;
        font-size: 22px;
        margin: 100px;
        border-radius: 6px;
        padding: 30px 50px;
        background-color: #ddd;
        font-family: "Helvetica Medium";
    }

    main #conteudo {
        vertical-align: top;
        position: relative;
        flex-basis: 20%;
        flex-grow: 2;

        border-block: 2px solid var(--secondary);

        font-family: "Helvetica Neue Bold";
        font-size: 16px;
    }

    main #contagem {
        text-transform: uppercase;

        color: var(--secondary);
        background-color: var(--tertiary2);

        padding-left: 15px;
        padding-block: 30px;
    }

    main #contagem strong {
        font-family: "Helvetica Neue Bold";
        font-weight: normal;
    }

    main #contagem {
        font-family: "Helvetica Neue Roman";
    }

    main #atributos {
        border-block: 2px solid var(--secondary);
    }

    main #atributos .atributo {
        width: 100%;
        min-height: 80px;
        text-align: right;
        align-content: center;
    }

    main #atributos .atributo:nth-child(odd) {
        background-color: var(--tertiary2);
    }

    main #atributos .atributo .label {
        display: inline-block;
        vertical-align: top;
        width: 240px;
        padding: 11px;
        color: var(--secondary);

        font-family: "Helvetica Neue Bold";
        font-size: 16px;
        text-transform: uppercase;
        text-align: left;
    }

    main #atributos .atributo .valor {
        display: inline-block;
        max-width: calc(100% - 260px);
        width: 100% !important;
        vertical-align: top;
        padding: 11px;

        font-family: "Helvetica Neue Roman";
        font-size: 16px;
        text-align: left;
    }

    main #atributos .atributo .valor a {
        font-family: "Helvetica Neue Bold";
        font-size: 16px;
        text-decoration: none;
        color: var(--primary);

        &:hover {
            color: var(--secondary);
        }
    }


    main #atributos .atributo:last-child {
        border: none
    }

    main #atributos .atributo .subatributo {}

    main #atributos .atributo .subatributo span:nth-child(2) {
        font-family: "Helvetica Neue Roman";
    }

    main #atributos .atributo .subatributo span:nth-child(1) {
        font-family: "Helvetica Neue Bold";
    }

    main #itens .item:nth-child(even) {
        background-color: var(--tertiary2);
    }

    main #itens .item {}

    main #itens .item:last-child {
        border: none
    }

    main #itens .item .col {
        padding: 20px 10px;
        display: inline-block;
        vertical-align: top;
        border-left: 1px solid var(--tertiary3);
    }

    /* main #itens .item .col:last-child {
        border: none
    } */

    main #itens .item .col:first-child {
        border: none
    }

    main #itens .item .col.tipo {
        width: 20%;
        text-transform: uppercase;
        color: var(--secondary);
        margin-right: 5px;
    }

    main #itens .item .col.titulo {
        width: 30%;
        color: var(--primary);

        &:hover {
            color: var(--secondary);
        }
    }

    main #itens .item .col.descricao {
        width: 40%;
        color: var(--secondary);
    }

    main #itens .item .col.img {
        width: 4%
    }

    .wrapper:has(#descricao) #conteudo .item .col {
        &.tipo {
            width: 25%;
        }

        &.titulo {
            width: 65%;
        }

        &.descricao {
            display: none;
        }

        &.img {
            display: none;
        }
    }

    .wrapper:not(:has(#conteudo)):not(:has(#media_representativa)) {
        max-width: max(50%, 600px);
        margin-inline: auto;
    }

    .wrapper:has(#media_representativa) {
        flex-direction: row-reverse;
    }

    main .download-button {
        display: inline-block;
        vertical-align: top;
        font-size: 14px;
        font-family: "Helvetica Roman";
        color: #fff;
        background-color: #09C;
        padding: 4px;
        border-radius: 4px;
        border: #09c solid 1px;
        height: 27px;
        cursor: pointer;
    }

    .zoomButton {
        display: none !important
    }

    @media screen and (max-width:680px) {}

    @media screen and (max-width:780px) {}

    @media screen and (max-width:880px) {}

    @media screen and (max-width:980px) {
        main #itens .item .col.tipo {
            width: 35%;
        }

        main #itens .item .col.titulo {
            width: 65%;
        }

        main #itens .item .col.descricao {
            display: none
        }
    }

    @media screen and (max-width:1080px) {}

    @media screen and (max-width:1180px) {}

    @media screen and (max-width:1280px) {}

    @media screen and (max-width:1380px) {}

    @media screen and (min-width:1480px) {}

    .wrapper:has(#paginacao) {
        margin-bottom: 0;
    }

    .wrapper:has(#paginacao) #conteudo {
        border-bottom: 0;
    }

    main #paginacao {
        font-family: "Helvetica Neue Bold";
        font-size: 18px;
        text-align: center;
        padding-top: 25px;
        padding-bottom: 30px;
        border-top: 2px solid var(--secondary);
        border-bottom: 2px solid var(--tertiary3);
        margin-bottom: 60px;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    main #paginacao * {
        font-family: "Helvetica Neue Bold";
    }

    main #paginacao .pagina {
        padding-left: 0;
    }

    main #paginacao .paginas {
        display: flex;
        align-items: center;
    }

    main #paginacao .jumper {
        color: var(--secondary);
        margin-left: auto;
    }

    main #paginacao .jumper input {
        background-color: var(--tertiary);
        color: var(--tertiary4);
        border: 1px solid var(--tertiary3);
        border-radius: 4px;
        padding-left: 5px;
        padding-right: 11px;
        padding-top: 7px;
        padding-bottom: 3px;

        width: 90px;
        height: 30px;
        margin-left: 4px;

        font-size: 16px;
        text-align: end;
    }

    /* main #paginacao .paginas .botao {
					width: 30px;
					height: 30px;
					margin-right: 3px;
				} */

    main #paginacao .paginas ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    main #paginacao .paginas ul li {
        display: inline-block;
        font-size: 16px;
        padding: 0px;
    }

    main #paginacao .paginas a {
        text-decoration: none;
        color: var(--primary);
        background-color: var(--tertiary);
        border: 1px solid var(--primary);
        border-radius: 4px;
        padding: 0;
        margin-left: 20px;

        width: 30px;
        height: 30px;

        display: inline-block;
        align-content: center;
        font-size: 16px;
    }

    main #paginacao .paginas:not(:has(.inicio)) li:first-of-type a {
        margin-left: 0;
    }

    main #paginacao .paginas ul a {
        padding-top: 3px;
    }

    /* .nextNav .botao .icon .inicio {
        margin-right: 20px;
    } */

    main #paginacao .paginas ul li.selecionado a {
        border: 1px solid var(--primary);
        background-color: var(--primary);
        color: var(--tertiary);
    }

    .pagina {
        float: left;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        font-family: "Helvetica Neue Bold";
        font-size: 18px;
        color: var(--secondary);
        padding-left: 15px;
        margin-right: auto;
    }

    .icon:before {
        font-family: "FontAwesome";
        border: none;
        font-size: inherit;
        color: inherit;
        vertical-align: top
    }

    .icon.inicio:before {
        content: "\f100"
    }

    .icon.final:before {
        content: "\f101"
    }

    .icon.proximo:before {
        content: "\f105"
    }

    .icon.anterior:before {
        content: "\f104"
    }

    .sec-header,
    .sec-list,
    .sec-footer {
        padding-inline: 40px;
    }

    .sec-header>div>span {
        text-transform: capitalize;
    }
</style>

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