<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php
include '../../../header.php';
// Запросы в бд для списка городов и стран
$city = "SELECT city
			FROM `city_id`";
$state = "SELECT state_ru
			FROM `state_id`";
$resCity = $mysqli->query($city);
$resState = $mysqli->query($state);
?>
	<!-- Скрипты жквери для списка городов и стран -->
	<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://snipp.ru/cdn/chosen/1.8.7/chosen.jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.js-chosen-city').chosen({
				width: '100%',
				no_resCitys_text: 'Совпадений не найдено',
				placeholder_text_single: 'Выберите город'
			});
		});
		$(document).ready(function () {
			$('.js-chosen-state').chosen({
				width: '100%',
				no_resCitys_text: 'Совпадений не найдено',
				placeholder_text_single: 'Выберите страну'
			});
		});
	</script>
</head>

<body>
	<!-- Блок перехода на прошлую страницу -->
	<div class="T4LgNb">
		<div class="VjFXz"></div>
		<div class="EWuRAb OUzXuf">
			<div class="ikIPKb">
				<div class="edoSyc" role="navigation">
					<a role="button" href="../companyinfo.php" class="U26fgb mUbCce fKz7Od UQO9ef zC7z7b iP4hIb M9Bg4d">
						<div class="VTBa7b MbhUzd"></div><span class="xjKiLb"><span class="Ce1Y1c"
								style="top: -12px"><span class="DPvwYc sm8sCf ew338c"
									aria-hidden="true"></span></span></span>
					</a>
					<div role="button" class="U26fgb mUbCce fKz7Od UQO9ef zC7z7b NQ3IFc M9Bg4d">
						<div class="VTBa7b MbhUzd"></div><span class="xjKiLb"><span class="Ce1Y1c"
								style="top: -9px"><span class="DPvwYc sm8sCf ew338c"></span></span></span>
					</div>
					<h1 class="ZZ9xL">Информация о компании</h1>
				</div>
				<div class="plevpc">
					<div class="vCJLQ"></div>
				</div>
			</div>
			<div class="MbGbAd"></div>
		</div>
		<div class="accordion dW35KL" id="accordionExample">
			<!-- Блок с номером телефона -->
			<div class="card G5n7T">
				<div class="card-header list-group-item list-group-item-action active U8iN4" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left pHFe3 " type="button" data-toggle="collapse"
							data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Номер телефона
						</button>
					</h2>
				</div>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
					data-parent="#accordionExample">
					<div class="card-body">
						<form method="POST" action="action.php" name="compPhone">
							<label">Номер телефона</label>
								<div class="G9o7T">
									<div class="Yt9N8">
										<input type="text" class="form-control U30lM" name="compPhone" minlength="2"
											maxlength="255" value="<?php echo $company_arr['compPhone']; ?>" required
											placeholder="8-***-***-**-**" />
									</div>
									<div class="form-group"><br />
										<input class="btn btn-outline-primary Lo6MV" type="submit" name="btn_comp_phone"
											value="Отправить">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Блок с адресными данными -->
			<div class="card G5n7T">
				<div class="card-header U8iN4" id="headingTwo">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed pHFe3" type="button"
							data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
							aria-controls="collapseTwo">
							Адрес
						</button>
					</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="card-body">
						<form method="POST" action="action.php" name="adress">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputCity">Страна</label>
									<select class="form-control js-chosen-state" id="state" type="submit" name="state">
										<!-- Выпадающий список со странами из бд -->
										<?
if (!$resState) {
    die('Неверный запрос: ' . mysqli_error($link));
} else {
    while ($pow = mysqli_fetch_array($resState)) {?>
										<option></option>
										<option>
											<tr>
												<td>
													<?echo $pow['state_ru']; ?>
												</td>
											</tr>
											<?}
}
?>
										</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="inputState">Город</label>
									<select class="form-control js-chosen-city" id="inputCity" name="city">
										<!-- Выпадающий список с городами из бд -->
										<?
if (!$resCity) {
    die('Неверный запрос: ' . mysqli_error($link));
} else {
    while ($pow = mysqli_fetch_array($resCity)) {?>
										<option></option>
										<option>
											<tr>
												<td>
													<?echo $pow['city']; ?>
												</td>
											</tr>
											<?}
}
?>
										</option>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label for="inputZip">Индекс</label>
									<input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="inputAddress">Улица</label>
									<input type="text" class="form-control" id="inputStreet">
								</div>
								<div class="form-group col-md-2">
									<label for="inputHome">Дом</label>
									<input type="text" class="form-control" id="inputHome">
								</div>
								<div class="form-group col-md-2">
									<label for="inputOffice">кв/офис</label>
									<input type="text" class="form-control" id="inputOffice">
								</div>
							</div>
							<div class="form-group"><br />
								<input class="btn btn-outline-primary" type="submit" name="btn_submit_adress"
									value="Отправить">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Блок с сайтом -->
			<div class="card G5n7T">
				<div class="card-header U8iN4" id="headingThree">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed pHFe3" type="button"
							data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
							aria-controls="collapseThree">
							Вебсайт
						</button>
					</h2>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="card-body">
						<form method="GET" action="action.php" name="site">
							<label">Сайт</label>
								<div class="Mf3T5">
									<input type="text" class="form-control" name="site" minlength="2" maxlength="255"
										required value="<?php echo $company_arr['site']; ?>" />
								</div>
								<div class="form-group"><br />
									<input class="btn btn-outline-primary" type="submit" name="btn_submit_site"
										value="Отправить">
								</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Блок с почтой -->
			<div class="card G5n7T">
				<div class="card-header U8iN4" id="headingFour">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed pHFe3" type="button"
							data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
							aria-controls="collapseFour">
							Электронная почта
						</button>
					</h2>
				</div>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
					<div class="card-body">
						<form method="POST" action="action.php" name="compMail">
							<label">Электронная почта</label>
								<div class="G9o7T">
									<div class="Yt9N8">
										<input type="text" class="form-control U30lM" name="compMail" minlength="2"
											maxlength="255" value="<?php echo $company_arr['compMail']; ?>" required
											placeholder="***@***.***" />
									</div>
									<div class="form-group"><br />
										<input class="btn btn-outline-primary Lo6MV" type="submit" name="btn_comp_mail"
											value="Отправить">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Блок с почтой -->
			<div class="card G5n7T">
				<div class="card-header U8iN4" id="headingFive">
					<h2 class="mb-0">
						<button class="btn btn-link btn-block text-left collapsed pHFe3" type="button"
							data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
							aria-controls="collapseFive">
							Инн епта
						</button>
					</h2>
				</div>
				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
					<div class="card-body">
						<form method="POST" action="action.php" name="inn">
							<label">Инн</label>
								<div class="G9o7T">
									<div class="Yt9N8">
										<input type="text" class="form-control U30lM" name="inn" minlength="2"
											maxlength="12" value="<?php echo $company_arr['inn']; ?>" required
											placeholder="00000000000" />
									</div>
									<div class="form-group"><br />
										<input class="btn btn-outline-primary Lo6MV" type="submit" name="btn_submit_inn"
											value="Отправить">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#myList a').on('click', function (event) {
				event.preventDefault()
				$(this).tab('show')
			})
		</script>
		<?echo '<pre>';
print_r($_POST['inn']);
print_r($full_arr);
?>
</body>

</html>
