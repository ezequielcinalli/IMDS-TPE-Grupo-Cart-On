<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <base href="{BASE_URL}">
  <title>Cooperativa Cart-On</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid justify-content-between">

      <a class="navbar-brand" href="">Cooperativa de reciclaje Cart-On</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="materiales-aceptados">
              Materiales aceptados
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="registrar-pedido-retiro">
              Solicitar pedido de retiro
            </a>
          </li>
        </ul>

        <div>
          {* display the php session ($_SESSION) *}
          {if !$smarty.session}
            <a href="login" class="btn btn-primary">Iniciar sesion</a>
          {else}
            <div class="d-flex">
              <div class="dropdown">
                <button type="button" id="dropdownAdmin" class="btn btn-outline-light dropdown-toggle me-4 mt-1"
                  data-bs-toggle="dropdown">
                  Administrar
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAdmin">
                  <a class="dropdown-item" href="admin-materiales">ABM de materiales aceptados</a>
                  <a class="dropdown-item" href="cargar-material">Cargar ingreso de materiales</a>
                </div>
              </div>
              <div class="dropdown">
                <button type="button" id="dropdownLogout" class="btn btn-outline-light dropdown-toggle ml-4 mt-1"
                  data-bs-toggle="dropdown">
                  {$smarty.session.EMAIL}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogout">
                  <a class="dropdown-item" href="logout">Logout</a>
                </div>
              </div>
            </div>
          {/if}
        </div>

      </div>
    </div>
  </nav>
<main>