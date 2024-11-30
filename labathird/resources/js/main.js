import '../sass/styles.scss';

import * as bootstrap from 'bootstrap';
import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'


const modalData = [
    { 
      title: 'Аренсибия, Вальтер', 
      content: 'Вальтер Аренсибия Родригес (исп. Walter Arencibia Rodríguez; род. 21 июля 1967, Ольгин) — кубинский шахматист, <button type="button" class="btn btn-secondary btn-sm p-0" data-bs-toggle="popover" data-bs-content="Гроссмейстер — это титул, присуждаемый лучшим шахматистам.">гроссмейстер</button> (1990). Чемпион мира среди юниоров (1986). Двукратный чемпион Кубы (1986 и 1990). В составе сборной Кубы участник 9-и Олимпиад (1986, 1990, 1994—2006) и 4-х командных чемпионатов мира (1993—2005).', 
      img: 'https://upload.wikimedia.org/wikipedia/commons/8/8d/Arencibia%2CWalter_1998_Recklinghausen.jpeg',
      popoverText: 'Гроссмейстер — это титул, присуждаемый лучшим шахматистам.'
    },
    { 
      title: 'Абасов, Ниджат Азад оглы', 
      content: 'Ниджа́т Азад оглы Аба́сов (азерб. Nicat Azad oğlu Abbasov, род. 14 мая 1995, Баку) — азербайджанский шахматист, <button type="button" class="btn btn-secondary btn-sm p-0" data-bs-toggle="popover" data-bs-content="Гроссмейстер — это титул, присуждаемый лучшим шахматистам.">гроссмейстер</button> (2011). Чемпион Азербайджана по шахматам 2017 года. Впервые одержал победу на турнире в Тбилиси в 2007 году. В 2009 году выполнил норму международного мастера. В 2011 году получил звание гроссмейстера. Занял четвёртое место на Кубке мира по шахматам 2023. В результате отказа Магнуса Карлсена, победившего на Кубке, примет участие на турнире претендентов по шахматам 2024.', 
      img: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/NijatAbasov23a.jpg/800px-NijatAbasov23a.jpg',
      popoverText: 'Гроссмейстер — это титул, присуждаемый лучшим шахматистам.'
    },
    { 
      title: 'Алонсо Росель, Альвар', 
      content: 'Альвар Алонсо Росель (исп. Alvar Alonso Rosell; 13 сентября 1992, Фигерас, Каталония) — испанский шахматист, <button type="button" class="btn btn-secondary btn-sm p-0" data-bs-toggle="popover" data-bs-content="Гроссмейстер — это титул, присуждаемый лучшим шахматистам.">гроссмейстер</button> (2013). Чемпион Испании (2011). В начале карьеры неоднократно становился чемпионом Испании в разных возрастных категориях: до 12 лет (2004), до 14 лет (2006) и до 18 лет (2009). В 2011 году, будучи международным мастером, разделил с гроссмейстером Мигелем Ильескасом первое место в национальном чемпионате Испании и завоевал чемпионское звание по лучшим дополнительным показателям. В том же году занял второе место в чемпионате Каталонии, а в 2014 и 2016 годах завоёвывал в этом турнире чемпионское звание.', 
      img: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Alvar_Alonso_Rosell_2012.jpg/1920px-Alvar_Alonso_Rosell_2012.jpg',
      popoverText: 'Гроссмейстер — это титул, присуждаемый лучшим шахматистам.'
    },
    { 
      title: 'Абдрлауф, Эльхам', 
      content: 'Эльха́м Абдрлауф (норв. Elham Abdrlauf; также Эльха́м Ама́р (норв. Elham Amar); род. 2 января 2005) — норвежский шахматист, <button type="button" class="btn btn-secondary btn-sm p-0" data-bs-toggle="popover" data-bs-content="Гроссмейстер — это титул, присуждаемый лучшим шахматистам.">гроссмейстер</button> (2024). Бронзовый призёр чемпионата Норвегии (2023).', 
      img: 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/GM_Elham_Amar.jpg/400px-GM_Elham_Amar.jpg',
      popoverText: 'Гроссмейстер — это титул, присуждаемый лучшим шахматистам.'
    },
    { 
      title: 'Башкаран Адхибан', 
      content: 'Башкаран Адхибан (там. அதிபன் பாசுகரன்; род. 15 августа 1992, Нагапаттинам) — индийский шахматист. Звание <button type="button" class="btn btn-secondary btn-sm p-0" data-bs-toggle="popover" data-bs-content="Гроссмейстер — это титул, присуждаемый лучшим шахматистам.">гроссмейстер</button> получил в 18 лет (2010). Чемпион Индии (2009). В составе сборной Индии участник 39-й Олимпиады (2010) в Ханты-Мансийске и 7-го командного чемпионата мира (2010) в Бурсе. Бронзовый призёр Азиатских игр 2010 в составе сборной Индии.', 
      img: 'https://upload.wikimedia.org/wikipedia/commons/2/22/Adhiban_at_2013_World_Chess_Cup.png',
      popoverText: 'Гроссмейстер — это титул, присуждаемый лучшим шахматистам.'
    }
];

let currentIndex = 0; 
function updateModal(index) {
    document.getElementById('modalLabel').innerText = modalData[index].title;
    document.getElementById('modalProfileImg').src = modalData[index].img;
    document.getElementById('modalContent').innerHTML = modalData[index].content;
    
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
}

const modalElement = new bootstrap.Modal(document.getElementById('dynamicModal'));

document.querySelectorAll('.modal-button').forEach(button => {
    button.addEventListener('click', function() {
        const index = this.getAttribute('data-index');
        currentIndex = parseInt(index); 
        updateModal(currentIndex);
        modalElement.show();
    });
});


document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowRight') {
        currentIndex = (currentIndex + 1) % modalData.length;
        updateModal(currentIndex); 
    } else if (event.key === 'ArrowLeft') {
        currentIndex = (currentIndex - 1 + modalData.length) % modalData.length; 
        updateModal(currentIndex); 
    }
});


const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}