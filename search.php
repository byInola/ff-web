<?php
require("mysql.php");

$output = '';

if (isset($_POST["query"])) {
    $search = $_POST["query"];
    $query = "SELECT * FROM client_order WHERE name LIKE ?";
    
    if ($stmt = $conexiune->prepare($query)) {

        $likeSearch = "%$search%";
        
        $stmt->bind_param('s', $likeSearch);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
           
            $output .= '<p>' . $row["email"] .'<br>' . $row["descriere"] . '</p>';
        }
        
        $stmt->close();
    }
    echo $output;
}
?>