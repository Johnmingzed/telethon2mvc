//======
//Anh
//======

const formElt = document.querySelector('form')
const nameElt = document.getElementById('name')
const lastnameElt = document.getElementById('lastname')
const firstnameElt = document.getElementById('firstname')
const mailElt = document.getElementById('mail')
const telephoneElt = document.getElementById('telephone')

const nameRegex = /^[a-zA-Z0-9]+$/
const mailRegex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.com$/
const telephoneRegex = /^[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/

formElt.addEventListener('submit', function (e) {
    e.preventDefault()

    let isValid = true

    const nameInput = nameElt.value
    const nameVerified = nameInput.match(nameRegex)
    if (!nameVerified) {
        isValid = false
        console.error('N\'as pas réussi')
    }

    const mailInput = mailElt.value
    const mailVerified = mailInput.match(mailRegex)
    if (!mailVerified){
        isValid = false
        console.error('N\'as pas réussi')
    }

    const telephoneInput = telephoneElt.value
    const telephoneVerified = telephoneInput.match(telephoneRegex)
    if(!telephoneVerified){
        isValid = false
        console.error('N\'as pas réussi')
    }

    if (isValid) {
        console.log('Réussi');
        formElt.submit();
    }
})