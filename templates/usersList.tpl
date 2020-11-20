{include file="./head.tpl"}

<body class="admin">
    {include file="./navbarAdmin.tpl"}
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col" class="probando">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is Admin</th>  
                    <th scope="col">Username</th>
                    <th scope="col"><th>                  
                    <th scope="col"><th>                  
                </tr>
            </thead>
            <tbody>
                {nocache}
                {foreach from=$users_s item=user}
                <tr>
                        <th scope="row"> {$user->id}</th>
                        <td>
                            {$user->email}
                        </td>
                        <td>
                            {$user->isadmin}
                        </td>                        
                        <td>
                            {$user->username}
                        </td>                        
                        <td>
                            <div>
                                <form method="POST" action="delete-user">
                                    <button type="submit" class="btn_delete" id={$user->id}>Delete</button>
                                    <input type="hidden" name="id_user" value={$user->id}>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div>
                                <form method="POST" action="modify-admin-user">
                                    <button type="submit" class="btn_modify_admin" value={$user->id}>Admin</button>
                                    <input type="hidden" name="id_user" value={$user->id}>
                                </form>
                            </div>
                        </td>
                    </tr>                    
                {/foreach}
                {/nocache}
            </tbody>
        </table>
    </div>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>