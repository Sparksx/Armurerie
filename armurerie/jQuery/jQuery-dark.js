$(function() {
    $('#OS2_armurerie.dark .tooltip').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text: $(this).attr('title')
            },
            style: {
                width: 180,
                textAlign: 'center',
                tip: 'topMiddle',
                name: 'dark'
            },
            position: {
                corner: {
                    target: 'bottomMiddle',
                    tooltip: 'topMiddle'
                }
            }
        });
    });
    
    
    // Tooltip de la barre d'xp'
    $('#OS2_armurerie.dark #infosPerso #niveau[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#popStats #'+$(this).attr('tooltip')+':first')
            },
            position: {
                corner: {
                    target: 'bottomMiddle',
                tooltip: 'topMiddle'
                }
            },
            style: {
                width: 520,
                padding: 5,
                tip: 'topMiddle',
                name: 'dark'
            }
        });
    });
    
    
    // On affiche les pops des dofus a droite
    $('#OS2_armurerie.dark #armurerie #dofus div[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#statsItem #b'+$(this).attr('tooltip')+':first')
            },
            position: {
                corner: {
                    target: 'rightMiddle',
                    tooltip: 'leftMiddle'
                }
            },
            style: {
                width: 370,
                padding: 5,
                tip: 'leftMiddle',
                name: 'dark'
            }
        });
    });
    // on affiche les autres pops a gauche
    $('#OS2_armurerie.dark #armurerie #onPerso div[tooltip], #OS2_armurerie.dark #armurerie #itemRight div[tooltip]').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text : $('#statsItem #b'+$(this).attr('tooltip')+':first')
            },
            position: {
                corner: {
                    target: 'leftMiddle',
                    tooltip: 'rightMiddle'
                }
            },
            style: {
                width: 370,
                padding: 5,
                tip: 'rightMiddle',
                name: 'dark'
            }
        });
    });
});