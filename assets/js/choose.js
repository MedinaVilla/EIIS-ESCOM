function Choose(materia){
    document.getElementById("nomMat").innerHTML = materia.value;
    $(document).ready(function(){
        if($(materia).prop("checked") == true){
            $('.modal').modal();
            $('#modal4').modal('open');
            $('.trigger-modal').modal();
        }
        $("#recurse").click(function(){
            $(materia).attr('name', 'recurses[]');
            $('#modal4').modal('close');
        });

        $("#curse").click(function(){
            $(materia).attr('name', 'curses[]');
            $('#modal4').modal('close');
        });
    });
}

