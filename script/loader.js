const loader = document.getElementById('loader-content');
const header = document.getElementById('header-container');
const main = document.querySelector('main');
const footer = document.querySelector('footer');

header.classList.add('hidden');
main.classList.add('hidden');
footer.classList.add('hidden');

function toggleLoader(){
  setTimeout(()=>{
    if(!loader.classList.contains('hidden')){
      header.classList.remove('hidden');
      main.classList.remove('hidden');
      footer.classList.remove('hidden');
      loader.classList.add('hidden');
    }
  },1000)
}

window.addEventListener('load', toggleLoader);