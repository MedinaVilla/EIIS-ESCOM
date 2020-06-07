let ActualBoleta;
let alumno;
function openModelModify() {
    getDataAlumno();
    $('#nombre').val(alumno.nombre);
    $('#apellidopB').val(alumno.apellidop);
    $('#apellidomB').val(alumno.apellidom);
    $('#boletaA').val(alumno.boleta);
    $('#boletaB').val(alumno.boleta);
    $('#curpB').val(alumno.curp);
    $('#fecha_nacB').val(alumno.fecha_nac);
    $('#telefonoB').val(alumno.telefono);
    $('.modal').modal();
    $('#modal5').modal('open');
    $('.trigger-modal').modal();
    getActualBoleta();

}

function getDataAlumno() {
    $.ajax(
        '/src/alumno/materias/getDataAlumno.php',
        {
            success: function (response) {
                console.log("voy a ver que me regresa");
                console.log(response);
                alumno = response;
            },
            error: function () {
                alert('There was some error performing the AJAX call!');
            }
        }
    );
}

function getActualBoleta(){
    $.ajax(
        './src/alumno/sesion/getBoleta.php',
        {
            success: function (response) {
                ActualBoleta = response;
            },
            error: function () {
                alert('There was some error performing the AJAX call!');
            }
        }
    );
}


function updateAlumno() {
    $.ajax(
        './src/administrador/panel/alumnos/modifyAlumno.php',
        {
        type: "POST",
        data: {
            nombre: document.getElementById("nombreB").value,
            apellidop: document.getElementById("apellidopB").value,
            apellidom: document.getElementById("apellidomB").value,
            boletaA: ActualBoleta,
            boletaB: document.getElementById("boletaB").value,
            curp: document.getElementById("curpB").value,
            fecha_nac: document.getElementById("fecha_nacB").value,
            telefono: document.getElementById("telefonoB").value
            },
            success: function (response) {
                console.log(response);
                location.href = "/cierrasesion";
            },
            error: function () {
                alert('There was some error performing the AJAX call!');
            }
        }
    );

}