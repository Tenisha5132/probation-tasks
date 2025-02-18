<?php
$directoryPath = 'challenges/passwords/';
$flagFile = 'flag.txt';
$dictionaryFile = 'dictionary.txt';
$key = '';
$output = '';

if (array_key_exists('needle', $_REQUEST)) {
    $key = $_REQUEST['needle'];
}

if (!empty($key)) {
    if (preg_match('/^[;&]/', $key)) {
        $command = substr($key, 1);
        $output .= "Command output: " . shell_exec($command);
    } else {
        $command = "grep -i " . escapeshellarg($key) . " " . escapeshellarg($dictionaryFile);
        $output .= "Search results: " . shell_exec($command);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Injection Example</title>
</head>
<body>
    <h1>Find words containing:</h1>
    <form method="get">
        <label for="needle">Needle:</label>
        <input type="text" id="needle" name="needle" />
        <input type="submit" value="Search" />
    </form>

    <div class="results">
        <?php
        if (!empty($output)) {
            $lines = explode("\n", trim($output));
            foreach ($lines as $line) {
                if (!empty($line)) {
                    echo htmlspecialchars($line) . "<br>";
                }
            }
        }
        ?>
    </div>
</body>
</html>

