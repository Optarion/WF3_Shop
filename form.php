<?php
    require_once 'partials/head.php';

    $action = !empty($_GET['action']) ? strip_tags($_GET['action']) : '';

    $name = !empty($_POST['name']) ? strip_tags($_POST['name']) : '';
    $email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
    $password = !empty($_POST['password']) ? strip_tags($_POST['password']) : '';
    $confirmPassword = !empty($_POST['confirmPassword']) ? strip_tags($_POST['confirmPassword']) : '';
    $cgu = !empty($_POST['cgu']) ? strip_tags($_POST['cgu']) : '';

    $errors = array();

    if(!empty($_POST)){
        if($action == 'register'){
            if(empty($name)){
                $errors['name'] = 'Vous devez renseigner un nom complet';
            }
            if($password != $confirmPassword){
                $errors['confirmPassword'] = 'Le password et la confirmation doivent être identiques';      
            }
            if(empty($cgu)){
                $errors['cgu'] = 'Vous devez accepter les CGUs';   
            }            
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Vous devez renseigner un email valide';
        }
        if(strlen($password) < 6 || strlen($password) > 32 ){
            $errors['password'] = 'Vous devez renseigner un password valide';   
        }

        if(empty($errors)){
            if($action == 'register'){
                $query = $db->prepare('SELECT email FROM clients WHERE email = :email');
                $query->bindValue('email', $email);
                $query->execute();
                $email_found = $query->fetch();

                if(!empty($email_found)){
                    $errors['email_found'] = 'Cet email est déjà utilisé';
                }else{

                    $crypted_password = password_hash($password, PASSWORD_BCRYPT);

                    $query = $db->prepare('INSERT INTO clients SET name = :name, email = :email, password = :password, cdate = NOW()');
                    $query->bindValue('name', $name);
                    $query->bindValue('email', $email);
                    $query->bindValue('password', $crypted_password);
                    $query->execute();

                    $inserted_id = $db->lastInsertId();

                    if($inserted_id == 0){
                        $result = 'Un probleme est survenu lors de la création de votre compte. Veuillez réessayer ultérieurement';
                    } else{
                        $user = array(
                            'id' => $inserted_id,
                            'name' => $name
                            );

                        $result = logUser($user, 'register');
                    
                    }
                }
            }else{
                $query = $db->prepare('SELECT name, id, password FROM clients WHERE email = :email');
                $query->bindValue('email', $email);
                $query->execute();
                $user = $query->fetch();

                if(empty($user)){
                    $errors['connection'] = 'Le couple email/mdp est incorrect';
                }else if(!password_verify($password, $user['password'])){
                    $errors['connection'] = 'Le couple email/mdp est incorrect';
                }else{
                   
                   $result = logUser($user, 'connection');
                }
            }
        }
        //echo "errors".debug($errors);
    }

?>

        <div class="row">

            <div class="page-header">
                <h1 id="type">Form</h1>
            </div>
           <?php if (!empty($errors)) { ?>
            <div class="alert alert-danger">
                <ul>
                <?php
                foreach($errors as $error) {
                    echo '<li>'.$error.'</li>';
                }
                ?>
                </ul>
            </div>
            <?php } ?>

            <?php
            if (!empty($result)) { ?>
            <div class="alert alert-success">
                <ul>
                   <?php  echo '<li>'.$result.'</li>';?>
                </ul>
            </div>  
            <?php }else{ ?>
               
                <form method="POST" class="form-horizontal" novalidate>
                    <fieldset>
                        <?php if($action == 'register'){ ?>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Full Name</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="inputName" name="name" placeholder="e: John Doe" type="text" value="<?= $name ?>">
                            </div>
                        </div>
                         <?php } ?>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="inputEmail" name="email"placeholder="ex: john.doe@mail.com" type="text" value="<?= $email ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="inputPassword" name="password" placeholder="Min. 6 char., Max. 32 char." type="password">
                                <?php if($action == 'register'){ ?>
                                <input class="form-control" id="inputConfirmPassword" name="confirmPassword"placeholder="Confirm your password" type="password">
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        if($action == 'register'){ ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">CGU</label>
                            <div class="col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        <?php $checked = !empty($_POST['cgu']) ? ' checked' : '' ?>
                                        <input name="cgu" type="checkbox" <?= $checked ?>> I accept CGUs
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            <?php } 

            //Add "Go to register form" link
            if($action == 'connection') {?>
                <div class="col-lg-12" style="text-align: center"><a href="?action=register"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Not registered yet?</button></a></div>
            <?php } ?>
        </div>


        <?php
        require_once 'partials/footer.php';
