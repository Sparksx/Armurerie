$(function() {
    $('#OS2_armurerie.silver .tooltip').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text: $(this).attr('title')
            },
            style: {
                width: 180,
                textAlign: 'center',
                tip: 'topMiddle',
                background: '#FAFAFA',
                border: {
                    color: '#9a9a9a'
                },
                name: 'light'
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
    $('#OS2_armurerie.silver #infosPerso #niveau[tooltip]').each(function(){
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
                color: 'black',
                background: '#FAFAFA',
                border: {
                    color: '#9a9a9a'
                },
                name: 'dark'
            }
        });
    });
    
    
    // On affiche les pops des dofus a droite
    $('#OS2_armurerie.silver #armurerie #dofus div[tooltip]').each(function(){
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
                background: '#FAFAFA',
                border: {
                    color: '#9a9a9a'
                },
                name: 'light'
            }
        });
    });
    // on affiche les autres pops a gauche
    $('#OS2_armurerie.silver #armurerie #onPerso div[tooltip], #OS2_armurerie.silver #armurerie #itemRight div[tooltip]').each(function(){
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
                background: '#FAFAFA',
                border: {
                    color: '#9a9a9a'
                },
                name: 'light'
            }
        });
    });
});