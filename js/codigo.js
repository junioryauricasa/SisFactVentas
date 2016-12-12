$(document).ready(function(){
    
    Function write(arg){
        document.write(arg);
    }
    
    
    var url = 'formulario.php',
        $gif = $('#gif');
    
    $('#boton').click(function(){

     var data = $('form').serialize();
      
        $.ajax({
            
            url: url,
            type: 'POST',
            data : data,
            dataType: 'html',
            contentType:'application/x-www-form-urlencoded;charset=UTF-8',
            beforeSend: function() {
                
                $gif.css({display:'block'});
                
            },
            complete : function(){
                
                $gif.css({display:'none'});
            },
            success : function(datos) {

                $('.informacion').html(datos);
                $('#mensajito').modal('show');
  
            },
            error : function(ajax, estado, excepcion) {
                
            }
            
        })
    })
})