<?php 

include 'header.php'; 

$blogsor=$db->prepare("SELECT * FROM blog WHERE blog_id=:blog_id");
$blogsor->execute(array(
  'blog_id'=>@$_GET['blog_id']
  ));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

$kul_id=$blogcek['kullanici_id'];

$kulsor=$db->prepare('SELECT * FROM kullanici WHERE kullanici_id=:id');
$kulsor->execute(array(
  'id'=>$kul_id
  ));
  $kulcek=$kulsor->fetch(PDO::FETCH_ASSOC);



?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Blog Onay İşlemleri<small>,

              <?php 

              if (@$_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif (@$_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
         
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <form action="../netting/admin_islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($blogcek['blog_resim'])>0) {?>

                    <img width="200"  src="../../<?php echo $blogcek['blog_resim']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../dimg/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="blog_resim"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $blogcek['blog_resim']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="bloglogoduzenle" class="btn btn-primary">Güncelle</button>
                </div>

              </form>










            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/admin_islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kayıt Tarihi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="" id="first-name" name="blog_tarih" disabled="" value="<?php echo $blogcek['blog_tarih']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Yazar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kullanici_ad" disabled="" value="<?php echo $kulcek['kullanici_ad']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               
              <div id="tc">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Başlık<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="blog_baslik" value="<?php echo $blogcek['blog_baslik']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


              </div>
  
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blog Etiket<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="blog_etiket" value="<?php echo $blogcek['blog_etiket']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



              
             
                <div class="form-group">
                 <label class="col-sm-3 control-label">Blog İçerik (Kopyala-Yapıştır Kullanmayınız)</label>
                   <div class="col-sm-6">

                      <textarea style="width: 493px;height: 250px;" rows="15"  cols="69.5" name="blog_icerik"  placeholder="İçeriğinizi Lütfen Kendiniz Giriniz. Kopyala Yapıştır Yapmayınız."><?php echo $blogcek['blog_icerik'];?></textarea>  
                   </div>
                </div>
              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="blog_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kullanicicek['kullanici_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" <?php echo $blogcek['blog_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($blogcek['blog_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  <!-- <?php 

                   if ($kullanicicek['kullanici_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->

                 </select>
               </div>
             </div>


             <input type="hidden" name="blog_id" value="<?php echo @$_GET['blog_id']; ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" onclick="return confirm('Blog Başvurusunu Onaylamak İstiyor musunuz ?')" name="blogonaykayit" class="btn btn-success"> Başvuruyu Onayla </button>
                <a class="btn btn-danger" onclick="return confirm('Blog Başvurusunu İptal Etmekten Eminmisiniz ?')" href="../netting/admin_islem.php?blogonay=red&blog_id=<?php echo $blogcek['blog_id'] ?>">Başvuruyu İptal ET.</a>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



  <hr>
  <hr>
  <hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
<script type="text/javascript">

            $(document).ready(function()
            {
                $('#kullanici_tip').change(function(){


                    var tip = $('#kullanici_tip').val();
                    if(tip=="PERSONAL")
                    {
                        $("#kurumsal").hide();
                        $('#tc').show();
                    }else if(tip=="PRIVATE_COMPANY")
                    {
                           $("#kurumsal").show();
                        $('#tc').hide();
                    }




                }).change();



            })
                






            </script>