<style>
	header {
		height: 70px;
		background-color: #111;
		width: 100%;
		transition: all ease .25s;
		position: fixed;
		top: 0;
		z-index: 4;
		border-bottom: rgba(255, 255, 255, .1) solid 1px
	}

	main {
		background-color: #111;
		height: auto;
	}


	@media screen and (max-width:680px) {}

	@media screen and (max-width:780px) {}

	@media screen and (max-width:880px) {
		header {
			height: 200px;
			background-color: #111;
			width: 100%;
			transition: all ease .25s;
			position: fixed;
			top: 0;
			z-index: 4;
			border-bottom: rgba(255, 255, 255, .1) solid 1px;
		}
	}

	@media screen and (max-width:980px) {}

	@media screen and (max-width:1080px) {}

	@media screen and (max-width:1180px) {}

	@media screen and (max-width:1280px) {}

	@media screen and (max-width:1380px) {}

	@media screen and (min-width:1480px) {}

	main {}

	.linkinterno {
		display: inline-block;
		position: relative;
		box-sizing: border-box
	}

	.linkinterno:hover:after {
		display: block;
		box-sizing: border-box;
		position: absolute;
		top: calc(-100% - 40px);
		left: calc(100% - 50px);
		height: 40px;
		line-height: 38px;
		content: "você será redirecionado";
		background-color: var(--bienal_primary);
		color: var(--bienal_tertiary);
		padding: 0px 11px;
		width: 200px;
		font-family: "Helvetica Roman" !important;
		font-size: 14px;
	}

	.linkinterno:hover:before {
		top: -100%;
		left: calc(100% - 25px);
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(194, 225, 245, 0);
		border-top-color: var(--bienal_primary);
		border-width: 10px;
		margin-left: -10px;
	}

	section {
		background-color: var(--bienal_secondary);
		width: 100%;
		padding: 0px;
		margin: 0;
		display: block;
		position: relative;
		overflow: hidden
	}

	section:nth-child(even) {
		background-color: #111
	}

	section p {
		margin: 0;
		padding: 0
	}

	section a {
		border-bottom: var(--bienal_primary) solid 4px;
		cursor: pointer
	}

	section a:hover {
		background-color: var(--bienal_primary);
		color: var(--bienal_tertiary) !important;
	}

	section h1,
	section h2 {
		text-transform: uppercase;
		font-family: "Helvetica Heavy" !important;
		font-weight: normal;
		margin: 0;
		padding: 0
	}

	.col-xs-12 {
		padding-inline: 0 !important;
	}

	#introducao {
		position: relative;
		background-color: var(--bienal_primary);
	}

	#introducao .board {
		padding: 80px 50px;
		max-width: 1000px;
		margin: 0 auto
	}

	#introducao h1 {
		color: var(--bienal_tertiary);
		text-transform: uppercase;
		font-size: 50px;
		margin-bottom: 50px;
		line-height: 48px;
		letter-spacing: -.025em;
	}

	#introducao h2 {
		color: var(--bienal_tertiary);
		text-transform: uppercase;
		font-size: 20px;
		letter-spacing: -.025em;
		text-align: center;
		padding: 0;
		margin: 0;
		margin-bottom: 10px
	}

	#introducao p {
		color: var(--bienal_tertiary);
		font-family: "Helvetica Medium";
		font-size: 16px;
		line-height: 22px;
		padding: 15px 50px 15px 0px;
		text-align: left;
		margin: 0 auto;
		margin-top: 5px;
		display: block;
	}

	#introducao .busca {
		position: relative;
		border: var(--bienal_tertiary) dashed 1px;
		padding: 15px 10px;
		border-radius: 4px;
		width: 100%;
		text-align: center;
		margin: 0 auto
	}

	#introducao .busca input {
		width: 100%;
		border-radius: 3px;
		background-color: transparent;
		color: var(--bienal_tertiary);
		font-size: 20px;
		border: none;
		outline: none;
		padding: 2px 0px;
	}

	#introducao .busca form button {
		position: absolute;
		right: 12px;
		top: 10px;
		border: none;
		outline: none;
		background: none;
		cursor: pointer
	}

	#introducao .busca form button:before {
		content: "\f002";
		font-family: "FontAwesome";
		color: var(--bienal_tertiary);
		font-size: 32px;
	}

	#introducao .busca .titulo {
		color: #09c;
		font-family: "Helvetica Heavy";
		margin: 0;
		padding: 0;
		font-size: 14px;
		letter-spacing: -0.02em;
		text-transform: uppercase;
		margin-bottom: 5px
	}

	#itens {
		font-size: 0px;
	}

	#itens .board {
		padding: 50px;
		max-width: 1000px;
		margin: 0 auto
	}

	#itens .box {
		display: inline-block;
		font-size: 12px;
		color: var(--bienal_tertiary);
		vertical-align: top;
		width: 25%;
		padding-right: 30px
	}

	#itens h1 {
		font-size: 22px;
		margin-bottom: 10px
	}

	#itens a {
		margin-top: 9px;
		width: 100%;
		display: inline-block !important;
		font-family: "Helvetica Heavy";
		font-size: 15px;
		text-transform: uppercase;
		color: var(--bienal_primary);
		padding-bottom: 2px
	}

	#itens p {
		margin-top: 15px;
		font-size: 14px;
		line-height: 18px;
		font-family: "Helvetica Roman" !important;
	}

	#ferramentas {
		font-size: 0px
	}

	#ferramentas a {
		color: var(--bienal_tertiary);
	}

	#ferramentas .box {
		color: var(--bienal_tertiary);
		display: inline-block;
		vertical-align: top;
		width: 50%;
		background-color: #111;
		font-size: 12px;
		text-align: left;
		height: 190px
	}

	#ferramentas .box.a {
		background-color: var(--bienal_secondary2);
		text-align: right;
	}

	#ferramentas .box.b {
		background-color: var(--bienal_secondary3);
		text-align: left;
	}

	#ferramentas .box.c {
		background-color: #222;
		text-align: right;
	}

	#ferramentas .box.d {
		background-color: #272727;
		text-align: left;
	}

	#ferramentas .box .content {
		width: 100%;
		max-width: 500px;
		display: inline-block;
		vertical-align: top;
		padding: 40px 40px 40px 45px !important;
		text-align: left;
		margin: 0;
	}

	#ferramentas .box .content h1 {
		font-family: "Helvetica Heavy";
		margin: 0;
		padding: 0;
		font-size: 23px;
		letter-spacing: -0.03em;
		line-height: 20px;
		margin-bottom: 5px
	}

	#ferramentas .box .content h1:before {
		content: "\f1c0";
		color: inherit;
		font-family: "FontAwesome";
		font-size: 18px;
		vertical-align: top;
		padding-right: 7px
	}

	#ferramentas .box .content p {
		font-family: "Helvetica Roman" !important;
		font-size: 14px;
		width: 80%;
		margin-top: 20px
	}
</style>


<section id="introducao">

	<div class="board">

		<h1>Consulte informações sobre o acervo documental e as Bienais de São Paulo.</h1>

		<h2>Faça uma busca rápida</h2>

		<div class="busca">
			<form action="/pawtucket/index.php/MultiSearch/Index" method="get">
				<input name="search" />
				<button></button>
			</form>
		</div>

		<p>Busca ampla em qualquer campo, recupera todos os termos indicados individualmente. Para refinar sua pesquisa utilize a <strong>busca avançada</strong></p>

	</div>

</section>

<section id="itens">

	<div class="board">

		<div class="box">
			<h1>DOCUMENTOS</h1>

			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Search/advanced/documentos">busca avançada</a>
			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Browse/documentos">explore</a>

			<p>Registros de conjuntos ou itens documentais, organizados em fundos ou coleções</p>
		</div>

		<div class="box">
			<h1>OBRAS</h1>

			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Search/advanced/obras">busca avançada</a>
			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Browse/obras">explore</a>

			<p>Informações sobre as obras e suas participações nas Bienais</p>
		</div>

		<div class="box">
			<h1>ENTIDADES</h1>

			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Search/advanced/entidades">busca avançada</a>
			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Browse/entidades">explore</a>

			<p>Dados sobre pessoas e instituições, suas relações com a documentação ou eventos cadastrados</p>
		</div>

		<div class="box">
			<h1>EVENTOS</h1>

			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Search/advanced/eventos">busca avançada</a>
			<a href="<?=$this->request->getBaseUrlPath()?>/index.php/Browse/eventos">explore</a>

			<p>Informações sobre eventos realizados pela Fundação Bienal e outros relacionados à documentação</p>
		</div>

	</div>

</section>

<section id="ferramentas">

	<div class="box a">

		<div class="content">
			<a href="/pawtucket/index.php/Detail/documento/1">
				<h1>FUNDOS E COLEÇÕES</h1>
				<p>Explore mais de 200 mil registros do Arquivo Bienal</p>
			</a>
		</div>

	</div>

	<div class="box b">

		<div class="content">
			<a href="/pawtucket/index.php/Gallery/Index">
				<h1>GALERIAS</h1>
				<p>Explore registros fotográficos de obras e eventos ou reproduções digitais da documentação</p>
			</a>
		</div>

	</div>

</section>