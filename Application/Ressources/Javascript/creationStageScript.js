//VARIABLES GLOBALES


var tabPage = 0;
var codeOrganisme;


//INSTRUCTIONS LANCEES AU CHARGEMENT


$('#choixOrganisme').hide();

if($('#choixOrganismeExistant').children('option').length === 0)
{
    $('#renseignementOrganisme .form-group:first-of-type').hide();
}


//FONCTIONS EVENEMENTIELLES


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
        
        if(tabPage === 2)
        {
            if($("#organismeExistant").is(':checked') === false)
            {
                $('#renseignementSignataire .form-group:first-of-type').hide();
                $('#renseignementTuteur .form-group:nth-child(3)').hide();
            }
        }
        
        if(tabPage ===3)
        {
            if($("#tuteurIdentique").is(':checked'))
            {
                donneMemeValeurTuteurQueSignataire();
            } 
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
        disabledInputAndRequiredNotCheckbox(tabPage);
        donneMemeValeurTuteurQueSignataire();        
        $('#tuteurExistant').parents('fieldset').addClass('disabled');
        $('#tuteurExistant').attr('disabled','true');
    }
    else
    {
        enabledInputAndRequiredNotCheckbox(tabPage);
        initInputTuteur();        
        enabledTuteurExistant();
    }
});

$("#organismeExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixOrganismeExistant').collapse('toggle');        
        disabledInputAndRequiredNotCheckbox(tabPage);
        $('#renseignementSignataire .form-group:first-of-type').show();
        
        $('#signataireExistant').removeAttr('checked');
        $('#containerChoixSignataireExistant').collapse('hide');
        
        $('#tuteurExistant').removeAttr('checked');
        $('#containerChoixTuteurExistant').collapse('hide');
        
        donneValeurOrganisme();
        cacheOptionSignataireCodeEntrepriseDifferent();        
        cacheOptionTuteurCodeEntrepriseDifferent();        
        signataireCodeEntrepriseDifferent();
        tuteurCodeEntrepriseDifferent();
    }
    else
    {
        $('#containerChoixOrganismeExistant').collapse('toggle');        
        enabledInputAndRequiredNotCheckbox(tabPage);
        enabledInputNotCheckbox(2);
        enabledInputNotCheckbox(3);
        $('#renseignementSignataire .form-group:first-of-type').hide();
        $('#renseignementTuteur .form-group:nth-child(3)').hide();
        initInputOrganisme();
        initInputSignataire();
        initInputTuteur();
        enabledTuteurIdentique();
        $('#tuteurIdentique').removeAttr('checked');
    }
});

$('#choixOrganismeExistant').change(function()
{
    $('#choixSignataireExistant').children().each(function()
    {
        $(this).show();
    });
    
    $('#choixTuteurExistant').children().each(function()
    {
        $(this).show();
    });
    
    donneValeurOrganisme();    
    cacheOptionSignataireCodeEntrepriseDifferent();    
    cacheOptionTuteurCodeEntrepriseDifferent();    
    signataireCodeEntrepriseDifferent();    
    tuteurCodeEntrepriseDifferent();
    initPageSignataire();
    initPageTuteur();
});

$("#signataireExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixSignataireExistant').collapse('toggle');        
        disabledInputAndRequiredNotCheckbox(tabPage);
        donneValeurSignataire();
        
        if($("#tuteurExistant").is(':checked') === false)
        {
            initPageTuteur();
        }        
    }
    else
    {
        $('#containerChoixSignataireExistant').collapse('toggle');        
        enabledInputAndRequiredNotCheckbox(tabPage);
        initInputSignataire();
        
        if($("#tuteurExistant").is(':checked') === false)
        {
            initPageTuteur();
        }
    }
});

$("#tuteurExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixTuteurExistant').collapse('toggle');        
        disabledInputAndRequiredNotCheckbox(tabPage);
        $('#tuteurIdentique').parents('fieldset').addClass('disabled');
        $('#tuteurIdentique').attr('disabled','true');        
        donneValeurTuteur();
        
    }
    else
    {
        $('#containerChoixTuteurExistant').collapse('toggle');        
        enabledInputAndRequiredNotCheckbox(tabPage);        
        initInputTuteur();        
        $('#tuteurIdentique').parents('fieldset').removeClass('disabled');
        $('#tuteurIdentique').removeAttr('disabled');
    }
});

$('#choixSignataireExistant').change(function()
{
    donneValeurSignataire();
});

$('#choixTuteurExistant').change(function()
{
    donneValeurTuteur();
});

setTimeout(function()
{
    $('.alert-container').fadeOut('slow');
}
, 4000);


//FONCTIONS

function enabledInputNotCheckbox(index)
{
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').removeClass('disabled');
    
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').removeProp('readonly');
}

function disabledInputNotCheckbox(index)
{
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').addClass('disabled');
    
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').prop('readonly', true);
}

function disabledInputAndRequiredNotCheckbox(index)
{
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').removeAttr('required');

    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').addClass('disabled');
    
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').prop('readonly', true);
}

function enabledInputAndRequiredNotCheckbox(index)
{
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').attr('required','true');

    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').removeClass('disabled');
    
    $('.tab-pane').eq(index).children().children('input')
    .not('input[type="checkbox"]').removeProp('readonly');
}

function initInputSignataire()
{
    $('#nomSignataire').val('');
    $('#prenomSignataire').val('');
    $('#telephoneSignataire').val('');
    $('#emailSignataire').val('');
    $('#fonctionSignataire').val('');
}

function initInputTuteur()
{
    $('#nomTuteur').val('');
    $('#prenomTuteur').val('');
    $('#telephoneTuteur').val('');
    $('#emailTuteur').val('');
    $('#fonctionTuteur').val('');
}

function initInputOrganisme()
{
    $('#nomOrganisme').val('');
    $('#metierPrincipal').val('');
    $('#adresseOrganisme').val('');
    $('#villeOrganisme').val('');
    $('#codePostalOrganisme').val('');
    $('#telephoneOrganisme').val('');
}

function donneValeurOrganisme()
{
    codeOrganisme = $('#choixOrganismeExistant option:selected').val();
    $('#nomOrganisme').val($('#choixOrganismeExistant option:selected').attr('data-nom').toString());
    $('#metierPrincipal').val($('#choixOrganismeExistant option:selected').attr('data-metierPrincipal').toString());
    $('#adresseOrganisme').val($('#choixOrganismeExistant option:selected').attr('data-adresse').toString());
    $('#villeOrganisme').val($('#choixOrganismeExistant option:selected').attr('data-ville').toString());
    $('#codePostalOrganisme').val($('#choixOrganismeExistant option:selected').attr('data-codePostal').toString());
    $('#telephoneOrganisme').val($('#choixOrganismeExistant option:selected').attr('data-telephone').toString());
}

function donneValeurSignataire()
{
    $('#nomSignataire').val($('#choixSignataireExistant option:selected').attr('data-nom').toString());
    $('#prenomSignataire').val($('#choixSignataireExistant option:selected').attr('data-prenom').toString());
    $('#telephoneSignataire').val($('#choixSignataireExistant option:selected').attr('data-telephone').toString());
    $('#emailSignataire').val($('#choixSignataireExistant option:selected').attr('data-email').toString());
    $('#fonctionSignataire').val($('#choixSignataireExistant option:selected').attr('data-fonction').toString());
}

function donneValeurTuteur()
{
    $('#nomTuteur').val($('#choixTuteurExistant option:selected').attr('data-nom').toString());
    $('#prenomTuteur').val($('#choixTuteurExistant option:selected').attr('data-prenom').toString());
    $('#telephoneTuteur').val($('#choixTuteurExistant option:selected').attr('data-telephone').toString());
    $('#emailTuteur').val($('#choixTuteurExistant option:selected').attr('data-email').toString());
    $('#fonctionTuteur').val($('#choixTuteurExistant option:selected').attr('data-fonction').toString());
}

function donneMemeValeurTuteurQueSignataire()
{
    $('#nomTuteur').val($('#nomSignataire').val());
    $('#prenomTuteur').val($('#prenomSignataire').val());
    $('#telephoneTuteur').val($('#telephoneSignataire').val());
    $('#emailTuteur').val($('#emailSignataire').val());
    $('#fonctionTuteur').val($('#fonctionSignataire').val());
}

function tuteurCodeEntrepriseDifferent()
{
    if($('#choixTuteurExistant').children('option[data-codeEntreprise="'+ codeOrganisme +'"]').length === 0)
    {
        $('#renseignementTuteur .form-group:nth-child(3)').hide();
    }
    else
    {
        $('#renseignementTuteur .form-group:nth-child(3)').show();
    }
}

function signataireCodeEntrepriseDifferent()
{
    if($('#choixSignataireExistant').children('option[data-codeEntreprise="'+ codeOrganisme +'"]').length === 0)
    {
        $('#renseignementSignataire .form-group:first-of-type').hide();
    }
    else
    {
        $('#renseignementSignataire .form-group:first-of-type').show();
    }
}

function cacheOptionSignataireCodeEntrepriseDifferent()
{
    $('#choixSignataireExistant').children().not('option[data-codeEntreprise="'+ codeOrganisme +'"]').each(function()
    {        
        $(this).hide();        
    });
}

function cacheOptionTuteurCodeEntrepriseDifferent()
{
    $('#choixTuteurExistant').children().not('option[data-codeEntreprise="'+ codeOrganisme +'"]').each(function()
    {
        $(this).hide();
    });
}

function initPageTuteur()
{
    $("#tuteurIdentique").removeAttr('checked');
    enabledInputNotCheckbox(3);
    initInputTuteur();
    enabledTuteurIdentique();
    enabledTuteurExistant();
    $('#tuteurExistant').removeAttr('checked');
    $('#containerChoixTuteurExistant').collapse('hide');
}

function initPageSignataire()
{
    enabledInputNotCheckbox(2);
    initInputSignataire();
    $('#signataireExistant').removeAttr('checked');
    $('#containerChoixSignataireExistant').collapse('hide');
    
}

function enabledTuteurIdentique()
{
    $('#tuteurIdentique').parents('fieldset').removeClass('disabled');
    $('#tuteurIdentique').removeAttr('disabled');
}

function enabledTuteurExistant()
{
    $('#tuteurExistant').parents('fieldset').removeClass('disabled');
    $('#tuteurExistant').removeAttr('disabled');
}