<head>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
    <div class="session">
        <h1>Sessions</h1>
        <label for="session-create" class="btn1 button">New</label>
        <input type="checkbox" id="session-create">
    </div>
        <div class="viewsession">
            <?php include './dashboard/viewsession.php'; ?>
        </div>
        <div class="createsession">
            <?php include './dashboard/createsession.php'; ?>
        </div>
        <!-- <table class="viewlist">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date-Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // include '../data/mysql-connection.php';
                    // //read all row from database table
                    // $sql = "SELECT * FROM students";
                    // $result = $connection->query($sql);
                    //     if (!$result) {
                    //         die("Invalid query: ". $connection->error);
                    //     }
                                            
                    // //read data of each row
                    // while ($row = $result->fetch_assoc()) {
                    //     echo "
                    //         <tr>
                    //             <td>$row[id]</td>
                    //             <td>$row[name]</td>
                    //             <td>$row[email]</td>
                    //             <td>$row[created_at]</td>
                    //             <td class=\"list-actions\">
                    //                 <div>
                    //                     <button class=\"btn6\">Edit</button>
                    //                     <button class=\"btn7\">Delete</button>
                    //                 </div>
                    //             </td>
                    //         </tr>
                    //     ";
                    // }
                ?>
            </tbody>
        </table> -->