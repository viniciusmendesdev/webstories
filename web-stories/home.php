<?php 
include 'config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebStories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
        <div class="container">
            <div class="row">
                <h1>WebStories</h1>
            </div>
        </div>
    </header>
    <div id="paginas">
        <div class="container">

                <div class="row">
                <?php 
                    $sqlStories = $mysqli->query("SELECT * FROM stories ORDER BY id DESC" )or die($mysqli->error);
                    $conStories = mysqli_num_rows($sqlStories);
                    while($resStories = $sqlStories->fetch_assoc()){
                ?>
                    <div class="card" style="width: 18rem;">
                        <img src="<?=$resStories['capa']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$resStories['titulo']?></h5>
                            <a href="<?=$baseUrl?>/web-stories/<?=$resStories['url']?>" target="_blank" class="btn btn-primary">Ver História</a>
                        </div>
                    </div>
                <?php } ?>
                </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
               <p> &copy;<?=date('Y')?> - <a href="#">Vinícius Mendes</a> - Todos os direitos reservados</p>
            </div>
        </div>
    </footer>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>