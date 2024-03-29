<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php
/*
2 attivare il bottone registrami che tramite Javascript esegue un post con tutti i dati a una nuova pagina dove evrranno regustrati in un file json
es https://reqbin.com/code/javascript/wzp2hxwh/javascript-post-request-example
*/

$name = $surname = $company = $email = $phone = "";
$dummyPhoto = "https://dummyimage.com/300";
$dummyName = "Name";
$dummySurname = "Surname";
$dummyText = "Qui appariranno i tuoi dati personali";
$anagraficaArray = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['uploadPhoto'])) {

        if (isset($_POST['otherFormInfo'])) {
            $fields = explode("#", $_POST['otherFormInfo']);
            $name = $dummyName = $fields[0];
            $surname = $dummySurname = $fields[1];
            $company = $fields[2];
            $email = $fields[3];
            $phone = $fields[4];
        }

        if ($_FILES) {
            $uploadDir = __DIR__ . '/uploads';
            foreach ($_FILES as $file) {
                if (UPLOAD_ERR_OK === $file['error']) {
                    $fileName = basename($file['name']);
                    $result = move_uploaded_file($file['tmp_name'], $uploadDir . DIRECTORY_SEPARATOR . $fileName);
                    if ($result) {
                        $dummyPhoto = "uploads" . DIRECTORY_SEPARATOR . $fileName;
                    } else {
                        echo '<br>ERRORE NEL CARICAMENTO DELL\'IMMAGINE!';
                    }
                }
            }
        }
    } else {

        $name = $dummyName = $_POST['nome'];
        $surname = $dummySurname = $_POST['cognome'];
        $company = $_POST['societa'];
        $email = $_POST['email'];
        $phone = $_POST['telefono'];

        $anagraficaArray = $name . "#" . $surname . "#" . $company . "#" . $email . "#" . $phone;

        if (isset($_POST['photoId'])) {
            $dummyPhoto = $_POST['photoId'];
        }
    }
}

$dummyText = "<ul>
<li>$company</li>
<li>$email</li>
<li>$phone</li>
</ul>";

?>

<body>
    <div class="container">
        <h3>Registration form</h3>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $dummyPhoto; ?>" id="profilePhoto" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" id="namesurname"><?= $dummyName . ' ' . $dummySurname; ?></h5>
                        <p class="card-text"><?= $dummyText; ?></p>
                        <button class="btn btn-primary">Dati corretti: registrami</button>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="FormProfilePhoto">
                        <input type="file" name="file">
                        <input type="hidden" name="uploadPhoto" value="uploadPhoto" />
                        <input type="hidden" name="otherFormInfo" value="<?= $anagraficaArray; ?>" />
                        <input type="submit" name="upload" value="Carica foto profilo">
                    </form>
                </div>
            </div>
            <div class="col">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" value="<?= $surname ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Società</label>
                        <input type="text" class="form-control" id="societa" name="societa" placeholder="Società" value="<?= $company ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelephone">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $phone ?>" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Accetta i nostri termini di servizio</label>
                    </div>
                    <input type="hidden" value="<?= $dummyPhoto; ?>" id="photoId" name="photoId">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>