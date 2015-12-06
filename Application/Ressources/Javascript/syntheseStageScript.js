var oTable;

oTable = $('#listeStages').DataTable(
{
    "info":        false,
    "paging":      false,
    "order": [[ 1, "asc" ]],
    "columnDefs": [ { "targets": 0, "orderable": false } ],
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

$('#section').change( function() 
{ 
    oTable.columns(2).search($('#section option:selected').val()).draw();
});

$('#classe').change( function() 
{ 
    oTable.columns(2).search($('#classe option:selected').val()).draw();
});

$('#periode').change(function () {
    oTable.columns(6).search($('#periode option:selected').val()).draw();
} );

$('#stage').change(function () {
    oTable.columns(7).search($('#stage option:selected').val()).draw();
} );

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
        $('#classe').empty();
        $('#classe').append('<option value="">Toutes</option>');
        
        $('#periode').attr('disabled','true');
        $('#periode').empty();
        $('#periode').append('<option>Pas de période disponible</option>');
    }    
});

$('#classe').change(function()
{
    if($('#classe option:selected').val() !== "")
    {
        changePeriode();
        $('#periode').removeAttr('disabled');
    }
    else
    {
        $('#periode').attr('disabled','true');
        $('#periode').empty();
        $('#periode').append('<option>Pas de période disponible</option>');
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

function changePeriode()
{
    var classe = $('#classe option:selected').val();
    var section = classe.substring(0,classe.length - 1);
    var niveau = classe.substring(classe.length - 1,classe.length);
    
    $.ajax(
    {
        type: 'post',
        url: 'Application/Features/donnePeriodeStageSelonClasse.php',
        data: {libelleSection: section, niveau: niveau},
        dataType : 'html',
        success: function(data) 
        {
            $('#periode').empty();
            $('#periode').append(data);
        }
    });
}