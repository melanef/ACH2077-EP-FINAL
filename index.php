<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soluções Web - Grupo 2</title>

    <link href="css/bulma.min.css" rel="stylesheet" />
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
                        Exibir:
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
                        <li>Amauri Melo Junior - 8516650</li>
                        <li>Abner Honorato Ribeiro - 9277670</li>
                        <li>Gabriel Ribeiro da Silva - 9277812</li>
                        <li>Hector Louzada - 9019358</li>
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
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: 'São Paulo',
                zoom: 8,
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD7LKv4f0mMt0V1dLw3NObUyybTGg2pAw&callback=initMap" async defer></script>
</body>
</html>