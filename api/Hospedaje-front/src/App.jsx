import './App.css'
import Image1 from './assets/image/pexels-pixabay-259685.jpg'
import Image2 from './assets/image/pexels-pixasquare-com-1115804.jpg'
import Image3 from './assets/image/pexels-beyzanur-k-18708150.jpg'
import SecctionImage from './assets/image/pexels-donald-tong-189296.jpg'
import Slider1 from './assets/image/pexels-scott-webb-1029599.jpg'
import Slider2 from './assets/image/pexels-thgusstavo-santana-2102587.jpg'
import Slider3 from './assets/image/pexels-pixabay-275484.jpg'

function App() {

  return (
    <main>
      <section className='menu'>
        <h1>WelcomeNest</h1>
        <p>¿Buscando donde Hospedarte? WelcomeNest teniendo 150,000 lugares donde puedas hospedarte. Te damos la bienvenida a poder elegir tu lugar donde hospedaje desde tu casa.</p>
        <button>Busqueda</button>
      </section>
      <section className='sect'>
        <img src={Image1} alt="#" />
        <img src={Image2} alt="#" />
        <img src={Image3} alt="#" />
      </section>
      <section className="info">
        <img src={SecctionImage} alt="" />
        <div>
          <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen</p>
        </div>
      </section>
      <section className='Slider'>
        <div className='slider-wrapper'>
          <div className='sliders'>
            <img id="slider-1" src={Slider1} alt="" />
            <img id="slider-2" src={Slider2} alt="" />
            <img id="slider-3" src={Slider3} alt="" />
          </div>
          <div className='slider-nav'>
            <a id="slider-1" href="#slider-1"></a>
            <a id="slider-2" href="#slider-2"></a>
            <a id="slider-3" href="#slider-3"></a>
          </div>
        </div>
      </section>
      <section className='grid'>
        <div>Hola</div>
        <div>Hola</div>
        <div>Hola</div>
        <div>Hola</div>
        <div>Hola</div>
        <div>Hola</div>
      </section>


    </main>
  )
}

export default App

