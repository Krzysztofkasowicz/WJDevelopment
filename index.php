<?php
require_once 'header.php';
?>
<div class="my-slider">
    <div><img src="images/slider/1.jpg" /></div>
    <div><img src="images/slider/2.jpg" /></div>
</div>
<div class="slider-text">
    <div class="slider-header">
        <p>Nowoczesne domy blisko miasta</p>
        <p>Strzeszkowice Duże</p>
    </div>
    <div>
        <p>Powierzchnia domu 138m2</p>
        <p>Powierzchnia działki 700m2</p>
    </div>
</div>
<section class="about-company">
    <div>
        <div class="container">
            <h3>Wysoka jakość</h3>
            <p>Podczas budowy wykorzystywane są materiały najwyższej jakości. Inwestycja jest realizowana we współpracy
                z profesjonalną i doświadczoną firma budowlaną.</p>
        </div>
        <div class="container">
            <h3>Atrakcyjna cena</h3>
            <p>Domy oferowane są w przystępnej cenie dzięki czemu jest to idealna alternatywa dla mieszkania w
                Lublinie.</p>
        </div>
    </div>
    <div>
        <div class="container">
            <h3>Lokalizacja</h3>
            <p>Cicha, spokojna okolica oddalona tylko o 20 minut od centrum Lublina.</p>
        </div>
        <div class="container">
            <h3>Pewna inwestycja</h3>
            <p>Inwestor z polskim kapitałem z zapewnionymi środkami na całkowite ukończenie inwestycji.</p>
        </div>
    </div>

</section>
<section class="offer">
    <div class="container">
        <div>
            <h3>Nowe, wygodne domy mieszkalne</h3>
            <p>Rodzinny dom w zabudowie bliźniaczej z ciekawymi rozwiązaniami architektonicznymi. Nowoczesne wykończenie
                podkreśla niesamowitą stylistykę budynku. Słoneczny taras nad garażem oraz przestronny salon
                zapewnią domownikom relaks i wypoczynek każdego dnia.</p>
        </div>
        <img src="images/HomeKONCEPT_47_elewacja_frontowa.jpg" />
    </div>
    <div class="container reversed">
        <div>
            <h3>Nowoczesne wykończenie</h3>
            <p>Drewno, okładziny kamienne oraz tynk w stonowanym kolorze są atrakcyjnymi detalami architektonicznymi.
                Duże przeszklenia zapewniają bardzo dobrze doświetlają wnętrza łącząc wnętrza z otaczającym je
                ogrodem.</p>
        </div>
        <img src="images/HomeKONCEPT_47_elewacja_ogrodowa.jpg" />
    </div>
    <div class="container">
        <div>
            <h3>Lokalizacja</h3>
            <p>Wybranie odpowiedniej lokalizacji inwestycji jest sporym wyzwaniem dla inwestora. Postawiliśmy na
                niewielką odległość odległość od centrum umożliwiającą szybkie dotarcie do miasta łącząc to jednocześnie
                z ciszą i spokojem panującym w tej okolicy, który jest tak często poszukiwany przez osoby mieszkające w
                mieście.</p>
        </div>
        <iframe id="map"
            src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d1526.7508078621445!2d22.423535030417643!3d51.1497153179785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d51.149868399999995!2d22.423593999999998!5e1!3m2!1spl!2spl!4v1590575542976!5m2!1spl!2spl"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</section>
<script>
    var slider = tns({
        container: '.my-slider',
        "items": 1,
        "loop": true,
        "controls": false,
        "navPosition": "bottom",
        "navAsThumbnails": true,
        "autoplay": true,
        "speed": 2000,
        "autoplayButtonOutput": false
    });
    let sliderText = document.querySelector('.slider-text');
    if (window.innerWidth > 900) {
        sliderText.classList.add('active');
    } else 
    sliderText.classList.remove('active');
</script>
<?php
require_once "footer.php";
?>