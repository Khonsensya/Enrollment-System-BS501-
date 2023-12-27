<head>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <h1>Enrollment</h1>
    <form action="../modules/dashboard.php" method="POST" class="enrollment">
        <table>
            <tr>
                <td>
                    <label for="id">ID:</label>
                    <input type="text" id="id">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="program">Program</label>
                    <select name="program" id="program">
                        <option value=""></option>
                        <option value="bscs">Bachelor of Science in Computer Science</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="paymenttype">Payment Type</label>
                    <select name="paymenttype" id="paymenttype">
                        <option value=""></option>
                        <option value="bscs">Full Payment</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="yearsem">Year Level / Semester</label>
                    <select name="yearsem" id="yearsem">
                        <option value=""></option>
                        <option value="bscs">3rd Year / 1st Semester</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mobileNumber">Mobile Number:</label>
                    <input type="text" id="mobileNumber">
                </td>
                <td>
                    <label for="eMail">Email:</label>
                    <input type="email" id="eMail">
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