<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">

    <title>ABM Turnos</title>
    <style>

        h4 {
            text-align: center;
            padding-bottom: 10px;

        }

        #LstTurno tr:hover{
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
        table th:nth-child(4),table th:nth-child(1){
            width: 100px;
            text-align: center;
        }
         table th:nth-child(3),table td:nth-child(3){
             width: 150px;
             text-align: center;
         }
        #LstTurno tr:nth-child(odd){
            background: rgba(224, 163, 234, 0.56);
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
            <h4>ABM de Turnos</h4>
        </div>
        <div class="col m5 offset-m3" style="text-align: right;padding-top: 20px;">
            <div class="search-wrapper">
                <i class="material-icons"><input id="buscar" placeholder="Filtro">search</i>
                <a class="btn" id="ALL" style="margin-left: 70px;"> Ver Todos </a>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col s3">
            <div class="row">
                <form class="col s12">
                    <label id="idF">0</label>
                    <div class="row">
                        <div class="input-field  col s10 offset-2">
                            <input type="text" class="datepicker" id="Day">
                            <label for="Day">Fecha</label>
                        </div>
                        <div class="input-field col s12">
                            <select class="browser-default" id="LstZonas">
                                <option value="" disabled selected>Zona</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select class="browser-default" id="LstFarmacia">
                                <option value="" disabled selected> Todas </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s11">
                            <p>
                                <label>
                                    <input type="checkbox" id="Repe" />
                                    <span>Repetir cada <input id="dias" type="number" class="col s3" style="text-align: center;" id="Cada"> dias</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="row">


                    </div>

                </form>
                
                <div class="col s6">
                    <a class="btn" id="btnGrabar"> Grabar </a>
                </div>
                <div class="col s6">
                    <a class="btn" onclick="Limpiar()"> Limpiar</a>
                </div>
            </div>
        </div>

        <div class="col s9" style="max-height: 79vh;overflow-x: auto;">
            <table class="responsive-table" width="100%"id="tTurno">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Farmacia</th>
                        <th>Zona</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody id="LstTurno">
                    <tr>
                        <td> Cargando ....</td><td></td>
                    </tr>
                </tbody>
            </table>

        </div>


    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>
    <script>
      const Ruta="Data/dbTurnos.php";
      const ID = document.getElementById('idF');
      const LstFarmacia =document.getElementById('LstFarmacia');
      const LstZonas = document.getElementById('LstZonas');
      const Day=document.getElementById('Day');
      const Repe=document.getElementById('Repe');
      const Cada=document.getElementById('dias');
      const btnGrabar = document.getElementById('btnGrabar');
      const btnLimpiar = document.getElementById('btnLimpiar');
      const Buscar=document.getElementById('buscar');


      function Cargacmb() {
          $.get( "Data/dbZona.php?all",function (res) {
              let tmp = JSON.parse(res);
              let x= tmp["DataLst"].length;
              let zonas='<option value="" disabled selected>Zona</option>';

              for(let i=0;i< x; i++){
                  zonas =zonas + '<option value="'+ tmp["DataLst"][i].idZ +'">'+ tmp["DataLst"][i].Zona +'</option>';
              }
              LstZonas.innerHTML=zonas;
          });
      }
      function CargaFarma(z=0) {
          $.get( "Data/dbFarma.php?z="+z ,function (res) {
              let tmp = JSON.parse(res);
              let x= tmp["DataLst"].length;
              let Farmas='<option value="" disabled selected>Farmacias</option>';

              for(let i=0;i< x; i++){
                  Farmas =Farmas + '<option value="'+ tmp["DataLst"][i].ID +'">'+ tmp["DataLst"][i].Farmacia +'</option>';
              }
              LstFarmacia.innerHTML=Farmas;
          });
      }

      const ALL= document.getElementById('ALL').addEventListener('click',function (e) {
          e.preventDefault();
          $.get( Ruta+"?all",function (res) {
              X2= JSON.parse(res);
              MostrarTabla(X2);
          });
      });

      const lstf = LstZonas.addEventListener("change" , function (e) {
           CargaFarma(LstZonas.value);
           CargaTurnos(LstZonas.value);
       });

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
          let tabla="";
         try{
             let y= Data["DataLst"].length;
             let X= Data["DataLst"];
             for(let i=0;i< y; i++){
                 tabla =tabla + '<tr onclick="EF('+ X[i].IDT +')"><td>'+ X[i].Fecha+'</td><td>' + X[i].Farmacia +'</td><td>'+X[i].Zona +'</td><td><a class="waves-effect waves-light btn bor" onclick="BF('+ X[i].IDT +')">Borrar</a></td></tr>';
             }
             Buscar.setAttribute("title", y + "/"+ y);

         }catch (e) {
             tabla ="<tr style='background: rgba(6,191,236,0.62)'><td> Vacio </td><td></td><td></td><td></td></tr>";
         }
          document.getElementById('LstTurno').innerHTML=tabla;
          Monitor_Tabla('tTurno');
      }

      Day.addEventListener("change" , function (e) {
          $.get( Ruta+"?di="+ Day.value ,function (res) {
              X2= JSON.parse(res);
              MostrarTabla(X2);
          });
      });


      const Filtrando= Buscar.addEventListener("keyup", function () {
          let bus=Buscar.value.trim().toUpperCase();
          let y= document.querySelectorAll('#LstTurno tr');
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

      function CargaTurnos(z=0,F=0) {
          $.get( Ruta+"?z="+ z +"&F="+F,function (res) {
              X2= JSON.parse(res);
              MostrarTabla(X2);
          });
      }


      btnGrabar.addEventListener("click",function (e) {
          e.preventDefault();
          btnGrabar.style.display='none';
          if(LstFarmacia.value < 1){
              alert("Falta la Farmacia");
              LstFarmacia.focus();
              btnGrabar.style.display='inline-block';
              return;
          }

          if(Day.value.length <10){
              alert("Falta la Fecha");
              Day.focus();
              btnGrabar.style.display='inline-block';
              return;
          }

          let d={ID:ID.innerText,Far:LstFarmacia.value,Fecha:Day.value,Repe:Repe.value,Cada:Cada.value}
          $.post(Ruta,d,function (r) {
                console.log(r);
              alert("Grabado");
              btnGrabar.style.display='inline-block';
          });


      });


      function EF(id){
          $.get( Ruta+"?id="+id,function (res) {
              let tmp = JSON.parse(res);
              const x=tmp["Data"][0];

              ID.innerText=x.IDT;
              Day.value=x.fni;
              document.querySelector("#Day + label").classList.add('active');
              let XX=x.zonaid;
              let far=x.fid;
              LstZonas.value=XX;

              $.get( "Data/dbFarma.php?z="+XX ,function (res) {
                  let tmp = JSON.parse(res);
                  let x= tmp["DataLst"].length;
                  let Farmas='';
                  for(let i=0;i< x; i++){
                      Farmas =Farmas + '<option value="'+ tmp["DataLst"][i].ID +'">'+ tmp["DataLst"][i].Farmacia +'</option>';
                  }
                  LstFarmacia.innerHTML=Farmas;
                  LstFarmacia.value= far;
              });
          });
      }

    function BF(id) {
         if(confirm("Borrar el turno de la Farmacia, Seguro?")){
              $.get( Ruta+"?d="+id ,function (res) {
                   Limpiar();
              });
         }

    }

      function Limpiar(){
          ID.innerText="";
          Day.value="";
          CargaTurnos(0);
      }

      (function () {

      })();






      $(document).ready(function(){
          Cargacmb();
          CargaFarma();
          $('.datepicker').datepicker({});
          $('select').formSelect();

      });
    </script>
</body>
</html>