<?php include 'header.php';

// Sipariş ID kontrolü
if (isset($_POST['sip_id'])) {
    $siparissor = $db->prepare("SELECT * FROM siparis WHERE sip_id=:id");
    $siparissor->execute(array(
        'id' => $_POST['sip_id']
    ));
    $sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC);

} else {
    header("location:index.php");
}


?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Sipariş Düzenleme</h5>
        </div>
        <div class="card-body">
            <form action="islemler/islem.php" method="POST">

                <div class="form-row mt-3">
                    <div class="col-md-6">
                        <label>İsim Soyisim</label>
                        <input type="text" class="form-control" name="musteri_isim"
                            value="<?php echo $sipariscek['musteri_isim'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Mail Adresi</label>
                        <input type="email" class="form-control" name="musteri_mail"
                            value="<?php echo $sipariscek['musteri_mail'] ?>">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-6">
                        <label>Telefon Numarası</label>
                        <input type="number" class="form-control" name="musteri_telefon"
                            value="<?php echo $sipariscek['musteri_telefon'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Sipariş Başlığı</label>
                        <input type="text" class="form-control" name="sip_baslik"
                            value="<?php echo $sipariscek['sip_baslik'] ?>">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label>Sipariş Durumu</label>
                        <select required name="sip_durum" class="form-control">
                            <option <?php if ($sipariscek['sip_durum'] == "Yeni Başladı") {
                                echo "selected";
                            } ?>>Yeni
                                Başladı</option>
                            <option <?php if ($sipariscek['sip_durum'] == "Devam Ediyor") {
                                echo "selected";
                            } ?>>Devam
                                Ediyor</option>
                            <option <?php if ($sipariscek['sip_durum'] == "Bitti") {
                                echo "selected";
                            } ?>>Bitti</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ücret (TL)</label>
                        <input type="number" class="form-control" required name="sip_ucret"
                            value="<?php echo $sipariscek['sip_ucret'] ?>">
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-6">
                        <label>Teslim Tarihi</label>
                        <input type="date" class="form-control" required name="sip_teslim_tarihi"
                            value="<?php echo $sipariscek['sip_teslim_tarihi'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Aciliyet</label>
                        <select required name="sip_aciliyet" class="form-control">
                            <option <?php if ($sipariscek['sip_aciliyet'] == "Acil") {
                                echo "selected";
                            } ?>>Acil</option>
                            <option <?php if ($sipariscek['sip_aciliyet'] == "Normal") {
                                echo "selected";
                            } ?>>Normal
                            </option>
                            <option <?php if ($sipariscek['sip_aciliyet'] == "Acelesi Yok") {
                                echo "selected";
                            } ?>>Acelesi
                                Yok</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="form-group col-md-12">
                        <label>Sipariş Detay</label>
                        <textarea name="sip_detay" id="editor" class="form-control"
                            value="<?php echo $sipariscek['sip_detay'] ?> "></textarea>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
                <div class="form-row mt-4 text-center float-right">
                    <button type="submit" name="siparisduzenle" class="btn btn-primary btn-lg"><i
                            class="fa fa-save"></i>
                        Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>