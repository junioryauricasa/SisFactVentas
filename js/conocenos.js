$(document).ready(function(){

    
    var header = $('#headerup').outerHeight(true); 
    var pietama = $('footer').outerHeight(true);
    var cuerpo = $('#contenido').outerHeight(true);
    var menuizq = $('#left-menu').outerHeight(true)
    var restaHeaderScroll = header -  $(window).scrollTop() ;
    var sumaFooConten = pietama  + cuerpo ;
        $(function(){
            
 
  posicionInicial = 0;
         margin = 10;
  posicionInicial = 0;
            
  dom = {}
  st = {
      
    menuLeft: '.left-menu',
    footer : 'footer',
  };
  catchDom = function(){
    dom.menuLeft = $(st.menuLeft);
    dom.footer = $(st.footer);
  }
  afterCatchDom = function(){
    functions.ubicarPosicionInicial()
  }
  suscribeEvents = function(){
    $(window).on('scroll', events.moveStick);
  }
  events = {
      
    moveStick : function(){
        
      windowpos = $(window).scrollTop();
      box = dom.menuLeft;
      footer = dom.footer.offset();
        
      if ( ($(window).height() <  footer.top  - (windowpos + margin))) {
          
        pos =  windowpos + 200;
          
        dom.menuLeft.css({
          top: pos + "px",
          bottom: ''
          
        });
      } else{
        pos = footer.top - (box.height() + margin);
        dom.menuLeft.css({
          top: pos + "px",
          bottom: ''
      });
    }
  }
}
  
var functions = {
    
  ubicarPosicionInicial : function(){
      
    var newPosition = header + margin;
    $(st.menuLeft).css('top', newPosition + "px");
    posicionInicial = newPosition;
      
  }
}
var init = function(){
  catchDom();
  afterCatchDom();
  suscribeEvents();
};
init();
});

    
    
    scrollanimating()
    
    
    function scrollanimating() {
        
       $('body').scrollspy({target: '#left-menu'});
        
        $('#nosotros').on('click',function(){
            
            $('#about-us').animatescroll();
        });
        
        $('#mission').on('click',function(){
            
            $('#mision').animatescroll();
        });
         $('#vission').on('click',function(){
            
            $('#vision').animatescroll();
        });
    
    }
      

 })



    

