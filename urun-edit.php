<?php
$id = $_REQUEST["login_id"];

if ($diyezajans != '159951') {
    die('
    <div class="alert alert-danger" role="alert"><button type="button" class="btn-close mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>Sayfalara Doğrudan Erişim Engellenmiştir.</div>
    <meta http-equiv="Refresh" content="2; URL=../anasayfa.php">
	');
}

$urun_id =$_REQUEST["id"];
$urunCek = $db->query("SELECT * from urunler WHERE id=$urun_id ")->fetch(PDO::FETCH_ASSOC);
// print_r($urunCek);
$id = $urunCek["id"];
$ad = $urunCek["ad"];
$fiyat = $urunCek["fiyat"];
$yildiz = $urunCek["yildiz"];
$aciklama = $urunCek["aciklama"];
$resim = $urunCek["resim"];
$resim_url = "/firma_resimler/" . $resim;
?>

<!--Page header-->
                 <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title mb-0 text-primary">Ürün Edit</h4>
                    </div>
                    <div class="page-rightheader">
                        <div class="btn-list">
                            <button class="btn btn-outline-primary"><i class="fe fe-download"></i>Boş Button</button>
                        </div>
                    </div>
                </div> 
                <!--End Page header-->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" action="?s=action" method="post" enctype="multipart/form-data">
                    <div class="card-title font-weight-bold"></div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ürün Adı</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Ürün Adı Giriniz..."
                                       value="<?=$ad?>" required>
                            </div>
                        </div>
                      
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Fiyat</label>
                                <input type="text" class="form-control" name="data[]"
                                       placeholder="Fiyat Giriniz..." value="<?=$fiyat?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Yıldız</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Yıldız Giriniz..."
                                       value="<?=$yildiz?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Açıklama</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Adres Giriniz..."
                                       value="<?=$aciklama?>" required>
                            </div>
                        </div>
                        <div class="card-title font-weight-bold mt-5">Resim:</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="<?=$resim_url ?>" alt="" style="width: 100px; ">
                                    <input type="file" name="resim[]" id="imageFile" multiple>
                                </div>
                            </div>
                        </div>
                 
                    <input type="hidden" name="id" value="<?=$urun_id?>">
                    <input type="hidden" name="sorgu" value="update urunler set ad=?,fiyat=?,yildiz=?,aciklama=?,resim=? WHERE id=?">
                    <button type="submit" name="update" class="btn btn-primary mt-4 mb-0">Kaydet</button>
					
                </form>
            </div>
        </div>
    </div>
</div>