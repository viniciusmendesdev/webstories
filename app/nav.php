  <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
            	<a href="#" class="nav_logo"> 
            		<i class='bx bx-layer nav_logo-icon'></i> 
            		<span class="nav_logo-name">Menu Painel</span>
            	</a>

                <div class="nav_list"> 
                    <?php 
                        if($idUser == $idAdmin):
                    ?>
                        <a href="admin-users.php" class="nav_link">
                            <i class='bx bx-label nav_icon'></i>
                            <span class="nav_name">Usuários</span> 
                        </a> 
                    <?php endif; ?>

                	<a href="painel.php" class="nav_link active"> 
                		<i class='bx bx-label nav_icon'></i> 
                		<span class="nav_name">Principal</span> 
                	</a> 
                	<a href="quiz.php" class="nav_link"> 
						<i class='bx bx-label nav_icon'></i> 
                		<span class="nav_name">Quiz</span> 
                	</a> 

                	<a href="contatos.php" class="nav_link"> 
                		<i class='bx bx-label nav_icon'></i> 
                		<span class="nav_name">Contatos</span> 
                	</a> 
                    <!--
                	<a href="#" class="nav_link"> 
                		<i class='bx bx-bookmark nav_icon'></i> 
                		<span class="nav_name">Bookmark</span> 
                	</a> 
               
                	<a href="#" class="nav_link">
                		<i class='bx bx-bar-chart-alt-2 nav_icon'></i>  
                		<span class="nav_name">Meu Plano</span> 
                	</a> 
					 -->
                </div>

            </div> 
            <a href="logout.php" class="nav_link"> 
            	<i class='bx bx-log-out nav_icon'></i> 
            	<span class="nav_name">Sair</span> 
            </a>
        </nav>
    </div>