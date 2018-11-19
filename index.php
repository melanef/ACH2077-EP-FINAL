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
                        <li>Abner Ribeiro</li>
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


    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ2FycmlyaWJlaXJvIiwiYSI6ImNqb29tMHltaTA0cXczcHFzaWprejRpbTQifQ.xpzFIs7SZxLTBgCX77S_Zg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v10'
        });
    </script>

</body>
</html>