<?php
function toNumber($val)
{
    return floatval(str_replace(',', '.', $val));
}
if (isset($_GET['x'])) {
    $x = $_GET['x'];
} else {
    $x = 0;
}

if (isset($_GET['y'])) {
    $y = $_GET['y'];
} else {
    $y = 0;
}

if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = 0;
}

if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
} else {
    $mode = 'dark';
}

if ($a != '0' && $a != '1') {
    switch ($a) {
        case '+':
            $z = toNumber($x) + toNumber($y);
            break;
        case '−':
            $z = toNumber($x) - toNumber($y);
            break;
        case '×':
            $z = toNumber($x) * toNumber($y);
            break;
        case '÷':
            $z = toNumber($x) / toNumber($y);
            break;
    }
    $math = "$x $a $y =";
} else {
    $z = 0;
    $math = null;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Muhammad Afandi Aziz</title>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
</head>

<body class="<?= ($mode == 'dark' ? 'bg-dark text-light' : null) ?> bg-opacity-75">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <div class="card shadow <?= ($mode == 'dark' ? 'bg-dark' : null) ?>">
                    <div class="card-header d-flex">
                        <div class="card-title fw-bold mb-0 h3">
                            <a href="index.php" class="btn btn-outline-info">Kembali</a>
                            <span class="text-center ms-3 mt-1">Kalkulator</span>
                        </div>
                        <div class="ms-auto text-end fs-5 toggle-dark-light-mode">
                            <?php if ($mode == 'dark') : ?>
                                <button class="btn btn-transparent border text-white" type="button">Light Mode <i class="fas fa-sun"></i></button>
                            <?php else : ?>
                                <button class="btn btn-transparent border" type="button">Dark Mode <i class="fas fa-moon"></i></button>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="card-body">
                        <form action="" method="get" onsubmit="result()">
                            <label for="entry" class="col-12 fs-6 text-end text-muted px-4">
                                <span>
                                    <?= $math ?>
                                </span>
                                &nbsp;
                            </label>
                            <input type="text" id="entry" class="border-0 form-control fs-1 <?= ($mode == 'dark' ? 'text-light' : null) ?> text-end bg-transparent px-4" value="<?= $z ?>" readonly>
                            <input type="text" hidden id="input-x" name="x" value="<?= $x ?>" required>
                            <input type="text" hidden id="input-a" name="a" value="<?= $a ?>" required>
                            <input type="text" hidden id="input-y" name="y" value="<?= $y ?>" required>
                            <input type="text" hidden id="input-mode" name="mode" value="dark">
                            <hr>
                            <div class="row justify-content-center mb-3 px-4">
                                <div class="col-3 px-1 d-grid">
                                    <a href="?" id="clear" class="text-danger py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">C</a>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="clear-entry" class="py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">CE</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="backspace" class="py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4"><i class="fas fa-backspace"></i></button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="division" data-arithmetic="&div;" class="arithmetic py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">&div;</button>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3 px-4">
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="seven" data-number="7" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">7</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="eight" data-number="8" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">8</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="nine" data-number="9" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">9</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="times" data-arithmetic="&times;" class="arithmetic py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">&times;</button>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3 px-4">
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="four" data-number="4" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">4</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="five" data-number="5" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">5</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="six" data-number="6" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">6</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="minus" data-arithmetic="&minus;" class="arithmetic py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">&minus;</button>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3 px-4">
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="one" data-number="1" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">1</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="two" data-number="2" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">2</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="three" data-number="3" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">3</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="plus" data-arithmetic="&plus;" class="arithmetic py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">&plus;</button>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3 px-4">
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="positive-or-negative" class="py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4"><sup>+</sup>/<sub>-</sub></button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" data-number="0" id="zero" class="number py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">0</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="button" id="coma" class="py-2 btn <?= ($mode == 'dark' ? 'btn-outline-light' : 'btn-outline-dark') ?> fs-4">,</button>
                                </div>
                                <div class="col-3 px-1 d-grid">
                                    <button type="submit" id="equals" class="py-2 btn btn-success fs-4">&equals;</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted small">
                        Muhammad Afandi Aziz - 1907411005 | 2021
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function number(val) {
            return parseFloat(val.replace(",", "."))
        }
        let eq = false,
            next = true,
            darkMode = <?php if ($mode == 'dark') : ?>true<?php else : ?>false<?php endif; ?>,
            coma = false,
            arithmetic = false,
            arithmeticOperator = null;
        let x = 0,
            y = 0,
            z = 0;

        $('button.number').click(function() {
            if (next) {
                if ($('#entry').val() == 0) {
                    $('#entry').val($(this).data('number'));
                } else {
                    $('#entry').val($('#entry').val() + $(this).data('number'));
                }
            } else {
                $('#entry').val($(this).data('number'));
            }
            next = true;
        });

        $('#coma').click(function() {
            if (!coma) {
                $('#entry').val($('#entry').val() + ',');
                coma = true;
                next = true;
            }
        });

        $('button.arithmetic').click(function() {
            $('input#input-a').val($(this).data('arithmetic'));
            if (!arithmetic) {
                x = number($('#entry').val());
                $('label span').html(x + ' ' + $(this).data('arithmetic'));
                $('input#input-x').val($('#entry').val());
                $('#entry').val(x);
                arithmetic = true;
                arithmeticOperator = $(this).data('arithmetic');
                next = false;
            } else {
                if (next) {
                    y = number($('#entry').val());

                    switch (arithmeticOperator) {
                        case '+':
                            z = x + y;
                            break;
                        case '−':
                            z = x - y;
                            break;
                        case '×':
                            z = x * y;
                            break;
                        case '÷':
                            z = x / y;
                            break;
                    }
                    $('input#input-x').val(z);
                    $('label span').html(z + ' ' + $(this).data('arithmetic'));
                    $('#entry').val(0);
                    x = z;
                    y = 0;
                    arithmeticOperator = $(this).data('arithmetic');
                    next = false;
                } else {
                    $('label span').html(x + ' ' + $(this).data('arithmetic'));
                    arithmeticOperator = $(this).data('arithmetic');
                }
            }
            coma = false;
            eq = true;
        });

        $('#positive-or-negative').click(function() {
            if (number($('#entry').val()) != 0) {
                if (number($('#entry').val()) > 0) {
                    $('#entry').val(`-${number($('#entry').val())}`);
                } else {
                    $('#entry').val(`${$('#entry').val().replace('-', '')}`);
                }
            }
        });

        $('.toggle-dark-light-mode').click(function() {
            $('body').toggleClass('bg-dark text-light');
            $('#entry').toggleClass('text-light');
            $('.card').toggleClass('bg-dark');
            $('.toggle-dark-light-mode button').toggleClass('text-white')
            if (darkMode) {
                $('.toggle-dark-light-mode button').html('Dark Mode <i class="fas fa-moon"></i>');
                darkMode = false;
                $('#input-mode').val('light');
            } else {
                $('.toggle-dark-light-mode button').html('Light Mode <i class="fas fa-sun"></i>');
                darkMode = true;
                $('#input-mode').val('dark');
            }
            $('form button, form a').toggleClass('btn-outline-light').toggleClass('btn-outline-dark');
        });

        $('#clear-entry').click(function() {
            $('#entry').val(0);
            next = true;
        });

        $('#backspace').click(function() {
            let val = $('#entry').val();
            const x = val.substr(0, val.length - 1);
            if (x == '-' || x == '' || number(x) == 0) {
                $('#entry').val(0)
            } else {
                $('#entry').val(x)
            }
            next = true;
        });

        function result() {
            <?php if ($a == '0') : ?>
                $('input#input-y').val($('#entry').val());
            <?php else : ?>
                if (eq) {
                    $('input#input-y').val($('#entry').val());
                }
            <?php endif; ?>
        }
    </script>
</body>

</html>