var pizzaselect = document.getElementById("pizza");
var czosnkowy = document.getElementById("czosnkowy");
var pomidorowy = document.getElementById("pomidorowy");
var piciu = document.getElementById("piciu");
var fryty = document.getElementById("fryty"); 

var koszyk = JSON.parse(sessionStorage.getItem('koszyk')) || [];

var koszykDiv = document.getElementById("koszyk-przedmioty");
console.log(koszyk);

if (koszyk.length > 0) {
  wyswietlKoszyk()
}

function wyswietlKoszyk() {
  koszykDiv.innerHTML = ""
  var koszt = 0;
  for (numer in koszyk) {
    koszykDiv.innerHTML += `
    <div class="przedmiot">
      <div class="przedmiot-nazwa dark">Pizza ${koszyk[numer].pizza}, ${koszyk[numer].wielkosc} <button class="przedmiot-usun mniam3" onclick="usunZKoszyka(${numer})">X</button></div>
      <div class="przedmiot-opis darkAleMaly">${koszyk[numer].dodatki.join(', ')}</div>
      <div class="przedmiot-cena darkAleMaly">${koszyk[numer].cena}zł</div>
      
    </div>
  `
  koszt += koszyk[numer].cena
  }
  document.getElementById('koszyk-koszt').innerHTML = 'Razem: ' + koszt + 'zł';
}

function usunZKoszyka(numer) {
  koszyk.splice(numer, 1);
  sessionStorage.setItem("koszyk",JSON.stringify(koszyk));
  wyswietlKoszyk();
}

var buttonDodaj = document.getElementById("buttonDodaj");

function dodajDoKoszyka(){
  var rozmiarInputy = document.querySelector('input[name="rozmiar"]:checked');
  if (!rozmiarInputy) return;
  var rozmiar = rozmiarInputy.value;
  var rozmiarS;
  switch(rozmiar)
  {
    case "1":
      rozmiarS="Mała";
      break;
    case "2":
      rozmiarS="Średnia";
      break;
    case "3":
      rozmiarS="Duża";
      break; 

  }

  var options = document.querySelectorAll('#pizza option');
  var wybranapizza = Array.from(options).find((element) => {
    return element.value ==  pizzaselect.value;
  })
  var cena = wybranapizza.dataset.cena * rozmiar;
  var dodatki = [];
  if (czosnkowy.checked) {
    dodatki.push('Sos czosnkowy');
    cena += 1;
  }
  if (pomidorowy.checked) {
    dodatki.push('Sos pomidorowy');
    cena += 1;
  }
  if (piciu.checked) {
    dodatki.push('Piciu');
    cena += 5;
  }
  if (fryty.checked) {
    dodatki.push('Fryty');
    cena += 6;
  }
  
  koszyk.push({
    pizza: wybranapizza.value,
    wielkosc: rozmiarS,
    dodatki: dodatki,
    cena: cena,
  });
  
  sessionStorage.setItem("koszyk",JSON.stringify(koszyk));
  wyswietlKoszyk();
}



// DOSTAWA ==========================================
var zapiszBtn = document.getElementById('dostawa-zapisz')
var usunBtn = document.getElementById('dostawa-zapisz')

function zapiszDostawe() {
  var imienazwisko = document.getElementById('dostawa-imienazwisko').value;
  var telefon = document.getElementById('dostawa-telefon').value;
  var email = document.getElementById('dostawa-email').value;
  var ulica = document.getElementById('dostawa-ulica').value;
  var numerdomu = document.getElementById('dostawa-numerdomu').value;

  localStorage.setItem('dostawa', JSON.stringify({
    imienazwisko,
    telefon,
    email,
    ulica,
    numerdomu,
  }))
}

function wczytajDostawe() {
  var dostawa = JSON.parse(localStorage.getItem('dostawa'));
  if (!dostawa) return;
  var imienazwisko = document.getElementById('dostawa-imienazwisko').value = dostawa.imienazwisko;
  var telefon = document.getElementById('dostawa-telefon').value = dostawa.telefon;
  var email = document.getElementById('dostawa-email').value = dostawa.email;
  var ulica = document.getElementById('dostawa-ulica').value = dostawa.ulica;
  var numerdomu = document.getElementById('dostawa-numerdomu').value = dostawa.numerdomu;
}

wczytajDostawe();

function usunDostawe() {
  localStorage.removeItem('dostawa');
  document.getElementById('dostawa-imienazwisko').value = "";
  document.getElementById('dostawa-telefon').value = "";
  document.getElementById('dostawa-email').value = "";
  document.getElementById('dostawa-ulica').value = "";
  document.getElementById('dostawa-numerdomu').value = "";
}