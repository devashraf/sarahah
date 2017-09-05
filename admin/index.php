<style>
    .message {
        width: 50%;
        border: 2px solid #dc3545;
        margin: 10px auto;
        padding: 8px;
    }
    p {
        padding: 0;
        margin: 0;
        text-align: right
    }
    p:last-child {
        margin-top: 5px;
        text-align: left
    }
</style>
<?php 
    session_start();
    if(isset($_SESSION['username'])){
        
        echo '<a href="logout.php">Logout</a>';

        include 'src/database/connect.php';
        
        $sth = $db->prepare("SELECT * FROM s_messages ORDER BY m_date DESC");
        
        $sth->execute();
        
        $result = $sth->fetchAll();
        
        if(count($result) > 0){
            foreach($result as $message){
                echo '<div class="message">';
                    echo '<p>' . $message['m_body']  . '</p>';
                    echo  '<p>' . $message['m_date'] . '</p>';
                echo '</div>';
            }
        } else  {
            echo '<h1>There is No Message</h1>';
        }
        
    } else {
        header('Location: login.php');
    }
?>