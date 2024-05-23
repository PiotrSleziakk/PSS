<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
<head>
    <title>{$page_title|default:"Tytuł domyślny"}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
</head>
<body class="contact is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo">Minima_/Credic</h1>
            <nav id="nav">
                <ul>
                    <li><a href="#" class="button primary">FakeLogout</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <article id="main">

            <header class="special container">
                    <h2>kalkulator kredytowy</h2>
            </header>

            <!-- One -->
            <section class="wrapper style4 special container medium">

                 <!-- Content -->
                <div class="content">
                    {block name=content} Domyślna treść zawartości .... {/block}
                </div>

            </section>

        </article>

        <!-- Footer -->
        <footer id="footer">

            <ul class="icons">
                <li><a href="#" class="icon brands circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands circle fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands circle fa-google-plus-g"><span class="label">Google+</span></a></li>
                <li><a href="#" class="icon brands circle fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon brands circle fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>

        </footer>

        </div>

            <!-- Scripts -->
            <script src="<?php print(_APP_ROOT); ?>assets/js/jquery.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/jquery.dropotron.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/jquery.scrolly.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/jquery.scrollgress.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/jquery.scrollex.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/browser.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/breakpoints.min.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/util.js"></script>
            <script src="<?php print(_APP_ROOT); ?>assets/js/main.js"></script>

</body>
</html>