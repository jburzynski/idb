echo "<html>
    <head>
        <meta charset=\"utf-8\">
        <title>Księgarnia internetowa</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"$base/assets/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"$base/assets/css/style.css\">
        <script type=\"text/javascript\" src=\"$base/assets/js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"$base/assets/js/bootstrap.min.js\"></script>
    </head>
    <body>
        <header class=\"header\">
            <div class=\"navbar navbar-fixed-top\">
                <div class=\"navbar-inner\">
                    <div class=\"container\">
                        <a class=\"navbar-brand\" href=\"#\">Księgarnia</a>
                        <ul class=\"nav\">
                            <li>Kategorie</li>
                            <li>Profil użytkownika</li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div role=\"main\" class=\"container\">
            $content
        </div>
    </body>
</html>";