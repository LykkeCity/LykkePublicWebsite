<?php
use frontend\widgets\ContactUs;
use frontend\widgets\Footer;

?>

<?=ContactUs::widget()?>


<article class="content page">

  <section class="section section--lead section--padding">
    <div class="container container--extend">
      <div class="row">
        <div class="col-sm-8 automargin">
          <h1>Join as Blockchain Accelerator</h1>

          <p class="lead text-left ">You’re ready to transform business as we
            know it. You’re committed to exploring new ideas—and proposing some
            new ideas of your own. But the world’s not changing fast enough, and
            there’s only so much that you can do individually.</p>
          <p class="lead text-left ">So expand your reach by becoming our
            partner. Bring us your use case with a client in mind. We’ll supply
            our expertise and technological infrastructure. You own the
            relationship with your client throughout.</p>
          <p class="lead text-left ">We are actively seeking FinTech experts (on
            the Blockchain, but also not exclusively to the Blockchain) as well
            as consultants and system integration providers to become our Lykke
            Accelerator partners. If you share our vision for transformational
            technology and have a novel way to apply it, don’t wait for us for
            discover you; introduce yourself!</p>

          <ul class="list list--media list--media_alt">
            <li class="list__item">
              <div class="row">
                <div class="col-sm-2">
                  <img src="img/b2b/cv_icn.svg" alt="cv" width="54">
                </div>
                <div class="col-sm-10">
                  <h4>Apply</h4>
                  <p>
                    Send us your proposal for your use case or client. Make us
                    understand why you’re right for this job and what role you’d
                    like Lykke to play. If we like what we see, we’ll ask for
                    your CV (or the CVs of your team) outlining your experience
                    in project management.
                  </p>
                </div>
              </div>
            </li>

            <li class="list__item">
              <div class="row">
                <div class="col-sm-2">
                  <img src="img/b2b/contract_lykke_icn.svg" alt="contract_lykke"
                       width="80" style="margin-left: -5px">
                </div>
                <div class="col-sm-10">
                  <h4>Sign with Lykke</h4>
                  <p>
                    We negotiate the terms of our partnership, including billing
                    rates, guidelines, and project metrics.
                  </p>
                </div>
              </div>
            </li>

            <li class="list__item">
              <div class="row">
                <div class="col-sm-2">
                  <img src="img/b2b/access_icn.svg" alt="access" width="54 ">
                </div>
                <div class="col-sm-10">
                  <h4>Utilize Lykke resources</h4>
                  <p>
                    Receive the right to use our fully operational exchange
                    platform and wallet app, and leverage our team’s expertise
                    when you need it.
                  </p>
                </div>
              </div>
            </li>

            <li class="list__item">
              <div class="row">
                <div class="col-sm-2">
                  <img src="img/b2b/revenue_icn.svg" alt="revenue" width="68">
                </div>
                <div class="col-sm-10">
                  <h4>Profit</h4>
                  <p>
                    You’re not licensing Lykke. You’re partnering with us. As
                    partners, we share in the revenues together.
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container container--extend">
      <div class="text-center">
        <button class="btn btn--primary btn_show_form"
                data-target="#accelerate_form_join" type="button">Join as
          Blockchain accelerator
        </button>
      </div>

      <div class="toggled_form hide" id="accelerate_form_join">
        <button class="btn btn--icon btn_close_form"><i
              class="icon icon--close"></i></button>

        <form action="https://service.capsulecrm.com/service/newlead"
              method="post" class="form form_accelerate form--simple">

          <input type="hidden" name="FORM_ID"
                 value="4bf7b4a8-b5c6-48a3-80c7-3b1be0ba0c6d">

          <input type="hidden" name="COMPLETE_URL"
                 value="https://lykke.com/b2b-thanks">

          <h3 class="border_bottom">Join as Blockchain accelerator</h3>

          <h4>General information</h4>

          <div class="form-group">
            <label for="salutation" class="control-label">Salutation*</label>

            <div class="radio-group group_salutation">
              <div class="radio radio--plate">
                <input type="radio" name="temp_title" id="Dr">
                <label for="Dr" class="control-label">Dr.</label>
              </div>
              <div class="radio radio--plate">
                <input type="radio" name="temp_title" id="Mr">
                <label for="Mr" class="control-label">Mr.</label>
              </div>
              <div class="radio radio--plate">
                <input type="radio" name="temp_title" id="Mrs">
                <label for="Mrs" class="control-label">Mrs.</label>
              </div>
              <div class="radio radio--plate">
                <input type="radio" name="temp_title" id="Ms">
                <label for="Ms" class="control-label">Ms.</label>
              </div>
            </div>
          </div>

          <select class="hidden" id="physics_title" name="TITLE">
            <option></option>
            <option value="Dr">Dr</option>
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Ms">Miss</option>
          </select>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="first_name" class="control-label">First
                  name*</label>
                <input type="text" name="FIRST_NAME" class="form-control"
                       maxlength="250"
                       id="first_name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="last_name" class="control-label">Last name*</label>
                <input type="text" name="LAST_NAME" class="form-control"
                       maxlength="250"
                       id="last_name" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="job_title" class="control-label">Job title</label>
            <input type="text" name="JOB_TITLE" class="form-control"
                   maxlength="250"
                   id="job_title">
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="company_name" class="control-label">Organisation
                  name*</label>
                <input type="text" name="ORGANISATION_NAME" class="form-control"
                       maxlength="250"
                       id="company_name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="street" class="control-label">Street*</label>
                <input type="text" name="STREET" class="form-control"
                       maxlength="250"
                       id="street" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="city" class="control-label">City*</label>
                <input type="text" name="CITY" class="form-control" id="city"
                       maxlength="250"
                       required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="zip" class="control-label">ZIP*</label>
                <input type="text" name="ZIP" class="form-control" id="zip"
                       maxlength="250"
                       required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="country" class="control-label">Country*</label>
            <div class="select" data-control="select">
              <div class="select__value"><span class="_value"></span></div>
              <select id="country" name="COUNTRY"
                      class="form-control select__elem" required>
                <option value="">Country...</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda
                </option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia &amp; Herzegovina">Bosnia &amp;
                  Herzegovina
                </option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean
                  Ter
                </option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African
                  Republic
                </option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote D\'Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)
                </option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro
                </option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre &amp; Miquelon">St Pierre &amp;
                  Miquelon
                </option>
                <option value="St Vincent &amp; Grenadines">St Vincent &amp;
                  Grenadines
                </option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome &amp; Principe">Sao Tome &amp;
                  Principe
                </option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago
                </option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is
                </option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates
                </option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of
                  America
                </option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)
                </option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)
                </option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is
                </option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="phone" class="control-label">Phone*</label>
                <input type="tel" name="PHONE" class="form-control" id="phone"
                       maxlength="250"
                       required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email" class="control-label">Email*</label>
                <input type="text" name="EMAIL" class="form-control" id="email"
                       maxlength="250"
                       required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="website" class="control-label">Website</label>
            <input type="text" name="WEBSITE" class="form-control" id="website"
                   maxlength="250"
                   value="http://">
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="hear" class="control-label">Where did you hear about
                us?</label>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <div class="radio">
                  <input type="radio" name="temp-lead" id="hear1" value="Event"
                         class="radio__control">
                  <label for="hear1"
                         class="control-label radio__label">Event</label>
                </div>
                <div class="radio">
                  <input type="radio" name="temp-lead" id="hear2"
                         value="www.lykke.com" class="radio__control">
                  <label for="hear2" class="control-label radio__label">www.lykke.com</label>
                </div>
                <div class="radio">
                  <input type="radio" name="temp-lead" id="hear3"
                         value="Personal network" class="radio__control">
                  <label for="hear3" class="control-label radio__label">Personal
                    network</label>
                </div>
                <div class="radio">
                  <input type="radio" name="temp-lead" id="hear4" value="Other"
                         class="radio__control">
                  <label for="hear4"
                         class="control-label radio__label">Other</label>
                </div>
                <div class="form-group">
                  <input type="text" name=""
                         class="form-control" id="other" disabled>
                </div>
              </div>
            </div>
          </div>

          <select class="hidden" id="physics_lead"
                  name="CUSTOMFIELD[Lead_Source]">
            <option></option>
            <option value="Event">Event</option>
            <option value="www.lykke.com">www.lykke.com</option>
            <option value="Personal network">personal Network</option>
            <option value="EveOthernt">other</option>
          </select>

          <h4>Proposal details</h4>

          <div class="form-group">
            <label for="solution" class="control-label">Briefly describe your
              proposed solution, including how you intend to utilize the
              Blockchain (if you are a Lykke team member, please include your
              Lykke email here)*</label>
            <textarea name="CUSTOMFIELD[Request_Description]" id="solution"
                      class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="industry" class="control-label">Which industry or
              business category does your proposal concern?*</label>
            <input type="text" name="CUSTOMFIELD[Industry]" maxlength="250"
                   class="form-control"
                   id="industry" required>
          </div>

          <div class="form-group">
            <label for="role" class="control-label">What role do you intend to
              have in this project?*</label>
            <input type="text" name="CUSTOMFIELD[Project_Role]" maxlength="250"
                   class="form-control" id="role" required>
          </div>

          <div class="form-group">
            <label for="manager" class="control-label">Who do you foresee as the
              project manager? What experience does the project manager have in
              the solution area?*</label>
            <textarea name="CUSTOMFIELD[PM_Experience]" maxlength="250"
                      id="manager" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="partnership1" class="control-label">What do you intend
              to bring to the partnership?*</label>
            <textarea name="CUSTOMFIELD[Role_Franchisee]" id="partnership1"
                      maxlength="250"
                      class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="role" class="control-label">What do you require for
              Lykke to bring to the partnership?*</label>
            <textarea name="CUSTOMFIELD[Role_Lykke]" id="role" maxlength="250"
                      class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="effort" class="control-label">Person-days that should be
              provided by Lykke*</label>
            <input type="text" name="CUSTOMFIELD[Effort_Lykke_PD]" maxlength="250"
                   class="form-control" id="effort" required>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label for="radio11" class="control-label">Is a wallet needed for
                this project?</label>
            </div>
            <div class="col-sm-8">
              <div class="form-group">
                <div class="radio">
                  <input type="radio" name="CUSTOMFIELD[Wallet_Y/N]"
                         id="radio11" class="radio__control" checked>
                  <label for="radio11"
                         class="control-label radio__label">Yes</label>
                </div>
                <div class="radio">
                  <input type="radio" name="CUSTOMFIELD[Wallet_Y/N]"
                         id="radio12" class="radio__control">
                  <label for="radio12"
                         class="control-label radio__label">No</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="currency" class="control-label">What digital currency or
              currencies will you use?*</label>
            <input type="text" name="CUSTOMFIELD[Digital_Currencies]" maxlength="250"
                   class="form-control" id="currency" required>
          </div>

          <div class="form-group">
            <label for="transactions" class="control-label">What is the expected
              range or rough order of magnitude of the number of transactions
              per day?*</label>
            <input type="text" name="CUSTOMFIELD[#_TRX/Day]" maxlength="250"
                   class="form-control" id="transactions" required>
          </div>

          <div class="form-group">
            <label for="volume" class="control-label">What is the expected range
              or rough order of magnitude of the trading volume per
              day?*</label>
            <input type="text" name="CUSTOMFIELD[Volume/Day]" maxlength="250"
                   class="form-control" id="volume" required>
          </div>

          <div class="form-group">
            <label for="remarks" class="control-label">Additional
              remarks</label>
            <textarea name="CUSTOMFIELD[add_Remarks]" maxlength="250"
                      id="remarks" class="form-control"></textarea>
          </div>

          <input type="hidden" name="TAG" value="Accelerator">
          <input type="hidden" name="TAG" value="Lead">

          <div class="submit-group">
            <input class="btn btn-block" value="Submit" type="submit">
          </div>
        </form>
      </div>

      <!--<div class="hint hint--result text-center"><i class="icon icon--check_thin"></i> Success</div>-->

    </div>
  </section>

</article>


<?=Footer::widget();?>

