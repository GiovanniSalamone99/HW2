function showTendina() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
function accedi(){
    window.location="http://localhost/fantacalcio-app/public/login";
}
  window.onclick = function(event) {
    if (!event.target.matches('.button')) {
      let dropdowns = document.getElementsByClassName("dropdown-content");
      let i;
      for (i = 0; i < dropdowns.length; i++) {
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }