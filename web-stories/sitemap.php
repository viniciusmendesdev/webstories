<?php 

include_once 'config.php';

$sqlMap = $mysqli->query("SELECT * FROM stories")or die($mysqli->error);
$conMap = mysqli_num_rows($sqlMap);

$data_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$date = date('c');
$data_xml .= "
            <url>
                <loc>$baseUrl/web-stories/</loc>
                <lastmod>$date</lastmod>
                <priority>1.00</priority>
            </url>
        ";


if($conMap > 0){
    while($rows = $sqlMap->fetch_assoc()){
        $url = $baseUrl.'/web-stories/'.$rows['url'];
        $pr = '0.80';
        $data_xml .= "
            <url>
                <loc>$url</loc>
                <lastmod>$date</lastmod>
                <priority>$pr</priority>
            </url>
        ";
    }
}

$data_xml .= '</urlset> ';

$file = fopen('sitemap.xml', 'w');
fwrite($file, $data_xml);