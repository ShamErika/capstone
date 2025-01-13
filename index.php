<?php
  session_start(); 

  $isLoggedIn = isset($_SESSION['user_id']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>LALAMOK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="img/lamok.png" type="image/x-icon"> 
  <link rel="stylesheet" href="style.css">
</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img class="navbar-brand" src="img/lamok.png" alt="Logo">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home">HOME</a></li>
        <li><a href="#ss">SIGNS & SYMPTOMS</a></li>
        <li><a href="#prevention">PREVENTION</a></li>
        <li><a href="#about">ABOUT</a></li>

        <!-- LOG IN -->
        <?php if ($isLoggedIn): ?>
          <li><a href="php/admin_dashboard.php">ADMIN DASHBOARD</a></li>
          <li><a href="php/logout.php">LOGOUT</a></li>
        <?php else: ?>
          <li><a href="php/admin.php">ADMIN LOGIN</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>



<div class="jumbotron text-center">
 <img  class="logo-img" src='img/lamok.png'>


 <p style="color: aliceblue;">One way to predict your future lamok destination</p> 
</div>

 


<!-- Container (HOME Section) -->
<div id="home" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2 style="font-size: 30px;">DASHBOARD</h2>
    
      <hr>
      <br><br>
      8 

<!--graph part-->


<div class="graph-container">
  <div class="graph">
    <h1 style="color: black;">Graph Viewer</h1>
      
        <div id="graph-container">
          <iframe id="graph-viewer-frame" src="php/index_graphs.php"></iframe>
        </div>

<canvas id="graph1"></canvas>
  </div>

  <div class="graph">
  <h1 style="color: black;">Predicted</h1>
  <div id="graph-container">
  <div class="graph-below">
          <iframe id="predictions-frame" src="php/predictions.php"></iframe>
        </div>
</div>
    <canvas id="graph1"></canvas>
  </div>



  <div class="graph">
    <div class="graph-right">
      <h1 style="color: black;">GIS Viewer</h1>
      <label for="year-select" style="color: black;">Select a Year:</label>
      <select id="year-select" style="color: black;">
        <option value="html/GIS_2022.html">2022</option>
        <option value="html/GIS_2023.html">2023</option>
      </select>
    
      <div id="graph-container">
        <iframe id="gis-frame" src="html/GIS_2022.html"></iframe>
      </div>
    <canvas id="graph2"></canvas>
  </div>
</div>



<!-- LEGEND PART FOR GIS-->

<div id="legend">
  <h3 style="color: #0B60B0;">Map Legend</h3>
  <div class="legend-item">
    <span class="legend-symbol" style="background-color: red;"></span>
    <span class="legend-label" style="color: #0B60B0;">High Risk Area</span>
  </div>
  <div class="legend-item">
    <span class="legend-symbol" style="background-color: orange;"></span>
    <span class="legend-label" style="color: #0B60B0;">Moderate Risk Area</span>
  </div>
  <div class="legend-item">
    <span class="legend-symbol" style="background-color: yellow;"></span>
    <span class="legend-label" style="color: #0B60B0;">Low Risk Area</span>
  </div>
</div>



  </div>
  </div>
  </div>
  </div>
</div>

</div> <!-- END PART OF HOME PAGE CONTAINER --> 
<br>
<br>
<!-- end ng graph and gis page -->

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">

      <h2 style="color: #0B60B0;">Overview</h2><br>
      <h4 ><strong>What is Dengue?</strong>
        <br>
        Dengue (break-bone fever) is a viral infection that spreads from mosquitoes to people. It is more common in tropical and subtropical climates.
      </h4><br>
      <p><strong>NOTE:</strong><br> Most people who get dengue will not have symptoms. But for those who do, the most common symptoms are high fever, headache, 
        body aches, nausea, and rash. Most will get better in 1–2 weeks. Some people develop severe dengue and need care in a hospital. </p>
        <h5 style="color: #0B60B0;"><strong>World Health Organization: WHO & World Health Organization: WHO. (2024, April 23). Dengue and severe dengue.</strong></h5>
    </div>
 
  </div>
</div>
      

<!-- Container (SIGNS AND SYMPTOMS Section) -->
<div id="ss" class="container-fluid text-center">
  <section id="signs and symptoms">
  <h2>SIGNS AND SYMPTOMS</h2>
  <h4>When symptoms do occur, they may be mistaken for other illnesses — such as the flu — and usually 
    begin four to 10 days after you are bitten by an infected mosquito.</h4>
    <h4>Dengue fever causes a high fever — 104 F (40 C) — and any of the following signs and symptoms:</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
    <!--<span class="glyphicon glyphicon-off logo-small"></span> -->

      <h4 style="color: #0B60B0;"><strong>Severe Headache</strong></h4>
      <img  class="logo-img" src='img/head.png'>
    </div>
    <div class="col-sm-4">

      <h4 style="color: #0B60B0;"><strong>Pain behind the eyes</strong></h4>
      <img  class="logo-img" src='img/eye.png'>
    </div>
    <div class="col-sm-4">
      
      <h4 style="color: #0B60B0;"><strong>Rashes</strong></h4>
      <img  class="logo-img" src='img/rashes.png'>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <h4 style="color: #0B60B0;"><strong>Muscle and joint pains</strong></h4>
      <img  class="logo-img" src='img/joint.png'>
    </div>

    <div class="col-sm-4">
      <h4 style="color: #0B60B0;"><strong>Nausea & Vomiting</strong></h4>
      <img  class="logo-img" src='img/vomit.png'>
    </div>
    <div class="col-sm-4">
 
      <h4 style="color:#0B60B0;"><strong>Swollen Glands</strong></h4>
      <img  class="logo-img" src='img/glands.png'>
    </div>
        </section>
    
</div>

<br><br>

<!-- Container (PREVENTION Section) -->
<div id="prevention" class="container-fluid text-center bg-grey">
  <h2>PREVENTION</h2><br>
  <h4>The mosquitoes that spread dengue are active during the day.</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
       <!--<img src="img/clothes.jpg"  width="400" height="300"> -->
        <p><strong>Mosquito breeding can be prevented by:</strong></p>
       
          <p class="p-a">• preventing mosquitoes from accessing egg-laying habitats by environmental management and modification;<br></p>
            <p class="p-a"> •disposing of solid waste properly and removing artificial man-made habitats that can hold water;<br></p>
              <p class="p-a"> •covering, emptying and cleaning domestic water storage containers on a weekly basis;<br></p>
                <p class="p-a"> •applying appropriate insecticides to outdoor water storage containers.<br></p>
              </p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
       
        <p><strong>Lower the risk of getting dengue by protecting yourself from mosquito bites by using:</strong></p>
       
          <p class="p-a">•clothes that cover as much of your body as possible;<br></p>
          <p class="p-a">•mosquito nets if sleeping during the day, ideally nets sprayed with insect repellent;<br></p>
          <p class="p-a">•window screens;<br></p>
          <p class="p-a">•mosquito repellents (containing DEET, Picaridin or IR3535); and<br></p>
          <p class="p-a">•coils and vaporizers.<br></p>
        
          
          
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <p><strong>If you get dengue, it’s important to:<strong></p>
   
          <p class="p-a"> •rest;<br></p>
            <p class="p-a">•drink plenty of liquids;<br></p>
              <p class="p-a">•use acetaminophen (paracetamol) for pain;<br></p>
                <p class="p-a">•avoid non-steroidal anti-inflammatory drugs, like ibuprofen and aspirin; and<br></p>
                  <p class="p-a"> •watch for severe symptoms and contact your doctor as soon as possible if you notice any.<br></p>
      </div>
    </div>
  </div><br>
  
  <h2>What our doctors say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Your individual effort to control the mosquito population is necessary to prevent and control the spread of dengue in your community."<br><span>Dr. Takeshi Kasai, Medical Officer, National Government</span></h4>
      </div>
      <div class="item">
        <h4>"Dengue has a profound impact on individuals, families and communities, as well as on health-care facilities, public health security, and the economy.  

          And climate change will continue to put even more people at risk of dengue. "<br><span>Dr Angela Pratt, WHO Representative, Viet Nam</span></h4>
      </div>
      <div class="item">
        <h4> "Wherever you have a significant number of mosquitoes and warm hot environments is where you see dengue transmission."<br><span>Dr. Stacey Rizza, Mayo Clinic infectious diseases specialist</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="about" class="container-fluid">
  <div class="text-center">
    <h2 style="font-size:35px;">About</h2>
    <h4>LALAMOK is a website that helps people be knowledgable about dengue prevention, symptoms and cases around Baguio City.
      <br> With the help of Predictions and Updated cases,we can aure the safety of people around the city with the use of this website.
      <br>LALAMOK help aim to protect and make sure that all suburb(barangay) of Baguio City aren't surrounded by deadly mosquitos that 
      can 
    </h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
     
       
        <!--about page here-->


      </div>      
    </div>     
    
  
</div>




<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top" style="color: #0B60B0;">
    <span style="color: #0B60B0;"  class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <div class="footer-links">
            <a href="#" class="main-link">Attributes</a>
            <div class="hidden-links">
                <a href="https://www.w3schools.com">bootstrap</a>
                <a href="https://www.freepik.com">Freepik</a>
                <a href="https://www.flaticon.com/authors/vector-stall">Vector Stall </a>
                <a href="https://www.flaticon.com/authors/vectorslab">Vectorslab</a>
                <a href="https://www.flaticon.com/authors/puckung">Puckung</a>
                <a href="https://www.flaticon.com/authors/flowicon">Flowicon</a>
            </div>
        </div>
  <p>© Copyright 2024 UNIVERSITY OF THE CORDILLERAS</p>

 
 





</footer>

<script src="script.js">


</script> 

</body>
</html>