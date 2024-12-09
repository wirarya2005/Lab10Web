<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /**
     * Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
     **/
    include "form.php";
    echo "<html><head><title>Mahasiswa</title></head><body>";
    $form = new Form("", "Input Form");
    $form->addField("txtnim", "Nim");
    $form->addField("txtnama", "Nama");
    $form->addField("txtalamat", "Alamat");
    echo "<h3>Silahkan isi form berikut ini :</h3>";
    $form->displayForm();
    echo "</body></html>";
    ?>
</body>

</html> -->