<?php
$id = $_REQUEST["login_id"];

if ($diyezajans != '159951') {
    die('
    <div class="alert alert-danger" role="alert"><button type="button" class="btn-close mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>Sayfalara Doğrudan Erişim Engellenmiştir.</div>
    <meta http-equiv="Refresh" content="2; URL=../anasayfa.php">
	');
}
$kampanya_id =$_REQUEST["id"];
$kampanyaCek = $db->query("SELECT * from kampanyalar WHERE id=$kampanya_id AND firma_id=$firma_id")->fetch(PDO::FETCH_ASSOC);
// print_r($kampanyaCek);
$id = $kampanyaCek["id"];
$son_tarih = $kampanyaCek["son_tarih"];
$aciklama = $kampanyaCek["aciklama"];
?>

<!--Page header-->
                 <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title mb-0 text-primary">Kampanya Edit</h4>
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

        <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Son Tarih</label>
                    <input type="text" class="form-control" name="data[]" placeholder="Adres Giriniz..."
                            value="<?=$son_tarih?>" required>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <input type="text" class="form-control" name="data[]" placeholder="Yıldız Giriniz..."
                            value="<?=$aciklama?>" required>
                </div>
            </div>
                     
                 
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="sorgu" value="update kampanyalar set son_tarih=?,aciklama=? WHERE id=?">
                    <button type="submit" name="update" class="btn btn-primary mt-4 mb-0">Kaydet</button>
					
                </form>
            </div>
        </div>
    </div>
</div>