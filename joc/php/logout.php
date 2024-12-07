<?php
    session_start();
    // Tencar sessio
    if(session_destroy()) {
        // Redireccio pagina principal
        header("Location: ../../index.html");
    }
?>
