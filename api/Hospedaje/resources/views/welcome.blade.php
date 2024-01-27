<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            place-items: center;
            font-family: Inter, system-ui, Avenir, Helvetica, Arial, sans-serif;
            line-height: 1.5;
            font-weight: 400;
            padding: 0;
            background-color: #f0ebdf;
        }

        p {
            font-size: 0.8rem;
        }

        h1 {
            color: #FD9407;
            font-size: 4.2em;
            line-height: 1.1;
        }

        button {
            border-radius: 3px;
            border: 1px solid transparent;
            padding: 0.6rem;
            font-size: 1.5rem;
            font-weight: 500;
            font-family: inherit;
            background-color: #CC063E;
            cursor: pointer;
            color:white;
            transition: background-color 0.25s;
        }

        button:hover {
            background-color: #E83535;
        }

        button:focus,
        button:focus-visible {
            outline: 4px auto -webkit-focus-ring-color;
        }

        .menu {
            display: flex;
            flex-direction: column;
            height: 100vh;

            align-items: center;
            justify-content: center;
        }

        .menu h1 {
            font-size: 8.5rem;
        }

        .menu p {

            margin-left: 250px;
            margin-right: 250px;
            font-size: 1.3rem;
        }

        section img {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, 0.412);
            width: 00px;
            margin: 20px;
            height: 300px;
        }

        .sect {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 550px;
        }

        .info {
            display: flex;
            height: 100vh;
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        .info li {
            text-align: start;
            margin: 15px;
            font-size: 20px;
        }

        .info h2 {
            font-size: 40px;
            text-align: start;
        }

        .info img {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            border-radius: 20px;
            height: 450px;
            width: 600px;
            overflow: auto;

        }

        .info div {
            display: flex;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            width: 800px;
            height: 500px;
        }

        .info p {
            font-size: 1.1rem;
            text-align: left;
            margin: 70px;
        }


        .slider {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
            width: auto;
            margin: 50px;
        }


        .slide {
            position: relative;
            overflow: hidden;

        }

        .slide-text {
            position: absolute;
            top: 45%;
            left: 49%;
            color: white;
            font-size: 50px;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: 0.2s ease;
        }

        .slider img {
            width: 300px;
            height: 400px;
            margin: 0;
            flex-grow: 1;
            object-fit: cover;
            opacity: .8;
            transition: .5s ease;
        }

        .slider img:hover {
            cursor: crosshair;
            width: 420px;
            opacity: 1;
            filter: contrast(120%);
        }

        .slide:hover .slide-text {
            opacity: 1;
            transition: 1.5s ease;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr) repeat(2, 0fr);
            grid-template-rows: repeat(3, 1fr) repeat(2, 0fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
            gap: 45px;
            justify-content: center;
            margin-left: 50px;
            color: white;
        }

        .grid div {
            background-color: wheat;
            border-radius: 20px;
            padding: 15px;
        }

        .grid div h3 {
            font-size: 70px;
        }

        .grid div h2 {
            font-size: 80px;
            margin: 0;
        }

        .grid div p {
            font-size: 30px;
        }

        .grid div:first-child {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(' ./image/pexels-pixabay-164558.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: start;
            padding-left: 50px;
            color: #ffffff;
            grid-area: 1 / 1 / 3 / 3;
        }


        .grid div:nth-child(2) {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(' ./image/pexels-jovydas-dobilas-2462015.jpg');
            background-size: cover;
            padding: 50px;
            background-position: center;
            grid-area: 1 / 3 / 2 / 4;
        }

        .grid div:nth-child(3) {
            background-color: #fd9207a7;
            text-align: start;
            padding: 50px;
            grid-area: 2 / 3 / 3 / 4;
        }

        .grid div:nth-child(4) {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(' ./image/pexels-pixabay-221457.jpg');
            background-size: cover;
            text-align: start;
            padding: 20px;
            background-position: right;
            grid-area: 3 / 1 / 4 / 2;
        }

        .grid div:nth-child(5) {
            background-color: #10898b9f;
            text-align: start;
            padding: 34px;
            grid-area: 3 / 2 / 4 / 4;
        }
        footer {
            color: wheat;
            background-color: black;
            padding: 15px
        }
        svg {
            margin: 10px;
            height: 30px;
            width: 30px;
            transition: color 0.25s;
        }

        svg:hover {
            color: #E83535;
        }

        @media (min-width:700px)and(max-width: 1000px) {
            .menu {
                height: 140vh;
            }

            .menu p {
                font-size: 1.8rem;
            }

            .menu h1 {
                font-size: 10rem;
            }

            .menu button {
                margin-top: 80px;
                font-size: 2.1rem;
                height: 110px;
                width: 300px;
                border-radius: 10px;
            }
        }

        @media only screen and (max-width : 1350px) {
            .menu {
                margin-bottom: 100px;
            }

            .menu h1 {
                font-size: 8rem;
            }

            .menu p {
                font-size: 1.4rem;
            }

            .menu button {
                font-size: 1.4rem;

            }

            .slider {
                width: 1000px;
                margin-bottom: 150px;
                margin-left: 130px;
            }


            .info {
                padding-bottom: 90px;
            }

            .info div {
                width: 500px;
            }

            .info img {
                width: 700px;
                height: 600px;
            }

            .info p {
                font-size: 27px;
            }
        }

        @media only screen and (min-width : 500px) and (max-width:768px) {
            .menu {
                margin-top: 300px;
                margin-bottom: 300px;
            }

            .menu h1 {
                font-size: 9rem;
            }

            .menu p {
                font-size: 1.5rem;
            }

            .menu button {
                font-size: 2rem;
                width: 300px;
                height: 100px;
            }

            .slider {
                margin-left: 0px;
                margin-bottom: 250px;
            }

            .info {
                display: flex;
                flex-direction: column;
            }

            .info li {
                font-size: 23px;
            }

            .info p {
                font-size: 25px;
            }

            .info div {
                width: 100%;
            }

            .info img {
                width: 100%;
                height: 1200px;
            }

            .grid div h2:first-child {
                font-size: 3.2rem;
            }

            .grid div:nth-child(4) {
                grid-area: 3 / 1 / 4 / 4;
                padding-left: 50px;
            }

            .grid div:nth-child(5) {
                grid-area: 4 / 1 / 5 / 4;
            }

            .grid h3 {
                font-size: 5.5rem;
            }
        }

        @media only screen and (min-width : 320px) and (max-width: 499px) {
            .menu {
                margin-top: 500px;
                margin-bottom: 680px;
            }

            .menu h1 {
                font-size: 7.5rem;
            }

            .menu p {
                font-size: 2rem;
            }

            .menu button {
                width: 500px;
                font-size: 4rem;
                height: auto;
            }

            .slider {
                height: 800px;
                margin-left: 0px;
                margin-bottom: 500px;
            }

            .slider img {
                height: 1100px;
            }

            .slider img:hover {
                cursor: crosshair;
                width: 1020px;
                opacity: 1;
                filter: contrast(120%);
            }

            .info img {
                height: 800px;
                width: 100%;
                overflow: auto;
            }

            .info {
                display: flex;
                flex-direction: column;
                height: 1200px;
            }

            .info div {
                width: 100%;
            }

            .info div p {
                font-size: 2.2rem;
            }

            .grid h2:first-child {
                font-size: 3.5rem;
            }

            .grid div:nth-child(4) {
                grid-area: 3 / 1 / 4 / 4;
                padding-left: 50px;
            }

            .grid div:nth-child(5) {
                grid-area: 4 / 1 / 5 / 4;
            }

            .grid h3 {
                font-size: 3.5rem;
            }

            footer {
                font-size: 2rem;
            }

            svg {
                width: 5rem;
                height: 5rem;
            }
        }
    </style>
</head>

<body>
    <main>
        <section class='menu'>
            <h1>WelcomeNest</h1>
            <p>¿Buscando donde Hospedarte? WelcomeNest teniendo 150,000 lugares donde puedas hospedarte. Nos enorgullece
                presentar una solución integral diseñada para transformar por completo tu experiencia de hospedaje y
                hacer que cada viaje sea inolvidable.</p>
            <button>Busqueda</button>
        </section>
        <section class='slider'>
            <div class='slide'>
                <img src='./image/pexels-cameron-casey-1334605.jpg' alt="" />
                <h3 class='slide-text'>Gran variedad hoteles</h3>
            </div>
            <div class='slide'>
                <img src='./image/pexels-thgusstavo-santana-2102587.jpg' alt="" />
                <h3 class='slide-text'>Reservar por varios días</h3>
            </div>
            <div class='slide'>
                <img src='./image/pexels-tomáš-malík-2581922.jpg' alt="" />
                <h3 class='slide-text'>Ubicacion en cualquier lugar</h3>
            </div>
        </section>
        <section class="info">
            <img src='./image/pexels-asad-photo-maldives-1268855.jpg' alt="" />
            <div>
                <p>Imagina tener el mundo de los alojamientos al alcance de tus manos. Con nuestra plataforma, encontrar
                    el lugar perfecto para hospedarte nunca ha sido tan fácil. Ya sea que estés planeando unas
                    vacaciones en familia, un viaje de negocios o una escapada de fin de semana, te ofrecemos una amplia
                    variedad de opciones para que encuentres el alojamiento ideal que se ajuste a tus necesidades y
                    presupuesto.</p>
            </div>
        </section>
        <section class="info">
            <div>
                <ol>
                    <h2>¡Beneficios!</h2>
                    <li>Promoción Efectiva: Hoteles, hostales y más tienen la oportunidad de destacarse en nuestra
                        plataforma, llegando a una audiencia global ávida de experiencias únicas.</li>
                    <li>Gestión de Imagen y Reputación: Controla tu presencia en línea y responde a reseñas para
                        construir una reputación positiva. Fortalece tu marca y conecta con clientes potenciales.</li>
                    <li>Aumento de Reservas Directas: Experimenta un aumento en las reservas directas al llegar a
                        viajeros que buscan exactamente lo que tu establecimiento tiene para ofrecer.</li>
                    <li>Adaptabilidad Competitiva: Accede a datos sobre la competencia y preferencias del usuario para
                        ajustar estratégicamente tus ofertas y precios, manteniéndote a la vanguardia del mercado.</li>
                </ol>
            </div>
            <img src='./image/pexels-pixabay-259685.jpg' alt="" />
        </section>
        <section class='grid'>
            <div>
                <h2>Reserva en cualquier Hotel</h2>
                <p>Una forma mas sencilla de poder encontrar un lugar comodo y barato en cualquier lugar.</p>
            </div>
            <div>
                <h2>Rapido y Sencillo</h2>
            </div>
            <div>
                <h2>Comenta</h2>
                <p>Comenta tu lugar favorito donde te gusto estar</p>
            </div>
            <div>
                <h3>
                    Calificar en tu Hotel favorito
                </h3>
            </div>
            <div>
                <h2>Poder Reservar con atelacion</h2>
                <p>Como también obtener las ofertas antes que cualquier persona, como también encontrar el mas barato en
                    el destino que quieras llegar</p>
            </div>
        </section>
        <section class="info">
            <img src='./image/pexels-asman-chema-594077.jpg' alt="" />
            <div>
                <p>Únete a nosotros en esta emocionante travesía de descubrimiento y comodidad. Con nuestra página web y
                    aplicación, cada viaje se convierte en una oportunidad para explorar el mundo sin preocupaciones.
                    Descubre, reserva y vive experiencias únicas con nosotros. ¡Bienvenido a la revolución de la
                    planificación de viajes!</p>
            </div>
        </section>
        <footer>
            <h2>Manuel Francisco Amavizca Barrios</h2>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M22 5.9c-.7.3-1.5.5-2.4.6a4 4 0 0 0 1.8-2.2c-.8.5-1.6.8-2.6 1a4.1 4.1 0 0 0-6.7 1.2 4 4 0 0 0-.2 2.5 11.7 11.7 0 0 1-8.5-4.3 4 4 0 0 0 1.3 5.4c-.7 0-1.3-.2-1.9-.5a4 4 0 0 0 3.3 4 4.2 4.2 0 0 1-1.9.1 4.1 4.1 0 0 0 3.9 2.8c-1.8 1.3-4 2-6.1 1.7a11.7 11.7 0 0 0 10.7 1A11.5 11.5 0 0 0 20 8.5V8a10 10 0 0 0 2-2.1Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 2c-2.4 0-4.7.9-6.5 2.4a10.5 10.5 0 0 0-2 13.1A10 10 0 0 0 8.7 22c.5 0 .7-.2.7-.5v-2c-2.8.7-3.4-1.1-3.4-1.1-.1-.6-.5-1.2-1-1.5-1-.7 0-.7 0-.7a2 2 0 0 1 1.5 1.1 2.2 2.2 0 0 0 1.3 1 2 2 0 0 0 1.6-.1c0-.6.3-1 .7-1.4-2.2-.3-4.6-1.2-4.6-5 0-1.1.4-2 1-2.8a4 4 0 0 1 .2-2.7s.8-.3 2.7 1c1.6-.5 3.4-.5 5 0 2-1.3 2.8-1 2.8-1 .3.8.4 1.8 0 2.7a4 4 0 0 1 1 2.7c0 4-2.3 4.8-4.5 5a2.5 2.5 0 0 1 .7 2v2.8c0 .3.2.6.7.5a10 10 0 0 0 5.4-4.4 10.5 10.5 0 0 0-2.1-13.2A9.8 9.8 0 0 0 12 2Z"
                    clip-rule="evenodd" />
            </svg>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M19 5.6c-1.4-.7-2.8-1.1-4.2-1.3l-.5 1c-1.5-.2-3-.2-4.6 0l-.5-1c-1.4.2-2.8.6-4.1 1.3a17.4 17.4 0 0 0-3 11.6 18 18 0 0 0 5 2.5c.5-.5.8-1.1 1.1-1.7l-1.7-1c.2 0 .3-.2.4-.3a11.7 11.7 0 0 0 10.2 0l.4.3-1.7.9 1 1.7c1.9-.5 3.6-1.4 5.1-2.6.4-4-.6-8.2-3-11.5ZM8.6 14.8a2 2 0 0 1-1.8-2 2 2 0 0 1 1.8-2 2 2 0 0 1 1.8 2 2 2 0 0 1-1.8 2Zm6.6 0a2 2 0 0 1-1.8-2 2 2 0 0 1 1.8-2 2 2 0 0 1 1.8 2 2 2 0 0 1-1.8 2Z" />
            </svg>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M13.1 6H15V3h-1.9A4.1 4.1 0 0 0 9 7.1V9H7v3h2v10h3V12h2l.6-3H12V6.6a.6.6 0 0 1 .6-.6h.5Z"
                    clip-rule="evenodd" />
            </svg>

        </footer>

    </main>

</body>

</html>