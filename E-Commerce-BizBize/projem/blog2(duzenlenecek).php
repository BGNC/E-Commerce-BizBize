
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
                        <h2 class="title-section">Bloglarım / Tariflerim</h2>


                       
                        <div class="panel-group help-page-wrapper" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                           #  Konu Başlığı
                                        </a>
                                    </div>
                                </div>
                                <div aria-expanded="false" id="collapseOne" role="tabpanel" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>How To Buy A Product?</h3>
                                        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurbut also survived but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the releas survived not  raseth leap into electronic typesetting, remaining essentially unchanged. </p>
                                        <h3>How To Get Product Support?</h3>
                                        <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centurbut also survived but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the releas survived not  raseth leap into electronic typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                       




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
                                    <label class="col-sm-3 control-label">Blog İçerik</label>
                                    <div class="col-sm-9">

                                        <textarea   rows="15"  cols="69.5"  class="ckeditor" id="editor1" name="blog_icerik" placeholder="Blog İçerik Giriniz."></textarea>
                                    </div>
                                </div>

                                <script type="text/javascript">

                                   CKEDITOR.replace( 'editor1',

                                   {

                                      filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                                      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                                      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                                      filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                                      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                      forcePasteAsPlainText: true

                                  } 

                                  );

                              </script>
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