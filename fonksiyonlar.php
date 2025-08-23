<?php

function tr_degistirme($metin) {
    $metin= trim($metin);
	$aranacak=array("ş","Ş","ı","ü","Ü","ö","Ö","ç","Ç","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü");
	$replace=array("s","S","i","u","U","o","O","c","C","s","S","i","g","G","I","o","O","C","c","u","U");
	$yeni_metin=str_replace($aranacak,$replace,$metin);
	return $yeni_metin;
};


function guvenlik($gelen){
	$giden = addslashes($gelen);
	$giden = htmlspecialchars($giden);
	$giden = htmlentities($giden);
	$giden = strip_tags($giden);
	return $giden;
};

?>