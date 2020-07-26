<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>::. RANGER - Bienvenido  .::</title>
        <link rel="icon" type="image/png" href="./img/r.png" />
        <meta autor="Miguel Quiñones Miquitec" content="">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from tbl_documentos where id_documento=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['nombre_archivo']==""){?>
                    <p>NO tiene archivos</p>
                <?php }else{ ?>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="archivos/<?php echo $datos['nombre_archivo']; ?>" allowfullscreen></iframe>
                  </div>
          <?php } } ?>
    </body>
</html>
