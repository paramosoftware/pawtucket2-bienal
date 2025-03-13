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

    main #itens .item a {
        text-decoration: none;
        color: var(--primary);
        &:hover {
            color: var(--secondary);
        }
    }

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

    main #links {
        vertical-align: top;
        display: flex;
        width: 100%;
        max-width: 100%;
        align-items: center;
        justify-content: space-evenly;
        gap: 40px;
        padding-inline: 40px;
        padding-bottom: 40px;
    }

    main #links a {
        font-family: "Helvetica Neue Roman";
        font-size: 18px;
        text-decoration: none;
        text-transform: uppercase;

        padding: 10px;
        border: 1px solid var(--primary);
        border-radius: 4px;
        color: var(--primary);
        width: 100%;

        display: inline flex;
        align-items: center;
        justify-content: center;
        vertical-align: top;
    }


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


<div id="links">
    <a href="/pawtucket/index.php/Browse/obras/facet/occurrences_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">obras</a>
    <a href="/pawtucket/index.php/Browse/documentos/facet/occurrences_production_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">documentos</a>
    <a href="/pawtucket/index.php/Browse/entidades/facet/participation_facet/id/<?= $t_object->getPrimaryKey() ?>/view/list">participações</a>
</div>

<div class="wrapper">

    <div id="descricao">

        <div id="atributos">

            {{{<ifdef code="ca_occurrences.nonpreferred_labels">
                        <div class="atributo">
                            <div class="label"><?= _t("Other Names") ?></div>
                            <div class="valor">
                            	^ca_occurrences.nonpreferred_labels
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.event_type">
                        <div class="atributo">
                            <div class="label"><?= _t("Type of Event") ?></div>
                            <div class="valor">
                            	<strong><?= _t("Type") ?>:</strong> ^ca_occurrences.event_type.event_type_value<br />
                                <strong><?= _t("Bienal Event") ?>:</strong> ^ca_occurrences.event_type.event_type_bienal
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.event_period">
                        <div class="atributo">
                            <div class="label"><?= _t("Event Date") ?></div>
                            <div class="valor">
                                <ifdef code="ca_occurrences.event_period.event_period_startdate"><strong><?= _t("Start Date") ?>:</strong> ^ca_occurrences.event_period.event_period_startdate<br /></ifdef>
                                <ifdef code="ca_occurrences.event_period.event_period_enddate"><strong><?= _t("End Date") ?>:</strong> ^ca_occurrences.event_period.event_period_enddate</ifdef>
                            </div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.participants_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Number of Participating Artists") ?></div>
                            <div class="valor">^ca_occurrences.participants_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.artworks_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Number of Works Exhibited") ?></div>
                            <div class="valor">^ca_occurrences.artworks_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{
                        <ifcount code="ca_places" min="1">
                        <div class="atributo">
                            <div class="label"><?= _t("Event Location") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_places" delimiter="<br/>" restrictToRelationshipTypes="site"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="realizacao">
                        <div class="atributo">
                            <div class="label"><?= _t("Executed By") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="realizacao"><b><l>^ca_entities.preferred_labels</l></b></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{
                        <ifcount code="ca_places" min="1">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Places") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.hierarchy.preferred_labels%delimiter=_->_</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifdef code="ca_occurrences.visitors_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Number of Visitor Attendees") ?></div>
                            <div class="valor">^ca_occurrences.visitors_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.countries_number">
                        <div class="atributo">
                            <div class="label"><?= _t("Number of Countries Represented") ?></div>
                            <div class="valor">^ca_occurrences.countries_number</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.cost">
                        <div class="atributo">
                            <div class="label"><?= _t("Cost") ?></div>
                            <div class="valor">^ca_occurrences.cost</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.note">
                        <div class="atributo">
                            <div class="label"><?= _t("Notes") ?></div>
                            <div class="valor">^ca_occurrences.note</div>                            
                        </div>
                        </ifdef>}}}

            {{{<ifdef code="ca_occurrences.art_form">
                        <div class="atributo">
                            <div class="label"><?= _t("Artistic Expression") ?></div>
                            <div class="valor">^ca_occurrences.art_form</div>                            
                        </div>
                        </ifdef>}}}

            {{{
                        <ifcount code="ca_entities" min="1" restrictToRelationshipTypes="patrocinio,apoio">
                        <div class="atributo">
                            <div class="label"><?= _t("Sponsors and Supporters") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_entities" delimiter="<br/>" restrictToRelationshipTypes="patrocinio,apoio"><l>^ca_entities.preferred_labels</l></unit>
                            </div>
                        </div>
                        </ifcount>
                        }}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Entities (Production Context)") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="curadoria;membro;arquivo;assistente;assessoria;cartaz;arquitetura;apoio;direcao;conselho;catalogo;comissario;comissao;colaboracao;consultor;gerencia;edicao;estagiario;"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit></unit>
                            </div>
                        </div>
                        </ifcount>}}}

            {{{<ifcount code="ca_entities" min="1" restrictToRelationshipTypes="representacao">
                        <div class="atributo">
                            <div class="label"><?= _t("National Representation") ?></div>
                            <div class="valor">
                                <unit relativeTo="ca_entities_x_occurrences" delimiter="<br>" restrictToRelationshipTypes="representacao"><b><l>^ca_entities.preferred_labels</l></b>: <unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_entityrole</unit> (<unit delimiter=", ">^ca_entities_x_occurrences.ocurrencexentity_repnacplace</unit>) </unit>
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

            {{{<ifcount code="ca_occurrences.related" min="1" restrictToRelationshipTypes="production">
                        <div class="atributo">
                            <div class="label"><?= _t("Related Event(s)") ?></div>
                            <div class="valor">
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

                    <div id="itens">
                      	
                        <unit relativeTo="ca_occurrences.children" delimiter=" ">
                        <div class="item">
                            <div class="col tipo">^ca_occurrences.type_id</div>
                            <div class="col titulo"><l>^ca_occurrences.preferred_labels</l></div>
                        </div>
                        </unit>
                        
                    </div>  
                    
                </div>

				<script>
                    $("#contagem .quantidade").html( $(".item").length + " " );
                </script>
                
                </ifcount>}}}

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