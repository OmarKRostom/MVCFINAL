    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/bootstrap-fileinput-master/js/fileinput.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/ion.rangeSlider-master/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/summernote.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/bootstrap3_player.js"></script>
    <script>
      (function($){
          $(window).load(function(){
              $(".playlist").mCustomScrollbar();
          });
      })(jQuery);
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
          height: 300,
          minHeight:300       // set focus to editable area after initializing summernote
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $(".profilepic,.website_logo").fileinput({
            showPreview: false,
            maxFileCount: 10,
            allowedFileExtensions: ["jpg", "jpeg", "png"]
          });
           $(".track-albumart").fileinput({
            showPreview: false,
            maxFileCount: 1,
            allowedFileExtensions: ["jpg", "jpeg", "png"]
          });
          $(".track-soundsfile").fileinput({
            showPreview: false,
            maxFileCount: 1,
            allowedFileExtensions: ["mp3", "ogg", "flac"]
          });
        });
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    	  $('.selectpicker').selectpicker();
    	});
    </script>
        <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Raleway::latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })(); </script>
  </body>
</html>
