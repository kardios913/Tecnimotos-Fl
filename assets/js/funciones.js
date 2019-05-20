function loading(rta) {
    $(rta).html("<div class='row'><div class='col-md-4 col-md-offset-4'></div><div class='col-md-4 col-md-offset-4'><center><img src='./images/cargando2.gif' width='50' height='50' alt='cargando' /></center></div><div class='col-md-4 col-md-offset-4'></div> </div>");
}

function ajax(url, datos, rta) {
    var ajax = $.post(url, datos, function (respuesta) {
        $(rta).html(respuesta);
    });
    return ajax;
}

function ajaxsync(url, datos, rta) {
    var ajax = $.ajax({
        url: url,
        data: datos,
        async: false
    }).done(function (respuesta) {
        $(rta).html(respuesta);
    });
    return ajax;
}

function FormArticulos() {
    var url = "./vista/FormArticulos.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormHome() {
    var url = "./vista/FormHome.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormVentas() {
    var url = "./vista/FormVentas.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormReportes() {
    var url = "./vista/FormReportes.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormListarExistencias() {
    var url = "./vista/FormListarExistencias.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormCrearArticulo() {
    var url = "./vista/FormCrearArticulo.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}

function FormRegistrarVenta() {
    var url = "./vista/FormRegistrarVenta.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}

function FormVentasAbiertas() {
    var url = "./vista/FormVentasAbiertas.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormFormularioVentas() {
    var url = "./vista/FormFormularioVentas.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormAgregarDetalle() {
    var url = "./vista/FormAgregarDetalle.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormRegistrarDetalle() {
    var url = "./vista/FormRegistrarDetalle.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}
function FormVerDetalle() {
    var url = "./vista/FormVerDetalle.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}

function FormEditarDetalle() {
    var url = "./vista/FormEditarDetalle.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}

function FormFacturas() {
    var url = "./vista/FormFacturas.php";
    var datos = {};
    var rta = "#contenido";
    ajax(url, datos, rta);
}

function TipoCliente() {
    var Cliente = document.getElementById("Cliente").value;
    var ventaAbierta = document.getElementById("VentaAbierta");
    if (Cliente == 1) {
        ventaAbierta.innerHTML = "";
    } else {
        ventaAbierta.innerHTML = "<div class='form-group'>"
                + "<label>Cedula Cliente</label>"
                + "<input type='number' name='Cedula' class='form-control' placeholder='Cedula CLiente' >"
                + "</div>"
                + "<div class='form-group'>"
                + "<label>Nombre Cliente</label>"
                + "<input type='text' name='NombreC' class='form-control' placeholder='Nombre CLiente'>"
                + "</div> "
                + "<div class='form-group'>"
                + " <label>Vehiculo Cliente</label>"
                + "<input type='text' name='Vehiculo' class='form-control' placeholder='Vehiculo CLiente' >"
                + "</div> "
                + "<div class='form-group'>"
                + " <label>Telefono Cliente</label>"
                + "<input type='number' name='Telefono' class='form-control' placeholder='Telefono CLiente' >"
                + "</div> ";
    }

}