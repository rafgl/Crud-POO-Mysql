<?php  include('server.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
		
		if ($record -> num_rows == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$email = $n['email'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD - Trabalho Final POO</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
</head>
<body style="background-color: #50A1A2;">
	

    
    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>E-mail</th>
			<th colspan="2">Ação</th>
		</tr>
	</thead>
	
	<?php 
	if($results === FALSE) { 
		echo "error";
	}
	while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning" >Editar</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
			</td>
		</tr>
	<?php } ?>
</table>

    
	<form method="post" action="server.php" >
	    <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Nome</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="email" value="<?php if(isset($email))echo $email; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	            <button class="btn btn-primary" type="submit" name="update">Atualizar</button>
                    <?php else: ?>
	            <button id='button1' class="btn btn-success" type="submit" name="save" onclick="revealmessage()">Salvar</button>
                    <?php endif ?>
		</div>
	</form>
		<script src="javascripts.js"></script>
</body>
</html>
