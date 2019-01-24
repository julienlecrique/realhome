<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<? bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin="" />
    <link rel="stylesheet" href="owl.carousel.min.js" />

    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <script type="text/javascript">
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
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>


<body <?php body_class();?>>

<header>
    <div class="header-menu">

    <a href="<?php echo site_url() ;?>"><img class="header-menu-logo" src="<?php echo bloginfo('template_url'); ?>/images/images-home/logo-1.png" alt="Logo"></a>
        <div class="header-menu-menuprincipal"><?php wp_nav_menu(array( 'theme_location' => 'menu-principal', 'container' => 'nav')); ?></div>
    <div class="header-menu-menusecondaire"><?php wp_nav_menu(array( 'theme_location' => 'menu-secondaire', 'container' => 'nav')); ?></div>
    </div>



</header>
