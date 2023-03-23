<?php

if (!isset($_COOKIE['admin'])) {
    $data = array('admin' => false);
    $json = json_encode($data);
    $allowed = false;

    setcookie('admin', base64_encode($json), time() + (86400 * 300), '/');
}

if (isset($_COOKIE['admin'])) {
    $json = base64_decode($_COOKIE['admin']);
    $data = json_decode($json, true);
    if (isset($data['admin']) && $data['admin'] === true) {
        $allowed = true;
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
                This page has a vulnerability, get the flag and submit it to schedule an interview.
            </p>
            <?php
            if ($allowed) {
            ?>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 text-gray-400">
                    securinets{well-guess-who-secured-an-interview-congrats-boi-!!!}
                </p>
            <?php
            }
            ?>
        </div>
    </section>
</body>

</html>