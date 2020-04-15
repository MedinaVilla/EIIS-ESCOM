function Choose(materia){
    document.getElementById("nomMat").innerHTML = materia.value;
    $(document).ready(function(){
        if($(materia).prop("checked") == true){
            $('.modal').modal();
            $('#modal4').modal('open');
            $('.trigger-modal').modal();
        }
        
        $("#curse").click(function(){
            $(materia).attr('name', 'curses[]');
            $('#modal4').modal('close');
        });

        $("#recurse").click(function(){
            $(materia).attr('name', 'recurses[]');
            $('#modal4').modal('close');  
        });
    });
}

