$(function() {
    $('#OS2_armurerie .tooltip').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text: $(this).attr('title')
            },
            position: {
                at: 'bottom center',
                my: 'top center'
                
            },
            style: {
				widget: false,
				def: false,
				classes: 'OS2popStatsPerso'
            }
        });
    });
//    
//    
//    // Tooltip de la barre d'xp'
    $('#OS2_armurerie #infosPerso #niveau[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#popStats #'+$(this).attr('tooltip')+':first')
            },
            position: {
				at: 'bottom center',
				my: 'top center'
            },
            style: {
				widget: false,
				def: false,
				classes: 'OS2popStatsGlobalPerso'
            }
        });
    });
//    
//    
//    // On affiche les pops des dofus a droite
    $('#OS2_armurerie #armurerie #dofus div[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#statsItem #b'+$(this).attr('tooltip')+':first')
            },
            position: {
				at : 'right center',
				my : 'left center'
            },
            style: {
				widget: false,
				def: false,
				classes: 'OS2popItems'
            }
        });
    });
//    
//    
//    // on affiche les autres pops a gauche
    $('#OS2_armurerie #armurerie #onPerso div[tooltip], #OS2_armurerie #armurerie #itemRight div[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#statsItem #b'+$(this).attr('tooltip')+':first')
            },
            position: {
				at: 'left center',
				my: 'right center'
            },
            style: {
				widget: false,
				def: false,
				classes: 'OS2popItems'
            }
        });
    });
});