<!--    <?php 
    header('Content-type: application/xml; charset="utf8"',true);
     ?>
    


    <urlset xmlns: xsi = "http://www.w3.org/2001/XMLSchema-instance"

         xsi: schemaLocation = "http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"

         xmlns = "http://www.sitemaps.org/schemas/sitemap/0.9"

         xmlns: example = "http://www.example.com/schemas/example_schema"> <! - ad alanı uzantısı ->


         <?php 

         include('nedmin/production/fonksiyon.php');
         include('nedmin/netting/baglan.php');
         ?>

         <url>
             <loc>https://<?php echo $_SERVER['HTTP_HOST'];?>/kategoriler</loc>
             <lastmod><?php echo date("Y-m-d");?></lastmod>
             <changefreq>daily</changefreq>
             <priority>1.00</priority>
         </url>

   </urlset>-->