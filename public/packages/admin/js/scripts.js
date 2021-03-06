(function($) {
    "use strict";
    $(document).ready(function() {
        /*==Left Navigation Accordion ==*/
        if ($.fn.dcAccordion) {
            $('#nav-accordion').dcAccordion({
                eventType: 'click',
                autoClose: true,
                saveState: true,
                disableLink: true,
                speed: 'slow',
                showCount: false,
                autoExpand: true,
                classExpand: 'dcjq-current-parent'
            });
        }
        /*==Slim Scroll ==*/
        if ($.fn.slimScroll) {
            $('.event-list').slimscroll({
                height: '305px',
                wheelStep: 20
            });
            $('.conversation-list').slimscroll({
                height: '360px',
                wheelStep: 35
            });
            $('.to-do-list').slimscroll({
                height: '300px',
                wheelStep: 35
            });
        }
        /*==Nice Scroll ==*/
        if ($.fn.niceScroll) {


            $(".leftside-navigation").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });

            $(".leftside-navigation").getNiceScroll().resize();
            if ($('#sidebar').hasClass('hide-left-bar')) {
                $(".leftside-navigation").getNiceScroll().hide();
            }
            $(".leftside-navigation").getNiceScroll().show();

            $(".right-stat-bar").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });

        }


        /*==Collapsible==*/
        $('.widget-head').click(function(e) {
            var widgetElem = $(this).children('.widget-collapse').children('i');

            $(this)
                .next('.widget-container')
                .slideToggle('slow');
            if ($(widgetElem).hasClass('ico-minus')) {
                $(widgetElem).removeClass('ico-minus');
                $(widgetElem).addClass('ico-plus');
            } else {
                $(widgetElem).removeClass('ico-plus');
                $(widgetElem).addClass('ico-minus');
            }
            e.preventDefault();
        });



        /*==Sidebar Toggle==*/

        $(".leftside-navigation .sub-menu > a").click(function() {
            var o = ($(this).offset());
            var diff = 80 - o.top;
            if (diff > 0)
                $(".leftside-navigation").scrollTo("-=" + Math.abs(diff), 500);
            else
                $(".leftside-navigation").scrollTo("+=" + Math.abs(diff), 500);
        });



        $('.sidebar-toggle-box .fa-bars').click(function(e) {

            $(".leftside-navigation").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });

            $('#sidebar').toggleClass('hide-left-bar');
            if ($('#sidebar').hasClass('hide-left-bar')) {
                $(".leftside-navigation").getNiceScroll().hide();
            }
            $(".leftside-navigation").getNiceScroll().show();
            $('#main-content').toggleClass('merge-left');
            e.stopPropagation();
            if ($('#container').hasClass('open-right-panel')) {
                $('#container').removeClass('open-right-panel')
            }
            if ($('.right-sidebar').hasClass('open-right-bar')) {
                $('.right-sidebar').removeClass('open-right-bar')
            }

            if ($('.header').hasClass('merge-header')) {
                $('.header').removeClass('merge-header')
            }


        });
        // $('.toggle-right-box .fa-bars').click(function(e) {
        //     $('#container').toggleClass('open-right-panel');
        //     $('.right-sidebar').toggleClass('open-right-bar');
        //     $('.header').toggleClass('merge-header');

        //     e.stopPropagation();
        // });

        $('.header,#main-content,#sidebar').click(function() {
            if ($('#container').hasClass('open-right-panel')) {
                $('#container').removeClass('open-right-panel')
            }
            if ($('.right-sidebar').hasClass('open-right-bar')) {
                $('.right-sidebar').removeClass('open-right-bar')
            }

            if ($('.header').hasClass('merge-header')) {
                $('.header').removeClass('merge-header')
            }


        });


        $('.panel .tools .fa').click(function() {
            var el = $(this).parents(".panel").children(".panel-body");
            if ($(this).hasClass("fa-chevron-down")) {
                $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
                el.slideUp(200);
            } else {
                $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
                el.slideDown(200);
            }
        });



        $('.panel .tools .fa-times').click(function() {
            $(this).parents(".panel").parent().remove();
        });

        // tool tips

        $('.tooltips').tooltip();

        // popovers

        $('.popovers').popover();


    });

    $('.address-same').change(function() {
        console.log('change');
        if (this.checked) {
            $("input[name ='contact-address-line-1']").val($("input[name ='permanent-address-line-1']").val());
            $("input[name ='contact-address-line-2']").val($("input[name ='permanent-address-line-2']").val());
            $("input[name ='contact-city']").val($("input[name ='permanent-city']").val());
            $("input[name ='contact-state']").val($("input[name ='permanent-state']").val());
            $("input[name ='contact-country']").val($("input[name ='permanent-country']").val());
        } else {
            $("input[name *='contact']").val('');
        }

    });


    // disabling dates
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#event-start-date').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#event-end-date')[0].focus();
    }).data('datepicker');
    var checkout = $('#event-end-date').datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');

    //date pickers

    var publish_date = $('#publish-date').datepicker();
    var digital_end_date = $('#digital-end-date').datepicker();
    var print_end_date = $('#print-end-date').datepicker();

    $('.confirm-edit').click(function(e) {
        var link = $(this).attr('href');
        e.preventDefault();

        bootbox.confirm("Are you sure?", function(result) {
            if (result) {

                window.location.href = link;
            }
        });
    })

    $('.confirm-delete').click(function(e) {
        e.preventDefault();

        bootbox.confirm("Are you sure?", function(result) {
            if (result) {

                $(".delete-request-form").submit()
            }
        });
    })


    CKEDITOR.stylesSet.add('default', [{
            name: 'two image wrap',
            element: 'div',
            styles: {
                'overflow': 'hidden'
            }
        },

        {
            name: 'two image col',
            element: 'div',
            styles: {
                'float': 'left',
                'width': '50%'
            }
        },

        /* Object Styles */
        {
            name: 'Page title',
            element: 'h1',
            attributes: {
                'class': 'page-heading'
            }
        },

        {
            name: 'Image Left',
            element: 'img',
            attributes: {
                'class': 'img-float-left'
            }
        },
        {
            name: 'Image Right',
            element: 'img',
            attributes: {
                'class': 'img-float-right'
            }
        },
        {
            name: 'Sub Heading1',
            element: 'h2',
            attributes: {
                'class': 'sub-heading'
            }
        },
        {
            name: 'Sub Heading2',
            element: 'h3',
            attributes: {
                'class': 'sub-heading'
            }
        },


        {
            name: 'Red text',
            element: 'span',
            attributes: {
                'class': 'red-text'
            }
        },
        {
            name: 'Orange text',
            element: 'span',
            attributes: {
                'class': 'orange-text'
            }
        }
    ]);

    var config = {
        height: 300,
        filebrowserBrowseUrl: '/elfinder/ckeditor',
        // stylesSet: 'my_styles',
        toolbarGroups: [{
                name: 'clipboard',
                groups: ['clipboard', 'undo']
            }, {
                name: 'editing',
                groups: ['find', 'selection', 'spellchecker']
            }, {
                name: 'links'
            }, {
                name: 'insert'
            }, {
                name: 'forms'
            }, {
                name: 'tools'
            }, {
                name: 'document',
                groups: ['mode', 'document', 'doctools']
            }, {
                name: 'others'
            },
            //'/',
            {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup']
            }, {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi']
            }, {
                name: 'styles'
            }, {
                name: 'colors'
            }
        ]
    };

    if ($('#ckeditor1').length > 0) {
        CKEDITOR.replace('ckeditor1', config);
    }

    if ($('#ckeditor2').length > 0) {
        CKEDITOR.replace('ckeditor2', config);
    }
    if ($('#ckeditor3').length > 0) {
        CKEDITOR.replace('ckeditor3', config);
    }

})(jQuery);