<style>
.first-step-error, .third-step-error {
  font-family : Acumin Pro;
  font-size : 12px;
  color : #E22641;
  display: none;
  width: 100%;
  text-align: right;
  margin: 20px 0 0;
}
.datepicker.error {
    border-color: #e22641 !important;
    color: #e17080 !important;
    border: 1px solid;
}
</style>
<div class="step step-1 active">
    <div class="form-step">
        <h4 class="t-primary m-md required">1. Confirm your event postcode:</h4>
        <div class="form-group">
            <input type="text" class="form-control lg" placeholder="e.g EC4R 3TE" name="form-postcode" id="form-1-1" value="<?php echo $postcode ?>">
        </div>
    </div>


    <div class="form-step">
        <h4 class="t-primary m-gutter required">2. Type of event:</h4>
        <div class="row compensate-m-gutter">
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Event/Party" name="form-event" id="form-1-2-1" />
                        <label for="form-1-2-1">
                            <img src="//looloos.co/img/icon/form-01.svg" />
                            <span class="secondary">Event/Party</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Wedding" name="form-event" id="form-1-2-3" />
                        <label for="form-1-2-3">
                            <img src="//looloos.co/img/icon/form-03.svg" />
                            <span class="secondary">Wedding</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Construction" name="form-event" id="form-1-2-4" />
                        <label for="form-1-2-4">
                            <img src="//looloos.co/img/icon/form-04.svg" />
                            <span class="secondary">Construction</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Camping" name="form-event" id="form-1-2-5" />
                        <label for="form-1-2-5">
                            <img src="//looloos.co/img/icon/form-05.svg" />
                            <span class="secondary">Camping</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Home Renovation" name="form-event" id="form-1-2-6" />
                        <label for="form-1-2-6">
                            <img src="//looloos.co/img/icon/form-06.svg" />
                            <span class="secondary">Home Renovation</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                <div class="form-group m-gutter">
                    <div class="radio-icon-control">
                        <input type="radio" value="Festival" name="form-event" id="form-1-2-7" />
                        <label for="form-1-2-7">
                            <img src="//looloos.co/img/icon/form-07.svg" />
                            <span class="secondary">Festival</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-step">
        <div class="row compensate-m-gutter">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h4 class="t-primary m-gutter required">3. Type of loo: </h4>
            <div class="row">
              <div class="col-6 col-sm-4 col-md-4 col-lg-6">
                  <div class="form-group m-gutter">
                      <div class="radio-icon-control">
                          <input type="radio" value="Plastic" name="form-toilet-type" id="form-2-1-2" />
                          <label for="form-2-1-2">
                              <img src="//looloos.co/img/icon/form-08.svg" />
                              <span class="secondary">Plastic</span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-sm-4 col-md-4 col-lg-6">
                  <div class="form-group m-gutter">
                      <div class="radio-icon-control">
                          <input type="radio" value="Luxury" name="form-toilet-type" id="form-2-2-2" />
                          <label for="form-2-2-2">
                              <img src="//looloos.co/img/icon/form-09.svg" />
                              <span class="secondary">Luxury</span>
                          </label>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6 optinal-features" style="display:none;">
            <h6 class="t-primary m-gutter">i. Optional Features</h6>
            <div class="row">
              <div class="col-6 col-sm-4 col-md-4 col-lg-6">
                  <div class="form-group m-gutter">
                      <div class="radio-icon-control radio-icon-control-optional">
                          <input type="checkbox" value="Hot Water" name="form-optional-hot-water" id="form-2-2-1-2" />
                          <label for="form-2-2-1-2">
                              <img src="//looloos.co/img/icon/icons-01.svg" />
                              <span class="secondary">Hot Water</span>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-sm-4 col-md-4 col-lg-6">
                  <div class="form-group m-gutter">
                      <div class="radio-icon-control radio-icon-control-optional">
                          <input type="checkbox" value="Connect to Mains" name="form-optional-mains" id="form-2-2-2-2" />
                          <label for="form-2-2-2-2">
                              <img src="//looloos.co/img/icon/icon-connect-to-mains.svg" />
                              <span class="secondary">Connect to Mains</span>
                          </label>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    <div class="form-step">
        <h4 class="t-primary required">4. Approximate number of people requiring toilets:</h4>
        <p class="t-primary not-construction" style="margin:-.75em 0 1.5em;">(we'll ask if you need a disabled facility later)</p>

        <div class="row compensate-m-gutter construction-people" style="display:none;">
            <div class="col-lg-9">
                <div class="form-group m-gutter">
                    <select class="form-control" name="form-people-number" id="form-1-4" required>
                        <option value="" disabled selected hidden>Please select</option>
                        <option value="1 - 7">1 - 7</option>
                        <option value="8 - 14">8 - 14</option>
                        <option value="15 - 21">15 - 21</option>
                        <option value="22 - 28">22 - 28</option>
                        <option value="29 - 35">29 - 35</option>
                        <option value="36 - 42">36 - 42</option>
                        <option value="43 - 49">43 - 49</option>
                        <option value="56 - 63">56 - 63</option>
                        <option value="64 - 70">64 - 70</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row compensate-m-gutter not-construction-people">
            <div class="col-lg-6">
              <h6 class="t-primary m-gutter">i. Approximate number of men</h6>
                <div class="form-group m-gutter">
                    <select class="form-control" name="form-men-number" id="form-1-4-1" required>
                        <option value="0" disabled selected hidden>Please select</option>
                        <option value="-">None</option>
                        <option value="25">Less than 25</option>
                        <option value="50">25 - 50</option>
                        <option value="100">51 - 100</option>
                        <option value="150">101 - 150</option>
                        <option value="200">151 - 200</option>

                        <option class="option-men-plastic" value="300">201 - 300</option>
                        <option class="option-men-plastic" value="400">301 - 400</option>

                        <option class="option-men-lux" value="250">200 - 250</option>
                        <option class="option-men-lux" value="300">251 - 300</option>
                        <option class="option-men-lux" value="350">301 - 350</option>
                        <option class="option-men-lux" value="400">351 - 400</option>

                        <option value="500">401 - 500</option>
                        <option value="> 500">> 500</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
              <h6 class="t-primary m-gutter">ii. Approximate number of women</h6>
                <div class="form-group m-gutter">
                    <select class="form-control" name="form-women-number" id="form-1-4-2" required>
                        <option value="0" disabled selected hidden>Please select</option>
                        <option value="-">None</option>
                        <option value="25">Less than 25</option>
                        <option value="50">25 - 50</option>
                        <option value="100">51 - 100</option>
                        <option value="150">101 - 150</option>
                        <option value="200">151 - 200</option>

                        <option class="option-women-plastic" value="300">201 - 300</option>
                        <option class="option-women-plastic" value="400">301 - 400</option>

                        <option class="option-women-lux" value="250">200 - 250</option>
                        <option class="option-women-lux" value="300">251 - 300</option>
                        <option class="option-women-lux" value="350">301 - 350</option>
                        <option class="option-women-lux" value="400">351 - 400</option>

                        <option value="500">401 - 500</option>
                        <option value="> 500">> 500</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="form-step">
        <h4 class="t-primary required">5. Date of your event:</h4>
        <p class="alert-notice">We can only take bookings with 2 weeks notice</p>
        <div class="row compensate-m-gutter">
            <div class="col-lg-6">
                <h6 class="t-primary m-gutter required">i. Please select a date</h6>
                <div class="datepicker m-gutter"></div>
            </div>
            <div class="col-lg-6 duration-days">
              <h6 class="t-primary m-gutter required">ii. Duration of event <span>(days in use)</span></h6>
              <div class="form-group m-gutter">
                  <select class="form-control" name="form-how-long-days" id="form-1-5-1" required>
                      <option value="" disabled selected hidden>Please select</option>
                      <option value="1">1 day</option>
                      <option value="2">2 days</option>
                      <option value="3">3 days</option>
                      <option value="4">4 days</option>
                      <option value="5">5 days</option>
                      <option value="6">6 days</option>
                      <option value="7">7 days</option>
                      <option value="Longer">Longer</option>
                  </select>
              </div>
            </div>
            <div class="col-lg-6 duration-weeks" style="display:none;">
              <h6 class="t-primary m-gutter required">ii. Duration required <span>(weeks in use)</span></h6>
              <div class="form-group m-gutter">
                  <select class="form-control" name="form-how-long-weeks" id="form-1-5-2" required>
                      <option value="" disabled selected hidden>Please select</option>
                      <option value="1 week">1 week</option>
                      <option value="2 week">2 weeks</option>
                      <option value="3 week">3 weeks</option>
                      <option value="4 week">4 weeks</option>
                      <option value="5 week">5 weeks</option>
                      <option value="6 week">6 weeks</option>
                      <option value="7 week">7 weeks</option>
                      <option value="Longer">Longer</option>
                  </select>
              </div>
            </div>
        </div>
    </div>


    <div class="form-footer">
        <button type="button" class="btn btn-secondary next" data="2">Next<span class="angle-right"></span></button>
        <div class="first-step-error" id="first-step-error">All fields marked * are required.</div>
    </div>
</div>
