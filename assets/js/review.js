import errorMessage from './1-useFunctions'
//variables
const formReview = document.querySelector('.js-form-review')
const url = window.location.pathname

if (url === '/' | url === '/reviews') {

  formReview.addEventListener('submit', (e) => {
    e.preventDefault()

    const formData = new FormData(e.target)

    axios.post(url, formData)
      .then(() => {
        formReview.innerHTML = "<p>Votre évaluation a bien été prise en compte : votre commentaire apparaîtra aprés validation d'un administrateur.</p>"

      }).catch(() => {
        formReview.innerHTML = errorMessage()
      })
  })
}