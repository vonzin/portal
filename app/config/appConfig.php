<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Dados que estarão contidos no head página 
$metadata['robots']      = '';
$metadata['author']      = 'Nutead GTI';
$metadata['description'] = '';
$metadata['keywords']    = '';

// Menu do sistema
// O primeiro indice é a restrição do modulo, o segundo de controller e o terceiro de método.
// Três niveis de menu apenas
// Exemplo $menu['pai/modulo']['filho/controller']['neto/metodo'] = ['nome', 'icone', 'caminho']

$menu['cursos']                      = ['nome' => 'Cursos', 'icone' => 'fa fa-bars'];
$menu['cursos']['graduacao']         = ['nome' => 'Graduacao', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/graduacao'];
$menu['cursos']['graduacao']['info'] = ['nome' => 'Informática', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/graduacao/info'];
$menu['cursos']['extensao']          = ['nome' => 'Extensão', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/pos'];
$menu['cursos']['pos']               = ['nome' => 'Pós-Graduação', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/pos'];
$menu['cursos']['pos']['gestao']     = ['nome' => 'Gestão', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/pos/gestao'];

$menu['suporte']                      = ['nome' => 'Suporte', 'icone' => 'fa fa-bars'];
$menu['suporte']['graduacao']         = ['nome' => 'Graduacao', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/graduacao'];
$menu['suporte']['graduacao']['info'] = ['nome' => 'Informática', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/graduacao/info'];
$menu['suporte']['pos']               = ['nome' => 'Pós-Graduação', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/pos'];
$menu['suporte']['pos']['gestao']     = ['nome' => 'Gestão', 'icone' => 'fa fa-bars', 'caminho' => 'cursos/pos/gestao'];

// Restrição de Páginas
// Especifico por grupo de usuários, serve para a criação do menu de usuario
// Paginas fora deste array não terão restrição de usuário, exceto as que pedirem login de administrador do sistema.
// SOMENTE O CONTROLADOR DO ADMIN É TODO BLOQUEADO, OS DEMAIS É NECESSARIO COLOCAR SOMENTE A FUNCAO COMO O EXEMPLO ABAIXO
// ENVIAR MATERIAL É UMA FUNCAO DO MODULO "cursos"
// $restricao['cursos']['enviarMaterial'] = ['Professor'];

$restricao['cursos']                      = ['admin'];
$restricao['cursos']['graduacao']         = ['admin'];
$restricao['cursos']['graduacao']['info'] = ['admin'];
$restricao['cursos']['extensao']          = ['admin'];
$restricao['cursos']['pos']               = ['admin'];
$restricao['cursos']['pos']['gestao']     = ['admin'];

$restricao['suporte']                      = ['admin'];
$restricao['suporte']['graduacao']         = ['admin'];
$restricao['suporte']['graduacao']['info'] = ['admin'];



//
$config['appConfig'] = [
    'metaData'  => $metadata,
    'menu'      => $menu,
    'restricao' => $restricao,
    'email'     => [
        'email_de'        => 'naoresponder@ead.uepg.br',
        'nome_de'         => 'NUTEAD',
        'prefixo_assunto' => '[NUTEAD] ',
        'desenvolvimento' => true,
    ],
];
