<!DOCTYPE html>
<html Lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="admin_style.css">
    <title>Admin</title>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>ADMIN</h4>
        </div>
    </nav>

    <div class="content">

        <div class="profile-card">

            <div class="card-header">

                <div class="view-commands">

                    <div class="view-races">
                        <button>View Races</button>
                    </div>

                    <div class="view-cats">
                        <button>View Cats</button>
                    </div>

                    <div class="view-users">
                        <button>View Users</button>
                    </div>

                    <div class="view-feedbacks">
                        <button>View Feedbacks</button>
                    </div>

                </div>
            </div>

            <div class="card-footer">

                <div class="options">
                    <button onclick="location.href='../Home/home.php'" class="blogout">Logout</button>
                </div>

            </div>
        </div>

        <div class="change-commands">
            <div class="races">
                <h5>Races</h5>
                <div class="add-race">
                    <button>Add Race</button>
                </div>
                <div class="delete-race">
                    <button>Delete Race</button>
                </div>
            </div>
            <div class="cats">
                <h5>Cats</h5>
                <div class="add-cat">
                    <button>Add Cat</button>
                </div>
                <div class="delete-cat">
                    <button>Delete Cat</button>
                </div>
            </div>
            <div class="users">
                <h5>Users</h5>
                <div class="add-user">
                    <button>Add User</button>
                </div>
                <div class="delete-user">
                    <button>Delete User</button>
                </div>
            </div>
        </div>

    </div>

</body>





</html>