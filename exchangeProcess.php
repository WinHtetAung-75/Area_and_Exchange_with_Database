<?php include("./template/header.php") ?>
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="./exchange.php" class="inline-flex gap-2 items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                </svg>
                Exchange Calculator
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="#" class="ms-1 text-sm font-medium text-gray-700  md:ms-2 dark:text-gray-400 dark:hover:text-white">Exchange Result</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
            </div>
        </li>
    </ol>
</nav>
<?php 
    $amount = $_POST["amount"];

    $from_currency = $_POST["from_currency"];
    $to_currency = $_POST["to_currency"];

    // var_dump($from_currency);
    // print_r($to_currency);

    $from_c_arr = explode("-",$from_currency);
    $to_c_arr = explode("-",$to_currency);

    // print_r($from_c_arr);

    $from_c_name = $from_c_arr[0];
    $to_c_name = $to_c_arr[0];

    $from_c_rate = $from_c_arr[1];
    $to_c_rate = $to_c_arr[1];

    // print_r($from_c_rate);
    // echo "<br>";

    $from_rate = (int) str_replace(",","",$from_c_rate);
    $to_rate = (int) str_replace(",","",$to_c_rate);

    // print_r($from_rate);

    $mmk = $amount * $from_rate;
    $to = $mmk / $to_rate;

    $result = round($to,2);
    // print_r($result);

    //connect 
    $connect = mysqli_connect("localhost","wha","asdf","wad_test");

    //sql statement just String
    $sql = "INSERT INTO exchange_results (amount,from_currency,to_currency,result) VALUES ('$amount','$from_c_name','$to_c_name','$result')";

    //query function run
    $query = mysqli_query($connect,$sql);
 ?>

<p class=" mt-10 rounded-lg bg-white text-center py-5 font-bold text-2xl">
    <?php echo "$amount $from_c_name = $result $to_c_name" ?>
</p>
<div class="flex mt-5 mx-auto justify-center gap-10">
    <a href="./exchange.php" type="submit" class="text-white mr-0 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Calculate Again</a>

    <a href="./exchangeRecords.php" type="submit" class="text-white mr-0 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">See Area Records</a>
</div>

<?php include("./template/footer.php") ?>