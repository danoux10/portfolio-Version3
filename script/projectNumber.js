const numberSchool = document.getElementById('number-school');
const numberPortfolio = document.getElementById('number-portfolio');
const numberOther = document.getElementById('number-other');
const numberGame = document.getElementById('number-game');
const numberAll = document.getElementById('number-all');

let getNumber = new XMLHttpRequest();
getNumber.open('GET','controller/projectNumber.php?element');
getNumber.send();

getNumber.onreadystatechange = function () {
  if (this.readyState === 4 && this.status === 200) {
    let result = JSON.parse(this.responseText);

    let school = result.school.count;
    let portfolio = result.portfolio.count;
    let other = result.other.count;
    let game = result.game.count;
    let all = result.all.count;

    numberSchool.textContent = school;
    numberPortfolio.textContent = portfolio;
    numberOther.textContent = other;
    numberGame.textContent = game;
    numberAll.textContent = all;
  }
}