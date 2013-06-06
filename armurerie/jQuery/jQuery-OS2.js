$(function() {
    
    $("head").append(
        $(document.createElement("link")).attr({rel:"stylesheet", type:"text/css", href:"/armurerie/styles/static.css"})
    );
        
    if($('#OS2_armurerie').length) {
        $("head").append(
            $(document.createElement("link")).attr({rel:"stylesheet", type:"text/css", href:"/armurerie/styles/"+ $('#OS2_armurerie').attr('class') +".css"})
        );
    }
    else if($('#recherche').length) {
        $("head").append(
            $(document.createElement("link")).attr({rel:"stylesheet", type:"text/css", href:"/armurerie/styles/"+ $('#recherche').attr('class') +".css"})
        );
    }
    
    $('#personnalisation div').each(function(){
        $(this).click(function(){
            if(!$("head link[href*=\""+$(this).attr('class')+"\"]").length) {
               $("head").append(
                    $(document.createElement("link")).attr({rel:"stylesheet", type:"text/css", href:"/armurerie/styles/"+ $(this).attr('class') +".css"})
                ); 
            }
            $('#OS2_armurerie').attr('class', $(this).attr('class'));
            $('#recherche').attr('class', $(this).attr('class'));
            
//            if(!$("body script[src*=\""+$(this).attr('class')+"\"]").length) {
                var clas = $(this).attr('class');
                $("body").append($("<script />", {
                    src: "/armurerie/jQuery/jQuery-"+ clas +".js",
                    type: "text/javascript"
                }));
//            }
            
            var today = new Date(), expires = new Date();
            expires.setTime(today.getTime() + (365*24*60*60*1000));
            document.cookie = "style=" + encodeURIComponent($(this).attr('class')) + ";expires=" + expires.toGMTString();
        });
    });
    
    
    var clone = null;
    var left = 50;
    var i = 0;
    do {
        clone = $("#separate").clone();
        clone.css("margin-left", left);
        clone.insertBefore($('#separate'));
        left += 50;
        i++;
    } while (i < 9);
    
});