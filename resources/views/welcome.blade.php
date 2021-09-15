<x-guest-layout>
      <!-- Styles -->
      <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 48px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
      <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links mt-3 mr-3">
                    @auth
                        <a class="btn btn-primary text-white pt-2 pb-2" href="{{ route('dashboard') }}">Home</a>
                    @else
                        <a class="btn btn-primary text-white pt-2 pb-2" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-dark text-white pt-2 pb-2"  href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title d-flex align-items-center m-b-md">
                  <img class="h-20 rounded-full object-cover" src="{{ asset('storage/quizlogo.png') }}" alt="Logo"/> 
                  {{ config('app.name', 'LaraQuiz') }}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                </div>
            </div>
        </div>
  </x-guest-layout>