
<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <h5>Вы в своем личном кабинете <?php echo $user['name'];?></h5>
            <h1>Кабинет пользователя</h1>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/user/hystory">Список покупок</a></li>
            </ul>
        </div>
    </div>
</section>
<?php include ROOT.'/views/layouts/footer.php';?>