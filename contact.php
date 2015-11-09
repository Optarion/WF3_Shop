<?php
    require_once 'partials/head.php';

    $subject = !empty($_POST['inputSubject']) ? strip_tags($_POST['inputSubject']) : '';
    $content = !empty($_POST['inputContent']) ? strip_tags($_POST['inputContent']) : '';

    $errors = array();

    if(!empty($_POST)){

        if(empty($subject)){
            $errors['subject'] = 'Subject field is required.';
        }
        if(empty($content)){
            $errors['content'] = 'Message field is required.';
        }

    }

   if(!empty($_POST) && empty($errors)){
        $query = $db->prepare('INSERT INTO contact SET subject = :subject, content = :content, author = :author');
        $query->bindValue('subject', $subject);
        $query->bindValue('content', $content);
        $query->bindValue('author', $_SESSION['user_id'], PDO::PARAM_INT);
        $query->execute();

        $last_inserted_id = $db->lastInsertId();

        $success;

        if($last_inserted_id == 0){
            $result = 'An error as occured. Please try to resend your message later.';
            $success = false;
        }
        else{
            $result = 'Your message has been send. We will answer it as soon as possible.';
            $success = true;
        }
    }



?>

    <div class="page-header">
            <h1 id="type">Contact</h1>
        </div>

        <?php if(!empty($errors)){ ?>
            <div class="alert alert-danger">
                <ul>
                <?php
                foreach($errors as $error) {
                    echo '<li>'.$error.'</li>';
                }
                ?>
                </ul>
            </div>
        <?php }

        if (!empty($result)) { ?>
        <div class="alert alert-success">
            <ul>
               <?php  echo '<li>'.$result.'</li>';?>
            </ul>
        </div>
        <?php }else{ ?>

        <form class="form-horizontal" method="POST">
            <fieldset>

                <div class="form-group">
                    <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
                    <div class="col-lg-10">
                        <input class="form-control" id="inputSubject" name="inputSubject" placeholder="Hi there!" type="text" value="<?= $subject ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputContent" class="col-lg-2 control-label">Message</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="inputContent" name="inputContent" placeholder="Hello World!"><?= $content ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php } ?>

    </div>

    <?php
        require_once 'partials/footer.php';
