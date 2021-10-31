<?php

class AuthHelper
{
  public function __construct()
  {
    session_start();
  }

  /**
   * Si la sesion no esta iniciada redirigue al login y corta la ejecucion.
   */
  public function checkLoggedIn()
  {
    if (!isset($_SESSION['EMAIL'])) {
      header("Location: " . BASE_URL . "login");
      die();
    }
  }

  /**
   * Inicia la sesion y redirige al inicio.
   */
  public function startSession($email)
  {
    $_SESSION['EMAIL'] = $email;
    header("Location: " . BASE_URL . "home");
    die();
  }

  /**
   * Comprueba si la session esta iniciada, en caso de que lo este redirige al inicio y corta la ejecucion.
   */
  public function checkSessionIsStarted()
  {
    if (isset($_SESSION['EMAIL'])) {
      header("Location: " . BASE_URL . "home");
      die();
    }
  }

  /**
   * Desloguea al usuario destruyendo la sesion actual
   */
  public function logout()
  {
    session_destroy();
    header('Location: ' . BASE_URL . 'home');
  }
}
