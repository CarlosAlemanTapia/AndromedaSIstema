<?php

		include "../../base_de_datos.php";
				
						$sentencia = $base_de_datos->query("SELECT * FROM chat order by id desc;");
						$lchat = $sentencia->fetchAll(PDO::FETCH_OBJ);

					?>

					<?php foreach($lchat as $lchat){ ?>
		

				<div id="datos-chat">
					<span style="color: #1c62c4;"><?php echo $lchat->nombre ?></span>
					<span style="color: #848484;"><?php echo $lchat->mensaje ?></span>
					<span style="float: right;"><?php echo $lchat->fecha ?></span>

				</div>
			<?php } ?>