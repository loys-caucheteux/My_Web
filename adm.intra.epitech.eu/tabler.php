<table>
    <?php
    echo '<tr><td>id</td><td>Pseudo</td><td>Name</td><td>Surname</td></tr>';
    include 'intra_mysqli.php';
    $query = 'SELECT COUNT(*) AS cnt FROM users';
    $result = $connect->query($query);
    $row = mysqli_fetch_array($result);
    $nl = $row['cnt'];
    for ($i = 1; $i <= $nl; $i++) {
        $query = 'SELECT * FROM users WHERE id = '.$i;
        $result = $connect->query($query);
        if (!$result)
            echo 'error :' .$connect->error;
        $row = mysqli_fetch_array($result);
        echo '<tr>';
        echo '<td>' .$row['id']. '</td>';
        echo '<td>' .$row['pseudo']. '</td>';
        echo '<td>' .$row['name']. '</td>';
        echo '<td>' .$row['surname']. '</td>';
        echo '</tr>';
    }
    ?>
</table>