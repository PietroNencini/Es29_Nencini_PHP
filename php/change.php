<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es 29</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php 
        function getDayString(int $day_value) {
            switch($day_value) {
                case 1: return "Lunedì";
                case 2: return "Martedì";
                case 3: return "Mercoledì";
                case 4: return "Giovedì";
                case 5: return "Venerdì";
                case 6: return "Sabato";
                case 0: return "Domenica";
                default: return "ERROR";
            }
        }

        function addValueSymbol($country) {
            switch($country) {
                case "us_d": return "$";
                case "sz_f": return "CHF";
                case "jp_y": return "¥";
                case "uk_p": return "£";
                default: echo "ERRORE";
            }
        }

        function getForeignFlag($country) {
            switch($country) {
                case "us_d": return "../images/us-flag.gif";
                case "sz_f": return "../images/sz-flag.gif";
                case "jp_y": return "../images/ja-flag.gif";
                case "uk_p": return "../images/uk-flag.gif";
                default: echo "ERRORE";
            }
        }

        const COMM_WEEK = 0.025;
        const COMM_WEEKEND = 0.05;
        const CHANGES = ["us_d" => 1.08, "sz_f" => 0.94, "jp_y" => 165.91, "uk_p" => 0.83];

        $change_date = date("d-m-Y");
        $dayOfWeek = date("w");             // 0 Domenica ---> 6 Sabato
        $change_fee = ($dayOfWeek == 0 || $dayOfWeek == 6) ? COMM_WEEKEND : COMM_WEEK; 
        $user_eur_value = $_GET["euro_value"];
        $selected_country = $_GET["foreign_country"];
        $foreignCountryValue = $user_eur_value * CHANGES[$selected_country];
        $total = number_format($foreign_value = ($user_eur_value * (1 - $change_fee)) * CHANGES[$selected_country], 2);
        $foreign_flag = getForeignFlag($selected_country);
    ?>
    
    <h1 class="w-100 p-2 bg-primary text-white text-center mb-3">  RISULTATO  </h1>
    <div class="w-50 p-2 justify-content-center align-items-center d-flex">
        <ul style="list-style-type: none;" class="list-group">
            <li> Data di cambio: <?php echo $change_date;  ?> </li>
            <li> Giorno della settimana: <?php echo getDayString($dayOfWeek);  ?> </li>
            <li> Importo utente: <?php echo $user_eur_value."€  ". "<span> <img src='../images/italy.png'> </span>";   ?> </li>
            <li> Valore valuta straniera (commissioni escluse): <?php echo $foreignCountryValue; ?> </li>
            <li> Commissioni di cambio <?php echo ($change_fee * 100)."% - ". ($change_fee == 0.05 ? "Commissione maggiorata al 5%" : "Commissione regolare" );  ?> </li>
            <li> Importo in uscita totale valuta straniera:  <?php echo $total.addValueSymbol($selected_country);  ?> <br>
                <img src="<?php echo $foreign_flag ?>" alt="flag">
            </li>
            
        </ul>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>