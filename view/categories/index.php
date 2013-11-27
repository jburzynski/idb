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
                    <h4>Kategorie<a class=\"btn btn-default btn-sm pull-right\" style=\"margin-top: -5px;\" href=\"$base/index.php/login/logout\">Wyloguj ($login)</a></h4>
                </div>
                <div class=\"panel-body\">
                    <table class=\"table table-hover table-condensed\">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>State</th>
						</tr>";
					foreach ($categoryList as $category)
					{
						echo "
						<tr>
						  <td>" . $category["id"] . "</td>
						  <td><a href=\"./categories/" . $category["id"] . "/showCategory" . "\">" . $category["name"] . "</td>
						  <td>" . $category["state"] . "</td>
						</tr>";
					}
echo				"</table>
                </div>
            </div>
        </div>
    </body>
</html>";