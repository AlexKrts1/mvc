<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right" >
            <?php if($result):?>
                <p>Данные отредактированы</p>
            
            <?php elseif(isset($errors) && is_array($errors)):?>
            <ul>
                <?php foreach($errors as $error):?>
                <li><?php echo $error;?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif;?>
                <div class="signup-form">
                    <h2>Редактирование личных данных</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" value="<?php echo $name;?>" placeholder="Имя"/>
                        <input type="password" name="password" value="<?php echo $password;?>" placeholder="Пароль"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Редактировать"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php';?>