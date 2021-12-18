(function ($) {

  


     $(window).on('load', function () {
          if ($('#preloader').length) {
            $('#preloader').delay(100).fadeOut('slow', function () {
              $(this).remove();
            });
          }
     });


   function renderImageOnSelect(targetInputId, imageHolderId){
     targetInputId.on('change', function() {

       if(typeof (FileReader) != undefined){
         imageHolderId.attr('src', '');
         var reader = new FileReader();

         reader.onload = function(e) {
           var image = e.target.result;
           imageHolderId.attr('src', image);
         }
         reader.readAsDataURL($(this)[0].files[0]);
       }else{

       }
     });
   }

   renderImageOnSelect($('#chooseFacilityImage'), $('#facilityImageHolder'))


   //account image upload logic
   renderImageOnSelect($('.inputfilecustom'), $('.holder'))

   $('.inputfilecustom').on('change', () => {
    $('.upload-error').text('');
   })

   $('.account-change-avator').submit(function(e) {
     e.preventDefault();
     let data = new FormData(this);
     let url = $(this).attr('action');
     let errorHolder = $('.upload-error');
     $.ajax({

       xhr : function(){
         let xhr = new window.XMLHttpRequest();
         xhr.upload.addEventListener("progress", function(ev){
           if(ev.lengthComputable){
             let percentComplete = (ev.loaded / ev.total) * 100;

             errorHolder.text(percentComplete + '%');
           }
         }, false);
         return xhr;
       },
       
       type : 'POST',
       url : url,
       data : data,
       contentType: false,
       processData: false,
       cache: false,

       success : (response) => {
         errorHolder.text(response.message);
       },

       error : (response, statusCode, jqxrh) => {
         errorHolder.text(jqxrh)
       },

       statusCode : {
         500 : (response, textStatus, jqxrh) => {
           errorHolder.text('Internal server error');
         },
         422 : (response) => {
           errorHolder.text(response.responseJSON.errors.avator);
         }
       }
    

     });
   });
   //end avator image upload
    
     
})(jQuery);
   