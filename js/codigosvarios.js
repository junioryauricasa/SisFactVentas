$(document).ready(function(){
    
    
    function dropdownProfile() {
        
        var activador = true ;
        
        $('#nick-user-nav').focusin(function(){
            

            
            $('#profile-menu').css({
            
                'display':'flex',
                'flex-direction': 'column',
                'position': 'fixed' ,
                'z-index' : '1',
                'border': '1px solid #f7f7f9 ',
                'padding': '5px',
                'background-color': '#f7f7f9' ,
                'font-size': '15px',
                'border' : '1px solid rgba(203, 203, 203, 0.98)', 
                'transition': 'all 0.3s ease-out'
            
             })
            
             $('.icon-perfil').css({
                 
                'transform':'rotate(-90deg)',
                'transition':'all 0.2s ease-out'
             
            })
            
       })
        
        $('#nick-user-nav').focusout(function(){
            
            
            $('#profile-menu').css({
            
                'display':'none',
                'flex-direction': 'column',
                'position': 'fixed' ,
                'z-index' : '1',
                'border': '1px solid #f7f7f9 ',
                'padding': '5px',
                'background-color': '#f7f7f9' ,
                'font-size': '15px',
                'border' : '1px solid rgba(203, 203, 203, 0.98)', 
                'transition': 'all 0.3s ease-out'
            
             })
            
             $('.icon-perfil').css({
                 
                'transform':'rotate(-90deg)',
                'transition':'all 0.2s ease-out'
             
            })
            
             activador = false ;
            
            
       
           
            
        activador = false ;
      
        

        })
        
       
    }
   
    
     dropdownProfile()
     
   function menuLeft () {
       
     var activador = true ; 
       
      $('#btn-left-menu').click( function(){ 
          

          if ( $( window ).width() <= 576 ) {
              
             
              if ( activador == true ) {
                            
                $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '70%',
                'right': '0px',
                'transition': 'all 0.3s ease-out'              
              });
                  
              $('.panel-left').css({
                        
                        'left' :'-70%',
                        'width': '100%',                 
                     'transition': 'all 0.3s ease-out'
                        
                    });
                  
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = false ;
              
          } else {
              
            
              
              $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '70%',
                'right': '-70%',
                'transition': 'all 0.3s ease-out'              
              });
              
              $('.panel-left').css({
                        
                  'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#300eea',
                  });
    
                activador = true ;
          }
           
           
       } else if ( ( $( window ).width() >=577 ) && ( $( window ).width() <= 768 ) ) {
              

              
              if ( activador == true ) {
                            
                $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '35%',
                'right': '0px',
                'transition': 'all 0.3s ease-out'              
              });
                  
              $('.panel-left').css({
                        
                        'left' :'-35%',
                        'width': '100%',                 
                     'transition': 'all 0.3s ease-out'
                        
                    });
                  
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = false ;
              
          } else {
              
            
              
              $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '35%',
                'right': '-35%',
                'transition': 'all 0.3s ease-out'              
              });
              
              $('.panel-left').css({
                        
                  'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#300eea',
                  });
    
                activador = true ;
          }
           
           
       } else if ( ( $( window ).width() >=769 ) && ( $( window ).width() <=992 ) ) {
           
           

              
              if ( activador == true ) {
                            
                $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '30%',
                'right': '0px',
                'transition': 'all 0.3s ease-out'              
              });
                  
              $('.panel-left').css({
                        
                    'left' :'0px',
                    'width': '70%',                 
                    'transition': 'all 0.3s ease-out'
                        
                    });
                $('.calendar-desc').css({
                    
                    'display':'none'
                })  
                 
                  
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = false ;
              
          } else {
              
            
              
              $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '30%',
                'right': '-30%',
                'transition': 'all 0.3s ease-out'              
              });
              
              $('.panel-left').css({
                        
                  'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              
               $('.calendar-desc').css({
                      'display': 'flex'
                  });
                  
              $('#btn-menu').css({
                  'color': '#300eea',
                  });
    
                activador = true ;
          }
           
           
       } else if ( ( $( window ).width() >=993 ) && ( $( window ).width() <= 1200 ) ) {
              

              
              if ( activador == true ) {
                            
                $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '30%',
                'right': '0px',
                'transition': 'all 0.3s ease-out'              
              });
                  
              $('.panel-left').css({
                        
                    'left' :'0px',
                    'width': '70%',                 
                    'transition': 'all 0.3s ease-out'
                        
                    });
                  
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = false ;
              
          } else {
              
            
              
              $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '30%',
                'right': '-30%',
                'transition': 'all 0.3s ease-out'              
              });
              
              $('.panel-left').css({
                        
                  'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#300eea',
                  });
    
                activador = true ;
          }
           
           
       } else if ( $( window ).width() >= 1201 ) {
              

              
              if ( activador == true ) {
                            
                $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '20%',
                'right': '0px',
                'transition': 'all 0.3s ease-out'              
              });
                  
              $('.panel-left').css({
                        
                    'left' :'0px',
                    'width': '80%',                 
                    'transition': 'all 0.3s ease-out'
                        
                    });
                  
              $('#btn-menu').css({
                  'color': '#413f3f',
                  });
    
                activador = false ;
              
          } else {
              
            
              
              $('#right-navbar').css({ 
                'position': 'fixed',
                'height' : '100%',
                'color': 'white',
                'width' : '30%',
                'right': '-30%',
                'transition': 'all 0.3s ease-out'              
              });
              
              $('.panel-left').css({
                        
                  'left' :' 0px',
                  'width': '100%', 
                  'transition': 'all 0.3s ease-out'
                        
                    });
              $('#btn-menu').css({
                  'color': '#300eea',
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