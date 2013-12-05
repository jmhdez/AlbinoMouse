jQuery(document).ready(function($) {
    $('.social-buttons').one('mouseenter', function() {
        Socialite.load($(this)[0]);
    });
});