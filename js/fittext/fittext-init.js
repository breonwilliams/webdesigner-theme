/**
 * Created by breon on 12/12/16.
 */
jQuery(function($) {
    $(document).ready(function() {
        $("#fittext1").fitText();
        $("#fittext2").fitText(1.2);
        $("#fittext3").fitText(1.1, { minFontSize: '50px', maxFontSize: '75px' });
        $("#fittext4").fitText(.6);
    });
});