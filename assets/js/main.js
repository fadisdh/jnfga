var $ = jQuery;

// Menu in Mobile and search
$(function(){
    $control = $('.menu-toggle');
    $controlIcon = $control.find('i');
    $menu = $('#mobile-menu');
    var opened = false;

    $control.click(function(event){
        event.preventDefault(); 
        
        if(opened){
            $menu.removeClass('open');
            $controlIcon.addClass('fa-bars');
            $controlIcon.removeClass('fa-times');
        }else{
            $menu.addClass('open');
            $controlIcon.removeClass('fa-bars');
            $controlIcon.addClass('fa-times');
        }

        opened = !opened;
    });

    $searchToggle = $('[search-toggle]');
    $searchForm = $('#search-form');

    $searchToggle.click(function(event){
        event.preventDefault();
        $searchForm.fadeToggle();
    });
});

// Header
$(function(){
    $window = $(window);
    $header = $('#site-header');

    $window.on('scroll', function(event){
        if($window.scrollTop() > 300){
            $header.addClass('fixed');
        }else{
            $header.removeClass('fixed');
        }
    })
});

$(function(){
    $slicks = $('.carousel>.slides').each(function(){
        var $this = $(this);
        var rtl = $this.data('rtl') == '1';
        var slidesToShow = $this.data('slides') || 1;
        var $prev = $this.parent().find(rtl ? '.right' : '.left');
        var $next = $this.parent().find(rtl ? '.left' : '.right');

        $this.on('afterChange init', function(event, slider){
            if(slider.currentSlide == 0){
                $prev.hide();
            }else{
                $prev.show();
            }

            if(slider.currentSlide == slider.slideCount - slidesToShow){
                $next.hide();
            }else{
                $next.show();
            }
        });
        
        $this.slick({
            rtl: rtl,
            infinite: false,
            slidesToShow: slidesToShow
        });

        $prev.click(function(){
            $this.slick('slickPrev');
        });
        
        $next.click(function(){
            $this.slick('slickNext');
        });
    });   
});

$(function(){
    $('[data-fancybox="artwork"]').fancybox({
        loop: true,
        buttons: [
            'close'
        ],
        closeClickOutside : true,
        animationEffect: 'zoom',
        caption: function(){
            var $this = $(this);
            var output = '<div class="artwork-info">';
            output += '<div class="title">' + $this.data('caption') + '</div>';
            output += '<div class="artist">' + $this.data('artist') + '</div>';
            output += '<div class="year">' + $this.data('year') + '</div>';
            output += '<div class="content">' + $this.data('content') + '</div>';
            output += '</div>';

            return output;
        }        
    });

    if(window.location.hash){
        $('#' + window.location.hash.slice(2)).click();
    }
});

$(function(){
    $('.filterable').each(function(){
        var $filterable = $(this);
        var $actions = $filterable.find('[data-action]');
        var $items = $filterable.find('[data-filter]');
        var $more = $filterable.find('.more');

        var count = parseInt($filterable.data('count')) || 8;
        var page = 1;
        var filter = $filterable.data('action') || '';
        var update = function(){
            $items.hide();
            $more.show();
            var $filteredItems = $items;
            if(filter){
                $filteredItems = $filteredItems.filter('[data-filter="' + filter + '"]');
            }
            if(count * page >= $filteredItems.length) $more.hide(); 
            $filteredItems = $filteredItems.slice(0, count * page);
            $filteredItems.show();
        }

        $actions.click(function(event){
            event.preventDefault();
            var $this = $(this);
            
            $actions.removeClass('active');
            $this.addClass('active');

            page = 1;
            filter = $this.data('action');

            update();
        });

        $more.click(function(event){
            event.preventDefault();
            page++;
            update();
        });

        update();
    });
});

$(function(){
    var $filtersContainer = $('[data-events-filters]');
    var $prev = $filtersContainer.find('[data-prev]');
    var $next = $filtersContainer.find('[data-next]');
    var $side1 = $filtersContainer.find('[data-side1]');
    var $side2 = $filtersContainer.find('[data-side2]');
    var $main = $filtersContainer.find('[data-main]');
    var $search = $filtersContainer.find('[data-filter-search]');
    var $cats = $filtersContainer.find('[data-filter-cats]').find('input[type="checkbox"]');

    if($filtersContainer.data('locale') == 'ar'){
        moment.locale('ar');
    }

    var $typeMonth = $('#type-month');
    var $typeDay = $('#type-day');

    var type = 'month';
    var date = moment();
    var search = '';
    var cats = [];

    $cats.filter(':checked').each(function(){
        cats.push($(this).val());
    });

    var prevDay = function(){
        return date.clone().subtract(1, "day");
    }

    var nextDay = function(){
        return date.clone().add(1, "day");
    }

    var prevMonth = function(){
        return date.clone().subtract(1, "month");
    }

    var nextMonth = function(){
        return date.clone().add(1, "month");
    }

    var updateFilters = function(){
        $side1.html(type == 'month' ? prevMonth().format('MMM<br>Y') : prevDay().format('DD MMM<br>Y'));
        $side2.html(type == 'month' ? nextMonth().format('MMM<br>Y') : nextDay().format('DD MMM<br>Y'));
        $main.html(type == 'month' ? date.format('MMM Y') : date.format('DD MMM Y'));
        filter();
    }

    $next.click(function(event){
        event.preventDefault();
        date = type == 'month' ? nextMonth() : nextDay();
        updateFilters();
    });

    $prev.click(function(event){
        event.preventDefault();
        date =type == 'month' ? prevMonth() : prevDay();
        updateFilters();
    });

    $search.keyup(function(){
        search = $(this).val();
        filter();
    });

    $cats.change(function(){
        cats = [];
        $cats.filter(':checked').each(function(){
            cats.push($(this).val());
        });
        filter();
    });

    $typeMonth.click(function(){
        $typeMonth.addClass('active');
        $typeDay.removeClass('active');
        type = "month";
        updateFilters();
    });

    $typeDay.datepicker({
        language: $typeDay.data('locale'),
        position: 'bl',
        autoHide: true,
        pick: function(event){
            $typeDay.addClass('active');
            $typeMonth.removeClass('active');
            type = "day";
            date = moment(event.date);
            updateFilters();
            return false;
        }
    });

    var $eventsContainer = $('.events');
    var $events = $eventsContainer.find('[data-event]');

    var filter = function(){
        $events.show();

        var filterRange = [];
        var eventRange = [];

        if(type == 'month'){
            filterRange = [date.clone().startOf('month'), date.clone().endOf('month')];
        }else{
            filterRange = [date.clone().startOf('day'), date.clone().endOf('day')];
        }

        $events.each(function(){
            var $this = $(this);
            var title = $this.data('event');
            var from = $this.data('from');
            var to = $this.data('to');
            var cat = $this.data('cat');

            if(title.toLowerCase().search(search.toLowerCase()) == -1){
                $this.hide();
            }

            if($.inArray(cat, cats) == -1){
                $this.hide();
            }

            eventRange = [moment(from).startOf('day'), moment(to).endOf('day')];
            if(!areRangesOverlap(filterRange, eventRange)){
                $this.hide();
            }
        });
    }

    updateFilters();
});

var areRangesOverlap = function(range1, range2){
    return Math.max(range1[0], range2[0]) < Math.min(range1[1], range2[1]);
}

$(function(){
    $map = $('#map');
    $buildings = $map.find('.building');

    $buildings.mouseenter(function(){
        var $this = $(this);

        $this.animate({
            opacity: 1
        });

        $map.find($this.data('label')).animate({
            opacity: 1
        });
    });

    $buildings.mouseleave(function(){
        var $this = $(this);

        $this.animate({
            opacity: 0
        });

        $map.find($this.data('label')).animate({
            opacity: 0
        });
    });

    $buildings.click(function(){
        var $this = $(this);
        $target = $($this.data('link'));
        $('html, body').animate({
            scrollTop: $target.offset().top
        });
    });
});