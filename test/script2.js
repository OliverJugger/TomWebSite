$(".carousel__item").hover( function() {
  
      var value=$(this).attr('data-src');
      $(".carousel__bg img").attr("src", value);
  
});