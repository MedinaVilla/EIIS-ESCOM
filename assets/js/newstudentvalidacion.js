 
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input2').each(function(){
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
    var name = $('.validate-input input[name="name"]');
    var namep = $('.validate-input input[name="namep"]');
    var namem = $('.validate-input input[name="namem"]');
    var daten = $('.validate-input input[name="daten"]');    
    var email = $('.validate-input input[name="email"]');
    var curp = $('.validate-input input[name="curp"]');
    var tel = $('.validate-input input[name="tel"]');  
    var contraseña = $('.validate-input input[name="contraseña"]');

    $('#validate').click(function(){
        var check = true;
        
        if(($(boleta).val().trim().match(/^[0-9]*\.?[0-9]*$/) == null)||($(boleta).val().trim()=='')){
            showValidate(boleta);
            check=false;
        }  

        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }

        if($(namep).val().trim() == ''){
            showValidate(namep);
            check=false;
        }

        if($(namem).val().trim() == ''){
            showValidate(namem);
            check=false;
        }

        if($(daten).val().trim().match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/) == null){
            showValidate(daten);
            check=false;
        }        

        if($(curp).val().trim().match(/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/)== null){
            showValidate(curp);
            check=false;
        }
                        
        if($(tel).val().trim().match(/^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}$/) == null){
            showValidate(tel);
            check=false;
        }
        
        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }  
        
        if($(contraseña).val().trim().match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/)== null){
            showValidate(contraseña);
            check=false;
        }

        if(miFuncion(this)){
            if(check){
                student();
            } 
            
        }else{
            check=false;
        }
        return check;
              
        

    });
    
    
    $('.validate-form .input2').each(function(){
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