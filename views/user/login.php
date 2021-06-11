<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right" >
           
            <ul>
                <?php if(!empty($errors)): ?>
                <?php  foreach($errors as $error):?>
                <li><?php echo $error;?></li>
                <?php endforeach; ?>
                <?php endif;?>
            </ul>
            
                <div class="signup-form">
                    <h2>Вход в кабинет пользователя</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" value="<?php echo $email;?>" placeholder="E-mail"/>
                        <input type="password" name="password" value="<?php echo $password;?>" placeholder="Пароль"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Кабинет"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php';?>