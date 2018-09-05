<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-08-02 09:22:30 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/institucional
ERROR - 2018-08-02 09:22:35 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/institucional
ERROR - 2018-08-02 09:23:25 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/index
ERROR - 2018-08-02 09:23:26 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/index
ERROR - 2018-08-02 09:23:30 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/index
ERROR - 2018-08-02 09:30:25 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/index
ERROR - 2018-08-02 09:30:29 --> 404 Page Not Found: ../modules/portal/controllers/Paginas/index
ERROR - 2018-08-02 09:31:36 --> 404 Page Not Found: /index
ERROR - 2018-08-02 09:36:46 --> 404 Page Not Found: /index
ERROR - 2018-08-02 09:52:45 --> Severity: error --> Exception: Unable to locate the model you have specified: Paginasbd /dados/sites/www/apl/codeigniter/core/Loader.php 314
ERROR - 2018-08-02 09:52:57 --> Severity: error --> Exception: Unable to locate the model you have specified: Paginasbd /dados/sites/www/apl/codeigniter/core/Loader.php 314
ERROR - 2018-08-02 09:54:42 --> Severity: error --> Exception: Unable to locate the model you have specified: Paginasbd /dados/sites/www/apl/codeigniter/core/Loader.php 314
ERROR - 2018-08-02 09:56:57 --> Severity: error --> Exception: Unable to locate the model you have specified: Paginasbd /dados/sites/www/apl/codeigniter/core/Loader.php 314
ERROR - 2018-08-02 09:59:31 --> Severity: Error --> Call to a member function row() on array /dados/sites/www/site2018/app/modules/portal/models/Paginasbd.php 10
ERROR - 2018-08-02 10:05:45 --> Severity: Notice --> Undefined variable: noticia /dados/sites/www/site2018/layouts/portal/pagina.php 31
ERROR - 2018-08-02 10:05:45 --> Severity: Notice --> Undefined variable: noticia /dados/sites/www/site2018/layouts/portal/pagina.php 32
ERROR - 2018-08-02 10:05:45 --> Severity: Notice --> Undefined variable: noticia /dados/sites/www/site2018/layouts/portal/pagina.php 53
ERROR - 2018-08-02 10:05:45 --> Severity: Notice --> Undefined variable: noticia /dados/sites/www/site2018/layouts/portal/pagina.php 64
ERROR - 2018-08-02 10:05:45 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/pagina.php 65
ERROR - 2018-08-02 10:09:46 --> Severity: Notice --> Undefined variable: anterior /dados/sites/www/site2018/layouts/portal/pagina.php 91
ERROR - 2018-08-02 10:09:46 --> Severity: Notice --> Undefined variable: anterior /dados/sites/www/site2018/layouts/portal/pagina.php 91
ERROR - 2018-08-02 10:09:46 --> Severity: Notice --> Undefined variable: proxima /dados/sites/www/site2018/layouts/portal/pagina.php 99
ERROR - 2018-08-02 10:09:46 --> Severity: Notice --> Undefined variable: proxima /dados/sites/www/site2018/layouts/portal/pagina.php 99
ERROR - 2018-08-02 10:22:09 --> Severity: Warning --> Illegal string offset 'id_pagina' /dados/sites/www/site2018/app/modules/portal/models/Paginasbd.php 16
ERROR - 2018-08-02 10:22:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  invalid input syntax for integer: &quot;i&quot;
LINE 4: AND &quot;post_parent&quot; = 'i'
                            ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-02 10:22:09 --> Query error: ERROR:  invalid input syntax for integer: "i"
LINE 4: AND "post_parent" = 'i'
                            ^ - Invalid query: SELECT *
FROM "portal2018"."paginas"
WHERE "post_url" IS NULL
AND "post_parent" = 'i'
AND 1=1 /* Paginasbd->pagina */
ERROR - 2018-08-02 10:24:26 --> Severity: Warning --> Illegal string offset 'id_pagina' /dados/sites/www/site2018/app/modules/portal/models/Paginasbd.php 5
ERROR - 2018-08-02 10:24:26 --> Severity: Warning --> Illegal string offset 'id_pagina' /dados/sites/www/site2018/app/modules/portal/models/Paginasbd.php 17
ERROR - 2018-08-02 10:27:01 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/pagina.php 64
ERROR - 2018-08-02 10:32:18 --> Severity: Notice --> Array to string conversion /dados/sites/www/apl/codeigniter/database/DB_query_builder.php 662
ERROR - 2018-08-02 10:32:18 --> Severity: Warning --> pg_query(): Query failed: ERROR:  column &quot;Array&quot; does not exist
LINE 3: WHERE &quot;post_url&quot; = &quot;Array&quot;
                           ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-02 10:32:18 --> Query error: ERROR:  column "Array" does not exist
LINE 3: WHERE "post_url" = "Array"
                           ^ - Invalid query: SELECT *
FROM "portal2018"."paginas"
WHERE "post_url" = "Array"
AND 1=1 /* Paginasbd->pagina traz dados pai */
ERROR - 2018-08-02 15:09:48 --> Severity: Notice --> Undefined property: CI::$shortcodes /dados/sites/www/site2018/app/third_party/MX/Controller.php 59
ERROR - 2018-08-02 15:09:48 --> Severity: Error --> Call to a member function do_shortcode() on null /dados/sites/www/site2018/app/modules/portal/controllers/Paginas.php 22
ERROR - 2018-08-02 15:32:36 --> Severity: Notice --> Undefined index: post_programado /dados/sites/www/site2018/layouts/portal/pagina.php 31
ERROR - 2018-08-02 15:32:36 --> Severity: Notice --> Undefined index: imagem_destaque /dados/sites/www/site2018/layouts/portal/pagina.php 32
ERROR - 2018-08-02 15:32:36 --> Severity: Notice --> Undefined index: post_pai /dados/sites/www/site2018/layouts/portal/pagina.php 51
ERROR - 2018-08-02 15:32:36 --> Severity: Notice --> Undefined index: post_titulo /dados/sites/www/site2018/layouts/portal/pagina.php 58
ERROR - 2018-08-02 15:32:36 --> Severity: Notice --> Undefined index: post_titulo /dados/sites/www/site2018/layouts/portal/pagina.php 72
ERROR - 2018-08-02 15:32:36 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/pagina.php 73
ERROR - 2018-08-02 15:36:59 --> 404 Page Not Found: 
ERROR - 2018-08-02 15:37:40 --> 404 Page Not Found: 
ERROR - 2018-08-02 15:37:51 --> Severity: Notice --> Undefined variable: pagina /dados/sites/www/site2018/layouts/portal/pagina.php 31
ERROR - 2018-08-02 15:37:51 --> Severity: Notice --> Undefined variable: pagina /dados/sites/www/site2018/layouts/portal/pagina.php 32
ERROR - 2018-08-02 15:37:51 --> Severity: Notice --> Undefined variable: pagina /dados/sites/www/site2018/layouts/portal/pagina.php 51
ERROR - 2018-08-02 15:37:51 --> Severity: Notice --> Undefined variable: pagina /dados/sites/www/site2018/layouts/portal/pagina.php 58
ERROR - 2018-08-02 15:37:51 --> Severity: Notice --> Undefined variable: pagina /dados/sites/www/site2018/layouts/portal/pagina.php 72
ERROR - 2018-08-02 15:37:51 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/layouts/portal/pagina.php 73
ERROR - 2018-08-02 16:22:42 --> Severity: Compile Error --> Cannot redeclare s_func() (previously declared in /dados/sites/www/site2018/app/helpers/shortcodes_helper.php:50) /dados/sites/www/site2018/app/helpers/shortcodes_helper.php 62
ERROR - 2018-08-02 16:29:17 --> Severity: Error --> Using $this when not in object context /dados/sites/www/site2018/app/helpers/shortcodes_helper.php 60
ERROR - 2018-08-02 16:30:13 --> Severity: Parsing Error --> syntax error, unexpected 'global' (T_GLOBAL), expecting function (T_FUNCTION) /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 10
ERROR - 2018-08-02 16:34:53 --> Severity: Parsing Error --> syntax error, unexpected 'global' (T_GLOBAL), expecting function (T_FUNCTION) /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 10
ERROR - 2018-08-02 16:36:05 --> Severity: Parsing Error --> syntax error, unexpected '=', expecting ',' or ';' /dados/sites/www/site2018/app/modules/portal/controllers/Noticias.php 35
ERROR - 2018-08-02 16:51:14 --> Severity: Notice --> Undefined variable: noticia /dados/sites/www/site2018/app/modules/portal/controllers/Paginas.php 25
ERROR - 2018-08-02 16:51:28 --> Severity: Notice --> Undefined index: id_post /dados/sites/www/site2018/app/modules/portal/controllers/Paginas.php 25
ERROR - 2018-08-02 16:52:43 --> 404 Page Not Found: 
