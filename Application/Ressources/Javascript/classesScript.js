changeAnnee();

//function changeNiveau()
//{
//    var nbNiveau = parseInt($('#section option:selected').attr('data-nbNiveau'));
//    var suffixe = "ère";
//
//    for(var i = 1 ; i < nbNiveau + 1 ; i++)
//    {
//        if( i !== 1)
//        {
//            suffixe = "ème";
//        }
//        $('#niveau').append('<option value="'+ i +'">'+ i + suffixe +' année</option>');
//    }
//}
//
//$('#section').change(function()
//{
//    $('#niveau').empty();
//    changeNiveau();
//});

function changeAnnee()
{
    var annee = parseInt($('#annee option:selected').val());
    
    $.ajax(
    {
        url: 'Application/Features/modifieStatut.php',
        type: 'get',        
        data: {id : annee},
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
    changeAnnee();
});