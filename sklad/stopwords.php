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

$site_nav[]=array("name"=>"�������� �������","url"=>"/$document_admin/sklad/stopwords.php");

//====================================================

// ����������

//====================================================



// ��� ������� � MySQL

$mysql_tablename="sklad_stop_words";
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
$db_fields[]=array('id',		       'INT',		'ID',					'TEXT|5',	'',	'',			'SHOW EDIT',	'PREVIEW',		'');
$db_fields[]=array('word',		       'VARCHAR|255',	'�����',			'TEXT|255',	'FILL',	'SHOW ADD',	'SHOW EDIT',	'PREVIEW|LINK',	'');



// ���� � ID
$db_id_field='id';
// ��������� ����������
$db_sort='ORDER BY word';
// ���������� ������� �� ��������
$rows_onpage=40;
//====================================================
// ���������� ������
db_connect();

//====================================================
// ���������� ������

require ("$DOCUMENT_ROOT/$document_admin/engine.php");

?>
