
    <script src="_js/jquery-2.0.3.min.js"></script>
    <script src="_js/handlebars-v1.1.2.js"></script>
    <script src="_js/script.js"></script>
    <script type="text/javascript">

    $('button').hide();

    Actor.init({
    	choice: $('#q'),
    	form: $('form'),
    	listTemplate: $('#list_template').html(),
    	infoTemplate: $('#info_template').html(),
    	listContainer: $('.list_container'),
    	infoContainer: $('.info_container')
    });

    </script>
  </body>
</html>