<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        #idF{
            display: none;
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
        #btnGrabar{
            background: #43a047;
        }
        #btnLimpiar{
            background: #fdd835;
        }

        @media screen and (max-width: 660px) {
            .s3 ,.s9 {
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
    <div class="row">
        <div class="col m3">
            <h4>ABM de Farmacias</h4>
        </div>
        <div class="col m5 offset-m3" style="text-align: right;padding-top: 20px;">
            <div class="search-wrapper">
                <i class="material-icons"><input id="buscar" placeholder="Filtro">search</i>
            </div>
        </div>
    </div>



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
                            <input id="Tel" type="tel" class="validate">
                            <label for="Tel">Telefono</label>
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
                    <a class="btn" id="btnGrabar"> Grabar </a>
                </div>
                <div class="col s6">
                    <a class="btn" id="btnLimpiar"> Limpiar</a>
                </div>
            </div>



        </div>






        <div class="col s9">

            <table class="responsive-table" width="100%" id="TablaFarma">
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
            const ID = document.getElementById('idF');
            const Farmacia = document.getElementById('Farmacia');
            const Domicilio = document.getElementById('Domicilio');
            const Tel = document.getElementById('Tel');
            const Email = document.getElementById('Email');
            const LstZonas = document.getElementById('LstZonas');
            const btnGrabar = document.getElementById('btnGrabar');
            const btnLimpiar = document.getElementById('btnLimpiar');
            const Buscar=document.getElementById('buscar');
            let X2,X3;

            function EF(id){
                $.get( Ruta+"?id="+id,function (res) {
                    let tmp = JSON.parse(res);
                    const x=tmp["Data"][0];
                    console.log(x);
                    ID.innerText=id;
                    Farmacia.value=x.Farmacia;
                    Domicilio.value=x.Domicilio;
                    Tel.value=x.Telefonos;
                    Email.value=x.Email;
                    LstZonas.value=x.Zonas;

                    let elemento = document.querySelectorAll("form label");
                    for (let i = 0; i < elemento.length; i++) {
                        elemento[i].classList.add("active");
                    }
                });
            }
            function BF(id) {
                if(confirm("Borrar Farmacia, Seguro?")){
                    $.get( Ruta+"?d="+id ,function (res) {
                        CargaLST();
                        Limpiar();
                    });
                }

            }
            function Limpiar(){
                ID.innerText="";
                Farmacia.value="";
                Domicilio.value="";
                Tel.value="";
                Email.value="";
                LstZonas.value=0;
            }

            const Limpiador = btnLimpiar.addEventListener("click",function (e) {
                e.preventDefault();
                Limpiar();
            });

            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems);
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

    function CargaLST() {
         $.get( Ruta+"?all",function (res) {
               X2= JSON.parse(res);
               MostrarTabla(X2);
         });
    }

    function sortTable(TBody_Tabla_ID,Columna=0,Orden="Asc") {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById(TBody_Tabla_ID);
                switching = true;
                while (switching) {
                    switching = false;
                    rows = table.rows;
                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;
                        x = rows[i].getElementsByTagName("TD")[Columna];
                        y = rows[i + 1].getElementsByTagName("TD")[Columna];
                        if(Orden == "Asc"){
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }else{
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }

    function MostrarTabla(Data) {
         let y= Data["DataLst"].length;
         let X= Data["DataLst"];
         let tabla="";
         for(let i=0;i< y; i++){
               tabla =tabla + '<tr onclick="EF('+ X[i].ID +')"><td>'+ X[i].Farmacia +'</td><td>' + X[i].Domicilio +'</td><td>'+X[i].Telefonos+'</td><td>'+X[i].Zonas+ '</td><td><a class="waves-effect waves-light btn bor" onclick="BF('+ X[i].ID +')">Borrar</a></td></tr>';
         }
         document.getElementById('lstFarma').innerHTML=tabla;
         Buscar.setAttribute("title", y + "/"+ y);
          Monitor_Tabla('TablaFarma');
    }

    const Filtrando= Buscar.addEventListener("keyup", function () {
        let bus=Buscar.value.trim().toUpperCase()
        let y= document.querySelectorAll('#lstFarma tr');
        let z=y.length;
        let a=z;
            if( bus.length > 2){
                a=0;
               for(let x=0; x< z; x++){
                    if( y[x].innerText.indexOf(bus) >= 0 ){
                       y[x].style.display='table-row';
                       a++;
                    }else{
                       y[x].style.display='none';
                    }
               }
            }else{
                for(let x=0; x< z; x++){
                    y[x].style.display='table-row';
                }
            }
        Buscar.setAttribute("title", a + "/"+ z);
    });

    function Monitor_Tabla(Tabla) {
         let cabe = document.querySelectorAll( "#"+ Tabla +" thead th");
         const x=cabe.length;
         if (x>0 ){
             for (let i = 0; i < x; i++) {
                  cabe[i].addEventListener("click", function () {
                          sortTable(Tabla,i);
                  });
             }
         }
    }

</script>
<script>
    btnGrabar.addEventListener("click",function (e) {
        e.preventDefault();
        btnGrabar.style.display='none';
        if(Farmacia.length){
            alert("Falta la Farmacia");
            Farmacia.focus();
            btnGrabar.style.display='inline-block';
            return;
        }
        if(Domicilio.length){
            alert("Falta la Domicilio");
            Domicilio.focus();
            btnGrabar.style.display='inline-block';
            return;
        }
        if(LstZonas.value < 1){
            alert("Falta Zona");
            LstZonas.focus();
            btnGrabar.style.display='inline-block';
            return;
        }

        let d={ID:ID.innerText,Farmacia:Farmacia.value,Tel:Tel.value,Domicilio:Domicilio.value,Email:Email.value,Zona:LstZonas.value}
        $.post(Ruta,d,function (r) {
            CargaLST();
            Limpiar();
            btnGrabar.style.display='inline-block';
        });


    });

            (function () {
                Cargacmb();
                CargaLST();
            })();
        </script>
</body>
</html>