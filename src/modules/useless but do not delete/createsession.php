<head>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <form action="../modules/dashboard.php" method="POST" class="createsession">
        <?php include '../data/dashboard-data.php';?>
        <table>
        <tr>
                <td>
                    <label for="schoolyear">School Year</label>
                    <select name="schoolyear" id="schoolyear">
                        <option value=""></option>
                        <option value="bscs">Bachelor of Science in Computer Science</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester">
                        <option value=""></option>
                        <option value="bscs">Full Payment</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" id="submit" class="btn1">
                </td>
            </tr>
        </table>
        
    </form>
</body>