<style>
<?php include locate_template('css/components/template-form.css');
?>
</style>

<?php 
    get_template_part('templates/components/forms/get-a-quote-form');
    get_template_part('templates/components/forms/subscribe-us-form');

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$parsed = parse_url($url);
	$path = $parsed['path'];
	$path_parts = explode('/', $path);
	$slug = $path_parts[1];

    if (is_page('support') || is_page('my-account') || $slug === "presses" || $slug === "conveyor-dryers" || $slug === "flash-cure-units" || $slug === "pre-press" || $slug === "accessories" ) {
        get_template_part('templates/components/forms/register-warranty-form');
    }
    
    if (is_page(1228)) {
        get_template_part('templates/components/forms/join-us-form');
    }

    if ($slug === "ebooks") {
        get_template_part('templates/components/forms/download-ebook-form');
    }
    
    if ($slug == "vacancies") {
        get_template_part('templates/components/forms/vacancy-contact-form');
    }


?>