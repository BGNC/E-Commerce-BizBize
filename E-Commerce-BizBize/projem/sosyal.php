
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
                <strong>Bilgi!</strong> Kayıt Başarılı
            </div>                   
            
            <?php }
            ?>

               <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Sosyal Medya Hesaplarım</h2>
                        <div class="profile-social inner-page-padding">
                                             <ul class="social-item">      
                                                 <li>
                                                    <div class="social-item-img"><img src="img\profile\social2.jpg" alt="badges" class="img-responsive"></div> 
                                                    <input class="profile-heading" name="facebook" placeholder="Kullanıcı Adınızı Giriniz "
                                                     value="" type="text">
                                                </li>
                                                 <li>
                                                    <div class="social-item-img"><img src="img\profile\social3.jpg" alt="badges" class="img-responsive"></div> 
                                                    <input class="profile-heading" name="twitter" placeholder="Kullanıcı Adınız" value="" type="text">
                                                </li>
                                                 <li>
                                                    <div class="social-item-img"><img src="img\profile\20.jpg" alt="badges" class="img-responsive"></div> 
                                                    <input class="profile-heading" name="instagram" placeholder="Kullanıcı Adınız" value="" type="text">
                                                </li>                                          
                                            </ul>     
                                             <div class="form-group">
                                                    <div align="right" class="col-sm-12">
                                                        <button class="update-btn" name="sosyalmedyakaydet" id="login-update">Kaydet</button>
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