var Login = function() {

    var handleLogin = function() {

        $('#forget-password').click(function(){
            $('.login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').click(function(){
            $('.login-form').show();
            $('.forget-form').hide();
        });
    }

 
  

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();

            // init background slide images
            $('.login-bg').backstretch([
                "assets/admin/pages/img/login/dighali-pukhuri-guwahati-city.jpg",
                "assets/admin/pages/img/login/guwahati-city.jpg",
                "assets/admin/pages/img/login/guwahati-city-pg.jpg"
                ], {
                  fade: 1000,
                  duration: 8000
                }
            );

            $('.forget-form').hide();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});