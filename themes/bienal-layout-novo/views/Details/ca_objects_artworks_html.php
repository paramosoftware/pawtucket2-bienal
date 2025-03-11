<?php
$item = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();
$function = $this->getVar("function");
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
        {{{<unit relativeTo="ca_objects.hierarchy" delimiter="/">
            ^ca_objects.type_id: <l>^ca_objects.preferred_labels</l>
        </unit>}}}
    </span>
    <script>
        const f_name = "<?= $function ?>";
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

    <div id="descricao">

        <div id="atributos">

            <!-- campos específicos de obra -->

            {{{<ifdef code="ca_objects.nonpreferred_labels">
                        <div class="atributo">
                            <div class="label"><?= _t("Other Titles") ?></div>
                            <div class="valor">^ca_objects.nonpreferred_labels</div>
                        </div>
                        </ifdef>}}}


            <div class="atributo">
                <div class="label"><?= _t("Production Date") ?></div>
                <div class="valor">{{{^ca_objects.production_date.production_date_value}}}</div>
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

                <div class="atributo">
                    <div class="label"><?= _t("Artistic Processes (Support, Technique, and Material)") ?></div>
                    <div class="valor"><?php print $vs_processos_artisticos; ?></div>
                </div>

            <?php
            }
            ?>

            {{{<ifdef code="ca_objects.artwork_type">
                        <div class="atributo">
                            <div class="label"><?= _t("Type of Work") ?></div>
                            <div class="valor">^ca_objects.artwork_type</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.art_form">
                        <div class="atributo">
                            <div class="label"><?= _t("Artistic Expression") ?></div>
                            <div class="valor">^ca_objects.art_form</div>
                        </div>
                        </ifdef>}}}

            <?php
            $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="award"><b><l>^ca_occurrences.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_occurrences.bienal_awards</unit></unit>');
            if ($resp) {
            ?>
                <div class="atributo">
                    <div class="label"><?= _t("Prize Awarded") ?></div>
                    <div class="valor">
                        <?php
                        print $resp
                        ?>
                    </div>
                </div>
            <?php } ?>

            <!-- fim obra -->

            {{{<ifdef code="ca_objects.unitdate.date_value">
                        <div class="atributo">
                            <div class="label"><?= _t("Dates") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.unitdate" delimiter="<br>">^ca_objects.unitdate.dates_types: ^ca_objects.unitdate.date_value</unit>
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_genre">
                        <div class="atributo">
                            <div class="label"><?= _t("Documentary Genre") ?></div>
                            <div class="valor">^ca_objects.document_genre</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_type">
                        <div class="atributo">
                            <div class="label"><?= _t("Document Type") ?></div>
                            <div class="valor">^ca_objects.document_type</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.analog_digital">
                        <div class="atributo">
                            <div class="label"><?= _t("Analog/Digital") ?></div>
                            <div class="valor">^ca_objects.analog_digital</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.form">
                        <div class="atributo">
                            <div class="label"><?= _t("Form") ?></div>
                            <div class="valor">^ca_objects.form</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.inscription">
                        <div class="atributo">
                            <div class="label"><?= _t("Inscription") ?></div>
                            <div class="valor">^ca_objects.inscription</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.other_identification_form">
                        <div class="atributo">
                            <div class="label"><?= _t("Pre-existing Identification") ?></div>
                            <div class="valor">^ca_objects.other_identification_form</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.others_idno">
                        <div class="atributo">
                            <div class="label"><?= _t("Other Numbers or Identification Codes") ?></div>
                            <div class="valor">^ca_objects.others_idno</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_support">
                        <div class="atributo">
                            <div class="label"><?= _t("Support") ?></div>
                            <div class="valor">^ca_objects.document_support</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.document_technique">
                        <div class="atributo">
                            <div class="label"><?= _t("Technique") ?></div>
                            <div class="valor">^ca_objects.document_technique</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.dimensions">
                        <div class="atributo">
                            <div class="label"><?= _t("Dimension") ?></div>
                            <unit relativeTo="ca_objects.dimensions" delimiter=" ">
                            <div class="valor">
                            
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
                        <div class="atributo">
                            <div class="label"><?= _t("Artwork Description") ?></div>
                            <div class="valor">^ca_objects.artwork_description</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.location_identifier">
                        <div class="atributo">
                            <div class="label"><?= _t("Location Code") ?></div>
                            <div class="valor">^ca_objects.location_identifier</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.storage_note">
                        <div class="atributo">
                            <div class="label"><?= _t("Location Note") ?></div>
                            <div class="valor">^ca_objects.storage_note</div>
                        </div>
                        </ifdef>}}}

            <?php
            $resp = $item->getWithTemplate('<unit relativeTo="ca_objects_x_entities" delimiter="<br>" restrictToRelationshipTypes="edition;creator;contributor;publisher"><b><l>^ca_entities.preferred_labels</l></b><unit delimiter=", ">: ^ca_objects_x_entities.entity_functions</unit></unit>');
            if ($resp) {
            ?>
                <div class="atributo">
                    <div class="label"><?= _t("Related Entities (Production Context)") ?></div>
                    <div class="valor">
                        <?php
                        print $resp
                        ?>
                    </div>
                </div>
            <?php } ?>

            <?php
            /*
                        {{{<ifdef code="ca_objects.acqinfo">
                        <div class="atributo">
                            <div class="label">Procedência</div>
                            <div class="valor">
                            	
                                <ifdef code="ca_objects.acqinfo.acqinfo_entity_source">
                                <div class="subatributo">
                                    <span>Fonte imedia da aquisição ou transferência:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_entity_source</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acq_type">
                                <div class="subatributo">
                                    <span>Tipo de aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acq_type</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_entry_date">
                                <div class="subatributo">
                                    <span>Data de entrada:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_entry_date</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acquisition_date">
                                <div class="subatributo">
                                    <span>Data de aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acquisition_date</span>
                                </div>
                                </ifdef>
                                
                                <ifdef code="ca_objects.acqinfo.acqinfo_acquisition_details">
                                <div class="subatributo">
                                    <span>Detalhes da aquisição:</span>
                                    <span>^ca_objects.acqinfo.acqinfo_acquisition_details</span>
                                </div>
                                </ifdef>
                                
                            </div>
                        </div>
                        </ifdef>}}} 
						*/
            ?>

            {{{<ifdef code="ca_objects.city_country">
                        <div class="atributo">
                            <div class="label"><?= _t("Place of Production") ?></div>
                            <div class="valor">^ca_objects.city_country</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="production;subject">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Event (Documentary Production Context)") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifdef code="ca_objects.nat_representation">
                        <div class="atributo">
                            <div class="label"><?= _t("National Representation") ?></div>
                            <div class="valor">^ca_objects.nat_representation</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.content_description">
                        <div class="atributo">
                            <div class="label"><?= _t("Content Description") ?></div>
                            <div class="valor">^ca_objects.content_description</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.langmaterial.lang_material_lang">
                        <div class="atributo">
                            <div class="label"><?= _t("Language") ?></div>
                            <div class="valor">^ca_objects.langmaterial.lang_material_lang</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.existing_copies_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Number of Existing Document Units") ?></div>
                            <div class="valor">^ca_objects.existing_copies_number</div>
                        </div>
                        </ifdef>}}}

            {{{<ifcount code="ca_objects.related" min="1" restrictToRelationshipTypes="exemplar;copy">
                        <div class="atributo">
                            <div class="label"><?= _t("Registered Copies/Originals") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" restrictToRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_objects.related" min="1" restrictToTypes="file;documents;document_parts" excludeRelationshipTypes="exemplar;copy">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Documents") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_objects.related" delimiter="<br/>" excludeRelationshipTypes="exemplar;copy"><unit delimiter=" -> "><l>^ca_objects.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_list_items" min="1">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Controlled Vocabulary") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_list_items" delimiter="<br/>">^ca_list_items.preferred_labels</unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_entities" min="1" excludeRelationshipTypes="edition;creator;contributor;publisher">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Entities") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_entities" delimiter="<br/>" excludeRelationshipTypes="edition;creator;contributor;publisher"><l><b>^ca_entities.preferred_labels</b></l></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_objects.related" restrictToTypes="artworks" min="1">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Artwork") ?></div>
                            <div class="valor"><unit relativeTo="ca_objects.related" restrictToTypes="artworks" delimiter="<br/>"><unit delimiter=" -> "><l><b>^ca_objects.hierarchy.preferred_labels</b></l></unit></unit></div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" excludeRelationshipTypes="participation;production;subject">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Events") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" excludeRelationshipTypes="participation;production;subject"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_occurrences" min="1" restrictToRelationshipTypes="participation">
                        <div class="atributo">
                            <div class="label"><?= _t("Event Participation") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_occurrences" delimiter="<br/>" restrictToRelationshipTypes="participation"><unit delimiter=" -> "><l>^ca_occurrences.hierarchy.preferred_labels</l></unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifdef code="ca_objects.edition_month">
                        <div class="atributo">
                            <div class="label"><?= _t("Edition Month") ?></div>
                            <div class="valor">^ca_objects.edition_month</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.edition_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Edition Number") ?></div>
                            <div class="valor">^ca_objects.edition_number</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_volume">
                        <div class="atributo">
                            <div class="label"><?= _t("Tome / Volume") ?></div>
                            <div class="valor">^ca_objects.biblio_location_volume</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_cromia">
                        <div class="atributo">
                            <div class="label"><?= _t("Chromatics") ?></div>
                            <div class="valor">^ca_objects.tipo_cromia</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_polaridade">
                        <div class="atributo">
                            <div class="label"><?= _t("Polarity") ?></div>
                            <div class="valor">^ca_objects.tipo_polaridade</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.tipo_midia">
                        <div class="atributo">
                            <div class="label"><?= _t("Type of Media") ?></div>
                            <div class="valor">^ca_objects.tipo_midia</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.padrao_gravacao">
                        <div class="atributo">
                            <div class="label"><?= _t("Recording Standard") ?></div>
                            <div class="valor">^ca_objects.padrao_gravacao</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_type ">
                        <div class="atributo">
                            <div class="label"><?= _t("Type of Publication") ?></div>
                            <div class="valor">^ca_objects.biblio_location_type </div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_subject">
                        <div class="atributo">
                            <div class="label"><?= _t("Subject") ?></div>
                            <div class="valor">^ca_objects.biblio_location_subject</div>
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_objects.biblio_location_PHA">
                        <div class="atributo">
                            <div class="label"><?= _t("PHA Table") ?></div>
                            <div class="valor">^ca_objects.biblio_location_PHA</div>
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