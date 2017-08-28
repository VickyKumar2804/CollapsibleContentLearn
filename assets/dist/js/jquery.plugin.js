;(function ($, window, document, undefined) {
    'use strict';
    var $contentVisible, $contentHidden, $icons;

    var init = function () {
        $contentVisible = $('.collapsible-content--visible');
        $contentHidden = $contentVisible.next();
        $icons = $contentVisible.find('.collapsible-content--icon');
        $contentVisible.on('click', clickHandler);
    };
    $(document).ready(function () {
        init();
    });

    var clickHandler = function (event) {
        var index = $contentVisible.index(this),
            hiddenContent = $($contentHidden[index]),
            isHiddenContentShowing = hiddenContent.is(':visible');
        if (isHiddenContentShowing) {
            hiddenContent.slideUp();
        } else {
            hiddenContent.slideDown();
        }
        changeIcon(index, isHiddenContentShowing);

    }

    function changeIcon(index, isHiddenContnetShowing) {

        var $iconElement = $($icons[index]),
        $showIcon = $iconElement.data('showIcon'),
        $hideIcon = $iconElement.data('hideIcon'),
        addClass, removeClass;
        if(isHiddenContnetShowing){
            addClass = $showIcon;
            removeClass = $hideIcon;
        }else{
            addClass = $hideIcon;
            removeClass = $showIcon;
        }
        $iconElement.removeClass(removeClass).addClass(addClass);


    }

})(jQuery, window, document);