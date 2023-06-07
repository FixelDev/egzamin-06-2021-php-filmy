<?php
    $conn = mysqli_connect('localhost', 'root', '', 'dane3');

    if(!empty($_POST['movie-id']))
    {
        $id = $_POST['movie-id'];
        $query = "DELETE FROM produkty WHERE id=$id";

        mysqli_query($conn, $query);
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styl3.css">
    <title>Video On Demand</title>
</head>
<body>
    <header>
        <section id="banner-left">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </section>

        <section id="banner-right">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </section>

    </header>

    <div class="clr"></div>

    <section id="list-recommended">
        <h3>Polecamy</h3>


        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');

            $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN(18, 22, 23, 25)";
            // $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 OR id=22 OR id=23 OR id=25"; xD

            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result))
            {
                $code=<<< TWOJA_DOWOLNA_NAZWA
                    <div class="movie-card">
                        <h4>$row[id]. $row[nazwa]</h4>
                        <img src=$row[zdjecie] alt="film"/>
                        <p>$row[opis]</p>
                    </div>
                TWOJA_DOWOLNA_NAZWA;

                echo $code;
            }

            mysqli_close($conn);
        ?>
        <div class="clr"></div>
    </section>

    <section id="list-fantasy">
        <h3>Filmy fantastyczne</h3>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane3');

            $query = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id=12";

            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result))
            {
                $code=<<< TWOJA_DOWOLNA_NAZWA
                    <div class="movie-card">
                        <h4>$row[id]. $row[nazwa]</h4>
                        <img src=$row[zdjecie] alt="film"/>
                        <p>$row[opis]</p>
                    </div>
                TWOJA_DOWOLNA_NAZWA;

                echo $code;
            }

            mysqli_close($conn);
        ?>
        <div class="clr"></div>
    </section>

    <footer>
        <form action="video.php" method="POST">
            Usuń film nr.:
            <input type="number" name="movie-id">
            <input type="submit" value="Usuń film">
        </form>

        <p>Stronę wykonał: Franciszek Pawłowski</p>

        
    </footer>
    
</body>
</html>