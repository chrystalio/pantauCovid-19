<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Website PantauCovid-19</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Website PantauCovid-19</h1>
            <p class="lead">Data PantauCovid-19 di update secara Real-Time & otomatis</p>
        </div>
    </div>


    <h1 class="text-center m-5">Data Berdasarkan Total Keseluruhan Dan Per-Provinsi di Indonesia</h1>

    <!-- tabel -->
    <div class="container container-fluid">
        <?php
            $data = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
            $data_negara = file_get_contents('https://api.kawalcorona.com/indonesia');
            $data_harian = file_get_contents('https://coronavirus-19-api.herokuapp.com/countries/indonesia');
            $provinsi = json_decode($data, true);
            $negara = json_decode($data_negara, true);
            $harian = json_decode($data_harian, true);

        ?>

        <!-- Data Harian -->

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <!-- <th class="text-center">No</th> -->
                    <th>Jumlah Total Positif</th>
                    <th>Jumlah Total Sembuh</th>
                    <th>Jumlah Total Meninggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($negara as $idn) : 
                ?>
                <tr class="text-center">
                    <td><?= $idn['positif']; ?></td>
                    <td><?= $idn['sembuh']; ?></td>
                    <td><?= $idn['meninggal']; ?></td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>


        <!-- Data Per Provinsi -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Jumlah Positif</th>
                    <th>Jumlah Sembuh</th>
                    <th>Jumlah Meninggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($provinsi as $prv) : 
                ?>
                <tr class="text-center">
                    <td><?= $i++; ?></td>
                    <td><?= $prv['attributes']['Provinsi']; ?></td>
                    <td><?= $prv['attributes']['Kasus_Posi']; ?></td>
                    <td><?= $prv['attributes']['Kasus_Semb']; ?></td>
                    <td><?= $prv['attributes']['Kasus_Meni']; ?></td>
                </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>

        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>