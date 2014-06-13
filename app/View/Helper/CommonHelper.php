<?php
 
App::uses('AppHelper', 'View/Helper');
 
class CommonHelper extends AppHelper {

	function category($param) {
		switch($param) {
			case 'report' : return 'イベント';
			case 'majiaho' : return 'マジアホ';
			case 'interview' : return 'インタビュー';
			case 'sightseeing' : return '名物・名所';
		}
	}
	
	function status($param) {
		switch($param) {
			case 0 : return '原稿中';
			case 1 : return '原稿完了、校正待ち';
			case 2 : return '校正完了、ストック';
			case 3 : return '公開予約済み';
			case 4 : return '公開中';
		}
	}
	
	function status_css($param) {
		switch($param) {
			case 0 : return 'default';
			case 1 : return 'primary';
			case 2 : return 'success';
			case 3 : return 'warning';
			case 4 : return 'danger';
		}
	}
	
	function convert_to_fuzzy_time($time_db){
    $unix   = strtotime($time_db);
    $now    = time();
    $diff_sec   = $now - $unix;

    if($diff_sec < 60){
        $time   = $diff_sec;
        $unit   = "秒前";
    }
    elseif($diff_sec < 3600){
        $time   = $diff_sec/60;
        $unit   = "分前";
    }
    elseif($diff_sec < 86400){
        $time   = $diff_sec/3600;
        $unit   = "時間前";
    }
    elseif($diff_sec < 2764800){
        $time   = $diff_sec/86400;
        $unit   = "日前";
    }
    else{
        if(date("Y") != date("Y", $unix)){
            $time   = date("Y年n月j日", $unix);
        }
        else{
            $time   = date("n月j日", $unix);
        }

        return $time;
    }

    return (int)$time .$unit;
	}
   
}
?>