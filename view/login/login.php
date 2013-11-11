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
            <nav class=\"navbar navbar-default\" role=\"navigation\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <a class=\"navbar-brand\" href=\"#\">Księgarnia</a>
                    </div>
                    <div class=\"collapse navbar-collapse\">
                        <ul class=\"nav navbar-nav\">
                            <li>Kategorie</li>
                            <li>Profil użytkownika</li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div role=\"main\" class=\"container top-spaced\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Login</h4>
                </div>
                <div class=\"panel-body\">
                    <form class=\"form-horizontal\" action=\"$base/index.php/login\" method=\"post\">
                        <div class=\"form-group\">
                            <label for=\"login\">Login</label>
                            <input class=\"form-control\" type=\"text\" name=\"login\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"password\">Hasło</label>
                            <input class=\"form-control\" type=\"password\" name=\"password\">
                        </div>
                        <button class=\"btn btn-default\" type=\"submit\">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>";
