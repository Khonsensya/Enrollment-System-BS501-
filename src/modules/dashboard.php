<?php include $_SERVER['DOCUMENT_ROOT'] . '\config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/icon.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <nav class="navbar2">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/data/navbar-data.php'; ?>
        <input type="checkbox" id="toggle">
        <label for="toggle" class="toggler">
            <i class="pwd-snd-button">=</i>
        </label>
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <ul class="navlist">
            <?php foreach ($_navbar2 as $navbar2_item) : ?>
                <li><a href="<?php echo $navbar2_item['link']; ?>">
                        <?php echo $navbar2_item['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php include '../data/dashboard-data.php';
    include '../data/dashboard-info-data.php';
    ?>
    <div class="dashboard1">
        <main class="content1">
            <table class="dashboard-info">
                <tr>
                    <?php foreach ($dashboard_info as $info) : ?>
                        <td>
                            <?php echo $info['info_heading']; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </main>
    </div>
</body>

</html>