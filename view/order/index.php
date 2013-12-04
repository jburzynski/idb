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
					<a class=\"btn btn-primary pull-right\" style=\"margin-top: 10px;\" href=\"$base/index.php/cart\">Koszyk</a>
                </div>
            </nav>
        </header>
        <div role=\"main\" class=\"container top-spaced\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4>Zamówienie <a class=\"btn btn-default btn-sm pull-right\" style=\"margin-top: -5px;\" href=\"$base/index.php/login/logout\">Wyloguj ($login)</a></h4>
                </div>
                <div class=\"panel-body\">
                    <div class=\"col-lg-6\">
                        <h4 style=\"margin-bottom: 10px;\">Potwierdzenie złożenia zamówienia</h4>
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
										<td>{$book['available_amount']}</td>";
                                    echo "</tr>";
                                }
                            echo "</tbody>
                        </table>
						<form role=\"form\" class=\"form-horizontal\" style=\"width: 500px;\" action=\"$action\" method=\"post\">
							<div class=\"form-group\">
								<label for=\"select_address\" class=\"col-sm-2\">Adres:</label>
								<select name=\"select_address\">";						
								foreach ($addressList as $address) {
									echo "<option value=\"{$address['id']}\">{$address['street']} {$address['street_number']} {$address['city']} {$address['postal_code']}</option>";
								}
								echo "</select>
							</div>
							<button name=\"submit\" type=\"submit\" class=\"btn btn-success pull-right\">Potwierdź</button>
						</form>						
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>";