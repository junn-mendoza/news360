<?php
// phpinfo();
// exit;
// Function to check if URL exists
function urlExists($url) {
    $headers = @get_headers($url);
    return $headers && strpos($headers[0], '200');
}

// Connect to PostgreSQL database
$host = "localhost";
$port = "5432";
$dbname = "news360";
$user = "root";
$password = "root";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch URLs from the database and save if they exist
$query = $pdo->query("SELECT id,url FROM files2 where exists IS null order by id desc");
$c = 0;
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $url = $row['url'];
    $id = $row['id'];
    $exist = 'true';
    if (urlExists($url)) {
        try {
            $filename = basename($url);
            $filepath = "C:\\Users\\emera\\OneDrive\\Desktop\\code\\news360\\news360\\public\\assets\\fromaws\\" . $filename;
            file_put_contents($filepath, file_get_contents($url));
        } catch(Exception $e) {
            echo $e->getMessage();
            $exist = 'false';
        }
        
        //echo "Saved $url to $filepath\n";
        
    } else {
        //echo "$url does not exist or could not be reached.\n";
        $exist = 'false';

    }

    $updateQuery = $pdo->prepare("UPDATE files2 SET exists = ". $exist ." WHERE id = :id");
    $updateQuery->execute([':id'=>$id]);
    
    if($c % 100 === 0) {
        echo $c.PHP_EOL;
    }
    $c++;
}
echo 'done';
?>