<?php
$item = $this->getVar("item");
$exportacao_formatos = $this->getVar('export_formats');
$acao = $this->request->getAction();

$page = $this->getVar("page");
if (!$page)
    $page = 1;

$vb_exibir_imagem = true;
?>

<style>
    .sec-header,
    .sec-list,
    .sec-footer {
        padding-inline: 40px;
    }
</style>

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
    <span>
        Home / <b><?= _t("Funds and Collections") ?></b>
    </span>

    <hr />

    <div>
        <h1><?= _t("Funds and Collections") ?></h1>
    </div>

    <div>
        <span><b><?= $vn_numero_itens . ($vn_numero_itens != 1 ? " " . _t("Records") . " " : " " . _t("Record") . " ") ?></b> <?= _t("at this level") ?></span>
    </div>
</div>

<ul class="sec-list collection-list">
    <?php while ($qr_result->nextRow())
    {
        $vo_object = new ca_objects($qr_result->get('ca_objects.object_id'));
    ?>
        <li class="sec-list-item">
            <div class="sec-li-info-div">
                <h2><?= $qr_result->get('ca_object_labels.name') ?></h2>

                <p><?= $vo_object->get("ca_objects.scopecontent"); ?></p>

                <div>
                    <span><?= $qr_result->get('ca_list_item_labels.name_singular') ?></span>
                    <a href="<?= $this->request->getBaseUrlPath() . '/index.php/Detail/documento/' . $qr_result->get('ca_objects.object_id') ?>">Explore</a>
                </div>
            </div>
        </li>
    <?php 
    } 
    ?>
</ul>


<div id="caMediaPanel">
    <div id="caMediaPanelContentArea"></div>
</div>

<script type="text/javascript">
    var caMediaPanel;
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
            <a href="#"><img src="<?= $this->request->getBaseUrlPath() ?>/themes/bienal-layout-novo/assets/svg/whatsapp.svg" alt="logo whatsapp" /></a>
        </li>
    </ul>
</div>