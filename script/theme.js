console.log("script theme.js");

//link toggle theme
const themeButton = document.getElementById('theme-button');
document.addEventListener('DOMContentLoaded', function() {
  const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefersDarkScheme.matches) {
    document.body.classList.add("dark");
  } else {
    document.body.classList.add("light");
  }

  // Pour basculer le thème avec un bouton par exemple
  const toggleButton = document.getElementById('theme-toggle');

  function toggleTheme(){
    if (document.body.classList.contains("dark")) {
      document.body.classList.remove("dark");
      document.body.classList.add("light");
    } else {
      document.body.classList.remove("light");
      document.body.classList.add("dark");
    }
  }

  themeButton.addEventListener('click', toggleTheme);
});
