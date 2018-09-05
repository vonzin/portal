<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-31 08:56:07 --> Severity: Error --> Call to undefined function ENtoPTBR() /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 08:56:34 --> Severity: Error --> Call to undefined method MY_Loader::ENtoPTBR() /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 08:57:50 --> Severity: Error --> Call to undefined function ENtoPTBR() /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 08:58:38 --> Severity: Error --> Call to undefined function ENtoPTBR() /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 09:01:46 --> Severity: Notice --> Undefined property: CI::$Funcoes /dados/sites/www/site2018/app/third_party/MX/Controller.php 59
ERROR - 2018-07-31 09:01:46 --> Severity: Error --> Call to a member function ENtoPTBR() on null /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 09:02:00 --> Severity: Notice --> Undefined variable: Funcoes /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 09:02:00 --> Severity: Error --> Call to a member function ENtoPTBR() on null /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 09:02:14 --> Severity: Error --> Call to undefined method MY_Loader::ENtoPTBR() /dados/sites/www/site2018/layouts/portal/noticias.php 61
ERROR - 2018-07-31 10:38:29 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/noticia.php 104
ERROR - 2018-07-31 10:40:42 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/noticia.php 96
ERROR - 2018-07-31 13:13:11 --> 404 Page Not Found: /index
ERROR - 2018-07-31 13:13:36 --> 404 Page Not Found: ../modules/portal/controllers/Noticias/2
ERROR - 2018-07-31 13:13:58 --> 404 Page Not Found: ../modules/portal/controllers/Noticias/2
ERROR - 2018-07-31 13:18:42 --> Severity: Warning --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-07-31 13:18:42 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT "noticias".*, TO_CHAR(post_data, 'YYYY-MM-DD HH:MI:SS') AS post_data, "c"."nome" AS "categoria"
FROM "portal2018"."noticias"
LEFT JOIN "portal2018"."noticia_categoria" "nc" ON "nc"."id_noticia"="noticias"."id_post"
INNER JOIN "portal2018"."categorias" "c" ON "c"."id_categoria"="nc"."id_categoria"
WHERE "noticias"."post_status" = 'true'
AND "noticias"."post_publicado" = 'true'
ORDER BY "noticias"."post_programado" DESC
 LIMIT 5 OFFSET -5
ERROR - 2018-07-31 13:21:40 --> 404 Page Not Found: /index
ERROR - 2018-07-31 15:11:30 --> Severity: Parsing Error --> syntax error, unexpected '?>' /dados/sites/www/site2018/layouts/portal/noticias.php 79
ERROR - 2018-07-31 15:12:19 --> Severity: Parsing Error --> syntax error, unexpected '?>' /dados/sites/www/site2018/layouts/portal/noticias.php 79
ERROR - 2018-07-31 15:21:24 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:22:07 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:22:39 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:23:04 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:23:09 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:23:19 --> Severity: Notice --> Undefined index: pagina_atual /dados/sites/www/site2018/layouts/portal/noticias.php 82
ERROR - 2018-07-31 15:54:49 --> Severity: Warning --> Invalid argument supplied for foreach() /dados/sites/www/site2018/layouts/portal/noticias.php 76
ERROR - 2018-07-31 15:55:13 --> Severity: Notice --> Undefined variable: link /dados/sites/www/site2018/layouts/portal/noticias.php 76
ERROR - 2018-07-31 15:55:13 --> Severity: Warning --> Invalid argument supplied for foreach() /dados/sites/www/site2018/layouts/portal/noticias.php 77
ERROR - 2018-07-31 15:55:23 --> Severity: Warning --> Invalid argument supplied for foreach() /dados/sites/www/site2018/layouts/portal/noticias.php 77
ERROR - 2018-07-31 16:00:26 --> Severity: Notice --> Undefined variable: config /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 22
ERROR - 2018-07-31 16:00:38 --> Severity: Error --> Cannot use object of type MX_Config as array /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 22
ERROR - 2018-07-31 16:05:40 --> Severity: Error --> Cannot use object of type MX_Config as array /dados/sites/www/site2018/app/modules/portal/models/Noticiasbd.php 5
ERROR - 2018-07-31 16:06:16 --> Severity: Notice --> Undefined property: MX_Config::$paginacao_por_pagina /dados/sites/www/site2018/app/modules/portal/models/Noticiasbd.php 5
ERROR - 2018-07-31 16:15:10 --> Severity: Error --> Call to undefined method Noticias::paginacao() /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 51
