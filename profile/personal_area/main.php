<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Личный кабинет</title>
	</head>

	<body>
		<?php
			require_once("F:/xampp/htdocs/site/header.php");
		?>

        <!-- Контейнер всей страницы формы -->
        <div class="row justify-content-center">
            <!-- Контейнер формы по центру -->
            <div class="col-md-6 profile" style="padding-top: 3%;">
                <!-- Контейнер формы -->
                <div class="col-md-6 head-info">
                    <!-- Верхушка формы -->
                    <header class="head">
                        <!-- Картинка профиля -->
                        <div class="profile-img">
                            <!-- Кнопка загрузки фото // сама фотка -->
                            <button class="btn-img-profile" type="button">
                                <!-- Картинка профиля -->
                                <figure class="blck-img-profile">
                                    <img src="/site/img/ava1.jpg" class="img-name" alt=""> <!-- Реализовать смену  фотографии кликом по кнопке -->
                                </figure>
                                <!-- Кнопка смены фотографии -->
                                <div class="blck-photo">
                                    <div class="img-photo">
                                    </div>
                                </div>
                            </button>
                        </div>
                        <!-- Приветствикем с подстановкой имени -->
                        <h1 class="welcom-profile">Здаров петушара с именем <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></h1>
                    </header>
                    <!-- Контейнер с таблицей из блоков -->
                    <div class="container ctn-blck-table-profile">
                        <!-- Таблица с блоками -->
                        <section class="blck-table-profile">
                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>


                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>


                        </section>


                        <section class="blck-table-profile">
                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>


                            <div class="left-blck-profile">
                                <div class="blck-profile-min">
                                    <div class="blck-profile">


                                        <div class="top-blck-profile">
                                            <a class="top-blck-profile-click" href="#" style="text-decoration: none;">
                                                <header class="blck-text-img-profile">
                                                    <div class="blck-text-profile">
                                                        <h2 class="blck-text-profile-h2">Zagolovok</h2>
                                                        <div class="blck-text-bot-profile">
                                                            <div>
                                                            Кабельный Завод «ЭКСПЕРТ-КАБЕЛЬ» поставил кабель для проведения электромонтажных работ на территорию образовательного комплекса «Точка будущего» в Иркутске 🎓
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="blck-img-profile-one">
                                                        <div class="blck-img-profile-min" style="width: 100px; height: 100px">
                                                            <figure class="img-profile-min">
                                                                <img class="img-profile-full" src="/site/img/lc.png">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </header>
                                            </a>
                                        </div>


                                        <div class="bot-blck-profile">
                                            <div class="bot-blck-profile-blckline">
                                                <div class="bot-blck-profile-line">
                                                </div>
                                            </div>
                                            <div class="bot-blck-profile-blcktext">
                                                <a class="bot-blck-profile-click" href="#" style="text-decoration: none;">
                                                    <div class="bot-blck-profile-click-text">
                                                        Тут ссилька буит
                                                    </div>
                                                </a>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>


                        </section>


                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
