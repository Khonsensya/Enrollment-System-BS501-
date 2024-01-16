<nav class="navbar2">
    <input type="checkbox" id="toggle">
    <label for="toggle" class="toggler">
        <i class="pwd-snd-button">=</i>
    </label>
    <div class="logo">
        <a href="./dashboard.php">
            <h1>Dashboard</h1>
        </a>
    </div>
    <ul class="navlist">
        <?php
        if ($user['User_Type'] == 'Student') {
            $_navbar_2_list = $_navbar_2_student;
        } elseif ($user['User_Type'] == 'Administrator') {
            $_navbar_2_list = $_navbar_2_admin;
        }
        ?>

        <?php
        $id = $user['User_ID'];
        $result = $mysqli->query("SELECT * FROM student_info WHERE User_ID='$id'") or die("Invalid query: " . $mysqli->error);
        $row = $result->fetch_assoc();
        ?>

        <?php foreach ($_navbar_2_list as $navbar_2_item) : ?>
            <?php if ($navbar_2_item['title'] == 'Application' && $user['Applied'] == 'applied') : ?>
            <?php elseif ($navbar_2_item['title'] == 'Enrollment' && (($row['Status'] == '0') || ($row['Status'] == '2'))) : ?>
            <?php elseif ($navbar_2_item['title'] == 'Enrollment' && $row['Enrolled'] == '1') : ?>
            <?php else : ?>
                <li><a href="<?php echo $navbar_2_item['link']; ?>">
                        <?php echo $navbar_2_item['title']; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>