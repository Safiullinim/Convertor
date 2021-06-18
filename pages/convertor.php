<!DOCTYPE html>

<head>
    <title>Convertor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset='utf-8'>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card mx-auto" style="max-width: 380px;">
                    <form action='index.php'>
                        <div class="card-body">
                            <h5 class="card-title">Конвертор валют</h5>
                            <h6 class="card-subtitle mb-2 text-muted">by Safiullin Ilsat</h6>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="fromInput">Из валюты:</label>
                                        <select name="from" class="form-select" id="fromInput">
                                            <?php foreach ($realConvertor->getCurrencies() as $key => $val) { ?>
                                                <option value="<?= $key ?>" <?= ($_GET['from'] ?? '') == $key ? 'selected="selected"' : '' ?>>
                                                    <?= $key ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="toInput">В валюту:</label>
                                        <select name="to" class="form-select" id="toInput">
                                            <?php foreach ($realConvertor->getCurrencies() as $key => $val) { ?>
                                                <option value="<?= $key ?>" <?= ($_GET['to'] ?? '') == $key ? 'selected="selected"' : '' ?>>
                                                    <?= $key ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="amount">Введите сумму:</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Например: 120.23" value="<?= $_GET['amount'] ?? '' ?>">
                            </div>

                            <?php if ($result) { ?>
                                <div class="alert alert-primary text-center mt-3 mb-1" role="alert">
                                    <b><?= $result['amount'] ?> </b> <?= $result['from'] ?> = <br>
                                    <b><?= $result['result'] ?> </b> <?= $result['to'] ?>
                                </div>
                            <?php } ?>

                            <?php if ($error) { ?>
                                <div class="alert alert-danger text-center mt-3 mb-1" role="alert">
                                    <?= $error ?>
                                </div>
                            <?php } ?>

                            <div class="mt-3 text-center">
                                <button type='submit' class="btn btn-primary">Конвертировать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>