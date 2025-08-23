<?php
include 'baglan.php';

// oturum açma işlemleri güvenlik önlemleri
ob_start();
session_start();

if (isset($_POST['ayarkaydet'])) {  // eğer gele değerler doluysa
    // veri tabanı kayıt işlemi
    $ayarkaydet = $db->prepare("UPDATE ayarlar SET 
                                        site_baslik=:site_baslik, 
                                        site_aciklama=:site_aciklama,
                                        site_sahibi=:site_sahibi ");

    // güvenlik için 
    $ayarkaydet->execute(array(
        'site_baslik' => $_POST['site_baslik'],
        'site_aciklama' => $_POST['site_aciklama'],
        'site_sahibi' => $_POST['site_sahibi']

    ));

}

/********************************************************************************/

/*Oturum Açma İşlemi Giriş*/
if (isset($_POST['oturumac'])) {


    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail and kul_sifre=:sifre");
    $kullanicisor->execute(array(
        'mail' => $_POST['kul_mail'],
        'sifre' => $_POST['kul_sifre']
    ));
    $sonuc = $kullanicisor->rowCount();

    if ($sonuc == 0) {
        echo "Mail ya da şifreniz yanlış";
    } else {
        header("location:..index.php");
        $_SESSION['kul_mail'] = $_POST['kul_mail'];
    }



}
/*******************************************************************************/
/*Oturum Açma İşlemi Giriş*/



/*Proje ekle İşlemi Giriş*/
/*******************************************************************************/
if (isset($_POST['projeekle'])) { // PROJE EKEL FORMUNDAN GELİYORSAN
    $projeekle = $db->prepare("INSERT INTO proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarih,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay");
    $projeekle->execute(array(
        'baslik' => $_POST['proje_baslik'],
        'teslim_tarih' => $_POST['proje_teslim_tarihi'],
        'aciliyet' => $_POST['proje_aciliyet'],
        'durum' => $_POST['proje_durum'],
        'detay' => $_POST['proje_detay']
    ));

    if ($projeekle) {
        header("location:..index.php");
    } else {
        echo "Başarız";
        exit;
    }
}
/*******************************************************************************/
/*Proje ekle İşlemi Giriş*/


/*Proje duzenle İşlemi Giriş*/
/*******************************************************************************/
if (isset($_POST['projeduzenle'])) { // PROJE EKEL FORMUNDAN GELİYORSAN
    $projeduzenle = $db->prepare("UPDATE proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarih,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay
    WHERE proje_id=:proje_id"
    );
    $projeduzenle->execute(array(
        'baslik' => $_POST['proje_baslik'],
        'teslim_tarih' => $_POST['proje_teslim_tarihi'],
        'aciliyet' => $_POST['proje_aciliyet'],
        'durum' => $_POST['proje_durum'],
        'detay' => $_POST['proje_detay'],
        'proje_id' => $_POST['proje_id']
    ));

    if ($projeduzenle) {
        header("location:..index.php");
    } else {
        echo "Başarız";
        exit;
    }
}
/*******************************************************************************/
/*Proje duzenle İşlemi Giriş*/


/*Proje silme İşlemi Giriş*/
/********************************************************************************/

if (isset($_POST['projesilme'])) {
    $sil = $db->prepare("DELETE from proje where proje_id=:proje_id");
    $kontrol = $sil->execute(array(
        'proje_id' => $_POST['proje_id']
    ));

    if ($kontrol) {
        //echo "kayıt başarılı";
        header("location:../projeler.php");
    } else {
        echo "kayıt başarısız";
        exit;
    }
}

/********************************************************************************/
/*Proje silme İşlemi Giriş*/

/*Sipariş ekle İşlemi Giriş*/
/********************************************************************************/

if (isset($_POST['siparisekle'])) {
    $siparisekle = $db->prepare("INSERT INTO siparis SET
    musteri_isim=:isim,
    musteri_mail=:mail,
    musteri_telefon=:telefon,
    sip_baslik=:baslik,
    sip_teslim_tarihi=:teslim_tarihi,
    sip_aciliyet=:aciliyet,
    sip_durum=:durum,
    sip_ucret=:ucret,
    sip_detay=:detay
    /*yuzde=:yuzde,*/
    /*sip_baslama_tarih=:sip_baslama_tarih  */
    ");

    $siparisekle->execute(array(
        'isim' => $_POST['musteri_isim'],
        'mail' => $_POST['musteri_mail'],
        'telefon' => $_POST['musteri_telefon'],
        'baslik' => $_POST['sip_baslik'],
        'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
        'aciliyet' => $_POST['sip_aciliyet'],
        'durum' => $_POST['sip_durum'],
        'ucret' => $_POST['sip_ucret'],
        'detay' => $_POST['sip_detay']
        /*'yuzde' => $_POST['yuzde'], */
        /*'sip_baslama_tarih' => $_POST['sip_baslama_tarih']*/
    ));

    if ($siparisekle) {
        //echo "kayıt başarılı";
        header("location:../index.php");
    } else {
        echo "kayıt başarısız";
        exit;
    }
}

/********************************************************************************/
/*Sipariş ekle İşlemi Giriş*/



/*Sipariş düzenle İşlemi Giriş*/
/********************************************************************************/

if (isset($_POST['siparisduzenle'])) {
    $siparisduzenle = $db->prepare("UPDATE siparis SET
        musteri_isim=:isim,
        musteri_mail=:mail,
        musteri_telefon=:telefon,
        sip_baslik=:baslik,
        sip_teslim_tarihi=:teslim_tarihi,
        sip_aciliyet=:aciliyet,
        sip_durum=:durum,
        sip_ucret=:ucret,
        sip_detay=:detay
        WHERE sip_id=:sip_id
    ");

     $siparisduzenle->execute(array(
        'isim' => $_POST['musteri_isim'],
        'mail' => $_POST['musteri_mail'],
        'telefon' => $_POST['musteri_telefon'],
        'baslik' => $_POST['sip_baslik'],
        'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
        'aciliyet' => $_POST['sip_aciliyet'],
        'durum' => $_POST['sip_durum'],
        'ucret' => $_POST['sip_ucret'],
        'detay' => $_POST['sip_detay'],
        'sip_id' => $_POST['sip_id']  // HIDDEN INPUT’TAN GELİYOR 
    ));

    if ($siparisduzenle) {
        header("location:../siparisler.php");
    } else {
        echo "Sipariş güncelleme başarısız!";
        exit;
    }
}

/********************************************************************************/
/*Sipariş düzenle İşlemi Çıkış*/



/*Sipariş silme İşlemi Giriş*/
/********************************************************************************/

if (isset($_POST['siparissilme'])) {
    $sil = $db->prepare("DELETE from siparis where sip_id=:sip_id");
    $kontrol = $sil->execute(array(
        'sip_id' => $_POST['sip_id']
    ));

    if ($kontrol) {
        //echo "kayıt başarılı";
        header("location:../siparisler.php");
    } else {
        echo "kayıt başarısız";
        exit;
    }
}

/********************************************************************************/
/*Sipariş silme İşlemi Giriş*/

?>