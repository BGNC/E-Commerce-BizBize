
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


            <form action="nedmin/netting/kullanici.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">


                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Kendi Blogunu Oluştur</h2>
                        <div class="personal-info inner-page-padding"> 


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Blog Fotoğrafı</label>
                                <div class="col-sm-9">
                                    <input class="form-control" required="" name="blog_resim" id="first-name"  type="file">
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="col-sm-3 control-label">Blog Kategori</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" required="" placeholder="Teknoloji?" name="blog_etiket" id="first-name"  type="text">
                                    </div>
                                </div>

                            


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Blog Başlık</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" required="" placeholder="gitHub Nedir ?" name="blog_baslik" id="first-name" placeholder="Blog Başlık" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Blog Tarih</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" required="" name="blog_tarih" id="first-name" placeholder="Blog Tarihi" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Blog İçerik (Kopyala-Yapıştır Kullanmayınız)</label>
                                    <div class="col-sm-9">

                                        <textarea style="width: 574px;height: 350px;" rows="15"  cols="69.5" name="blog_icerik"  placeholder="İçeriğinizi Lütfen Kendiniz Giriniz." required=""></textarea>  
                                    </div>
                                </div>

                              
                                     <!--<div style="margin-left:200px;" class="form-group form-check">
                                      <input type="checkbox" name="anonim" value="0" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Anonim Olarak Paylaş </label>
                                      </div>-->
                              <div class="form-group">
                                <div align="right" class="col-sm-12">
                                 <button class="update-btn" name="blogekle" id="login-update">Paylaş</button>
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

<script type="text/javascript">

    $(document).ready(function(){


        $("#kullanici_tip").change(function(){


            var tip=$("#kullanici_tip").val();

            if (tip=="PERSONAL") {


                $("#kurumsal").hide();
                $("#tc").show();



            } else if (tip=="PRIVATE_COMPANY") {

                $("#kurumsal").show();
                $("#tc").hide();

            }


        }).change();



    });

</script>