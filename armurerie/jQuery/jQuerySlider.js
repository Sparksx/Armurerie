$(function() {
    
    var $Slides = $("#slides");
    $Slides.find("div[class*='vueArmurerie']").each(function(){
        $(this).css("width", "600px");
    });
    
    $Slides.data("step", $Slides.find("div[class*='vueArmurerie']:first").width()+2);
    
	$Slides
        .data("currentSlide",1)
        .data("nbSlides",$Slides.find("div[class*='vueArmurerie']").size());
	$Slides
        .find("div[class*='vueArmurerie']:last")
        .clone()
        .prependTo($Slides);
 
	$Slides
        .find("div[class*='vueArmurerie']:first")
        .next()
        .clone()
        .appendTo($Slides);
 
	$Slides		
        .find("div[class*='vueArmurerie']:first")
        .addClass("clone")
        .end()
        .find("div[class*='vueArmurerie']:last")
        .addClass("clone")
        .end()
        .css({marginLeft:-$Slides.data("step")});
 
	$Slides.width($Slides.find("div[class*='vueArmurerie']").size()*($Slides.data("step")+1));
 
	$("#nextSlide").bind("click", nextSlide);
	$("#prevSlide").bind("click", prevSlide);
    
    function nextSlide(){
        var $Slides = $("#slides");
        $Slides.animate(
            {marginLeft:"-="+$Slides.data("step")+"px"},
            1000,
            function(){
                $Slides.data("currentSlide",$Slides.data("currentSlide")+1);
                if($Slides.data("currentSlide") > $Slides.data("nbSlides")){
                    $Slides
                        .data("currentSlide",1)
                        .css({marginLeft:"-"+$Slides.data("step")+"px"});

                }
            }
        );
    }
    
    function prevSlide(){
        var $Slides = $("#slides");
        $Slides.animate(
            {marginLeft:"+="+$Slides.data("step")+"px"},
            1000,
            function(){
                $Slides.data("currentSlide",$Slides.data("currentSlide")-1);
                if($Slides.data("currentSlide") == 0){
                    $Slides
                        .data("currentSlide",$Slides.data("nbSlides"))
                        .css({marginLeft:-($Slides.data("step")*$Slides.data("currentSlide"))});
                }
            }
        );
    }
});


 
