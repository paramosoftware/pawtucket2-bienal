			<style>
				
				main {font-size:0px;display:flex;flex-flow:row wrap;padding:20px;justify-content:center;}
				main #titulo {padding:0px 10px;font-family:"Helvetica Roman";font-size:38px;text-transform:uppercase;color:#333;width:100%;margin-bottom:10px}
				main #titulo i {font-style:normal;font-family:"Helvetica Heavy";}
				main .coluna {padding:30px;vertical-align:top;font-size:12px;position:relative;flex-basis:calc(25% - 20px);flex-grow:2;border:#aaa solid 1px;margin:10px;border-radius:4px;max-width:50%}
				main .coluna .cabecalho {font-family:"Helvetica Roman";font-size:23px;color:#333;margin-bottom:20px}
				main .coluna .cabecalho i {font-style:normal;font-family:"Helvetica Medium";font-size:13px;padding:7px 11px;border-radius:4px;background-color:#222;color:#ddd;position:absolute;top:10px;right:10px}
				main .coluna .itens {}
				main .coluna .itens .item {border-bottom:#aaa dashed 1px;padding:7px 0px;font-family:"Helvetica Roman";font-size:13px;color:#09C}
				main .coluna .itens .item a {color:inherit}
				main .coluna .itens .item p {font-family:"Helvetica Bold";font-size:11px;color:#555;margin:0;padding:0;}
				main .coluna > a {text-align:center;display:block;border-radius:4px;padding:11px 15px;font-family:"Helvetica Roman";font-size:13px;background-color:#09c;color:#fff;margin-top:20px}
				
				@media screen and (max-width:680px) {
				}
			
				@media screen and (max-width:780px) {
					main .coluna {flex-basis:calc(100% - 20px) !important;flex-grow:2;}			
				}
				
				@media screen and (max-width:880px) {
				}
				
				@media screen and (max-width:980px) {
					main .coluna {flex-basis:calc(50% - 20px);flex-grow:2;}
				}
				
				@media screen and (max-width:1080px) {	
				}
				
				@media screen and (max-width:1180px) {
				}
				
				@media screen and (max-width:1280px) {
				}
				
				@media screen and (max-width:1380px) {
				}	
				
				@media screen and (min-width:1480px) {
				}
				
			</style>


			<?php            
            $results = $this->getVar('results');            
            ?>

            <div id="titulo">
            	resultado para pesquisa de <i><?php print caUcFirstUTF8Safe( $this->getVar('searchForDisplay') )?></i>
            </div>
            
			<?php
			foreach($this->getVar('blockNames') as $block) {
			?>
				
				<?php print $results[$block]['html']; ?>
	
			<?php			
			} 		
			
			?>
			</div>