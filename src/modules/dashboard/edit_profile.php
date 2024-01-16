<?php include '../../../config.php'; ?>
<?php include $_C2_data_php; ?>
<?php include $_C2_session_php; ?>
<?php include $_C2_mysql_connection_php; ?>
<?php include $_C2_dashboard_data_php; ?>
<?php include $_C2_action_php; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C2_Head_Icon; ?>" />
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C2_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_navbar_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C2_forms_css; ?>">

</head>

<body>
    <?php if (isset($user)) : ?>
        <?php include $_C2_dashboard_navbar_php; ?>
        <main class="editprofile1 container">

            <h2>Edit Student Information</h2>
            <label for="">First Name: <?php echo $profile_details['First_Name'] ?></label>
            <label for="">Email: <?php echo $profile_details['Email'] ?></label>

            <form method="POST">
                <table>
                    <tr>
                        <td>
                            <label for="enrollmentStatus">Enrollment Status</label>
                            <select name="enrollmentStatus" id="enrollmentStatus">
                                <option value=""><?php echo ($profile_details['Enrolled'] == 1) ? 'Enrolled' : 'Pending'; ?></option>
                                <option value="<?php echo ($profile_details['Enrolled'] == 1) ? '1' : '0'; ?>"><?php echo ($profile_details['Enrolled'] == 1) ? 'Pending' : 'Enrolled'; ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="firstName">First Name</label>
                            <input type="text" id="fname" name="firstName" value=<?php echo $profile_details['First_Name']; ?>>
                        </td>
                        <td>
                            <label for="dateOfBirth">Date of Birth</label>
                            <input type="text" id="dateOfBirth" name="dateOfBirth" pattern="\d{4}-\d{2}-\d{2}" value="<?php echo $profile_details['Birthdate']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="middleInitial">Middle Initial</label>
                            <input type="text" name="middleInitial" value="<?php echo $profile_details['Middle_Initial']; ?>">
                        </td>
                        <td>
                            <label for="birthplace">Place of Birth</label>
                            <input type="text" name="birthplace" value="<?php echo $profile_details['Place_of_Birth']; ?>">
                        </td>
                        <td>
                            <label for="citizenship">Citizenship</label>
                            <select name="citizenship" id="citizenship">
                                <option value="<?php echo $profile_details['Citizenship']; ?>"><?php echo $profile_details['Citizenship']; ?></option>
                                <?php foreach ($_citizenship as $citizenship_item) : ?>
                                    <option value="<?php echo $citizenship_item['citizenship']; ?>">
                                        <?php echo $citizenship_item['citizenship']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" value="<?php echo $profile_details['Last_Name']; ?>">
                        </td>
                        <td>
                            <label for="civilStatus">Civil Status</label>
                            <select name="civilStatus" id="civilStatus">
                                <?php
                                if ($profile_details['Civil_Status'] == "Single") {
                                    $civil_status_edit = "Single";
                                    $civil_status_edit_1 = "Married";
                                    $civil_status_edit_2 = "Divorced";
                                    $civil_status_edit_3 = "Separated";
                                } elseif ($profile_details['Civil_Status'] == "Married") {
                                    $civil_status_edit = "Married";
                                    $civil_status_edit_1 = "Single";
                                    $civil_status_edit_2 = "Divorced";
                                    $civil_status_edit_3 = "Separated";
                                } elseif ($profile_details['Civil_Status'] == "Divorced") {
                                    $civil_status_edit = "Divorced";
                                    $civil_status_edit_1 = "Single";
                                    $civil_status_edit_2 = "Married";
                                    $civil_status_edit_3 = "Separated";
                                } elseif ($profile_details['Civil_Status'] == "Separated") {
                                    $civil_status_edit = "Separated";
                                    $civil_status_edit_1 = "Single";
                                    $civil_status_edit_2 = "Married";
                                    $civil_status_edit_3 = "Divorced";
                                }
                                ?>
                                <option value="<?php echo $civil_status_edit; ?>"><?php echo $civil_status_edit; ?></option>
                                <option value="<?php echo $civil_status_edit_1; ?>"><?php echo $civil_status_edit_1; ?></option>
                                <option value="<?php echo $civil_status_edit_2; ?>"><?php echo $civil_status_edit_2; ?></option>
                                <option value="<?php echo $civil_status_edit_3; ?>"><?php echo $civil_status_edit_3; ?></option>
                            </select>
                        </td>
                        <td>
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex">
                                <?php
                                if ($profile_details['Gender'] == "Male") {
                                    $sex_edit = "Male";
                                    $sex_edit_1 = "Female";
                                    $sex_edit_2 = "NoSex";
                                } elseif ($profile_details['Gender'] == "Female") {
                                    $sex_edit = "Female";
                                    $sex_edit_1 = "Male";
                                    $sex_edit_2 = "NoSex";
                                } elseif ($profile_details['Gender'] == "NoSex") {
                                    $sex_edit = "NoSex";
                                    $sex_edit_1 = "Male";
                                    $sex_edit_2 = "Female";
                                }
                                ?>
                                <option value="<?php echo $sex_edit; ?>"><?php echo $sex_edit; ?></option>
                                <option value="<?php echo $sex_edit_1; ?>"><?php echo $sex_edit_1; ?></option>
                                <option value="<?php echo $sex_edit_2; ?>"><?php echo $sex_edit_2; ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?php echo $profile_details['Address']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mobileNumber">Mobile Number</label>
                            <input type="number" name="mobileNumber" value="<?php echo $profile_details['Mobile_Number']; ?>">
                        </td>
                        <td colspan="2">

                            <label for="email">Email Address</label>
                            <input type="email" name="email" value="<?php echo $profile_details['Email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button onclick="javascript: return confirm('Please confirm deletion');" type="submit" name="update" id="submit" class="btn1">Submit</button>
                        </td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
        </main>
</body>

</html>