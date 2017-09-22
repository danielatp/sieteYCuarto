<!-- formulario Tu Historia - Siete y Cuarto -->

<?php

	if(isset($_POST['email'])) {

		$email_to = "dtizonportilla@gmail.com, lucia.florez@gmail.com, esteban.mmarchand@gmail.com";
		$email_subject = "Contacto sieteycuarto.org";

		function died($error) {
			echo "<h1>Oops!</h1><h2>Parece que hay un error.</h2>";
			echo "<strong><p>Falta llenar los siguientes campos:</p></strong><br />";
			echo $error."<br /><br />";
			echo "<p>Por favor intente de nuevo.</p>";
			// echo "<p><a href='index.php'>return to the homepage</a></p>";
			die();

		}

		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$email_from = $_POST['email'];
		$departamento = $_POST['departamento'];
		$distrito = $_POST['distrito'];
		$ocupacion = $_POST['ocupacion'];
		$genero = $_POST['genero'];
		$orientacion = $_POST['orientacion'];
		$comentario = $_POST['comentario'];

		$error_message = "";
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

		if(!preg_match($email_exp,$email_from)) {
			$error_message .= '<li><p>El correo es inválido<p></li>';
		}

		$string_exp = "/^[A-Za-z .'-]+$/";

		if(!preg_match($string_exp,$ocupacion)) {
			$error_message .= '<li><p>La ocupación contiene un error.</p></li>';
		}

		if(strlen($comentario) < 2) {
			$error_message .= '<li><p>El mensaje esta vacío.</p></li>';
		}

		if(strlen($error_message) > 0) {
			died($error_message);
		}

		$email_message = "Los detalles del correo son los siguientes:\n\n";

		function clean_string($string) {
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}

		$email_message .= "Nombre: ".clean_string($nombre)."\n";
		$email_message .= "Edad: ".clean_string($edad)."\n";
		$email_message .= "Email: ".clean_string($email_from)."\n";

		$email_message .= "Departamento: ".clean_string($departamento)."\n";
		$email_message .= "Distrito: ".clean_string($distrito)."\n";
		$email_message .= "Ocupación: ".clean_string($ocupacion)."\n";
		$email_message .= "Genero: ".clean_string($genero)."\n";
		$email_message .= "Orientación: ".clean_string($orientacion)."\n";

		$email_message .= "Comentario: ".clean_string($comentario)."\n";


		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);
		?>

		<!-- include your own success html here -->
		<h1>Gracias por su mensaje!</h1>
		<h2>Los contactaremos a la brevedad posible.</h2>

		<?php
	}

?>
