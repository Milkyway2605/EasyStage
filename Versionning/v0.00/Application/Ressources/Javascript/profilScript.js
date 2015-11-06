var classComponent;
var ariaExpanded;

$('.collapse').on("hide.bs.collapse",function() {

    classComponent = $(this).attr('data-sibling');
    $(classComponent).removeClass('hide');   
});

$('.collapse').on("show.bs.collapse",function() {

    classComponent = $(this).attr('data-sibling');
    $(classComponent).addClass('hide');   
});

