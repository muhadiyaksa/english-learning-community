
$(function(){
 
	$("#kepala").css({"position":"relative", "bottom":"0px", "left":"0px"})
	function awan(){
		$('#kepala').animate({"background-position":"-=1024px"}, 10000,
		function(){
			$("#kepala").css({"background-position":"-=0px"});
			awan()
		}
		)
	}
	awan();
})

  
window.onscroll = function(){scrollFunction()};

function scrollFunction(){
    if(document.body.scrollTop >20 || document.documentElement.scrollTop>20){
      document.getElementById("navigasi").style.top = "0";
    } 
    else {
      document.getElementById("navigasi").style.top = "-75px";
    }
}
