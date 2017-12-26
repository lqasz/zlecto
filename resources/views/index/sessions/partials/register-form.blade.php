<div class="main-content">
  <div class="card">
    <div class="card-header">
      <h6>Rejestracja</h6>
    </div>
    <div class="card-block">
      <div class="content">
        <form id="basic-wizard-4" class="register-form form-wizard-2 icon-wizard" method="POST">
          {{csrf_field()}}
          <h3><i class="icon-fa icon-fa-key"></i></h3>
          <section>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Imię</label>
                  <input type="text" class="form-control" name="first_name" tabindex="1" placeholder="Jan">
                </div>
                <div class="form-group">
                  <label>Nazwisko</label>
                  <input type="text" class="form-control" name="last_name" tabindex="2" placeholder="Kowalski">
                </div>
                <div class="form-group">
                  <label>Hasło</label>
                  <input type="password" class="form-control" id="password" name="password" tabindex="5">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" name="email" tabindex="3" placeholder="jan_kowalski@gmail.com">
                </div>
                <div class="form-group">
                  <label>Nr. telefonu</label>
                  <input type="text" class="form-control" name="phone_number" tabindex="4" placeholder="111 222 333">
                </div>
                <div class="form-group">
                  <label>Potwierdź hasło</label>
                  <input type="password" class="form-control"  name="password_confirmation" tabindex="6">
                </div>
              </div>
            </div>
          </section>
          <h3><i class="icon-fa icon-fa-map-marker"></i></h3>
          <section>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Województwo</label>
                  <select class="form-control ls-select2" name="region" required>
                      <option value="" disable selected style="display: none;">Wybierz województwo</option>
                      <option>dolnośląskie</option>
                      <option>kujawsko-pomorskie</option>
                      <option>lubelskie</option>
                      <option>lubuskie</option>
                      <option>łódzkie</option>
                      <option>małopolskie</option>
                      <option>mazowieckie</option>
                      <option>opolskie</option>
                      <option>podkarpackie</option>
                      <option>podlaskie</option>
                      <option>pomorskie</option>
                      <option>śląskie</option>
                      <option>świętokrzyskie</option>
                      <option>warmińsko-mazurskie</option>
                      <option>wielkopolskie</option>
                      <option>zachodniopomorskie</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ulica i numer</label>
                  <input tye="text" class="form-control" name="street" tabindex="9" placeholder="Słoneczna 1"></textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Miasto lub miejscowość</label>
                  <input type="text" class="form-control" name="city" tabindex="8" placeholder="Placuszkowo">
                </div>
                <div class="form-group">
                  <label>Kod pocztowy</label>
                  <input type="text" class="form-control" name="post_code" tabindex="10" placeholder="55-555">
                </div>
              </div>
            </div>
          </section>
        </form>
      </div>
    </div>
  </div>
</div>
