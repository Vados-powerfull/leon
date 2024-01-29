<?php
	include("../../core/model/common.php");
	$r = mqs("update ".$_POST['table']." set ordering=".$_POST['ord']." where id=".$_POST['id']);
