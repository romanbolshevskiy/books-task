
/*slider recommends courses*/
size = $(".slider .item").size();
x=3;
if(size <=x) {$('#next').hide();}
$('.slider .item:lt('+ (x) +')').css('display','inline-block');

if(x-3<=0){
    $('#prev').hide();
}
$('#next').click(function () {
    if(x+3 < size){
        x=x+3;
        $('.slider .item:lt('+x+')').css('display','inline-block');
        $('.slider .item:lt('+ (x-3) +')').hide(0);
    }
    else{
        y=size-x;
        x=x+3;
        $('.slider .item:lt('+ (size) +')').css('display','inline-block');
        $('.slider .item:lt('+(size-y)+')').hide(0);
        $(this).hide(0);
    }
    $('#prev').show();
});

$('#prev').click(function () {
    if(x-3<=3){
        x=x-3;
        $(this).hide(0);
    }
    else{
        x=x-3;      
    }
    $('.slider .item').not(':lt('+(x-3)+')').css('display','inline-block');
    $('.slider .item').not(':lt('+(x)+')').hide();
    $('#next').show();
});


$( "#check1" ).blur(function() {
  $( "#search" ).toggle();
});
$( "#check2" ).blur(function() {
  $( "#search2" ).toggle();
});
$( "#check3" ).blur(function() {
  $( "#search3" ).toggle();
});