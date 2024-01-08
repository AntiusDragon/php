<?php
session_start();
require __DIR__ . '/registracija/presonalCode.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == 'prijungtas') {
    header('Location: ./index.php');
    die;
} // jei esu prisilogines, neleidzia eiti i login puslapi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loginOn = true;
    if ($_POST['password'] == '') {
        $_SESSION['errorPassword'] = 'Negali būti tuščias laukelis.';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if (!(5 < strlen($_POST['password']) && strlen($_POST['password']) < 41)) {
        $_SESSION['errorPassword'] = 'Slaptažodžio simbolių skaičius turi būti ne mažiau kaip 6, bet ne daugiau kaip 41.';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['errorPassword'] = 'Nesutampa kodai.';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if (substr($_POST['phone'], 0, 4) !== '+370') {
        $_SESSION['errorPhone'] = 'Teisingas telefono numerio formatas yra "+370".';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    } else {
        if (strlen($_POST['phone']) !== 12) {
            $_SESSION['errorPhone'] = 'Neteisingas telefono numerio formatas';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        }
    }
    
    if (preg_match('/^[A-Za-z\s]+$/', $_POST['firstName'])) {
        if ($_POST['firstName'] == '' || strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 40 ) {
            $_SESSION['errorFirstName'] = 'Blogai įrašėte savo vardą.';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        } 
    } else {
        $_SESSION['errorFirstName'] = "There must be only letters.";
    }

    if (preg_match('/^[A-Za-z\s]+$/', $_POST['lastName'])) {
        if ($_POST['lastName'] == '' || strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 40 ) {
            $_SESSION['errorLastName'] = 'Blogai įrašėte savo pavardę.';
            $_SESSION['old_data'] = $_POST;
            $loginOn = false;
        }
    } else {
        $_SESSION['errorLastName'] = "Turi būti tik raidės.";
    }
    if (!validPersonalCode($_POST['presonalCode'])) {
        $_SESSION['errorPresonalCode'] = 'Blogai įvedėte savo asmens kodą.';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }
    if ($_POST['email'] == '') {
        $_SESSION['errorEmail'] = 'Blogai įvedėte savo El. paštą.';
        $_SESSION['old_data'] = $_POST;
        $loginOn = false;
    }

    // require __DIR__ . '/registracija/vartotojoTikrinimas.php';
        // tikrinama ar yra toks vartotojas?
        $users = json_decode(file_get_contents(__DIR__.'/data/users.json'), true);
        // $users = unserialize($users);
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                $_SESSION['errorEmail'] = 'Toks elektroninis paštas egzistuoja.';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
            if ($user['presonalCode'] == $_POST['presonalCode']) {
                $_SESSION['errorPresonalCode'] = 'Toks asmens kodas egzistuoja.';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
            if ($user['phone'] == $_POST['phone']) {
                $_SESSION['errorPhone'] = 'Toks telefono numeris egzistuoja.';
                $_SESSION['old_data'] = $_POST;
                $loginOn = false;
            }
    
            if ($loginOn == false) {
                header('Location: ./register.php');
                die;
            }
        }
        $sukurtosSaskaitos = json_decode(file_get_contents(__DIR__ . '/data/saskaitos.json'), true);
        // $sukurtosSaskaitos = json_decode($sukurtosSaskaitos, true); // Konvertuojame eilutę į masyvą
        // require __DIR__ . '/registracija/registerChecking.php';
        // $bankoSaskaita1 = '';
        // $bankoSaskaita2 = '';
        $bankoSaskaita3 = '';
        $bankoSaskaita4 = '';
        $bankoSaskaita5 = '';
        $bankoSaskaita11 = 1;
        for ($i=0; $i < $bankoSaskaita11; $i++) { 
            // $bankoSaskaita6 = rand(10, 99);
            // $bankoSaskaita7 = rand(1000, 9999);
            $bankoSaskaita8 = rand(1000, 9999);
            $bankoSaskaita9 = rand(1000, 9999);
            $bankoSaskaita10 = rand(1000, 9999);
            foreach ($sukurtosSaskaitos as $sukurtaSaskaita) {
                $bankoSaskaita1 = $bankoSaskaita6;
                $bankoSaskaita2 = $bankoSaskaita7;
                $bankoSaskaita3 = $bankoSaskaita8;
                $bankoSaskaita4 = $bankoSaskaita9;
                $bankoSaskaita5 = $bankoSaskaita10;
                if ("LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5" == $sukurtaSaskaita['saskaita']) {
                    $bankoSaskaita11 = $i + 1;
                }
            }
        }
        $userId = '';
        $userIdFor = 1;
        for ($i=0; $i < $userIdFor; $i++) { 
            $userIdRand = rand(100000000, 999999999);
            foreach ($users as $user) {
                $userId = $userIdRand;
                if ($userIdRand == $user['userId']) {
                    $userIdFor = $i + 1;
                }
            }
        }
    
        $user = [
            'userId' => $userId,
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'presonalCode' => $_POST['presonalCode'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'user' => 'user',
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.json', json_encode($users, JSON_PRETTY_PRINT));
        // file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        $sukurtaSaskaita = [
                'userId' => $userId,
                "delete" => false,
                'saskaita' => "LT242024$bankoSaskaita3$bankoSaskaita4$bankoSaskaita5",
                'saskaitosLikutis' => 0,
                'rezervuota' => 0,
                'disponuojamasLikutis' => 0,
                'valiuta' => 'Eur',
        ];
        $sukurtosSaskaitos[] = $sukurtaSaskaita;
        file_put_contents(__DIR__."/data/saskaitos.json", json_encode($sukurtosSaskaitos, JSON_PRETTY_PRINT));
        echo "seeder started\n";
    //     $bankoSaskaitosSukurimas = [
    //         [
    //         'bankoSaskaita' => "LT$bankoSaskaita1 7044 0600 0772 $bankoSaskaita2",
    //         ],
    //    ];
       file_put_contents(__DIR__.'/data/users.json', json_encode($users, JSON_PRETTY_PRINT));
    //    file_put_contents(__DIR__.'/data/users.json', serialize($users));
       echo "seeder finished\n";
        header('Location: ./login.php');
        die;
    }
// Atciranda error pranešimas
$errorFields = ['error', 'errorFirstName', 'errorLastName', 'errorPresonalCode', 'errorPhone', 'errorEmail', 'errorPassword'];
foreach ($errorFields as $field) {
    if (isset($_SESSION[$field])) {
        ${$field} = $_SESSION[$field];
        unset($_SESSION[$field]);
    }
}
if (isset($_SESSION['old_data'])) {
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main class="main">
        <h1>Registracija</h1>

        <?php if (isset($error)): ?>
        <h2 style="color: red;"><?= $error ?></h2>
        <?php endif ?>

        <form action="" method="post" class="formaLoginRegister">
            <?php
                // $newAccInfoList = ['firstName', 'lastName', 'presonalCode', 'phone', 'email', 'password', 'password2'];
                $newAccInfoList = [
                    [
                        'typas' => 'text',
                        'name' => 'firstName',
                        'erroras' => 'errorFirstName',
                        'atvaizduojama' => 'Vardas',
                    ],
                    [
                        'typas' => 'text',
                        'name' => 'lastName',
                        'erroras' => 'errorLastName',
                        'atvaizduojama' => 'Pavardė',
                    ],
                    [
                        'typas' => 'number',
                        'name' => 'presonalCode',
                        'erroras' => 'errorPresonalCode',
                        'atvaizduojama' => 'Asmens kodas',
                    ],
                    [
                        'typas' => 'phone',
                        'name' => 'phone',
                        'erroras' => 'errorPhone',
                        'atvaizduojama' => 'Telefonas',
                    ],
                    [
                        'typas' => 'email',
                        'name' => 'email',
                        'erroras' => 'errorEmail',
                        'atvaizduojama' => 'El. paštas',
                    ],
                    [
                        'typas' => 'password',
                        'name' => 'password',
                        'erroras' => 'errorPassword',
                        'atvaizduojama' => 'Slaptažodis',
                    ],
                    [
                        'typas' => 'password',
                        'name' => 'password2',
                        'erroras' => 'errorPassword',
                        'atvaizduojama' => 'Pakartokite slaptažodį',
                    ]
                ];
                foreach ($newAccInfoList as $newAccInfo):
            ?>

                <input type="<?= $newAccInfo['typas'] ?>" name="<?= $newAccInfo['name'] ?>" placeholder="<?= $newAccInfo['atvaizduojama'] ?>"
                    value="<?= isset($old_data[$newAccInfo['name']]) ? $old_data[$newAccInfo['name']] : '' ?>">
                <?php if (isset(${$newAccInfo['erroras']})): ?>
                <p style="color: red;"><?= ${$newAccInfo['erroras']} ?></p>
                <?php endif ?>

            <?php endforeach ?>

            <button type="submit">Registruotis</button>

        </form>
        <a class="backMeniu" href="index.php">Grįžti į pagrindinį puslapį</a>
        <a class="backMeniu" href="login.php">Turiu paskyrą</a>
    </main>
</body>

</html>