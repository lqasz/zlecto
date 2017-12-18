<div class="main-content">
  <div class="card">
    <div class="card-header">
        <h6>Form Wizard with Vertical Steps</h6>
    </div>
    <div class="card-block">
      <div class="content">
        <form id="basic-wizard-4" class="register-form form-wizard-2 vertical-wizard" method="POST">
          {{csrf_field()}}
          <h3>Krok 1</h3>
          <section>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Imię</label>
                  <input type="text" class="form-control" name="first_name" tabindex="1">
                </div>
                <div class="form-group">
                  <label>Nazwisko</label>
                  <input type="text" class="form-control" name="last_name" tabindex="2">
                </div>
                <div class="form-group">
                  <label>Hasło</label>
                  <input type="password" class="form-control" id="password" name="password" tabindex="5">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" name="email" tabindex="3">
                </div>
                <div class="form-group">
                  <label>Nr. telefonu</label>
                  <input type="text" class="form-control" name="phone_number" tabindex="4">
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                  <label>Potwierdź hasło</label>
                  <input type="password" class="form-control"  name="password_confirmation" tabindex="6">
                </div>
              </div>
            </div>
          </section>
          <h3>Krok 2</h3>
          <section>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Województwo</label>
                  <input type="text" class="form-control" name="region" tabindex="7">
                </div>
                <div class="form-group">
                  <label>Addres</label>
                  <textarea class="form-control" rows="3" name="adres" tabindex="9"></textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Miasto</label>
                  <input type="text" class="form-control" name="city" tabindex="8">
                </div>
                <div class="form-group">
                  <label>Kod pocztowy</label>
                  <input type="text" class="form-control" name="postal_code" tabindex="10">
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
    </div>
  </div>
</div>
