<?php
    
    $cURLConnection = curl_init();
    curl_setopt($cURLConnection, CURLOPT_URL, 'http://user:camara.123@192.168.1.64/ISAPI/Streaming/channels/201/picture/');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $image = curl_exec($cURLConnection);
    echo($image);
    //curl_close($cURLConnection);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Streaming IP Camera Nodejs</title>
    <link rel="stylesheet" href="bootstrap.min.css"  crossorigin="anonymous">
    
</head>
<body >
   <div class="container-fluid" style="height: 100%;"> 
        <nav class="nav nav-pills nav-fill text-center" style="display:block!important;">
                <img src="covid.png" width="100" height="100" class="d-inline-block align-top" alt="" loading="lazy">           
        </nav>
       <div style="height: 88%;" class="row borde" >           
           <div  class="col-8" name="cama">
            <div id="loader" class="text-center">
            <div class="spinner-grow" style="width: 10rem; height: 10rem;" role="status">
                <span class="sr-only">Loading...</span>
              </div>
              </div>
           </div>
           <div class="col-4">
                <div class="col-12 borde2"  >
                    <h3>Estadísticas <span id="edonombre"></span></h3>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Confirmados <span style="background-color:red!important;" class="badge badge-primary badge-pill" id="edoconfirmados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Negativos <span style="background-color: forestgreen!important; " class="badge badge-primary badge-pill" id="edorecuperados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Decesos Confirmados <span style="background-color: black!important; " class="badge badge-primary badge-pill" id="edomuertos"></span></li>
                    </ul>

                </div>
                <div class="col-12 borde2" >
                    <h3>Estadísticas de México</h3> 
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Confirmados <span style="background-color:red!important;" class="badge badge-primary badge-pill" id="mexicoconfirmados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Recuperados <span style="background-color: forestgreen!important; " class="badge badge-primary badge-pill" id="mexicorecuperados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Decesos Confirmados <span style="background-color: black!important; " class="badge badge-primary badge-pill" id="mexicomuertos"></span></li>
                    </ul>
                </div>
                <div class="col-12 borde2" >
                   <h3> Estadísticas del Mundo </h3> 
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Confirmados <span style="background-color:red!important;" class="badge badge-primary badge-pill" id="mundoconfirmados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Casos Recuperados <span style="background-color: forestgreen!important; " class="badge badge-primary badge-pill" id="mundorecuperados"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center texto">Decesos Confirmados <span style="background-color: black!important; " class="badge badge-primary badge-pill" id="mundomuertos"></span></li>
                    </ul>
                </div>
                <div class="col-12 borde3" >
                    <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img style="height: 310px;" src="img1.jpg" class="d-block w-100" alt="..." name="im1">
                          </div>
                          <div class="carousel-item">
                            <img style="height: 310px;" src="img2.jpg" class="d-block w-100" alt="..." name="im2">
                          </div>
                          <div class="carousel-item">
                            <img style="height: 310px;" src="img3.jpg" class="d-block w-100" alt="..." name="im3">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>
       </div>
       <div class="row">
           <div class="col-12 text-center">
               Created by Octavio Velasco Franco
           </div>
       </div>
       
       
       
   </div>
   <script src="jquery.min.js"></script>
<script src="popper.min.js"  crossorigin="anonymous"></script>
<script src="bootstrap.min.js"  crossorigin="anonymous"></script>
<script type="text/javascript" src="jsmpeg.min.js"></script>
       <script type="text/javascript">
       $( document ).ready(function() {
        var csvJSON = function(csv){

var lines = csv.split("\n")
var result = []
var headers = lines[0].split(",")

lines.map(function(line, indexLine){
  if (indexLine < 1) return // Jump header line

  var obj = {}
  var currentline = line.split(",")

  headers.map(function(header, indexHeader){
    obj[header] = currentline[indexHeader]
  })

  result.push(obj)
})

result.pop() // remove the last item because undefined values
                
return result // JavaScript object
}
                    
           $.getJSON( "https://api.covid19api.com/total/country/mexico", function( data ) {     
                var l= data.length;
                $("#mexicoconfirmados").text(data[l-1].Confirmed);
                $("#mexicomuertos").text(data[l-1].Deaths);
                $("#mexicorecuperados").text(data[l-1].Recovered);
            });

            $.getJSON( "https://api.covid19api.com/summary", function( data ) {  
                $("#mundoconfirmados").text(data.Global.TotalConfirmed);
                $("#mundomuertos").text(data.Global.TotalDeaths);
                $("#mundorecuperados").text(data.Global.TotalRecovered);
            });

            $.get( "https://raw.githubusercontent.com/mexicovid19/Mexico-datos/master/datos/estados_hoy.csv", function( data ) {  
               let estados=data.split("\n");
               let dat=estados[7].split(",");
               $("#edoconfirmados").text(dat[1]);
                $("#edomuertos").text(dat[3]);
                $("#edorecuperados").text(dat[6]);
                $("#edonombre").text(dat[0]);
            });
            
           
           setTimeout(function(){
            $( "#loader" ).remove();
                $( "<img name='hola' src='http://192.168.1.64/ISAPI/Streaming/channels/201/httpPreview'>").appendTo( "div[name$='cama'" );
                $("img[name$='hola']").addClass("mio");  
            }, 5000);
        });    
       </script>
       <link rel="stylesheet" href="estilo.css">
</body>
</html> 