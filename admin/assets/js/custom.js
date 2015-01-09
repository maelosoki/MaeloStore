(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
            /*====================================
            METIS MENU 
            ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));

// wysiwyg editor summernote
$(document).ready(function() {

	// initialise editor
	$('#produk').summernote({
		height: 200,
		onImageUpload: function(files, editor, welEditable) {
			sendFile(files[0], editor, welEditable);
		}
	});

	// send the file summernote
	function sendFile(file, editor, welEditable) {
			data = new FormData();
			data.append("file", file);
			$.ajax({
				data: data,
				type: 'POST',
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					if (myXhr.upload) myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
					return myXhr;
				},
				url: "upload.php",
				cache: false,
				contentType: false,
				processData: false,
				success: function(url) {
					editor.insertImage(welEditable, url);
				}
			});
	}

	// update progress bar summernote
	function progressHandlingFunction(e){
		if(e.lengthComputable){
			$('progress').attr({value:e.loaded, max:e.total});
			// reset progress on complete
			if (e.loaded == e.total) {
				$('progress').attr('value','0.0');
			}
		}
	}

});

// table footable
$(function () {
	$('.footable').footable();
});

// table footable filter
(function ($, w, undefined) {
    if (w.footable === undefined || w.footable === null)
        throw new Error('Please check and make sure footable.js is included in the page and is loaded prior to this script.');

    var defaults = {
        filter: {
            enabled: true,
            input: '.footable-filter',
            timeout: 5,
            minimum: 1,
            disableEnter: false,
            filterFunction: function(index) {
                var $t = $(this),
                    $table = $t.parents('table:first'),
                    filter = $table.data('current-filter').toUpperCase(),
                    text = $t.find('td').text();
                if (!$table.data('filter-text-only')) {
                    $t.find('td[data-value]').each(function () {
                        text += $(this).data('value');
                    });
                }
                return text.toUpperCase().indexOf(filter) >= 0;
            }
        }
    };

    function Filter() {
        var p = this;
        p.name = 'Footable Filter';
        p.init = function (ft) {
            p.footable = ft;
            if (ft.options.filter.enabled === true) {
                if ($(ft.table).data('filter') === false) return;
                ft.timers.register('filter');
                $(ft.table)
                    .unbind('.filtering')
                    .bind({
                        'footable_initialized.filtering': function (e) {
                            var $table = $(ft.table);
                            var data = {
                                'input': $table.data('filter') || ft.options.filter.input,
                                'timeout': $table.data('filter-timeout') || ft.options.filter.timeout,
                                'minimum': $table.data('filter-minimum') || ft.options.filter.minimum,
                                'disableEnter': $table.data('filter-disable-enter') || ft.options.filter.disableEnter
                            };
                            if (data.disableEnter) {
                                $(data.input).keypress(function (event) {
                                    if (window.event)
                                        return (window.event.keyCode !== 13);
                                    else
                                        return (event.which !== 13);
                                });
                            }
                            $table.bind('footable_clear_filter', function () {
                                $(data.input).val('');
                                p.clearFilter();
                            });
                            $table.bind('footable_filter', function (event, args) {
                                p.filter(args.filter);
                            });
                            $(data.input).keyup(function (eve) {
                                ft.timers.filter.stop();
                                if (eve.which === 27) {
                                    $(data.input).val('');
                                }
                                ft.timers.filter.start(function () {
                                    var val = $(data.input).val() || '';
                                    p.filter(val);
                                }, data.timeout);
                            });
                        },
                        'footable_redrawn.filtering': function (e) {
                            var $table = $(ft.table),
                                filter = $table.data('filter-string');
                            if (filter) {
                                p.filter(filter);
                            }
                        }
                })
                //save the filter object onto the table so we can access it later
                .data('footable-filter', p);
            }
        };

        p.filter = function (filterString) {
            var ft = p.footable,
                $table = $(ft.table),
                minimum = $table.data('filter-minimum') || ft.options.filter.minimum,
                clear = !filterString;

            //raise a pre-filter event so that we can cancel the filtering if needed
            var event = ft.raise('footable_filtering', { filter: filterString, clear: clear });
            if (event && event.result === false) return;
            if (event.filter && event.filter.length < minimum) {
              return; //if we do not have the minimum chars then do nothing
            }

          if (event.clear) {
                p.clearFilter();
            } else {
                var filters = event.filter.split(' ');

                $table.find('> tbody > tr').hide().addClass('footable-filtered');
                var rows = $table.find('> tbody > tr:not(.footable-row-detail)');
                $.each(filters, function (i, f) {
                    if (f && f.length > 0) {
                        $table.data('current-filter', f);
                        rows = rows.filter(ft.options.filter.filterFunction);
                    }
                });
                rows.each(function () {
                    p.showRow(this, ft);
                    $(this).removeClass('footable-filtered');
                });
                $table.data('filter-string', event.filter);
                ft.raise('footable_filtered', { filter: event.filter, clear: false });
            }
        };

        p.clearFilter = function () {
            var ft = p.footable,
                $table = $(ft.table);

            $table.find('> tbody > tr:not(.footable-row-detail)').removeClass('footable-filtered').each(function () {
                p.showRow(this, ft);
            });
            $table.removeData('filter-string');
            ft.raise('footable_filtered', { clear: true });
        };

        p.showRow = function (row, ft) {
            var $row = $(row), $next = $row.next(), $table = $(ft.table);
            if ($row.is(':visible')) return; //already visible - do nothing
            if ($table.hasClass('breakpoint') && $row.hasClass('footable-detail-show') && $next.hasClass('footable-row-detail')) {
                $row.add($next).show();
                ft.createOrUpdateDetailRow(row);
            }
            else $row.show();
        };
    }

    w.footable.plugins.register(Filter, defaults);

})(jQuery, window);

// table footable filter setting
$(function () {
	   $('table').footable({ bookmarkable: { enabled: true }}).bind({
		'footable_filtered': function() {
			var count = $('table.footable tbody tr:not(.footable-filtered)').length;
			$('.row-count').html(count + ' data ditemukan');
		}
	});

	$('.clear-filter').click(function (e) {
		e.preventDefault();
		$('.filter-status').val('');
		$('table.footable').trigger('footable_clear_filter');
		$('.row-count').html('');
	});
});

// table footable paginate
(function ($, w, undefined) {
	if (w.footable === undefined || w.footable === null)
		throw new Error('Please check and make sure footable.js is included in the page and is loaded prior to this script.');

	var defaults = {
		paginate: true,
		pageSize: 10,
		pageNavigation: '.pagination',
		firstText: '&laquo;',
		previousText: '&lsaquo;',
		nextText: '&rsaquo;',
		lastText: '&raquo;',
		limitNavigation: 0,
		limitPreviousText: '...',
		limitNextText: '...'
	};

	function pageInfo(ft) {
		var $table = $(ft.table), data = $table.data();
		this.pageNavigation = data.pageNavigation || ft.options.pageNavigation;
		this.pageSize = data.pageSize || ft.options.pageSize;
		this.firstText = data.firstText || ft.options.firstText;
		this.previousText = data.previousText || ft.options.previousText;
		this.nextText = data.nextText || ft.options.nextText;
		this.lastText = data.lastText || ft.options.lastText;
		this.limitNavigation = parseInt(data.limitNavigation || ft.options.limitNavigation || defaults.limitNavigation, 10);
		this.limitPreviousText = data.limitPreviousText || ft.options.limitPreviousText;
		this.limitNextText = data.limitNextText || ft.options.limitNextText;
		this.limit = this.limitNavigation > 0;
		this.currentPage = data.currentPage || 0;
		this.pages = [];
		this.control = false;
	}

	function Paginate() {
		var p = this;
		p.name = 'Footable Paginate';

		p.init = function (ft) {
			if (ft.options.paginate === true) {
				if ($(ft.table).data('page') === false) return;
				p.footable = ft;
				$(ft.table)
					.unbind('.paging')
					.bind({
						'footable_initialized.paging footable_row_removed.paging footable_redrawn.paging footable_sorted.paging footable_filtered.paging': function () {
							p.setupPaging();
						}
					})
					//save the filter object onto the table so we can access it later
					.data('footable-paging', p);
			}
		};

		p.setupPaging = function () {
			var ft = p.footable,
				$tbody = $(ft.table).find('> tbody');

			ft.pageInfo = new pageInfo(ft);

			p.createPages(ft, $tbody);
			p.createNavigation(ft, $tbody);
			p.fillPage(ft, $tbody, ft.pageInfo.currentPage);
		};

		p.createPages = function (ft, tbody) {
			var pages = 1;
			var info = ft.pageInfo;
			var pageCount = pages * info.pageSize;
			var page = [];
			var lastPage = [];
			info.pages = [];
			var rows = tbody.find('> tr:not(.footable-filtered,.footable-row-detail)');
			rows.each(function (i, row) {
				page.push(row);
				if (i === pageCount - 1) {
					info.pages.push(page);
					pages++;
					pageCount = pages * info.pageSize;
					page = [];
				} else if (i >= rows.length - (rows.length % info.pageSize)) {
					lastPage.push(row);
				}
			});
			if (lastPage.length > 0) info.pages.push(lastPage);
			if (info.currentPage >= info.pages.length) info.currentPage = info.pages.length - 1;
			if (info.currentPage < 0) info.currentPage = 0;
			if (info.pages.length === 1) {
				//we only have a single page
				$(ft.table).addClass('no-paging');
			} else {
				$(ft.table).removeClass('no-paging');
			}
		};

		p.createNavigation = function (ft, tbody) {
			var $nav = $(ft.table).find(ft.pageInfo.pageNavigation);
			//if we cannot find the navigation control within the table, then try find it outside
			if ($nav.length === 0) {
				$nav = $(ft.pageInfo.pageNavigation);
				//if the navigation control is inside another table, then get out
				if ($nav.parents('table:first').length > 0 && $nav.parents('table:first') !== $(ft.table)) return;
				//if we found more than one navigation control, write error to console
				if ($nav.length > 1 && ft.options.debug === true) console.error('More than one pagination control was found!');
			}
			//if we still cannot find the control, then don't do anything
			if ($nav.length === 0) return;
			//if the nav is not a UL, then find or create a UL
			if (!$nav.is('ul')) {
				if ($nav.find('ul:first').length === 0) {
					$nav.append('<ul />');
				}
				$nav = $nav.find('ul');
			}
			$nav.find('li').remove();
			var info = ft.pageInfo;
			info.control = $nav;
			if (info.pages.length > 0) {
				$nav.append('<li class="footable-page-arrow"><a data-page="first" href="#first">' + ft.pageInfo.firstText + '</a>');
				$nav.append('<li class="footable-page-arrow"><a data-page="prev" href="#prev">' + ft.pageInfo.previousText + '</a></li>');
				if (info.limit){
					$nav.append('<li class="footable-page-arrow"><a data-page="limit-prev" href="#limit-prev">' + ft.pageInfo.limitPreviousText + '</a></li>');
				}
				if (!info.limit){
					$.each(info.pages, function (i, page) {
						if (page.length > 0) {
							$nav.append('<li class="footable-page"><a data-page="' + i + '" href="#">' + (i + 1) + '</a></li>');
						}
					});
				}
				if (info.limit){
					$nav.append('<li class="footable-page-arrow"><a data-page="limit-next" href="#limit-next">' + ft.pageInfo.limitNextText + '</a></li>');
					p.createLimited($nav, info, 0);
				}
				$nav.append('<li class="footable-page-arrow"><a data-page="next" href="#next">' + ft.pageInfo.nextText + '</a></li>');
				$nav.append('<li class="footable-page-arrow"><a data-page="last" href="#last">' + ft.pageInfo.lastText + '</a></li>');
			}
			$nav.off('click', 'a[data-page]').on('click', 'a[data-page]', function (e) {
				e.preventDefault();
				var page = $(this).data('page');
				var newPage = info.currentPage;
				if (page === 'first') {
					newPage = 0;
				} else if (page === 'prev') {
					if (newPage > 0) newPage--;
				} else if (page === 'next') {
					if (newPage < info.pages.length - 1) newPage++;
				} else if (page === 'last') {
					newPage = info.pages.length - 1;
				} else if (page === 'limit-prev') {
					newPage = -1;
					var first = $nav.find('.footable-page:first a').data('page');
					p.createLimited($nav, info, first - info.limitNavigation);
					p.setPagingClasses($nav, info.currentPage, info.pages.length);
				} else if (page === 'limit-next') {
					newPage = -1;
					var last = $nav.find('.footable-page:last a').data('page');
					p.createLimited($nav, info, last + 1);
					p.setPagingClasses($nav, info.currentPage, info.pages.length);
				} else {
					newPage = page;
				}
				if (newPage >= 0){
					if (info.limit && info.currentPage != newPage){
						var start = newPage;
						while (start % info.limitNavigation !== 0){ start -= 1; }
						p.createLimited($nav, info, start);
					}
					p.paginate(ft, newPage);
				}
			});
			p.setPagingClasses($nav, info.currentPage, info.pages.length);
		};

		p.createLimited = function(nav, info, start){
			start = start || 0;
			nav.find('li.footable-page').remove();
			var i, page,
				$prev = nav.find('li.footable-page-arrow > a[data-page="limit-prev"]').parent(),
				$next = nav.find('li.footable-page-arrow > a[data-page="limit-next"]').parent();
			for (i = info.pages.length - 1; i >=0 ; i--){
				page = info.pages[i];
				if (i >= start && i < start + info.limitNavigation && page.length > 0) {
					$prev.after('<li class="footable-page"><a data-page="' + i + '" href="#">' + (i + 1) + '</a></li>');
				}
			}
			if (start === 0){ $prev.hide(); }
			else { $prev.show(); }
			if (start + info.limitNavigation >= info.pages.length){ $next.hide(); }
			else { $next.show(); }
		};

		p.paginate = function (ft, newPage) {
			var info = ft.pageInfo;
			if (info.currentPage !== newPage) {
				var $tbody = $(ft.table).find('> tbody');

				//raise a pre-pagin event so that we can cancel the paging if needed
				var event = ft.raise('footable_paging', { page: newPage, size: info.pageSize });
				if (event && event.result === false) return;

				p.fillPage(ft, $tbody, newPage);
				info.control.find('li').removeClass('active disabled');
				p.setPagingClasses(info.control, info.currentPage, info.pages.length);
			}
		};

		p.setPagingClasses = function (nav, currentPage, pageCount) {
			nav.find('li.footable-page > a[data-page=' + currentPage + ']').parent().addClass('active');
			if (currentPage >= pageCount - 1) {
				nav.find('li.footable-page-arrow > a[data-page="next"]').parent().addClass('disabled');
				nav.find('li.footable-page-arrow > a[data-page="last"]').parent().addClass('disabled');
			}
			if (currentPage < 1) {
				nav.find('li.footable-page-arrow > a[data-page="first"]').parent().addClass('disabled');
				nav.find('li.footable-page-arrow > a[data-page="prev"]').parent().addClass('disabled');
			}
		};

		p.fillPage = function (ft, tbody, pageNumber) {
			ft.pageInfo.currentPage = pageNumber;
			$(ft.table).data('currentPage', pageNumber);
			tbody.find('> tr').hide();
			$(ft.pageInfo.pages[pageNumber]).each(function () {
				p.showRow(this, ft);
			});
			ft.raise('footable_page_filled');
		};

		p.showRow = function (row, ft) {
			var $row = $(row), $next = $row.next(), $table = $(ft.table);
			if ($table.hasClass('breakpoint') && $row.hasClass('footable-detail-show') && $next.hasClass('footable-row-detail')) {
				$row.add($next).show();
				ft.createOrUpdateDetailRow(row);
			}
			else $row.show();
		};
	}

	w.footable.plugins.register(Paginate, defaults);

})(jQuery, window);