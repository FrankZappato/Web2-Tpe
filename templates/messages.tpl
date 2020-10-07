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
    <table class="table table-dark">
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
    {include file="./footer.tpl"}
    <script src="js/main.js"></script>
</body>