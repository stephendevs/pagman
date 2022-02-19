(function ($){

    let hold = $('#hold');

    $('#createPostForm #postType').on('change', function(){
        let view = $(this).find(":selected").data('view');
        hold.html('');
        hold.load(view);
    });

    $('#editor').on('change', function(){
        if($(this).val() == 1){
            //determine if ckeditor instance exists
            if (CKEDITOR.instances.content) {
                //destroy instance if exists
                CKEDITOR.instances.content.destroy();
              } else {
                //re-create the ckeditor instance
                CKEDITOR.replace('content');
              }
        }else{

        }
    });

    //createCustomURLPOST
    $('#createCustomUrlPostForm').submit(function(e){
        e.preventDefault();
        let data = new FormData(this);

        let titleError = $(this).find('.error-title');
        let successMsg = $(this).find('.success');

       $.ajax({
        type : $(this).attr('method'),
        url : $(this).attr('action'),
        data : data,
        contentType: false,
        processData: false,
        cache: false,
        success : function(response){
            if(response.success != undefined && response.success == true){
                (response.message != undefined) ? successMsg.text(response.message) : successMsg.text('');
            }
        },
        statusCode : {
            500 : function(){},
            422 : function(response){
                //displaying validation errors on the error holders
                (response.responseJSON.errors.post_title != undefined) ? titleError.text(response.responseJSON.errors.post_title) : titleError.text('');
            }
        }
       });

    });

    //Render | Display Post Featured Image On File Selection
    $('#selectPostFeaturedImage').on('change', function(){
        let imageHolderId = $('#imageHolderId');

        if(typeof (FileReader) != undefined){
            imageHolderId.attr('src', '');
            var reader = new FileReader();

            reader.onload = function(e) {
              let image = e.target.result;
              imageHolderId.attr('src', image);
            }
            reader.readAsDataURL($(this)[0].files[0]);
          }
    });

    //Create Standard Post Form
    $('#createStandardPostFor').submit(function(e){
        e.preventDefault();

        //Validation Error Holders
        let postTitleError = $(this).find('.post-title-error');
        let postExtractTextError = $(this).find('.post-extract-error');
        let featuredImageError = $(this).find('.featured-image-error');

        let successMsg = $(this).find('.success');
        let failedMsg = $(this).find('.error');


        let data = new FormData(this);

        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
                if(response.success != undefined && response.success == true){
                    postTitleError.text('');
                    postExtractTextError.text('');
                    featuredImageError.text('');
                    failedMsg.text('');
                    (response.message != undefined) ? successMsg.text(response.message) : successMsg.text('');
                }
            },
            statusCode : {
                500 : function(){
                    failedMsg.text('Internal Server Error');
                },
                422 : function(response){
                    //displaying validation errors on the error holders
                    (response.responseJSON.errors.post_title != undefined) ? postTitleError.text(response.responseJSON.errors.post_title) : postTitleError.text('');
                    (response.responseJSON.errors.post_featured_image != undefined) ? featuredImageError.text(response.responseJSON.errors.post_featured_image) : featuredImageError.text('');
                    (response.responseJSON.errors.extract_text != undefined) ? postExtractTextError.text(response.responseJSON.errors.extract_text) : postExtractTextError.text('');
                }
            }
           });

    });

    //Create Standard Post Form
    $('#editStandardPostForm').submit(function(e){
        e.preventDefault();

        //Validation Error Holders
        let postTitleError = $(this).find('.post-title-error');
        let postExtractTextError = $(this).find('.post-extract-error');
        let featuredImageError = $(this).find('.featured-image-error');

        let successMsg = $(this).find('.success');
        let failedMsg = $(this).find('.error');


        let data = new FormData(this);

        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
                if(response.success != undefined && response.success == true){
                    postTitleError.text('');
                    postExtractTextError.text('');
                    featuredImageError.text('');
                    failedMsg.text('');
                    (response.message != undefined) ? $('#updated').removeClass('d-none').addClass('show').find('.message').text(response.message) : successMsg.text('');
                    setTimeout(function(){
                        $('#updated').removeClass('show').addClass('d-none');
                    },2000);
                }
            },
            statusCode : {
                500 : function(){
                    failedMsg.text('Internal Server Error');
                },
                422 : function(response){
                    //displaying validation errors on the error holders
                    (response.responseJSON.errors.post_title != undefined) ? postTitleError.text(response.responseJSON.errors.post_title) : postTitleError.text('');
                    (response.responseJSON.errors.post_featured_image != undefined) ? featuredImageError.text(response.responseJSON.errors.post_featured_image) : featuredImageError.text('');
                    (response.responseJSON.errors.extract_text != undefined) ? postExtractTextError.text(response.responseJSON.errors.extract_text) : postExtractTextError.text('');
                }
            }
           });

    });

    CKEDITOR.replace('content');

  
})(jQuery);