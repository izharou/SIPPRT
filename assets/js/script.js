$(document).ready(function(){
  console.log('JavaScript Siap');
  $('#example').DataTable({

  });

});

// Paralax
$(window).scroll(function() {
  var wScroll = $(this).scrollTop();

  $('#list-tab').css({
    'transform' : 'translate(0px,' + wScroll + 'px)'
  })
});
