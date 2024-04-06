<!--/Güvenlik önlemi-->
<?php
if ($diyezajans != '159951') {
    die('
    <div class="alert alert-danger" role="alert"><button type="button" class="btn-close mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>Sayfalara Doğrudan Erişim Engellenmiştir.</div>
    <meta http-equiv="Refresh" content="2; URL=../anasayfa.php">
	');
}
$firma_id = $_SESSION["login_id"];
$sql="SELECT * FROM kategoriler";
$sorgu = $db->prepare($sql);
$sorgu -> execute();
$bilgiler = $sorgu -> fetchAll();
?>
<!--/Güvenlik önlemi-->
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">Ürünler Sayfası</h4>
    </div>
    <div class="page-rightheader">
        <div class="btn-list">
            <button class="btn btn-outline-primary"><i class="fe fe-download"></i>Boş Button</button>
        </div>
    </div>
</div>
<!--End Page header-->

<!-- Row -->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" action="?s=action" method="post" enctype="multipart/form-data">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Ürün Adı</label>
                            <input type="text" class="form-control" name="data[]" placeholder="Ürün Adı Giriniz..." >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Fiyat</label>
                            <input type="text" class="form-control" name="data[]" placeholder="Fiyat Giriniz..." >
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <label class="form-label">Yıldız Limit</label>
                            <input type="number" class="form-control" name="data[]"
                                   placeholder="Yıldız Limit Belirleyiniz..." >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Açıklama</label>
                            <textarea rows="5" class="form-control" name="data[]"
                                      placeholder="Enter About your description"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Kategoriler</label>
                            <select name="data[]"  type="text" class="form-control" >
                                <?php
                                foreach ($bilgiler as $bilgi){
                                    $kategori_id = $bilgi['id'];
                                $kategori_ad = $bilgi['ad'];
                                echo "<option value=\"$kategori_id\"> $kategori_ad</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="<?=$firma_id?>" name="data[]">
                    <div class="row mb-3">
                        <input type="file" name="resim[]" id="imageFile">
                    </div>

             <div class="text-center mt-4">
                <input type="hidden" name="sorgu" value="insert into urunler set ad=?,fiyat=?,yildiz=?,aciklama=?,kategori_id=?,firma_id=?,resim=?">
                <button class="btn btn-primary" type="submit" name="resim" > Kaydet </button>
              
            </div>

                  </form>
            </div>
        </div>
    </div>


    <div class="col-md-6">
<div class="card">
    <div class="card-body">
        <table id="example1" class="display">

            <thead>
            <tr>
                <th>Ürün Adı</th>
                
                <th>Fiyat</th>
                <th>Yıldız</th>
                <th>Açıklama</th>
                <th>Resim</th>
                <th>Yapılacak İşlemler</th>
            </tr>
            </thead>
            <tbody>
           <?php

                $sql="SELECT * FROM urunler WHERE firma_id=$firma_id";
                $sorgu = $db->prepare($sql);
                $sorgu -> execute();
                $bilgiler = $sorgu -> fetchAll();
           foreach($bilgiler as $veri){
               $id = $veri["id"];
               $ad = $veri["ad"];
               $fiyat = $veri["fiyat"];
               $yildiz = $veri["yildiz"];
               $aciklama = substr($veri["aciklama"],0,50);
               $resim_ad = $veri["resim"];
             $resim_url = "/APP/firma_resimler/" .$resim_ad;


               echo "
    <tr>
    <td>$ad</td>
    <td>$fiyat</td>
    <td>$yildiz</td>
    <td>$aciklama</td>
    <td><img src='$resim_url' alt='' style='width: 50px; height: 50px;'></td>
    <td>
        <a href=\"?s=urun-edit&id=$id\"class=\"btn btn-outline-primary\"><i class='fe fe-eye'></i></a>
        <a href=\"?s=action&islem=delete&tablo=urunler&id=$id\" id='click2' class=\"btn btn-outline-danger silmeButton\"><i class='fe fe-trash-2'></i></a>
    </td>

</tr>
";
           }
           ?>
            </tbody>
        </table>
    </div>
    </div>
<!-- End Row -->