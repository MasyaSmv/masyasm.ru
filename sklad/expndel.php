<?

//====================================================

// ���������������� ������ ������� '����� - ���������� � ��������'

// Last update: 28.09.2011

//====================================================

include("../droot.php");

// ���������� ������

include_once("$DOCUMENT_ROOT/$document_admin/config.php");

// ���������� ������� ������ � �����

include_once("$DOCUMENT_ROOT/func.inc");

// ��������� ����� ������� � ������ ���������

$site_nav[]=array("name"=>"���������� � �������� ������","url"=>"/$document_admin/sklad/expndel.php");

include("$DOCUMENT_ROOT/$document_admin/top.php");
db_connect();


$query = "SELECT s.`uid` as uid, DATE_FORMAT( `s`.`deleted` , '%d.%m.%Y' ) as ddaattee, u.name as uname, u.comp as comp FROM sklad_expired_and_deleted s, users u WHERE s.uid=u.id order by ddaattee desc";
//echo $query;

$rows = GetDB($query);
$num  = count($rows);


$out="";




$out.= "\n<p>\n<table border=0 width=600 cellpadding=3 cellspacing=1 class=\"color1\">\n";

$out.= "<tr class=\"color2\">\n";

$out.= "\t<td align=center width=30><div class=\"fnt2\"><b>������������</b></div></td>\n";

$out.= "\t<td align=center width=120><div class=\"fnt2\"><b>��������</b></div></td>\n";

$out.= "\t<td align=center width=120><div class=\"fnt2\"><b>����� ������ �����</b></div></td>\n";

$out.= "</tr>\n";

$obschkol=0;
for ($i=0;$i<$num;$i++)
{
	$out.= "<tr class=\"color4\">\n";
	$out.= "\t<td><div class=\"fnt2\"><a href='/admin2/users/users.html?id=".$rows[$i]['uid']."&page=1'>".$rows[$i]['uname']."</a></div></td>\n";
	$out.="\t<td align=center><div class=\"fnt2\">".$rows[$i]['comp']."</div></td>\n";
	$out.="\t<td align=center><div class=\"fnt2\">".$rows[$i]['ddaattee']."</div></td>\n";
	$out.="</tr>\n";
	$obschkol+=intval($rows[$i]['cou']);
}

$out.= "</table>\n";




echo $out;


include("$DOCUMENT_ROOT/$document_admin/bottom.php");

?>

