<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/resources/assets/css/style.css">
  <title><?= $layout_title ?></title>
</head>
<body>
  <div class="w-full h-screen flex flex-col items-center justify-between bg-gray-100">
    <section class="w-full flex flex-col items-center"><?= $content ?></section>

    <script src="<?= $layout_js ?>"></script>
    <script src="<?= $view_js ?>"></script>

    <footer class="p-5 text-gray-500 text-[10pt]">
      <p>Converter Algarismos Romanos em Indo-Arábicos e Vise Versa</p>
    </footer>
  </div>
</body>
</html>