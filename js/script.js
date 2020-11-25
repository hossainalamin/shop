$(document).ready(function(){
    $("#autowidth").lightSlider({
        autowidth:true,
        loop:true,
        onSliderLoad:function(){
            $("#autowidth").removeClass("cs-hidden");
        }
    })

});
