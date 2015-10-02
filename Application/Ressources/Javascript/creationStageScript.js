var tabPage = 0;
$('#choixOrganisme').hide();

$('#btnNext').click(function(e)
{   
    if($('#creerStage')[0].checkValidity() === true)
    {
        e.preventDefault();
        
        if(tabPage < 4)
        {
            tabPage = tabPage + 1;
        }
        
        if(tabPage > 0)
        {
            $('.tab-pane').eq(tabPage).children().children('input')
            .not('input[type="checkbox"]').attr('required','true');
        }

        if(tabPage === 4)
        {
            $('#btnNext').addClass('inactive');
            $('#btnCreerStage').removeClass('hide');
        }
        else
        {
            $('#btnPrevious').removeClass('inactive');
        }

        $('.nav-tabs > .active').next('li').find('a').tab('show');
    }
});

$('#btnPrevious').click(function()
{

    if(tabPage > 0)
    {
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('required');
        tabPage = tabPage - 1;
    }
    
    if(tabPage === 3)
    {
        $('#btnCreerStage').addClass('hide');
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

$("#tuteurIdentique").change(function() {
    if(this.checked) 
    {
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('required');

        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').attr('disabled','true');

        $('#nomTuteur').val($('#nomSignataire').val());
        $('#telephoneTuteur').val($('#telephoneSignataire').val());
        $('#emailTuteur').val($('#emailSignataire').val());
        $('#fonctionTuteur').val($('#fonctionSignataire').val());
    }
    else
    {
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').attr('required','true');

        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('disabled');

        $('#nomTuteur').val('');
        $('#telephoneTuteur').val('');
        $('#emailTuteur').val('');
        $('#fonctionTuteur').val('');
    }
});

$("#organismeExistant").change(function() {
    if(this.checked) 
    {
        $('#containerPeriodeStage').collapse('toggle');
        
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('required');

        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').attr('disabled','true');
        
    }
    else
    {
        $('#containerPeriodeStage').collapse('toggle');
        
        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').attr('required','true');

        $('.tab-pane').eq(tabPage).children().children('input')
        .not('input[type="checkbox"]').removeAttr('disabled');
    }
});