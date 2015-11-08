
//Fichier Javascript de base pour toutes les vues "Application"



//Evenement d'affichage du menu sur petit écran avec clic sur le bouton de menu

var estAfficher = false;

//Fonction Jquery
$(function()
{    
    //Quand l'utilisateur clique sur le bouton de menu
    $('#menuButton').click(function() {
        
        //Si le menu n'est pas affiché
        if(estAfficher === false)
        {
            //On modifie les propriétés CSS de .pageContainer aside et .pageContaiser aside .panel
            $('.pageContainer aside, .pageContainer aside .panel').css('margin-left','0');
            $('section').css('margin-left','220px');
            $('footer').css('margin-left','220px');
            estAfficher = true;
        }
        //Si le menu est affiché
        else
        {            
            $('.pageContainer aside, .pageContainer aside .panel').css('margin-left','-220px');
            $('section').css('margin-left','0');
            $('footer').css('margin-left','0');
            estAfficher = false;
        }
    });
});

//Suppression des propriétés CSS lorsque l'on quitte un petit écran

$(window).resize(function() {

    if($(window).width() > 767)
    {
        $('.pageContainer aside, .pageContainer aside .panel, section, footer').removeAttr('style');
    }

});
