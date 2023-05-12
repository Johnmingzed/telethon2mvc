//======
//Anh
//======

const formElt = document.querySelector('form')
const nameElt = document.getElementById('name')
const lastnameElt = document.getElementById('lastname')
const firstnameElt = document.getElementById('firstname')
const mailElt = document.getElementById('mail')
const telephoneElt = document.getElementById('phone')

nameElt.addEventListener('input', verificateName)
lastnameElt.addEventListener('input', verificateLastname)
firstnameElt.addEventListener('input', verificateFirstname)
mailElt.addEventListener('input', verificateEmail)
telephoneElt.addEventListener('input', verificateTelephone)

function verificateName() {
    const nameRegex = /^[a-zA-Z0-9\s]+$/
    const nameInput = nameElt.value
    const nameVerified = nameInput.match(nameRegex)
    if (!nameVerified) {
        nameMsg.innerHTML='Le nom du partenaire est invalide. Aucun caractère spécial autorisé.'
        nameMsg.style.color = 'rgb(178, 66, 66)'
    } else {
        nameMsg.innerHTML='Le nom du partenaire est valide.'
        nameMsg.style.color = '#8CD50A'
    }
}

function verificateLastname() {
    const lastnameRegex = /^[a-zA-Z\s]+$/
    const lastnameInput = lastnameElt.value
    const lastnameVerified = lastnameInput.match(lastnameRegex)
    if (!lastnameVerified) {
        lastnameMsg.innerHTML='Le nom est invalide. Seules l\'espace et les lettres sont autorisées.'
        lastnameMsg.style.color = 'rgb(178, 66, 66)'
    } else {
        lastnameMsg.innerHTML='Le nom est valide.'
        lastnameMsg.style.color = '#8CD50A'
    }
}

function verificateFirstname() {
    const firstnameRegex = /^[a-zA-Z\s]+$/
    const firstnameInput = firstnameElt.value
    const firstnameVerified = firstnameInput.match(firstnameRegex)
    if (!firstnameVerified) {
        firstnameMsg.innerHTML='Le prénom est invalide. Seules l\'espace et les lettres sont autorisées.'
        firstnameMsg.style.color = 'rgb(178, 66, 66)'
    } else {
        firstnameMsg.innerHTML='Le prénom est valide.'
        firstnameMsg.style.color = '#8CD50A'
    }
 
}

function verificateEmail() {
    const mailRegex = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/
    const mailInput = mailElt.value
    const mailVerified = mailInput.match(mailRegex)
    if (!mailVerified) {
        mailMsg.innerHTML='L\'email est invalide. Veuillez suivre ce format: youremail@somewhere.com'
        mailMsg.style.color = 'rgb(178, 66, 66)'
    } else {
        mailMsg.innerHTML='L\'email est valide.'
        mailMsg.style.color = '#8CD50A'
    }
}

function verificateTelephone() {
    const telephoneRegex = /^[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
    const telephoneInput = telephoneElt.value
    const telephoneVerified = telephoneInput.match(telephoneRegex)
    if (!telephoneVerified) {
        phoneMsg.innerHTML='Le numéro de téléphone est invalide. Veuillez suivre ce format: 00.00.00.00.00'
        phoneMsg.style.color = 'rgb(178, 66, 66)'
    } else {
        phoneMsg.innerHTML='Le numéro de téléphone est valide.'
        phoneMsg.style.color = '#8CD50A'
    }
}

console.log('partner.js');