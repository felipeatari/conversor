<div class="bg-white p-10 mt-10 shadow">
  <h1 class="w-full text-center text-xl font-bold mb-6"><?= $h1 ?></h1>
  <div class="w-full flex flex-col items-center">
    <form class="flex flex-col mb-11">
      <span class="text-[11pt]">Número para Algarismo Romano:</span>
      <input class="border py-1 px-2 mt-3 mb-3" type="text" name="numero" id="numero">
      <input class="bg-purple-700 hover:bg-purple-900 text-white text-[10pt] p-1" type="submit" value="Converter" id="numero-para-algarismo">
    </form>

    <form class="flex flex-col mb-5">
      <span class="text-[11pt]">Algarismo Romano para Número:</span>
      <input class="border py-1 px-2 mt-3 mb-3" type="text" name="algarismo" id="algarismo">
      <input class="bg-purple-700 hover:bg-purple-900 text-white text-[10pt] p-1" type="submit" value="Converter" id="algarismo-para-numero">
    </form>

    <div class="msg-content hidden cursor-pointer">
      <output id="resultado" class="text-[10pt]"></output>
    </div>

    <button id="msg-content-close" class="hidden">Limpar</button>
  </div>
</div>