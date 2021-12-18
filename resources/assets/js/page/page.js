(function ($){


    //Quickly add new page ajax request
    $('#createPageModal .create-page-modal-form').submit(function(e){
        e.preventDefault();

        let data = new FormData(this);
        //append ajax to data so we may receive ajax response from the server
        data.append('ajax', 'ajax');

        //validation error holders
        let titleError = $(this).find('.error-title');
        let slugError = $(this).find('.error-page-slug');

        //success message holder
        let alertSuccess = $(this).find('.alert-success');

        //Error message holder
        let alertDanger = $(this).find('.alert-danger');

        //send add new page ajax request
        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
                if(response.success != undefined && response.success == true){
                    //display response message on succesful creation of page
                    alertSuccess.removeClass('d-none');
                    (response.message != undefined) ? alertSuccess.text(response.message) : alertSuccess.text('Action was successful');
                    console.log(response.url);
                }
            },
            statusCode : {
                500 : function(){
                    console.log('Internal serve error');
                    alertSuccess.removeClass('d-none');
                    alertSuccess.text('Internal Server Error');
                },
                422 : function(response){
                    //displaying validation errors on the error holders
                    (response.responseJSON.errors.title != undefined) ? titleError.text(response.responseJSON.errors.title) : titleError.text('');
                    (response.responseJSON.errors.slug != undefined) ? slugError.text(response.responseJSON.errors.slug) : slugError.text('');
                }
            }
            
        })
    });
    //End - Quickly add new page ajax request

    $('#createPageForm').submit(function(e){
        e.preventDefault();
    
        let data = new FormData(this);
        //append ajax to data so we may receive ajax response from the server
        data.append('ajax', 'ajax');
    
        //validation error holders
        let titleError = $(this).find('.error-title');
        let slugError = $(this).find('.error-page-slug');
        let urlError = $(this).find('.error-url');
        let contentError = $(this).find('.error-content');
    
        //success message holder
        let alertSuccess = $(this).find('.alert-success');
    
        //Error message holder
        let alertDanger = $(this).find('.alert-danger');
    
        //send add new page ajax request
        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
                if(response.success != undefined && response.success == true){
                    //display response message on succesful creation of page
                    alertSuccess.removeClass('d-none');
                    (response.message != undefined) ? alertSuccess.text(response.message) : alertSuccess.text('Action was successful');
                    console.log(response.url);
                }
            },
            statusCode : {
                500 : function(){
                    console.log('Internal serve error');
                    alertSuccess.removeClass('d-none');
                    alertSuccess.text('Internal Server Error');
                },
                422 : function(response){
                    //displaying validation errors on the error holders
                    (response.responseJSON.errors.title != undefined) ? titleError.text(response.responseJSON.errors.title) : titleError.text('');
                    (response.responseJSON.errors.slug != undefined) ? slugError.text(response.responseJSON.errors.slug) : slugError.text('');
                    (response.responseJSON.errors.url != undefined) ? urlError.text(response.responseJSON.errors.url) : urlError.text('');
                    (response.responseJSON.errors.content != undefined) ? contentError.text(response.responseJSON.errors.content) : contentError.text('');
                }
            }
                
        })
    });


   if( $('body').find('#content') != undefined){
       CKEDITOR.replace('content');
   }

    

})(jQuery);