var selector = 0;
function showRegistry(fecha){
    selector = fecha;
    var x = document.getElementById(fecha);
    $("#graph").children().css( "display", "none" );
    x.style.display = "block";
}