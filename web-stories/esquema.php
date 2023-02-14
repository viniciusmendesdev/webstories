<?php 
$idStories = $resStories['id'];
$sqlArtigo = $mysqli->query("SELECT * FROM stories_pages WHERE id_stories = '$idStories'")or die($mysqli->error);
$conArtigo = mysqli_num_rows($sqlArtigo);

for ($i=0; $i < $conArtigo; $i++) { 
   
    $resArtigo = $sqlArtigo->fetch_assoc();
    $texto .= $resArtigo['texto'].' '; 
    $fotos =$resArtigo['imagem_bg'];
}

?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": "<?=$resStories['titulo']?>",
    "url": "<?=$baseUrl?>/<?=$resStories['url']?>",
    "articleBody":"<?=$texto?>",
    "thumbnailUrl":"<?=$fotos?>",
    "image": [
    "<?=$resStories['capa']?>"
    ],
    "datePublished": "2023-01-03T08:00:00+08:00",
    "dateModified": "2023-01-03T09:20:00+08:00",
    "description": "<?=$resStories['descricao']?>",
    "author": [{
        "@type": "Person",
        "name": "Vincius Mendes",
        "url": "https://acheilocal.com"
    }]
}
</script>



