<?php

	if (!isset($_SESSION['role']) || $_SESSION['role'] == "isUser") {

		header("Location: /mySite/auth");
    	exit();

	}

?>

<div style="text-align: center; margin-top: 300px; margin-bottom: 600px;">

    <h1>Сохранение отзывов</h1>

    <form method="post" enctype="multipart/form-data">

        <label style="margin-top: 10px;" for="file">Выбрать файл с отзывами:</label><br>
        <input style="margin-top: 10px;" type="file" name="file"><br>
        <button style="margin-top: 10px;">Сохранить</button>

    </form>

    <?php

        echo $data;

    ?>

</div>