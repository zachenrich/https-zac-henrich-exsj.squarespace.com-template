$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    // $('.jumbotron-toggle').on('click', jumbotronToggle);

    jumbotronToggle();
});

function jumbotronToggle () {
    var $jumbotron = $('.jumbotron'),
        $jumbotronOverview = $('.overview'),
        height = $jumbotronOverview.outerHeight() + 'px';
  
    $('.jumbotron-toggle').on('click', function() {
        if ($('.jumbotron-collapsed').length === 0) {
                $jumbotronOverview.animate({
                    opacity: 0,
                    height: '30px'
                }, 500, function() {
                    togglePanelStyle();
                });
        } else {
            $jumbotronOverview.animate({
                opacity: 0
            }, 500, function() {
                $(this).animate({
                  height: height
                });
                togglePanelStyle();
            });
        }
    });

    function togglePanelStyle() {
        $jumbotronOverview.animate({
            opacity: 1
        });
        $jumbotron.toggleClass('jumbotron-collapsed');
    }
}
