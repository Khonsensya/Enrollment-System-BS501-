<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . PROCESS . 'session.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'data.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_Head_Icon2; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $link_3; ?>style.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/module.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/navbar.css">
    <link rel="stylesheet" href="<?php echo $link_2; ?>css/footer.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'dashboard-navbar.php'; ?>

    <main class="policy1 container">
        <h1>Privacy Policy</h1>
        <p class="subtitle"> Welcome to our online enrollment system. Before you proceed, please read and understand our Privacy and Policy.</p>
        
            <div>
                <?php foreach ($_policy_1 as $policy1_item) : ?>      
                    <details>
                        <Summary><h2><?php echo $policy1_item['title']; ?></h2></Summary>
                            <p><?php echo $policy1_item['description']; ?>
                            <ul class="policy-list">
                                <?php echo implode("<br>", $policy1_item['item']); ?>
                            </ul>
                    </details>  
                <?php endforeach; ?>
                
                <p>If you have any questions or concerns, contact us through email. Thank you for entrusting us with your information. We are committed to ensuring the privacy and security of your data.</p>
            </div>
    
            
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . COMPONENTS . 'footer.php'; ?>
</body>
</html>

         