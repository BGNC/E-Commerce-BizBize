<?php 
require_once 'header.php'; 

?>
<!-- Header Area End Here -->
<?php require_once 'search.php' ?>
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here -->          
<!-- Product Page Grid Start Here -->
<div class="product-page-list bg-secondary section-space-bottom">                
    <div class="container">
        <div class="row">                        
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
                <div class="inner-page-main-body">
                    <div class="page-controls">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="page-controls-sorting">
                                    <div class="dropdown">
                                        <!--<button class="btn sorting-btn dropdown-toggle" type="button" data-toggle="dropdown">Default Sorting<i class="fa fa-sort" aria-hidden="true"></i></button>-->
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Date</a></li>
                                            <li><a href="#">Best Sale</a></li>
                                            <li><a href="#">Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                                <div class="layout-switcher">
                                    <ul>


                                        <!--<li><a href="#gried-view" data-toggle="tab" aria-expanded="false"><i class="fa fa-th-large"></i></a></li>-->  

                                        <!--<li class="active"><a href="#list-view" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active clear products-container" id="list-view">
                            <div class="product-list-view">

                                <?php 
                                if (isset($_GET['kategori_id'])) {

                                        $sayfada = 6; // sayfada g??sterilecek i??erik miktar??n?? belirtiyoruz.

                                        $sorgu=$db->prepare("select * from urun where kategori_id=:kategori_id");
                                        $sorgu->execute(array(
                                            'kategori_id' => $_GET['kategori_id']
                                            ));
                                        $toplam_icerik=$sorgu->rowCount();
                                        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                                     // e??er sayfa girilmemi??se 1 varsayal??m.
                                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                                    // e??er 1'den k??????k bir sayfa say??s?? girildiyse 1 yapal??m.
                                        if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa say??m??zdan fazla yaz??l??rsa en son sayfay?? varsayal??m.
                                        if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                                        $limit = ($sayfa - 1) * $sayfada;

                                        //t??m tablo s??tunlar??n??n ??ekilmesi
                                        $urunsor=$db->prepare("SELECT urun.*,kategori.*,kullanici.* FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id WHERE urun_durum=:urun_durum and kategori.kategori_id=:kategori_id order by urun_zaman DESC limit $limit,$sayfada");
                                        $urunsor->execute(array(
                                            'urun_durum' => 1,
                                            'kategori_id' => $_GET['kategori_id']
                                            ));

                                        $say=$sorgu->rowCount();



                                        if ($say==0) {
                                            echo "Bu kategoride ??r??n Bulunamad??";
                                        }


                                    } else {

                                        $sayfada = 6; // sayfada g??sterilecek i??erik miktar??n?? belirtiyoruz.
                                        $sorgu=$db->prepare("select * from urun");
                                        $sorgu->execute();
                                        $toplam_icerik=$sorgu->rowCount();
                                        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                                     // e??er sayfa girilmemi??se 1 varsayal??m.
                                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                                    // e??er 1'den k??????k bir sayfa say??s?? girildiyse 1 yapal??m.
                                        if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa say??m??zdan fazla yaz??l??rsa en son sayfay?? varsayal??m.
                                        if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                                        $limit = ($sayfa - 1) * $sayfada;


                                        $urunsor=$db->prepare("SELECT urun.urun_ad,urun.urun_id,urun.urun_fiyat,urun.urunfoto_resimyol,urun.kategori_id,urun.kullanici_id,urun.urun_durum,urun.urun_onecikar,urun.urun_zaman,kategori.kategori_ad,kullanici.kullanici_ad,kullanici.kullanici_soyad,kullanici.kullanici_magazafoto FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id WHERE urun_durum=:urun_durum and urun_onecikar=:urun_onecikar order by urun_zaman DESC limit $limit,$sayfada");
                                        $urunsor->execute(array(
                                            'urun_durum' => 1,
                                            'urun_onecikar' => 1
                                            ));

                                        $say=$sorgu->rowCount();

                                        if ($say==0) {
                                            echo "Bu kategoride ??r??n Bulunamad??";
                                        }



                                    }



                                    while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {                     


                                        ?>

                                        <div class="single-item-list">

                                            <div class="item-img">
                                                <img style="width: 238px; height: 178px;" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="<?php echo $uruncek['urun_ad'] ?>" class="img-responsive">
                                            </div>
                                            <div class="item-content">
                                                <div class="item-info">
                                                    <div class="item-title">
                                                        <h3><a href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>"><?php echo $uruncek['urun_ad'] ?></a></h3>
                                                        <span><?php echo $uruncek['kategori_ad'] ?></span>
                                                    </div>
                                                    <div class="item-sale-info">
                                                        <div class="price"><?php echo $uruncek['urun_fiyat'] ?> <span style="font-size:12px;">TL</span></div>
                                                        <div class="sale-qty">Sat???? ( 0 )</div>
                                                    </div>
                                                </div>
                                                <div class="item-profile">
                                                    <div class="profile-title">
                                                        <div class="img-wrapper"><img src="<?php echo $uruncek['kullanici_magazafoto'];?>" alt="profile" class="img-responsive img-circle"></div>
                                                        <span><?php echo $uruncek['kullanici_ad']." ".substr($uruncek['kullanici_soyad'],0,1) ?>.</span>
                                                    </div>
                                                    <div class="profile-rating-info">
                                                     <ul>
                                                        <?php 

                                                        $puansay=$db->prepare("SELECT COUNT(yorumlar.yorum_puan) as say, SUM(yorumlar.yorum_puan) as topla, yorumlar.*,urun.* FROM yorumlar INNER JOIN urun ON yorumlar.urun_id=urun.urun_id where urun.kullanici_id=:id");
                                                        $puansay->execute(array(
                                                            'id' => $uruncek['kullanici_id']
                                                            ));

                                                        $puancek=$puansay->fetch(PDO::FETCH_ASSOC);


                                                        @$puan=round($puancek['topla']/ $puancek['say']);

                                                        ?>
                                                        <ul class="default-rating">

                                                            <?php

                                                            switch ($puan) {

                                                                case '5': ?>

                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li>(<span> <?php echo $puan ?></span> )</li>

                                                                <?php                                                                           
                                                                break;

                                                                case '4': ?>

                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li>(<span> <?php echo $puan ?></span> )</li>


                                                                <?php                                                                           
                                                                break;

                                                                case '3': ?>

                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li>(<span> <?php echo $puan ?></span> )</li>


                                                                <?php                                                                           
                                                                break;

                                                                case '2': ?>

                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li>(<span> <?php echo $puan ?></span> )</li>


                                                                <?php                                                                           
                                                                break;

                                                                case '1': ?>

                                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>         
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li><i style="color:grey" class="fa fa-star" aria-hidden="true"></i></li>
                                                                <li>(<span> <?php echo $puan ?></span> )</li>


                                                                <?php                                                                           
                                                                break;


                                                            }

                                                            ?>                       

                                                            <!-- COMMENT-->
                                                            <!--<li><i class="fa fa-comment-o" aria-hidden="true"></i>( 10 )</li>-->

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <?php } ?>


                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <ul class="pagination-align-left">

                                                    <?php

                                                    $s=0;

                                                    while ($s < $toplam_sayfa) {

                                                        $s++; ?>

                                                        <?php

                                                        if (!empty($_GET['kategori_id'])) { 

                                                            if ($s==$sayfa) {?>

                                                            <li class="active"><a href="kategoriler-<?php echo $_GET['sef']; ?>-<?php echo $_GET['kategori_id'] ?>?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>



                                                            <?php } else {?>



                                                            <li><a href="kategoriler-<?php echo $_GET['sef']; ?>-<?php echo $_GET['kategori_id'] ?>?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

                                                            <?php   }


                                                        } else {


                                                            if ($s==$sayfa) {?>



                                                            <li><a style="background-color: #C84C3C; color:white;" href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>


                                                            <?php } else {?>

                                                            <li><a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>




                                                            <?php   }


                                                        }

                                                    }

                                                    ?>

                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>                               
                            </div>                                
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-pull-9 col-md-pull-8 col-sm-pull-8">

                        <?php require_once 'sidebar.php' ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Page Grid End Here -->
        <?php 
        require_once 'footer.php'; 

        ?>