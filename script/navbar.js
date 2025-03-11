//link toggle navbar
const hamburgerButton = document.getElementById('hamburger-button');
const navbarContainer = document.getElementById('navbar-container');
const closeButton = document.getElementById('close-button');

navbarContainer.classList.add('close');

function OpenNavbar() {
  navbarContainer.classList.remove('close');
}

function CloseNavbar() {
  navbarContainer.classList.add('close');
}

hamburgerButton.addEventListener('click', OpenNavbar);
closeButton.addEventListener('click', CloseNavbar);

//link toggle theme
const themeButton = document.getElementById('theme-button');
const body = document.querySelector('body');

function ToggleTheme() {
  if (body.classList.contains('dark')) {
    body.classList.toggle('dark');
    body.classList.toggle('light');
    themeButton.classList.toggle('active');
  } else {
    body.classList.toggle('dark');
    body.classList.toggle('light');
    themeButton.classList.toggle('active');
  }
}

themeButton.addEventListener('click', ToggleTheme);

const buttonNavbar = document.querySelectorAll('#navbar button');
const portfolioSection = document.querySelectorAll('.portfolio-section');

buttonNavbar[0].classList.add('active');

for(let i = 1; i< portfolioSection.length; i++) {
  portfolioSection[i].classList.add('hidden');
}

buttonNavbar.forEach((buttonNav, index) => {
  buttonNav.addEventListener('click', (event) => {
    buttonNavbar.forEach((btnNav) => btnNav.classList.remove('active'));
    portfolioSection.forEach((sections) => sections.classList.add('hidden'));
    const dataPortfolio = buttonNav.getAttribute('data-section');
    buttonNav.classList.add('active');
    const Portsection = document.getElementById(dataPortfolio);
    Portsection.classList.remove('hidden');
  });
})