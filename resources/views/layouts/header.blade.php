<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top jj-text jj-nav">
    <div class="container">
        <div class="col-md-2">
                @if (Auth::check())
                   <a class="divider navbar-text jj-text" href="#">{{Auth::user()->name}} خوش آمدی   <span class="divider">/</span></a>
                   <a class="divider navbar-text jj-text" href="/logout">خروج</a>
                @endif


        </div>
        <div class="col-md-8">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">خانه
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\trip\index">سفر ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\trip\create">ثبت سفر</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\admin\property\index">مشخصه ها ( ادمین )</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">سرویس ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ارتباط با ما</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a class="navbar-brand" href="#">توپاز تریپ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>


</nav>
