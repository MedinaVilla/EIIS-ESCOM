var mat = "";

function Choose(materia){
    document.getElementById("nomMat").innerHTML = materia.value;
    mat = materia
    if($(mat).prop("checked") == true){
        $('.modal').modal();
        $('#modal4').modal('open');
        $('.trigger-modal').modal();
    }
}

$(document).ready(function(){
    
    $("#curse").click(function(){
            console.log(mat);
            $(mat).attr('name', 'curses[]');
            $('#modal4').modal('close');
        });

        $("#recurse").click(function(){
            console.log(mat);
            $(mat).attr('name', 'recurses[]');
            $('#modal4').modal('close');  
        });
});
