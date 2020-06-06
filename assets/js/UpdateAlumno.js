let ActualBoleta;
function openModelModify() {
    $('.modal').modal();
    $('#modal5').modal('open');
    $('.trigger-modal').modal();
    getActualBoleta();
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