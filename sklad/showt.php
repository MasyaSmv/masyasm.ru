<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//====================================================
include("../droot.php");

//====================================================

// ���������������� ������ ������� '�����'

//====================================================

// ���������� ������

include_once("$DOCUMENT_ROOT/$document_admin/config.php");

// ���������� ������� ������ � �����

include_once("$DOCUMENT_ROOT/func.inc");

// ��������� ����� ������� � ������ ���������

$site_nav[]=array("name"=>"�������� �������","url"=>"/$document_admin/sklad/showt.php");

//====================================================

// ����������

//====================================================



// ��� ������� � MySQL

$mysql_tablename="sklad_tovar";
// ����
/*
0 - fld_field    - ��� ���� � ����
1 - fld_type     - ��� ���� (����� "|" ������������� �������������� ��������� (���� ��� ������� ����))
2 - fld_name     - �������� ���� ��� �����������
3 - fld_form     - ��� �������� ����� (TEXT, TEXTAREA, RADIO, CHECKBOX, LISTBOX, FILE, HIDDEN,LISTDB|<�������� �������|���� � ID| ���� �� ���������>, 
VISIBLE,MULTISELECT|<�������� �������|���� � ID| ���� �� ���������>)
4 - fld_fill     - ����������� ��� ���������� (FILL)
5 - fld_showadd  - ���������� ���� ��� ���������� (SHOW ADD)
6 - fld_showedit - ���������� ���� ��� ��������� (SHOW EDIT)
7 - fld_preview  - ���������� ���� � ����� ������ ������� ������� (PREVIEW|NO PREVIEW)
8 - fld_comment  - ����������� � �������� �����
*/

$db_fields=array();
$db_fields[]=array('id',		       'INT',		'ID',					'HIDDEN',	'',	'',			'SHOW EDIT',	'PREVIEW',		'');
$db_fields[]=array('comp_id',		       'VARCHAR|10',		'ID ������������',		'TEXT|25',	'',	'SHOW ADD',			'SHOW EDIT',	'PREVIEW',		'');
$db_fields[]=array('title',		       'VARCHAR|255',	'��������',			'TEXT|255',	'FILL',	'SHOW ADD',	'SHOW EDIT',	'PREVIEW|LINK',	'');
$db_fields[]=array('quant',		   'VARCHAR|255',	'����������',			'TEXT|25',	'',	'SHOW ADD',	'SHOW EDIT',	'PREVIEW',	'');
$db_fields[]=array('unit_id',		       'VARCHAR|1',	'��. ���.',			'TEXT|1',	'',	'SHOW ADD',	'SHOW EDIT',	'NO PREVIEW',	'3 ��� ��');
$db_fields[]=array('date_cr','VARCHAR|255','���� ����������','TEXT|25',	'','SHOW ADD','SHOW EDIT','PREVIEW',	'');

$db_fields[]=array('views',		       'VARCHAR|5',	'����������',			'TEXT|5',	'',	'SHOW ADD',	'SHOW EDIT',	'NO PREVIEW',	'');

$db_fields[]=array('visible',		       'VARCHAR|1',	'���������',			'TEXT|1',	'',	'SHOW ADD',	'SHOW EDIT',	'PREVIEW',	'1 ��� 0');

$db_fields[]=array('comments',		       'VARCHAR|3000',	'������.',			'TEXT|255',	'',	'SHOW ADD',	'SHOW EDIT',	'PREVIEW',	'');




// ���� � ID
$db_id_field='id';
// ��������� ����������
$db_sort='ORDER BY id DESC';
// ���������� ������� �� ��������
$rows_onpage=40;
//====================================================
// ���������� ������
db_connect();



//====================================================

// ���������� ������
$mass_del = true;
require ("$DOCUMENT_ROOT/$document_admin/engine1-5.php");

?>
