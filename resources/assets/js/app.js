(function ($){

   
    $('#syncPagesForm').submit(function(e){
        e.preventDefault();

        let data = new FormData(this);
        data.append('ajax', 'ajax');

        $.ajax({
            type : $(this).attr('method'),
            url : $(this).attr('action'),
            data : data,
            contentType: false,
            processData: false,
            cache: false,
            success : function(response){
                if(response.message != undefined){
                    console.log(response.message);
                }
            },
            statusCode : {
                500 : function(){
                    console.log('Internal serve error');
                }
            }
            
        })
    });


})(jQuery);