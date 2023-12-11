<?php

error_reporting(0);

$output = null;

$banned = [
    '127.0.0.1',
    'localhost',
    '0.0.0.0',
    '::1',
    '[::]',
    '127.0.1.3',
    '127.0.1.1',
    '0',
    '127.1',
    '127.0.1',
];

if (isset($_GET['host']) && is_string($_GET['host']) && preg_match('/^(https?:\/\/)?([a-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $_GET['host'])) {
    $hostname = getHostByName($_GET['host']);

    if (in_array($hostname, $banned) || $hostname === $_GET['host']) {
        $output = "Are you for real man?";
    } else {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $_GET['host']);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);

        if ($output === false) {
            $output = "Sorry, timed out!";
        } else if (strpos($output, 'amFkIGFsaWsgeGQ/IHkgcmFhd2FhYWg=') !== false) {
            $output = "securinets{atouni_e_diplome_rani_kbert_3la_tps_w_ri9_el_bered}";
        }
        curl_close($ch);
    }
} else {
    $output = "Give a URL first.";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Daa Crawler</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</head>
<!-- amFkIGFsaWsgeGQ/IHkgcmFhd2FhYWg= -->

<body class="dark dark:bg-gray-900">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xxl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">
                    Sit Down, We Will Crawl it!
                </h2>
                <form action="">
                    <div class="mb-6 mt-4">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Website URL
                        </label>
                        <input type="text" id="default-input" name="host" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 mt-5">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Visit
                            </span>
                        </button>
                    </div>
                </form>
                <div class="dark:bg-gray-800 dark:border-gray-700 rounded-lg shadow-md border border-gray-200">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                        Output
                    </h5>
                    <hr class="my-3 h-px border-0 dark:bg-gray-700">
                    <div class="rounded-lg overflow-hidden">
                        <pre class="font-normal text-gray-700 dark:text-gray-400">
                            <code class="language-html"><?php echo !empty($output) ? htmlspecialchars($output) : "No results"; ?></code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>