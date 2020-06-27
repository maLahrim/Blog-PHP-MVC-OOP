function menuStyle(){
    var menu = document.getElementById('main-nav')
    var mainLogo = document.querySelector('#main-nav  .main-logo')
    if (document.documentElement.scrollTop > 50 && window.innerWidth > 768) {
        menu.classList.add('special-color-dark')
        menu.style.fontSize='15px'
        mainLogo.style.width='150px'
      } else if(document.body.scrollTop < 50 || document.documentElement.scrollTop < 50){
        menu.classList.remove('special-color-dark')
        mainLogo.style.width=''
      }
}

if(document.getElementById('postEditor')){
  tinymce.init({
    selector: '#postEditor',
  });
}