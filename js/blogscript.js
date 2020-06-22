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


tinymce.init({
  selector: 'textarea#postEditor',
  plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
  toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
  toolbar_mode: 'floating',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
});
