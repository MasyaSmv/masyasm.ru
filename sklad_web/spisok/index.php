<?
//print_r($_SERVER);exit;
//setlocale(LC_ALL, 'ru_RU.CP1251');
if($_GET['frominf']==1){
	setcookie("informer", str_replace("/spisok/","",$_SERVER['REDIRECT_URL']), time()+3600, "/", "sklad.ruscable.ru", 0, 1);
	header("Location: ".$_SERVER['REDIRECT_URL']);
	exit;
}


include_once("../inc/func.inc");
$title_tag="Кабель  и провод из наличия  - СКЛАД :: Список складов";
$perpage=25;
$navpage="comp";
$text1="";
$txt="";
$company=array();
$page_dir="";
$dopurl="";
$gor=array();
$out="";
$ruri="";
$positions=0;


if($authorized==0){header("Location: /");exit;}

$rurit=strip_tags(urldecode($_SERVER['REQUEST_URI']));
	if(mb_detect_encoding($rurit,"UTF-8, CP1251, ASCII")!="UTF-8"){
	$rurit=iconv("CP1251","UTF-8",$rurit);
}
$rurit=trim(str_replace("/spisok/","",$rurit));
if(strstr($rurit,"/positions/")){
	$positions=1;
	$rurit=trim(str_replace("/positions/","",$rurit));
}

if($rurit==="/" || $rurit===""){
header("Location: /");
exit;
/*
	//список всех городов
	$q="select id,`name` from geo_gor order by id";
	$r=sql($q);
	foreach($r as $rr){
		list($gid,$gname)=$rr;
		$gor[$gid]=$gname;
	}
	//главная страница, выводим список компаний.
	$out.=<<<OUT0
<div class="item"><table><tr><td colspan=2 width="100%" style="border-bottom: 1px solid #929292;"><div class="sorting_bar"><h1>Список складов в системе</h1></div></td></tr><tr><td height='20' colspan=2></td></tr>
OUT0;

	$q1="select distinct s.comp_id, c.forma_sob, c.title, c.seo_title, c.city_id from sklad_tovar s, company c where s.comp_id=c.id order by c.title";
			$r1=sql($q1);
			$ccc=1;
			foreach($r1 as $rr1){
				list($c_id,$fs,$ctitle,$sef,$cityid)=$rr1;
				if($fs!=""){$ctitle="$fs $ctitle";}
				if($cityid!=0 && array_key_exists($cityid,$gor)){
					$city=", ".$gor[$cityid];
				}else{
					$city="";
				}
				//$company[$c_id]['title']=$ctitle;
				//$company[$c_id]['sef']=$sef;


				$out.="
				<tr><td>$ccc &nbsp;</td><td><a href='/spisok/$sef'>$ctitle$city</a></td></tr>
				<tr><td height='20' colspan=2></td></tr>";
				$ccc++;
			}
		$out.="</table></div>";
	//$out="Здесь находится описание, плюсы продукта, краткая справка по работе";
*/
}else{
    // выбрать тут сразу компании - лучшие поставщики.
    $bestid = array();
    $q2 = "select id from company where substr(uslugi, 1, 5) > 0";
    $r2 = sql($q2);
    foreach($r2 as $rr2){
    list($bid) = $rr2;
    $bestid[] = $bid;
      }
     //-----------
	//поиск и показ одного пользователя
	$mruri=mysql_real_escape_string($rurit);
	preg_match("/(.*)-(\d+)/",$mruri,$mt);
	$name=$mt[1];
	$id=$mt[2];
	$q="select `name`, `comp`, `email`, `tel`, `fax`, company_id, city from users where id=$id and activ=1 limit 0,1";
//echo $id;
	//$q="select id, forma_sob, title, eng_title, seo_title, p_addr, phone, fax, email, url, map_id, icq,dop_contacts
 //from company where visible=1 and seo_title = '$mruri'  order by id limit 0,1";
	//echo $q;
	$r=sql($q);
	$szr=sizeof($r);

	if($szr==0){
		$out="Склада с таким названием в списке нет.<br><a href=/>Перейти на главную страницу</a>";
	}else{
		foreach($r as $rr){
			list($name, $comp, $email, $tel, $fax, $company_id, $city)=$rr;
		}
		$cities=array();
		$cities[]=$city;
		$q="select distinct city from sklad_tovar where comp_id=$id and city!='' order by city";
		$r1=sql($q);
		foreach($r1 as $rr1){
			list($tmp)=$rr1;
			$cities[]=$tmp;
		}
		$cities2=array_unique($cities);
		$citi=implode(", ",$cities2);
		$email=trim($email);
		if($_SESSION['sk_last_success_query']!=""){
			@mysql_query("insert into sklad_postav_click_stat set uid_search=$sklad_uid, uid_postav=$id, query='".$_SESSION['sk_last_success_query']."', `when`=NOW()");
		}
		if($company_id!=""){
			$url=@ssql("select `url` from company where id=$company_id limit 0,1");
		}
		if($_SESSION['sk_last_success_query']!=""){
			$out.= "<h2 class='ord lss'>Вы искали: <a href='/".$_SESSION['sk_last_success_query']."'>".$_SESSION['sk_last_success_query']."</a></h2>";
		}
		$out.="<table class='tblbord' style='margin-left: -18px;' width=500>";
		if($comp!=""){
		    $iscomp_name=ssql("select company_id from users where id=$id");
			if($iscomp_name > 0){
		    if(in_array($iscomp_name,$bestid)){
            $comp_link=ssql("select seo_title from company where id=$iscomp_name");
			$out.="<tr><td colspan=2 valign=middle style='font-size:24px;text-align:center;padding-top:25px;'><b><a target=_new href='//www.ruscable.ru/company/$comp_link'>$comp</a></b></td></tr>";}
            else{
		    $comp_link=ssql("select seo_title from company where id=$iscomp_name");
			$out.="<tr><td colspan=2 valign=middle style='font-size:24px;padding-top:25px;text-align:center;'><b><a target=_new href='//www.ruscable.ru/company/$comp_link'>$comp</a></b></td></tr>";}
            }
		}else{
			$iscomp_name=ssql("select company_id from users where id=$id");
			if($iscomp_name > 0){
			    if(in_array($iscomp_name,$bestid)){
		        $comp_name=ssql("select concat(forma_sob, ' ', title) from company where id=$iscomp_name");
                $comp_link=ssql("select seo_title from company where id=$iscomp_name");
                $out.="<tr class=tblth><td colspan=2 valign=middle style='font-size:24px;padding-top:25px;text-align:center;'><b><a target=_new href='//www.ruscable.ru/company/$comp_link'>$comp_name</a></b></td></tr>";
			    }
                else{
                $comp_name=ssql("select concat(forma_sob, ' ', title) from company where id=$iscomp_name");
                $comp_link=ssql("select seo_title from company where id=$iscomp_name");
                $out.="<tr class=tblth><td colspan=2 valign=middle style='font-size:24px;padding-top:25px;text-align:center;'><b><a target=_new href='//www.ruscable.ru/company/$comp_link'>$comp_name</a></b></td></tr>";}
			}
		}
		$out.="<tr class=tblth><td colspan=2><b>Контакты:</b><center><br /><br /><table class='table' style='padding: 3px;width:98%;'>";
		if($city!=""){
			$out.="<tr ><td style='background-color: white;'  width=50%><b>Город:</b></td><td style='background-color: white;'>$city</td></tr>";
		}
		if($name!=""){
			$out.="<tr><td style='background-color: white;' width=50%><b>Контактное лицо:</b></td><td style='background-color: white;'>$name</td></tr>";
		}
		if($tel!=""){
			$out.="<tr><td style='background-color: white;'><b>Телефон:</b></td><td style='background-color: white;'>".$tel."</td></tr>";
		}
		if($fax!=""){
				$out.="<tr><td style='background-color: white;'><b>Факс:</b></td><td style='background-color: white;'>".$fax."</td></tr>";
		}
		if($email!=""){
			$out.="<tr><td style='background-color: white;'><b>E-mail:</b></td><td style='background-color: white;'>";
			if(isset($_SESSION['panel_user_id'])){
				$out.= '<a href="mailto:'.$email.'">'.$email.'</a>';
			}else{
				$out.= '<img src="/image-e.php?id='.$id.'" border=0>';
			}
			$out.= "</td></tr>";
		}
		// if($url!="" && $url!="http://"){
		if($url!=""){
			// if(!preg_match("{^http://}",$url)){$url="http://".$url;}
			$out.="<tr><td style='background-color: white;'><b>Сайт:</b></td><td style='background-color: white;'><noindex><a target=_new href='$url'>".$url."</a></noindex></td></tr>";
		}
		$out.="</table></td></tr>";
		$allpos=ssql("select count(*) from sklad_tovar where comp_id=$id");
		$out.="<tr><td><b>Позиций на складе:</b></td><td><a href='/catalog/$mruri'>$allpos</a></td></tr>";

		$lastobn=ssql("select DATE_FORMAT(max(date_cr), '%d.%m.%Y' ) from sklad_tovar where comp_id=$id limit 0,1");
		$out.="<tr><td><b>Склад обновлялся:</b></td><td>$lastobn г.</td></tr>";
		$out.="</table>";


		// Заностим просмотр в статистику
		mysql_query("INSERT INTO sklad_comp_shows SET show_c_id='".$id."', uid='".$sklad_uid."', search='".mysql_escape_string($_SESSION['sk_last_success_query'])."', date=NOW()");

		$usermail=ssql("select email from users where id=$sklad_uid limit 0,1");



			$out.="<p>Уважаемый коллега, при контакте с потенциальным поставщиком просим Вас указывать, что информация о наличии кабеля найдена Вами на портале RusCable.Ru.</b></p><p>

В случае, если информация о наличии КПП не подтвердится, то Вы можете воспользоваться специальной формой «<a href='/abuse/'>Жалоба на поставщикa</a>». Мы стремимся к тому, чтобы сервис SKLAD.RusCable.Ru. был актуальным и полезным для всех участников кабельного рынка. Спасибо за участие!</p>";
			if($_SERVER['REQUEST_METHOD']=="GET"){
			$out2=<<<OUT2
<div style="height:8px">&nbsp;</div>	<div class="roundedcornr_box_752003">
   <div class="roundedcornr_top_752003"><div></div></div>
      <div class="roundedcornr_content_752003">
      <form method=POST>
      <h2>Отправить сообщение поставщику</h2>
      <br /><br />
      <table width=100%><tr><td valign=top width=30%>
         <p style='margin:0;'><b>Тема письма:</b></p>
         </td><td valign=top width=70%><input type=text style='width:90%' name=subject>
         </td></tr><tr><td valign=top>
		<p  style='margin:0;'><b>Содержание:&nbsp;</b></p></td><td><textarea style='width:90%' rows=10 name=body>

OUT2;

$user_data = false;
if($authorized > 1 && !empty($_SESSION["sklad_uid"]))
{
    $user_sql = mysql_query("select id, name, email, tel from users where id='".$_SESSION["sklad_uid"]."'");
    if(mysql_num_rows($user_sql) > 0)
    {
        $user_result = mysql_fetch_array($user_sql);
        if(!empty($user_result["name"]) && !empty($user_result["email"]))
        {
            $user_data = $user_result;
        }
    }

}

if($user_data)
{
    $out2 .= $user_data["name"]."\r";
    $out2 .= $user_data["email"]."\r";
    $out2 .= $user_data["tel"]."\r";
}


$out2 .='
P.S. информация о наличии кабеля найдена на сайте RusCable.Ru.</textarea>
</td></tr><tr><td>&nbsp;</td><td>
<input type=submit class=bottom value="Отправить сообщение">
</td></tr></table class="table">
		</form>
		<br>
      </div>
   <div class="roundedcornr_bottom_752003"><div></div></div>';

		if($action11==1){
				$out2="";
			}
		}else{
			if($_POST['subject']!="" && $_POST['body']!="" && has_no_newlines($_POST['subject']) && has_no_emailheaders($_POST['body'])){
				$copy='ruscable@gmail.com';

				$from=$usermail;
				$subj="=?windows-1251?b?".base64_encode(iconv("UTF-8","CP1251","Sklad.RusCable.Ru: ".trim($_POST['subject'])))."?=";
				$body=iconv("UTF-8","CP1251",$_POST['body']);
				$charset = "windows-1251";
				$boundary = "--".md5(uniqid('', TRUE));
				$headers = implode("\n", array
				("MIME-Version: 1.0","Content-Type: multipart/alternative; boundary=\"$boundary\"","From: $from",));
				$mesg = "This is a multi-part message in MIME format.\n\n";
				$mesg .= "--$boundary\n";
				$mesg .= "Content-Disposition: inline\n";
				$mesg .= "Content-Transfer-Encoding: 8bit\n";
				$mesg .= "Content-Type: text/plain; charset=$charset\n";
				$mesg .= "\n";
				$mesg .= $body; // <<<<<<<<<<
				mail($email, $subj, $mesg, $headers);
				mail($copy, $subj, $mesg, $headers);
				$out2="<h1>Ваше сообщение отправлено</h1>";
			}

		}
	}
}

include_once("../inc/header.inc");


?>


<div id="main" class="row">
    <div class="container">
        <div class="col-md-12 top">
            <a href="/" class="logo"></a>
            <div class="subtitle">Сервис для поиска кабельно-проводниковой продукции</div>
            <form class="top-form" id="search">
                <input type="text" placeholder="Введите маркоразмер">
                <input type="submit" value="Найти">
                <div class="result">
                </div>
            </form>
        </div>
    </div>
</div>
<table width="100%">
<tr>
	<td width="50%" valign=top>

		<?=$out?>


	</td>
	<td valign=top width=45%>
		<?=$out2?>
	</td>
	<td valign=top width=5%>
&nbsp;
	</td>
</tr>
</table>
<?
include_once("../inc/footer.inc");
?>