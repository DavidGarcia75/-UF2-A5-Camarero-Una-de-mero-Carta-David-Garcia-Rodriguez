<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-lyZqHSt7oPJw7G5PJaxZkns4gRoIenj/+bIrjXz4hjj0qmrae9mG/uoFsquQ9k/cUx9+fMRF4ZTpl9QMNTNJVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta del Restaurante</title>
</head>
<body>
<header>
        <div class="header-content">
            <div class="logo">
                <h1>La Maffia il Ristorante </h1>
               
            </div>
            <nav>
            </nav>
        </div>
    </header>
    
<script src="https://kit.fontawesome.com/e76003d072.js" crossorigin="anonymous"></script>
    <br>
    <div class="container">
        <?php
        $xml = simplexml_load_file("carta_restaurante.xml");
        if ($xml === false) {
            echo "No se pudo cargar la carta del restaurante.";
        } else {
            foreach ($xml->plato as $plato) {
                echo "<div class='item'>";
                echo "<h2>{$plato->nombre}</h2>";
                echo "<img src={$plato->imagen}> "; 
                echo "<p>{$plato->descripcion}</p>";
                echo "<p>Precio: {$plato->precio}</p>";
                echo "<p>Calorías: {$plato->calorias}</p>";  
                if (isset($plato->gluten) && $plato->gluten == "Sí") {
                    echo "<p><i class='fas fa-exclamation-circle'></i> Contiene gluten</p>";
                } else {
                    echo "<p><i class='fas fa-check-circle'></i> Sin gluten</p>";
                }
                
                if (isset($plato->lacteos) && $plato->lacteos == "Sí") {
                    echo "<p><i class='fas fa-cheese text-yellow-500'></i> Contiene lácteos</p>";
                } else {
                    echo "<p><i class='fas fa-cheese text-yellow-500'></i> No contiene lácteos</p>";
                }
                if (isset($plato->pescado) && $plato->pescado == "Sí") {
                    echo "<p><i class='fas fa-fish text-blue-500'></i> Contiene pescado</p>";
                } else {
                    echo "<p><i class='fas fa-fish text-blue-500'></i> No contiene pescado</p>";
                }
                
                echo "</div>";
            }                                                    
                echo "</div>";
            }
        
        ?>
    </div>
    <footer>
    <div class="footer-content">
        <nav>
            <p>-La Maffia il Ristorante- @Todos los derechos reservados@</p>
        </nav>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <script>
window.addEventListener('scroll', function() {
    const items = document.querySelectorAll('.item');
    items.forEach(item => {
        const bounding = item.getBoundingClientRect();
        if (bounding.top <= window.innerHeight / 1.5 && bounding.bottom >= 0) {
            const depth = item.dataset.depth;
            item.style.transform = `translateY(${depth * 50}px)`;
        }
    });
});
    </script>
</footer>
</body>
</html>


