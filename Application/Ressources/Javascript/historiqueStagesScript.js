var oTable;

oTable = $('#listeStages').DataTable(
{
    "info":        false,
    "paging":      false,
    language: {
        processing:     "Traitement en cours...",
        search:         "Rechercher&nbsp;:",
        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }    
});

$('#select').change(function () {
    oTable
        .columns(1).search($('#stage option:selected').val()).draw();
} );

//$('#section').change( function() 
//{ 
//    oTable.fnFilter($(this).val());
//});
//
//$('#classe').change( function() 
//{ 
//    oTable.fnFilter($(this).val());
//});
//
//$('#annee').change( function() 
//{ 
//    oTable.fnFilter($(this).val());
//});
//
//$('#stage').change( function() 
//{ 
//    oTable.fnFilter($(this).val());
//});

$('#section').change(function()
{
    if($('#section option:selected').val() !== "")
    {
        $('#classe').empty();
        $('#classe').append('<option value="">Toutes</option>');
        changeNiveau();
        $('#classe').removeAttr('disabled');
    }
    else
    {
        $('#classe').attr('disabled','true');
    }    
});

function changeNiveau()
{
    if($('#section option:selected').val() !== "")
    {
        var nbNiveau = parseInt($('#section option:selected').attr('data-nbNiveau'));
        var section = $('#section option:selected').val();

        for(var i = 1 ; i < nbNiveau + 1 ; i++)
        {
            var classe = section + i;
            $('#classe').append('<option value="'+ classe +'">'+ classe +'</option>');
        }
    }
}