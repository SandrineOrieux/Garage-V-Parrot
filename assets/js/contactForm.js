import errorMessage from './1-useFunctions'

const url = window.location.pathname
const formContact = document.querySelector('.js-formContact')
const message = document.querySelector('.js-message')

console.log(message)

if (formContact != null) {
  console.log(url)
  formContact.addEventListener('submit', (e) => {
    e.preventDefault()
    const formData = new FormData(e.target)

    console.log(formData)

    axios.post(url, formData)
      .then(() => {
        message.innerHTML = 'Votre demande est bien envoyée, nous vous contacterons bientôt !'
        console.log('requete envoyée')
      })
      .catch(() => {
        message.innerHTML = errorMessage()
      })
  })

}