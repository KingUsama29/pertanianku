<?php
$key = "f40175d0b5534d6d9e865026250906";
$city = "Yogyakarta";
$url = "http://api.weatherapi.com/v1/current.json?key=$key&q=$city";

$response = file_get_contents($url);
$data = json_decode($response, true);

?>
<section id="cuaca" class="section-container" aria-label="Cuaca">
  <h2>Cuaca Hari Ini</h2>
  <div class="weather-card" role="region" aria-live="polite" aria-atomic="true">
    <img 
      src="https:<?= $data['current']['condition']['icon'] ?>" 
      alt="<?= $data['current']['condition']['text'] ?>" 
      class="weather-icon"
    />
    
    <div class="weather-temp" id="weather-temp"><?= $data['current']['temp_c'] ?>°C</div>
    <div class="weather-desc" id="weather-desc"><?= $data['current']['condition']['text'] ?></div>
    <div>Kota <?= $data['location']['name'] ?></div>
  </div>
</section>