<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$blogsor=$db->prepare("SELECT * FROM blog WHERE blog_durum=:durum");


$blogsor->execute(array(
  'durum'=>0

  ));




?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Blog Başvuruları <small>,

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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Yazılan Tarih </th>
                  <th>Blog Başlık</th>
                  <th>Blog Etiket</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $say=0;
                while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) {$say++?>


                <tr>
                  <td><?php echo $say;?></td>
                  <td><?php echo @$blogcek['blog_tarih'] ?></td>
                  <td><?php echo @$blogcek['blog_baslik'] ?></td>
                  <td><?php echo @$blogcek['blog_etiket'] ?></td>
                  <td><center><a href="blog-onay-islemleri.php?blog_id=<?php echo $blogcek['blog_id']; ?>"><button class="btn btn-primary btn-xs">Blog İnceleme</button></a></center></td>
            
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
