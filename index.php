<?
    require_once ('api.php');

    $token = "9167476f271ff1fc72a42b8be0cfd7a4954adea7dec42ec96a76ac78d7848d45";
    $client = new Client($token);

    test($client);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Web</title>


    <link href="css/bulma.min.css" rel="stylesheet" />
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />

</head>
<body>
    <header class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-two-thirds">
                    <div class="field">
                        <div class="form-control"></div>
                        <label class="label">Endereço:</label>
                        <div class="control">
                            <input class="input is-medium" type="text" placeholder="Insira o endereço">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox"> Ônibus em movimento</a>
                            </label>
                            <label class="checkbox">
                                <input type="checkbox"> Parada de ônibus</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="label">Integrantes:</div>
                    <ul class="content">
                        <li>Amauri Melo Junior</li>
                        <li>Abner Honorato Ribeiro - 9277670</li>
                        <li>Gabriel Ribeiro da Silva - 9277812</li>
                        <li>Hector Louzada</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="box">
                <div id='map' style='width: 100%px; height: 600px;'></div>
            </div>
        </div>
    </section>

    
    <script type="text/javascript">
        var lat,long;
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(start);
            }
            else { console.log("O seu navegador não suporta Geolocalização."); }
        }


        function start(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;

            mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FycmlyaWJlaXJvIiwiYSI6ImNqb29tMHltaTA0cXczcHFzaWprejRpbTQifQ.xpzFIs7SZxLTBgCX77S_Zg';
            var map = new mapboxgl.Map({
                container: 'map', // container id
                style: 'mapbox://styles/mapbox/streets-v9',
                center: [long, lat], // starting position
                zoom: 15 // starting zoom
            });
        }

        getLocation();


        function getBusLine(){
            let buses = <?php echo json_encode($client->getBusLine(6414)); ?>;
            console.log(buses);
            
            // return allBus;
        }

        function getAllParadasPositions(){
            let allParadas = <?php echo json_encode($olhovivo->getParadaPorCorredor()); ?>;
            return allParadas;
        }

        // getBusLine();

    </script>
</body>
</html>