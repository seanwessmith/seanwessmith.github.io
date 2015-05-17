<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="../js/jquery-1.11.3.min.js"></script>

<!-- Powerrange Javascript-->
<link rel="stylesheet" type="text/css" href="powerange.min.css">
<script src="powerange.min.js"></script>
</head>

<body>
<div class="slider-wrapper">
  <input type="text" class="js-check-click" />
  <button class="js-check-click-button button small-button">Check value</button>
</div>
// Checking state.
    // On click. 
<script>

    var clickButton = document.querySelector('.js-check-click-button')
	      , initClickInput = new Powerange(clickInput, { start: 20 })
      , clickInput = document.querySelector('.js-check-click');


    clickButton.addEventListener('click', function() {
      alert(clickInput.value);
    });
	</script>
</body>
</html>