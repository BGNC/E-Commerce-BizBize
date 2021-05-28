<?php require_once('header.php');?>

            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index">Anasayfa</a><span> -</span></li>
                            <li>İletişim</li>
                        </ul>
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Google Map Area Start Here -->
            <div class="google-map-area"> 
           <!-- <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.2788990910826!2d29.214558154982168!3d41.02055465897983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cace3d9466abb1%3A0x918f573f3199f6c8!2zS2lyYXpsxLFkZXJlLCBUZW1zaWwgU2suLCAzNDc4OCDDh2VrbWVrw7Z5L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1597340082341!5m2!1str!2str" width="100%" height="430" frameborder="0" style="border:0;" readonly allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>     -->                                                 
            </div>



            <!-- Google Map Area End Here -->          
            <!-- Contact Us Info Area Start Here -->
            <div class="contact-us-info-area">
                <div class="container">
                
            <?php 

                           if (@$_GET['durum']=="hata") {?>

                           <div class="alert alert-danger">
                            <strong>Hata!</strong> Mesajınız Gönderilemedi.
                        </div>                   
                        
                        <?php } else if (@$_GET['durum']=="ok") {?>

                        <div class="alert alert-success">
                            <strong>Bilgi!</strong> Mesajınız Başarıyla İletildi. En Yakın Zamanda Geri Dönüş Sağlanacaktır.
                        </div>                   
                        
                        <?php }
            ?> 
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-us-left">
                                <h2>İletişim Bilgileri</h2>      
                                <ul>
                                    <!--<li>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">Our Office Address</h3>
                                        <p>PO Box 16122 Collins Street West Victoria 8007 Australia</p> 
                                    </li>
                                    <li>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">Phone</h3>
                                        <p>+61 3 8376 6284</p>   
                                    </li>-->
                                    <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">E-mail</h3>
                                        <p><?php echo $ayarcek['ayar_mail'];?></p>   
                                    </li>      
                                </ul>
                            </div>  
                        </div> 
                        
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="contact-us-right"> 
                                <h2>Bize Mesaj Gönder</h2>    
                                <div class="contact-form"> 
                                    <form id="contact-form" method="POST" action="nedmin/netting/admin_islem.php" >
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Adınız*" class="form-control" name="name" id="form-name" data-error="Name field is required" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="email" placeholder="Email*" class="form-control" name="email" id="form-email" data-error="Email field is required" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Konu*" class="form-control" name="konu" id="form-subject" data-error="Subject field is required" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <textarea placeholder="Mesajınız*" class="textarea form-control" name="mesaj" id="form-message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                                    <div class="form-group margin-bottom-none">
                                                        <button name="sikayetet" id="sikayetet" class="update-btn">Gönder</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                                    <div class='form-response'></div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Us Page Area End Here -->
            <!-- Footer Area Start Here -->
            <?php require_once('footer.php');?>