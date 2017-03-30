<?
use backend\components\helpers\UrlHelper;

$this->title = 'Edit page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['/page/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<? if ($result == "error") { ?>
  <div class="alert alert-danger">
    Error saving =(
  </div>
<? } else {
  if ($result == 'success') { ?>
    <div class="alert alert-success text-center">
      <p><b>The changes are saved!</b></p>
    </div>
  <? }
} ?>

<form action="" method="post">
  <input type="hidden" name="id" value="<?= $page['id'] ?>">

  <!-- Control buttons -->
  <div class="row margin-b">

    <div class="col-sm-12 text-right">
      <button type="submit" class="btn btn-xs btn-success">
        Save
      </button>
      <a href="<?= UrlHelper::to(['/page/add']) ?>"
         class="btn btn-xs btn-primary">
        Create new page
      </a>
      <a href="<?= UrlHelper::to(['/page']) ?>"
         class="btn btn-xs btn-warning">
        Cancel
      </a>
    </div>

  </div>

  <!-- Title, Url, Content -->
  <div class="row">

    <div class="col-md-12">

      <div class="bs-panel">

        <div class="bs-title">Main</div>

        <div class="form-group">
          <label for="input-name">Title page</label>
          <input type="text" name="name" class="form-control input-sm"
                 id="input-name" required value="<?= $page['name'] ?>">
        </div>

        <div class="form-group">
          <label for="input-url">Url</label>
          <input type="text" name="url" class="form-control input-sm"
                 id="input-url" value="<?= $page['url'] ?>" required>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="editor_view">
                  <div style="display: block; width: 100%" data-name="content"
                            id="editor"
                            class="editor_basic"><?= $page['content'] ?></div>
                  <textarea style="display: none;" class="hidden-content-input" name="content">
                  <?= $page['content']; ?>
                  </textarea>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Settings -->
  <div class="row">

    <!-- Settings -->
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">SEO</div>
        <div class="form-group">
          <label for="input-title">Title</label>
          <input type="text" name="title" class="form-control input-sm"
                 value="<?= $page['title'] ?>" id="input-title">
        </div>
        <div class="form-group">
          <label for="input-keywords">Keywords</label>
          <input type="text" name="keywords" class="form-control input-sm"
                 value="<?= $page['keywords'] ?>" id="input-keywords">
        </div>
        <div class="form-group">
          <label for="input-description">Description</label>
          <textarea name="description" class="form-control input-sm"
                    id="input-description">
            <?= $page['description'] ?>
          </textarea>
        </div>
      </div>
    </div>

    <!-- Settings(Published, in menu, normal template, parent page, date
         controller, action, template) -->
    <div class="col-md-12">
      <div class="bs-panel">
        <div class="bs-title">Settings</div>
        <div class="checkbox">
          <label>
            <input name="published"
                   type="checkbox" <?= $page['published'] == 1
              ? 'checked="checked"' : ''; ?>
                   value="1"> Published
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="in_menu"
                   type="checkbox" <?= $page['in_menu'] == 1
              ? 'checked="checked"' : ''; ?>
                   value="1"> In menu
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input name="normal_tpl" type="checkbox" <?= $page['normal_tpl']
            == 1 ? 'checked="checked"' : ''; ?> value="1"> Normal template
          </label>
        </div>
        <div class="form-group">
          <label for="input-date">Parent page</label>
          <select name="parent" class="form-control">

            <option value="">No parent</option>

            <? foreach ($parents as $parent) { ?>
              <option <?= $page['parent'] == $parent->id ? 'selected' : ''; ?>
                value="<?= $parent->id ?>"><?= $parent->name ?></option>
            <? } ?>

          </select>
        </div>
        <div class="form-group">
          <label for="input-date">Date</label>
          <input name="datetime" type="datetime"
                 class="form-control input-sm datetimepicker"
                 value="<?= date(
                   "Y/m/d H:i:s", strtotime($page['datetime'])
                 ); ?>"
                 id="input-date">
        </div>
        <div class="form-group">
          <label for="input-controller">Controller</label>
          <input name="controller" type="text" class="form-control input-sm"
                 id="input-controller"
                 value="<?= $page['controller'] ?>">
        </div>
        <div class="form-group">
          <label for="input-action">Action</label>
          <input name="action" type="text" class="form-control input-sm"
                 id="input-action"
                 value="<?= $page['action'] ?>">
        </div>
        <div class="form-group">
          <label for="input-template">Template</label>
          <input name="template" type="text" class="form-control input-sm"
                 id="input-template"
                 value="<?= $page['template'] ?>">
        </div>
      </div>
    </div>

  </div>

  <div class="margin-b">
    <button type="submit" class="btn btn-block btn-success">Save</button>
  </div>

</form>

<!--<form action="" method="post">-->
<!--  <input type="hidden" name="id" value="31">-->
<!---->
<!---->
<!---->
<!---->
<!--<input type="text" name="name" class="form-control input-sm"-->
<!--id="input-name" required value="Join as Blockchain Accelerator">-->
<!---->
<!---->
<!---->
<!--<input type="text" name="url" class="form-control input-sm"-->
<!--id="input-url" value="b2b-join" required>-->
<!---->
<!---->
<!--<textarea style="display: none;" class="hidden-content-input" name="content">-->
<!---->
<!--</textarea>-->
<!---->
<!---->
<!--<input type="text" name="title" class="form-control input-sm"-->
<!--       value="" id="input-title">-->
<!---->
<!--<input type="text" name="keywords" class="form-control input-sm"-->
<!---->
<!--<textarea name="description" class="form-control input-sm"-->
<!--          id="input-description">-->
<!--</textarea>-->
<!---->
<!---->
<!---->
<!--<input name="published"-->
<!-- type="checkbox" checked-->
<!-- value="1"> Published-->
<!---->
<!---->
<!--<input name="in_menu"-->
<!--       type="checkbox" checked-->
<!--       value="1"> In menu-->
<!---->
<!---->
<!--<input name="normal_tpl" type="checkbox" checked value="1"> Normal template-->
<!---->
<!--<input type="number" name="parent" value="29">-->
<!---->
<!---->
<!--<input name="datetime" type="datetime"-->
<!--class="form-control input-sm datetimepicker"-->
<!--value="2017/03/22 0:0:0"-->
<!--id="input-date">-->
<!---->
<!---->
<!--<input name="controller" type="text" class="form-control input-sm"-->
<!--     id="input-controller"-->
<!--     value="pages">-->
<!---->
<!---->
<!--<input name="action" type="text" class="form-control input-sm"-->
<!--id="input-action"-->
<!--value="index">-->
<!---->
<!--<input name="template" type="text" class="form-control input-sm"-->
<!--     id="input-template"-->
<!--     value="index">-->
<!---->
<!---->
<!--  <div class="margin-b">-->
<!--    <button type="submit" class="btn btn-block btn-success">Save</button>-->
<!--  </div>-->
<!---->
<!--</form>-->
<!---->
<!---->
<!--<div class="container container--extend">-->
<!--  <div class="row">-->
<!--    <div class="col-sm-8 automargin">-->
<!--      <h1>Join as Blockchain Accelerator</h1>-->
<!--      <p class="lead text-left ">You&rsquo;re ready to transform business as we know it. You&rsquo;re committed to exploring new ideas&mdash;and proposing some new ideas of your own. But the world&rsquo;s not changing fast enough, and there&rsquo;s only so much that you can do individually.</p>-->
<!--      <p class="lead text-left ">So expand your reach by becoming our partner. Bring us your use case with a client in mind. We&rsquo;ll supply our expertise and technological infrastructure. You own the relationship with your client throughout.</p>-->
<!--      <p class="lead text-left ">We are actively seeking FinTech experts (on the Blockchain, but also not exclusively to the Blockchain) as well as consultants and system integration providers to become our Lykke Accelerator partners. If you share our vision for transformational technology and have a novel way to apply it, don&rsquo;t wait for us for discover you; introduce yourself!</p>-->
<!--      <ul class="list list--media list--media_alt">-->
<!--        <li class="list__item">-->
<!--          <div class="row">-->
<!--            <div class="col-sm-2"><img src="img/b2b/cv_icn.svg" alt="cv" width="54" /></div>-->
<!--            <div class="col-sm-10">-->
<!--              <h4>Apply</h4>-->
<!--              <p>Send us your proposal for your use case or client. Make us understand why you&rsquo;re right for this job and what role you&rsquo;d like Lykke to play. If we like what we see, we&rsquo;ll ask for your CV (or the CVs of your team) outlining your experience in project management.</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </li>-->
<!--        <li class="list__item">-->
<!--          <div class="row">-->
<!--            <div class="col-sm-2"><img style="margin-left: -5px;" src="img/b2b/contract_lykke_icn.svg" alt="contract_lykke" width="80" /></div>-->
<!--            <div class="col-sm-10">-->
<!--              <h4>Sign with Lykke</h4>-->
<!--              <p>We negotiate the terms of our partnership, including billing rates, guidelines, and project metrics.</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </li>-->
<!--        <li class="list__item">-->
<!--          <div class="row">-->
<!--            <div class="col-sm-2"><img src="img/b2b/access_icn.svg" alt="access" width="54 " /></div>-->
<!--            <div class="col-sm-10">-->
<!--              <h4>Utilize Lykke resources</h4>-->
<!--              <p>Receive the right to use our fully operational exchange platform and wallet app, and leverage our team&rsquo;s expertise when you need it.</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </li>-->
<!--        <li class="list__item">-->
<!--          <div class="row">-->
<!--            <div class="col-sm-2"><img src="img/b2b/revenue_icn.svg" alt="revenue" width="68" /></div>-->
<!--            <div class="col-sm-10">-->
<!--              <h4>Profit</h4>-->
<!--              <p>You&rsquo;re not licensing Lykke. You&rsquo;re partnering with us. As partners, we share in the revenues together.</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </li>-->
<!--      </ul>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--<div class="container container--extend">-->
<!--  <div class="text-center"><button class="btn btn--primary btn_show_form" type="button" data-target="#accelerate_form_join">Join as Blockchain accelerator</button></div>-->
<!--  <div id="accelerate_form_join" class="toggled_form hide"><button class="btn btn--icon btn_close_form"></button> <input name="FORM_ID" type="hidden" value="4bf7b4a8-b5c6-48a3-80c7-3b1be0ba0c6d" /> <input name="COMPLETE_URL" type="hidden" value="https://lykke.com/b2b-thanks" />-->
<!--    <h3 class="border_bottom">Join as Blockchain accelerator</h3>-->
<!--    <h4>General information</h4>-->
<!--    <div class="form-group"><label class="control-label" for="salutation">Salutation</label>-->
<!--      <div class="radio-group group_salutation">-->
<!--        <div class="radio radio--plate"><input id="Dr" name="temp_title" type="radio" /> <label class="control-label" for="Dr">Dr.</label></div>-->
<!--        <div class="radio radio--plate"><input id="Mr" name="temp_title" type="radio" /> <label class="control-label" for="Mr">Mr.</label></div>-->
<!--        <div class="radio radio--plate"><input id="Mrs" name="temp_title" type="radio" /> <label class="control-label" for="Mrs">Mrs.</label></div>-->
<!--        <div class="radio radio--plate"><input id="Ms" name="temp_title" type="radio" /> <label class="control-label" for="Ms">Ms.</label></div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <select id="physics_title" class="hidden" name="TITLE">-->
<!--      <option></option>-->
<!--      <option value="Dr">Dr</option>-->
<!--      <option value="Mr">Mr</option>-->
<!--      <option value="Mrs">Mrs</option>-->
<!--      <option value="Ms">Miss</option>-->
<!--    </select>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="first_name">First name</label> <input id="first_name" class="form-control" name="FIRST_NAME" required="" type="text" /></div>-->
<!--      </div>-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="last_name">Last name</label> <input id="last_name" class="form-control" name="LAST_NAME" required="" type="text" /></div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group"><label class="control-label" for="job_title">Job title</label> <input id="job_title" class="form-control" name="JOB_TITLE" type="text" /></div>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="company_name">Organisation name</label> <input id="company_name" class="form-control" name="ORGANISATION_NAME" required="" type="text" /></div>-->
<!--      </div>-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="street">Street</label> <input id="street" class="form-control" name="STREET" required="" type="text" /></div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="city">City</label> <input id="city" class="form-control" name="CITY" required="" type="text" /></div>-->
<!--      </div>-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="zip">ZIP</label> <input id="zip" class="form-control" name="ZIP" required="" type="text" /></div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group"><label class="control-label" for="country">Country</label>-->
<!--      <div class="select" data-control="select">-->
<!--        <div class="select__value">&nbsp;</div>-->
<!--        <select id="country" class="form-control select__elem" name="COUNTRY" required="">-->
<!--          <option value="">Country...</option>-->
<!--          <option value="Afganistan">Afghanistan</option>-->
<!--          <option value="Albania">Albania</option>-->
<!--          <option value="Algeria">Algeria</option>-->
<!--          <option value="American Samoa">American Samoa</option>-->
<!--          <option value="Andorra">Andorra</option>-->
<!--          <option value="Angola">Angola</option>-->
<!--          <option value="Anguilla">Anguilla</option>-->
<!--          <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>-->
<!--          <option value="Argentina">Argentina</option>-->
<!--          <option value="Armenia">Armenia</option>-->
<!--          <option value="Aruba">Aruba</option>-->
<!--          <option value="Australia">Australia</option>-->
<!--          <option value="Austria">Austria</option>-->
<!--          <option value="Azerbaijan">Azerbaijan</option>-->
<!--          <option value="Bahamas">Bahamas</option>-->
<!--          <option value="Bahrain">Bahrain</option>-->
<!--          <option value="Bangladesh">Bangladesh</option>-->
<!--          <option value="Barbados">Barbados</option>-->
<!--          <option value="Belarus">Belarus</option>-->
<!--          <option value="Belgium">Belgium</option>-->
<!--          <option value="Belize">Belize</option>-->
<!--          <option value="Benin">Benin</option>-->
<!--          <option value="Bermuda">Bermuda</option>-->
<!--          <option value="Bhutan">Bhutan</option>-->
<!--          <option value="Bolivia">Bolivia</option>-->
<!--          <option value="Bonaire">Bonaire</option>-->
<!--          <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>-->
<!--          <option value="Botswana">Botswana</option>-->
<!--          <option value="Brazil">Brazil</option>-->
<!--          <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>-->
<!--          <option value="Brunei">Brunei</option>-->
<!--          <option value="Bulgaria">Bulgaria</option>-->
<!--          <option value="Burkina Faso">Burkina Faso</option>-->
<!--          <option value="Burundi">Burundi</option>-->
<!--          <option value="Cambodia">Cambodia</option>-->
<!--          <option value="Cameroon">Cameroon</option>-->
<!--          <option value="Canada">Canada</option>-->
<!--          <option value="Canary Islands">Canary Islands</option>-->
<!--          <option value="Cape Verde">Cape Verde</option>-->
<!--          <option value="Cayman Islands">Cayman Islands</option>-->
<!--          <option value="Central African Republic">Central African Republic</option>-->
<!--          <option value="Chad">Chad</option>-->
<!--          <option value="Channel Islands">Channel Islands</option>-->
<!--          <option value="Chile">Chile</option>-->
<!--          <option value="China">China</option>-->
<!--          <option value="Christmas Island">Christmas Island</option>-->
<!--          <option value="Cocos Island">Cocos Island</option>-->
<!--          <option value="Colombia">Colombia</option>-->
<!--          <option value="Comoros">Comoros</option>-->
<!--          <option value="Congo">Congo</option>-->
<!--          <option value="Cook Islands">Cook Islands</option>-->
<!--          <option value="Costa Rica">Costa Rica</option>-->
<!--          <option value="Cote DIvoire">Cote D'Ivoire</option>-->
<!--          <option value="Croatia">Croatia</option>-->
<!--          <option value="Cuba">Cuba</option>-->
<!--          <option value="Curaco">Curacao</option>-->
<!--          <option value="Cyprus">Cyprus</option>-->
<!--          <option value="Czech Republic">Czech Republic</option>-->
<!--          <option value="Denmark">Denmark</option>-->
<!--          <option value="Djibouti">Djibouti</option>-->
<!--          <option value="Dominica">Dominica</option>-->
<!--          <option value="Dominican Republic">Dominican Republic</option>-->
<!--          <option value="East Timor">East Timor</option>-->
<!--          <option value="Ecuador">Ecuador</option>-->
<!--          <option value="Egypt">Egypt</option>-->
<!--          <option value="El Salvador">El Salvador</option>-->
<!--          <option value="Equatorial Guinea">Equatorial Guinea</option>-->
<!--          <option value="Eritrea">Eritrea</option>-->
<!--          <option value="Estonia">Estonia</option>-->
<!--          <option value="Ethiopia">Ethiopia</option>-->
<!--          <option value="Falkland Islands">Falkland Islands</option>-->
<!--          <option value="Faroe Islands">Faroe Islands</option>-->
<!--          <option value="Fiji">Fiji</option>-->
<!--          <option value="Finland">Finland</option>-->
<!--          <option value="France">France</option>-->
<!--          <option value="French Guiana">French Guiana</option>-->
<!--          <option value="French Polynesia">French Polynesia</option>-->
<!--          <option value="French Southern Ter">French Southern Ter</option>-->
<!--          <option value="Gabon">Gabon</option>-->
<!--          <option value="Gambia">Gambia</option>-->
<!--          <option value="Georgia">Georgia</option>-->
<!--          <option value="Germany">Germany</option>-->
<!--          <option value="Ghana">Ghana</option>-->
<!--          <option value="Gibraltar">Gibraltar</option>-->
<!--          <option value="Great Britain">Great Britain</option>-->
<!--          <option value="Greece">Greece</option>-->
<!--          <option value="Greenland">Greenland</option>-->
<!--          <option value="Grenada">Grenada</option>-->
<!--          <option value="Guadeloupe">Guadeloupe</option>-->
<!--          <option value="Guam">Guam</option>-->
<!--          <option value="Guatemala">Guatemala</option>-->
<!--          <option value="Guinea">Guinea</option>-->
<!--          <option value="Guyana">Guyana</option>-->
<!--          <option value="Haiti">Haiti</option>-->
<!--          <option value="Hawaii">Hawaii</option>-->
<!--          <option value="Honduras">Honduras</option>-->
<!--          <option value="Hong Kong">Hong Kong</option>-->
<!--          <option value="Hungary">Hungary</option>-->
<!--          <option value="Iceland">Iceland</option>-->
<!--          <option value="India">India</option>-->
<!--          <option value="Indonesia">Indonesia</option>-->
<!--          <option value="Iran">Iran</option>-->
<!--          <option value="Iraq">Iraq</option>-->
<!--          <option value="Ireland">Ireland</option>-->
<!--          <option value="Isle of Man">Isle of Man</option>-->
<!--          <option value="Israel">Israel</option>-->
<!--          <option value="Italy">Italy</option>-->
<!--          <option value="Jamaica">Jamaica</option>-->
<!--          <option value="Japan">Japan</option>-->
<!--          <option value="Jordan">Jordan</option>-->
<!--          <option value="Kazakhstan">Kazakhstan</option>-->
<!--          <option value="Kenya">Kenya</option>-->
<!--          <option value="Kiribati">Kiribati</option>-->
<!--          <option value="Korea North">Korea North</option>-->
<!--          <option value="Korea Sout">Korea South</option>-->
<!--          <option value="Kuwait">Kuwait</option>-->
<!--          <option value="Kyrgyzstan">Kyrgyzstan</option>-->
<!--          <option value="Laos">Laos</option>-->
<!--          <option value="Latvia">Latvia</option>-->
<!--          <option value="Lebanon">Lebanon</option>-->
<!--          <option value="Lesotho">Lesotho</option>-->
<!--          <option value="Liberia">Liberia</option>-->
<!--          <option value="Libya">Libya</option>-->
<!--          <option value="Liechtenstein">Liechtenstein</option>-->
<!--          <option value="Lithuania">Lithuania</option>-->
<!--          <option value="Luxembourg">Luxembourg</option>-->
<!--          <option value="Macau">Macau</option>-->
<!--          <option value="Macedonia">Macedonia</option>-->
<!--          <option value="Madagascar">Madagascar</option>-->
<!--          <option value="Malaysia">Malaysia</option>-->
<!--          <option value="Malawi">Malawi</option>-->
<!--          <option value="Maldives">Maldives</option>-->
<!--          <option value="Mali">Mali</option>-->
<!--          <option value="Malta">Malta</option>-->
<!--          <option value="Marshall Islands">Marshall Islands</option>-->
<!--          <option value="Martinique">Martinique</option>-->
<!--          <option value="Mauritania">Mauritania</option>-->
<!--          <option value="Mauritius">Mauritius</option>-->
<!--          <option value="Mayotte">Mayotte</option>-->
<!--          <option value="Mexico">Mexico</option>-->
<!--          <option value="Midway Islands">Midway Islands</option>-->
<!--          <option value="Moldova">Moldova</option>-->
<!--          <option value="Monaco">Monaco</option>-->
<!--          <option value="Mongolia">Mongolia</option>-->
<!--          <option value="Montserrat">Montserrat</option>-->
<!--          <option value="Morocco">Morocco</option>-->
<!--          <option value="Mozambique">Mozambique</option>-->
<!--          <option value="Myanmar">Myanmar</option>-->
<!--          <option value="Nambia">Nambia</option>-->
<!--          <option value="Nauru">Nauru</option>-->
<!--          <option value="Nepal">Nepal</option>-->
<!--          <option value="Netherland Antilles">Netherland Antilles</option>-->
<!--          <option value="Netherlands">Netherlands (Holland, Europe)</option>-->
<!--          <option value="Nevis">Nevis</option>-->
<!--          <option value="New Caledonia">New Caledonia</option>-->
<!--          <option value="New Zealand">New Zealand</option>-->
<!--          <option value="Nicaragua">Nicaragua</option>-->
<!--          <option value="Niger">Niger</option>-->
<!--          <option value="Nigeria">Nigeria</option>-->
<!--          <option value="Niue">Niue</option>-->
<!--          <option value="Norfolk Island">Norfolk Island</option>-->
<!--          <option value="Norway">Norway</option>-->
<!--          <option value="Oman">Oman</option>-->
<!--          <option value="Pakistan">Pakistan</option>-->
<!--          <option value="Palau Island">Palau Island</option>-->
<!--          <option value="Palestine">Palestine</option>-->
<!--          <option value="Panama">Panama</option>-->
<!--          <option value="Papua New Guinea">Papua New Guinea</option>-->
<!--          <option value="Paraguay">Paraguay</option>-->
<!--          <option value="Peru">Peru</option>-->
<!--          <option value="Phillipines">Philippines</option>-->
<!--          <option value="Pitcairn Island">Pitcairn Island</option>-->
<!--          <option value="Poland">Poland</option>-->
<!--          <option value="Portugal">Portugal</option>-->
<!--          <option value="Puerto Rico">Puerto Rico</option>-->
<!--          <option value="Qatar">Qatar</option>-->
<!--          <option value="Republic of Montenegro">Republic of Montenegro</option>-->
<!--          <option value="Republic of Serbia">Republic of Serbia</option>-->
<!--          <option value="Reunion">Reunion</option>-->
<!--          <option value="Romania">Romania</option>-->
<!--          <option value="Russia">Russia</option>-->
<!--          <option value="Rwanda">Rwanda</option>-->
<!--          <option value="St Barthelemy">St Barthelemy</option>-->
<!--          <option value="St Eustatius">St Eustatius</option>-->
<!--          <option value="St Helena">St Helena</option>-->
<!--          <option value="St Kitts-Nevis">St Kitts-Nevis</option>-->
<!--          <option value="St Lucia">St Lucia</option>-->
<!--          <option value="St Maarten">St Maarten</option>-->
<!--          <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>-->
<!--          <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>-->
<!--          <option value="Saipan">Saipan</option>-->
<!--          <option value="Samoa">Samoa</option>-->
<!--          <option value="Samoa American">Samoa American</option>-->
<!--          <option value="San Marino">San Marino</option>-->
<!--          <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>-->
<!--          <option value="Saudi Arabia">Saudi Arabia</option>-->
<!--          <option value="Senegal">Senegal</option>-->
<!--          <option value="Serbia">Serbia</option>-->
<!--          <option value="Seychelles">Seychelles</option>-->
<!--          <option value="Sierra Leone">Sierra Leone</option>-->
<!--          <option value="Singapore">Singapore</option>-->
<!--          <option value="Slovakia">Slovakia</option>-->
<!--          <option value="Slovenia">Slovenia</option>-->
<!--          <option value="Solomon Islands">Solomon Islands</option>-->
<!--          <option value="Somalia">Somalia</option>-->
<!--          <option value="South Africa">South Africa</option>-->
<!--          <option value="Spain">Spain</option>-->
<!--          <option value="Sri Lanka">Sri Lanka</option>-->
<!--          <option value="Sudan">Sudan</option>-->
<!--          <option value="Suriname">Suriname</option>-->
<!--          <option value="Swaziland">Swaziland</option>-->
<!--          <option value="Sweden">Sweden</option>-->
<!--          <option value="Switzerland">Switzerland</option>-->
<!--          <option value="Syria">Syria</option>-->
<!--          <option value="Tahiti">Tahiti</option>-->
<!--          <option value="Taiwan">Taiwan</option>-->
<!--          <option value="Tajikistan">Tajikistan</option>-->
<!--          <option value="Tanzania">Tanzania</option>-->
<!--          <option value="Thailand">Thailand</option>-->
<!--          <option value="Togo">Togo</option>-->
<!--          <option value="Tokelau">Tokelau</option>-->
<!--          <option value="Tonga">Tonga</option>-->
<!--          <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>-->
<!--          <option value="Tunisia">Tunisia</option>-->
<!--          <option value="Turkey">Turkey</option>-->
<!--          <option value="Turkmenistan">Turkmenistan</option>-->
<!--          <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>-->
<!--          <option value="Tuvalu">Tuvalu</option>-->
<!--          <option value="Uganda">Uganda</option>-->
<!--          <option value="Ukraine">Ukraine</option>-->
<!--          <option value="United Arab Erimates">United Arab Emirates</option>-->
<!--          <option value="United Kingdom">United Kingdom</option>-->
<!--          <option value="United States of America">United States of America</option>-->
<!--          <option value="Uraguay">Uruguay</option>-->
<!--          <option value="Uzbekistan">Uzbekistan</option>-->
<!--          <option value="Vanuatu">Vanuatu</option>-->
<!--          <option value="Vatican City State">Vatican City State</option>-->
<!--          <option value="Venezuela">Venezuela</option>-->
<!--          <option value="Vietnam">Vietnam</option>-->
<!--          <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>-->
<!--          <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>-->
<!--          <option value="Wake Island">Wake Island</option>-->
<!--          <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>-->
<!--          <option value="Yemen">Yemen</option>-->
<!--          <option value="Zaire">Zaire</option>-->
<!--          <option value="Zambia">Zambia</option>-->
<!--          <option value="Zimbabwe">Zimbabwe</option>-->
<!--        </select></div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="phone">Phone</label> <input id="phone" class="form-control" name="PHONE" required="" type="tel" /></div>-->
<!--      </div>-->
<!--      <div class="col-sm-6">-->
<!--        <div class="form-group"><label class="control-label" for="email">Email</label> <input id="email" class="form-control" name="EMAIL" required="" type="email" /></div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group"><label class="control-label" for="website">Website</label> <input id="website" class="form-control" name="WEBSITE" type="text" value="http://" /></div>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-4"><label class="control-label" for="hear">Where did you hear about us?</label></div>-->
<!--      <div class="col-sm-8">-->
<!--        <div class="form-group">-->
<!--          <div class="radio"><input id="hear1" class="radio__control" name="temp-lead" type="radio" value="Event" /> <label class="control-label radio__label" for="hear1">Event</label></div>-->
<!--          <div class="radio"><input id="hear2" class="radio__control" name="temp-lead" type="radio" value="www.lykke.com" /> <label class="control-label radio__label" for="hear2">www.lykke.com</label></div>-->
<!--          <div class="radio"><input id="hear3" class="radio__control" name="temp-lead" type="radio" value="Personal network" /> <label class="control-label radio__label" for="hear3">Personal network</label></div>-->
<!--          <div class="radio"><input id="hear4" class="radio__control" name="temp-lead" type="radio" value="Other" /> <label class="control-label radio__label" for="hear4">Other</label></div>-->
<!--          <div class="form-group"><input id="other" class="form-control" disabled="disabled" name="CUSTOMFIELD[Lead.Source]" type="text" /></div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <select id="physics_lead" class="hidden" name="CUSTOMFIELD[Lead.Source]">-->
<!--      <option></option>-->
<!--      <option value="Event">Event</option>-->
<!--      <option value="www.lykke.com">www.lykke.com</option>-->
<!--      <option value="Personal network">personal Network</option>-->
<!--      <option value="EveOthernt">other</option>-->
<!--    </select>-->
<!--    <h4>Proposal details</h4>-->
<!--    <div class="form-group"><label class="control-label" for="solution">Briefly describe your proposed solution, including how you intend to utilize the Blockchain</label> <textarea id="solution" class="form-control" name="CUSTOMFIELD[Solution.Request]"></textarea></div>-->
<!--    <div class="form-group"><label class="control-label" for="industry">Which industry or business category does your proposal concern?</label> <input id="industry" class="form-control" name="CUSTOMFIELD[Industry]" required="" type="text" /></div>-->
<!--    <div class="form-group"><label class="control-label" for="role">What role do you intend to have in this project?</label> <input id="role" class="form-control" name="CUSTOMFIELD[Project.Role]" required="" type="text" /></div>-->
<!--    <div class="form-group"><label class="control-label" for="manager">Who do you foresee as the project manager? What experience does the project manager have in the solution area?</label> <textarea class="form-control" name="CUSTOMFIELD[PM.Experience] id=" required=""></textarea></div>-->
<!--    <div class="form-group"><label class="control-label" for="partnership1">What do you intend to bring to the partnership?</label> <textarea id="partnership1" class="form-control" name="CUSTOMFIELD[Role.Franchisee]" required=""></textarea></div>-->
<!--    <div class="form-group"><label class="control-label" for="role">What do you require for Lykke to bring to the partnership?</label> <textarea id="role" class="form-control" name="CUSTOMFIELD[Role.Lykke]" required=""></textarea></div>-->
<!--    <div class="form-group"><label class="control-label" for="effort">Person-days that should be provided by Lykke</label> <input id="effort" class="form-control" name="CUSTOMFIELD[Effort.Lykke.PD]" required="" type="text" /></div>-->
<!--    <div class="row">-->
<!--      <div class="col-sm-4"><label class="control-label" for="radio11">Is a wallet needed for this project?</label></div>-->
<!--      <div class="col-sm-8">-->
<!--        <div class="form-group">-->
<!--          <div class="radio"><input id="radio11" class="radio__control" checked="checked" name="CUSTOMFIELD[Wallet.Y/N]" type="radio" /> <label class="control-label radio__label" for="radio11">Yes</label></div>-->
<!--          <div class="radio"><input id="radio12" class="radio__control" name="CUSTOMFIELD[Wallet.Y/N]" type="radio" /> <label class="control-label radio__label" for="radio12">No</label></div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="form-group"><label class="control-label" for="currency">What digital currency or currencies will you use?</label> <input id="currency" class="form-control" name="CUSTOMFIELD[Digital.Currencies]" required="" type="text" /></div>-->
<!--    <div class="form-group"><label class="control-label" for="transactions">What is the expected range or rough order of magnitude of the number of transactions per day?</label> <input id="transactions" class="form-control" name="CUSTOMFIELD[#.TRX.Day]" required="" type="text" /></div>-->
<!--    <div class="form-group"><label class="control-label" for="volume">What is the expected range or rough order of magnitude of the trading volume per day?</label> <input id="volume" class="form-control" name="CUSTOMFIELD[Volume/Day]" required="" type="text" /></div>-->
<!--    <div class="form-group"><label class="control-label" for="remarks">Additional remarks</label> <textarea id="remarks" class="form-control" name="remarks"></textarea></div>-->
<!--    <input name="TAG" type="hidden" value="Accelerator" /> <input name="TAG" type="hidden" value="Lead" /> <input name="DEVELOPER" type="hidden" value="TRUE" />-->
<!--    <div class="submit-group"><input class="btn btn-block" type="submit" value="Submit" /></div>-->
<!--  </div>-->
<!--  <!--<div class="hint hint--result text-center"><i class="icon icon--check_thin"></i> Success</div>--></div>-->