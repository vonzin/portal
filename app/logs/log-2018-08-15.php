<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-08-15 10:35:47 --> Severity: Parsing Error --> syntax error, unexpected '}' /dados/sites/www/site2018/layouts/portal/index.php 151
ERROR - 2018-08-15 10:36:01 --> Severity: Warning --> pg_query(): Query failed: ERROR:  column &quot;create_date&quot; does not exist
LINE 4: DATE(create_date) BETWEEN data_inicio AND data_final
             ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-15 10:36:01 --> Query error: ERROR:  column "create_date" does not exist
LINE 4: DATE(create_date) BETWEEN data_inicio AND data_final
             ^ - Invalid query: SELECT "id_destaque", "target", "imagem_destaque"
FROM "portal2018"."destaques"
WHERE   (
DATE(create_date) BETWEEN data_inicio AND data_final
 )
AND 1=1 /* MY_Loader->homeDestaques destaques da home*/
 LIMIT 3
ERROR - 2018-08-15 10:59:47 --> 404 Page Not Found: 
ERROR - 2018-08-15 10:59:48 --> 404 Page Not Found: 
ERROR - 2018-08-15 11:26:23 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:26:38 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:26:57 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:28:10 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:29:28 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:29:37 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:29:38 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/1
ERROR - 2018-08-15 11:30:09 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/3
ERROR - 2018-08-15 11:30:15 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/3
ERROR - 2018-08-15 11:30:34 --> 404 Page Not Found: ../modules/portal/controllers/Destaques/3
ERROR - 2018-08-15 11:31:09 --> Severity: Warning --> pg_query(): Query failed: ERROR:  relation &quot;portal2018.destaque&quot; does not exist
LINE 2: FROM &quot;portal2018&quot;.&quot;destaque&quot;
             ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-15 11:31:09 --> Query error: ERROR:  relation "portal2018.destaque" does not exist
LINE 2: FROM "portal2018"."destaque"
             ^ - Invalid query: SELECT "tipo", "id_referencia", "cliques"
FROM "portal2018"."destaque"
WHERE "id_destaque" = 3
ERROR - 2018-08-15 11:31:27 --> Severity: Warning --> pg_query(): Query failed: ERROR:  relation &quot;portal2018.destaque&quot; does not exist
LINE 2: FROM &quot;portal2018&quot;.&quot;destaque&quot;
             ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-15 11:31:27 --> Query error: ERROR:  relation "portal2018.destaque" does not exist
LINE 2: FROM "portal2018"."destaque"
             ^ - Invalid query: SELECT "tipo", "id_referencia", "cliques"
FROM "portal2018"."destaque"
WHERE "id_destaque" = 3
ERROR - 2018-08-15 11:31:49 --> Severity: Warning --> pg_query(): Query failed: ERROR:  relation &quot;portal2018.destaque&quot; does not exist
LINE 2: FROM &quot;portal2018&quot;.&quot;destaque&quot;
             ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-15 11:31:49 --> Query error: ERROR:  relation "portal2018.destaque" does not exist
LINE 2: FROM "portal2018"."destaque"
             ^ - Invalid query: SELECT "tipo", "id_referencia", "cliques"
FROM "portal2018"."destaque"
WHERE "id_destaque" = 3
ERROR - 2018-08-15 11:32:01 --> Severity: Notice --> Undefined variable: resultado /dados/sites/www/site2018/app/modules/portal/models/Destaquesbd.php 8
ERROR - 2018-08-15 11:32:01 --> Severity: Error --> Call to a member function num_rows() on null /dados/sites/www/site2018/app/modules/portal/models/Destaquesbd.php 8
ERROR - 2018-08-15 11:32:23 --> Severity: Error --> Call to a member function num_rows() on array /dados/sites/www/site2018/app/modules/portal/models/Destaquesbd.php 8
ERROR - 2018-08-15 11:33:05 --> Severity: Error --> Call to a member function num_rows() on array /dados/sites/www/site2018/app/modules/portal/models/Destaquesbd.php 8
ERROR - 2018-08-15 11:44:18 --> Severity: Warning --> pg_query(): Query failed: ERROR:  column &quot;YYYY-MM-DD HH:MI:SS&quot; does not exist
LINE 1: SELECT &quot;noticias&quot;.*, TO_CHAR(post_data, &quot;YYYY-MM-DD HH:MI:SS...
                                                ^ /dados/sites/www/apl/codeigniter/database/drivers/postgre/postgre_driver.php 242
ERROR - 2018-08-15 11:44:18 --> Query error: ERROR:  column "YYYY-MM-DD HH:MI:SS" does not exist
LINE 1: SELECT "noticias".*, TO_CHAR(post_data, "YYYY-MM-DD HH:MI:SS...
                                                ^ - Invalid query: SELECT "noticias".*, TO_CHAR(post_data, "YYYY-MM-DD HH:MI:SS") AS post_data
FROM "portal2018"."noticias"
WHERE "id_post" = '10997'
ERROR - 2018-08-15 11:50:05 --> Severity: Error --> Call to a member function format() on boolean /dados/sites/www/site2018/app/modules/portal/controllers/Destaques.php 19
ERROR - 2018-08-15 13:32:00 --> Severity: Error --> Cannot use object of type CI_DB_postgre_result as array /dados/sites/www/site2018/app/modules/portal/models/Destaquesbd.php 38
