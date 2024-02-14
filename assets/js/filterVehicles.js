
const filter = document.querySelector('.js-filterVehicle');
const list = document.querySelector('.js-vehicleList')
const validationMessage = document.querySelector('.js-message')
console.log(validationMessage)

filter.addEventListener('submit', (e) => {
  e.preventDefault()

  const formData = new FormData(e.target)

  const url = window.location.pathname

  axios.post(url, formData, {
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    }
  })
    .then((response) => {
      list.innerHTML = response.data.content
      validationMessage.innerHTML = response.data.message
    })
    .catch((error) => {
      validationMessage.innerHTML = "Votre demande n'est pas correcte, merci de renseigner seulement des nombres."
      console.log(error)
    })
})