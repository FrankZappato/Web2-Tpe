<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaCueva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/cart.css">
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    {include file="./navbarAdmin.tpl"}
    <div class="table-responsive">
        <table class=" table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">From</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                {nocache}
                {foreach from=$messages_s item=message}
                    <tr>
                        <th scope="row">{$message->id}</th>
                        <td>{$message->from_email}</td>
                        <td>{$message->msg}</td>
                    </tr>
                {/foreach}
                {/nocache}
            </tbody>
        </table>
    </div>
    <script src="js/main.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>