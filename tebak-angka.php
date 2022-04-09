<?php
session_start();
if (!isset($_SESSION['angkaRand'])) {
    $_SESSION['angkaRand'] = rand(1, 100);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Game Tebak Angka</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Game Tebak Angka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="https://github.com/noorkhafidzin/tebak-angka">Github Repo</a>
                    <a class="nav-link" href="https://about.noorkhafidzin.com">About Me</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="contaner">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <?php
                if (isset($_POST['tebak-angka'])) {
                    $angka = $_POST['tebak-angka'];
                    if ($angka > $_SESSION['angkaRand']) {
                        echo '<div class="alert alert-warning mt-3" role="alert">Jawaban Anda lebih besar!</div>';
                    } else if ($angka < $_SESSION['angkaRand']) {
                        echo '<div class="alert alert-warning mt-3" role="alert">Jawaban Anda lebih kecil!</div>';
                    } else {
                        echo '<div class="alert alert-success mt-3" role="alert">Jawaban Anda benar!</div>';
                        session_destroy();
                        echo '<a href="/diklat/app-session/tebak-angka.php" class="btn btn-success mx-auto" role="button">Mulai Lagi!</a>';
                        exit();
                    }
                }
                ?>
                <div class="card text-center mt-3">
                    <div class="card-header">
                        Tebak Angka
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <form action="tebak-angka.php" method="POST">
                                <label for="tebak-angka"> Masukkan angka(1-100): </label><input type="number" name="tebak-angka" class="form-control" autofocus>
                                <br> <input type="submit" value="Tebak" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Copyright &copy; <script>
                            document.write(new Date().getFullYear())
                        </script> Imam Noor Khafidzin
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>