<?php	
	header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22818412-4"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());    
          gtag('config', 'UA-22818412-4');
        </script>  
    
		<!-- geral -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
        <meta http-equiv="ScreenOrientation" content="autoRotate:enabled"> 
		
        <!-- title -->
        <title>Arquivo Bienal</title>
        
        <!-- properties -->
        <meta name="description" content="Created in 1962, the Fundação Bienal de São Paulo is one of the most important international institutions of contemporary art promotion, and its impact on the development of Brazilian visual arts is notably recognized.">
        <meta name="keywords" content="archive arquivo bienal art arte historico contemporary contemporanea">
        <meta name="author" content="Bienal São Paulo">
        <meta name="viewport" content="width=device-width">
        <meta property="og:title" content="Arquivo Bienal" />
        
        <!-- opengraph -->
        <meta property="og:url" content="<?php echo $this->request->getBaseUrlPath();?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Arquivo Bienal" />
        <meta property="og:image" content="xxxxxxxxx" />
        <meta property="og:image:url" content="xxxxxxxxxxxx" />
        <meta property="og:description" content="xxxxxxxxxxxxx" />
        <meta property="fb:admins" content="100013548511708"/>
        <meta property="fb:app_id" content="225058061294214"/>
        
        <!-- icons -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-touch-icon-57x57-precomposed.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="icons/apple-touch-icon-72x72-precomposed.png" />        
        <link rel="apple-touch-icon" sizes="114x114" href="icons/apple-touch-icon-114x114-precomposed.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="icons/apple-touch-icon-144x144-precomposed.png" />
        <link rel="icon" type="image/png" href="icons/favicon.ico">
        
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/css/main.css" />

        <!-- Accessibility -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/css/jbility.css" />
        <!-- jQuery selectBox -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/css/jquery.selectBox.css" />


    </head>
	
    <script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/js/jquery-2.2.2.min.js"></script>
    <script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/js/jquery-ui.min.js"></script>
    
    <!-- Accessibility -->
    <script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/js/jbility.js"></script>
    <!-- jQuery selectBox -->
    <script type="application/javascript" src="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/js/jquery.selectBox.js"></script>    
        
    <body>
        
        <header>
        
        	<div id="logo"><a href="<?php echo $this->request->getBaseUrlPath();?>"><img src="<?php echo $this->request->getBaseUrlPath();?>/themes/bienal/assets/graphics/logo.svg" /></a></div>
            
			<div id="titulo">Arquivo Bienal <strong>Banco de Dados</strong></div>
        
            <menu> 
            
                <ul>
					
					<li><?=caNavLink($this->request, "galerias" , "" , "" , "Gallery", "Index")?></li>
					
                    <li><?=caNavLink($this->request, "fundos e coleções" , "" , "" , "Detail", "documento/1")?></li>
                    <li <?php print ($this->request->getController() == "Browse") ? 'class="selecionado"' : ''; ?>>
                    	explorar
						<ul>
                        	<li><?=caNavLink($this->request, "documentos" , "" , "" , "Browse", "documentos")?></li>
                            <li><?=caNavLink($this->request, "obras" , "" , "" , "Browse", "obras")?></li>
                            <li><?=caNavLink($this->request, "entidades" , "" , "" , "Browse", "entidades")?></li>
                            <li><?=caNavLink($this->request, "eventos" , "" , "" , "Browse", "eventos")?></li>
                        </ul>
                    </li>
                    <li <?php print ($this->request->getController() == "Search") ? 'class="selecionado"' : ''; ?>>
                    	busca avançada
                        <ul>
                        	<li><?=caNavLink($this->request, "documentos" , "" , "" , "Search", "advanced/documentos")?></li>
                            <li><?=caNavLink($this->request, "obras" , "" , "" , "Search", "advanced/obras")?></li>
                            <li><?=caNavLink($this->request, "entidades" , "" , "" , "Search", "advanced/entidades")?></li>
                            <li><?=caNavLink($this->request, "eventos" , "" , "" , "Search", "advanced/eventos")?></li>
                        </ul>
					</li>
                </ul>
            
            </menu>
        
            <div id="busca">
                <form role="search" action="<?php print caNavUrl($this->request,'','MultiSearch','Index');?>">
                    <input type="text" placeholder="Buscar" name="search">
                    <button type="submit" class="fa fa-search"></button>
                </form>
            </div>
    
        </header>
        
        <main>