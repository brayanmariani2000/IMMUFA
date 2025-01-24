(function(){
  const sliders = [...document.querySelectorAll('.carrusel_body')];
  const botonSiguente=document.querySelector('#siguente');
  const botonRegresar=document.querySelector('#regresar');
 console.log(botonSiguente);
 console.log(botonRegresar);
   let valor;
  botonSiguente.addEventListener('click',() => {
    changePosition(1);
  });
  botonRegresar.addEventListener('click',() => {
    changePosition(-1);
  });

  const changePosition = (add) => {
   const carruselActual= document.querySelector('.carrusel_body--vista').dataset.id;
   valor= Number(carruselActual);
   valor+=add;
   sliders[Number(carruselActual)-1].classList.remove('carrusel_body--vista');
   if (valor==sliders.length+1 || valor==0){
        valor=valor===0 ? sliders.length : 1;
   
   } 

   sliders[valor-1].classList.add('carrusel_body--vista');

  }


})()