<?php include("../db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Sistema para Ponedoras</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
  <link rel="stylesheet" href="assets/css/button.css">
  <!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
</head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#" class="logo">
              <img src="assets/images/Gallina.png" height="80px" alt="JAC "> 
            </a>
            <ul class="nav-links">
            <a name="" id="" class="login-button btn-primary btn" href="../MenuActualizado/index.php" role="button">Inicio</a>
        </ul>            
              <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


  <!-- ***** Main Banner Area End ***** -->


  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>HUEVOSFINOS</h6>
            <h4>GALPONES<em>FINOS </em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">

            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/galpo01.png" alt="">
                </div>
                <h4>AGREGAR GALPON</h4>
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
                AGREGAR
              </button>
            </div>


            <?php

            $query = "SELECT * FROM galpones";
            $result_datos = mysqli_query($conex, $query);

            while ($row = mysqli_fetch_array($result_datos)) {  ?>

              <div class="item">
                <div class="service-item">
                  <div class="icon">
                    <img src="assets/images/galpo01.png" alt="">
                  </div>
                  <h4>Galpon N°<?php echo $row['id'] ?></h4>
                  <form action="../Galpo01.php" method="POST">
                    <input type="submit" name="galpon" class="btn btn-primary" value="IR">
                    <input type="hidden" name="numero" value="<?php echo $row['id'] ?>">

                  </form>

                  <ul>
                    <br>
                    <li><a class="btn btn-danger" href="eliminar_galpon.php?id=<?php echo $row['id'] ?>">ELIMINAR</a></li>
                  </ul>
                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal" id="miModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Contenido de la modal aquí -->
        <div class="modal-header">
          <h5 class="modal-title">Agregar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="agregar_galpon.php" method="POST">
            <div class="form-group">
              <label for="numero">Numero</label>
              <input type="text" name="numero" class="form-control">
            </div>

            <div class="form-group">
              <label for="Nombre">Usuario</label>
              <input type="text" name="usuario" class="form-control" placeholder="Ingrese su usuario">
            </div>

            <div class="form-group">
              <label for="Ubicacion">ubicacion</label>
              <input type="text" name="ubicacion" class="form-control">
            </div>

            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" name="agregar_galpon" value="agragar galpon">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
        <!-- Puedes agregar más botones según sea necesario -->
      </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function() {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
      e.preventDefault();
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>

</html>