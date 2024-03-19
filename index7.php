<?php
    require 'modules/components.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rezervare</title>
    <link rel="icon" href="images/icon.png" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://kit.fontawesome.com/9c1aa2dd0d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="myForm">
        <h1>Rezervare locuri</h1>
        <form action="index7.php" autocomplete="off" method="post">
            <div class="container">
                *<input type="text" placeholder="Numele" name="name" class="half" value="<?php if(!empty($_POST['name'])) { echo $name; } ?>" />
                *<input type="text" placeholder="Prenumele" name="surname" class="half" value="<?php if(!empty($_POST['surname'])) { echo $surname; } ?>" />
                *<input type="text" placeholder="Număr telefon" name="phone" class="half" value="<?php if(!empty($_POST['phone'])) { echo $phone; } ?>" />
                *<input type="email" placeholder="Adresa electronică" name="email" class="half" value="<?php if(!empty($_POST['email'])) { echo $email; } ?>" />
                <div class="group">
                    <label>Data venirii *<input type="date" name="int_date" value="<?php if(!empty($_POST['int_date'])) { echo $int_date; } ?>" /></label>
                </div>
                <div class="group">
                    <label>Data plecării *<input type="date" name="exit_date" value="<?php if(!empty($_POST['exit_date'])) { echo $exit_name; } ?>" /></label>
                </div>
                <div class="group">
                    <label>Număr persoane *<input type="number" value="1" min="1" max="5" name="nmbr" value="<?php if(!empty($_POST['nmbr'])) { echo $nmbr; } ?>" /></label>
                </div>
                <div class="group">
                    <label>Tip cameră
                        *<select name="type">
                            <option value="lux">Lux</option>
                            <option value="econom">Econom</option>
                            <option value="apartament">Apartament</option>
                        </select>
                    </label>
                </div>
            </div>
            <textarea placeholder="Observații și doleanțe" rows="5" name="obs"><?php if(!empty($_POST['obs'])) { echo $obs; } ?></textarea>
            <div class="btn_container">
                <input type="submit" value="Salvează" name="ok" />
            </div>
            <span class="error" style="color: coral; font-size: 0.7em;">
                <?php 
                    echo insertData( $file_data);
                ?>
            </span>
        </form>
    </div>
</body>
</html>