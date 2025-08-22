<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary font-weight-bold">Ayarlar</h1>
        </div>
        <div class="card-body">
            <form action="ayarlar_submit" method="get" accept-charset="utf-8">
                <div class="form-row">
                    <div class="col-md-6"> <!-- 6 kolonluk yer kapla -->
                        <label>Sitenizin Başlığını Girin</label>
                        <input class="form-control" type="text" name="" placeholder="Sitenizin Başlığını Girin">
                    </div>
                </div>
                <div class="form-row my-2"> <!-- margin top bottom 2 -->
                    <div class="col-md-6"> <!-- 6 kolonluk yer kapla -->
                        <label>Sitenizin Açıklamasını Girin</label>
                        <input class="form-control" type="text" name="" placeholder="Sitenizin Açıklamasını Girin">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6"> <!-- 6 kolonluk yer kapla -->
                        <label>Site Sahibi İsmini Girin</label>
                        <input class="form-control" type="text" name="" placeholder="Site Sahibi İsmini Girin">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Kaydet</button> <!-- margin top 2 -->
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>