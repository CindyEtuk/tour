$(".display").hide()





$(".showEffect").on('mouseover', function (){
    $(this).find(".display").show()
    $(this).find(".image2").hide()
    // fade methods    
    //  $(".display").show()
    //  $(".image2").hide()
    
})

$(".showEffect").on('mouseout', function (){

    // fade methods  
    $(this).find(".display").hide()
    $(this).find(".image2").show()  
    //  $(".display").hide()
    //  $(".image2").show()
    
})

var $window=$(window)
var $body=$('body')
var windowHeight=$window.height();
var $sticky=$('.sticky');

$window.on('scroll', function(){
    if(($window).scrollTop() + $sticky.height() >= $('.side-two').height()){
        $sticky.addClass('.scroll')
    }else{
        $sticky.removeClass('.scroll')
    }
})