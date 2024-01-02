<?php

if (strlen($code) === 11) {
    if ($code[0] >= 1 && $code[0] <= 6) {
        if (checkdate(substr($code, 3, 2), substr($code, 5, 2), substr($code, 1, 2))) {
            $s = $code[0] * 1 + $code[1] * 2 + $code[2] * 3 + $code[3] * 4 + $code[4] * 5 + $code[5] * 6 + $code[6] * 7 + $code[7] * 8 + $code[8] * 9 + $code[9] * 1;
            if ($s % 11 === 10) {
                $s = $code[0] * 3 + $code[1] * 4 + $code[2] * 5 + $code[3] * 6 + $code[4] * 7 + $code[5] * 8 + $code[6] * 9 + $code[7] * 1 + $code[8] * 2 + $code[9] * 3;
                if ($s % 11 === 10 && $s % 11 == $code[10]) {
                    return true;
                } elseif ($s % 11 == $code[10]) {
                    return true;
                }
            } elseif ($s % 11 == $code[10]) {
                return true;
            }
        }
    }
}
echo validPersonalCode('39210193817') ? 'teisingas' : 'neteisingas';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" value="<?= $code ?>">
    </form>
    
</body>
</html>