import errorMessage from './1-useFunctions'
//variables
const averageRate = document.querySelector('.js-average')
const formReview = document.querySelector('.js-form-review')
const url = window.location.pathname

if (url === '/') {

  formReview.addEventListener('submit', (e) => {
    e.preventDefault()

    const formData = new FormData(e.target)

    axios.post(url, formData)
      .then(() => {
        formReview.innerHTML = "<p>Votre évaluation a bien été prise en compte : la note moyenne a été mis à jours, votre commentaire apparaîtra aprés validation d'un administrateur.</p>"
        axios.get('/averageRate')
          .then((response) => {
            averageRate.innerHTML = response.data['average']
          })
      }).catch(() => {
        formReview.innerHTML = errorMessage()
      })
  })
}