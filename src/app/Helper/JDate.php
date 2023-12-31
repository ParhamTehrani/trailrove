<?php


namespace App\Helper;


class JDate {

    public static function date($date='', $format = 'Y-m-d' )
    {
        $date = @$date ? @$date : date('Y-m-d');
        return self::jdate($format, 0, 0, strtotime($date));
    }
    public static function now($format = 'Y-m-d' , $date='')
    {
        $date = @$date ? @$date : date('Y-m-d');
        return self::jdate($format, 0, 0, strtotime($date));
    }
    public static function jdate($type, $TZhours=0, $TZminute=0, $maket="now")
    {
        //set 1 if you want translate number to farsi or if you don't like set 0
        $transnumber=1;

        if($maket==-1){
            return NULL;
        }

        if($maket=="now"){
            $year=date("Y");
            $month=date("m");
            $day=date("d");
            list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
            $maket=self::jmaketime(date("h")+$TZhours,date("i")+$TZminute,date("s"),$jmonth,$jday,$jyear);
        }else{
            $maket+=$TZhours*3600+$TZminute*60;
            $date=date("Y-m-d",$maket);
            list( $year, $month, $day ) = preg_split ( '/-/', $date );

            list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
        }

        $need= $maket;
        $year=date("Y",$need);
        $month=date("m",$need);
        $day=date("d",$need);
        $i=0;
        while($i<strlen($type))
        {
            $subtype=substr($type,$i,1);
            switch ($subtype)
            {

                case "A":
                    $result1=date("a",$need);
                    if($result1=="pm") @$result.= "&#1576;&#1593;&#1583;&#1575;&#1586;&#1592;&#1607;&#1585;";
                    else @$result.="&#1602;&#1576;&#1604;&#8207;&#1575;&#1586;&#1592;&#1607;&#1585;";
                    break;

                case "a":
                    $result1=date("a",$need);
                    if($result1=="pm") $result.= "&#1576;&#46;&#1592;";
                    else @$result.="&#1602;&#46;&#1592;";
                    break;
                case "d":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    if($jday<10)$result1="0".$jday;
                    else     $result1=$jday;
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "D":
                    $result1=date("D",$need);
                    if($result1=="Thu") $result1="پنجشنبه";
                    else if($result1=="Sat") $result1="شنبه";
                    else if($result1=="Sun") $result1="یک‌شنبه";
                    else if($result1=="Mon") $result1="دوشنبه";
                    else if($result1=="Tue") $result1="سه‌شنبه";
                    else if($result1=="Wed") $result1="چهارشنبه";
                    else if($result1=="Thu") $result1="پنجشنبه";
                    else if($result1=="Fri") $result1="جمعه";
                    @$result.=$result1;
                    break;
                case"F":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    @$result.=self::monthname($jmonth);
                    break;
                case "g":
                    $result1=date("g",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "G":
                    $result1=date("G",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "h":
                    $result1=date("h",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "H":
                    $result1=date("H",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "i":
                    $result1=date("i",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "j":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    $result1=$jday;
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "l":
                    $result1=date("l",$need);
                    if($result1=="Saturday") $result1="&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Sunday") $result1="&#1610;&#1603;&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Monday") $result1="&#1583;&#1608;&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Tuesday") $result1="&#1587;&#1607;&#32;&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Wednesday") $result1="&#1670;&#1607;&#1575;&#1585;&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Thursday") $result1="&#1662;&#1606;&#1580;&#1588;&#1606;&#1576;&#1607;";
                    else if($result1=="Friday") $result1="&#1580;&#1605;&#1593;&#1607;";
                    @$result.=$result1;
                    break;
                case "m":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    if($jmonth<10) $result1="0".$jmonth;
                    else    $result1=$jmonth;
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "M":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    @$result.=self::monthname($jmonth);
                    break;
                case "n":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    $result1=$jmonth;
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "s":
                    $result1=date("s",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "S":
                    @$result.="&#1575;&#1605;";
                    break;
                case "t":
                    @$result.=self::lastday ($month,$day,$year);
                    break;
                case "w":
                    $result1=date("w",$need);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "y":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    $result1=substr($jyear,2,4);
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                case "Y":
                    list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
                    $result1=$jyear;
                    if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
                    else @$result.=$result1;
                    break;
                default:
                    @$result.=$subtype;
            }
            $i++;
        }
        return $result;
    }

    public static function jmaketime($hour,$minute,$second,$jmonth,$jday,$jyear)
    {
        list( $year, $month, $day ) = self::jalali_to_gregorian($jyear, $jmonth, $jday);
        $i=mktime($hour,$minute,$second,$month,$day,$year);
        return $i;
    }

    public static function mstart($month,$day,$year) 											///Find Day Begining Of Month
    {
        list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
        list( $year, $month, $day ) = self::jalali_to_gregorian($jyear, $jmonth, "1");
        $timestamp=mktime(0,0,0,$month,$day,$year);
        return date("w",$timestamp);
    }

    public static function lastday ($month,$day,$year)										//Find Number Of Days In This Month
    {
        $lastdayen=date("d",mktime(0,0,0,$month+1,0,$year));
        list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
        $lastdatep=$jday;
        $jday=$jday2;
        while($jday2!="1")
        {
            if($day<$lastdayen)
            {
                $day++;
                list( $jyear, $jmonth, $jday2 ) = self::gregorian_to_jalali($year, $month, $day);
                if($jdate2=="1") break;
                if($jdate2!="1") $lastdatep++;
            }
            else
            {
                $day=0;
                $month++;
                if($month==13)
                {
                    $month="1";
                    $year++;
                }
            }

        }
        return $lastdatep-1;
    }

    public static function monthname($month)													//translate number of month to name of month
    {

        if($month=="01") return "فروردین";

        if($month=="02") return "اردیبهشت";

        if($month=="03") return "خرداد";

        if($month=="04") return  "تیر";

        if($month=="05") return "مرداد";

        if($month=="06") return "شهریور";

        if($month=="07") return "مهر";

        if($month=="08") return "آبان";

        if($month=="09") return "آذر";

        if($month=="10") return "دی";

        if($month=="11") return "بهمن";

        if($month=="12") return "اسفند";
    }

    public static function Convertnumber2farsi($srting)										////here convert to  number in persian
    {
        $num0="&#1776;";
        $num1="&#1777;";
        $num2="&#1778;";
        $num3="&#1779;";
        $num4="&#1780;";
        $num5="&#1781;";
        $num6="&#1782;";
        $num7="&#1783;";
        $num8="&#1784;";
        $num9="&#1785;";

        $stringtemp="";
        $len=strlen($srting);
        for($sub=0;$sub<$len;$sub++)
        {
            if(substr($srting,$sub,1)=="0")$stringtemp.=$num0;
            elseif(substr($srting,$sub,1)=="1")$stringtemp.=$num1;
            elseif(substr($srting,$sub,1)=="2")$stringtemp.=$num2;
            elseif(substr($srting,$sub,1)=="3")$stringtemp.=$num3;
            elseif(substr($srting,$sub,1)=="4")$stringtemp.=$num4;
            elseif(substr($srting,$sub,1)=="5")$stringtemp.=$num5;
            elseif(substr($srting,$sub,1)=="6")$stringtemp.=$num6;
            elseif(substr($srting,$sub,1)=="7")$stringtemp.=$num7;
            elseif(substr($srting,$sub,1)=="8")$stringtemp.=$num8;
            elseif(substr($srting,$sub,1)=="9")$stringtemp.=$num9;
            else $stringtemp.=substr($srting,$sub,1);

        }
        return   $stringtemp;

    }///end conver to number in persian

    public static function ConvertPersianNumber2enlish($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function div($a,$b)
    {
        return (int) ($a / $b);
    }

    public static function gregorian_to_jalali ($g_y, $g_m, $g_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);





        $gy = $g_y-1600;
        $gm = $g_m-1;
        $gd = $g_d-1;

        $g_day_no = 365*$gy+self::div($gy+3,4)-self::div($gy+99,100)+self::div($gy+399,400);

        for ($i=0; $i < $gm; ++$i)
            $g_day_no += $g_days_in_month[$i];
        if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
            /* leap and after Feb */
            $g_day_no++;
        $g_day_no += $gd;

        $j_day_no = $g_day_no-79;

        $j_np = self::div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
        $j_day_no = $j_day_no % 12053;

        $jy = 979+33*$j_np+4*self::div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */

        $j_day_no %= 1461;

        if ($j_day_no >= 366) {
            $jy += self::div($j_day_no-1, 365);
            $j_day_no = ($j_day_no-1)%365;
        }

        for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
            $j_day_no -= $j_days_in_month[$i];
        $jm = $i+1;
        $jd = $j_day_no+1;

        return array($jy, $jm, $jd);
    }

    public static function jalali_to_gregorian($j_y, $j_m, $j_d)
    {
        $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);



        $jy = $j_y-979;
        $jm = $j_m-1;
        $jd = $j_d-1;

        $j_day_no = 365*$jy + self::div($jy, 33)*8 + self::div($jy%33+3, 4);
        for ($i=0; $i < $jm; ++$i)
            $j_day_no += @$j_days_in_month[$i];

        $j_day_no += $jd;

        $g_day_no = $j_day_no+79;

        $gy = 1600 + 400*self::div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
        $g_day_no = $g_day_no % 146097;

        $leap = true;
        if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */
        {
            $g_day_no--;
            $gy += 100*self::div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */
            $g_day_no = $g_day_no % 36524;

            if ($g_day_no >= 365)
                $g_day_no++;
            else
                $leap = false;
        }

        $gy += 4*self::div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
        $g_day_no %= 1461;

        if ($g_day_no >= 366) {
            $leap = false;

            $g_day_no--;
            $gy += self::div($g_day_no, 365);
            $g_day_no = $g_day_no % 365;
        }

        for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
            $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
        $gm = $i+1;
        $gd = $g_day_no+1;

        return array($gy, $gm, $gd);
    }

    public static function j2gdate($InputDate)
    {
        // agha joon in tabe ta sale 1400 kar mikone
        $test = intval(substr($InputDate, 0, 4));
        if($test > 31){
            $year = $test;
            $sep = substr($InputDate, ($year > 1300) ? 4 : 2, 1);
            $TEMP = explode($sep, $InputDate, 3);
            $month = $TEMP[1];
            $day = $TEMP[2];
        }else{
            $day = $test;
            $sep = substr($InputDate, 2, 1);
            $TEMP = explode($sep, $InputDate, 3);
            $month = $TEMP[1];
            $year = $TEMP[2];
        }
        $year = ($year > 1300) ? $year : $year + 1300;
        $TEMP = self::jalali_to_gregorian($year, $month, $day);
        return "$TEMP[0]/$TEMP[1]/$TEMP[2]";
    }

    public static function dif($D1, $D2="")
    {
        if($D2 == "") $D2 = strtotime(date('Y/m/d'));
        if($D1 == "") return 0;
        return floor((strtotime($D1) - $D2) / 86400);
    }


}
