(function ($){
    

    let menusHolder = $('#menusHolder');
    function getMenus(){
        $.ajax({
            type : 'GET',
            url : menusHolder.data('ajax'),

            success : function(response){
                console.log(response.data);
            }
        });
    }


    getMenus();
    
    //creating menu
    $('#createMenuForm').submit(function(e){
        e.preventDefault();
        
        let url = $(this).attr('action');
        let data = new FormData(this);
        let type = $(this).attr('method');

        $.ajax({
            type : type,
            url : url,
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
               if(response.success){
                   $('#createMenuFormAlertSuccess').removeClass('d-none');
                   $('#createMenuFormAlertSuccess').text(response.message);
                }
            },
            statusCode : {
                500 : function(){
                  $('#createMenuFormAlertSuccess').text('Internal server error');
                },
                200 : function(response){
                  //alert('ok');
                },
                422 : (response, statusText, jqxrh) => {
                    $('.error-name').text(response.responseJSON.errors.name);
                },
            },
        });
    });

    $('#menuItems .menu-item').each(function( index ){
       // alert($(this).text());
    });
})(jQuery);