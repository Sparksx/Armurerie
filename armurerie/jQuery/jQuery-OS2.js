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