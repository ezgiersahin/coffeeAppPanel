<!--/Güvenlik önlemi-->
<?php
$id = $_SESSION["login_id"];

if ($diyezajans != '159951') {
    die('
    <div class="alert alert-danger" role="alert"><button type="button" class="btn-close mr-negative-16" data-bs-dismiss="alert" aria-hidden="true">×</button>Sayfalara Doğrudan Erişim Engellenmiştir.</div>
    <meta http-equiv="Refresh" content="2; URL=../anasayfa.php">
	');
}

$firmaCek = $db->query("SELECT * from firmalar where id=$id")->fetch(PDO::FETCH_ASSOC);
// print_r($firmaCek);

$ad = $firmaCek["ad"];
$mail = $firmaCek["mail"];
$telefon = $firmaCek["telefon"];
$adres = $firmaCek["adres"];
$sifre = $firmaCek["sifre"];
$logo = $firmaCek["logo"];
$yildiz_limit = $firmaCek["yildiz_limit"];
$hakkimizda = $firmaCek["hakkimizda"];

?>
<!--/Güvenlik önlemi-->
<!--Page header-->
 <div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary">Firma Bilgileri</h4>
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" action="?s=action" method="post" enctype="multipart/form-data">
                    <div class="card-title font-weight-bold"></div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Firma Adı</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Firma Adı Giriniz..."
                                       value="<?=$ad?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="data[]"
                                       placeholder="Mail Adresi Giriniz..." value="<?=$mail?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Telefon</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Telefon Giriniz..."
                                       value="<?=$telefon?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Adres</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Adres Giriniz..."
                                       value="<?=$adres?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Şifre</label>
                                <input type="text" class="form-control" name="data[]" value="<?=$sifre?>"
                                       required>
                            </div>
                        </div>
						<div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="form-label">Yıldız Limit</label>
                                <input type="text" class="form-control" name="data[]" placeholder="Yıldız Limit Giriniz..."
                                       value="<?=$yildiz_limit?>" required>
                            </div>
                        </div>


                    <div class="card-title font-weight-bold mt-5">Hakkımızda:</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label class="form-label">Hakkımızda</label> -->
                                <textarea rows="5" class="form-control" value="<?=$hakkimizda?>" name="data[]"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="sorgu" value="update firmalar set ad=?,mail=?,telefon=?,adres=?,sifre=?,yildiz_limit=?,hakkimizda=? where id=?">
                    <button type="submit" name="update" class="btn btn-primary mt-4 mb-0">Kaydet</button>
					
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
