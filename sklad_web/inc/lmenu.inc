<?
if($PANEL!=1){exit;}
$menuId=intval($menuId);

$menu=array(
	"������" => array(
		70 => array("/user/assets.html","������ �������"),
		30 => array("/user/position_add.html","�������� �����"),
		20 => array("/user/price.html","������ ������ �� Excel"),
		10 => array("/user/group.html","�������� � �������� �������"),		
		40 => array("/user/price-help.html","������� �� �������","i"),		
	),
	"���������������" => array(
		50 => array("/user/speclist.html","������ ���������������"),
		60 => array("/user/spec-help.html","������� �� �������","i"),
	
	),	
	"������������" => array(
		80 => array("/user/contact/","���������� ������"),
		90 => array("/user/notebook.html","��� ������ �������"),
		//100 => array("/user/uved.html","�����������"),
	)
);
$c=0;

foreach($menu as $menuitem => $menucontent){
	if($market_cid != "" || $c>1){
		print $menuitem.'<ul style="list-style:none;line-height:1.5;margin-left:0px;margin-top:5px; padding-left:0px;">';
			foreach($menucontent as $menuIdbase => $menucontentcontent){
				$i1=$i2="";
				if($menucontentcontent[2]=="i"){
					$i1="<i>";
					$i2="</i>";
				}
				if($menuId!=$menuIdbase){				
					print "<li><a href='".$menucontentcontent[0]."'>".$i1.$menucontentcontent[1].$i2."</a></li>\n";
				
				}else{
					print "<li><a href='".$menucontentcontent[0]."' style='color:#ff0000;'>".$i1.$menucontentcontent[1].$i2."</a></li>\n";		
				}
			}
		print "</ul>";
	}
	$c++;
}



if($_SESSION['company_id']!=""){
	$manager=@ssql("select manager_id from company where id=".$_SESSION['company_id']);
	if($manager!=""){
		$r=sql("select fio, phone_mob, phone_work, phone_work_int, emails, icq, skype, jabber from staff where active=1 and manager=1 and id > 2 and id=$manager limit 0,1");
		if(sizeof($r)>0){
			foreach($r as $rr){
				list($mfio, $mphone_mob, $mphone_work, $mphone_work_int, $memails, $micq, $mskype, $mjabber)=$rr;
			}
		
?>	
<div id="predl_on_market" style="background-color: #B7B7B7;padding:1px; margin-top:20px;">
<div class="predl_on_market2" style="background-color: #F7F7F7;padding:8px;font-size:12px; line-height:16px; " data-corner="top 8px" >��� ������������ �������� �� Market.RusCable.Ru:</div> 
<div class="predl_on_market2" style="background-color: #fff;" data-corner="bottom 8px">
<p style=" font-size:12px; line-height:16px; padding:10px; margin:0px;">
		<span style="color:#FE5A24;"><b><?=$mfio?></b></span>
		<br><br>
		<span style="color:#0079C2;">������� �������:</span>
		<br>
		<?=$mphone_work?>, ���������� <?=$mphone_work_int?><br><br>
		<?
			if($mphone_mob != ""){
			?>
			<span style="color:#0079C2;">��������� �������:</span>
			<br>
			<?=$mphone_mob?><br><br>
			<?
			}
		?>
		
		<?
			if($memails != ""){
			?>
			<span style="color:#0079C2;">Email:</span>
			<br>
			<a href="mailto:<?=$memails?>" style="color:black;"><?=$memails?></a><br><br>
			<?
			}
		?>
		<?
			if($micq != ""){
				$micq=preg_replace("/[^0-9]/","",$micq);
			?>
			<span style="color:#0079C2;">ICQ:</span>
			<br>
			<?=$micq?> <a href="http://www.icq.com/whitepages/cmd.php?uin=<?=$micq?>&action=message"><img src="http://status.icq.com/online.gif?icq=<?=$micq?>&img=5" border=0></a>

			<br><br>
			<?
			}
		?>
		<?
			if($mskype != ""){
			?>
			<span style="color:#0079C2;">Skype:</span>
			<br>
			<?=$mskype?><br><br>
			<?
			}
		?>
<span style="color:#FE5A24;">����������� �� ������������� �� ����� ������� �������!</b>
		</p>
		
		</div>
		</div> 

	
<?
		}
	}
}

?>