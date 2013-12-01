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
            <nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
                <div class=\"container\">
                    <div class=\"navbar-header\">
                        <a class=\"navbar-brand\" href=\"$base\">Księgarnia</a>
                    </div>
                    <ul class=\"nav navbar-nav\">
                        <li><a href=\"$base/index.php/categories\">Kategorie</a></li>
                        <li><a href=\"$base/index.php/profile\">Profil użytkownika</a></li>
                    </ul>
					<a class=\"btn btn-primary pull-right\" href=\"$base/index.php/cart\">Koszyk</a>
                </div>
            </nav>
        </header>
        <div role=\"main\" class=\"container top-spaced\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Nowy adres</h4>
                </div>
                <div class=\"panel-body\">
                    <form role=\"form\" class=\"form-horizontal\" style=\"width: 500px;\" action=\"$action\" method=\"post\">
                        <div class=\"form-group\">
                            <label for=\"street\" class=\"col-lg-3 control-label\">Ulica</label>
                            <div class=\"col-lg-9\">
                                <input id=\"street\" type=\"text\" name=\"address[street]\" value=\"{$address['street']}\" required=\"required\" class=\"form-control\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"street_number\" class=\"col-lg-3 control-label\">Numer ulicy</label>
                            <div class=\"col-lg-9\">
                                <input id=\"street_number\" type=\"text\" name=\"address[street_number]\" value=\"{$address['street_number']}\" required=\"required\" class=\"form-control\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"city\" class=\"col-lg-3 control-label\">Miasto</label>
                            <div class=\"col-lg-9\">
                                <input id=\"city\" type=\"text\" name=\"address[city]\" value=\"{$address['city']}\" required=\"required\" class=\"form-control\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"postal_code\" required=\"required\" class=\"col-lg-3 control-label\">Kod pocztowy</label>
                            <div class=\"col-lg-9\">
                                <input id=\"postal_code\" type=\"text\" name=\"address[postal_code]\" value=\"{$address['postal_code']}\" required=\"required\" class=\"form-control\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <div class=\"col-lg-3\"></div>
                            <div class=\"col-lg-9\">
                                <button id=\"submit\" type=\"submit\" class=\"btn btn-default\">Wyślij</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>";