<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title> <!-- title -->
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>"/> <!-- icon -->
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_footer_css; ?>">
</head>
<body>
    <?php include $_C2_dashboard_navbar_php; ?>

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

    <?php include $_C2_footer_php; ?>
</body>
</html>

         