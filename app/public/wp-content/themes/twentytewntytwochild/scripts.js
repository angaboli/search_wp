/**
 * Open post in modal
 */


 let modal = null;

 const openModal = function(e) {
     e.preventDefault()
     console.log(e.target);
     const target = e.target.parentNode
     var targetHref = target.getAttribute('href')
     console.log(targetHref)
     target.style.display = null
     target.removeAttribute('aria-hidden')
     target.setAttribute('aria-modal', 'true')
     modal = target
     modal.addEventListener('click', closeModal)
         //console.log('modal' + modal)
     modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
     modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
 
 }
 
 const closeModal = function(e) {
     if (modal === null) return
     e.preventDefault()
     modal.style.display = 'none'
     target.removeAttribute('aria-hidden')
     target.setAttribute('aria-modal', 'true')
     modal = target
     modal.addEventListener('click', closeModal)
     modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
     modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
     modal = null
 }
 
 const stopPropagation = function(e) {
     e.stopPropagation()
 }
 
 document.querySelector('js-modal').addEventListener('click', openModal)