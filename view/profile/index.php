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
                    <h4>Profil użytkownika <a class=\"btn btn-default btn-sm pull-right\" style=\"margin-top: -5px;\" href=\"$base/index.php/login/logout\">Wyloguj ($login)</a></h4>
                </div>
                <div class=\"panel-body\">
                    <div class=\"col-lg-6\">
                        <h4 style=\"margin-bottom: 10px;\">Zamówienia</h4>
                            <ul style=\"width: 400px;\">";
                            foreach ($orders as $order) {
                                echo "<li style=\"font-weight: bold;\">{$order['amount']} PLN <a class=\"glyphicon glyphicon-remove\" href=\"$base/index.php/profile/{$order['id']}/order_delete\"></a><span class=\"pull-right\">{$order['created']}</span></li>";
                                echo "<ul>";
                                foreach ($order['books'] as $book) {
                                    echo "<li>&quot;{$book['title']}&quot;<span class=\"pull-right\">{$book['amount']} x {$book['price']} PLN</span></li>";
                                }
                                echo "</ul>";
                            }
                            echo "</ul>
                    </div>
                    <div class=\"col-lg-6\">
                        <h4 style=\"margin-bottom: 10px;\">Adresy <a class=\"btn btn-default btn-sm\" href=\"$base/index.php/profile/address_new\">Nowy</a></h4>
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ulica</th>
                                    <th>Miasto</th>
                                    <th>Kod pocztowy</th>
                                    <th>Akcja</th>
                                </tr>
                            </thead>
                            <tbody>";
                                foreach ($addresses as $address) {
                                    echo "<tr>";
                                        echo "<td>{$address['id']}</td><td>{$address['street']} {$address['street_number']}</td><td>{$address['city']}</td><td>{$address['postal_code']}</td><td><a class=\"glyphicon glyphicon-edit\" href=\"$base/index.php/profile/{$address['id']}/address_edit\"></a> <a class=\"glyphicon glyphicon-remove\" href=\"$base/index.php/profile/{$address['id']}/address_delete\"></a></td>";
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