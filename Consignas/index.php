<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consigna Hotelera</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Paleta veraniega armoniosa */
        :root {
            --primary-color: #FF6F61;  /* Coral */
            --secondary-color: #4ECDC4; /* Turquesa */
            --accent-color: #FFE66D;   /* Amarillo pastel */
            --summer-blue: #87CEEB;    /* Azul cielo */
            --summer-pink: #FFB6C1;    /* Rosa pastel */
        }

        body {
            font-family: 'Arial', sans-serif;
            scroll-behavior: smooth;
        }

        /* Navbar */
        .navbar {
            background-color: var(--primary-color);
        }
        .navbar a {
            color: white !important;
            font-weight: bold;
        }

        /* Secciones */
        section {
            min-height: 100vh;
            padding: 60px 20px;
        }

        /* Hero */
        #hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            min-height: 100vh;
        }

        /* Otras secciones */
        #how-it-works { background-color: #f8f9fa; }
        #features { background-color: #e9ecef; }
        #hotels { background-color: #f1f3f5; }
        #cta { background-color: var(--secondary-color); color: white; display: flex; justify-content: center; align-items: center; flex-direction: column; }

        /* Botones */
        .btn-custom {
            background-color: var(--primary-color);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            margin: 5px;
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-custom:hover, .btn-custom:active {
            background-color: #ff4f3c;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Animaciones scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s ease-out;
        }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* Cards hoteles */
        .hotel-card {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }
        .hotel-card:hover, .hotel-card:active {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 25px rgba(0,0,0,0.25);
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Consigna Hotelera</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="register_user.php">Registro Usuario</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Inicio Sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="hoteles/registro.php">Registrar Hotel</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero">
    <h1>Bienvenido a Consigna Hotelera</h1>
    <p>Reserva espacios de consignas en hoteles de manera rápida y segura</p>
    <a href="#how-it-works" class="btn btn-custom">Cómo funciona</a>
</section>

<!-- How it Works -->
<section id="how-it-works" class="text-center fade-in">
    <div class="container">
        <h2>Cómo Funciona</h2>
        <p>Selecciona un hotel, elige tu espacio de consigna, reserva y disfruta de tu estadía sin preocupaciones.</p>
        <div class="row mt-4">
            <div class="col-md-4 mb-3"><i class="bi bi-rocket fs-1 mb-2"></i><h5>Rápido</h5><p>Reserva en segundos y asegura tu espacio.</p></div>
            <div class="col-md-4 mb-3"><i class="bi bi-shield-lock fs-1 mb-2"></i><h5>Seguro</h5><p>Todos nuestros hoteles cumplen con estándares de seguridad.</p></div>
            <div class="col-md-4 mb-3"><i class="bi bi-phone fs-1 mb-2"></i><h5>Fácil de usar</h5><p>Interfaz intuitiva y adaptada a cualquier dispositivo.</p></div>
        </div>
    </div>
</section>

<!-- Hoteles -->
<section id="hotels" class="text-center fade-in">
    <div class="container">
        <h2>Hoteles Disponibles</h2>
        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="card hotel-card">
                    <img src="https://picsum.photos/300/200?random=1" class="card-img-top" alt="Hotel 1">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Central</h5>
                        <p class="card-text">Ubicado en el corazón de la ciudad con consignas seguras.</p>
                        <a href="reserve.php?hotel=1" class="btn btn-custom">Reservar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card hotel-card">
                    <img src="https://picsum.photos/300/200?random=2" class="card-img-top" alt="Hotel 2">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Playa</h5>
                        <p class="card-text">Disfruta del mar mientras tus pertenencias están seguras.</p>
                        <a href="reserve.php?hotel=2" class="btn btn-custom">Reservar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card hotel-card">
                    <img src="https://picsum.photos/300/200?random=3" class="card-img-top" alt="Hotel 3">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Montaña</h5>
                        <p class="card-text">Escápate a la naturaleza sin preocuparte por tus objetos.</p>
                        <a href="reserve.php?hotel=3" class="btn btn-custom">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="cta">
    <h2>¡Empieza ahora!</h2>
    <a href="register_user.php" class="btn btn-custom btn-lg">Registrarse</a>
    <a href="login.php" class="btn btn-custom btn-lg">Iniciar Sesión</a>
</section>

<!-- Footer -->
<footer class="text-center py-4" style="background-color: var(--primary-color); color: white;">
    <p>&copy; 2025 Consigna Hotelera | Todos los derechos reservados</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Animación scroll
    const faders = document.querySelectorAll('.fade-in');
    const appearOptions = { threshold: 0.2 };
    const appearOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, appearOptions);
    faders.forEach(fader => appearOnScroll.observe(fader));

    // Gradiente veraniego lento y continuo
    const hero = document.getElementById('hero');
    const gradientColors = [
        [255, 111, 97],   // Coral
        [78, 205, 196],   // Turquesa
        [255, 230, 109],  // Amarillo pastel
        [135, 206, 235],  // Azul cielo
        [255, 182, 193]   // Rosa pastel
    ];
    let step = 0;
    const gradientSpeed = 0.0008; // más lento y suave
    let colorIndices = [0,1,2,3];

    function updateGradient() {
        const c0_0 = gradientColors[colorIndices[0]];
        const c0_1 = gradientColors[colorIndices[1]];
        const c1_0 = gradientColors[colorIndices[2]];
        const c1_1 = gradientColors[colorIndices[3]];

        const istep = 1 - step;
        const r1 = Math.round(istep*c0_0[0] + step*c0_1[0]);
        const g1 = Math.round(istep*c0_0[1] + step*c0_1[1]);
        const b1 = Math.round(istep*c0_0[2] + step*c0_1[2]);

        const r2 = Math.round(istep*c1_0[0] + step*c1_1[0]);
        const g2 = Math.round(istep*c1_0[1] + step*c1_1[1]);
        const b2 = Math.round(istep*c1_0[2] + step*c1_1[2]);

        hero.style.background = `linear-gradient(135deg, rgb(${r1},${g1},${b1}), rgb(${r2},${g2},${b2}))`;

        step += gradientSpeed;
        if (step >= 1){
            step %= 1;
            colorIndices[0] = colorIndices[1];
            colorIndices[2] = colorIndices[3];
            colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (gradientColors.length-1))) % gradientColors.length;
            colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (gradientColors.length-1))) % gradientColors.length;
        }
        requestAnimationFrame(updateGradient);
    }
    updateGradient();
</script>
</body>
</html>
