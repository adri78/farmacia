<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" href="css/materialize.min.css">
        <title>ABM Zonas</title>
        <style>
            body{
                background: grey;
            }
            h4 {
                text-align: center;
                padding-bottom: 1em;
            }
            #lstZona tr:nth-child(odd){
                background: #4cae4c;
            }
            #lstZona tr:hover{
                background: #069ac5 !important;
            }
            table{
                background: white;
                border: #5a5a5a 2px solid;
            }
            table thead {
                background: #232b37;
                color:white;
                font-size: 1.1em;
            }
            table th:nth-child(2){
                width: 90px;
                text-align: center;
            }
            small{
                font-size: 0.5em;
            }
            .bor{
                background: #ef5350 ;
            }
            @media screen and (max-width: 660px) {
                .row .col.s6 {
                    display: block !important;
                    width: 100% !important;
                    margin-top: 1em;
                    margin-bottom: 1em;
               }
            }
        </style>

    </head>

    <body>

  <?php include 'menu.php'; ?>

    <h4>ABM de Zonas</h4>


        <div class="container">

            <div class="row">
                <div class="col s6">

                    <table class="responsive-table" width="100%">
                        <thead>
                        <tr>
                            <th>Zona</th>
                            <th>Menu</th>
                        </tr>
                        </thead>

                        <tbody id="lstZona">
                        <tr>
                            <td> Cargando ....</td><td></td>
                        </tr>

                        </tbody>
                    </table>



                </div>
                <div class="col s6">
                    <a class="btn wares-effect yellow darken-2" id="btnNuevo"> Nuevo </a>
                    <div class="card darken-1" id="Ficha">
                        <div class="card-content">
                            <span class="card-title">Ficha - <small id="IDS">0</small></span>

                            <div class="input-field col offset-l s10 ">
                                <input  type="text" class="validate" id="zona">
                                <label for="zona">Zona</label>

                            </div>
                            <br>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col s6">
                                    <a class="btn wares-effect light-blue" id="btnGrabar"> Grabar </a>
                                </div>
                                <div class="col s6">
                                    <a class="btn waves-effect waves-red" id="btnLimpiar" > Limpiar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

            </div>

        </div>


  <script src="js/jquery.js"></script>
  <script src="js/materialize.js"></script>

         <script>
             const Ruta="Data/dbZona.php";
             const Ficha=document.getElementById('Ficha');
             const IDS=document.getElementById('IDS');
             var Zona=document.getElementById("zona");

             
             function Limpiar() {
                 IDS.innerText="";
                 Zona.value="";
             }
             
             document.getElementById('btnNuevo').addEventListener("click",function () {
                Ficha.style.display="block";
                Limpiar();
             });
             
             document.getElementById('btnGrabar').addEventListener("click",function () {
                 document.getElementById('btnGrabar').style.display="none";
                 let Zonas=Zona.value.toUpperCase();
                 let idz= IDS.innerText;
                if(Zonas.length > 3){
                    var d={ID:idz,Zona:Zonas};
                    $.post(Ruta,d,function () {
                        CargaLST();
                        alert("Grabado");
                        Limpiar();
                        document.getElementById('btnGrabar').style.display="block";
                    });

                }else{
                    alert("Zona muy corta");
                    document.getElementById('btnGrabar').style.display="block";
                }

             });

             document.getElementById('btnLimpiar').addEventListener("click",function () {
                 Ficha.style.display="none";
                 Limpiar();
             });
             function CargaLST() {
                 $.get( Ruta+"?all",function (res) {
                     let tmp = JSON.parse(res);
                     let x= tmp["DataLst"].length;
                     let tabla="";

                     for(let i=0;i< x; i++){
                         tabla =tabla + '<tr onclick="EZ('+ tmp['DataLst'][i].idZ +')"><td>'+ tmp['DataLst'][i].Zona +'</td><td><a class="waves-effect waves-light btn bor" onclick="bz('+ tmp['DataLst'][i].idZ +')">Borrar</a></td></tr>';
                     }
                     document.getElementById('lstZona').innerHTML=tabla;
                 });
             }

            
             function EZ(id) {
                 /* ************************************************************ */
                 $.get( Ruta+"?id="+id ,function (res) {
                     Ficha.style.display="block";
                     let tmp = JSON.parse(res);
                     const d = tmp['Data'][0];
                     console.log(d);
                     IDS.innerHTML = d.idZ;
                     Zona.value= d.Zona;
                     Zona.focus();
                 });
                 /* ************************************************************** */
             }
             
             function bz(id) {
                 if(confirm("Borrar Zona, Seguro?")){
                     $.get( Ruta+"?d="+id ,function (res) {
                         Ficha.style.display="none";
                         CargaLST();
                         Limpiar();
                     });
                 }

             }
         </script>

        <script>
            (function (){
                CargaLST();
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.sidenav');
                    var instances = M.Sidenav.init(elems, options);
                });
            })();
        </script>
    </body>
</html>