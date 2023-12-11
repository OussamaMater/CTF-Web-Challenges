<?php

error_reporting(0);

function isAdmin(int|string $id)
{
    $servername = "mysql";
    $username = "secret";
    $password = "secret";

    $conn = new PDO("mysql:host=$servername;dbname=chall", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    return !empty($rows);
}

if (!isset($_COOKIE['admin'])) {
    $data = ['user_id' => random_int(1, 1000)];
    $json = json_encode($data);
    $allowed = false;

    setcookie('admin', base64_encode($json), time() + (86400 * 300), '/');
}

if (isset($_COOKIE['admin'])) {
    $json = base64_decode($_COOKIE['admin']);
    $data = json_decode($json, true);

    if (isset($data['user_id'])) {
        $allowed = isAdmin($data['user_id']);
    } else {
        $allowed = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Interview</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 grid h-screen place-items-center">
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-white">
                Mission Critical
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 text-gray-400">
                You've landed here, so you're quite the skilled one, can you get the flag though? 😋.
            </p>
            <?php
            if ($allowed) {
            ?>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 text-gray-400">
                    securinets{chte-tsob-wta9es-mte-mhamsa}
                </p>
            <?php
            }
            ?>
        </div>
    </section>
</body>

</html>