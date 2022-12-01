

jQuery(function ($) {

  /* detect mobile devices */
  function detectmob() {
    if (navigator.userAgent.match(/Android/i)
      || navigator.userAgent.match(/webOS/i)
      || navigator.userAgent.match(/iPhone/i)
      || navigator.userAgent.match(/iPad/i)
      || navigator.userAgent.match(/iPod/i)
      || navigator.userAgent.match(/BlackBerry/i)
      || navigator.userAgent.match(/Windows Phone/i)
    ) {
      return true;
    }
    else {
      return false;
    }
  }

  var is_mobile = detectmob();

  if (is_mobile) {
    $(".map-nav-wrap").addClass('mobile');
  } else {
    $(".map-nav-wrap").addClass('desctop');
/**/     $(".chosen-select").chosen({
      no_results_text: "No results. Search for a real country! ",
      search_contains: true,
      display_selected_options: false,
      include_group_label_in_selected: true
    });/* */
  }

  // process chosen
  $(".chosen-select").change(function (code, val) {
    // console.log($(this).val());
    // console.log(val['selected']);
    thereg = $(this).val(); //val['selected'];
    window.codes = $(this).val(); // val['selected'];
    selcont = $(this.options[this.selectedIndex]).closest('optgroup').prop('label');
    if (selcont == 'Europe') {
      loadEuropeMap();
      selcont = '3';
    }
    else if (selcont == 'United States') {
      loadUSMap();
      selcont = '1';
    }
    else if (selcont == 'South America') {
      loadSouthAmericaMap();
      selcont = '2';
    }
    else if (selcont == 'Africa') {
      loadAfricaMap();
      selcont = '4';
    }
    else if (selcont == 'Asia') {
      loadAsiaMap();
      selcont = '5';
    }
    else if (selcont == 'Oceania') {
      loadOceaniaMap();
      selcont = '6';
    }
    else if (selcont == 'Central America') {
      loadCentralAmericaMap();
      selcont = '7';
    }
    else if (selcont == 'North America') {
      loadNorthAmericaMap();
      selcont = '8';
    }
    else if (selcont == 'Caribbean Islands') {
      loadCaribbeanMap();
      selcont = '9';
    }
  });

  //world map function
  function loadWorldMap() {
    $('.gv-map').addClass('wide');
    $('.profiles-wrap').removeClass('visible');

    $('.gv-border').css('border-color', '#222222');
    $('#tm-content').removeClass().addClass('tm-content');
    $('.gv-changer').html('');
    $('.gv-contintents').removeClass('button-primary');
    $('.gv-world').addClass('button-primary');
    $('.profiles-list .profile-item').addClass('hide');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    gvworld = $('#map').vectorMap({
      map: 'continents_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      backgroundColor: "#fff",
      onRegionClick: function (event, code) {
        if (code == 'EU') {
          loadEuropeMap();
        }
        else if (code == 'NA') {
          loadNorthAmericaMap();
        }
        else if (code == 'SA') {
          loadSouthAmericaMap();
        }
        else if (code == 'AS') {
          loadAsiaMap();
        }
        else if (code == 'AF') {
          loadAfricaMap();
        }
        else if (code == 'OC') {
          loadOceaniaMap();
        }
      },
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      markerStyle: {
        initial: {
          fill: '#F8E23B',
          stroke: '#383f47'
        }
      },
      markers: [
        { latLng: [19.90, -72.45], name: 'Caribbean Islands' },
        { latLng: [11.90, -84.0], name: 'Central America' }
      ],
      onMarkerClick: function (well, index) {
        if (index == 1) {
          loadCentralAmericaMap();
        }
      },
      regionStyle: {
        initial: {
          fill: '#a1d99b',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        }
      },
      series: {
        regions: [{
          values: {
            'EU': '#3C89C9',
            'NA': '#C6250A',
            'SA': '#F25A4A',
            'AS': '#74B144',
            'AF': '#4CAEFF',
            'OC': '#7ACC47'
          },
          attribute: 'fill'
        }]
      },
      markerStyle: {
        initial: {
          fill: '#f0a200',
          stroke: '#505050',
          "fill-opacity": 1,
          "stroke-width": 0,
          "stroke-opacity": 1,
          r: 12
        },
        hover: {
          fill: '#f9ba48',
          cursor: 'pointer'
        },
        selected: {
          fill: 'blue'
        },
        selectedHover: {
        }
      },
      onMarkerClick: function (event, code) {
        if (code == 0) {
          loadCaribbeanMap();
        }
        if (code == 1) {
          loadCentralAmericaMap();
        }
      }
    });
  }

  // load the world map
  loadWorldMap();

  // europe map function
  function loadEuropeMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $('.gv-border').css('border-color', '#3c89c9');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-europe-reg');
    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('3', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Europe');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-europe').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    gvworld = $('#map').vectorMap({
      map: 'europe_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          mainusr = $(this).attr('data-usr');
          if (mainusr == '2') {
            subregion[0] = 0;
          }

          tohide = jQuery.inArray('3', continent);
          subreghide = jQuery.inArray(code, subregion);
          if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#3C89C9',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8,
        },
        selected: {
          fill: '#C6250A'
        }
      }
    });

    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }

    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        mainusr = $(this).attr('data-usr');

        if (mainusr == '2') {
          subregion[0] = 0;
        }

        tohide = jQuery.inArray('3', continent);
        subreghide = jQuery.inArray(window.codes, subregion);

        if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
          $(this).addClass("hide");
        }

        else {
          $(this).removeClass("hide");
        }
      });
    }
  }
  // US map function
  function loadUSMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      ustohide = jQuery.inArray('1', continent);
      if (ustohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('United States of America');
    $('.gv-border').css('border-color', '#C6250A');
    $('#tm-content').removeClass().addClass('tm-content');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-northa').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'us_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('1', continent);
          subreghide = jQuery.inArray(code, subregion);
          if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#C6250A',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#3C89C9'
        }
      },
      regionLabelStyle: {
        initial: {
          fill: '#fff'
        },
        hover: {
          fill: 'black'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('1', continent);
        subreghide = jQuery.inArray(window.codes, subregion);
        if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      delete codes;
    }
  }

  // North America map function
  function loadNorthAmericaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('1', continent);
      tohide1 = jQuery.inArray('8', continent);
      if (tohide == -1 && tohide1 == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('North America');
    $('.gv-border').css('border-color', '#C6250A');
    $('#tm-content').removeClass().addClass('tm-content');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-northa1').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'north_america_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        if (code == 'US') {
          delete thereg;
          $(".chosen-select").val('').trigger('chosen:updated');
          loadUSMap();
          return;
        }
        if (code == 'GT' || code == 'NI' || code == 'HN' || code == 'PA' || code == 'CR' || code == 'BZ' || code == 'SV') {
          delete thereg;
          window.codes = 'CA-' + code;
          loadCentralAmericaMap();
          return;
        }
        else {
          $(".profiles-list .profile-item").each(function (index, element) {
            continent = $(this).attr('data-continent').split(',');
            subregion = $(this).attr('data-country').split(',');
            tohide = jQuery.inArray('1', continent);
            tohide1 = jQuery.inArray('8', continent);
            subreghide = jQuery.inArray(code, subregion);
            if ((tohide == -1 && tohide1 == -1) || subreghide == -1) {
              $(this).addClass("hide");
            }
            else {
              $(this).removeClass("hide");
            }
          });
          if ($('.profiles-list').children(':visible').length == 0) {
            $(".profiles-list .profile-item").each(function (index, element) {
              dispusr = $(this).attr('data-usr');
              if (dispusr == 74) {
                $(this).show();
              }
            });
          }
          $('.chosen-select').val(code);
          $('.chosen-select').trigger("chosen:updated");
        }
      },
      regionStyle: {
        initial: {
          fill: '#C6250A',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#3C89C9'
        }
      },
      regionLabelStyle: {
        initial: {
          fill: '#fff'
        },
        hover: {
          fill: 'black'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('1', continent);
        tohide1 = jQuery.inArray('8', continent);
        subreghide = jQuery.inArray(window.codes, subregion);
        if ((tohide == -1 && tohide1 == -1) || subreghide == -1) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      if ($('.profiles-list').children(':visible').length == 0) {
        $(".profiles-list .profile-item").each(function (index, element) {
          dispusr = $(this).attr('data-usr');
          if (dispusr == 74) {
            $(this).show();
          }
        });
      }
      delete codes;
    }
  }

  // south america map function
  function loadSouthAmericaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('2', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('South America');
    $('.gv-border').css('border-color', '#f25a4a');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-southa-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-southa').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'south_america_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {

        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('2', continent);
          subreghide = jQuery.inArray(code, subregion);

          if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
          dispusr = $(this).attr('data-usr');
          if (dispusr == 15) {
            $(this).show();
          }
        });
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#F25A4A',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#12A557'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('2', continent);
        subreghide = jQuery.inArray(window.codes, subregion);

        if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
        dispusr = $(this).attr('data-usr');
        if (dispusr == 15) {
          $(this).show();
        }
      });
      delete codes;
    }
  }

  // africa map function
  function loadAfricaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('4', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Africa');
    $('.gv-border').css('border-color', '#4caeff');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-africa-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-africa').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'africa_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('4', continent);
          subreghide = jQuery.inArray(code, subregion);
          mainusr = $(this).attr('data-usr');
          //if(mainusr == '9') {
          //	subregion[0] = 0;
          //}
          if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#4CAEFF',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#FFB94C'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('4', continent);
        subreghide = jQuery.inArray(window.codes, subregion);
        mainusr = $(this).attr('data-usr');
        if (mainusr == '9') {
          subregion[0] = 0;
        }
        if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      delete codes;
    }
  }

  // asia map function
  function loadAsiaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('5', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Asia');
    $('.gv-border').css('border-color', '#74b144');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-asia-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-asia').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'asia_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('5', continent);
          subreghide = jQuery.inArray(code, subregion);
          if (tohide == -1 || subreghide == -1) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        if ($('.profiles-list').children(':visible').length == 0) {
          $(".profiles-list .profile-item").each(function (index, element) {

            continent = $(this).attr('data-continent').split(',');
            subregion = $(this).attr('data-country').split(',');
            tohide = jQuery.inArray('5', continent);

          });
        }
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#74B144',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#A944B1'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {

        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('5', continent);
        subreghide = jQuery.inArray(window.codes, subregion);

        if (tohide == -1 || subreghide == -1) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      if ($('.profiles-list').children(':visible').length == 0) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('5', continent);

          if (tohide != -1) {
            $(this).show();
          }

        });
      }
      delete codes;
    }
  }

  // oceania map function
  function loadOceaniaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('6', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Oceania');
    $('.gv-border').css('border-color', '#7acc47');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-oceania-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-oceania').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'oceania_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('6', continent);
          subreghide = jQuery.inArray(code, subregion);
          if (tohide == -1 || subreghide == -1) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        if ($('.profiles-list').children(':visible').length == 0) {
          $(".profiles-list .profile-item").each(function (index, element) {

            continent = $(this).attr('data-continent').split(',');
            subregion = $(this).attr('data-country').split(',');
            tohide = jQuery.inArray('5', continent);

            if (dispusr == 5) {
              $(this).show();
            }
          });
        }
        //	if($('.profiles-list').children(':visible').length == 0) {
        //	$( ".profiles-list .profile-item" ).each( function( index, element ){
        //		dispusr = $(this).attr('data-usr');
        //		if(dispusr == 5) {
        //			$(this).show();
        //		}
        //	});
        //}
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#7ACC47',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8,
        },
        selected: {
          fill: '#7D137F'
        }
      }
    });
    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('6', continent);
        subreghide = jQuery.inArray(window.codes, subregion);
        if (tohide == -1 || subreghide == -1) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      if ($('.profiles-list').children(':visible').length == 0) {
        $(".profiles-list .profile-item").each(function (index, element) {
          dispusr = $(this).attr('data-usr');
          if (dispusr == 5) {
            $(this).show();
          }
        });
      }
      delete codes;
    }
  }

  // central america map function
  function loadCentralAmericaMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('7', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Central America');
    $('.gv-border').css('border-color', '#f0a200');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-centrala-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-centrala').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'central_america_map',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: true,
      regionsSelectableOne: true,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionClick: function (event, code) {
        $(".profiles-list .profile-item").each(function (index, element) {
          continent = $(this).attr('data-continent').split(',');
          subregion = $(this).attr('data-country').split(',');
          tohide = jQuery.inArray('7', continent);
          subreghide = jQuery.inArray(code, subregion);
          if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
            $(this).addClass("hide");
          }
          else {
            $(this).removeClass("hide");
          }
        });
        $('.chosen-select').val(code);
        $('.chosen-select').trigger("chosen:updated");
      },
      regionStyle: {
        initial: {
          fill: '#f0a200',
          "fill-opacity": 1,
          stroke: '#fff',
          "stroke-width": 1,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 0.8
        },
        selected: {
          fill: '#003DA3'
        }
      }
    });

    if (typeof thereg != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(thereg);
    }
    if (typeof window.codes != 'undefined') {
      var mapObject = $('#map').vectorMap('get', 'mapObject');
      mapObject.setSelectedRegions(window.codes);
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('7', continent);
        subreghide = jQuery.inArray(code, subregion);
        if (tohide == -1 || subreghide == -1 && subregion[0] != 0) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      delete codes;
    }
  }

  // Caribbean map function
  function loadCaribbeanMap() {
    $('.gv-map').removeClass('wide');
    $('.profiles-wrap').addClass('visible');

    $(".profiles-list .profile-item").each(function (index, element) {
      continent = $(this).attr('data-continent').split(',');
      tohide = jQuery.inArray('9', continent);
      if (tohide == -1) {
        $(this).addClass("hide");
      }
      else {
        $(this).removeClass("hide");
      }
    });
    $('.gv-changer').html('Caribbean Islands');
    $('.gv-border').css('border-color', '#af0000');
    $('#tm-content').removeClass().addClass('tm-content').addClass('gv-northa-reg');
    $('.gv-contintents').removeClass('button-primary').blur();
    $('.gv-caribbean').addClass('button-primary');
    $("#map").html('');
    $(".jvectormap-tip").remove();
    $('#map').vectorMap({
      map: 'continents_mill',
      zoomButtons: false,
      zoomOnScroll: false,
      regionsSelectable: false,
      backgroundColor: "#fff",
      onRegionOver: function (element, code, region, event) {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          e.preventDefault();
        }
      },
      onRegionOut: function (event, code) {
        document.body.style.cursor = 'default';
      },
      onRegionClick: function (event, code) {
        document.body.style.cursor = 'default';
        return false;
      },
      markerStyle: {
        initial: {
          fill: '#F8E23B',
          stroke: '#383f47'
        }
      },
      markers: [
        { latLng: [19.90, -72.45], name: 'Caribbean Islands' }
      ],
      markerStyle: {
        initial: {
          fill: '#af0000',
          stroke: '#af0000',
          "fill-opacity": 1,
          "stroke-width": 0,
          "stroke-opacity": 1,
          r: 14
        },
        hover: {
          fill: '#af0000',
          cursor: 'default'
        },
        selected: {
          fill: 'blue'
        },
        selectedHover: {
        }
      },
      regionStyle: {
        initial: {
          fill: '#cccccc',
          "fill-opacity": 1,
          stroke: '#fff',
          "stroke-width": 1,
          "stroke-opacity": 1
        },
        hover: {
          "fill-opacity": 1,
          "cursor": "default"
        },
        selected: {
          fill: '#003DA3'
        },
        onRegionTipShow: function (e, tip, code) {
          e.preventDefault();
        },
        onRegionLabelShow: function (e, el, code) {
          e.preventDefault();
        }
      }
    });
    if (typeof window.codes != 'undefined') {
      $('.chosen-select').val(window.codes);
      $('.chosen-select').trigger("chosen:updated");
      $(".profiles-list .profile-item").each(function (index, element) {
        continent = $(this).attr('data-continent').split(',');
        subregion = $(this).attr('data-country').split(',');
        tohide = jQuery.inArray('9', continent);
        subreghide = jQuery.inArray(window.codes, subregion);
        if (tohide == -1 || subreghide == -1) {
          $(this).addClass("hide");
        }
        else {
          $(this).removeClass("hide");
        }
      });
      if ($('.profiles-list').children(':visible').length == 0) {
        $(".profiles-list .profile-item").each(function (index, element) {
          dispusr = $(this).attr('data-usr');
          if (dispusr == 16) {
            $(this).show();
          }
        });
      }
      delete codes;
    }
  }

  $(".profile-item .more-info").on("click", function (e) {
    if ($(this).hasClass("active")) {
      $(this)
        .removeClass("active")
        .next(".more-content").slideUp("active");
      $(this).text('More info');
    } else {
      $(".profile-item").find(".more-content").slideUp();
      $(this)
        .addClass("active")
        .next(".more-content").slideDown("active");
      $(this).text('Hide info');
    }
  });

  // navigation regions
  document.getElementById('gv-world').addEventListener('click', function () {
    delete thereg;
    loadWorldMap();
    $(".chosen-select").val('').trigger('chosen:updated');

  }, false);
  document.getElementById('gv-southa').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadSouthAmericaMap();

  }, false);
  document.getElementById('gv-caribbean').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadCaribbeanMap();

  }, false);
  document.getElementById('gv-europe').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadEuropeMap();

  }, false);
  document.getElementById('gv-northa').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadUSMap();

  }, false);
  document.getElementById('gv-northa1').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadNorthAmericaMap();

  }, false);
  document.getElementById('gv-africa').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadAfricaMap();

  }, false);
  document.getElementById('gv-oceania').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadOceaniaMap();

  }, false);
  document.getElementById('gv-asia').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadAsiaMap();

  }, false);
  document.getElementById('gv-centrala').addEventListener('click', function () {
    delete thereg;
    $(".chosen-select").val('').trigger('chosen:updated');
    loadCentralAmericaMap();

  }, false);
});
