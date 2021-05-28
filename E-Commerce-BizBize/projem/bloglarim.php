
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






        <div class="settings-details tab-content">
          <div class="tab-pane fade active in" id="Personal">
            <h2 class="title-section">Bloglarım</h2>
            <div class="personal-info inner-page-padding"> 

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarih</th>
                    <th scope="col">Blog Başlık</th>
                    <th scope="col">Blog Etiket</th>
                    <th scope="col">Durum</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $blogsor=$db->prepare("SELECT blog.*,kullanici.* FROM blog INNER JOIN kullanici ON blog.kullanici_id=kullanici.kullanici_id WHERE blog.kullanici_id=:kullanici_id AND blog.blog_durum=:onay");

                  $blogsor->execute(array(
                    'kullanici_id' => $_SESSION['userkullanici_id'],
                    'onay' => 1  
                  ));



                  while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) 
                  {

                   $say++?>


                  <tr>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $blogcek['blog_tarih'] ?></td>
                    <td><?php echo $blogcek['blog_baslik'] ?></td>
                    <td><?php echo $blogcek['blog_etiket'] ?></td>
                    <td><a href="blog-duzenle?blog_id=<?php echo $blogcek['blog_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>
                    <td><?php 

                    if ($blogcek['blog_durum']==0) {?>

                    <button class="btn btn-warning btn-xs"> Onay Bekleniyor</button>

                   
                    <?php  }elseif($blogcek['blog_durum']==1)
                    { ?>
                    <a onclick="return confirm('Bu Blogu Silmek İstiyor musunuz? \n İşlem geri alınamaz...')" href="nedmin/netting/admin_islem.php?blogsil=ok&blog_id=<?php echo $blogcek['blog_id'] ?>&blog_resim=<?php echo $blogcek['blog_resim'] ?>"><button class="btn btn-danger btn-xs">Blog Sil !</button></a>
                    <?php }?>
                  </td>

                </tr>

                <?php } ?>


              </tbody>
            </table>






















          </div> 
        </div> 



      </div> 


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