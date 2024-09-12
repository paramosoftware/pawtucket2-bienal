<style>
	.container {margin:0 auto;max-width:1300px;display:flex;flex-flow:row wrap;width:100%}
    main {font-size:0px;display:flex;flex-flow:row wrap;}			
	
	main #titulo {padding:20px 30px;font-family:"Helvetica Heavy";font-size:38px;text-transform:uppercase;color:#333;width:100%;padding-right:20%;position:relative;line-height:38px;border-bottom:#555 dashed 1px;}
	main #titulo i {font-style:normal;font-family:"Helvetica Roman";}
	main #titulo .idno {border:#aaa solid 1px;background-color:#fff;color:#555;font-size:10px;padding:5px 9px;font-family:"Helvetica Medium";text-transform:uppercase;border-radius:4px;position:absolute;top:15px;right:15px;line-height:normal}
	
	main #descricao {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
    main #descricao .aviso {text-align: center;font-size: 22px;margin: 100px;border-radius: 6px;padding: 30px 50px;background-color: #ddd;font-family:"Helvetica Medium";}
				
	main #atributos {border:#aaa solid 1px;border-radius:5px}
	main #atributos .atributo {width:100%;font-size:0px;border-bottom:#555 dashed 1px;text-align: right;}
	main #atributos .atributo .label {font-family:"Helvetica Bold";display:inline-block;width:200px;vertical-align:top;font-size:14px;text-align:right;padding:11px;color:#555}
	main #atributos .atributo .valor {font-family:"Helvetica Roman";display:inline-block;width:calc(100% - 200px);vertical-align:top;font-size:14px;padding:11px;text-align: left;}
	main #atributos .atributo:last-child {border:none}							
	main #atributos .atributo .subatributo {}
	main #atributos .atributo .subatributo span:nth-child(2) {font-family:"Helvetica Roman";}
	main #atributos .atributo .subatributo span:nth-child(1) {font-family:"Helvetica Bold";}
				
	main #conteudo {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:50%;flex-grow:2;}
	
	main #contagem {padding:20px 10px;font-family:"Helvetica Bold";font-size:13px;color:#222;border:#bbb solid 1px;border-bottom:#555 dashed 1px;border-radius:5px 5px 0px 0px}
    main #contagem strong {color:#09c}
				
	main #itens {border:#aaa solid 1px;border-top:none;border-radius:0px 0px 5px 5px}
	main #itens .item {font-family:"Helvetica Roman";border-bottom:#777 dashed 1px;font-size:0px;}
	main #itens .item:last-child {border:none}			
	main #itens .item .col {padding:20px 10px;display:inline-block;font-size:13px;vertical-align:top;border-left:#bbb dashed 1px}
	main #itens .item .col:last-child {border:none}
	main #itens .item .col:first-child {border:none}	
	main #itens .item .col.tipo {width:20%;color:#111}
	main #itens .item .col.titulo {width:80%;color:#333}
	main #itens .item .col.descricao {width:60%;color:#555}
</style>



	<div id="titulo">
		<i>Galerias</i>
	</div>
	
<?php
	$va_sets = $this->getVar("sets");
	$va_first_items_from_set = $this->getVar("first_items_from_sets");
	
	if(is_array($va_sets) && sizeof($va_sets))
	{
		# --- main area with info about selected set loaded via Ajax
?>
		<div class="container">

				<div class='col-sm-8'>
					<div id="gallerySetInfo">
						
					</div><!-- end gallerySetInfo -->
				</div><!-- end col -->
<?php
				if(sizeof($va_sets) > 1)
				{
				?>
					<div id="descricao">
						<div id="contagem">
							<strong><?php print count($va_sets) . " galerias disponíveis"; ?></strong>
						</div>
					
						<div id="itens">
							<?php foreach($va_sets as $vn_set_id => $va_set)
							{
							?>
								<div class="item">
									<a href="<?php print caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id)); ?>">
										<div class="col titulo"><?php print $va_set["name"]; ?></div>										
										<div class="col tipo"><?php print $va_set["item_count"] . (($va_set["item_count"] == 1) ? " item" : " itens"); ?></div>;
									</a>
								</div>
							<?php
							}
							?>
						</div>
					</div>
					
					<?php if (false)
					{
					?>
					<div class='col-sm-4'>
						<div class="jcarousel-wrapper">
							<!-- Carousel -->
							<div class="jcarousel"><ul>
	<?php
								$i = 0;
								foreach($va_sets as $vn_set_id => $va_set)
								{
									if(!$vn_first_set_id){
										$vn_first_set_id = $vn_set_id;
									}
									if($i == 0){
										print "<li>";
									}
									$va_first_item = array_shift($va_first_items_from_set[$vn_set_id]);
									print "<div class='galleryItem'>
												<a href='#' onclick='jQuery(\"#gallerySetInfo\").load(\"".caNavUrl($this->request, '', 'Gallery', 'getSetInfo', array('set_id' => $vn_set_id))."\"); return false;'>
													<div class='galleryItemImg'>".$va_first_item["representation_tag"]."</div>
													<h5>".$va_set["name"]."</h5>
													<p><small class='uppercase'>".$va_set["item_count"]." ".(($va_set["item_count"] == 1) ? _t("item") : _t("items"))."</small></p>
												</a>
												<div style='clear:both;'><!-- empty --></div>
											</div>\n";
									$i++;
									if($i == 4){
										print "</li>";
										$i = 0;
									}
								}
								if($i){
									print "</li>";
								}
	?>
							</ul></div><!-- end jcarousel -->
	<?php
							if(sizeof($va_sets) > 4)
							{
	?>
								<!-- Prev/next controls -->
								<a href="#" class="galleryPrevious"><i class="fa fa-angle-left"></i></a>
								<a href="#" class="galleryNext"><i class="fa fa-angle-right"></i></a>
	<?php
							}
	?>
						</div><!-- end jcarousel-wrapper -->
						<script type='text/javascript'>
							jQuery(document).ready(function() {		
								/* width of li */
								$('.jcarousel li').width($('.jcarousel').width());
								$( window ).resize(function() { $('.jcarousel li').width($('.jcarousel').width()); });
								/*
								Carousel initialization
								*/
								$('.jcarousel')
									.jcarousel({
										// Options go here
									});
						
								/*
								 Prev control initialization
								 */
								$('.galleryPrevious')
									.on('jcarouselcontrol:active', function() {
										$(this).removeClass('inactive');
									})
									.on('jcarouselcontrol:inactive', function() {
										$(this).addClass('inactive');
									})
									.jcarouselControl({
										// Options go here
										target: '-=1'
									});
						
								/*
								 Next control initialization
								 */
								$('.galleryNext')
									.on('jcarouselcontrol:active', function() {
										$(this).removeClass('inactive');
									})
									.on('jcarouselcontrol:inactive', function() {
										$(this).addClass('inactive');
									})
									.jcarouselControl({
										// Options go here
										target: '+=1'
									});
									
								
							});
						</script>
					</div><!-- end col -->
					<?php
					}
					?>
				<?php
				}
				else
				{
					$va_first_set = array_shift($va_sets);
					$vn_first_set_id = $va_first_set["set_id"];
				}
				?>
		</div><!-- end container -->
		
		<?php if (false)
		{
		?>
		<script type='text/javascript'>
			jQuery(document).ready(function() {		
				jQuery("#gallerySetInfo").load("<?php print caNavUrl($this->request, '*', 'Gallery', 'getSetInfo', array('set_id' => $vn_first_set_id)); ?>");
			});
		</script>
		<?php
		}
		?>
<?php
	}
?>
