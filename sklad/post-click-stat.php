<?
//====================================================
// ���������������� ������ ������� '����� - �������� ���������� ������ �� �����������'
// Last update: 15.12.2011 - �������� ������
//====================================================

include("../droot.php");

// ���������� ������
include_once("$DOCUMENT_ROOT/$document_admin/config.php");
// ���������� ������� ������ � �����
include_once("$DOCUMENT_ROOT/func.inc");
// ��������� ����� ������� � ������ ���������
$site_nav[]=array("name"=>"����� - �������� ���������� ������ �� �����������","url"=>"/$document_admin/sklad/post-click-stat.php");



if(isset($_GET['t'])) $t=intval($_GET['t']);
else $t=1;
if($t==0)$t=1;


$cur_time   = time(); // ��������� ����� �� ������ �������
$today_time = date("s", $cur_time) + date("i", $cur_time)*60 + date("H", $cur_time)*60*60; // ������ ������ �� �������
$time_start = date("Y-m-d H:i:s", ( $cur_time - $today_time - (($t-1)*24*3600) ) );        // � ������ ������� ���������� �������
$time_stop  = date("Y-m-d H:i:s", $cur_time);                                              // �� ����� ����� ���������� �������

$t_where    = " AND s.`when` >= '".$time_start."' ";

// ��������� ���������� ��� "�����"
if($t == 2)
{
	$time_stop  = date("Y-m-d H:i:s", ($cur_time - $today_time - 1));                      // �� ����� ����� ���������� �������
	$t_where    = " AND s.`when` >= '".$time_start."' AND s.`when` <= '".$time_stop."' ";
}

$search_period = "<span style='color: #888888;'>(� ".$time_start." �� ".$time_stop.")</span>";








//else $t_where=" AND s.`when` >= '".date("Y-m-d H:i:s",(time()-($t*24*3600)))."' ";

//====================================================
// ����������
//====================================================

/*
$list_status[1]  = '�������';
$list_status[5]  = '�������';
$list_status[9]  = '������������';
$list_status[13] = '���������';
$list_status[25] = '����������� �������������';
$list_status[99] = '�������������';
*/

//====================================================

include("$DOCUMENT_ROOT/$document_admin/top.php");

db_connect();

print '<a href="?t=1" '; if($t=="1") print 'style="color:red; font-weight:bold;"'; print '>�������</a> &nbsp;&nbsp;';
print '<a href="?t=2" '; if($t=="2") print 'style="color:red; font-weight:bold;"'; print '>�����</a> &nbsp;&nbsp;';
print '<a href="?t=7" '; if($t=="7") print 'style="color:red; font-weight:bold;"'; print '>������</a> &nbsp;&nbsp;';
print '<a href="?t=14" '; if($t=="14") print 'style="color:red; font-weight:bold;"'; print '>2 ������</a> &nbsp;&nbsp;';
print '<a href="?t=30" '; if($t=="30") print 'style="color:red; font-weight:bold;"'; print '>�����</a> &nbsp;&nbsp;';

$query = "SELECT u.id, u.name,  u.comp, s.uid_postav, COUNT(*) as cou
FROM sklad_postav_click_stat s, users u
WHERE u.id = s.uid_postav ".$t_where."
GROUP BY s.uid_postav
ORDER BY count(*) DESC ";
//echo $query;

$rows = GetDB($query);
$num  = count($rows);



echo "<p>$search_period\n\n";

echo "<p><b>���������: <font color=ff0000>$num</font></b>\n\n";
echo "\n<p>\n<table border=0 width=80% cellpadding=3 cellspacing=1 class=\"color1\">\n";
echo "<tr class=\"color2\">\n";
echo "\t<td align=center width=45%><div class=\"fnt2\"><b>������������, ��������</b></div></td>\n";
echo "\t<td align=center width=10%><div class=\"fnt2\"><b>���������</b></div></td>\n";
echo "\t<td align=center width=45%><div class=\"fnt2\"><b>������� ����� ���������</b></div></td>\n";
echo "</tr>\n";

for ($i=0;$i<$num;$i++)

{
	echo "<tr class=\"color4\">\n";
	$queryz="";
	$qq="select `query` from sklad_postav_click_stat s where s.uid_postav=".$rows[$i]['id']." $t_where";
	//echo $qq;
	$rr=sql($qq);
	foreach($rr as $rrr){
		list($qtemp)=$rrr;
		$qtemp=str_replace(" ","&nbsp;",$qtemp);
		if (trim($qtemp)=="") $qtemp="�� ��������";
		$queryz.=$qtemp."<br>";
	}

	echo "\t<td><div class=\"fnt2\"><a href=\"/admin2/users/users.html?page=1&id=".$rows[$i]['id']."\">".$rows[$i]['name']." ".$rows[$i]['comp']."</a></div></td>\n";

	echo "\t<td align=center><div class=\"fnt2\">".$rows[$i]['cou']."</div></td>\n";
	echo "\t<td align=center><div class=\"fnt2\">$queryz</div></td>\n";
	echo "</tr>\n";
}

echo "</table>\n";



include("$DOCUMENT_ROOT/$document_admin/bottom.php");
?>

