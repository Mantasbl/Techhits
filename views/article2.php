
<html>

    <head>

        <Title> Tech Hits </Title>

        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <link href="css/articles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">

    </head>

    <body>

      <?php include('components/mainNavigation.php'); ?>

        <section class="articles">
            <h1 id="guardian">Languages</h1>
            <?php
            //Connection to the MySql

            //This database no longer exists
            //$link = mysqli_connect("localhost", "crxoksig_Mantasb", "Baltakis1", "crxoksig_languages");

            if (mysqli_connect_error())
            {
                die ("There was and Error connecting to the database");
            }

            // Creation of the Table that represents the data from MySql database
            // Every part of content has its own ROW instead of COLLUMN, as I could not create a loop that would let them be otherwise

            // Every single form and its inputs will be created INDIVIDUALLY as as far as I know, you cant create a Single query selection loop to retrieve data from many tables
            echo "<table>\n<tr>\n";

            $query = "SELECT Country FROM countries";

            echo "<td>Country </td>\n";
            if ($result = mysqli_query($link,$query)){
                while($row = mysqli_fetch_array($result)) {
                    echo "<td>" . $row[Country] . "</td>\n";

                }
            }
            echo "</tr>\n";
            echo "<tr>\n";

            $query = "SELECT ISO3Code FROM countries";

            echo "<td>ISO3Code </td>\n";
            if ($result = mysqli_query($link,$query)){
                while($row = mysqli_fetch_array($result)) {
                    echo "<td>" . $row[ISO3Code] . "</td>\n";

                }

            }
            echo "</tr>\n";
            echo "<tr>\n";
            $query = "SELECT Language FROM languages";

            echo "<td>Language </td>\n";
            if ($result = mysqli_query($link,$query)){
                while($row = mysqli_fetch_array($result)) {
                    echo "<td>" . $row[Language] . "</td>\n";

                }

            }
            echo "</tr>\n";
            echo "<tr>\n";
            $query = "SELECT LangAge FROM languageage";

            echo "<td>Language Age </td>\n";
            if ($result = mysqli_query($link,$query)){
                while($row = mysqli_fetch_array($result)) {
                    echo "<td>" . $row[LangAge] . "</td>\n";

                }

            }
            echo "</tr>\n";
            echo "<tr>\n";
            $query = "SELECT LangFam FROM languagefamily";

            echo "<td>Language Family </td>\n";
            if ($result = mysqli_query($link,$query)){
                while($row = mysqli_fetch_array($result)) {
                    echo "<td>" . $row[LangFam] . "</td>\n";

                }

            }
            echo "</tr>\n";
            echo "</table>\n";

            // Country and ISO3Code input form Validation and submission
            if (array_key_exists('country', $_POST) OR array_key_exists('ISO3Code',$_POST)){

                if ($_POST['country'] == '') {

                    echo "<p>Country is required</p>";
                }
                else if ($_POST['ISO3Code'] == ''){

                    echo "<p>ISO3Code is required</p>";
                }
                else {

                    $query = "SELECT `Country` FROM `countries` WHERE Country = '".mysqli_real_escape_string($link, $_POST['country'])."'";

                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0) {

                        echo "<p>That Country is already on the list </p>";
                    }

                    else {
                        $query = "INSERT INTO `countries` (`Country`, `ISO3Code`) VALUES ('".mysqli_real_escape_string($link, $_POST['country'])."', '".mysqli_real_escape_string($link, $_POST['ISO3Code'])."')";

                        if (mysqli_query($link, $query)){

                            echo "<p>Your Home country was successfully added</p>";

                            }
                        else{
                            echo "<p>Ok it wasnt</p>";
                            }
                        }
                        }
                }

            //Language Input form validation and submission
            if (array_key_exists('Language', $_POST)){

                if ($_POST['Language'] == '') {

                    echo "<p>Language is required</p>";
                }
                else {

                    $query = "SELECT `Language` FROM `languages` WHERE Language = '".mysqli_real_escape_string($link, $_POST['Language'])."'";

                    $result = mysqli_query($link, $query);

                    if (mysqli_num_rows($result) > 0) {

                        echo "<p>That Language is already on the list </p>";
                    }

                    else {
                        $query = "INSERT INTO `languages` (`Language`) VALUES ('".mysqli_real_escape_string($link, $_POST['Language'])."')";

                        if (mysqli_query($link, $query)){

                            echo "<p>Your Home country was successfully added</p>";

                            }
                        else{
                            echo "<p>Ok it wasnt</p>";
                            }
                        }
                        }
                }

            //Language Age input form validation and submission
            if (array_key_exists('LangAge', $_POST)){

                if ($_POST['LangAge'] == '') {

                    echo "<p>Language age is required</p>";
                }
                else {

                     $query = "INSERT INTO `languageage` (`LangAge`) VALUES ('".mysqli_real_escape_string($link, $_POST['LangAge'])."')";

                        if (mysqli_query($link, $query)){

                            echo "<p>Language Age was successfully added</p>";

                            }
                        else{
                            echo "<p>Ok it wasnt</p>";
                            }
                        }
                }

            //Language Family input form validation and submission
            if (array_key_exists('LangFam', $_POST)){

                if ($_POST['LangFam'] == '') {

                    echo "<p>Language family is required</p>";
                }
                else {

                     $query = "INSERT INTO `languagefamily` (`LangFam`) VALUES ('".mysqli_real_escape_string($link, $_POST['LangFam'])."')";

                        if (mysqli_query($link, $query)){

                            echo "<p>Language Family was successfully added</p>";

                            }
                        else{
                            echo "<p>Ok it wasnt</p>";
                            }
                        }
                }

            ?>

            <!-- Underneath are all of the Submit forms used as Inputs to MySql database -->
            <p> Here you can Add your home Country yourself</p>
            <form method = "post">

                <input name = "country" type = "text" placeholder = "Country">

                <input name = "ISO3Code" type = "text" placeholder = "ISO3Code">

                <input type = "submit" value = "Submit">

            </form>
            <form method = "post">

                <input name = "Language" type = "text" placeholder = "Language">

                <input type = "submit" value = "Submit">

            </form>
            <form method = "post">

                <input name = "LangAge" type = "text" placeholder = "Language Age">

                <input type = "submit" value = "Submit">

            </form>
            <form method = "post">

                <input name = "LangFam" type = "text" placeholder = "Language Family">


                <input type = "submit" value = "Submit">

            </form>

            <p><a href="../index.php">Back to homepage</a></p>
        </section>
    </body>

</html>
