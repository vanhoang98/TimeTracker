jQuery(function($){
  $(".item-dropdown").on("click", function() {
    $(this).next().slideToggle();
    $(this).toggleClass("active-up-arrow");
    $('.item-tree').toggleClass("height-tree-update");
  });

  $(".item-droplist").next().stop().slideToggle();
  
  $(".item-droplist").on("click", function() {
    $(this).next().slideToggle();
    $(this).toggleClass("active-arrow");
  });
});