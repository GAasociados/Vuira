function mensajeError(mensaje)
{
  new Noty({
    type: 'error',
    layout: 'topRight',
    theme: 'sunset',
    text: mensaje
  }).show();
}

function mensajeInfo(mensaje)
{
  new Noty({
    type: 'info',
    layout: 'topRight',
    theme: 'sunset',
    text: mensaje
  }).show();
}
