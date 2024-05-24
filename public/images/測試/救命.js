$(function(){
    var collection = $(".topbustype2");
    $.each(collection,function(){
    $(this).addClass("start");
    });
    clickevent(ce);

   });

   //单击事件
   function clickevent(ce){
    var collection = $(".topbustype");
    $.each(collection,function(){
    $(this).removeClass("end");
    $(this).addClass("start");
    });
    $(cli).removeClass("start");
    $(cli).addClass("end");

   }