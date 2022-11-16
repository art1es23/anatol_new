<?php

/**
*/
defined('ABSPATH') or die();

if( !class_exists('Savings')){
  class Savings
  {

    /*
    - registerUser
    - completionTime
    - hourlyWages
    - totalSavings
    - totalSavingsYear
    - saveQuote


    */
    /**
    * Hook into the appropriate actions when the class is constructed.
    */
    public function __construct()
    {
      // add_action('after_setup_theme', array($this, 'theme_setup'));
      // add_action('widgets_init', array($this, 'widgets_init'));
    }

    function registerUser() {

      // $siteKey = '';
      // $secret = '6LdQnSUTAAAAAKPpMAvnCOICgZh0Wb05D7xY_BSU';
      // if(!empty(get_field('secret_key', 'option'))) {
      //   $secret = get_field('secret_key', 'option');
      // }
      // $lang = 'en';
      // $response = JRequest::getVar('response');
      //
      // require(JPATH_COMPONENT . '/assets/recaptcha/autoload.php');
      // $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\CurlPost());
      // $resp = $recaptcha->verify($response, $_SERVER['REMOTE_ADDR']);
      //
      // $db = JFactory::getDbo();

      $first_name = JRequest::getVar('fname');
      $last_name = JRequest::getVar('lname');
      $email = JRequest::getVar('email');
      $location = JRequest::getVar('location');
      $region = JRequest::getVar('region');

      /* define currency */

      if( $region == 'United States' || empty($region) || empty($location)) {
        $currency = 'USD';
        $ccode[] = "1";
      }
      else {
        $url = 'https://restcountries.eu/rest/v1/name/' . $location;
        if ( ! function_exists( 'curl_init' ) ) {
          die( 'The cURL library is not installed.' );
        }
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $getcurrency = json_decode(curl_exec( $ch ));
        curl_close( $ch );

        $currency = $getcurrency[0]->currencies[0];
        $ccode = $getcurrency[0]->callingCodes;
        if(empty($currency)) {
          $currency = 'USD';
          $ccode[] = '1';
        }
      }

      $q = "SELECT * FROM `oth8q_gv_savings_entries` WHERE `email` = " . $db->quote($email);
      $db->setQuery($q);
      $entries = $db->loadObjectList();

      if(!empty($first_name) && !empty($email) && !empty($location) && !empty($region) &&  $resp->isSuccess() == 1) {

        echo '<h1 class="uk-text-center uk-margin-top-remove">Welcome ' . $first_name . ' ' . $last_name . '!</h1><span class="uk-text-center" style="display:block;">Fill in the form below and we\'ll tell you just how much you\'ll be saving.</span>
        <div id="resubmit" data-fname="' . $first_name . '" data-lname="' . $last_name . '" data-email="' . $email .'" data-location="' . $location . '" data-region="' . $region . '" data-currency="' . $currency . '"></div>
        <div class="uk-form uk-width-1-1 uk-margin-top uk-panel uk-panel-box gv-progress-bar-parent" style="margin-left:auto;margin-right:auto;">

        <div class="uk-hide uk-progress uk-margin-remove" style="margin-bottom: 15px !important; display:none !important;">
        <div class="uk-progress-bar gv-progress-bar" data-field1="0" data-field2="0" data-field3="0" data-field4="0" data-field5="0" style="width: 5%;display:none !important;">5%</div>
        </div>
        <ul class="uk-tab uk-margin-small-bottom" data-uk-tab>
        <li class="uk-active"><span data-fronts1="" data-backs1="" data-shirtshr1="" data-printernr1="" data-printerc1="" data-currency1="' . $currency . '" class="gvold">Set New Values (' . $currency . ')</li>';

        if(!empty($entries)) {
          foreach($entries as $entry) {
            $expld = json_decode($entry->content);
            echo '<li><span class="gvold" data-fronts1="' . $expld->fronts . '" data-backs1="' . $expld->backs . '" data-shirtshr1="' . $expld->shirtshr . '" data-printernr1="' . $expld->printernr . '" data-printerc1="' . $expld->printerc . '" data-currency1="' . $expld->currency . '">' . $entry->date . ' Submission (' . $expld->currency . ')</span></li>';
          }
        }

        echo '</ul>
        <div class="uk-form-row b_border">
        <div class="row">
        <div class="col-md-4"><label style="display: block;">1. How many shirts do I want to print per week?</label></div>
        <div class="col-md-4"><input type="number" step="any" class="uk-width-1-1 first calc_form_mobile_margin" placeholder="Fronts" gv="1" /></div>
        <div class="col-md-4"><input type="number" step="any" class="uk-width-1-1 second" placeholder="Backs" gv="2" /></div>
        </div>
        </div>
        <div class="uk-form-row b_border">
        <div class="row">
        <div class="col-md-4"><label style="display: block;">2. How many shirts can I print per hour manually?</label></div>
        <div class="col-md-4"><input type="number" step="any" class="uk-width-1-1 third" gv="3" /></div>
        </div>
        </div>
        <div class="uk-form-row b_border">
        <div class="row">
        <div class="col-md-4"><label style="display: block;">3. How many printers will be working the press?</label></div>
        <div class="col-md-4"><input type="number" step="any" class="uk-width-1-1 fourth" gv="4" /></div>
        </div>
        </div>
        <div class="uk-form-row">
        <div class="row">
        <div class="col-md-4"><label style="display: block;">4. How much do I pay each printer per hour? (in <span class="change-cur uk-text-primary">' . $currency . '</span>)</label></div>
        <div class="col-md-4"><input type="number" step="any" class="uk-width-1-1 fifth" gv="5" /></div>
        </div>


        </div>
        <div class="uk-form-row uk-text-center" id="button_wrapper">
        <button class="uk-text-center uk-width-1-1 uk-width-medium-1-2 uk-button uk-button-warning clicker button" style="displaycolor:#000;><i class="uk-icon-paper-plane"></i> Click here and we\'ll do the math!</button>
        </div>
        </div>
        <div class="uk-grid dothehide" style="display:none;" data-uk-grid-match>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-top">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary" style="min-height: 150px">
        <h3 class="uk-h2 uk-text-center" style="font-weight: normal">Job(s) Completion Time (Labor Hours per Week)</h3>
        <div class="gv-calc-1 uk-text-center">
        <i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i>
        <div class="uk-margin-small-top">
        Spinning up the hamster...
        </div>
        </div>
        </div>
        </div>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-top">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary" style="min-height: 150px">
        <h3 class="uk-h2 uk-text-center" style="font-weight: normal">Hourly Wages Paid for Those Jobs</h3>
        <div class="gv-calc-2 uk-text-center">
        <i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i>
        <div class="uk-margin-small-top">
        Getting the top guys on this...
        </div>
        </div>
        </div>
        </div>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-top">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary" style="min-height: 150px">
        <h3 class="uk-h2 uk-text-center" style="font-weight: normal">Total Savings Per Month</h3>
        <div class="gv-calc-3 uk-text-center">
        <i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i>
        <div class="uk-margin-small-top">
        Shovelling coal into the server...
        </div>
        </div>
        </div>
        </div>
        <div class="uk-width-1-1 uk-width-medium-1-2 uk-margin-top">
        <div class="uk-panel uk-panel-box uk-panel-box-secondary" style="min-height: 150px">
        <h3 class="uk-h2 uk-text-center" style="font-weight: normal">Total Savings Per Year</h3>
        <div class="gv-calc-4 uk-text-center">
        <i class="uk-icon-spinner uk-icon-spin uk-text-warning" style="font-size:3em;"></i>
        <div class="uk-margin-small-top">
        Don\'t think of purple hippos!
        </div>
        </div>
        </div>
        </div>';




        $q = "SELECT id FROM `oth8q_gv_subregions` WHERE LOWER(`subregionName`) = " . $db->quote(strtolower($location));
        $db->setQuery($q);
        $gvcd = $db->loadResult();

        $q = "SELECT * FROM `oth8q_gv_items` WHERE `status` = '1' AND `type` = '1'";
        $db->setQuery($q);
        $compare = $db->loadObjectList();

        foreach($compare as $comp){
          $explode = explode(",",$comp->subregions);
          //print_r($explode);
          foreach($explode as $exp) {
            //print_r($exp . '=' . $gvcd . '<br>');
            if($exp == $gvcd) {
              $repName = $comp->name;
              $repPhone = $comp->phone;
              $repPhoto = $comp->photo;
              $repPosition = $comp->position;
              break;
            }
          }
        }
        if(empty($repName) && $region == 'United States') {
          $q = "SELECT * FROM `oth8q_gv_items` WHERE `id` = '1'";
          $db->setQuery($q);
          $comp = $db->loadObject();
          $repName = $comp->name;
          $repPhone = $comp->phone;
          $repPhoto = $comp->photo;
          $repPosition = $comp->position;
        }
        else if(empty($repName) && $region != 'United States') {
          $q = "SELECT * FROM `oth8q_gv_items` WHERE `id` = '2'";
          $db->setQuery($q);
          $comp = $db->loadObject();
          $repName = $comp->name;
          $repPhone = $comp->phone;
          $repPhoto = $comp->photo;
          $repPosition = $comp->position;
        }


        $q = "SELECT * FROM `oth8q_gv_savings_offers` WHERE `status` = '1' AND `email` = " . $db->quote($email);
        $db->setQuery($q);
        $leases = $db->loadObjectList();
        if(count($leases) > 0) {
          echo '</div>';
        }

        if(count($leases) == 0) {
          echo '
          <div class="uk-margin-top uk-width-1-1 manager_info">
          <div class="uk-panel uk-panel-box uk-panel-box-secondary">';
          echo '<h2 class="uk-text-center uk-h1">Hey ' . $first_name . ', I\'m ' . $repName . '!</h2>
          <div class="inner_content">
          <div class="image_part"><img loading="lazy" class="lozad alt="' . $repName . '" class="repPic" src="' . $repPhoto . '"></div>
          <div class="text_part">
          <p>Those savings could definitely impact your bottom line, don\'t you think? Let me show you how going automatic can essentially pay for itself in the long run. Enter your <span class="uk-text-primary">phone number</span> and I\'ll give you a call to show you how you can start seeing savings like that in your shop. You can also reach me at  ' . $repPhone . '.
          </p>
          <div class="uk-form">
          <label>Enter your phone number:</label>
          <div class="uk-form-row uk-grid gvPhoneReplace" id="theme_button" style="margin-left:0;">
          <input type="text" data-phone-code="+' . $ccode[0] . '" placeholder="+' . $ccode[0] . ' (no need to enter country code)"class="uk-margin-small-bottom uk-width-1-1 uk-width-medium-7-10 gvAddPhone" />
          <button class="';/*uk-button uk-button-primary uk-width-1-1 uk-width-medium-3-10*/echo ' addPhoneNumber button"><i class="uk-icon-phone"></i> Call me!</button>
          </div>
          </div>
          </div>
          </div>';
          echo '</div>
          </div>

          ';
        }
        else {
          $q = "SELECT ratevalue FROM `oth8q_gv_savings_rate` ORDER BY ratename ASC";
          $db->setQuery($q);
          $ratings = $db->loadColumn();

          foreach($leases as $lease) {
            $lcontent = json_decode($lease->content);
            $grandtotal = $lcontent->press + $lcontent->quartz + $lcontent->dryer + $lcontent->ship + $lcontent->install;
            $monthly24 = $grandtotal * $ratings[0];
            $downp24 = $monthly24 * 2;
            $buyout = 1;
            $totalinvest24 = ($monthly24 * 24) + $downp24 + $buyout;

            $monthly36 = $grandtotal * $ratings[1];
            $downp36 = $monthly36 * 2;
            $totalinvest36 = ($monthly36 * 36) + $downp36 + $buyout;

            $monthly48 = $grandtotal * $ratings[2];
            $downp48 = $monthly48 * 2;
            $totalinvest48 = ($monthly48 * 48) + $downp48 + $buyout;

            $monthly60 = $grandtotal * $ratings[3];
            $downp60 = $monthly60 * 2;
            $totalinvest60 = ($monthly60 * 60) + $downp60 + $buyout;

            $monthly72 = $grandtotal * $ratings[4];
            $downp72 = $monthly72 * 2;
            $totalinvest72 = ($monthly72 * 72) + $downp72 + $buyout;

            if(empty($lcontent->currency)) {
              $lcontent->currency = 'USD';
            }

            if($currency != $lcontent->currency) {
              $note2 = '<br /><span class="uk-text-warning">Your location has changed. Lease Quote provided is in ' . $lcontent->currency . '. Please refresh page and select the location that matches the quote currency to be able to update the numbers.</span>';

            }
            else {
              $note2 = '<br />You can change the values in the ROI Calculator to see alternative savings scenarios.';
            }

            $q = "SELECT * FROM `oth8q_gv_savings_entries` WHERE `email` = " .$db->quote($email) . " ORDER BY date DESC";
            $db->setQuery($q);
            $nrs = $db->loadObjectList();
            if(count($nrs) == 0) {
              $note1 = '<p class="uk-alert">Cannot generate total savings and bonus savings numbers as you have not entered any numbers in the ROI Calculator' . $note2 . '</p>';
              $res24 = 'N/A';
              $res36 = 'N/A';
              $res48 = 'N/A';
              $res60 = 'N/A';
              $res72 = 'N/A';
              $punta24 = 'N/A';
              $punta36 = 'N/A';
              $punta48 = 'N/A';
              $punta60 = 'N/A';
              $punta72 = 'N/A';

            }
            else if(count($nrs) > 0) {
              foreach($nrs as $calc) {
                $explde = json_decode($calc->content);
                if($explde->currency == $lcontent->currency) {
                  $e6 = $explde->fronts;
                  $e7 = $explde->backs;
                  $e8 = $explde->shirtshr;
                  $e9 = $explde->printernr;
                  $e10 = $explde->printerc;
                  if($e9 > 1) {
                    $res1 = (($e6+$e7)/$e8)*$e9;
                  }
                  else {
                    $res1 = ($e6+$e7)/$e8;
                  }
                  if($e9 == 1) {
                    $res2 = ($e6+$e7)/348;
                  }
                  else {
                    $res2 = ($e6+$e7)/540;
                  }

                  $res4 = $e9 * ($e10 * $res1);
                  $res5 = $e9 * ($e10 * $res2);
                  $res6 = round($res4 * 4.33333,2);
                  $res7 = round($res5 * 4.33333,2);
                  $res3 = $res6 - $res7;
                  $res24 = $res3 * 24;
                  $res36 = $res3 * 36;
                  $res48 = $res3 * 48;
                  $res60 = $res3 * 60;
                  $res72 = $res3 * 72;
                  $punta24 = $res24 - $totalinvest24;
                  $punta36 = $res36 - $totalinvest36;
                  $punta48 = $res48 - $totalinvest48;
                  $punta60 = $res60 - $totalinvest60;
                  $punta72 = $res72 - $totalinvest72;
                  $note1 = '<p class="uk-alert"><i>TOTAL SAVINGS DURING LEASE TERM</i> and <i>BONUS SAVINGS EVEN AFTER LEASE PAYOFF</i> are generated based on the values entered on ' . $lease->date . '. ' . $note2 . '</p>';
                  break;
                }
              }
            }
            else {
              $note1 = '<p class="uk-alert">Cannot generate total savings and bonus savings numbers as you have not entered any numbers in the ROI Calculator.' . $note2 . '</p>';
              $res24 = 'N/A';
              $res36 = 'N/A';
              $res48 = 'N/A';
              $res60 = 'N/A';
              $res72 = 'N/A';
              $punta24 = 'N/A';
              $punta36 = 'N/A';
              $punta48 = 'N/A';
              $punta60 = 'N/A';
              $punta72 = 'N/A';
            }
            if(!empty($lcontent->name)) {
              $header = '<tr class="uk-text-center uk-text-primary uk-text-large">
              <td colspan="7">
              ' . $lcontent->name . '
              </td>
              </tr>';
            }
            else {
              $header = '';
            }
            echo '
            <div class="uk-margin-top uk-width-1-1">
            <div class="uk-panel uk-panel-box uk-panel-box-secondary">';
            echo '
            <div class="uk-overflow-container">
            <table class="uk-text-center uk-table uk-table-striped uk-margin-bottom uk-table-hover gvquoter" data-curen="' . $lcontent->currency . '">
            <thead>
            ' . $header . '
            <tr class="uk-text-center uk-text-large">
            <td colspan="7">Leasing options for a grand total of: <span class="uk-text-primary">' . number_format($grandtotal,2) . ' ' . $lcontent->currency . '</span> <span class="uk-text-muted uk-text-small">* Applicable sales taxes not Included</span></td>
            </tr>
            <tr>
            <th class="uk-text-center">LEASE TERM</th>
            <th class="uk-text-center">APPROXIMATE<br />DOWN PAYMENT</th>
            <th class="uk-text-center">APPROXIMATE<br />MONTHLY PAYMENT</th>
            <th class="uk-text-center">LEASE BUYOUT</th>
            <th class="uk-text-center">TOTAL INVESTMENT</th>
            <th class="uk-text-center">TOTAL SAVINGS<br />DURING LEASE TERM</th>
            <th class="uk-text-center">BONUS SAVINGS EVEN<br />AFTER LEASE PAYOFF</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>24 Months</td>
            <td>' . number_format($downp24,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($monthly24,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($buyout,2) . ' ' . $lcontent->currency . '</td>
            <td class="totinv24" data-totalinvest24="' . $totalinvest24 . '">' . number_format($totalinvest24,2) . ' ' . $lcontent->currency . '</td>
            <td><span class="repl124">' . number_format($res24,2) . '</span> ' . $lcontent->currency . '</td>
            <td><strong><span class="repl224">' . number_format($punta24,2) . '</span> ' . $lcontent->currency . '</strong></td>
            </tr>
            <tr>
            <td>36 Months</td>
            <td>' . number_format($downp36,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($monthly36,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($buyout,2) . ' ' . $lcontent->currency . '</td>
            <td class="totinv36" data-totalinvest36="' . $totalinvest36 . '">' . number_format($totalinvest36,2) . ' ' . $lcontent->currency . '</td>
            <td><span class="repl136">' . number_format($res36,2) . '</span> ' . $lcontent->currency . '</td>
            <td><strong><span class="repl236">' . number_format($punta36,2) . '</span> ' . $lcontent->currency . '</strong></td>
            </tr>
            <tr>
            <td>48 Months</td>
            <td>' . number_format($downp48,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($monthly48,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($buyout,2) . ' ' . $lcontent->currency . '</td>
            <td class="totinv48" data-totalinvest48="' . $totalinvest48 . '">' . number_format($totalinvest48,2) . ' ' . $lcontent->currency . '</td>
            <td><span class="repl148">' . number_format($res48,2) . '</span> ' . $lcontent->currency . '</td>
            <td><strong><span class="repl248">' . number_format($punta48,2) . '</span> ' . $lcontent->currency . '</strong></td>
            </tr>
            <tr>
            <td>60 Months</td>
            <td>' . number_format($downp60,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($monthly60,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($buyout,2) . ' ' . $lcontent->currency . '</td>
            <td class="totinv60" data-totalinvest60="' . $totalinvest60 . '">' . number_format($totalinvest60,2) . ' ' . $lcontent->currency . '</td>
            <td><span class="repl160">' . number_format($res60,2) . '</span> ' . $lcontent->currency . '</td>
            <td><strong><span class="repl260">' . number_format($punta60,2) . '</span> ' . $lcontent->currency . '</strong></td>
            </tr>
            <tr>
            <td>72 Months</td>
            <td>' . number_format($downp72,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($monthly72,2) . ' ' . $lcontent->currency . '</td>
            <td>' . number_format($buyout,2) . ' ' . $lcontent->currency . '</td>
            <td class="totinv72" data-totalinvest72="' . $totalinvest72 . '">' . number_format($totalinvest72,2) . ' ' . $lcontent->currency . '</td>
            <td><span class="repl172">' . number_format($res72,2) . '</span> ' . $lcontent->currency . '</td>
            <td><strong><span class="repl272">' . number_format($punta72,2) . '</span> ' . $lcontent->currency . '</strong></td>
            </tr>
            </tbody>
            </table>
            ' . $note1 . '
            <p>*This interactive calculator is made available for your independent use and all examples of payments and terms are hypothetical and are for illustrative purposes. We can not and do not guarantee their applicability or accuracy in regard to your individual and/or business circumstances. We encourage you to seek personalized advice from qualified professionals regarding your specific leasing options.</p>
            <p>** Down payments shown are first and last months lease payments only and may change depending on your individual and/or business creditworthiness. </p>

            </div>
            ';
            echo '</div>
            </div>

            ';
          }
        }

        if(count($leases) == 0) {
          echo '</div>';
        }
      }
      else {
        echo '<div id="gvrelado"></div>';
      }

    }

    /***************************

    *****************************/

    function completionTime() {

      $fronts = intval( $_POST['whatever'] );
      $backs = Jrequest::getVar('backs');
      $shirts_per_hour = Jrequest::getVar('shirtshr');
      $printer_count = Jrequest::getVar('printernr');
      $printer_cost = Jrequest::getVar('printerc');
      $currency = Jrequest::getVar('currency');

      if( empty( $currency ) ) {
        $currency = 'USD';
      }

      if(is_numeric( $fronts ) && is_numeric( $backs ) && is_numeric( $shirts_per_hour ) && is_numeric( $printer_count ) && is_numeric( $printer_cost )) {

        if( $printer_count > 1 ) {
          $res1 = round( ( ( $fronts + $backs ) / $shirts_per_hour ) * $printer_count, 1 );
        }
        else {
          $res1 = round( ( $fronts + $backs ) / $shirts_per_hour, 1 );
        }

        // only one workers
        if( $printer_count == 1) {
          $res2 = round( ( $fronts + $backs )/348, 1 );
        }
        else {
          $res2 = round( ( $fronts + $backs )/540, 1 );
        }
        $profit = $res1 - $res2;
        echo '<table class="uk-table uk-table-hover uk-text-center uk-table-condensed">
        <thead>
        <tr>
        <th class="uk-text-center uk-width-1-2">Manual Press</th>
        <th class="uk-text-center uk-width-1-2">Automatic Press</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="uk-text-warning uk-text-large">
        ' . number_format( $res1, 1 ) . ' hrs
        </td>
        <td class="uk-text-success uk-text-large">
        ' . number_format( $res2, 1 ) . ' hrs
        </td>
        </tr>
        <tr>
        <td colspan="2">
        TOTAL HOURS SAVED PER WEEK
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-large uk-text-primary" style="font-size: 2em;">
        ' . number_format( $profit, 1 ) . ' hours
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-center">
        What would you do with this extra time?
        </td>
        </tr>
        </tbody>
        </table>
        <p class="uk-text-small uk-margin-remove uk-text-left">* Auto production rates figured at 29 dz. per hour for single operator &amp; 45 dz. per hour for 2 operators</p>
        ';
      }
    }

    /****************

    ***************/
    function hourlyWages() {

      $app = JFactory::getApplication();

      $e6 = Jrequest::getVar('fronts');
      $e7 = Jrequest::getVar('backs');
      $e8 = Jrequest::getVar('shirtshr');
      $e9 = Jrequest::getVar('printernr');
      $e10 = Jrequest::getVar('printerc');
      $cur = Jrequest::getVar('currency');
      if(empty($cur)) {
        $cur = 'USD';
      }

      if($e6 != '' && $e7 != '' && $e8 != '' && $e9 != '' && $e10 != '' && is_numeric($e6) && is_numeric($e7) && is_numeric($e8) && is_numeric($e9) && is_numeric($e10)) {
        if($e9 > 1) {
          $res1 = (($e6+$e7)/$e8)*$e9;
        }
        else {
          $res1 = ($e6+$e7)/$e8;
        }
        if($e9 == 1) {
          $res2 = ($e6+$e7)/348;
        }
        else {
          $res2 = ($e6+$e7)/540;
        }

        $res4 = round($e10 * $res1,2);
        $res5 = round($e10 * $res2,2);
        $res3 = $res4 - $res5;
        echo '<table class="uk-table uk-table-hover uk-text-center uk-table-condensed">
        <thead>
        <tr>
        <th class="uk-text-center uk-width-1-2">Manual Press</th>
        <th class="uk-text-center uk-width-1-2">Automatic Press</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="uk-text-warning uk-text-large">
        ' . number_format($res4,2) . ' ' . $cur . '
        </td>
        <td class="uk-text-success uk-text-large">
        ' . number_format($res5,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2">
        TOTAL WAGE SAVINGS PER WEEK
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-large uk-text-primary" style="font-size: 2em;">
        ' . number_format($res3,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-center">
        How would this impact your cash flow?
        </td>
        </tr>
        </tbody>
        </table>
        <p class="uk-text-small uk-margin-remove uk-text-left">* Not including paid benefits, taxes, or insurance costs</p>
        ';
      }
      else {
        echo 'nu a mers';
      }
      //=((E6+E7)/IF(E9=1,348,540))
      $app->close();


    }
    /*******************
    ********************/
    function totalSavings() {

      $app = JFactory::getApplication();

      $e6 = Jrequest::getVar('fronts');
      $e7 = Jrequest::getVar('backs');
      $e8 = Jrequest::getVar('shirtshr');
      $e9 = Jrequest::getVar('printernr');
      $e10 = Jrequest::getVar('printerc');
      $cur = Jrequest::getVar('currency');
      if(empty($cur)) {
        $cur = 'USD';
      }

      if($e6 != '' && $e7 != '' && $e8 != '' && $e9 != '' && $e10 != '' && is_numeric($e6) && is_numeric($e7) && is_numeric($e8) && is_numeric($e9) && is_numeric($e10)) {
        if($e9 > 1) {
          $res1 = (($e6+$e7)/$e8)*$e9;
        }
        else {
          $res1 = ($e6+$e7)/$e8;
        }
        if($e9 == 1) {
          $res2 = ($e6+$e7)/348;
        }
        else {
          $res2 = ($e6+$e7)/540;
        }

        $res4 = $e10 * $res1;
        $res5 = $e10 * $res2;
        $res6 = round($res4 * 4.33333,2);
        $res7 = round($res5 * 4.33333,2);
        $res3 = $res6 - $res7;


        echo '<table class="uk-table uk-table-striped uk-text-center uk-table-condensed uk-width-1-1">
        <thead>
        <tr>
        <th class="uk-text-center uk-width-1-2">Manual Cost</th>
        <th class="uk-text-center uk-width-1-2">Automatic Cost</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="uk-text-warning uk-text-large">
        ' . number_format($res6,2) . ' ' . $cur . '
        </td>
        <td class="uk-text-success uk-text-large">
        ' . number_format($res7,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2">
        TOTAL SAVINGS PER MONTH
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-large uk-text-primary gvres3" style="font-size: 2em;" data-res3="' . $res3 . '">
        ' . number_format($res3,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-center">
        Remember, this is your money!
        </td>
        </tr>
        </tbody>
        </table>
        ';
      }
      else {

      }

      $app->close();


    }

    /*********************

    *********************/

    function totalSavings() {

      $app = JFactory::getApplication();

      $e6 = Jrequest::getVar('fronts');
      $e7 = Jrequest::getVar('backs');
      $e8 = Jrequest::getVar('shirtshr');
      $e9 = Jrequest::getVar('printernr');
      $e10 = Jrequest::getVar('printerc');
      $cur = Jrequest::getVar('currency');
      if(empty($cur)) {
        $cur = 'USD';
      }

      if($e6 != '' && $e7 != '' && $e8 != '' && $e9 != '' && $e10 != '' && is_numeric($e6) && is_numeric($e7) && is_numeric($e8) && is_numeric($e9) && is_numeric($e10)) {
        if($e9 > 1) {
          $res1 = (($e6+$e7)/$e8)*$e9;
        }
        else {
          $res1 = ($e6+$e7)/$e8;
        }
        if($e9 == 1) {
          $res2 = ($e6+$e7)/348;
        }
        else {
          $res2 = ($e6+$e7)/540;
        }

        $res4 = $e10 * $res1;
        $res5 = $e10 * $res2;
        $res6 = round($res4 * 4.33333,2);
        $res7 = round($res5 * 4.33333,2);
        $res3 = $res6 - $res7;


        echo '<table class="uk-table uk-table-striped uk-text-center uk-table-condensed uk-width-1-1">
        <thead>
        <tr>
        <th class="uk-text-center uk-width-1-2">Manual Cost</th>
        <th class="uk-text-center uk-width-1-2">Automatic Cost</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="uk-text-warning uk-text-large">
        ' . number_format($res6,2) . ' ' . $cur . '
        </td>
        <td class="uk-text-success uk-text-large">
        ' . number_format($res7,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2">
        TOTAL SAVINGS PER MONTH
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-large uk-text-primary gvres3" style="font-size: 2em;" data-res3="' . $res3 . '">
        ' . number_format($res3,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-center">
        Remember, this is your money!
        </td>
        </tr>
        </tbody>
        </table>
        ';
      }
      else {

      }

      $app->close();
    }
    /*********************

    ***********************/
    function totalSavingsYear() {

      $app = JFactory::getApplication();

      $e6 = Jrequest::getVar('fronts');
      $e7 = Jrequest::getVar('backs');
      $e8 = Jrequest::getVar('shirtshr');
      $e9 = Jrequest::getVar('printernr');
      $e10 = Jrequest::getVar('printerc');
      $cur = Jrequest::getVar('currency');
      if(empty($cur)) {
        $cur = 'USD';
      }

      if($e6 != '' && $e7 != '' && $e8 != '' && $e9 != '' && $e10 != '' && is_numeric($e6) && is_numeric($e7) && is_numeric($e8) && is_numeric($e9) && is_numeric($e10)) {
        if($e9 > 1) {
          $res1 = (($e6+$e7)/$e8)*$e9;
        }
        else {
          $res1 = ($e6+$e7)/$e8;
        }
        if($e9 == 1) {
          $res2 = ($e6+$e7)/348;
        }
        else {
          $res2 = ($e6+$e7)/540;
        }

        $res4 = $e10 * $res1;
        $res5 = $e10 * $res2;
        $tempres = $res4;
        $res6 = $res4 * 4.33333;
        $res7 = $res5 * 4.33333;
        $res8 = $tempres * 52;
        $res9 = $res5 * 52;
        $res3 = $res8 - $res9;


        echo '<table class="uk-table uk-table-hover uk-text-center uk-table-condensed">
        <thead>
        <tr>
        <th class="uk-text-center uk-width-1-2">Manual Operating Costs</th>
        <th class="uk-text-center uk-width-1-2">Automatic Operating Costs</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="uk-text-warning uk-text-large">
        ' . number_format($res8,2) . ' ' . $cur . '
        </td>
        <td class="uk-text-success uk-text-large">
        ' . number_format($res9,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2">
        TOTAL SAVINGS PER YEAR
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-large uk-text-primary" style="font-size: 2em;">
        ' . number_format($res3,2) . ' ' . $cur . '
        </td>
        </tr>
        <tr>
        <td colspan="2" class="uk-text-center">
        Can you afford NOT to go automatic?
        </td>
        </tr>
        </tbody>
        </table>
        ';
      }
      else {
        echo 'nu a mers';
      }
      //=((E6+E7)/IF(E9=1,348,540))
      $app->close();


    }
    /*******************

    ******************/
    function saveQuote() {

      $app = JFactory::getApplication();

      $item['fronts'] = JRequest::getVar('fronts');
      $item['backs'] = JRequest::getVar('backs');
      $item['shirtshr'] = JRequest::getVar('shirtshr');
      $item['printernr'] = JRequest::getVar('printernr');
      $item['printerc'] = JRequest::getVar('printerc');
      $item['currency'] = JRequest::getVar('currency');
      $email = JRequest::getVar('themail');

      $db = JFactory::getDbo();
      if(!empty($item['fronts']) && !empty($item['backs']) && !empty($item['shirtshr']) && !empty($item['printernr']) && !empty($item['printerc']) && !empty($item['currency']) && !empty($email)) {
        $q = "INSERT INTO `oth8q_gv_savings_entries` (`id`, `email`, `date`, `content`) VALUES (NULL, " . $db->quote($email) . ", CURRENT_TIMESTAMP, " . $db->quote(json_encode($item)) . ");";
        $db->setQuery($q);
        $res = $db->execute();
      }

      if($res == 1) {
        echo 'done';
      }
      else {
        echo 'not done';
      }

      $app->close();

    }

    //-----------------------

    public function check_array( $array ){
      $result = array();
      if( !is_array( $array) ) {
        $result[] = $array;
      }else{
        $result = $array;
      }
      return $result;
    }

    //----------------------------

    public function convert_names_to_codes( $names, $is_usa = false){
      $array = $this->check_array($names);

      if($is_usa){
        return( array_map( array($this, 'state_to_code_map_callback') , $array ));
      }else{
        return( array_map( array($this, 'country_to_code_map_callback') , $array ));
      }
    }

    public function convert_continents_to_num( $names, $is_usa = false){
      $array = $this->check_array($names);
      return( array_map( array($this, 'continent_to_code_map_callback') , $array ));
    }

    public function continent_to_code_map_callback( $continent ){

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
      return ( array_search( $continent, $continents ));
    }

    public function state_to_code_map_callback( $state ){

      $states = array(
        'US-AL'=>'Alabama',
        'US-AK'=>'Alaska',
        'US-AZ'=>'Arizona',
        'US-AR'=>'Arkansas',
        'US-CA'=>'California',
        'US-CO'=>'Colorado',
        'US-CT'=>'Connecticut',
        'US-DE'=>'Delaware',
        'US-DC'=>'District of Columbia',
        'US-FL'=>'Florida',
        'US-GA'=>'Georgia',
        'US-HI'=>'Hawaii',
        'US-ID'=>'Idaho',
        'US-IL'=>'Illinois',
        'US-IN'=>'Indiana',
        'US-IA'=>'Iowa',
        'US-KS'=>'Kansas',
        'US-KY'=>'Kentucky',
        'US-LA'=>'Louisiana',
        'US-ME'=>'Maine',
        'US-MD'=>'Maryland',
        'US-MA'=>'Massachusetts',
        'US-MI'=>'Michigan',
        'US-MN'=>'Minnesota',
        'US-MS'=>'Mississippi',
        'US-MO'=>'Missouri',
        'US-MT'=>'Montana',
        'US-NE'=>'Nebraska',
        'US-NV'=>'Nevada',
        'US-NH'=>'New Hampshire',
        'US-NJ'=>'New Jersey',
        'US-NM'=>'New Mexico',
        'US-NY'=>'New York',
        'US-NC'=>'North Carolina',
        'US-ND'=>'North Dakota',
        'US-OH'=>'Ohio',
        'US-OK'=>'Oklahoma',
        'US-OR'=>'Oregon',
        'US-PA'=>'Pennsylvania',
        'US-RI'=>'Rhode Island',
        'US-SC'=>'South Carolina',
        'US-SD'=>'South Dakota',
        'US-TN'=>'Tennessee',
        'US-TX'=>'Texas',
        'US-UT'=>'Utah',
        'US-VT'=>'Vermont',
        'US-VA'=>'Virginia',
        'US-WA'=>'Washington',
        'US-WV'=>'West Virginia',
        'US-WI'=>'Wisconsin',
        'US-WY'=>'Wyoming',
      );
      return ( array_search( $state, $states ));
    }

    public function country_to_code_map_callback( $country ){
      $countries = array
      (
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
      return ( array_search( $country, $countries ));
    }

  }

  $Savings = new Savings();
}