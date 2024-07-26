let msg_content = document.querySelector('.msg-content')
let msg_content_close = document.querySelector('#msg-content-close')

let msg_success = 'w-full border border-green-950 flex items-center justify-between px-2 py-1 bg-green-100'
let msg_error = 'w-full border border-red-950 flex items-center justify-between px-2 py-1 bg-red-100'
let msg_content_close_class = 'mt-3.5 p-1 text-[10pt] bg-purple-700 text-white'

let resultado = document.querySelector('#resultado')

let numero = document.querySelector('#numero')
let numero_para_algarismo = document.querySelector('#numero-para-algarismo').addEventListener('click', event => {
  event.preventDefault();

  fetch(`http://localhost:8888/api/numero_para_algarismo/${numero.value}`, {
    method: 'POST'
  }).then(response => response.json())
    .then(response => {
      let retorno = ''

      console.log(response);

      if (response.code == 200) {
        msg_content.setAttribute('class', msg_success)
        msg_content_close.setAttribute('class', msg_content_close_class)
        retorno = response.result
      } else {
        msg_content.setAttribute('class', msg_error)
        msg_content_close.setAttribute('class', msg_content_close_class)
        retorno = response.message
      }

      resultado.innerHTML = retorno
    })
    .catch(error => {
      msg_content.setAttribute('class', msg_error)
      msg_content_close.setAttribute('class', msg_content_close_class)
      resultado.innerHTML = error.message
    })
});

let algarismo = document.querySelector('#algarismo')
let algarismo_para_numero = document.querySelector('#algarismo-para-numero').addEventListener('click', event => {
  event.preventDefault();

  fetch(`http://localhost:8888/api/algarismo_para_numero/${algarismo.value}`, {
    method: 'POST'
  }).then(response => response.json())
    .then(response => {
      let retorno = ''

      if (response.code == 200) {
        msg_content.setAttribute('class', msg_success)
        msg_content_close.setAttribute('class', msg_content_close_class)
        retorno = response.result
      } else {
        msg_content.setAttribute('class', msg_error)
        msg_content_close.setAttribute('class', msg_content_close_class)
        retorno = response.message
      }

      resultado.innerHTML = retorno
    })
    .catch(error => {
      msg_content.setAttribute('class', msg_error)
      msg_content_close.setAttribute('class', msg_content_close_class)
      resultado.innerHTML = error.message
    })
});

msg_content_close.addEventListener('click', ()=> {
  msg_content.setAttribute('class', 'hidden')
  msg_content_close.setAttribute('class', 'hidden')
  numero.value = ''
  algarismo.value = ''
})