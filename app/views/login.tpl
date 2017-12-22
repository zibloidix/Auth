<!DOCTYPE html>
<html>
<head>
    <title>Вход в систему</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" 
    href="./app/resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" 
    href="./app/resources/bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
    <script type="text/javascript" 
    src="./app/resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"
    src=""></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <p style="padding: 40px"></p>
            <div class="col-md-4 col-md-push-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Вход в систему</strong>
                    </div>
                    <div class="panel-body">
                        <form class="form" method="POST" action="/admindesk/">
                            <div class="form-group">
                                <input class="form-control" 
                                type="text" name="login" placeholder="Логин">
                            </div>
                            <div class="form-group">
                                <input class="form-control" 
                                type="password" name="password" placeholder="Пароль">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">
                                    Вход
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>