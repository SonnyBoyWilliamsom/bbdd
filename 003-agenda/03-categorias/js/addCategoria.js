var boton = document.getElementsByClassName('btn');
var formCategoria = document.getElementById('addCategoria');
boton[0].onclick = add_categoria;

function add_categoria(){
    formCategoria.innerHTML =
            "<form action='insertCategoria.php' method='post'><input type='text' name='categoria' placeholder='Categoria' required><input type='submit' value='Insertar' ></form>";
    boton[0].innerHTML = 'Cancelar';
    boton[0].onclick = close_categoria;
}
function close_categoria(){
    formCategoria.innerHTML = '';
    boton[0].innerHTML = 'Añadir Categoría';
    boton[0].onclick = add_categoria;
}


