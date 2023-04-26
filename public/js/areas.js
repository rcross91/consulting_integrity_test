function valid_area(){
    
    var validator = '';

    required = 'El campo es obligatorio';

   $.validator.addMethod("validname", function( value, element ) {
       return this.optional( element );
   }); 

validator = $("#form_area").validate({
    rules:
    {
    name: {
     required: true,
    },
     },
     messages:
     {
    name: {
     required:required,
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
        form.submit();   
    } 
});
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




