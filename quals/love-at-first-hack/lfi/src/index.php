<?php
error_reporting(0);
ini_set('display_errors', 0);

if (isset($_GET['lang'])) {
    $language = $_GET['lang'];
    if ($language == "en") {
        $file = "en.php";
    }

    if ($language == "fr") {
        $file = "fr.php";
    }

    if (preg_match('/^\.\/languages\/.+$/', $language)) {
        $file = $language;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Love at First Hack</title>
</head>

<body class="bg-white dark:bg-gray-900">
    <section>
        <div class="py-6 px-2 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
            <h2 class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-5xl xl:text-6xl dark:text-white">
                <?php echo ($_GET["lang"] == "fr")
                    ? "Version Française 🗼🥐"
                    : (($_GET["lang"] == "en") ? "English Version 💂🍵" : "🤬🤬🤬"); ?>
            </h2>
            <?php
            if (isset($_GET['lang']) && in_array($_GET['lang'], ['fr', 'en'])) {
            ?>
                <div class="p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                    <?php echo ($_GET["lang"] == "fr")
                        ? "Présentée par le seul et unique, ChatGPT."
                        : "Brought to you by the one and only, ChatGPT" ?>
                </div>
            <?php
            } else {
            ?>
                <canvas id="canvas"></canvas>
                <div class="p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                    yaaaaaa wdy fesh taml?? ridh khalina shab...
                </div>
            <?php
            }
            ?>
            <p class="font-light text-left text-gray-500 md:text-lg xl:text-xl dark:text-gray-400">
                <?php include($file); ?>
            </p>
        </div>
    </section>
    <style>
        canvas {
            position: fixed;
            width: 100vw;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 4;
            pointer-events: none;
        }
    </style>

    <script src="config.js"></script>
    <script src="app.js"></script>
</body>

</html>