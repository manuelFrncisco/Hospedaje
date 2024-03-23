@extends('layouts.app')
@section('title', 'WelcomeNest')

@section('content')

<section class="menu container">
    <div class="col m-5 mt-6 mb-6">
        <h1 class="text-break">WelcomeNest</h1>
        <p class="text-break">¿Buscando donde Hospedarte? WelcomeNest teniendo 150,000 lugares donde puedas hospedarte.
            Nos enorgullece
            presentar una solución integral diseñada para transformar por completo tu experiencia de hospedaje y
            hacer que cada viaje sea inolvidable.</p>

        <a class="btn bsb-btn-xl btn-danger" href="/page">Busqueda</a>

    </div>
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
        <p class="">Imagina tener el mundo de los alojamientos al alcance de tus manos. Con nuestra plataforma, encontrar
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
<section class='division'>
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
    <div class="p-5">
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
<footer class="text-center pb-2">
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

@endsection
