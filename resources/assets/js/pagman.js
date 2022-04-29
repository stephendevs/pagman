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

    $.fn.renderImage = function(options){

        let defaults = {
            'event' : 'change',
            'placeholder' : 'img-placeholder'
        }

        let settings = $.extend(defaults, options);
        let plugin = this;

        plugin.on(settings.event, function(){
            let reader = new FileReader;
            reader.onload = function(e){
                let src = e.target.result;
                let img = $('<img>', {src: src, class : 'img-fluid'});
                img.appendTo($('.' + settings.placeholder))
            }
            reader.readAsDataURL($(this)[0].files[0]);
        });
    }

    $('.media-file').renderImage({'event' : 'change'});
    

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

        let successMsg = $('#alert');
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
                    (response.message != undefined) ? successMsg.addClass('show').find('.message-holder').text(response.message) : successMsg.text('');
                    setTimeout(function(){
                        successMsg.removeClass('show');
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
    $('#chooseMediaModal').on('shown.bs.modal', function () {
        let chooseMediaModal = $(this);
        let row = chooseMediaModal.find('.row');
        let mediaColumn = $('<div>', {class : 'col-lg-4'});

        let url = chooseMediaModal.data('url');
        let baseurl = chooseMediaModal.data('baseurl');

        $.ajax({
            type : 'GET',
            url : url,
            dataType : 'json',
            success : function(response){
                let media = response.data;
                $.each(media, function(index, value){
                    chooseMediaModal.find('#image' + index).attr('src', baseurl + '/' + value.url).data('id', value.id);
                });
            }
        });
      });

      $('.selected-media').on('click', function(){
          let selectedMedia = $(this);
          let url = selectedMedia.data('baseurl') + '/posts/media/add/' + selectedMedia.data('id') + '/' + selectedMedia.data('postid');
          $.ajax({
              type : 'GET',
              url : url,
              dataType : 'json',
              success : function(response) {
                  if (response.success != undefined && response.success == true) {
                      selectedMedia.addClass('media-attached');
                  }
              }
          });
      });

    $('#iconFormat').on('change', function(){
        let iconInput = $('#iconInput');
        switch ($(this).val()) {
            case 'css_class':
                iconInput.attr('type', 'text').attr('placeholder', 'Enter CSS Class').addClass('form-control');
                break;
        
            default:
                iconInput.attr('type', 'file').removeClass('form-control');
                break;
        }
    });

    $('#postType').on('change', function(){
        let postKeyInputHolder = $('#postKeyInputHolder');
        if ($(this).val() == 'page') {
            postKeyInputHolder.removeClass('d-none');
        }else{
            postKeyInputHolder.addClass('d-none');
        }
    });

  $(window).on('load', function () {
    var mediaIsotope = $('.isotope-container').isotope({
        itemSelector: '.isotope-item'
    });
  });

  $.fn.autocomplete = function(options){
      // Get instance
      let plugin = this;
      let defaults = {
          data : ['hello','hello']
      };

      plugin.settings = {};

      plugin.init = function(){
          //Define settings
          plugin.settings = $.extend(plugin.settings, defaults, options);
          // Run through the elements
          plugin.each(function(i, wrapper){
              let $container = autoCompleteContainer();
              $container.insertAfter(wrapper);

            plugin.on('input', function(){
                let data = plugin.settings.data;
                if (data.length > 0) {
                    for (let index = 0; index < data.length; index++) {
                        itemContainer(data[index]).appendTo($container)
                    }
                } else {
                    
                }
            });
          });
      }

      let autoCompleteContainer = function(){
          let $container = $('<div>', {class: 'auto-complete-container'});
          return $container;
      }

      let itemContainer = function(text){
          let $item = $('<div>', {class : 'item-container'}).text(text);

          $item.on('click', function(e){
              plugin.val($(this).text());
          });
          return $item;
      }

      this.init();
      return this;
  }

  $('#name').autocomplete();




CKEDITOR.replace('content');

  
})(jQuery);