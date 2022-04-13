    </div>
    <?php wp_footer() ?>

    <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var page =2;
    jQuery(function($){
        // init isotope
        var $grid = $('.main');
        $grid.isotope({
          // options
          itemSelector: '.card',
          percentPosition: true,
        });

        $('body').on('click', '.loadmore', function(e){

          var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
          };

          $.post(ajaxurl, data, function(response){
            if (response != '') {
              var $answer = $(response);

              //append items to grid
              $grid.append($answer)
              .isotope('appended', $answer);

              // layaout on imagesLoaded
              $grid.imagesLoaded(function(){
                $grid.isotope('layout');
              });
              page++;
            } else{
              $('.loadmore').text("No more Post!");
              $('.loadmore').attr("disabled", true);
              $('.loadmore').css("borderColor", "gray");
              $('.loadmore').css("color", "gray");
            }
          });
          e.preventDefault();
        });
    });
</script>
</body>
</html>