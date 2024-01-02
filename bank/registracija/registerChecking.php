<?php

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginOn = true;
    if ($_POST['password'] == '') {
        $_SESSION['errorPassword'] = 'Passwords error';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if (!(5 < strlen($_POST['password']) && strlen($_POST['password']) < 41)) {
        $_SESSION['errorPassword'] = 'Passwords simbol min 6, max 41';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['errorPassword'] = 'Passwords do not match';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if (substr($_POST['phone'], 0, 4) !== '+370') {
        $_SESSION['errorPhone'] = 'Invalid phone number format "+370"';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else {
        if (strlen($_POST['phone']) !== 12) {
            $_SESSION['errorPhone'] = 'Invalid phone number format';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        }
    }
    if ($_POST['firstName'] == '' || strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 40 ) {
        $_SESSION['errorFirstName'] = 'errorFirstName';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    if ($_POST['lastName'] == '' || strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 40 ) {
        $_SESSION['errorLastName'] = 'error LastName';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 

    // function tikAngliskosRaides($tekstas) {
    //     return preg_match('/^[A-Za-z\s]+$/', $tekstas);
    // }
    // $tekstas = "Here is some English text";
    // if (tikAngliskosRaides($tekstas)) {
    //     echo "Tekstas yra sudarytas tik iš anglų raidžių.";
    // } else {
    //     echo "Tekstas neturi tik angliškų raidžių arba tarpų.";
    // }

    if ($_POST['presonalCode'] == '' || strlen($_POST['presonalCode']) !== 11 ) {
        $_SESSION['errorPresonalCode'] = 'error PresonalCode';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } 
    if ($_POST['email'] == '') {
        $_SESSION['errorEmail'] = 'errorEmail';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if ($loginOn == false) {
        header('Location: http://localhost/php/bank/register.php');
        // exit;
    }
    // tikrinama ar yra toks vartotojas?
    $users = file_get_contents(__DIR__.'/data/users.ser');
    $users = unserialize($users);
    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            $_SESSION['errorEmail'] = 'User with this email already exists';
            $_SESSION['old_data'] = $_POST;
        }
        if ($user['presonalCode'] == $_POST['presonalCode']) {
            $_SESSION['errorPresonalCode'] = 'Error presonalCode';
            $_SESSION['old_data'] = $_POST;
        }
        if ($user['phone'] == $_POST['phone']) {
            $_SESSION['errorPhone'] = 'Phone with this exists';
            $_SESSION['old_data'] = $_POST;
        }

        if ($loginOn == false) {
            header('Location: http://localhost/php/bank/register.php');
            die;
        }
        require __DIR__ . '/registracija/bankoSaskaitos.php';
        require __DIR__ . '/registracija/vartotojoId.php';

        $user = [
            'userId' => $userId,
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'presonalCode' => $_POST['presonalCode'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'bankoSaskaita' => "LT$bankoSaskaita1$bankoSaskaita2$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5",
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        $saskaitosSukurimas = [
            [
                'saskaita' => "LT$bankoSaskaita1 $bankoSaskaita2 $bankoSaskaita3 $bankoSaskaita4 $bankoSaskaita5",
                'saskaitosLikutis' => 1000,
                'rezervuota' => 0,
                'disponuojamasLikutis' => 1000,
                'valiuta' => 'Eur',
            ],
        ];
        file_put_contents(__DIR__."/data/saskaitos/$userId.json", json_encode($saskaitosSukurimas, JSON_PRETTY_PRINT));
        echo "seeder started\n";
    //     $bankoSaskaitosSukurimas = [
    //         [
    //         'bankoSaskaita' => "LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2",
    //         ],
    //    ];
       file_put_contents(__DIR__.'/data/users.ser', serialize($users));
       echo "seeder finished\n";
        header('Location: http://localhost/php/bank/login.php');
        die;
    }
// }