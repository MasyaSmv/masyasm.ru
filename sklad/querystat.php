<?
//====================================================
// ���������������� ������ ������� '����� - ���������� ��������'
// Last update: 15.12.2011 - �������� ������
//====================================================

include("../droot.php");

// ���������� ������
include_once("$DOCUMENT_ROOT/$document_admin/config.php");
// ���������� ������� ������ � �����
include_once("$DOCUMENT_ROOT/func.inc");
// ��������� ����� ������� � ������ ���������
$site_nav[]=array("name"=>"����� - ���������� ��������","url"=>"/$document_admin/sklad/querystat.php");



if(isset($_GET['t'])) $t=intval($_GET['t']);
else $t=1;
if($t==0){$t=1;}

$cur_time   = time(); // ��������� ����� �� ������ �������
$today_time = date("s", $cur_time) + date("i", $cur_time)*60 + date("H", $cur_time)*60*60; // ������ ������ �� �������
$time_start = date("Y-m-d H:i:s", ( $cur_time - $today_time - (($t-1)*24*3600) ) );        // � ������ ������� ���������� �������
$time_stop  = date("Y-m-d H:i:s", $cur_time);                                              // �� ����� ����� ���������� �������

$t_where    = " `time` >= '".$time_start."' ";

// ��������� ���������� ��� "�����"
if($t == 2)
{
	$time_stop  = date("Y-m-d H:i:s", ($cur_time - $today_time - 1));                      // �� ����� ����� ���������� �������
	$t_where    = " `time` >= '".$time_start."' and `time` <= '".$time_stop."' ";
}

$search_period = "<span style='color: #888888;'>(� ".$time_start." �� ".$time_stop.")</span>";



include("$DOCUMENT_ROOT/$document_admin/top.php");


db_connect();

//print date("H", $cur_time)."<br><br>";
//print date("i", $cur_time)."<br><br>";
//print date("s", $cur_time)."<br><br>";
//print $t_where."<br><br>";

print '<a href="?t=1" '; if($t=="1") print 'style="color:red; font-weight:bold;"'; print '>�������</a> &nbsp;&nbsp;';
print '<a href="?t=2" '; if($t=="2") print 'style="color:red; font-weight:bold;"'; print '>�����</a> &nbsp;&nbsp;';
print '<a href="?t=7" '; if($t=="7") print 'style="color:red; font-weight:bold;"'; print '>������</a> &nbsp;&nbsp;';
print '<a href="?t=14" '; if($t=="14") print 'style="color:red; font-weight:bold;"'; print '>2 ������</a> &nbsp;&nbsp;';
print '<a href="?t=30" '; if($t=="30") print 'style="color:red; font-weight:bold;"'; print '>�����</a> &nbsp;&nbsp;';



//$query = "SELECT forum_users.uid, forum_users.username, forum_users.status, forum_tree.uid, forum_tree.count(uid) FROM forum_tree, forum_users WHERE forum_users.uid = forum_tree.uid ORDER BY forum_users.uid GROUP BY forum_tree.uid";

//$query = "SELECT forum_users.username, forum_users.status, forum_tree.uid, count(forum_tree.uid) FROM forum_tree, forum_users WHERE forum_users.uid = forum_tree.uid GROUP BY forum_tree.uid ORDER BY count(forum_tree.uid)";

//$query = "SELECT forum_users.username, forum_users.status, forum_tree.uid, count(*) FROM forum_tree, forum_users WHERE forum_users.uid = forum_tree.uid ".$t_where."   GROUP BY forum_tree.uid ORDER BY `count(*)` DESC";

$query = "SELECT `query`, count(*) as cou FROM sklad_query_stat WHERE ".$t_where." GROUP BY `query` ORDER BY count(*) DESC ";
//echo "<p>$query</p>";

$rows = GetDB($query);
$num  = count($rows);


$out="";


$out.= "\n<p>\n<table border=0 width=600 cellpadding=3 cellspacing=1 class=\"color1\">\n";
$out.= "<tr class=\"color2\">\n";
$out.= "\t<td align=center width=30><div class=\"fnt2\"><b>������</b></div></td>\n";
$out.= "\t<td align=center width=120><div class=\"fnt2\"><b>����������</b></div></td>\n";
$out.= "</tr>\n";

$obschkol=0;
for ($i=0;$i<$num;$i++)
{
	$out.= "<tr class=\"color4\">\n";
	$out.= "\t<td><div class=\"fnt2\">".$rows[$i]['query']."</a></div></td>\n";
	$out.="\t<td align=center><div class=\"fnt2\">".$rows[$i]['cou']."</div></td>\n";
	$out.="</tr>\n";
	$obschkol+=intval($rows[$i]['cou']);
}

$out.= "</table>\n";

$out = "<p><b>���������� ��������: <font color=ff0000>$num</font></b>, ����� ��������: <font color=ff0000>$obschkol</font>.<br>$search_period $out";

echo $out;

include("$DOCUMENT_ROOT/$document_admin/bottom.php");
?>
