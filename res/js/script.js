(function ($) {
    $(function () {

        $('.sidenav').sidenav();
        $('#nav-mobile').sidenav({
            edge: 'right'
        });
        $('.parallax').parallax();
        $('.collapsible').collapsible();
        $('.fixed-action-btn').floatingActionButton();
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('.tap-target').tapTarget();
        $('.tap-target').tapTarget('open');
        $('.dropdown-trigger').dropdown({
            'constrainWidth': false
        });
        $('select').formSelect();

    }); // end of document ready
})(jQuery); // end of jQuery name space