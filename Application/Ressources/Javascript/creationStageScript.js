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
        disabledInputNotCheckbox();
        donneMemeValeurTuteurQueSignataire();        
        $('#tuteurExistant').parents('fieldset').addClass('disabled');
        $('#tuteurExistant').attr('disabled','true');
    }
    else
    {
        enabledInputNotCheckbox();
        initInputTuteur();        
        $('#tuteurExistant').parents('fieldset').removeClass('disabled');
        $('#tuteurExistant').removeAttr('disabled');
    }
});

$("#organismeExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixOrganismeExistant').collapse('toggle');        
        disabledInputNotCheckbox();
        $('#renseignementSignataire .form-group:first-of-type').show();
        donneValeurOrganisme();
        cacheOptionSignataireCodeEntrepriseDifferent();        
        cacheOptionTuteurCodeEntrepriseDifferent();        
        signataireCodeEntrepriseDifferent();
        tuteurCodeEntrepriseDifferent();
    }
    else
    {
        $('#containerChoixOrganismeExistant').collapse('toggle');        
        enabledInputNotCheckbox();
        $('#renseignementSignataire .form-group:first-of-type').hide();
        $('#renseignementTuteur .form-group:nth-child(3)').hide();
        initInputOrganisme();
        initInputSignataire();
        initInputTuteur();
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
});

$("#signataireExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixSignataireExistant').collapse('toggle');        
        disabledInputNotCheckbox();
        donneValeurSignataire();      
    }
    else
    {
        $('#containerChoixSignataireExistant').collapse('toggle');        
        enabledInputNotCheckbox();
        initInputSignataire();
    }
});

$("#tuteurExistant").change(function() {
    if(this.checked) 
    {
        $('#containerChoixTuteurExistant').collapse('toggle');        
        disabledInputNotCheckbox();
        $('#tuteurIdentique').parents('fieldset').addClass('disabled');
        $('#tuteurIdentique').attr('disabled','true');        
        donneValeurTuteur();
        
    }
    else
    {
        $('#containerChoixTuteurExistant').collapse('toggle');        
        enabledInputNotCheckbox();        
        initInputTuteur();        
        $('#tuteurIdentique').parents('fieldset').removeClass('disabled');
        $('#tuteurIdentique').removeAttr('disabled');
    }
});






//FONCTIONS

function disabledInputNotCheckbox()
{
    $('.tab-pane').eq(tabPage).children().children('input')
    .not('input[type="checkbox"]').removeAttr('required');

    $('.tab-pane').eq(tabPage).children().children('input')
    .not('input[type="checkbox"]').attr('disabled','true');
}

function enabledInputNotCheckbox()
{
    $('.tab-pane').eq(tabPage).children().children('input')
    .not('input[type="checkbox"]').attr('required','true');

    $('.tab-pane').eq(tabPage).children().children('input')
    .not('input[type="checkbox"]').removeAttr('disabled');
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