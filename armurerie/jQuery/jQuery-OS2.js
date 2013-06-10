$(function() {
    
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