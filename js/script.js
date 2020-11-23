$(document).ready(function(){
    $("#autowidth").lightSlider({
        autowidth:true,
        loop:true,
        onSliderLoad:function(){
            $("#autowidth").removeclass("cs-hidden");
        }
    })

});