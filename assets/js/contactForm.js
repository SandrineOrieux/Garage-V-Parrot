import errorMessage from './1-useFunctions'

const url = window.location.pathname
const formContact = document.querySelector('.js-formContact')
const message = document.querySelector('.js-message')


if (formContact != null) {

  formContact.addEventListener('submit', (e) => {
    e.preventDefault()
    const formData = new FormData(e.target)



    axios.post(url, formData)
      .then(() => {
        message.innerHTML = 'Votre demande est bien envoyée, nous vous contacterons bientôt !'
      })
      .catch(() => {
        message.innerHTML = errorMessage()
      })
  })

}