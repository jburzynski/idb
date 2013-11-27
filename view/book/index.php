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
                </div>
            </nav>
        </header>
        <div role=\"main\" class=\"container top-spaced\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Książka <a class=\"btn btn-default btn-sm pull-right\" style=\"margin-top: -5px;\" href=\"$base/index.php/login/logout\">Wyloguj ($login)</a></h4>
                </div>
                <div class=\"panel-body\">
                    <div class=\"col-lg-6\">
                        <h4 style=\"margin-bottom: 10px;\">Dane książki <a class=\"btn btn-default btn-sm\" href=\"$base/index.php/book/{$book['id']}/addToCart\">Dodaj do koszyka</a></h4>
                        <table class=\"table\">
                            <tbody>";
                                echo "
									<tr>
										<td>Id:</td>
										<td>{$book['id']}</td>
									</tr>
									<tr>
										<td>Autor:</td>
										<td>{$book['author']}</td>
									</tr>
									<tr>
										<td>Tytuł:</td>
										<td>{$book['title']}</td>
									</tr>
									<tr>
										<td>Opis:</td>
										<td>{$book['description']}</td>
									</tr>
									<tr>
										<td>Cena:</td>
										<td>{$book['price']}</td>
									</tr>
									<tr>
										<td>Dostępność:</td>
										<td>{$book['available_amount']}</td>
									</tr>
									<tr>
										<td>Stan:</td>
										<td>{$book['state']}</td>
									</tr>";
                            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>";