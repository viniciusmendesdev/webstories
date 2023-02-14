<?PHP

$id_anuncio = $_POST['id_anuncio'];
$id 		= $_POST['idUser'];

if(isset($_POST['excluirgal'])){
	
	$pasta = 'galeria/';
	$foto = $_POST['foto'];
	unlink($pasta.$foto);
	
	$fotoCod = $_POST['id'];
	$del_foto = $mysqli->query("DELETE FROM shop_fotos WHERE id = '$fotoCod'");

//echo '<img src="https://media.giphy.com/media/xTiTnwsIlsMTguNfnq/giphy.gif" width="32"> <b>Excluindo...</b><br><br>';
//echo '<meta http-equiv="refresh" content="1, dashboard.php?exe=sis/galeria">';
}



if(isset($_POST['upload-galeria'])){
    
		
		$pasta = 'galeria';
        //extenções permitidas
		$permitido = array('image/jpg','image/jpeg','image/pjpeg','image/bmp', 'image/png', 'image/gif'); 
		
		$img = $_FILES['arquivo'];
		$contImg = count($img['name']);
		$id_prod = $_GET['id_prod'];
		require('upload_func.php');
    
   
		for($i=0;$i<$contImg;$i++){
		$tmp = $img['tmp_name'][$i];
		$name = $img['name'][$i];
		$type = $img['type'][$i];
		
		if(empty($name)){
			msg('Selecione a imagem', 'danger');
		}else{
            
		if($type != in_array($type, $permitido)){
			
			 msg("Formato de arquivo não permitido.", "danger");
			
			}else{		
				
					//gravando no banco de dados
					if(!empty($name) && in_array($type, $permitido)){

					                
					if($type == 'image/jpg' or $type == 'image/jpeg'){
					
						$nome = 'foto-'.md5(uniqid(rand(), true)).$i.'.jpg';
						
						upload_jpg( $tmp, $nome,1180, $pasta);
			            
			            $cadastraImg = $mysqli->query("INSERT INTO shop_fotos (id,id_anuncio,login,foto)VALUES(NULL,'$id_anuncio','$idUser','$nome')")or die(mysql_error()); 	

						mensagem("Foto carregadas com sucesso.", "success");
			           
					}elseif($type == 'image/png'){
					
						$nome = 'foto-'.md5(uniqid(rand(), true)).$i.'.png';
						upload_png( $tmp, $nome,1180, $pasta);
						$cadastraImg = $mysqli->query("INSERT INTO shop_fotos (id,id_anuncio,login,foto)VALUES(NULL,'$id_anuncio','$idUser','$nome')")or die(mysql_error()); 	
						mensagem("Foto carregadas com sucesso.", "success");
			            
			            
					}elseif($type == 'image/gif'){
					
						$nome = 'foto-'.md5(uniqid(rand(), true)).$i.'.gif';
						upload_gif( $tmp, $nome,1180, $pasta);
						$cadastraImg = $mysqli->query("INSERT INTO shop_fotos (id,id_anuncio,login,foto)VALUES(NULL,'$id_anuncio','$idUser','$nome')")or die(mysql_error()); 	
						mensagem("Foto carregadas com sucesso.", "success");
					
					}else{

			            mensagem("Formato de arquivo não permitido.", "danger");
						
					}//fechando o for que conta so campos files
						
								
						}
				
					}

			}		
		
	}

     //echo '<img src="https://media.giphy.com/media/xTiTnwsIlsMTguNfnq/giphy.gif" width="32"> <b>Aguarde...</b><br><br>';
     //echo '<meta http-equiv="refresh" content="2, painel.php?exe=home/website-edita&token='.$tokenPagina.'">';

	//reload('anuncio-fotos.php',0000);
    
}



?>