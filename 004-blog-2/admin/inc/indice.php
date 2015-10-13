<?php


if($_GET['lang']=="es" || !isset($_GET['lang'])){
    define(MNG_OK_INSERT, "Datos guardados");
    define(MNG_KO_INSERT, "Error al guardar los datos");
    define(MNG_OK_UPDATE, "Datos modificados correctamente");
    define(MNG_KO_UPDATE, "Error al modificar los datos");
    define(MNG_OK_DELETE, "Datos eliminados correctamente");
    define(MNG_KO_DELETE, "Error al eliminar los datos");
    define(MNG_EMPTY_COMMENTS,"No hay comentarios");
    define(TXT_LABEL_TITULO,"Título");
}else{
    define(MNG_OK_INSERT, "Insert ok");
    define(MNG_KO_INSERT, "Insert error");
    define(MNG_OK_UPDATE, "Update ok");
    define(MNG_KO_UPDATE, "Update error");
    define(MNG_OK_DELETE, "Delete ok");
    define(MNG_KO_DELETE, "Delete error");
    define(MNG_EMPTY_COMMENTS,"Empty comments");
    define(TXT_LABEL_TITULO,"Title");
}


define(ROOT_EDITAR, "posteditar.php");
define(ROOT_USER_FILE,"upload/images_".$_SESSION['id_usuario']);
define(DEFAULT_IMG,"upload/default-thumb.gif");