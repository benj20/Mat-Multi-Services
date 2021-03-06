<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <title>Mat Multi Services - Réalisations</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include("../includes/head.php"); ?>
  </head>
  <body id="realisations">

    <?php include("../includes/googleAnalytics.php"); ?>

    <?php include("../includes/menu.php"); ?>


    <div class="container-fluid background-dark">
      <br>
      <br>

      <div class="container">
    	  <div class="row">
    			<h1 class="text-center">Réalisations</h1>
    			<br>
    			<br>
          <div id="actu">


          </div>
        </div>
      </div>

      <br>
      <br>
    </div>


    <?php include("../includes/modal.php"); ?>

    <?php include("../includes/facebookApi.php"); ?>

    <?php include("../includes/footer.php"); ?>

    <script type="text/javascript">
    var el = document.getElementById('actu');
    var array = <?php echo $userNode['albums']; ?>;
    var arrayName = ['Photos du journal', 'Téléchargements mobiles', 'Photos de profil', 'Photos de couverture'];
    var i, j, albumValide, div, div2, div3, nameh, array2, a, img, newLinkText, button, span, p;
    var index = 0;
    var index2 = 0;
    var number = 5;
    var id, elZoom, elZoomCarouselIndicators, elZoomCarouselInner, idAlbumZoom, li, div4, imgZoom;

    boucle(0);


    function zoom() {
      $('.img-zoom').off('click.zoom');
      $('.img-zoom').on('click.zoom', function(e) {
    		e.preventDefault();
    		if ($(window).width() > 767) {

          id = $(this).find('img').attr('id');
    			id = parseInt(id);


          var indicatorZoom = document.querySelectorAll('.indicatorZoom');
          if (indicatorZoom.length > 0) {
            for (var l = 0; l < indicatorZoom.length; l++) {
              indicatorZoom[l].parentNode.removeChild(indicatorZoom[l]);
            }
          }
          var itemZoom = document.querySelectorAll('.itemZoom');
          if (itemZoom.length > 0) {
            for (var l = 0; l < itemZoom.length; l++) {
              itemZoom[l].parentNode.removeChild(itemZoom[l]);
            }
          }

          idAlbumZoom = e.currentTarget.parentElement.parentElement.parentElement.id;
          elZoomCarouselIndicators = document.getElementById('carousel-indicators');
          elZoomCarouselInner = document.getElementById('carousel-inner');
          elZoom = document.getElementById(idAlbumZoom);
          $('.text-title-modal').text(elZoom.firstChild.innerHTML);
          elZoom = elZoom.lastChild.childNodes;


          for (var k = 0; k < elZoom.length; k++) {
            li = document.createElement('li');
            li.setAttribute('data-target', '#carousel-example-generic');
            li.setAttribute('data-slide-to', elZoom[k].firstChild.firstChild.id);
            if (k == 0) {
              li.className = 'indicatorZoom active';
            } else {
              li.className = 'indicatorZoom';
            }
            elZoomCarouselIndicators.appendChild(li);

            div4 = document.createElement('div');
            if (k == 0) {
              div4.className = 'item itemZoom active';
            } else {
              div4.className = 'item itemZoom';
            }
            elZoomCarouselInner.appendChild(div4);

            imgZoom = document.createElement('img');
            imgZoom.className = 'center-block img-responsive';
            imgZoom.src = elZoom[k].firstChild.firstChild.src;
            div4.appendChild(imgZoom);
          }

    			$('.carousel').carousel(id);
    			$('#myModal').modal('show');
    		}
    	});
    }


    function boucle(arrayIndex) {
      index2 = index;
      for (i = arrayIndex; i < array.length; i++) {

        if ($.inArray( array[i].name, arrayName) != -1) {
          albumValide = false;
        } else {
          albumValide = true;
        }

        if (array[i].photo_count > 0 && albumValide) {
          index2++;
          if (index < number) {
            index++;

            div = document.createElement('div');
            div.className = 'background-white';
            div.id = 'album' + i;
            el.appendChild(div);

            nameh = document.createElement('h3');
            newLinkText = document.createTextNode(array[i].name);
            nameh.className = 'text-center';
            nameh.appendChild(newLinkText);
            div.appendChild(nameh);

            div2 = document.createElement('div');
            div2.className = 'row';
            div.appendChild(div2);

            array2 = array[i].photos;

            for (j = 0; j < array2.length; j++) {
              div3 = document.createElement('div');
              div3.className = 'col-sm-3';
              div2.appendChild(div3);

              a = document.createElement('a');
              a.href = '';
              a.className = 'center-block img-facebook img-zoom';
              div3.appendChild(a);

              img = document.createElement('img');
              img.src = array2[j].images[0].source;
              img.className = 'img-responsive center-block';
              img.id = j;
              a.appendChild(img);
            }
          }
          if (index2 == number + 1) {
            button = document.createElement('button');
            button.className = 'btn btn-lg btn-orange center-block';
            button.id = 'suite';
            newLinkText = document.createTextNode('Suivante ');
            span = document.createElement('span');
            span.className = 'glyphicon glyphicon-menu-down';
            p = document.createElement('p');
            button.appendChild(newLinkText);
            button.appendChild(p);
            p.appendChild(span);
            el.appendChild(button);

            var ii = i + '';

            $('#suite').click(function() {
              number = number + 5;
              button.parentNode.removeChild(button);
              boucle(ii);
            });
          }
        }
      }
      zoom();
    }


    </script>

  </body>
</html>
