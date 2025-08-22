<?php include 'header.php'; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Projeler</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>Bitiş Tarihi</th>
                        <th>Aciliyet</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
                <tbody>
                    <?php
                    $say=0;
                    $projesor = $db->prepare("SELECT * FROM proje");
                    $projesor->execute();
                    while ($projecek = $projesor->fetch(PDO::FETCH_ASSOC)) {
                        $say++ ?>
                        <tr>
                            <td><?php echo $say; ?></td>
                            <td><?php echo $projecek['proje_baslik']; ?></td>
                            <td><?php echo $projecek['proje_teslim_tarihi']; ?></td>
                            <td><?php echo $projecek['proje_aciliyet']; ?></td>
                            <td><?php echo $projecek['proje_durum']; ?></td>
                            <td>xxxxxxx</td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>