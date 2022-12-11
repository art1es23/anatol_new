<?PHP
/* Template Name: Contacts */

get_header(); ?>

<style>
<?php include 'css/components/template-form.css';
include 'css/page-templates/page-contact/contacts.css';
?>
</style>

<?php //get_template_part('template-parts/template-part-head-bg'); ?>

<div class="head_section contacts_head" style="linear-gradient(
      180deg,
      rgba(255, 255, 255, 0.9) 0%,
      #ffffff 100%
    ), url(<?php echo bloginfo('url');?>/wp-content/themes/anatol/images/bg-group.jpg);">
    <div class="container">
        <h1 class="head_title"><?php if( get_field( "alternative_title" )) { the_field("alternative_title"); } ?></h1>

        <?php if( get_field( "title_description" )) { ?>
        <div class="head_description et_pb_text_inner"><?php the_field("title_description"); ?></div>
        <?php } ?>

    </div>
</div>

<div class="contacts_form_block">
    <div class="contacts_form_block--wrapper container">

        <div class="left_column cont_datas">
            <h3 class="contact_line contact_line_header"><?php _e('World Headquarters', 'anatol'); ?></h3>

            <div class="contact_line et_had_animation">
                <h4 class="contact_line_header">
                    <span class="cont_ico ico_location"></span>
                    <span><?php _e('Location', 'anatol'); ?></span>
                </h4>
                <div class="contact_line__description">919 Sherwood Drive<br>
                    Lake Bluff, IL 60044, USA</div>
            </div>
            <div class="contact_line">
                <h4 class="contact_line_header">
                    <span class="cont_ico ico_phone"></span>
                    <span><?php _e('Phone', 'anatol'); ?></span>
                </h4>
                <div class="contact_line__description">847-367-9760</div>
            </div>
        </div>

        <div class="right_column cont_form ">
            <div class="form feedback_form">
                <h1 class="form-title cont_form_title"><?php _e('Send A Message', 'anatol'); ?></h1>

                <?php get_template_part('templates/forms/contact-form'); ?>
            </div>

        </div>
    </div>

    <?php get_template_part('template-parts/regional-offices'); ?>

    <style>
    #chartdiv {
        width: 100%;
        height: 680px;
        background: #272727;
    }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/geodata/continentsLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/dataviz.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_dataviz);
        am4core.useTheme(am4themes_animated);
        // Themes end
        /* Create map instance */
        var chart = am4core.create("chartdiv", am4maps.MapChart);
        /* Set map definition */
        chart.geodata = am4geodata_worldLow;
        chart.homeZoomLevel = 0;
        chart.chartContainer.wheelable = false;

        chart.homeGeoPoint = {
            latitude: 42,
            longitude: 12
        };
        /* Set projection */
        chart.projection = new am4maps.projections.Miller();
        /* Create map polygon series */
        var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
        /* Make map load polygon (like country names) data from GeoJSON */
        polygonSeries.useGeodata = true;
        /* Configure series */
        var polygonTemplate = polygonSeries.mapPolygons.template;
        polygonTemplate.tooltipHTML =
            "<div class='polgonhtml'><span class='headtooltip' style='color:#fff; font-family: Gilroy;font-size: 22px;'>{name}</span> <BR> <span class='descrtooltip'>{description}</span> </div>";
        polygonSeries.tooltip.getFillFromObject = false;
        polygonSeries.tooltip.background.fill = am4core.color("#000000b3");
        polygonSeries.tooltip.background.stroke = am4core.color("#272727");
        polygonSeries.tooltip.background.strokeWidth = 0;
        polygonTemplate.applyOnClones = true;
        polygonTemplate.togglable = true;
        polygonTemplate.tooltipText = "[font-family: 'RobotoCondensed-Bold' #fff]{name}[/]";
        polygonTemplate.tooltipHtml = "[font-family: 'Gilroy']{name}[/]";
        polygonTemplate.nonScalingStroke = true;
        polygonTemplate.strokeOpacity = 0.5;
        polygonTemplate.fill = chart.colors.getIndex(0);
        var lastSelected;
        polygonTemplate.events.on("hit", function(ev) {
            if (lastSelected) {
                lastSelected.isActive = false;
            }
            ev.target.series.chart.zoomToMapObject(ev.target);
            if (lastSelected !== ev.target) {
                lastSelected = ev.target;
            }
        });

        polygonTemplate.events.on("hit", function(ev) {
            var data = ev.target.dataItem.dataContext;

            if (data.value) {
                $(data.value)
                    .css('display', 'block')
                    .animate({
                        opacity: 1
                    }, 200);
                $('.nearest-block-shov').css('display', 'none');
            } else {

            }
        });

        var imageSeries = chart.series.push(new am4maps.MapImageSeries());
        // Create a circle image in image series template so it gets replicated to all new images
        var imageSeriesTemplate = imageSeries.mapImages.template;
        var circle = imageSeriesTemplate.createChild(am4core.Circle);
        circle.radius = 12;
        circle.fill = am4core.color("#a32030");
        circle.stroke = am4core.color("#a32030");
        circle.strokeWidth = 0;
        circle.nonScaling = true;

        circle.tooltipPosition = "fixed";
        imageSeries.tooltip.label.interactionsEnabled = true;
        imageSeries.tooltip.keepTargetHover = true;

        circle.tooltipHTML = "{html}";
        // Set property fields
        imageSeriesTemplate.propertyFields.latitude = "latitude";
        imageSeriesTemplate.propertyFields.longitude = "longitude";
        imageSeriesTemplate.propertyFields.fill = "fill";
        imageSeries.tooltip.background.stroke = am4core.color("#000000b3");
        imageSeries.tooltip.getFillFromObject = false;
        imageSeries.tooltip.background.fill = am4core.color("#000000b3");

        // Add data for the three cities
        imageSeries.data = [{
                "latitude": 52.76512,
                "longitude": 23.18647,
                "html": "<div class='open_full_start polgonhtml'><span class='headtooltip'>Anatol Europe <br>European Headquarters</span><br> <span class='descrtooltip'>Bielsk Podlaski, Poland</span></div>"

            }, {
                "latitude": 49.842957,
                "longitude": 24.031111,
                "html": "<div class='open_full_start polgonhtml'><span class='headtooltip'>Anatol Ukraine <br>European Office</span><br> <span class='descrtooltip'>Lviv, Ukraine</span></div>",
            }, {
                "latitude": 42.280124,
                "longitude": -87.90732,
                "html": "<div class='open_full_start polgonhtml'><span class='headtooltip'>Anatol Equipment Manufacturing Co. <br>World Headquarters</span><br> <span class='descrtooltip'>Lake Bluff, IL 60044, USA</span></div>"
            }, {
                "latitude": 6.230833,
                "longitude": -75.590553,
                "html": "<div class='open_full_start polgonhtml'><span class='headtooltip'>Anatol Latin America <br>Latin American Office</span><br> <span class='descrtooltip'>Colombia</span></div>"
            }
            /*

            , {
                "latitude": 51.169392,
                "longitude": 71.449074,
                "html": "<div class='open_full_start polgonhtml'><span class='headtooltip'>Ironman 70.3</span><br> <span class='descrtooltip'>Astana, Kazakhstan</span></div>"
            }

            */
        ];

        var ss = polygonTemplate.states.create("active");
        ss.properties.fill = chart.colors.getIndex(2);
        var hs = polygonTemplate.states.create("hover");
        hs.properties.fill = chart.colors.getIndex(4);
        // life expectancy data
        /*         polygonSeries.data = [
                    { id: "IT", "value": "#post-325", "name": "Ironman Emilia-Romagna", "description": "Cervia, Italy"},
                    { id: "PT", "value": "#post-300", "name": "IRONMAN 70.3", "description": "Cascais, Portugal"},
                    { id: "TR", "value": "#post-308", "name": "Ironman 70.3 Turkey", "description": "Belek, Antalya"},
                    { id: "EE", "value": "#post-53", "name": "IRONMAN 70.3/Ironman Tallinn", "description": "OtepГ¤Г¤/Harjumaa, Estonia"},
                    { id: "PL", "value": "#post-163", "name": "Ironman 70.3", "description": "Gdynia, Poland"},
                    { id: "AT", "value": "#post-313", "name": "Ironman Austria KГ¤rnten", "description": "Klagenfurt, Austria"},
                    { id: "DK", "value": "#post-321", "name": "Ironman", "description": "Copenhagen, Denmark"  },
                    { id: "ES", "value": "#post-329", "name": "Ironman Barcelona", "description": "Calella, Spain"  },	
                    { id: "VN", "value": "#post-377", "name": "Ironman", "description": "Da Nang, Vietnam"  },
                    { id: "KZ", "value": "#post-369", "name": "Ironman Barcelona", "description": "Astana, Kazakhstan"  }		 
                ]; */
        // Hide Antarctica
        polygonSeries.exclude = ["AQ"];

        // Small map
        //  chart.smallMap = new am4maps.SmallMap();
        // Re-position to top right (it defaults to bottom left)
        //  chart.smallMap.align = "right";
        //    chart.smallMap.valign = "top";
        //    chart.smallMap.series.push(polygonSeries);

        // Zoom control
        chart.zoomControl = new am4maps.ZoomControl();

        var homeButton = new am4core.Button();
        homeButton.events.on("hit", function() {
            chart.goHome();
        });
        homeButton.icon = new am4core.Sprite();
        homeButton.padding(7, 5, 7, 5);
        homeButton.width = 30;
        homeButton.icon.path =
            "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8";
        homeButton.marginBottom = 10;
        homeButton.parent = chart.zoomControl;
        homeButton.insertBefore(chart.zoomControl.plusButton);
        // Configure series
        var polygonTemplate = polygonSeries.mapPolygons.template;
        polygonTemplate.fill = am4core.color("#393939");

        polygonTemplate.stroke = am4core.color("#272727");
        // Create hover state and set alternative fill color
        var hs = polygonTemplate.states.create("hover");
        hs.properties.fill = am4core.color("#a21f2f");

        chart.backgroundSeries.mapPolygons.template.polygon.fill = am4core.color("#272727");
        chart.backgroundSeries.mapPolygons.template.polygon.fillOpacity = 1;

        var open_fulls = $('.open_full');
        $('.open_full, .head-news-container').click(

            function zoomToMapObject(event) {
                event.preventDefault();

                var divs = $(this).attr('id');
                console.log($(divs));

                // Pre-zoom
                chart.zoomToMapObject(polygonSeries.getPolygonById(divs));
                setTimeout(function() {
                    polygonSeries.getPolygonById(divs).isActive = true;
                }, 1000);

                $('.modal_close, #overlay').click(function() {
                    setTimeout(function() {
                        polygonSeries.getPolygonById(divs).isActive = false;
                    }, 1000);
                    chart.goHome();
                });
            });

        $('.open_full, .head-news-container, .footer-starts li a').click(

            function zoomToMapObject(event) {
                event.preventDefault();

                var divs = $(this).attr('id');
                console.log($(divs));

                // Pre-zoom
                chart.zoomToMapObject(polygonSeries.getPolygonById(divs));
                setTimeout(function() {
                    polygonSeries.getPolygonById(divs).isActive = true;
                }, 1000);

                $('.modal_close, #overlay').click(function() {
                    setTimeout(function() {
                        polygonSeries.getPolygonById(divs).isActive = false;
                    }, 1000);
                    chart.goHome();
                });

            });

    }); // end am4core.ready()
    $(document).ready(function() {
        $("#__vtigerWebForm.contactForm1").submit(function(e) {
            e.preventDefault();
            var formweb = $(this);

            function send_true() {
                $('.clear_form').val('');
                $('.submit_form').val('Message sent');
                $('.submit_form').attr('disabled', 'true');
            }
            var url = 'https://sale.anatol.com/modules/Webforms/capture.php';
            translate_kurul('#__vtigerWebForm.contactForm1');
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfVhtMUAAAAANWXok-9PsISTBoAZUHg-9rBr6Db', {
                    action: 'submit'
                }).then(function(token) {
                    console.log(token)
                    $.post(
                        url,
                        formweb.serialize(),
                        send_true()
                    )
                });
            });
        });
    });
    </script>

    <?php get_footer(); ?>