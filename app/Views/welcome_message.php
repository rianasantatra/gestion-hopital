<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>login</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Immatriculation</label>
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="Immatriculation" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Password">Mot de pasee</label>
                <div class="col-md-4">
                    <input id="Password" name="Password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="Login"></label>
                <div class="col-md-4">
                    <button id="Login" name="Login" class="btn btn-primary">Connexion</button>
                </div>
            </div>

        </fieldset>
    </form>

</body>

</html>