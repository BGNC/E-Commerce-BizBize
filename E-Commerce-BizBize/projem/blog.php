<meta charset="utf-8">
<?php require_once('header.php');?>
        <!-- Preloader End Here -->
        <!-- Main Body Area Start Here -->
        <div id="wrapper">
            <!-- Header Area Start Here -->
            <!-- Header Area End Here -->
            <!-- Main Banner 1 Area Start Here -->

          <!--  <div class="inner-banner-area">
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
            </div>--->

            
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index">Anasayfa</a><span> -</span></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Profile Page Start Here -->
            <div class="blog-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-secondary">Yeni Eklenen Bloglar</h2>
                </div>  
                <div class="container">
                    <div class="blog-page-wrapper">
                        <div class="row">
                        <?php
                        $blogsor=$db->prepare("SELECT blog.*,kullanici.* FROM blog INNER JOIN kullanici ON kullanici.kullanici_id=blog.kullanici_id WHERE blog.blog_durum=:blog_onay");
                        $blogsor->execute(array(
                            'blog_onay'=>1
                            ));
                        while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC))
                        {
                         ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-item">
                                    <div class="item-img-holder">
                                        <a href="#"><img src="<?php echo $blogcek['blog_resim'];?>" class="img-responsive"></a>
                                       <span><?php  echo $blogcek['blog_tarih'];
                                       ?>
                                       </span>
                                    </div>
                                    <div class="item-content-holder">
                                        <h3><a href="#"><?php echo $blogcek['blog_baslik'];?></a></h3>
                                         <p><?php echo substr($blogcek['blog_icerik'],0,150);?>...</p>
                                        <ul class="item-comments">
                                            <li><i class="fa fa-tags" aria-hidden="true"></i><?php echo $blogcek['blog_etiket'];?></li>
                                            <!--<li><i class="fa fa-comment-o" aria-hidden="true"></i>02</li>
                                            <li><i class="fa fa-eye" aria-hidden="true"></i>10</li>-->
                                          <li><a class="read-more" href="blog-detay?blog_id=<?php echo $blogcek['blog_id'];?>">Read More</a></li>



                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                               <ul class="pagination-align-left">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>  
            </div> 
            <!-- Profile Page End Here -->
        <?php require_once('footer.php');?>