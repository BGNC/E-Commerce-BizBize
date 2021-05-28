
<?php 

require_once 'header.php'; 

islemkontrol();

?>



<!-- Header Area End Here -->

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">



        <div class="row settings-wrapper">


            <?php require_once 'hesap-sidebar.php' ?>


            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12"> 

             <?php 

             if (@$_GET['durum']=="hata") {?>

             <div class="alert alert-danger">
                <strong>Hata!</strong> İşlem Başarısız 
            </div>                   
            
            <?php } else if (@$_GET['durum']=="ok") {?>

            <div class="alert alert-success">
                <strong>Bilgi!</strong> İşlem Başarılı Reklam Alanınız Güncellendi.
            </div>                   
            
            <?php } 
            ?>


            <form action="nedmin/netting/kullanici.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Reklam Alanı Güncelleme</h2>
                        <div class="personal-info inner-page-padding"> 

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Yüklü Resim</label>
                     <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($kullanicicek['kullanici_resim'])>0) {?>

                    <img width="200"  src="<?php echo $kullanicicek['kullanici_resim']; ?>">

                    <?php } else {?>


                    <img width="200"  src="https://via.placeholder.com/729x250/FFFFFF/?text=Reklam" alt="REKLAM" title="REKLAM ALANI SLİDER">


                    <?php } ?>

                    
                  </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"><span style="font-size: 14px;">Reklam Resminizi Seçiniz</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" required="" id="first-name" name="kullanici_resim"  type="file">
                            </div>
                        </div>

                        <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_resim'] ?>">



                        <div class="form-group">

                            <div align="right" class="col-sm-12">
                               <button class="update-btn" name="kullanicireklamresimguncelle" id="login-update">Güncelle</button>

                           </div>
                       </div>                                        
                   </div> 
               </div> 



           </div> 

       </form> 
   </div>  
</div>  
</div>  
</div> 
<!-- Settings Page End Here -->


<?php require_once 'footer.php'; ?>