$("#birth_date").inputmask({
    mask: "99-99-9999",
    showMaskOnHover: false,
});

var emailInput = document.querySelector('#email').value;

function valid_empleado(){
    
    var validator = '';

    required = 'El campo es obligatorio';
    validD = 'La fecha inicial es mayor que la fecha final';

   var nameregex = /^[a-zA-Z ]+$/;

   $.validator.addMethod("validname", function( value, element ) {
       return this.optional( element ) || nameregex.test( value );
   }); 

   $.validator.addMethod("valueNotEquals", function(value, element, arg){
      return arg !== value;
    }, "Value must not equal arg.");
   
   // valid email pattern
   var eregex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   
   $.validator.addMethod("validemail", function( value, element ) {
       return this.optional( element )
   });

    $.validator.addMethod("validdate", function( value, element ) {
       return this.optional( element ) || validDate();
   });

validator = $("#form_empleado").validate({
    rules:
    {
    name: {
     required: true,
     validname: true,
    },
    email: {
     required: true,
     email: true,
    },
    birth_date: {
     required: true,
     validdate: true,
    },
    area_id: {
     valueNotEquals: '0',
    },
     },
     messages:
     {
    name: {
     required:required,
     validname: 'El campo solo contiene letras',
    },
    email: {
     required:required,
     email: 'Correo electrónico inválido',
    },
    birth_date: {
     required: required,
     validdate: 'La fecha de nacimiento es errónea',
    },
    area_id: {
     valueNotEquals: required,
     //validdate: true,
    },
    },
     errorPlacement : function(error, element) {
     $(element).closest('.form-group').find('.help-block').html(error.html());
     },
     highlight : function(element) {
     $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
     $(element).closest('.form-group').find('.form-control').addClass('form-control-danger');
     },
     unhighlight: function(element, errorClass, validClass) {
     $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
     $(element).closest('.form-group').find('.help-block').html('');
     },
     
    submitHandler: function(form) {
        var currentEmail = document.querySelector('#email').value;

        if (emailInput != currentEmail){
            $.ajax({
                url: '/email/'+currentEmail,
                type: 'GET',
                //data: {'email': currentEmail},
                success: function(res) {
                    if (res == 'true'){
                        $('.mail').html('Correo electrónico ya existe');
                        $('.mail1').removeClass('has-success').addClass('has-danger');
                        $('.mail2').addClass('form-control-danger');
                    }else
                        form.submit();
                }
            });
        }else{
            form.submit();   
        }

    } 
});
}

function validDate() {
    var CurrentDate = new Date();
    var birth = document.querySelector('#birth_date').value;
    var separador = "-";
    var textoseparado = birth.split(separador);
   // var regx = ^(?:0?[1-9]|1[1-2])([\-/.])(3[01]|[12][0-9]|0?[1-9])\1\d{4}$;
    var reg1 = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;

    var SelectedDate = new Date(
        textoseparado[2],
         textoseparado[1],
        textoseparado[0] - 1
       

    );

    let resta = CurrentDate.getTime() - SelectedDate.getTime();
    resta = Math.round(resta/ (1000*60*60*24));
    resta = resta/365;
    if((CurrentDate < SelectedDate) || resta > 110 || !reg1.test(birth)){
        return false;
    }
    return true;
}

function deleteConfirmation(form_id) {
    
    Swal.fire({
        title: 'Eliminar?',
        text: 'Por favor asegúrese y confirme!',
        type: "warning",
        showCancelButton: !0,
        confirmButtonText:'Si!',
        cancelButtonText: "No!",
        reverseButtons: !0
    }).then(function (e) {

        if (e.value === true) {
            $('#'+form_id).submit();
        } else {
            e.dismiss;
        }

    }, function (dismiss) {
        return false;
    })
}




