$('body').css('visibility', 'hidden');
$('#htmlPage').css('overflow', 'hidden');
$('#loadingDiv').css('visibility', 'visible');
$(window).on('load', function(){
  $('#htmlPage').css('overflow', 'scroll');
  $('body').css('visibility', 'visible');
  setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#loadingDiv" ).fadeOut(500, function() {
      // fadeOut complete. Remove the loading div
    $( "#loadingDiv" ).remove(); //makes page more lightweight 
  });  
}