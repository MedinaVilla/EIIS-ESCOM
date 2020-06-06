(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.form-control').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
            
  
    
    /*==================================================================
    [ Validate ]*/
    var nomUsu = $('.validate-input input[name="nomUsu"]');
    var password = $('.validate-input input[name="password"]');


    $('#login').on('submit',function(){
        var check = true;

        if($(nomUsu).val().trim() == ''){
            showValidate(nomUsu);
            check=false;
        }

        if($(password).val().trim() == ''){
            showValidate(password);
           check=false;
        } 

        return check;
    });
    
    
    $('#login .form-control').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);