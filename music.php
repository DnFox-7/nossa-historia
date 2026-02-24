<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILLIE - Nossa História</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff5f7;
            color: #4a4a4a;
            overflow-x: hidden;
        }

        .title {
            font-family: 'Dancing Script', cursive;
            color: #e91e63;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.6s ease;
        }

        #preloader.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loader-img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            animation: zoomPulse 2.5s infinite alternate;
        }

        @keyframes zoomPulse {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(1.2); opacity: 1; }
        }

        /* Contador Styles */
        .counter-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.1);
            border: 2px solid #fce4ec;
        }

        .counter-number {
            font-weight: 600;
            color: #e91e63;
            font-size: 1.5rem;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #f8bbd0;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            border-radius: 10px;
        }

        .container-timeline {
            padding: 10px 40px;
            position: relative;
            width: 50%;
        }

        .container-timeline::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: #fce4ec;
            border: 4px solid #e91e63;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left { left: 0; }
        .right { left: 50%; }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid #f8bbd0;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #f8bbd0;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid #f8bbd0;
            border-width: 10px 10px 10px 0;
            border-color: transparent #f8bbd0 transparent transparent;
        }

        .right::after { left: -16px; }

        .content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(233, 30, 99, 0.1);
            transition: transform 0.3s;
        }

        .content:hover { transform: translateY(-5px); }

        .heart {
            color: #e91e63;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        .btn-yes {
            background-color: #e91e63;
            color: white;
            transition: all 0.3s;
        }

        .btn-yes:hover {
            background-color: #c2185b;
            transform: scale(1.05);
        }

        .btn-no {
            background-color: #9e9e9e;
            color: white;
            transition: all 0.1s;
            position: relative;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 30px;
            border-radius: 15px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: modal-appear 0.4s;
        }

        @keyframes modal-appear {
            from {transform: scale(0.8); opacity: 0;}
            to {transform: scale(1); opacity: 1;}
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .timeline::after { left: 20px; }
            .container-timeline { width: 100%; padding: 10px 20px; }
            .container-timeline.left, .container-timeline.right { left: 0; }
            .container-timeline::after { left: 10px; right: auto; }
            .btn-yes, .btn-no { width: 100%; }
        }

        .firework {
            position: fixed;
            width: 6px; height: 6px;
            border-radius: 50%;
            animation: explode 1s ease-out forwards;
        }

        @keyframes explode {
            0% { transform: scale(0); opacity: 1; }
            100% { transform: scale(2); opacity: 0; }
        }

        .confetti {
            position: fixed;
            top: 0; width: 10px; height: 10px;
            animation: fall 3s linear forwards;
            z-index: 1000;
        }

        @keyframes fall {
            to { transform: translateY(100vh) rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen">

    <div id="preloader">
        <div class="flex flex-col items-center space-y-6">
            <img src="img/billie.jpg" alt="Billie Eilish" class="loader-img">
            <button id="preloaderMusicToggle" class="btn-yes px-6 py-2 rounded-full font-bold text-lg shadow-lg">
                🎵 TOCAR🎵 
            </button>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <header class="text-center mb-8">
            <h1 class="title text-5xl md:text-6xl mb-4">Para a pessoa mais especial <i class="fas fa-heart heart"></i></h1>
            <p class="text-xl text-pink-600">Nossa história oficial</p>
        </header>

        <div class="max-w-2xl mx-auto mb-16 p-6 counter-container text-center">
            <h3 class="text-gray-500 uppercase tracking-widest text-sm mb-4 font-semibold">Estamos juntos há:</h3>
            <div id="timer" class="flex justify-center items-center gap-4 md:gap-8">
                <div>
                    <span id="days" class="counter-number">00</span>
                    <p class="text-xs text-gray-400 uppercase">Dias</p>
                </div>
                <div class="text-pink-300 text-2xl mb-4">:</div>
                <div>
                    <span id="hours" class="counter-number">00</span>
                    <p class="text-xs text-gray-400 uppercase">Horas</p>
                </div>
                <div class="text-pink-300 text-2xl mb-4">:</div>
                <div>
                    <span id="minutes" class="counter-number">00</span>
                    <p class="text-xs text-gray-400 uppercase">Min</p>
                </div>
                <div class="text-pink-300 text-2xl mb-4">:</div>
                <div>
                    <span id="seconds" class="counter-number">00</span>
                    <p class="text-xs text-gray-400 uppercase">Seg</p>
                </div>
            </div>
            <p class="mt-4 text-pink-500 font-medium">Desde 23/02/2026 às 23:35 ❤️</p>
        </div>

        <div class="timeline">
            <div class="container-timeline left">
                <div class="content">
                    <h2 class="text-xl font-semibold text-pink-600">Nosso primeiro encontro</h2>
                    <p class="text-gray-600">O dia em que tudo começou...</p>
                    <div class="mt-4">
                        <img src="img/foto2.jpg" alt="Primeiro encontro" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <p class="mt-2 text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> 03 de Agosto, 2025</p>
                </div>
            </div>

            <div class="container-timeline right">
                <div class="content">
                    <h2 class="text-xl font-semibold text-pink-600">Nosso primeiro passeio</h2>
                    <p class="text-gray-600">Lembra daquele dia na roda gigante?</p>
                    <div class="mt-4">
                        <img src="img/foto1.jpg" alt="Passeio" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <p class="mt-2 text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> 03 de Agosto, 2025</p>
                </div>
            </div>

            <div class="container-timeline left">
                <div class="content">
                    <h2 class="text-xl font-semibold text-pink-600">Nosso date solo kkk</h2>
                    <p class="text-gray-600">A noite em que conversamos por horas...</p>
                    <div class="mt-4">
                        <img src="img/foto4.jpeg" alt="Jantar" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <p class="mt-2 text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> 03 de Agosto, 2025</p>
                </div>
            </div>

            <div class="container-timeline right">
                <div class="content">
                    <h2 class="text-xl font-semibold text-pink-600">A foto mais bonita</h2>
                    <p class="text-gray-600">Quando eu fiquei me sentindo ao "ter" você ao meu lado</p>
                    <div class="mt-4">
                        <img src="img/foto3.jpeg" alt="Especial" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <p class="mt-2 text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> 03 de Agosto, 2025</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-16 mb-8">
            <h2 class="title text-4xl mb-6">Um compromisso para a vida toda...</h2>
            <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg border-2 border-pink-100">
                <p class="text-xl mb-4">Você aceitou ser o meu amor!</p>
                <div class="flex justify-center">
                    <div class="btn-yes px-12 py-3 rounded-full font-bold text-lg shadow-lg"> 
                        PARA SEMPRE <i class="fas fa-heart ml-2"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalYes" class="modal">
        <div class="modal-content">
            <i class="fas fa-heart text-6xl text-pink-600 mb-4 heart"></i>
            <h2 class="text-3xl font-bold text-pink-600 mb-4">Nosso Sim Eterno!</h2>
            <p class="text-lg mb-6">Prometo fazer você sorrir todos os dias dessa nossa jornada.</p>
            <button onclick="closeModal()" class="btn-yes px-6 py-2 rounded-full font-bold"> Fechar </button>
        </div>
    </div>

    <audio id="musicPlayer" loop>
        <source src="msc/love.mp3" type="audio/mp3">
    </audio>
    <div class="fixed bottom-4 right-4 z-50">
        <button id="toggleMusic" class="btn-yes w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
            <i class="fas fa-music"></i>
        </button>
    </div>

    <script>
        // === LÓGICA DO CONTADOR REAL ===
        function updateTimer() {
            // Data em que ela aceitou: 23/02/2026 às 23:35
            const startDate = new Date(2026, 1, 23, 23, 35, 0); 
            const now = new Date();
            const diff = now - startDate;

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const m = Math.floor((diff / (1000 * 60)) % 60);
            const s = Math.floor((diff / 1000) % 60);

            document.getElementById('days').innerText = d.toString().padStart(2, '0');
            document.getElementById('hours').innerText = h.toString().padStart(2, '0');
            document.getElementById('minutes').innerText = m.toString().padStart(2, '0');
            document.getElementById('seconds').innerText = s.toString().padStart(2, '0');
        }

        setInterval(updateTimer, 1000);
        updateTimer();

        // === PRELOADER & MÚSICA ===
        const musicPlayer = document.getElementById('musicPlayer');
        const preloader = document.getElementById('preloader');
        const preloaderBtn = document.getElementById('preloaderMusicToggle');

        preloaderBtn.addEventListener('click', () => {
            musicPlayer.play().catch(e => console.log("Erro ao tocar:", e));
            preloader.classList.add("hidden");
            setTimeout(() => { preloader.style.display = "none"; }, 600);
        });

        document.getElementById('toggleMusic').addEventListener('click', () => {
            if (musicPlayer.paused) musicPlayer.play();
            else musicPlayer.pause();
        });

        function closeModal() {
            document.getElementById('modalYes').style.display = 'none';
        }
    </script>
</body>
</html>