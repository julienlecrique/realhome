// On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 48.10568;
var lon = -1.67839;
var macarte = null;

// Fonction d'initialisation de la carte
function initMap() {
    // Nous définissons le dossier qui contiendra les marqueurs
    var iconBase = 'http://localhost:8888/dcdev/www.realhome.com/wp-content/themes/realhome/images/pin.png';
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 16);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
    var myIcon = L.icon({
        iconUrl: iconBase,
        iconSize: [120, 80],
        iconAnchor: [25, 50],
        popupAnchor: [-3, -76],
    });            var marker = L.marker([lat, lon],{ icon: myIcon }).addTo(macarte);

}
window.onload = function(){
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();

};


// Wrap every letter in a span
$('.ml14 .letters').each(function(){
    $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
    .add({
        targets: '.ml14 .line',
        scaleX: [0,1],
        opacity: [0.5,1],
        easing: "easeInOutExpo",
        duration: 900
    }).add({
    targets: '.ml14 .letter',
    opacity: [0,1],
    translateX: [40,0],
    translateZ: 0,
    scaleX: [0.3, 1],
    easing: "easeOutExpo",
    duration: 800,
    offset: '-=600',
    delay: function(el, i) {
        return 150 + 25 * i;
    }
}).add({
    targets: '.ml14',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
});