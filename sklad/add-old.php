<?
echo 5/2;
exit;
ini_set('display_errors','on');
$where_am_i="sklad";
include("../droot.php");
include_once("$DOCUMENT_ROOT/$document_admin/config.php");
include_once("$DOCUMENT_ROOT/func.inc");
$site_nav[]=array("name"=>"����� - ����������</a>","url"=>"/$document_admin/sklad/add.php");
$statuses=array(0=>"�� ��������",1=>"�������� � ��������", 2=>"�������� � ��������", 3=>"������� � ����� �����");
db_connect();
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['stat_sel']) && isset($_POST['id'])){
		//print_r($_POST);exit;
		mysql_query("update sklad_userfiles set status=".intval($_POST['stat_sel']).", comment='".mysql_real_escape_string($_POST['comment'])."' where id=".$_POST['id']." limit 1");
		header("Location: /admin2/sklad/add.php");
		exit;
	}
	if(isset($_POST['c_id'])){
			// ���������� ����+, ��������� ��������+, ������� ������ ������+, �������� ������+.
		$error=0;
		$c_id=intval($_POST['c_id']);
		
		if($c_id==0 || $c_id==""){
			$error++;
			$msg="<p style='color:red;font-size:110%;'>�� ��� ������ ������������</p>";
		}else{
			$iscomp=ssql("select count(id) from users where id=$c_id");
			if($iscomp==0){
				$error++;
				$msg="<p style='color:red;font-size:110%;'>������������ ��� ��� �� ���������</p>";
			}
		}
		if(!is_uploaded_file($_FILES['ufile']['tmp_name'])){
			$error++;
			$msg="<p style='color:red;font-size:110%;'>���� �� ������� �� ������</p>";
		}
		if(!preg_match("/xls$/i",$_FILES['ufile']['name']) && !preg_match("/csv$/i",$_FILES['ufile']['name'])){
			$error++;
			$msg="<p style='color:red;font-size:110%;'>���� ��������� �������</p>";
		}
		if($error==0){
			mysql_query("delete from sklad_tovar where comp_id=$c_id");
			
			if(preg_match("/xls$/i",$_FILES['ufile']['name'])){
				setlocale(LC_ALL, 'ru_RU.CP1251');
				$tmpfname = tempnam("/var/tmp", "FOOO");
				$com="/usr/local/bin/xls2csv -scp1251 -dcp1251 '".$_FILES['ufile']['tmp_name']."' > $tmpfname";
				$a=`$com`;
				//if($_SERVER['REMOTE_ADDR']=="91.206.62.23"){
				//	echo $com, "  $tmpfname<br>";
				//}
			}elseif(preg_match("/csv$/i",$_FILES['ufile']['name'])){
				$tmpfname=$_FILES['ufile']['tmp_name'];
			}
			//echo $tmpfname;
			$k=0;
			$lim=10000;
			$h=fopen($tmpfname,"r");
			$stopwords=array();
			$q=ssql("select word from sklad_stop_words order by word");
			$r=sql($q);
			foreach($r as $rr){
				list($w)=$rr;
				$stopwords[]=$w;
			}
			$dar=array();
			while(($ar = fgetcsv($h,1000,",")) !== FALSE && $k <= $lim){
				if(sizeof($ar)==1){continue;}
				//echo $c."<br>";
				//if($k == 0){$k++;continue;}else{$k++;}
				
				$title=trim($ar[0]);
				$title=str_replace(" * ","�",$title);
				$title=str_replace("*","�",$title);
				$title=preg_replace("/\s+/"," ",$title);
				$kol=trim($ar[1]);
				$ed=trim($ar[2]);
				if($ed!=1){
					$ed=3;
				}
					
				$quant=str_replace(",",".",$kol);
				if(!is_float($quant)){
					settype($quant,"float");
				}
					
				$quant=round($quant,4);
				$kol=str_replace(".",",",$quant);
				
				if($title!==""){
					$lcheck=0;
					foreach($stopwords as $stopword){
						if(preg_match("/$stopword/",$title)){$lcheck++;}
					}
					if($lcheck==0){			
						$q="insert into `sklad_tovar` set `comp_id`=$c_id, `title`='".mysql_real_escape_string(trim($title))."',`quant`='$kol', `unit_id`=$ed, `date_cr`=CURDATE(), `visible`=1";
						mysql_query($q);
						$k++;
					}
				}
			}
			mysql_query("insert into sklad_userfiles_stat set uid=$c_id, date_cr=CURDATE()");
			if(isset($_POST['uved']) && $_POST['uved']=="on"){
				if($_SESSION['skladsent']==$c_id){
					$msg.="<p style='color:red;font-size:110%;'>����������� �� ����������: ����� ������� ������� ��� ������������ �����������</p>";
				}else{
					$cname=ssql("select `name` from users where id=$c_id limit 0,1");
					$cemail=ssql("select `email` from users where id=$c_id limit 0,1");
					include_once('Mail.php');
					include_once('Mail/mime.php');	
					$nextdate=date("d.m.Y",strtotime("now + 14 days"));	
					$subj="SKLAD.RusCable.Ru ���� ������� ���������.";				
$text="������������, $cname.

������� ���� ��������� ������� ��������� �� ������� SKLAD.RusCable.Ru
��������� ���� �������������� ���������� �� ������� $nextdate.
�� ��� ��� �� ��������� ����� ��� ����� ������� �����������.

� ������, ���� � ��� �������� ������� �� ���������, ���������� � ����� ���������� �� �������� (495) 229-33-36 
��� �� e-mail: sklad@ruscable.ru

������� �� ������������� �������.

������� RusCable.Ru.
";				
				
					$crlf = "\n";
					$newmail = new Mail_mime($crlf);
					$newmail->_build_params = array(
					 'text_encoding' => 'quoted-printable',
					 'html_encoding' => 'quoted-printable', 
					 '7bit_wrap'     => 998,
					 'html_charset'  => 'windows-1251',
					 'text_charset'  => 'windows-1251',
					 'head_charset'  => 'windows-1251'
					);
					$headers=array(
					'Subject'	=>	"=?windows-1251?b?".base64_encode($subj)."?=",
					'From'		=>	"<no_reply@ruscable.ru>"
					);
					$newmail->setTXTBody($text);
					$body = $newmail->get();
					$hdrs = $newmail->headers($headers);
					//$to='abcd@ruscable.ru';
					$to=$cemail;
					$mail =& Mail::factory('mail');
					if(!$mail->send($to, $hdrs, $body)){
					}else{
						$_SESSION['skladsent']=$c_id;
						$msg.="<p style='color:red;font-size:110%;'>����������� ������� ����������</p>";
					}
				}	
			}
			$msg.="<p style='color:red;font-size:110%;'>��������� ���������: ��������� �� ����� �����: $k</p>";
			unlink($tmpfname);
			$msg.="<p style='color:red;font-size:110%;'><a href=/admin2/sklad/showt.php>����������, ��� ���������� (�������� �������)</a></p>";	
		}
	}
}


if(isset($_SESSION['sklad_view_status']) && !isset($_POST['view_stat'])){
	$view_stat=$_SESSION['sklad_view_status'];
}elseif(isset($_POST['view_stat'])){
	$_SESSION['sklad_view_status'] =	$_POST['view_stat'];	
	$view_stat=$_POST['view_stat'];
}else{
	$view_stat=0;
}

if(isset($_GET['delufile'])){
	$did=intval($_GET['delufile']);
	mysql_query("delete from sklad_userfiles where id=$did limit 1");
	header("Location: /admin2/sklad/add.php");
	exit;
}

include("$DOCUMENT_ROOT/$document_admin/top.php");
?>
<script language=Javascript>
function ch(){
ans = confirm("������� ������ ?");
if(ans){return true;}else{return false;}   
}
</script>

<style>
table tr td {font-size:12px;}
.form, .form td{
	border-collapse: collapse;
	border: 1px solid #7E89B1;
	padding:5px;
	font-size: 12px;
}
.red{
	color:red;
}
.none_bord{
	border:none;
}
.none_bord td{
	border:none;
}
.form a{
	font-size: 12px;
}
</style>
<?
if($msg!=""){
	echo "<hr><font color=red style='font-size:110%'>$msg</font><hr>";
}	
if(isset($_GET['c_id'])){
	$c_id=intval(trim($_GET['c_id']));
	
	$title=ssql("select name from users where id=$c_id limit 0,1");
	$title2=ssql("select comp from users where id=$c_id limit 0,1");
	$title="$title, $title2";
	$link="<a target=_new href='/admin2/users/users.html?id=$c_id&page=1'>$title</a>";
	$c_idv=$c_id;
	$title=str_replace("'",'"',$title);
	$dpfield= "<input type='hidden' name='company' value='$title'>";
}else{
	$link=<<<LINK
	
<input id="company1" type="text" name="company" style="width:200px;"/> 
<div id="compdiv"></div>
<script>
$(document).ready(function(){��
	$('#company1').keyup(function(){��
		$.ajax({�
			type:�"GET",��
			url: "s.php",
			data:�"comp="+$("#company1").val(),
			success:�function(html){
				$("#compdiv").html(html);
			}	
		});
	});
});
</script>
LINK;
	$c_idv="";
	$dpfield="";
}


?>
<form action="/admin2/sklad/add.php" method="POST" enctype="multipart/form-data">
<table border=0 width=50% cellpadding=3 cellspacing=1 class=color1>
<tr class=color4>
<td>1)</td><td width=150 valign=top>������������, �����</td><td><?=$link?></td>
</tr>
<tr class=color4>
<td>2)</td><td width=150 valign=top>ID ������������<br>(�����������)</td><td><input type=text size=6 id="company2" name=c_id value='<?=$c_idv?>'></td>
</tr>
<tr class=color4><td>3)</td><td>Xls ����</td><td><input type=file name="ufile"></td></tr>
<tr class=color4><td>4)</td><td>����������� �����. �� email</td><td><input type=checkbox name="uved" checked></td></tr>
<tr class=color4><td colspan=3><input type=submit value="��������"></td></tr>
</table>

<?=$dpfield?>
</form>
<p>
��� ���������� ������ ������ ��� ��������� � ���� ������� ����� ������������ ����� �������.
</p>
<hr>
<h1>�����, ����������� �������������� ����� ������ �������</h1>
<form method=post>������:

<?




$cursel1="<select name=view_stat size=1 onchange='this.form.submit();'>";
foreach($statuses as $n=>$status){
	$cursel1.="<option value='$n' "; if($n==$view_stat){$cursel1.="selected";}
	$cursel1.=">$status</option>";
}
$cursel1.="</select>";
print $cursel1."</form>";


$q="select id,uid,DATE_FORMAT( `date_cr` , '%d.%m.%Y�.<br>%H:%i' ),comment from sklad_userfiles where status=$view_stat order by id, uid, date_cr";
//echo $q;
$r=sql($q);
if(sizeof($r)==0){
	print "������ ���";
}else{
	print "<table border=0 width=50% cellpadding=3 cellspacing=1 class=color1>
	<tr class=color2><td>������������</td><td>���� ����������</td><td>�������</td><td>�������� ������</td><td>�����������</td><td>�������</td></tr>
	";
	foreach($r as $rr){
		list($id,$cid,$date,$comment)=$rr;
		$cursel="<select name=stat_sel size=1 onchange='this.form.submit();'>";
		foreach($statuses as $n=>$status){
			$cursel.="<option value='$n' "; if($n==$view_stat){$cursel.="selected";}
			$cursel.=">$status</option>";
		}
		$cursel.="</select>";
		
		$cname=ssql("select name from users where id=$cid");
		$cname2=ssql("select comp from users where id=$cid");
		$cname="<a href='/admin2/sklad/add.php?c_id=$cid'>$cname</a>, $cname2";
		print "<tr class=color4><td>$cname</td><td>$date</td><form target=_new action='get.php' method=post><td><input type=hidden name=id value=$id><input type=submit value='�������'></td></form><form method=post><td><input type=hidden name=id value=$id>$cursel</td><td><textarea rows=2 cols=10 name=comment>$comment</textarea></td></form><td><a href=add.php?delufile=$id onclick='return ch();'>�������</a></td></tr>";
	}
	print "</table>";
}


include("$DOCUMENT_ROOT/$document_admin/bottom.php"); 
?>

