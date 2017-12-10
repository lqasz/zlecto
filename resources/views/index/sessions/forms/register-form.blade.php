<form action="{{route('register.post')}}" id="registerForm" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control form-control-danger" placeholder="Podaj imię" name="first_name" value="Jan">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-danger" placeholder="Podaj nazwisko" name="last_name" value="Kowalski">
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-danger" placeholder="Podaj email" name="email" value="jan.kowalski@test.pl">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-danger" placeholder="Podaj numer telefonu" name="phone_number" value="455 454 233">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-danger" placeholder="Podaj hasło" name="password" id="password" value="test123467">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-danger" placeholder="Powtórz hasło" name="password_confirmation" value="test123467">
    </div>
    <button class="btn btn-login btn-full">Zarejestruj</button>
</form>