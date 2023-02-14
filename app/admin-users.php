<?php

include ('protect.php');

include('funcoes.php');

include ('header.php');

include ('nav.php');

?>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Usuários cadastrados</h4>

        <?php 

       

        $sqlUsuarios = $mysqli->query("SELECT * FROM usuarios ORDER BY id DESC")or die("Erro ao consultar");
        $conUsuarios = $sqlUsuarios->num_rows;
        if($conUsuarios == 0){
        	mensagem('Nenhum usuário cadastrado','danger');
        }else{
        	
        ?>
        <div class="table-responsive">
	        <table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Anúncios</th>
			      <th scope="col">Nome</th>
			      <th scope="col">CPF</th>
			      <th scope="col">E-mail</th>
			      <th scope="col">WhatsApp</th>
			      <th scope="col">Data do Cadastro</th>
			      <th scope="col"><center>-</center></th>
			    </tr>
			  </thead>
			  <tbody>
			  
			    <tr>
			      <th scope="row"><?=$conAnuncios?></th>
			      <td><strong><?=$resUsuarios['nome']?></strong></td>
			      <td><?=$resUsuarios['cpf']?></td>
			      <td><?=$resUsuarios['email']?></td>
			      <td><?=$resUsuarios['zap']?></td>
			      <td><?=data($resUsuarios['data_cadastro'])?></td>
			      <td>
			      	<center>
		      		<a target="_blank" href="admin-user-anuncios.php?idUsuario=<?=$resUsuarios['id']?>" class="btn btn-sm btn-dark">Ver Anúncios</a>
		      		<a href="admin-user-edit.php?idUsuario=<?=$resUsuarios['id']?>" class="btn btn-sm btn-primary">Editar Usuário</a>
			      	</center>
			      </td>
			    </tr>
			  
			  </tbody>
			</table>
		</div>

    </div>

    <?php }  ?>
    <!--Container Main end-->
    


<?php include('footer.php'); ?>