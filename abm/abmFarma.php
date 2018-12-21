<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="css/materialize.min.css">

    <title>ABM Farmacias</title>
    <style>
        body{
            background: #05bbdb;
        }
        h4 {
            text-align: center;
            padding-bottom: 10px;
            color:white;
        }
        #lstFarma tr:nth-child(odd){
            background: #c7c7c7;
        }
        #lstFarma tr:hover{
            background: #069ac5 !important;
        }
        table{
            background: white;
            border: #5a5a5a 2px solid;
            max-height: 80vh;
            overflow-y: auto;
        }
        table thead {
            background: #232b37;
            color:white;
            font-size: 1.1em;
        }
        table th:nth-child(5){
            width: 90px;
            text-align: center;
        }
        .bor{
            background: #ef5350 ;
        }
        .s8{
             height: 600px;
              background: rgba(0, 128, 0, 0.02);
        }
    </style>
</head>
<body>
    <?php include 'menu.php'; ?>

    <h4>ABM de Farmacias</h4>


    <div class="row">
        <div class="col s3" style="background: white;">






            <div class="row">
                <form class="col s12">
                    <label id="idF">0</label>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="Farmacia" type="text" class="validate">
                            <label for="Farmacia">Farmacias</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="Domicilio" type="text" class="validate">
                            <label for="Domicilio">Domicilio</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10">
                            <input id="tel" type="tel" class="validate">
                            <label for="tel">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s11">
                            <input id="Email" type="email" class="validate">
                            <label for="Email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <h5>ZONA:</h5>
                        </div>

                        <div class="input-field col s6">
                            <select class="browser-default" id="LstZonas">
                                <option value="" disabled selected>Zona</option>
                            </select>
                        </div>

                    </div>

                </form>
                
                <div class="col s6">
                    <a class="btn"> Grabar </a>
                </div>
                <div class="col s6">
                    <a href="" class="btn"> Limpiar</a>
                </div>
            </div>



        </div>






        <div class="col s9">

            <table class="responsive-table" width="100%">
                <thead>
                <tr>
                    <th>Farmacia</th>
                    <th>Domicilio</th>
                    <th>Telefono</th>
                    <th>Zona</th>
                    <th>Menu</th>
                </tr>
                </thead>

                <tbody id="lstFarma">
                <tr>
                    <td> Cargando ....</td><td></td>
                </tr>

                </tbody>
            </table>



        </div>






    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
        <script>
            var Ruta="Data/dbFarma.php";

            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, options);
            });

            function Cargacmb() {
                $.get( "Data/dbZona.php?all",function (res) {
                    let tmp = JSON.parse(res);
                    let x= tmp["DataLst"].length;
                    let zonas='<option value="" disabled selected>Zona</option>';

                    for(let i=0;i< x; i++){
                        zonas =zonas + '<option value="'+ tmp["DataLst"][i].idZ +'">'+ tmp["DataLst"][i].Zona +'</option>';
                    }
                    document.getElementById('LstZonas').innerHTML=zonas;
                });
            }



        </script>
        <script>
            function CargaLST() {
                $.get( Ruta+"?all",function (res) {
                    let tmp = JSON.parse(res);
                    let x= tmp["DataLst"].length;
                    let tabla="";

                    for(let i=0;i< x; i++){
                        tabla =tabla + '<tr onclick="EF('+ tmp['DataLst'][i].ID +')"><td>'+ tmp['DataLst'][i].Farmacia +'</td><td>' + tmp['DataLst'][i].Domicilio +'</td><td>'+tmp['DataLst'][i].Telefonos+'</td><td>'+tmp['DataLst'][i].Zonas+ '</td><td><a class="waves-effect waves-light btn bor" onclick="BF('+ tmp['DataLst'][i].ID +')">Borrar</a></td></tr>';
                    }
                    document.getElementById('lstFarma').innerHTML=tabla;


                });

            }
        </script>
        <script>
            (function () {
                Cargacmb();
                CargaLST();
            })();
        </script>
</body>
</html>