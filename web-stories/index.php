<?php 

$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'id', FILTER_DEFAULT )));
$setUrl = (empty($getUrl) ? 'index' : $getUrl);
$affE   = explode('/', $setUrl);

$page1  = $affE[0];
$page2  = $affE[1];
$page3	= $affE[2];

include 'config.php';

$sqlStories = $mysqli->query("SELECT * FROM stories WHERE url = '$page1' " )or die($mysqli->error);
$conStories = mysqli_num_rows($sqlStories);
$resStories = $sqlStories->fetch_assoc();

$idStr = $resStories['id'];

$sqlPage = $mysqli->query("SELECT * FROM stories_pages WHERE id_stories = '$idStr'")or die($mysqli->error);
$conPage = mysqli_num_rows($sqlPage);

if($conStories == 1  AND $page1 != 'index'){

?>

<!doctype html>
<html ⚡>
  <head>
    <meta charset="utf-8">
    <title><?=$resStories['titulo']?></title>
    <link rel="canonical" href="<?=$baseUrl?>/<?=$resStories['url']?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
    <script async custom-element="amp-story" src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
    <script async custom-element="amp-story-auto-analytics" src="https://cdn.ampproject.org/v0/amp-story-auto-analytics-0.1.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <style amp-custom>
      amp-story {
        font-family: 'Lato', sans-serif;
        color: #fff;
      }
      amp-story-page {
        background-color: #000;
      }

      #cover h1{
        font-size:36px;
        padding:5px;
        margin: 0;
      }

      #cover p{
        font-size: 22px;
        padding: 5px;
        margin: 0;
      }

      amp-img{
        background-color: #fff;
        opacity: 0.3;
      }
      .paginas h1 {
        font-weight: bold;
        font-size: 2.0em;
        font-weight: normal;
        line-height: 1.174;
        background-color:rgb(0,0,0, .7);
        text-shadow: 3px 2px 7px #000000;
        padding: 10px;
        border-radius: 4px;
        display: block;
        padding: 20px;
      }
      .paginas h2{
        text-shadow: 3px 2px 7px #000000;
        padding: 20px;
      }
      .paginas p {
        font-weight: normal;
        font-size: 1.5em;
        line-height: 1.5em;
        color: #fff;
        margin-bottom:100px;
      }
      q {
        font-weight: 300;
        font-size: 1.1em;
      }
      amp-story-grid-layer.bottom {
        align-content:end;
        bottom: 30px;
      }
      amp-story-grid-layer.noedge {
        padding: 0px;
      }
      amp-story-grid-layer.center-text {
        align-content: center;
        position: absolute;
        bottom: 20px;
      }
      amp-story-grid-layer.bottom p{
        font-size: 24px;
        background-color:rgb(0, 0, 0, .8);
        display: block;
        padding: 20px;
      }
    </style>
    <?php include 'esquema.php';?>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    
</head>
  <body>
    <!-- Cover page -->
    <amp-story standalone
        title="<?=$resStories['titulo']?>"
        publisher="Vinicius Mendes"
        publisher-logo-src="assets/AMP-Brand-White-Icon.svg"
        poster-portrait-src="<?=$resStories['capa']?>">
        <amp-story-auto-analytics gtag-id="UA-246659505-1"></amp-story-auto-analytics>

      <amp-story-page id="cover" auto-advance-after="7s">

        <amp-story-grid-layer template="fill">
          <amp-img src="<?=$resStories['capa']?>"
              width="720" height="1280"
              layout="responsive">
          </amp-img>
        </amp-story-grid-layer>

        <amp-story-grid-layer  template="vertical"class="center-text">
          <h1><?=$resStories['titulo']?></h1>
          <p><?=$resStories['descricao']?></p>
        </amp-story-grid-layer>
        <!--
        <amp-story-page-outlink
          layout="nodisplay"
          theme="custom"
          cta-accent-element="background"
          cta-accent-color="#fff">
          <a href="https://www.google.com">Saiba mais</a>
        </amp-story-page-outlink>
        -->
     
      </amp-story-page>

      <?php 

      $sqlVerPaginas = $mysqli->query("SELECT * FROm stories_pages WHERE id_stories = '$idStr'")or die($mysqli->error);
      $resVerPaginas = $sqlVerPaginas->fetch_assoc();
      $idVerPaginas = $resVerPaginas['id'];
      
      $sqlPaginas = $mysqli->query("SELECT * FROM stories_pages WHERE id_stories = '$idStr'")or die($mysqli->error); 
      while($resPaginas = $sqlPaginas->fetch_assoc()){
      
      ?>


        <!-- Page 3 (Bird): 3 layers (fill + vertical + vertical) + Audio-->
        <amp-story-page class="paginas" id="page<?=$resPaginas['id']?>" auto-advance-after="7s">
          
        <amp-story-grid-layer template="fill">
            <amp-img animate-in="fade-in" animate-in-duration="3s" src="<?=$resPaginas['imagem_bg']?>"
                width="720" height="1280"
                layout="responsive">
            </amp-img>
          </amp-story-grid-layer>
          <!--
          <amp-story-grid-layer template="vertical">
            <h1>Birds</h1>
          </amp-story-grid-layer>
          -->

            <amp-story-grid-layer template="vertical" class="bottom">
              <h2 animate-in="whoosh-in-right"><?=$resPaginas['titulo']?></h2>
              <p animate-in="fly-in-right"><span class="texto"> <?=$resPaginas['texto']?></span></p>
            </amp-story-grid-layer>


            <?php if(!empty($resPaginas['botao'])): ?>
              <amp-story-page-outlink layout="nodisplay">
                  <a href="<?=$resPaginas['botao']?>" title="Link Description">Acessar agora</a>
              </amp-story-page-outlink>
            <?php endif; ?>

          </amp-story-page>
          
            
      <?php } ?>
      
      <!-- Bookend -->
      <amp-story-bookend src="bookend.json" layout="nodisplay"></amp-story-bookend>
     
    </amp-story>




  </body>
</html>
<?php 

}elseif($page1 == 'sitemap.xml'){
    
  include 'sitemap.php';

}else { 
  
  //echo 'Link inválido! Verifique o link correto.'; 

  include 'home.php';
  
}
?>

