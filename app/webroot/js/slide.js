$current_num = 1;

$(function(){
	$("span#prev").hide();
	$max = $("ul#thumb li").length-1;
	$("ul#slide li").eq(0).addClass("view");
	$("ul#thumb li").eq(0).addClass("active");
	
	$current_num = 0;
	
	$("span#next").click(function() {
		if($current_num < $max) {
			show(++$current_num);
		}
	});
	
	$("span#prev").click(function() {
		if($current_num > 0) {
			show(--$current_num);
		}
	});
	
	$("ul#thumb li").click(function() {
		var $click_num = $('ul#thumb li').index(this);
		$current_num = $click_num;
		show($click_num);
	});
	
	function show($num) {
		$("ul#thumb li").removeClass("active");
		$("ul#thumb li").eq($num).addClass("active");
		$("ul#slide li").removeClass("view");
		$("ul#slide li").eq($num).addClass("view");
	
		if($current_num == 0) {
			$("span#prev").hide();
			$("span#next").show();
		} else if(0<$current_num && $current_num < $max) {
			$("span#prev").show();
			$("span#next").show();
		}else if($current_num == $max) {
			$("span#prev").show();
			$("span#next").hide();
		}
	}
});