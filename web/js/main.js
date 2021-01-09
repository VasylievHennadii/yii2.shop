jQuery(document).ready(function ($) {
    
    $(".scroll").click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });

    var navoffeset=$(".agileits_header").offset().top;
    $(window).scroll(function(){
       var scrollpos=$(window).scrollTop(); 
       if(scrollpos >=navoffeset){
           $(".agileits_header").addClass("fixed");
       }else{
           $(".agileits_header").removeClass("fixed");
       }
    });

    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );

    $().UItoTop({ easingType: 'easeOutQuart' });
    
     $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
    });

});

$(window).load(function(){
    $('.flexslider').flexslider({
      animation: "slide",
      start: function(slider){
        $('body').removeClass('loading');
      }
    });
});

paypal.minicart.render();

paypal.minicart.cart.on('checkout', function (evt) {
    var items = this.items(),
        len = items.length,
        total = 0,
        i;

    // Count the number of each item in the cart
    for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
    }

    if (total < 3) {
        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
        evt.preventDefault();
    }
});