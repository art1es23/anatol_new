<?php
/**
 */
defined('ABSPATH') or die();

if (!class_exists('ROICalculator')) {
  class ROICalculator
  {

    public function __construct()
    {
      // add_action('after_setup_theme', array($this, 'theme_setup'));
      // add_action('widgets_init', array($this, 'widgets_init'));

      add_action('wp_ajax_register_roi_user_action', array($this, 'register_roi_user'));
      add_action('wp_ajax_nopriv_register_roi_user_action', array($this, 'register_roi_user'));


      add_action('wp_ajax_make_roi_calculation_action', array($this, 'make_roi_calculation'));
      add_action('wp_ajax_nopriv_make_roi_calculation_action', array($this, 'make_roi_calculation'));
    }

    /****************************
	function get_currency_and_code($country)
    {
      $info = array(
        'currency' => '',
        'phone_code' => ''
      );

      $url = 'https://restcountries.eu/rest/v1/name/' . $country;
      if (!function_exists('curl_init')) {
        wp_die('The cURL library is not installed.');
      }

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $country_info = json_decode(curl_exec($ch));
      curl_close($ch);

      // $info['info'] = $country_info;

      $info['currency'] = $country_info[0]->currencies[0];
      $info['phone_code'] = $country_info[0]->callingCodes[0];

      if (empty($info['currency']) || $info['currency'] == 'USD') {
        $info['currency'] = 'USD';
        $info['phone_code'] = '1';
      }

      return $info;
    }
	******************/

    /*
     Check if ROI user exists
     - return post id if email found
    */

    function is_roi_user_registered($email)
    {

      $query_args = array(
        'numberposts'  => 1,
        'post_type'    => 'calculation',
        'meta_key'    => 'email',
        'post_status' => 'publish',
        'meta_value'  => $email
      );
      $query = new WP_Query($query_args);
      if ($query->post_count) {
        return $query->post->ID;
      }
      return false;
    }

    /*
     Update ROI user fields
     - data - user data
     - user_id - post id
    */

    function update_roi_user_fields($data, $user_id)
    {
      update_field("first_name", $data['firstName'], $user_id);
      update_field("last_name", $data['lastName'], $user_id);
      update_field("email", $data['email'], $user_id);
      update_field("country", $data['country'], $user_id);
      update_field("state", $data['state'], $user_id);
     //update_field("currency", $data['currency'], $user_id);
     // update_field("phone_code", $data['phone_code'], $user_id);
    }

    function add_calculation_request($data)
    {

      $row = array(
        'time'  => current_time('Y-m-d H:i:s'),
        'fronts'  => $data['fronts'],
        'backs'  => $data['backs'],
        'shirts_per_hour'  => $data['shirtsPerHour'],
        'printers_per_press'  => $data['printersPerPress'],
        'printer_per_hour'  => $data['printerPerHour']
      );

      $i = add_row('calculation_requests', $row, $data['userId']);

      return $i;
    }

    /*
     Register new ROI user
    */

    function register_roi_user()
    {
      $data = $_POST['data'];
      $roi_user_id = $this->is_roi_user_registered(sanitize_email($data['email']));
      if (!$roi_user_id) {
        $new_calculation = array(
          'post_title'    => wp_strip_all_tags(sanitize_email($data['email'])),
          'post_type' => 'calculation',
          'post_status'   => 'publish'
        );
        $roi_user_id = wp_insert_post($new_calculation);
      }
      $data['roi_user_id'] = $roi_user_id;
      // Add fields
      $this->update_roi_user_fields($data, $roi_user_id);
      // Add return post id
      echo json_encode($data, JSON_UNESCAPED_UNICODE);
      wp_die();
    }

    /*
     Make calculation
    */

    function make_roi_calculation()
    {

      $data = $_POST['data'];

      $this->add_calculation_request($data);

      $result = array(
        'completion_time' => $this->completion_time($data),
        'hourly_wages' => $this->hourly_wages($data),
        'total_savings' => $this->total_savings($data),
        'total_savings_year' => $this->total_savings_year($data), 
        ///'currency' => $data['currency']
      );

      echo json_encode($result,  JSON_UNESCAPED_UNICODE);
      wp_die();
    }

    //-----------------------

    function completion_time($data)
    {

      $fronts = $data['fronts'];
      $backs = $data['fronts'];
      $shirts_per_hour = $data['shirtsPerHour'];
      $printer_count = $data['printersPerPress'];
      $printer_cost = $data['printerPerHour'];
      $currency = $data['currency'];

      $result = array(
        'manual' => '',
        'automatic' => '',
        'total' => ''
      );

      if (empty($currency)) {
        $currency = 'USD';
      }

      if (is_numeric($fronts) && is_numeric($backs) && is_numeric($shirts_per_hour) && is_numeric($printer_count) && is_numeric($printer_cost)) {

        if ($printer_count > 1) {
          $res1 = round((($fronts + $backs) / $shirts_per_hour) * $printer_count, 1);
        } else {
          $res1 = round(($fronts + $backs) / $shirts_per_hour, 1);
        }

        // only one workers
        if ($printer_count == 1) {
          $res2 = round(($fronts + $backs) / 348, 1);
        } else {
          $res2 = round(($fronts + $backs) / 540, 1);
        }
        $profit = $res1 - $res2;

        $result = array(
          'manual' => number_format($res1, 1),
          'automatic' => number_format($res2, 1),
          'total' => number_format($profit, 1)
        );
      }

      return $result;
    }

    //-----------------------

    function hourly_wages($data)
    {

      $fronts = $data['fronts'];
      $backs = $data['fronts'];
      $shirts_per_hour = $data['shirtsPerHour'];
      $printer_count = $data['printersPerPress'];
      $printer_cost = $data['printerPerHour'];
      $currency = $data['currency'];

      $result = array(
        'manual' => '',
        'automatic' => '',
        'total' => ''
      );

      if (empty($currency)) {
        $currency = 'USD';
      }

      if ($fronts != '' && $backs != '' && $shirts_per_hour != '' && $printer_count != '' && $printer_cost != '' && is_numeric($fronts) && is_numeric($backs) && is_numeric($shirts_per_hour) && is_numeric($printer_count) && is_numeric($printer_cost)) {
        if ($printer_count > 1) {
          $res1 = (($fronts + $backs) / $shirts_per_hour) * $printer_count;
        } else {
          $res1 = ($fronts + $backs) / $shirts_per_hour;
        }
        if ($printer_count == 1) {
          $res2 = ($fronts + $backs) / 348;
        } else {
          $res2 = ($fronts + $backs) / 540;
        }

        $res4 = round($printer_cost * $res1, 2);
        $res5 = round($printer_cost * $res2, 2);
        $res3 = $res4 - $res5;

        $result = array(
          'manual' => number_format($res4, 2),
          'automatic' => number_format($res5, 2),
          'total' => number_format($res3, 2)
        );
      }
      return $result;
    }

    //-----------------------

    function total_savings($data)
    {

      $fronts = $data['fronts'];
      $backs = $data['fronts'];
      $shirts_per_hour = $data['shirtsPerHour'];
      $printer_count = $data['printersPerPress'];
      $printer_cost = $data['printerPerHour'];
      $currency = $data['currency'];

      $result = array(
        'manual' => '',
        'automatic' => '',
        'total' => ''
      );

      if (empty($currency)) {
        $currency = 'USD';
      }

      if ($fronts != '' && $backs != '' && $shirts_per_hour != '' && $printer_count != '' && $printer_cost != '' && is_numeric($fronts) && is_numeric($backs) && is_numeric($shirts_per_hour) && is_numeric($printer_count) && is_numeric($printer_cost)) {
        if ($printer_count > 1) {
          $res1 = (($fronts + $backs) / $shirts_per_hour) * $printer_count;
        } else {
          $res1 = ($fronts + $backs) / $shirts_per_hour;
        }
        if ($printer_count == 1) {
          $res2 = ($fronts + $backs) / 348;
        } else {
          $res2 = ($fronts + $backs) / 540;
        }

        $res4 = $printer_cost * $res1;
        $res5 = $printer_cost * $res2;
        $res6 = round($res4 * 4.33333, 2);
        $res7 = round($res5 * 4.33333, 2);
        $res3 = $res6 - $res7;

        $result = array(
          'manual' => number_format($res6, 2),
          'automatic' => number_format($res7, 2),
          'total' => number_format($res3, 2)
        );
      }
      return $result;
    }

    //-----------------------

    function total_savings_year($data)
    {

      $fronts = $data['fronts'];
      $backs = $data['fronts'];
      $shirts_per_hour = $data['shirtsPerHour'];
      $printer_count = $data['printersPerPress'];
      $printer_cost = $data['printerPerHour'];
      $currency = $data['currency'];

      $result = array(
        'manual' => '',
        'automatic' => '',
        'total' => ''
      );

      if (empty($currency)) {
        $currency = 'USD';
      }

      if ($fronts != '' && $backs != '' && $shirts_per_hour != '' && $printer_count != '' && $printer_cost != '' && is_numeric($fronts) && is_numeric($backs) && is_numeric($shirts_per_hour) && is_numeric($printer_count) && is_numeric($printer_cost)) {
        if ($printer_count > 1) {
          $res1 = (($fronts + $backs) / $shirts_per_hour) * $printer_count;
        } else {
          $res1 = ($fronts + $backs) / $shirts_per_hour;
        }
        if ($printer_count == 1) {
          $res2 = ($fronts + $backs) / 348;
        } else {
          $res2 = ($fronts + $backs) / 540;
        }

        $res4 = $printer_cost * $res1;
        $res5 = $printer_cost * $res2;
        $tempres = $res4;
        $res6 = $res4 * 4.33333;
        $res7 = $res5 * 4.33333;
        $res8 = $tempres * 52;
        $res9 = $res5 * 52;
        $res3 = $res8 - $res9;

        $result = array(
          'manual' => number_format($res8, 2),
          'automatic' => number_format($res9, 2),
          'total' => number_format($res3, 2)
        );

        $html = '';
      }

      return $result;
    }

    //-----------------------

    public function check_array($array)
    {
      $result = array();
      if (!is_array($array)) {
        $result[] = $array;
      } else {
        $result = $array;
      }
      return $result;
    }

    //----------------------------

    public function convert_names_to_codes($names, $is_usa = false)
    {
      $array = $this->check_array($names);

      if ($is_usa) {
        return (array_map(array($this, 'state_to_code_map_callback'), $array));
      } else {
        return (array_map(array($this, 'country_to_code_map_callback'), $array));
      }
    }

    public function convert_continents_to_num($names, $is_usa = false)
    {
      $array = $this->check_array($names);
      return (array_map(array($this, 'continent_to_code_map_callback'), $array));
    }

    public function continent_to_code_map_callback($continent)
    {

      $continents = array(
        '1' => 'United States',
        '2' => 'South America',
        '3' => 'Europe',
        '4' => 'Africa',
        '5' => 'Asia',
        '6' => 'Oceania',
        '7' => 'Central America',
        '8' => 'North America',
        '9' => 'Caribbean Islands'
      );
      return (array_search($continent, $continents));
    }

    public function state_to_code_map_callback($state)
    {

      $states = array(
        'US-AL' => 'Alabama',
        'US-AK' => 'Alaska',
        'US-AZ' => 'Arizona',
        'US-AR' => 'Arkansas',
        'US-CA' => 'California',
        'US-CO' => 'Colorado',
        'US-CT' => 'Connecticut',
        'US-DE' => 'Delaware',
        'US-DC' => 'District of Columbia',
        'US-FL' => 'Florida',
        'US-GA' => 'Georgia',
        'US-HI' => 'Hawaii',
        'US-ID' => 'Idaho',
        'US-IL' => 'Illinois',
        'US-IN' => 'Indiana',
        'US-IA' => 'Iowa',
        'US-KS' => 'Kansas',
        'US-KY' => 'Kentucky',
        'US-LA' => 'Louisiana',
        'US-ME' => 'Maine',
        'US-MD' => 'Maryland',
        'US-MA' => 'Massachusetts',
        'US-MI' => 'Michigan',
        'US-MN' => 'Minnesota',
        'US-MS' => 'Mississippi',
        'US-MO' => 'Missouri',
        'US-MT' => 'Montana',
        'US-NE' => 'Nebraska',
        'US-NV' => 'Nevada',
        'US-NH' => 'New Hampshire',
        'US-NJ' => 'New Jersey',
        'US-NM' => 'New Mexico',
        'US-NY' => 'New York',
        'US-NC' => 'North Carolina',
        'US-ND' => 'North Dakota',
        'US-OH' => 'Ohio',
        'US-OK' => 'Oklahoma',
        'US-OR' => 'Oregon',
        'US-PA' => 'Pennsylvania',
        'US-RI' => 'Rhode Island',
        'US-SC' => 'South Carolina',
        'US-SD' => 'South Dakota',
        'US-TN' => 'Tennessee',
        'US-TX' => 'Texas',
        'US-UT' => 'Utah',
        'US-VT' => 'Vermont',
        'US-VA' => 'Virginia',
        'US-WA' => 'Washington',
        'US-WV' => 'West Virginia',
        'US-WI' => 'Wisconsin',
        'US-WY' => 'Wyoming',
      );
      return (array_search($state, $states));
    }

    public function country_to_code_map_callback($country)
    {
      $countries = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
      );
      return (array_search($country, $countries));
    }
  }

  $roi = new ROICalculator();
}
