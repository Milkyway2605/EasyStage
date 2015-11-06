var classComponent;

$('.collapse').on("hide.bs.collapse",function() {

    classComponent = $(this).attr('data-sibling');
    $(classComponent).fadeIn();
});

$('.collapse').on("show.bs.collapse",function() {

    classComponent = $(this).attr('data-sibling');
    $(classComponent).fadeOut();   
});

