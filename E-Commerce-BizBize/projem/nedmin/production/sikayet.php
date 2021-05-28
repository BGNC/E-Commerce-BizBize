<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$sikayetsor=$db->prepare("SELECT * FROM sikayet");
$sikayetsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Şikayet Listeleme<small>,

              <?php 

              if (@$_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif (@$_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

           <!-- <div align="right">
              <a href="yorum-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>-->
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Konu</th>
                  <th>Şikayet</th>
                  <th>Kullanıcı</th>
                  <th>Mail</th>
                  <th></th>
                  
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($sikayetcek=$sikayetsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $sikayetcek['konu'];?></td>
                 <td><?php echo $sikayetcek['mesaj'] ?></td>
                 <td><?php echo $sikayetcek['name'];?></td>
                 <td><?php echo $sikayetcek['email'];?></td>
                 <td><center><a onclick="confirm('Bu şikayeti silmek istediğinizden eminmisiniz ?')" href="../netting/islem.php?sikayet_id=<?php echo $sikayetcek['mesaj_id']; ?>&sikayetsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                    
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
