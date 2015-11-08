var id = 0;
var email = "";
var td;

$('.confirm').click(function()
{
    id = $(this).parent('span').parents('td').parent('tr').attr('id');
    email = $(this).parent('span').parent('td').siblings('td[data-label="Etudiant"]').attr('id');
    tr = $(this).parent('span').parents('td').parent('tr');
    $.ajax(
    {
        type: 'get',
        url: 'Application/Features/modifieStatut.php',
        data: {statut: 1, id: id, email: email},
        success: function() 
        {
            tr.children('td')
                    .first()
                    .children('span')
                    .children('span')
                    .removeClass('label-warning')
                    .addClass('label-success')
                    .text("Validé");
    
            tr.animate({backgroundColor: "#D3EAC9"},300,function()
            {
                tr
                .children('td, th')
                .animate({ paddingBottom: 0, paddingTop: 0 })
                .wrapInner('<div />')
                .children()
                .slideUp(500,function() { $(this).closest('tr').remove(); });
            });          
        }
    });
});

$('.refuse').click(function()
{
    id = $(this).parent('span').parents('td').parent('tr').attr('id');
    email = $(this).parent('span').parent('td').siblings('td[data-label="Etudiant"]').attr('id');
    tr = $(this).parent('span').parents('td').parent('tr');
    $.ajax(
    {
        type: 'get',
        url: 'Application/Features/modifieStatut.php',
        data: {statut: -1, id: id, email: email},
        success: function() 
        {
            tr.children('td')
                    .first()
                    .children('span')
                    .children('span')
                    .removeClass('label-warning')
                    .addClass('label-danger')
                    .text("Refusé");

            
            tr.animate({backgroundColor: "#EBCCCC"},300,function()
            {
                tr
                .children('td, th')
                .animate({ paddingBottom: 0, paddingTop: 0 })
                .wrapInner('<div />')
                .children()
                .slideUp(500,function() { $(this).closest('tr').remove(); });
            });          
        }
    });
});

