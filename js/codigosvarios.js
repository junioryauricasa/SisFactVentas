$(document).ready(function(){
    
   function menuLeft () {
       
      $('#btn-left-menu').click( function(){ 
          
           var activador = true ; 
          
          if ( $( window ).width() <= 576 ) {
              
              if ( activador == true ) {
              
              $('#left-navbar').removeClass('nav-right') ;
              $('#left-navbar').addClass('nav-right-active');
              $('.panel-left').css({
                        
                        'left' :'-1px',
                        'width': '0%',                 
                     'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#14a1eb',
                  });
    
                activador = false ;
              
          } else {
              
              $('#left-navbar').removeClass('nav-right-active')
              $('#left-navbar').addClass('nav-right');
              $('.panel-left').css({
                        
                        'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = true ;
          }
           
           
       }
          
          
    
        
        
        
    })
        
   }
    
    menuLeft();
    
    function subMenuLeft() {
        
        var activador = true ;
            
        
        $('#menu-1').click(function(){
            
                        
            if ( activador == true) {
                
                    $('#sub-menu-1').css({
                        
                        'display' :' block',
                        'transition':'all 0.5s ease-out',
                        'height': '100px'

                    });
                    
                   $('#icono-circ-1').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(-90deg)'

                        })
               
                  activador = false ;   
            
            } else {
                
                    $('#sub-menu-1').css({
                    
                        
                        'transition':'all 0.5s ease-out',
                        'height': '0px'

                    });
                
                    $('#icono-circ-1').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(00deg)'

                        })
                                     
                 activador = true ;
                
            }
        })
        $('#menu-2').click(function(){
            
                        
            if ( activador == true) {
                
                    $('#sub-menu-2').css({
                        
                        'display' :' block',
                        'transition':'all 0.5s ease-out',
                        'height': '100px'

                    });
                    
                   $('#icono-circ-2').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(-90deg)'

                        })
               
                  activador = false ;   
            
            } else {
                
                    $('#sub-menu-2').css({
                    
                        
                        'transition':'all 0.5s ease-out',
                        'height': '0px'

                    });
                
                    $('#icono-circ-2').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(00deg)'

                        })
                                     
                 activador = true ;
                
            }
        })
        $('#menu-3').click(function(){
            
                        
            if ( activador == true) {
                
                    $('#sub-menu-3').css({
                        
                        'display' :' block',
                        'transition':'all 0.5s ease-out',
                        'height': '100px'

                    });
                    
                   $('#icono-circ-3').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(-90deg)'

                        })
               
                  activador = false ;   
            
            } else {
                
                    $('#sub-menu-3').css({
                    
                        
                        'transition':'all 0.5s ease-out',
                        'height': '0px'

                    });
                
                    $('#icono-circ-3').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(00deg)'

                        })
                                     
                 activador = true ;
                
            }
        })
        $('#menu-4').click(function(){
            
                        
            if ( activador == true) {
                
                    $('#sub-menu-4').css({
                        
                        'display' :' block',
                        'transition':'all 0.5s ease-out',
                        'height': '100px'

                    });
                    
                   $('#icono-circ-4').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(-90deg)'

                        })
               
                  activador = false ;   
            
            } else {
                
                    $('#sub-menu-4').css({
                    
                        
                        'transition':'all 0.5s ease-out',
                        'height': '0px'

                    });
                
                    $('#icono-circ-4').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(00deg)'

                        })
                                     
                 activador = true ;
                
            }
        })
        $('#menu-5').click(function(){
            
                        
            if ( activador == true) {
                
                    $('#sub-menu-5').css({
                        
                        'display' :' block',
                        'transition':'all 0.5s ease-out',
                        'height': '100px'

                    });
                    
                   $('#icono-circ-5').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(-90deg)'

                        })
               
                  activador = false ;   
            
            } else {
                
                    $('#sub-menu-5').css({
                    
                        
                        'transition':'all 0.5s ease-out',
                        'height': '0px'

                    });
                
                    $('#icono-circ-5').css({

                       'transition':'all 0.2s ease-out',
                       'transform':'rotate(00deg)'

                        })
                                     
                 activador = true ;
                
            }
        })
    }
    
    subMenuLeft()
}) ; 