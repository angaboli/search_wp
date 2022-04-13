/**
 * Open post in modal
 */

let modal = null;


const openModal = function (e) {
  e.preventDefault()
  const target = e.target
  modal = target.parentNode
  //console.log(modal);
  var targetHref = modal.getAttribute('href')
  content = document.getElementById('myModal')
  content.style.display = 'flex'
  target.removeAttribute('aria-hidden')
  target.setAttribute('aria-modal', 'true')
  var img = content.querySelector('.img')
  var imgUrl = modal.getAttribute('data-url');
  img.setAttribute('src', imgUrl)
  //console.log(img)
  //content = target
  content.addEventListener('click', closeModal)
  //console.log('modal' + modal)
  close = document.getElementById('myModal').querySelector('.js-modal-close')
  close.addEventListener('click', closeModal)
  //content.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)

}

const closeModal = function (e) {
  if (modal === null) return
  e.preventDefault()
  //console.log(content)
  content.style.display = 'none'
  //target.removeAttribute('aria-hidden')
  content.setAttribute('aria-modal', 'true')
  content.addEventListener('click', closeModal)
  content.querySelector('.js-modal-close').removeEventListener('click', closeModal)
  //modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
  //modal = null
}

const stopPropagation = function (e) {
  e.stopPropagation()
}

document.querySelectorAll('.js-modal').forEach(a => {
  a.addEventListener('click', openModal)
});

/**----------------------------------------------------------------------------------
 * ----------------------------------------------------------------------------------
 * */
