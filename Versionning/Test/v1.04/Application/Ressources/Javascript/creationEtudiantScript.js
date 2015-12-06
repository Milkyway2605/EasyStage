var tabPage = 0;
changeNiveau();

function changeNiveau()
{
    var nbNiveau = parseInt($('#section option:selected').attr('data-nbNiveau'));
    var suffixe = "ère";

    for(var i = 1 ; i < nbNiveau + 1 ; i++)
    {
        if( i !== 1)
        {
            suffixe = "ème";
        }
        $('#niveau').append('<option value="'+ i +'">'+ i + suffixe +' année</option>');
    }
}

$('#btnNext').click(function(e)
{   
    if($('#creerEtudiant')[0].checkValidity() === true)
    {
        e.preventDefault();

        if(tabPage === 0)
        {
            if($('#password').val() !== $('#passwordConfirmation').val())
            {
                $('#password, #passwordConfirmation').css('border-color','#E78174');
            }
            else
            {                
                $('#password, #passwordConfirmation').removeAttr('style');
                
                if(tabPage < 3)
                {
                    tabPage = tabPage + 1;
                }

                if(tabPage > 0)
                {
                    $('.tab-pane').eq(tabPage).children().children('input')
                    .attr('required','true');
                }

                if(tabPage === 1)
                {
                    $('#masculin').attr('required','true');
                    $('#feminin').attr('required','true');
                }

                if(tabPage === 3)
                {
                    $('#btnNext').addClass('inactive');
                    $('#btnCreerEtudiant').removeClass('hide');
                }
                else
                {
                    $('#btnPrevious').removeClass('inactive');
                }
                $('.nav-tabs > .active').next('li').find('a').tab('show');
            }
        }
        else
        {
            if(tabPage < 3)
            {
                tabPage = tabPage + 1;
            }

            if(tabPage > 0)
            {
                $('.tab-pane').eq(tabPage).children().children('input')
                .attr('required','true');
            }

            if(tabPage === 1)
            {
                $('#masculin').attr('required','true');
                $('#feminin').attr('required','true');
            }

            if(tabPage === 3)
            {
                $('#btnNext').addClass('inactive');
                $('#btnCreerEtudiant').removeClass('hide');
            }
            else
            {
                $('#btnPrevious').removeClass('inactive');
            }
            
            $('.nav-tabs > .active').next('li').find('a').tab('show');
        }
    }
});

$('#btnPrevious').click(function()
{
    if(tabPage === 1)
    {
        $('#masculin').removeAttr('required');
        $('#feminin').removeAttr('required');
    }

    if(tabPage > 0)
    {
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('required');
        tabPage = tabPage - 1;
    }
    
    if(tabPage === 2)
    {
        $('#btnCreerEtudiant').addClass('hide');
    }
    
    if(tabPage === 0)
    {
        $('#btnPrevious').addClass('inactive');
    }
    else
    {
        $('#btnNext').removeClass('inactive');
    }
    
    $('.nav-tabs > .active').prev('li').find('a').tab('show');
});

$('a.step').click(function(e)
{
    e.preventDefault();
});

$('#section').change(function()
{
    $('#niveau').empty();
    changeNiveau();
});

setTimeout(function()
{
    $('.alert-container').fadeOut('slow');
}
, 4000);
