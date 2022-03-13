/**
 * Open article in modal
 */

// MODAL IMAGE
function openModal(URL, TITLE, ID, CAPTION){
    var modal = document.getElementById('myModal')
    var modalImg = document.getElementById("modal-img")
    var caption = document.getElementById("caption")
    var captionH3 = caption.getElementsByTagName('h3')[0]
    var captionA = caption.getElementsByTagName('a')[0]
    var captionB = caption.getElementsByTagName('p')[0]
    var span = document.getElementsByClassName("close")[0]
  
    var newTitle = encodeURIComponent(TITLE.trim())
    modal.style.display = "flex"
    captionH3.innerHTML = TITLE
    modalImg.src = URL
    captionB.innerHTML = CAPTION
  
    captionA.href = "mailto:josefineklundmail@gmail.com?Subject=" + newTitle
    captionA.innerHTML = "Contact me"
  
    span.onclick = function() {
      modal.style.display = "none"
    }
  }
