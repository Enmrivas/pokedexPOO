<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <body fiprocessed="true" onload="hide();">
    <script src="js/script.js"></script>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="index.php">Company name</a>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Lista de Pokemones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="regionesIndex.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              Lista de Regiones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tiposIndex.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              Tipos de pokemones
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button onclick="hide();" type="button" class="btn btn-sm btn-outline-secondary">Tabla/Fotos</button>
          </div>
        </div>
        
      </div>

      <div  id="tabla">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($listPokemones)): ?>
            <?php foreach($listPokemones as $pokemon): ?>
                <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                </tr>
            <?php endforeach; ?>

            <?php else: ?>

                <a style="margin: 2%;" class="btn btn-primary" href="assets/registro.php">Agregar Pokemon</a>

            <?php endif; ?>
          </tbody>
        </table>
      </div>
      </div>
    <div id="thumbs">

        <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
            
            </div>


            
            
            <div class="row">
            
            
                <?php if(!empty($listEstudiante)): ?>
                    <?php foreach($listEstudiante as $student): ?>

                    <div class="col-md-4">
                    <div class="card mb-2 shadow-sm">
                    <img class="card-img-top" src="<?php echo "image/estudiantes/" . $student->fotoPerfil ?>" alt="image/estudiantes/default.png">
                        <div class="card-body">
                        <p class="card-text"> Nombre: <?php echo $student->nombre ?> </p>
                        <p class="card-text"> Apellido: <?php echo $student->apellido ?> </p>
                        <p class="card-text"> Estado: <?php echo $student->estado?> </p>
                        <p class="card-text"> Carrera: <?php echo $student->carrera?> </p>
                        <p class="card-text"> Materia favorita: <?php echo $student->materiaFav?> </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a type="button" href="assets/editar.php?id=<?php echo $student->id ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a type="button" href="assets/borrar.php?id=<?php echo $student->id ?>" class="btn btn-sm btn-danger">Borrar</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <a style="margin: 2%;" class="btn btn-primary" href="assets/registro.php">Agregar Pokemon</a>

                <?php endif; ?>

                
                
            </div>
            </div>
        </div>
        </div>
            </div>
            </main>
        </div>
</div>



</body></html>