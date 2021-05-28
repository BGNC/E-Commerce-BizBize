<?php 
require_once('header.php');

$blogsor=$db->prepare("SELECT blog.*,kullanici.* FROM blog INNER JOIN kullanici ON blog.kullanici_id=kullanici.kullanici_id where blog_id=:id");
$blogsor->execute(array(
  'id' => @$_GET['blog_id']
));

$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

$by=$blogcek['kullanici_id'];

$kulsor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
$kulsor->execute(array(
    'id'=>$by
    ));
$kulcek=$kulsor->fetch(PDO::FETCH_ASSOC);

@$date = $blogcek['blog_tarih'];
@$parcala=explode('-',$date,3);
@$yil =$parcala[0];
@$ay=$parcala[1];
@$gun=$parcala[2];
?>



        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <!-- Preloader End Here -->
        <!-- Main Body Area Start Here -->
      
            <!-- Header Area Start Here -->
            
            <!-- Header Area End Here -->
            <!-- Main Banner 1 Area Start Here 
            <div class="inner-banner-area">
                <div class="container">
                    <div class="inner-banner-wrapper">
                        <p>Premium WordPress Themes, Web Templates and Many More ...</p>
                        <div class="banner-search-area input-group">
                            <input class="form-control" placeholder="Search Your Keywords . . ." type="text">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index">Anasayfa</a><span> -</span></li>
                            <li>Blog Detay</li>
                        </ul>
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->    
            <!-- Single Blog Page Start Here -->
            <div class="single-blog-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <div class="row">
                 
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <h2 class="title-section"><?php echo $blogcek['blog_baslik'];?></h2>
                            <div class="inner-page-details inner-page-padding">
                                <div class="single-blog-wrapper">
                                    <div class="single-blog-img-holder">
                                        <a href="javascript:void(0)"><img src="<?php echo $blogcek['blog_resim'];?>" width="790" height="378" alt="blog" class="img-responsive"></a>
                                        <ul class="news-date1">
                                        <li><?php echo $gun."-".$ay."-".$yil;?></li>
                                           <!-- <li><?php echo $gun;?></li>
                                            <li><span  style="font-size:19px;color:white;"><?php echo $ay;?></span></li>
                                            <li><span style="font-size:19px;color:white;"><?php echo $yil;?></span></li>-->
                                        </ul>
                                    </div>
                                    <ul class="news-comments">
                                        <li><a href="javascript:void(0)"><i class="fa fa-user" aria-hidden="true"></i><span style="font-size:16px;">By</span> <span style="color:black;"><?php echo ucfirst($kulcek['kullanici_ad']);?></span></a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-tags" aria-hidden="true"></i><?php echo $blogcek['blog_etiket'];?></a></li>
                                      <!--  <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span>(03)</span> Yorum</a></li>-->
                                    </ul>
                                    
                                    <div class="single-blog-content-holder">
                                        <h2><a href="javascript:void(0)"><nav style="font-weight: bold;"><?php echo $blogcek['blog_baslik'];?></nav></a></h2>       
                                       <?php echo htmlspecialchars_decode($blogcek['blog_icerik']);?>
                                    </div>


                                   <!-- <div class="about-author">
                                        <p>Bimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    </div>-->

                                    <!--- TAGSLER
                                    <ul class="tag-share">
                                        <li>
                                            <ul class="inner-tag">
                                                <li><a href="#">Tags:</a></li>
                                                <li><a href="#">Advertisement,</a></li>
                                                <li><a href="#">Smart Quotes,</a></li>
                                                <li><a href="#">Unique,</a></li>
                                                <li><a href="#">Design</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul class="inner-share">
                                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>   
                                    -->
                                    

                                    <!--
                                    <div class="blog-comments">
                                        <h2>02 Comments</h2>
                                        <ul>
                                            <li>
                                                <div class="comments-img">
                                                    <img src="img\blog\11.jpg" class="img-responsive" alt="comments">
                                                </div>
                                                <div class="comments-content">
                                                    <h3><a href="#">Nathan Ford, September 09, 2016 </a></h3>
                                                    <p>Borem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <span><a href="#">Cevapla</a></span>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="comments-img">
                                                    <img src="img\blog\12.jpg" class="img-responsive" alt="comments">
                                                </div>
                                                <div class="comments-content">
                                                    <h3><a href="#">Nathan Ford, September 09, 2016 </a></h3>
                                                    <p>Borem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <span><a href="#">Cevapla</a></span>
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>-->
                                    <!--
                                    <div class="leave-comments">
                                        <h2>Yorum </h2>
                                        <div class="row">
                                            <div class="contact-form"> 
                                                <form>

                                                    <fieldset>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input placeholder="Adınız*" class="form-control" type="text">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input placeholder="Email*" class="form-control" type="email">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <textarea placeholder="Yorumunuz*" class="textarea form-control" id="form-message" rows="8" cols="20"></textarea>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="update-btn">Yorum Gönder</button>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>-->

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="fox-sidebar">
                                
                                <div class="sidebar-item">
                                    <div class="sidebar-item-inner">
                                        <h3 class="sidebar-item-title" style="font-weight: bold;">Son Bloglar</h3>
                                        <ul class="sidebar-latest-post">
                                       
                                            <li>
                                                <div class="latest-post-img">
                                                    <a href="#"><img src="img\blog\13.jpg" class="img-responsive" alt="blog"></a>
                                                </div>
                                                <div class="latest-post-content">
                                                    <h4>30 Nov, 2016</h4>
                                                    <p>when an unknown printer took.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!--- ARŞİVLER -->
                                <!--<div class="sidebar-item">
                                    <div class="sidebar-item-inner">
                                        <h3 class="sidebar-item-title">Archives</h3>
                                        <ul class="sidebar-categories-list">
                                            <li><a href="#">2016<span>(50)</span></a></li>
                                            <li><a href="#">2015 <span>(40)</span></a></li>
                                            <li><a href="#">2013<span>(50)</span></a></li>
                                            <li><a href="#">2012<span>(60)</span></a></li>
                                            <li><a href="#">2010<span>(40)</span></a></li>
                                        </ul>
                                    </div>
                                </div>-->
                                
                            </div>
                        </div>


                    </div>
                </div>  
            </div> 
            <!-- Footer Area Start Here -->
        <?php require_once('footer.php');?>