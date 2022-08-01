<?php 


header("Content-Type: application/xml; charset=utf-8"); 
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' .PHP_EOL; 
 

include 'b_connect.php';

$sql="select * from q_bank order by q_date desc;";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc())
    {
    $qid=$row['qid'];
    $datetime=$row['q_date'];
    $dati=explode(' ',$datetime);
    $xml_link="<url>
<loc>https://www.doubtcool.com/qna/$qid.php</loc>
<lastmod>$dati[0]T$dati[1]+00:00</lastmod>
<changefreq>daily</changefreq>
<priority>1</priority>
</url>";
echo $xml_link;
    }

echo '<url>
  <loc>https://www.doubtcool.com/feedback.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
  <changefreq>daily</changefreq>
  <priority>0.80</priority>
  
</url>
<url>
  <loc>https://www.doubtcool.com/about.html</loc>
  <lastmod>2020-08-23T06:47:07+00:00</lastmod>
  <changefreq>daily</changefreq>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/explore.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
   <changefreq>daily</changefreq>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/home.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
   <changefreq>daily</changefreq>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/Questions.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
  <priority>0.64</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/resetpassword.php</loc>
  <lastmod>2020-07-25T14:50:50+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/register.html</loc>
  <lastmod>2020-07-25T14:50:50+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/crawler.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
  <priority>0.51</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/locker.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
  <priority>0.51</priority>
</url>
<url>
  <loc>https://www.doubtcool.com/askus.php</loc>
  <lastmod>2020-09-29T04:08:06+00:00</lastmod>
  <priority>0.51</priority>
</url>';

 
echo '</urlset>'; 
?>

