import errorMessage from './1-useFunctions'

let filter = null
let list = null
let validationMessage = null
const url = window.location.pathname

if (url === '/vehicles') {
  filter = document.querySelector('.js-filterVehicle');
  list = document.querySelector('.js-vehicleList')
  validationMessage = document.querySelector('.js-message')


  filter.addEventListener('submit', (e) => {
    e.preventDefault()
    const formData = new FormData(e.target)
    axios.post(url, formData, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
      .then((response) => {
        list.innerHTML = response.data.content
        validationMessage.innerHTML = response.data.message
      })
      .catch(() => {
        validationMessage.innerHTML = errorMessage()
      })
  })
}