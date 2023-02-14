<?PHP

function upload_jpg( $tmp, $nome, $largura, $pasta){
	
	$img = imagecreatefromjpeg($tmp);
	$x = imagesx($img);
	$y = imagesy($img);
	$altura = ($largura*$y) / $x;
	$nova = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagedestroy($img);
	//aplicando a marca dágua na foto
	//$marca = imagecreatefrompng('marca.png');
	//$marcax = imagesx($marca);
	//$marcay = imagesy($marca);
	//movimentando a marca dágua  -DESATIVADO!
	$localx = ($largura-64) / 2;
	$localx = ($largura-64) / 2;
	//imagecopyresampled($nova, $marca, 0, 0, 0, 0, 100, 50, $marcax, $marcay);
	imagejpeg($nova, "$pasta/$nome");
	imagedestroy($nova);
	
	return($nome);	
	}
?>

<?PHP

function upload_png( $tmp, $nome, $largura, $pasta){
	
        $img = imagecreatefrompng($tmp);
        $x = imagesx($img);
        $y = imagesy($img);
        $altura = ($largura*$y) / $x;
        $nova = imagecreatetruecolor($largura, $altura);
        imagealphablending($nova, false);
        imagesavealpha($nova, true);
    
        imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
        imagedestroy($img);
        //aplicando a marca dágua na foto
        //$marca = imagecreatefrompng('marca.png');
        //$marcax = imagesx($marca);
        //$marcay = imagesy($marca);
        //movimentando a marca dágua  -DESATIVADO!
        $localx = ($largura-64) / 2;
        $localx = ($largura-64) / 2;
        //imagecopyresampled($nova, $marca, 0, 0, 0, 0, 100, 50, $marcax, $marcay);
        imagepng($nova, "$pasta/$nome");
        imagedestroy($nova);
	
	return($nome);
	
	}
?>

<?PHP

function upload_gif( $tmp, $nome, $largura, $pasta){
	
	$img = imagecreatefromgif($tmp);
	$x = imagesx($img);
	$y = imagesy($img);
	$altura = ($largura*$y) / $x;
	$nova = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagedestroy($img);
	//aplicando a marca dágua na foto
	//$marca = imagecreatefrompng('marca.png');
	//$marcax = imagesx($marca);
	//$marcay = imagesy($marca);
	//movimentando a marca dágua  -DESATIVADO!
	$localx = ($largura-64) / 2;
	$localx = ($largura-64) / 2;
	imagecopyresampled($nova, $marca, 0, 0, 0, 0, 100, 50, $marcax, $marcay);
	imagejpeg($nova, "$pasta/$nome");
	imagedestroy($nova);
	
	return($nome);
	
	}
?>
