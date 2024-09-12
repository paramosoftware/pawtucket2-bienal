<style>

	#front_video {width:100%;display:block;position:relative;overflow:hidden;max-height:550px;background-color:#000;}
	#front_video .playback {width:100%;height:100%;}
	#front_busca {position: absolute;left: calc(50% + 75px);top: calc( 50% - 170px );max-width: 550px;width: 450px;}	
	#front_busca .rapida {font-size:0px;}
	#front_busca .rapida button {border:none;height: 50px;outline: none;	box-sizing: border-box;margin: 0;padding: 0;border-radius: 0px 6px 6px 0px;padding: 12px 20px 12px 20px;font-size: 20px;font-weight: 500;background-color: #2A779B;color: #fff;	}
	#front_busca .rapida input {padding:12px;font-size: 20px;border-radius: 6px 0px 0px 6px;border: none;outline: none;width: 300px;height: 50px;}
	#front_busca .rapida .titulo {color:#fff;font-size: 20px;margin-bottom: 10px;}
	#front_busca .avancada {font-size: 21px;margin-top: 10px;color: #f5f5f5;}
	#front_busca .avancada a {color:#09F;text-decoration:none;font-weight:500}
	#front_about {position:absolute;border:rgba(255,255,255,.4) solid 1px;padding:50px;width:calc( 50% - 220px );max-width:400px;left:110px;top:calc(50% - 270px);border-radius: 5px;}
	#front_about p {color:#fff;font-weight: 400;font-size: 15px;line-height: 20px;padding: 0px;margin: 0px 0px 0px 0px;}	
	#front_about .saibamais {text-decoration:none;padding:12px 15px 12px 15px;font-size:13px;color:#fff;border:rgba(255,255,255,.3)solid 1px;position:absolute;right:-1px;bottom:-1px;border-radius:5px 0px 0px 0px}
	#front_about .saibamais:hover {text-decoration:none}
	#front_servicos {width: 100%;position:relative;font-size:0px;max-width:1300px;margin:0 auto;padding:10px 0px}
	#front_servicos .coluna {font-size:14px;display:inline-block;width:calc(25% - 20px);margin:10px;vertical-align:top;font-size:0px;padding:30px;}
	#front_servicos p {display:inline-block;font-size:18px;line-height:19px;vertical-align: top;font-family: "Helvetica Bold";letter-spacing:.01em;color:#111;}
	#front_servicos p strong {color:#000;font-family:"Helvetica Medium"}
	#front_servicos p a {color:#09C;}
	#front_servicos ul {list-style:none;margin:0;font-family:"Helvetica Medium";padding:5px 0px;font-size:16px}
	#front_servicos ul a {color:#09C}
		
</style>


	<div id="front_video">
        <video class="playback" autoplay="autoplay" loop="loop" muted="true">
            <source src="http://imgs.fbsp.org.br/files/arquivo.webm" type="video/ogg">
        </video>
    </div>
    
    <div id="front_about">
        <p>O acervo do Arquivo Histórico Wanda Svevo é constituído por uma vasta documentação produzida e reunida pela Fundação Bienal de São Paulo, pelo Museu de Arte Moderna de São Paulo e por seu fundador, Francisco Matarazzo Sobrinho. Além desta documentação, encontram-se também disponíveis neste banco as informações das Bienais de Arte de São Paulo.</p> 
    	<a class="saibamais" href="<?php echo $this->request->getBaseUrlPath();?>/index.php/About/Index">saiba mais</a>
    </div>
    
    <div id="front_busca">
    	
        <div class="rapida">
        	<div class="titulo">faça uma busca rápida</div>
           	<form name="main_search" action="<?php echo $this->request->getBaseUrlPath();?>/index.php/MultiSearch/Index" method="get">
				<input type="text" name="search" onclick="jQuery(&quot;#mainQuickSearch&quot;).select();" id="mainQuickSearch">
                <button>buscar</button>
			</form>
        </div>
        
    </div>
    
    <div id="front_servicos">
    
    	<div class="coluna">
            <p><strong>Explore</strong> mais de 200 mil registros do Arquivo Bienal</p>
            <ul>
            	<li><a href="/pawtucket/index.php/Browse/documentos">Documentos</a></li>
                <li><a href="/pawtucket/index.php/Browse/obras">Obras</a></li>
                <li><a href="/pawtucket/index.php/Browse/entidades">Entidades</a></li>
                <li><a href="/pawtucket/index.php/Browse/eventos">Eventos</a></li>
            </ul>
		</div>
        <div class="coluna">
            <p>Veja mais de 5 mil <?=caNavLink($this->request, "imagens" , "" , "" , "Browse", "documentos/facet/has_media_facet/id/1/view/images")?></p>
		</div>
        <div class="coluna">
			<p>Faça uma <strong>busca rápida</strong> por mais de 200 mil registros.</p>
		</div>
        <div class="coluna">
            <p>Use a <strong>busca avançada</strong></p>
            <ul>
            	<li><a href="/pawtucket/index.php/Search/advanced/documentos">Documentos</a></li>
                <li><a href="/pawtucket/index.php/Search/advanced/obras">Obras</a></li>
                <li><a href="/pawtucket/index.php/Search/advanced/entidades">Entidades</a></li>
                <li><a href="/pawtucket/index.php/Search/advanced/eventos">Eventos</a></li>
            </ul>
		</div>
    
    </div>