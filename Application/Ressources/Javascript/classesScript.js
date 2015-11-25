changeSection();
changeNiveau();

function changeSection()
{
    var annee = parseInt($('#annee option:selected').val());
    
    $.ajax(
    {
        url: 'Application/Features/donneSectionSelonAnnee.php',
        type: 'post',        
        data: {anneeScolaire : annee},
        dataType : 'html',
        success: function(data) 
        {
           $('#section').html(data);
        }
    });
}

$('#annee').change(function()
{
    $('#section').empty();
    changeSection();
});

function changeNiveau()
{
    var annee = parseInt($('#annee option:selected').val());
    var codeSection = $('#section option:first-child').val();
    
    $.ajax(
    {
        url: 'Application/Features/donneNiveauSelonSectionEtAnnee.php',
        type: 'post',        
        data: {anneeScolaire : annee, codeSection: codeSection},
        dataType : 'html',
        success: function(data) 
        {
           $('#niveau').html(data);
        }
    });
}

$('#section').change(function()
{
    $('#niveau').empty();
    changeNiveau();
});