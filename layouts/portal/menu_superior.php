<nav class="navbar navbar-expand-md navbar-dark py-3 bg-primary">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto font-weight-bold">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#cursos">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#polos">Polos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#!" id="navbarDropdownMenuProgProj" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programas e Projetos</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuProgProj">
<?php
$menuPP = $this->ItensMenu('PP'); // programas e projetos
foreach($menuPP as $item){
	if($item['caminho']=='/'){
		$caminho = '#';
	}elseif(substr_count($item['caminho'],'http')>0){
		$caminho = $item['caminho'];
	}else{
		$caminho = base_url($item['caminho']);
	}
	if($item['target']!=''){
		$target = ' target="'.$item['target'].'" ';
	}else{
		$target = '';
	}
?>
						<a class="dropdown-item" href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
<?php
}
?>
					</div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#!" id="navbarDropdownMenuServicos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Serviços</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuServicos">
<?php
$menuSV = $this->ItensMenu('SV'); // serviços
foreach($menuSV as $item){
	if($item['caminho']=='/'){
		$caminho = '#';
	}elseif(substr_count($item['caminho'],'http')>0){
		$caminho = $item['caminho'];
	}else{
		$caminho = base_url($item['caminho']);
	}
	if($item['target']!=''){
		$target = ' target="'.$item['target'].'" ';
	}else{
		$target = '';
	}
?>
						<a class="dropdown-item" href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
<?php
}
?>
					</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?=base_url('noticias')?>">Not&iacute;cias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#suporte">Suporte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#fale-conosco">Fale Conosco</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#!" id="navbarDropdownMenuSobre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sobre</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuSobre">
<?php
$menuSB = $this->ItensMenu('SB'); // sobre
foreach($menuSB as $item){
	if($item['caminho']=='/'){
		$caminho = '#';
	}elseif(substr_count($item['caminho'],'http')>0){
		$caminho = $item['caminho'];
	}else{
		$caminho = base_url($item['caminho']);
	}
	if($item['target']!=''){
		$target = ' target="'.$item['target'].'" ';
	}else{
		$target = '';
	}
?>
						<a class="dropdown-item" href="<?=$caminho?>" <?=$target?>><?=($item['parent']!=0?'- ':'').$item['nome']?></a>
<?php
}
?>
					</div>
                </li>
            </ul>
			<!-- <a class="btn navbar-btn mr-4 text-white btn-secondary" href="login.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Entrar</a> -->
			<form class="form-inline m-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar">
                    <span class="input-group-btn">
                        <a class="btn btn-secondary" href="#buscar"><i class="fa fa-fw fa-search"></i></a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>