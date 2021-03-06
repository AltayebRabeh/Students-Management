<x-auth-layout>
    <div class="row align-items-center h-100">
        <form method="POST" action="{{ route('login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          @csrf
          <x-jet-validation-errors class="m-4 text-danger" />

          @if (session('status'))
              <div class="">
                  {{ session('status') }}
              </div>
          @endif
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
                <img src="{{ cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : '' }}" alt="Rabeh" width="50px">
          </a>
          <h1 class="h6 mb-3">تسجيل الدخول</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">إسم المستخدم او البريد الالكتروني</label>
            <input name="email" type="text" id="inputEmail" class="form-control form-control-lg" placeholder="إسم المستخدم او البريد الالكتروني" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">كلمة المرور</label>
            <input name="password" type="password" id="inputPassword" class="form-control form-control-lg" placeholder="كلمة المرور" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input name="remember" type="checkbox" value="remember-me"> البقاء متصلاً </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">دخول</button>
          @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('استرجاع كلمة المرور') }}
                </a>
            @endif
          <p class="mt-5 mb-3 text-muted">© 2022</p>
        </form>
      </div>
</x-auth-layout>
