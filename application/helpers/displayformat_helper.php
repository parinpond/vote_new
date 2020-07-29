<?php
/*  displayformat
 *  Write By Parinpond Lagsongnoen YIM :)
 *  At Production (12/9/2014)
 */
function status($status){
if(!empty($status)){
    switch ($status) {
        case 'P':
            $status_name = 'กำลังดำเนินการยื่นเอกสาร'; break;
        case 'PC':
            $status_name = 'รอหัวหน้าเครดิตตรวจสอบ'; break;
        case 'A':
            $status_name = 'อนุมัติ'; break;       
        case 'PS':
            $status_name = 'รอเซ็นสัญญา'; break;
        case 'S':
            $status_name = 'เสร็จเรียบร้อย'; break;
        case 'R':
            $status_name = 'ปฏิเสธ'; break;
       
        default:
            $status_name = 'Unknown'; break;
    }
    return $status_name;
    }
}
function alert(){
    $arg_list = func_get_args();
    foreach ($arg_list as $k => $v){
            print "<pre>";
            print_r( $v );
            print "</pre>";
    }
}

function check_empty($data=""){
     $a = trim($data);
     $d = (empty($a)) ? "-" : $a;   
     return $d;
}

function gender($data){
     $d = ($data=="W") ? "หญิง" : "ชาย";   
     return $d;
}
function thaiDay($day){
    switch ($day) {
        case 'Mon': return "วันจันทร์";
        case 'Tue': return "วันอังคาร";
        case 'Wed': return "วันพุธ";
        case 'Thu': return "วันพฤหัสบดี";
        case 'Fri': return "วันศุกร์";
        case 'Sat': return "วันเสาร์";
        case 'Sun': return "วันอาทิตย์";
        default: return $day;
    }
}
function thaiMonth() {
    $result = array('01'=>'มกราคม',
        '02'=>'กุมภาพันธ์',
        '03'=>'มีนาคม',
        '04'=>'เมษายน',
        '05'=>'พฤษภาคม',
        '06'=>'มิถุนายน',
        '07'=>'กรกฎาคม',
        '08'=>'สิงหาคม',
        '09'=>'กันยายน',
        '10'=>'ตุลาคม',
        '11'=>'พฤศจิกายน',
        '12'=>'ธันวาคม');
    return $result;
}
function day_show() {
    $result = array('01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05',
        '06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10',
        '11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15',
        '16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20',
        '21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25',
        '26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'
        );
    return $result;
}
function thaiMonth_show($m){
        $m = (int)$m;
        switch ($m) {
            case '01': return "มกราคม";
            case '02': return "กุมภาพันธ์";
            case '03': return "มีนาคม";
            case '04': return "เมษายน";
            case '05': return "พฤษภาคม";
            case '06': return "มิถุนายน";
            case '07': return "กรกฎาคม";
            case '08': return "สิงหาคม";
            case '09': return "กันยายน";
            case '10': return "ตุลาคม";
            case '11': return "พฤศจิกายน";
            case '12': return "ธันวาคม";
            default: return $m;
        }
    }
function thaiMonthShort($m){
    $m = (int)$m;
    switch ($m) {
        case '1': return "มค";
        case '2': return "กพ";
        case '3': return "มีค";
        case '4': return "เมย";
        case '5': return "พค";
        case '6': return "มิย";
        case '7': return "กค";
        case '8': return "สค";
        case '9': return "กย";
        case '10': return "ตค";
        case '11': return "พย";
        case '12': return "ธค";
        default: return $m;
    }
}  
function DatetimeThaiShort($strDate){
    $strYear        = date("Y",strtotime($strDate))+543;
    $strMonth       = date("n",strtotime($strDate));
    $strDay         = date("j",strtotime($strDate));
    $time           = substr($strDate,11);
  
    /*$strHour        = date("H",strtotime($strDate));
    $strMinute      = date("i",strtotime($strDate));
    $strSeconds     = date("s",strtotime($strDate));*/
    $strMonthThai   =thaiMonthShort($strMonth);

    return "$strDay $strMonthThai $strYear, $time";
}
function DateThai($strDate){
    $strYear        = date("Y",strtotime($strDate))+543;
    $strMonth       = date("n",strtotime($strDate));
    $strDay         = date("j",strtotime($strDate));
    $strMonthThai   = thaiMonth_show($strMonth);
    return "$strDay $strMonthThai $strYear";
}
function code_response($action) {
    if(!empty($action)){
    switch ($action) {
        case '200':
            $status_name = 'Success'; break;
        case '202':
            $status_name = 'Duplicate code'; break;
        case '203':
            $status_name = 'Not found code'; break;
        case '205':
            $status_name = 'Invalid Code'; break;
        case '207':
            $status_name = 'This product is not in period'; break;
        case '500':
            $status_name = 'Blacklist'; break;
        default:
            $status_name = 'Unknown'; break;
    }
    return $status_name;
    }
}

function explode_date($date){
// format $date = 2014-09-01;
// return 20140901
if(!empty($date)){
$data = explode( '-', $date );
return @$data[0].@$data[1].@$data[2];
}
}
function substr_date($date){
// format $date = 20140901;
// return 2014-09-01
 $d   = substr($date,6,2);
 $m   = substr($date,4,2);
 $y   = substr($date,0,4);
 return $y."-".$m."-".$d;
}
function status_tran($status){
if(!empty($status)){
    switch ($status) {
        case 'A':
            $status_name = '200'; break;
        case 'D':
            $status_name = '202'; break;       
        case 'I':
            $status_name = '205'; break;
		case 'BD':
            $status_name = '500'; break;
        case 'OV':
            $status_name = '500'; break;
		case 'R':
            $status_name = '500'; break;
        default:
            $status_name = 'Unknown'; break;
    }
    return $status_name;
    }
}


?>