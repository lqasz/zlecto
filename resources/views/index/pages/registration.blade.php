<template>
  <div class="card">
    <div class="card-header">
      <h6>Form Wizard with Vertical Steps</h6>
    </div>
    <div class="card-block">
      <div class="content">
              <form id="basic-wizard-4" class="form-wizard-2 vertical-wizard">
                  <h3>Step 1</h3>
                  <section>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>First Name</label>
                                  <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Last Name</label>
                                  <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>DOB</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control ls-datepicker" value="06/10/2017">
                                      <span class="input-group-addon">
                                          <i class="icon-fa icon-fa-calendar"></i>
                                      </span>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Hobbies</label>
                                  <select class="form-control ls-select2">
                                      <option value="developing">Developing</option>
                                      <option value="singing">Singing</option>
                                      <option value="reading">Reading</option>
                                      <option value="internet-surfing">Internet Surfing</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Occupation</label>
                                  <input type="text" class="form-control" >
                              </div>
                          </div>
                      </div>
                  </section>
                  <h3>Step 2</h3>
                  <section>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Phone No.</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Password Confirmation</label>
                                  <input type="password" class="form-control">
                              </div>
                          </div>
                      </div>
                  </section>
                  <h3>Step 3</h3>
                  <section>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>Address Line1</label>
                                  <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Address Line2</label>
                                  <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>City</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label>State</label>
                                  <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label>Pincode</label>
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                      </div>
                  </section>
                  <h3>Step 4</h3>
                  <section>
                      <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" class="form-control" >
                      </div>
                      <div class="form-group">
                          <label>Twitter</label>
                          <input type="text" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Google +</label>
                          <input type="text" class="form-control">
                      </div>
                  </section>
              </form>
          </div>
    </div>
  </div>
</template>
