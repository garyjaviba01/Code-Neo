/*=======================================================================
* CARGADOR: Análisis regional de propuestas
=======================================================================*/
var bar = new ProgressBar.Circle('#container-pross', {
  // Configuracion progress
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#28FF41', width: 4 },
  // lLamada de animacion
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1.1rem';
bar.text.style.marginTop = '-15px';
bar.animate(1.0);

/*=======================================================================
* CARGADOR: Tamaño de empresas
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-tama', {
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#28FF41', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1.1rem';
bar.text.style.marginTop = '-15px';
bar.animate(1.0);  

/*=======================================================================
* CARGADOR: Elegibilidad - Sin Evaluar
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-sinev', {
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#FFA619', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-18px';
bar.animate(0.95);

/*=======================================================================
* CARGADOR: Elegibilidad - Elegibles
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-elegib', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#28FF41', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-18px';
bar.animate(0.35);

/*=======================================================================
* CARGADOR: Elegibilidad - No Elegibles
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-noelegib', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#FF2879', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-18px';
bar.animate(0.85);    

/*=======================================================================
* CARGADOR: Actividades económicas
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-activeco', {
  color: '#aaa',
  // This has to be the same size as the maximum width to
  // prevent clipping
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#28D9FF', width: 4 },
  // Set default step function for all animate calls
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1.1rem';
bar.text.style.marginTop = '-15px';
bar.animate(0.5);

/*=======================================================================
* CARGADOR: Análisis regional de empresas
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-empreg', {
  // Configuracion progress
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#28FF41', width: 4 },
  // lLamada de animacion
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1.1rem';
bar.text.style.marginTop = '-15px';
bar.animate(1.0); 

/*=======================================================================
* CARGADOR: Viabilidad - Sin Evaluar
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-via-sinev', {
  // Configuracion progress
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#FFCA28', width: 4 },
  // lLamada de animacion
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-15px';
bar.animate(0.5);

/*=======================================================================
* CARGADOR: Viabilidad - Viables
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-via-viab', {
  // Configuracion progress
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#2865FF', width: 4 },
  // lLamada de animacion
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-15px';
bar.animate(0.3);

/*=======================================================================
* CARGADOR: Viabilidad - No viables
=======================================================================*/
var bar = new ProgressBar.Circle('#progg-via-noviab', {
  // Configuracion progress
  color: '#aaa',
  strokeWidth: 4,
  trailWidth: 1,
  easing: 'easeInOut',
  duration: 1400,
  text: {
    autoStyleContainer: false
  },
  from: { color: '#aaa', width: 1 },
  to: { color: '#FF284B', width: 4 },
  // lLamada de animacion
  step: function(state, circle) {
    circle.path.setAttribute('stroke', state.color);
    circle.path.setAttribute('stroke-width', state.width);

    var value = Math.round(circle.value() * 100);
    if (value === 0) {
      circle.setText('');
    } else {
      circle.setText(value + "%");
    }

    }
});
bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
bar.text.style.fontSize = '1rem';
bar.text.style.marginTop = '-15px';
bar.animate(0.5);       