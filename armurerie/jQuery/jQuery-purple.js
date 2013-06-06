$(function() {
    $('#OS2_armurerie.purple .tooltip').each(function(){
        if($(this).data("qtip")) $(this).qtip("destroy");
        $(this).qtip({
            content: {
                text: $(this).attr('title')
            },
            style: {
                width: 180,
                textAlign: 'center',
                tip: 'topMiddle',
                background: '#AB8CAE',
                color: 'black',
                border: {
                    color: '#57495C'
                },
                name: 'red'
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
    $('#OS2_armurerie.purple #infosPerso #niveau[tooltip]').each(function(){
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
                background: '#AB8CAE',
                border: {
                    color: '#57495C'
                },
                name: 'dark'
            }
        });
    });
    
    // On affiche les pops des dofus a droite
    $('#OS2_armurerie.purple #armurerie #dofus div[tooltip]').each(function(){
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
                background: '#AB8CAE',
                color: 'black',
                border: {
                    color: '#57495C'
                },
                name: 'red'
            }
        });
    });
    // on affiche les autres pops a gauche
    $('#OS2_armurerie.purple #armurerie #onPerso div[tooltip], #OS2_armurerie.purple #armurerie #itemRight div[tooltip]').each(function(){
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
                background: '#AB8CAE',
                color: 'black',
                border: {
                    color: '#57495C'
                },
                name: 'red'
            }
        });
    });
});