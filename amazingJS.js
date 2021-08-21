$(function(){
    $(".hover-charac").hover(function(){
       $(".under-header-menu").css({backgroundColor:'white',zIndex:'1000',paddingTop:'2px',display:'block'}).fadeIn('slow');
    }, function() {
        var container = $(".under-header-menu");
        if($(container).is(':hover')){
            $(container).mouseleave(function(){
                if(!($(".hover-charac").is(':hover'))){
                    $(this).slideUp('300');
                }
            })
        }else {
            $(container).slideUp('300');
        }
    });
}); 


$(function(){
    $(".underListBridge").hover(function(){
        $(".insideUnder").slideDown('slow');
    });
    $(".underListBridge").mouseleave(function(){
        $(".insideUnder").slideUp('fast');
    });
});


