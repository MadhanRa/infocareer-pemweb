        </div>
        <footer>
          <p class="footer text-center">Copyright 2021</p>
        </footer>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url_js('main.js') ?>"></script>
    <script>
      $(function(){
        let pathName = $(location).attr('pathname');
        pathName = pathName.split('/')[3];
        
        switch (pathName) {
          case "home":
            $('#sidebar ul li').removeClass('active'); 
            $('#home').addClass('active');
            break;
          case "profil":
            $('#sidebar ul li').removeClass('active'); 
            $('#profil').addClass('active');
            break;
          case "antrean":
            $('#sidebar ul li').removeClass('active'); 
            $('#antrean').addClass('active');
            break;
          default:
            $('#sidebar ul li').removeClass('active'); 
            $('#home').addClass('active');
            break;
        }
      });      
    </script>
  </body>
</html>