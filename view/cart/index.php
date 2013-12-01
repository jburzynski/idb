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
                    <h4>Koszyk <a class=\"btn btn-default btn-sm pull-right\" style=\"margin-top: -5px;\" href=\"$base/index.php/login/logout\">Wyloguj ($login)</a></h4>
                </div>
                <div class=\"panel-body\">
                    <div class=\"col-lg-6\">
                        <h4 style=\"margin-bottom: 10px;\">Książki</h4>
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Autor</th>
                                    <th>Tytuł</th>
                                    <th>Cena</th>
									<th>Dostępność</th>
                                </tr>
                            </thead>
                            <tbody>";
								foreach ($cart as $book) {
                                    echo "<tr>";
                                        echo "<td>{$book['id']}</td>
										<td>{$book['author']} {$book['title']}</td>
										<td>{$book['title']} {$book['title']}</td>
										<td>{$book['price']}</td>
										<td>{$book['available_amount']}</td>
										<td><a class=\"glyphicon glyphicon-remove\" href=\"$base/index.php/cart/{$book['id']}/delete_from_cart\"></a></td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>";