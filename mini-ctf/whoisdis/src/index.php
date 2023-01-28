<?php

error_reporting(0);

$output = null;
$host_regex = "/^[0-9a-zA-Z][0-9a-zA-Z\.-]+$/";
$query_regex = "/^[0-9a-zA-Z\. ]+$/";

if (
  isset($_GET['query']) && isset($_GET['host']) &&
  is_string($_GET['query']) && is_string($_GET['host'])
) {

  $query = $_GET['query'];
  $host  = $_GET['host'];

  if (!preg_match($host_regex, $host) || !preg_match($query_regex, $query)) {
    $output = "Invalid query or whois host.";
  } else {
    $output = shell_exec("/usr/bin/whois -h ${host} ${query}");
  }
} else {
  $output = "host and query are required.";
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Whois Dis?</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/5.1.0/github-markdown.min.css" integrity="sha512-KUoB3bZ1XRBYj1QcH4BHCQjurAZnCO3WdrswyLDtp7BMwCw7dPZngSLqILf68SGgvnWHTD5pPaYrXi6wiRJ65g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="dark dark:bg-gray-900">
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">
          Let's check a server?
        </h2>
        <form action="">
          <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            You can pick one of these
          </label>
          <select id="servers" name="host" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="whois.verisign-grs.com">whois.verisign-grs.com</option>
            <option value="whois.ripe.net">whois.ripe.net</option>
            <option value="whois.arin.net">whois.networksolutions.com</option>
          </select>
          <div class="mb-6 mt-4">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default
              Query
            </label>
            <input type="text" id="default-input" name="query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 mt-5">
              <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Query the server
              </span>
            </button>
          </div>
        </form>
        <div class="dark:bg-gray-800 dark:border-gray-700 rounded-lg shadow-md border border-gray-200">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
            Output
          </h5>
          <hr class="my-3 h-px border-0 dark:bg-gray-700">
          <pre class="font-normal text-gray-700 dark:text-gray-400">
            <? echo $output ?: "No results"; ?>
          </pre>
        </div>
      </div>

    </div>

  </section>

  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>