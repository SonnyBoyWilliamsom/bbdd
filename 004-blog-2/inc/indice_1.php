<?php

if($_GET['lang']=="es" || !isset($_GET['lang'])){
    define(TITULO_BLOG,"ZBrandom M108");
    define(TITULO_SIDEBAR_SOCIAL,"Redes sociales");
    define(TITULO_SIDEBAR_POST_POPULARES,"Post populares");
    define(TITULO_SIDEBAR_POST_ULTIMOS,"Últimos post");
    define(TITULO_FOOTER_CONTACTO,"Contacta con nosotros");
    define(TITULO_FOOTER_GALERIA,"Galería");
    define(TITULO_FOOTER_US,"Sobre nosotros");
    define(TXT_VACIO,"No hay entradas");
    define(COMENTS_INSERT_OK,"Este comentario está pendiente de aprobación");
    define(COMENTS_INSERT_KO,"Hemos tenido problemas en guardar su comentario");
}else{
    
}
